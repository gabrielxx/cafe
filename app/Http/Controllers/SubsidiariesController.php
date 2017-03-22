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

use App\Subsidiary;

class SubsidiariesController extends Controller {

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

        $subsidiaries = Subsidiary::where('company_id', session('company_id'))->where('status', 'active')->get();

        return Response::json([
            'status'  => 'success',
            'details' => null,
            'data'    => $subsidiaries
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
            'name'  => 'required',
            'rif'   => 'required'
        ]);

        $error = $validate->fails();

        if (!$error){

            $subsidiary = Subsidiary::where('rif', $request->input('rif'))->first();

            if(!$subsidiary){

                $subsidiary = Subsidiary::create([
                    'name'          =>  $request->input('name'),
                    'rif'           =>  $request->input('rif'),
                    'company_id'    =>  session('company_id'),

                    'updated_at'    =>  date('Y-m-d H:i:s'),
                    'created_at'    =>  date('Y-m-d H:i:s')
                ]);

                return Response::json([
                    'status'    => 'success',
                    'details'   => $subsidiary->name.' se ha guardado exitosamente.',
                    'data'      => $subsidiary
                ], 200);
            }

            else{

                if($subsidiary->status == 'inactive'){
                    $subsidiary->status = 'active';
                    $subsidiary->save();
                    return Response::json([
                        'status'    => 'success',
                        'details'   => $subsidiary->name.' se ha guardado exitosamente.',
                        'data'      => $subsidiary
                    ], 200);
                }

                else{
                    return Response::json([
                        'status'    => 'error',
                        'details'   => null,
                        'data'      => ['id' => [$subsidiary->name." ya esta registrado."]]
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

        $subsidiary = Subsidiary::find($id);

        return Response::json([
            'status'  => 'success',
            'details' => null,
            'data'    => $subsidiary
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
            'name-u'  => 'required',
            'rif-u'   => 'required'
        ]);

        $error = $validate->fails();

        if (!$error){

            $subsidiary = Subsidiary::find($id);

            $subsidiary->name       =  $request->input('name-u');
            $subsidiary->rif        =  $request->input('rif-u');
            $subsidiary->updated_at =  date('Y-m-d H:i:s');

            $subsidiary->save();

            return Response::json([
                'status'    => 'success',
                'details'   => $subsidiary->name.' se ha guardado exitosamente.',
                'data'      => $subsidiary
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

        $subsidiary = Subsidiary::find($id);
        $current = $subsidiary->status;
        if($current == 'active'){
            $subsidiary->status = 'inactive';
            $message = ' ha sido inhabilitado exitosamente.';
        }
        else{
            $subsidiary->status = 'active';
            $message = ' ha sido habilitado exitosamente.';
        }

        $subsidiary->save();
        $name = $subsidiary->name;

        return Response::json([
            'status'  => 'success',
            'details' => $name.$message,
            'data'    => null
        ], 200);
    }
}
