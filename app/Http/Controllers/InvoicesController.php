<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Carbon\Carbon;

use Validator;
use Response;
use Auth;

use Storage;
use File;
use Input;
use Image;

use App\Invoice;
use App\Service;
use App\Tabulator;

class InvoicesController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request){
        //date_default_timezone_set("America/Caracas");
        $this->middleware('auth');
        $this->middleware('ajax');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $invoice = Invoice::where('service_id', $request->input('service_id'))->first();

        if(!$invoice){
            $invoice = Invoice::create([
                'wait_night'                    => $request->input('wait_night'),
                'wait_daytime'                  => $request->input('wait_daytime'),
                'disposition_night'             => $request->input('disposition_night'),
                'disposition_daytime'           => $request->input('disposition_daytime'),
                'sprint_night'                  => $request->input('sprint_night'),
                'sprint_daytime'                => $request->input('sprint_daytime'),
                'night_tour'                    => $request->input('night_tour'),
                'factor_wait_night'             => $request->input('factor_wait_night'),
                'factor_wait_daytime'           => $request->input('factor_wait_daytime'),
                'factor_disposition_night'      => $request->input('factor_disposition_night'),
                'factor_disposition_daytime'    => $request->input('factor_disposition_daytime'),
                'factor_sprint_night'           => $request->input('factor_sprint_night'),
                'factor_sprint_daytime'         => $request->input('factor_sprint_daytime'),
                'factor_night_tour'             => $request->input('factor_night_tour'),
                'wait_holiday'                  => $request->input('wait_holiday'),
                'wait_night_subtotal'           => $request->input('wait_night_subtotal'),
                'wait_daytime_subtotal'         => $request->input('wait_daytime_subtotal'),
                'disposition_holiday'           => $request->input('disposition_holiday'),
                'disposition_night_subtotal'    => $request->input('disposition_night_subtotal'),
                'disposition_daytime_subtotal'  => $request->input('disposition_daytime_subtotal'),
                'sprint_holiday'                => $request->input('sprint_holiday'),
                'sprint_night_subtotal'         => $request->input('sprint_night_subtotal'),
                'sprint_daytime_subtotal'       => $request->input('sprint_daytime_subtotal'),
                'night_tour_subtotal'           => $request->input('night_tour_subtotal'),
                'total'                         => $request->input('total'),
                'total_routes'                  => $request->input('total_routes'),
                'overnight'                     => $request->input('overnight'),
                'service_id'                    => $request->input('service_id'),
                'updated_at'                    => date('Y-m-d H:i:s'),
                'created_at'                    => date('Y-m-d H:i:s')
            ]);
        }

        else{
            $invoice->wait_night                    = $request->input('wait_night');
            $invoice->wait_daytime                  = $request->input('wait_daytime');
            $invoice->disposition_night             = $request->input('disposition_night');
            $invoice->disposition_daytime           = $request->input('disposition_daytime');
            $invoice->sprint_night                  = $request->input('sprint_night');
            $invoice->sprint_daytime                = $request->input('sprint_daytime');
            $invoice->night_tour                    = $request->input('night_tour');
            $invoice->factor_wait_night             = $request->input('factor_wait_night');
            $invoice->factor_wait_daytime           = $request->input('factor_wait_daytime');
            $invoice->factor_disposition_night      = $request->input('factor_disposition_night');
            $invoice->factor_disposition_daytime    = $request->input('factor_disposition_daytime');
            $invoice->factor_sprint_night           = $request->input('factor_sprint_night');
            $invoice->factor_sprint_daytime         = $request->input('factor_sprint_daytime');
            $invoice->factor_night_tour             = $request->input('factor_night_tour');
            $invoice->wait_holiday                  = $request->input('wait_holiday');
            $invoice->wait_night_subtotal           = $request->input('wait_night_subtotal');
            $invoice->wait_daytime_subtotal         = $request->input('wait_daytime_subtotal');
            $invoice->disposition_holiday           = $request->input('disposition_holiday');
            $invoice->disposition_night_subtotal    = $request->input('disposition_night_subtotal');
            $invoice->disposition_daytime_subtotal  = $request->input('disposition_daytime_subtotal');
            $invoice->sprint_holiday                = $request->input('sprint_holiday');
            $invoice->sprint_night_subtotal         = $request->input('sprint_night_subtotal');
            $invoice->sprint_daytime_subtotal       = $request->input('sprint_daytime_subtotal');
            $invoice->night_tour_subtotal           = $request->input('night_tour_subtotal');
            $invoice->total                         = $request->input('total');
            $invoice->total_routes                  = $request->input('total_routes');
            $invoice->overnight                     = $request->input('overnight');
            $invoice->updated_at                    = date('Y-m-d H:i:s');
            $invoice->save();
        }


        $service = Service::find($invoice->service_id);
        $service->condition = 'Facturado';
        $service->save();

        $position = Service::where('week', $service->week)
                    ->where('ccoo', $service->ccoo)
                    ->where('condition', 'Facturado')
                    ->count();

        Service::where('week', $service->week)
                    ->where('ccoo', $service->ccoo)
                    ->where('condition', 'Facturado')
                    ->update(['position' => $position]);


        return Response::json([
            'status'    => 'success',
            'details'   => 'Servicio facturado exitosamente.',
            'data'      => $invoice
        ], 200);
    }
}
