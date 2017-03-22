<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Carbon\Carbon;

use Validator;
use Response;
use Excel;
use Auth;
use PDF;

use Storage;
use Input;
use Image;
use File;

use App\Subsidiary;
use App\Tabulator;
use App\Invoice;
use App\Service;
use App\Company;
use App\Driver;

class PaysheetsController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request){
        //date_default_timezone_set("America/Caracas");
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $weeks = Service::select('week')
            ->where('condition', 'Facturado')
            ->whereBetween('start_date', [session('db_year').'-01-01', session('db_year').'-12-31'])
            ->where('company_id', session('company_id'))
            ->distinct()
            ->get();

        return Response::json([
            'status'    => 'success',
            'details'   => 'Servicio agregado.',
            'data'      => $weeks
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        /*

        $validate = Validator::make($request->all(), [
            'week'        => 'required',
            'area'        => 'required',
            'payment'     => 'required',
        ]);

        $error = $validate->fails();

        if(!$error){
        */
            return $this->excel($request);
        /*

        }

        return Response::json([
            'status'  => 'error',
            'details' => $request->all(),
            'data'    => $validate->errors(),
        ], 200);

        */
    }

    /**
     * Export paysheets to excel file.
     *
     * @return Excel
     */
    private function excel($data){

        $week = explode(': ', $data->input('week'));

        Excel::create('Nomina.sem.'.$week[1], function($excel) use($data) {

            $company = Company::find(session('company_id'));

            if($data->input('all_drivers')=='1'){
                $drivers = Driver::where('company_id', session('company_id'))->get();
            }
            else{
                $driver = Driver::find($data->input('driver_id'));
                $drivers[0] = $driver;
            }

            $excel->setTitle('Nomina '.$company->name);

            foreach ($drivers as $driver) {

                $excel->sheet($driver->name, function($sheet) use($data, $driver, $company){

                    //···General Styles:
                        $sheet->setPageMargin(0.25);
                        $sheet->mergeCells('A1:F1');
                        $sheet->mergeCells('A2:F2');
                        $sheet->mergeCells('A3:F3');
                        $sheet->mergeCells('A4:F4');
                        $sheet->setSize([
                            'A1' => ['width' => 10, 'height'  => 30],
                            'B1' => ['width' => 10, 'height'  => 30],
                            'C1' => ['width' => 20, 'height'  => 30],
                            'D1' => ['width' => 10, 'height'  => 30],
                            'E1' => ['width' => 20, 'height'  => 30],
                            'F1' => ['width' => 10, 'height'  => 30],
                            'A2' => ['width' => 10, 'height'  => 20],
                            'B2' => ['width' => 10, 'height'  => 20],
                            'C2' => ['width' => 20, 'height'  => 20],
                            'D2' => ['width' => 10, 'height'  => 20],
                            'E2' => ['width' => 20, 'height'  => 20],
                            'F2' => ['width' => 10, 'height'  => 20],
                        ]);
                        $sheet->setHeight([
                            3 => 20,
                            4 => 20,
                            5 => 20
                        ]);
                        $sheet->cell('A1', function($cell){
                            $cell->setBackground('#F0F3F4');
                            $cell->setFontColor('#707478');
                            $cell->setFont(array(
                                'size'       => '12',
                                'bold'       =>  true
                            ));
                            $cell->setAlignment('center');
                            $cell->setValignment('center');
                            // $cells->setBorder('solid', 'none', 'none', 'solid');
                        });
                        $sheet->cell('A2', function($cell){
                            $cell->setBackground('#F6F8F8');
                            $cell->setFontColor('#707478');
                            $cell->setFont(array(
                                'size'       => '10',
                            ));
                            $cell->setAlignment('center');
                            $cell->setValignment('center');
                        });
                        $sheet->cell('A3', function($cell){
                            $cell->setFontColor('#707478');
                            $cell->setFont(array(
                                'size'       => '10',
                            ));
                            $cell->setAlignment('center');
                            $cell->setValignment('center');
                        });
                        $sheet->cell('A4', function($cell){
                            $cell->setFontColor('#707478');
                            $cell->setFont(['size' => '10']);
                            $cell->setAlignment('center');
                            $cell->setValignment('center');
                        });
                        $sheet->cells('A5:F5', function($cells){
                            $cells->setBackground('#B6C2C9');
                            $cells->setFontColor('#F6F8F8');
                            $cells->setAlignment('center');
                            $cells->setValignment('center');
                        });

                    $sheet->row(1, [strtoupper($company->name)]);
                    $sheet->row(2, ['RIF '.$company->rif]);
                    $sheet->row(3, ['Relación de servicios. Semana: '.explode(':', $data->input('week'))[1]]);
                    $sheet->row(4, ['Conductor: '.$driver->name]);
                    $sheet->row(5, ['FECHA', 'USUARIO', 'RUTA', 'ORDEN', 'FILIAL', 'MONTO']);

                    if($data->input('all_subsidiaries')=="1"){
                        $services = Service::where('internal_driver_id', $driver->id)
                            ->where('condition', 'Facturado')
                            ->where('week', $data->input('week'))
                            ->where('area', $data->input('area'))
                            ->where('payment', $data->input('payment'))
                            ->whereBetween('start_date', [session('db_year').'-01-01', session('db_year').'-12-31'])
                            ->where('company_id', session('company_id'))
                            ->get();
                    }
                    else{
                        $services = Service::where('internal_driver_id', $driver->id)
                            ->where('condition', 'Facturado')
                            ->where('week', $data->input('week'))
                            ->where('area', $data->input('area'))
                            ->where('payment', $data->input('payment'))
                            ->where('subsidiary_id', $data->input('subsidiary_id'))
                            ->whereBetween('start_date', [session('db_year').'-01-01', session('db_year').'-12-31'])
                            ->where('company_id', session('company_id'))
                            ->get();
                    }

                    $row = 6;
                    $total = 0;

                    foreach ($services as $service) {
                        $date = Carbon::createFromFormat('Y-m-d H:i:s', $service->start_date)->format('d/m/Y');
                        $sheet->row($row, [
                            $date,
                            $service->user,
                            $service->route->route,
                            'N°: '.$service->order,
                            $service->subsidiary->name,
                            $service->invoice->total
                        ]);
                        $total = $total + $service->invoice->total;
                        $row++;
                    }

                    $row_billed = $row;
                    $row_percent = $row+1;
                    $row_total = $row+2;

                    $sheet->mergeCells('A'.$row_billed.':E'.$row_billed);
                    $sheet->mergeCells('A'.$row_percent.':E'.$row_percent);
                    $sheet->mergeCells('A'.$row_total.':E'.$row_total);
                    $sheet->setHeight([ $row_billed => 20 ]);
                    $sheet->setHeight([ $row_percent => 20 ]);
                    $sheet->setHeight([ $row_total => 25 ]);

                    $sheet->cell('A'.$row_billed, function($cell){
                        $cell->setFont(['size' => '10']);
                        $cell->setValue('TOTAL FACTURADO');
                        $cell->setBackground('#F6F8F8');
                        $cell->setFontColor('#707478');
                        $cell->setAlignment('right');
                        $cell->setValignment('center');
                    });
                    $sheet->cell('F'.$row_billed, function($cell) use($total){
                        $cell->setFont(['size' => '10']);
                        $cell->setValue($total);
                        $cell->setBackground('#F6F8F8');
                        $cell->setFontColor('#707478');
                        $cell->setAlignment('right');
                        $cell->setValignment('center');
                    });

                    $sheet->cell('A'.$row_percent, function($cell){
                        $cell->setFont(['size' => '10']);
                        $cell->setValue('15% GASTOS ADMINISTRATIVOS');
                        $cell->setBackground('#F6F8F8');
                        $cell->setFontColor('#707478');
                        $cell->setAlignment('right');
                        $cell->setValignment('center');
                    });
                    $sheet->cell('F'.$row_percent, function($cell) use($total){
                        $percent = $total*0.15;
                        $cell->setFont(['size' => '10']);
                        $cell->setValue($percent);
                        $cell->setBackground('#F6F8F8');
                        $cell->setFontColor('#707478');
                        $cell->setAlignment('right');
                        $cell->setValignment('center');
                    });

                    $sheet->cell('A'.$row_total, function($cell){
                        $cell->setFont(['size' => '10']);
                        $cell->setValue('TOTAL');
                        $cell->setBackground('#F6F8F8');
                        $cell->setFontColor('#707478');
                        $cell->setAlignment('right');
                        $cell->setValignment('center');
                    });
                    $sheet->cell('F'.$row_total, function($cell) use($total){
                        $percent = $total*0.15;
                        $pay = $total - $percent;
                        $cell->setFont(['size' => '10']);
                        $cell->setValue($pay);
                        $cell->setBackground('#F6F8F8');
                        $cell->setFontColor('#707478');
                        $cell->setAlignment('right');
                        $cell->setValignment('center');
                    });

                    $sheet->row($row+4, ['CONFORME', '______________________________________']);

                });
            }

        })->download('xlsx');

    }
}
