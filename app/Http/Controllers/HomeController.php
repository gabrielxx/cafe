<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Carbon\Carbon;

use Validator;
use Response;
use Auth;
use PDF;

use Storage;
use File;
use Input;
use Image;

use App\Service;
use App\Route;
use App\Driver;
use App\Subsidiary;
use App\Tabulator;
use App\Company;

class HomeController extends Controller{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $company = Company::where('rif', Auth::user()->company->rif)->first();

        session([
            'company_id' => Auth::user()->company->id,
        ]);

        if($company->status == "inactive"){
            abort(402);
        }

        return view('app', compact('company'));
    }

    /**
     * Get data for selects.
     *
     * @return \Illuminate\Http\Response
     */
    public function give(Request $request){

        $routes         = Route::where('company_id', session('company_id'))->get();
        $drivers         = Driver::where('company_id', session('company_id'))->get();
        $subsidiaries   = Subsidiary::where('company_id', session('company_id'))->get();
        $tabulators     = Tabulator::where('company_id', session('company_id'))->get();

        if ($request->ajax()) {
            $json = [
                'routes' => $routes,
                'drivers' => $drivers,
                'subsidiaries' => $subsidiaries,
                'tabulators' => $tabulators,
            ];

            return Response::json([
                'status'    => 'success',
                'details'   => null,
                'data'      => $json
            ], 200);
        }

        abort(404);
    }

    /**
     * Print service.
     *
     * @return PDF
     */
    public function pdf($id){

        $service = Service::find($id);
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

        $service->date = $month.date(' d, Y');

        $pdf = PDF::loadView('pdf.invoice', compact('service'));
        return $pdf->stream();
    }


    /**
     * Change current database.
     *
     * @return \Illuminate\Http\Response
     */
    public function database($year){
        session(['db_year' => $year]);

        return Response::json([
            'status'  => 'success',
            'details' => "Base de datos actualizada.",
            'data'    => $year
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
}
