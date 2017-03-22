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

use App\Driver;

class DriversController extends Controller {

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

        $drivers = Driver::where('company_id', session('company_id'))->where('status', 'active')->get();

        return Response::json([
            'status'  => 'success',
            'details' => null,
            'data'    => $drivers
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
            'id'            =>  'required',
            'name'          =>  'required',
            'phone_number'  =>  'required',
            'category'      =>  'required',
            'type'      =>  'required',
        ]);

        $error = $validate->fails();

        if (!$error){

            $driver = Driver::find($request->input('id'));

            if(!$driver){

                $driver = Driver::create([
                    'id'            =>  $request->input('id'),
                    'name'          =>  $request->input('name'),
                    'phone_number'  =>  $request->input('phone_number'),
                    'category'      =>  $request->input('category'),
                    'type'          =>  $request->input('type'),
                    'company_id'    =>  session('company_id'),
                    'updated_at'    =>  date('Y-m-d H:i:s'),
                    'created_at'    =>  date('Y-m-d H:i:s')
                ]);

                return Response::json([
                    'status'    => 'success',
                    'details'   => 'El conductor '.$driver->name.' se ha guardado exitosamente.',
                    'data'      => $driver
                ], 200);
            }

            else{

                if($driver->status == 'inactive'){
                    $driver->status = 'active';
                    $driver->save();
                    return Response::json([
                        'status'    => 'success',
                        'details'   => 'El conductor '.$driver->name.' se ha guardado exitosamente.',
                        'data'      => $driver
                    ], 200);
                }

                else{
                    return Response::json([
                        'status'    => 'error',
                        'details'   => null,
                        'data'      => ['id' => [$driver->name." ya esta registrado."]]
                    ], 200);
                }
            }
        }

        return Response::json([
            'status'  => 'error',
            'details' => null,
            'data'    => $validate->errors(),
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){

        $driver = Driver::find($id);

        return Response::json([
            'status'  => 'success',
            'details' => null,
            'data'    => $driver
        ], 200);
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
            'id'              =>  'required|unique:drivers',
            'name-u'          =>  'required',
            'phone_number-u'  =>  'required',
            'category-u'      =>  'required',
            'type-u'          =>  'required',
        ]);

        $error = $validate->fails();
        if (!$error){
            $driver = Driver::find($id);

            $driver->id            =  $request->input('id');
            $driver->name          =  $request->input('name-u');
            $driver->phone_number  =  $request->input('phone_number-u');
            $driver->category      =  $request->input('category-u');
            $driver->type          =  $request->input('type-u');
            $driver->updated_at    =  date('Y-m-d H:i:s');

            $driver->save();

            return Response::json([
                'status'    => 'success',
                'details'   => 'El conductor '.$driver->name.' se ha actualizado exitosamente.',
                'data'      => $driver
            ], 200);
        }


        return Response::json([
            'status'  => 'error',
            'details' => null,
            'data'    => $validate->errors(),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        $driver = Driver::find($id);
        $current = $driver->status;
        if($current == 'active'){
            $driver->status = 'inactive';
            $message = ' ha sido inhabilitado exitosamente.';
        }
        else{
            $driver->status = 'active';
            $message = ' ha sido habilitado exitosamente.';
        }

        $driver->save();
        $name = $driver->name;

        return Response::json([
            'status'  => 'success',
            'details' => $name.$message,
            'data'    => null
        ], 200);
    }
}
