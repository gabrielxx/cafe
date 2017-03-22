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

use App\Item;
use App\Tabulator;

class ItemsController extends Controller {

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

        $validate = Validator::make($request->all(), [
            'route_id'      => 'required|numeric',
            'km'            => 'required|numeric',
            'factor'        => 'required|numeric',
            'night'         => 'numeric',
            'holiday'       => 'numeric',
            'subtotal'      => 'required|numeric',
            'service_id'    => 'required|numeric',
        ]);

        $error = $validate->fails();

        if (!$error){

            $item = Item::create([
                'route_id'      => $request->input('route_id'),
                'km'            => $request->input('km'),
                'factor'        => $request->input('factor'),
                'night'         => $request->input('night'),
                'holiday'       => $request->input('holiday'),
                'subtotal'      => $request->input('subtotal'),
                'service_id'    => $request->input('service_id'),
                'updated_at'    => date('Y-m-d H:i:s'),
                'created_at'    => date('Y-m-d H:i:s')
            ]);

            if($request->input('night')==""){ $item->night = "0.00"; }
            if($request->input('holiday')==""){ $item->holiday = "0.00"; }

            $item->route;

            return Response::json([
                'status'    => 'success',
                'details'   => 'Servicio agregado.',
                'data'      => $item
            ], 200);
        }

        return Response::json([
            'status'  => 'error',
            'details' => $request->all(),
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

        $item = Item::find($id);

        Item::destroy($id);
        return Response::json([
            'status' => 'success',
            'details' => 'Servicio eliminado.',
            'data' => $item
        ]);
    }
}
