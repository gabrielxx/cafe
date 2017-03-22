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

class ReferralsController extends Controller {

    public $payment         = 0;
    public $area            = 0;
    public $week            = 0;
    public $subsidiary_id   = 0;

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
            ->whereBetween('start_date', [session('db_year').'-01-01', session('db_year').'-12-31'])
            ->where('company_id', session('company_id'))
            ->where('condition', 'Facturado')
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


        $validate = Validator::make($request->all(), [
            'week'        => 'required',
            'area'        => 'required',
            'subsidiary_id'  => 'required',
            'payment'     => 'required',
            'type'        => 'required'
        ]);

        $error = $validate->fails();

        if(!$error){
            switch ($request->input('type')) {
                case 'pdf':
                    $response = $this->pdf($request);
                    break;
                case 'excel':
                    $response = $this->excel($request);
                    break;
                case 'show':
                    $response = Response::json([
                        'status'  => 'success',
                        'details' => $request->all(),
                        'data'    => $this->show($request)
                    ]);
                    break;
            }
            return $response;
        }

        return Response::json([
            'status'  => 'error',
            'details' => $request->all(),
            'data'    => $validate->errors(),
        ], 200);

    }

    private function getMonth($month){
        switch ($month) {
            case 'January':     $response = 'Enero';      break;
            case 'February':    $response = 'Febrero';    break;
            case 'March':       $response = 'Marzo';      break;
            case 'April':       $response = 'Abril';      break;
            case 'May':         $response = 'Mayo';       break;
            case 'June':        $response = 'Junio';      break;
            case 'July':        $response = 'Julio';      break;
            case 'August':      $response = 'Agosto';     break;
            case 'September':   $response = 'Septiembre'; break;
            case 'October':     $response = 'Octubre';    break;
            case 'November':    $response = 'Noviembre';  break;
            case 'Dicember':    $response = 'Diciembre';  break;
        }
        return $response;
    }

    private function pdf($data){

        $payment = $data->input('payment');
        $week = $data->input('week');
        $area = $data->input('area');
        $subsidiary_id = $data->input('subsidiary_id');

        $services = Service::where('payment', $payment)
                            ->where('week', $week)
                            ->where('area', $area)
                            ->where('subsidiary_id', $subsidiary_id)
                            ->whereBetween('start_date', [session('db_year').'-01-01', session('db_year').'-12-31'])
                            ->where('condition', 'Facturado')
                            ->where('company_id', session('company_id'))
                            ->orderBy('position', 'DESC')
                            ->orderBy('ccoo')
                            ->get();


        $subsidiary = Subsidiary::find($subsidiary_id);
        $subsidiary->company;



        $ccoo = $services[0]->ccoo;
        $total = 0;
        $count = 0;
        $count_group = 0;
        $total_ones = 0;

        foreach($services as $service) {
            $service->company;
            $service->driver;
            $service->route;
            $service->subsidiary;
            $service->items;
            $service->invoice;
            foreach ($service->items as $item) {
                $item->route;
            }
            $month = $service->created_at->format('F');
            $month = $this->getMonth($month);
            $service->date = $month.$service->created_at->format(' d, Y');
            $start = Carbon::createFromFormat('Y-m-d H:i:s', $service->start_date)->format('d/m/Y h:i A');
            $service->start_date = $start;

            if($service->ccoo == $ccoo){
                $count_group = $count_group + 1;
                $total = $total + $service->invoice->total;
            }
            else{
                if($count_group>=1){
                    $services[$count_group-1]->total_group = $total;
                    $ccoo = $service->ccoo;
                    $count_group = 0;
                    $total = $service->invoice->total;
                }
                else{
                    $total = $total + $service->invoice->total;
                    $count = $count + 1;
                }
            }

            $services[count($services)-1]->total_group = $total;

        }


        $total = 0;

        foreach($services as $service) {
            if(isset($service->total_group)){
                $total = $total + $service->total_group;
            }
        }



        $pdf = PDF::loadView('pdf.referral', compact('services', 'subsidiary', 'area', 'week', 'total'));
        return $pdf->stream();
    }

    private function show($data){

        $payment = $data->input('payment');
        $week = $data->input('week');
        $area = $data->input('area');
        $subsidiary_id = $data->input('subsidiary_id');

        $services = Service::where('payment', $payment)
                            ->where('week', $week)
                            ->where('area', $area)
                            ->where('subsidiary_id', $subsidiary_id)
                            ->where('condition', 'Facturado')
                            ->where('company_id', session('company_id'))
                            ->orderBy('position', 'DESC')
                            ->orderBy('ccoo')
                            ->get();


        $subsidiary = Subsidiary::find($subsidiary_id);
        $subsidiary->company;

        $ccoo = $services[0]->ccoo;
        $total = 0;
        $count = 0;
        $count_group = 0;
        $total_ones = 0;

        foreach($services as $service) {
            $service->company;
            $service->driver;
            $service->route;
            $service->subsidiary;
            $service->items;
            $service->invoice;
            foreach ($service->items as $item) {
                $item->route;
            }
            $month = $service->created_at->format('F');
            $month = $this->getMonth($month);
            $service->date = $month.$service->created_at->format(' d, Y');
            $start = Carbon::createFromFormat('Y-m-d H:i:s', $service->start_date)->format('d/m/Y h:i A');
            $service->start_date = $start;

            if($service->ccoo == $ccoo){
                $count_group = $count_group + 1;
                $total = $total + $service->invoice->total;
            }
            else{
                if($count_group>=1){
                    $services[$count-1]->total_group = $total;
                    $ccoo = $service->ccoo;
                    $count_group = 0;
                    $total = $service->invoice->total;
                    $total_ones = $service->invoice->total;
                }
                else{
                    $total = $total + $service->invoice->total;
                    $total_ones = $total_ones + $service->invoice->total;
                }
            }
            $services[count($services)-1]->total_group = $total_ones;
            $count = $count + 1;
        }

        $total = 0;

        foreach($services as $service) {
            if(isset($service->total_group)){
                $total = $total + $service->total_group;
            }
        }

        $json = [
            'services' => $services,
            'total' => $total,

        ];
        return $json;
    }

    private function excel($data){

        $this->payment = $data->input('payment');
        $this->area = $data->input('area');
        $this->week = $data->input('week');
        $this->subsidiary_id = $data->input('subsidiary_id');

        Excel::load('public/excel.xlsx', function($reader){


            $services = Service::where('payment', $this->payment)
                                ->where('week', $this->week)
                                ->where('area', $this->area)
                                ->where('subsidiary_id', $this->subsidiary_id)
                                ->whereBetween('start_date', [session('db_year').'-01-01', session('db_year').'-12-31'])
                                ->where('condition', 'Facturado')
                                ->where('company_id', session('company_id'))
                                ->orderBy('position', 'DESC')
                                ->orderBy('ccoo')
                                ->get();

            $reader->setActiveSheetIndex(0);
            $reader->getActiveSheet()->setCellValue('B2', 'COOP. CARIBES PARIANO');
            $reader->getActiveSheet()->setCellValue('F2', explode(':',$this->week)[1]);
            $reader->getActiveSheet()->setCellValue('I2', 'Todas');

            $i = 8;

            foreach ($services as $service) {

                $route = explode('-',$service->route->route);
                $reader->getActiveSheet()->setCellValue('B'.$i, $service->subsidiary->name);
                $reader->getActiveSheet()->setCellValue('C'.$i, $service->order);
                $reader->getActiveSheet()->setCellValue('D'.$i, Carbon::createFromFormat('Y-m-d H:i:s', $service->start_date)->format('d/m/y'));
                $reader->getActiveSheet()->setCellValue('E'.$i, strtoupper(explode(' ',$service->user)[1].', '.explode(' ',$service->user)[0]));
                $reader->getActiveSheet()->setCellValue('F'.$i, $service->user_id);
                $reader->getActiveSheet()->setCellValue('G'.$i, $route[0]);
                $reader->getActiveSheet()->setCellValue('H'.$i, $route[1]);
                $reader->getActiveSheet()->setCellValue('I'.$i, strtoupper( explode(' ',$service->driver->name)[1].', '.explode(' ',$service->driver->name)[0] ));
                $reader->getActiveSheet()->setCellValue('J'.$i, $service->driver->id);

                $ccoo = $service->ccoo;
                if(strlen($ccoo)<12)
                {$reader->getActiveSheet()->setCellValue('K'.$i, $ccoo);}
                elseif(strlen($ccoo)>11)
                {$reader->getActiveSheet()->setCellValue('L'.$i, $ccoo);}

                $reader->getActiveSheet()->setCellValue('N'.$i, $service->invoice->total);
                $reader->getActiveSheet()->setCellValue('T'.$i, $service->driver->category);
                $reader->getActiveSheet()->setCellValue('U'.$i, strtoupper($service->type));
                $reader->getActiveSheet()->setCellValue('V'.$i, $service->invoice->sprint_daytime + $service->invoice->sprint_night);
                $reader->getActiveSheet()->setCellValue('X'.$i, $service->invoice->night_tour);

                $items = count($service->items);

                $reader->getActiveSheet()->setCellValue('W'.$i, $items);
                $reader->getActiveSheet()->setCellValue('Y'.$i, Carbon::createFromFormat('Y-m-d H:i:s', $service->start_date)->format('d/m/y'));
                $reader->getActiveSheet()->setCellValue('Z'.$i, Carbon::createFromFormat('Y-m-d H:i:s', $service->end_date)->format('d/m/y'));
                $reader->getActiveSheet()->setCellValue('AE'.$i, explode(':',$this->week)[1]);

                $reader->getActiveSheet()->setCellValue('AH'.$i, strtoupper(explode(' ',$service->approver)[1].', '.explode(' ',$service->approver)[0]));
                $reader->getActiveSheet()->setCellValue('AI'.$i, $service->approver_id);
                $reader->getActiveSheet()->setCellValue('AJ'.$i, strtoupper($service->company->name));


                $year=date("Y");
                $week=explode(': ',$this->week)[1];
                $timestamp=mktime(0, 0, 0, 1, 1, $year);
                $timestamp+=$week*7*24*60*60;
                $ultimoDia=$timestamp-date("w", mktime(0, 0, 0, 1, 1, $year))*24*60*60;
                $primerDia=$ultimoDia-86400*(date('N',$ultimoDia)-1);

                $start_week = date("d/m/Y", $primerDia);
                $end_week = date("d/m/Y", $ultimoDia);

                $reader->getActiveSheet()->setCellValue('AF'.$i, $start_week);
                $reader->getActiveSheet()->setCellValue('AG'.$i, $end_week);

                //$reader->getActiveSheet()->setCellValue('AO'.$i, $array['motivo']);

                $i++;
            }

        })->download('xlsx');
    }

}
