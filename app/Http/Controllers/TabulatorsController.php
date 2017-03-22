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

use App\Tabulator;

class TabulatorsController extends Controller {

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $tabulators = Tabulator::where('company_id', session('company_id'))->where('status', 'active')->get();

        foreach ($tabulators as $tabulator) {
            $tabulator->night = $tabulator->night * 100;
            $tabulator->holiday = $tabulator->holiday * 100;
        }

        return Response::json([
            'status'  => 'success',
            'details' => null,
            'data'    => $tabulators
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

        $validate = Validator::make($request->all(), [
            'km'            =>  'required|numeric',
            'wait'          =>  'required|numeric',
            'disposition'   =>  'required|numeric',
            'sprint'        =>  'required|numeric',
            'overnight'     =>  'required|numeric',
            'night'         =>  'required|numeric',
            'holiday'       =>  'required|numeric',
        ]);

        $error = $validate->fails();

        if (!$error){

            $tabulator = tabulator::where('category', $id)->where('company_id', session('company_id'))->first();

            $tabulator->km          =  $request->input('km');
            $tabulator->wait        =  $request->input('wait');
            $tabulator->disposition =  $request->input('disposition');
            $tabulator->sprint      =  $request->input('sprint');
            $tabulator->overnight   =  $request->input('overnight');
            $tabulator->night       =  $request->input('night')/100;
            $tabulator->holiday     =  $request->input('holiday')/100;

            $tabulator->updated_at  =  date('Y-m-d H:i:s');

            $tabulator->save();

            return Response::json([
                'status'    => 'success',
                'details'   => 'La categoria '.$tabulator->category.' se ha actualizado exitosamente.',
                'data'      => $tabulator
            ], 200);
        }

        return Response::json([
            'status'  => 'error',
            'details' => null,
            'data'    => $validate->errors(),
        ], 200);
    }
}
