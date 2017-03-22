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

use App\Route;

class RoutesController extends Controller {

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

        $routes = Route::where('company_id', session('company_id'))->where('status', 'active')->get();

        return Response::json([
            'status'  => 'success',
            'details' => null,
            'data'    => $routes
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
            'start'   =>  'required',
            'end'     =>  'required',
            'km'      =>  'required|numeric',
        ]);

        $error = $validate->fails();

        if (!$error){

            $r1 = $request->input('start').' - '.$request->input('end');
            $r2 = $request->input('end').' - '.$request->input('start');

            $success1 = "";
            $success2 = "";

            $route1 = Route::where('route', $r1)->first();
            $route2 = Route::where('route', $r2)->first();

            if(!$route1){
                $route = Route::create([
                    'route'         =>  $r1,
                    'km'            =>  $request->input('km'),
                    'company_id'    =>  session('company_id'),
                    'updated_at'    =>  date('Y-m-d H:i:s'),
                    'created_at'    =>  date('Y-m-d H:i:s')
                ]);
                $success1 = $r1.' se ha guardado exitosamente.';
            }
            else{
                if($route1->status == 'inactive'){
                    $route1->status = 'active';
                    $route1->km = $request->input('km');
                    $route1->save();
                    $success1 = $r1.' se ha guardado exitosamente.';
                }
                else{
                    $success1 = $r1.' ya esta registrado.';
                }
            }

            if(strtolower($request->input('end')) != 'disposicion' && strtolower($request->input('end')) != 'disposición'){
                if(!$route2){
                    $route = Route::create([
                        'route'         =>  $r2,
                        'km'            =>  $request->input('km'),
                        'company_id'    =>  session('company_id'),
                        'updated_at'    =>  date('Y-m-d H:i:s'),
                        'created_at'    =>  date('Y-m-d H:i:s')
                    ]);
                    $success2 = $r2.' se ha guardado exitosamente.';
                }
                else{
                    if($route2->status == 'inactive'){
                        $route2->status = 'active';
                        $route2->km = $request->input('km');
                        $route2->save();
                        $success2 = $r2.' se ha guardado exitosamente.';
                    }
                    else{
                        $success2 = $r2.' ya esta registrado.';
                    }
                }
            }

            return Response::json([
                'status'    => 'success',
                'details'   => $success1.' '.$success2,
                'data'      => null
            ], 200);
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

        $route = Route::find($id);

        return Response::json([
            'status'  => 'success',
            'details' => null,
            'data'    => $route
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
            'start-u'   =>  'required',
            'end-u'     =>  'required',
            'km-u'      =>  'required|numeric',
        ]);

        $error = $validate->fails();

        if (!$error){

            $route = Route::find($id);

            $route->route = $request->input('start-u').' - '.$request->input('end-u');
            $route->km = $request->input('km-u');
            $route->updated_at = date('Y-m-d H:i:s');

            $route->save();

            return Response::json([
                'status'    => 'success',
                'details'   => 'Ruta '.$route->route.' Actualizada exitosamente.',
                'data'      => $route
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

        $route = Route::find($id);

        $current = $route->status;
        if($current == 'active'){
            $route->status = 'inactive';
            $message = ' ha sido inhabilitado exitosamente.';
        }
        else{
            $route->status = 'active';
            $message = ' ha sido habilitado exitosamente.';
        }

        $route->save();
        $name = $route->name;

        return Response::json([
            'status'  => 'success',
            'details' => $name.$message,
            'data'    => null
        ], 200);
    }
}
