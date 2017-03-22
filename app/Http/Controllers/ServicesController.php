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

use App\Service;
use App\Tabulator;

class ServicesController extends Controller {

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

        $services = Service::where('company_id', session('company_id'))
                            ->where('status', 'active')
                            ->whereBetween('start_date', [session('db_year').'-01-01', session('db_year').'-12-31'])
                            ->get();

        foreach ($services as $service) {
            $service->driver_name   = $service->driver->name;
            $service->route_name    = $service->route->route;
            $service->start_date    = Carbon::createFromFormat('Y-m-d H:i:s', $service->start_date)->format('d/m/Y h:i A');
            $service->end_date      = Carbon::createFromFormat('Y-m-d H:i:s', $service->end_date)->format('d/m/Y h:i A');
        }
        return Response::json([
            'status'  => 'success',
            'details' => null,
            'data'    => $services
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
            'ccoo'          =>  'required',
            'user'          =>  'required',
            'user_id'       =>  'required',
            'phone_number'  =>  'required',
            'approver'      =>  'required',
            'approver_id'   =>  'required',
            'week'          =>  'required',
            'area'          =>  'required',
            'type'          =>  'required',
            'start_date'    =>  'required|date_format:d/m/Y H:i',
            'end_date'      =>  'required|date_format:d/m/Y H:i',
            'laggard'       =>  'boolean',
            'payment'       =>  'required',
            'route_id'      =>  'required',
            'subsidiary_id' =>  'required',
        ]);

        $error = $validate->fails();

        if (!$error){

            $start = Carbon::createFromFormat('d/m/Y H:i', $request->input('start_date'));
            $end = Carbon::createFromFormat('d/m/Y H:i', $request->input('end_date'));
            $order = $request->input('order');

            if ($request->input('laggard') == '1') {
                $week = $request->input('week').' (rezagada)';
            }
            else{
                $week = $request->input('week');
            }
            if($order=="" or is_null($order)){
                $count = Service::where('company_id', session('company_id'))->count();
                $order = session('company_id').'-SO-'.$count;
            }

            $service = Service::create([
                'order'         =>  $order,
                'ccoo'          =>  $request->input('ccoo'),
                'user'          =>  $request->input('user'),
                'user_id'       =>  $request->input('user_id'),
                'phone_number'  =>  $request->input('phone_number'),
                'contact'       =>  $request->input('contact'),
                'approver'      =>  $request->input('approver'),
                'approver_id'   =>  $request->input('approver_id'),
                'week'          =>  $week,
                'area'          =>  $request->input('area'),
                'type'          =>  $request->input('type'),
                'start_date'    =>  $start,
                'end_date'      =>  $end,
                'laggard'       =>  $request->input('laggard'),
                'payment'       =>  $request->input('payment'),
                'condition'     =>  'Pendiente',
                'status'        =>  'active',
                'route_id'      =>  $request->input('route_id'),
                'driver_id'     =>  $request->input('driver_id'),
                'internal_driver_id'     =>  $request->input('internal_driver_id'),
                'subsidiary_id' =>  $request->input('subsidiary_id'),
                'company_id'    =>  session('company_id'),

                'updated_at'    =>  date('Y-m-d H:i:s'),
                'created_at'    =>  date('Y-m-d H:i:s')
            ]);

            return Response::json([
                'status'    => 'success',
                'details'   => 'El servicio '.$service->order.' se ha guardado exitosamente.',
                'data'      => $service
            ], 200);
        }

        return Response::json([
            'status'  => 'error',
            'details' => $request->all(),
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

        $service = Service::find($id);
        $service->start_date    = Carbon::createFromFormat('Y-m-d H:i:s', $service->start_date)->format('d/m/Y H:i');
        $service->end_date      = Carbon::createFromFormat('Y-m-d H:i:s', $service->end_date)->format('d/m/Y H:i');
        $service->driver;
        $service->invoice;

        $items = $service->items;
        foreach ($items as $item) {
            $item->route;
        }

        if($service->driver->category == '1'){
            $tabulator = Tabulator::where('company_id', session('company_id'))->where('category', '1')->first();
        }
        if($service->driver->category == '2'){
            $tabulator = Tabulator::where('company_id', session('company_id'))->where('category', '2')->first();
        }

        $service->tabulator = $tabulator;

        return Response::json([
            'status'  => 'success',
            'details' => null,
            'data'    => $service
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
            'ccoo-u'          =>  'required',
            'user-u'          =>  'required',
            'user_id-u'       =>  'required',
            'phone_number-u'  =>  'required',
            'approver-u'      =>  'required',
            'approver_id-u'   =>  'required',
            'week-u'          =>  'required',
            'area-u'          =>  'required',
            'type-u'          =>  'required',
            'start_date-u'    =>  'required|date_format:d/m/Y H:i',
            'end_date-u'      =>  'required|date_format:d/m/Y H:i',
            'laggard-u'       =>  'boolean',
            'payment-u'       =>  'required',
            'route_id-u'      =>  'required',
            'subsidiary_id-u' =>  'required',
        ]);

        $error = $validate->fails();

        if (!$error){

            $start = Carbon::createFromFormat('d/m/Y H:i', $request->input('start_date-u'));
            $end = Carbon::createFromFormat('d/m/Y H:i', $request->input('end_date-u'));

            if ($request->input('laggard') == '1') {
                $week = $request->input('week-u').' (rezagada)';
            }
            else{
                $week = $request->input('week-u');
            }

            $service = Service::find($id);

            $service->order         =  $request->input('order-u');
            $service->ccoo          =  $request->input('ccoo-u');
            $service->user          =  $request->input('user-u');
            $service->user_id       =  $request->input('user_id-u');
            $service->phone_number  =  $request->input('phone_number-u');
            $service->contact       =  $request->input('contact-u');
            $service->approver      =  $request->input('approver-u');
            $service->approver_id   =  $request->input('approver_id-u');
            $service->week          =  $week;
            $service->area          =  $request->input('area-u');
            $service->type          =  $request->input('type-u');
            $service->start_date    =  $start;
            $service->end_date      =  $end;
            $service->laggard       =  $request->input('laggard-u');
            $service->payment       =  $request->input('payment-u');
            $service->route_id      =  $request->input('route_id-u');
            $service->driver_id     =  $request->input('driver_id-u');
            $service->internal_driver_id     =  $request->input('internal_driver_id-u');
            $service->subsidiary_id =  $request->input('subsidiary_id-u');
            $service->company_id    =  session('company_id');

            $service->updated_at    =  date('Y-m-d H:i:s');

            $service->save();

            return Response::json([
                'status'    => 'success',
                'details'   => 'El servicio '.$service->order.' se ha actualizado exitosamente.',
                'data'      => $service
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

        $service = Service::find($id);
        $current = $service->status;
        if($current == 'active'){
            $service->status = 'inactive';
            $message = ' ha sido inhabilitado exitosamente.';
        }
        else{
            $service->status = 'active';
            $message = ' ha sido habilitado exitosamente.';
        }

        $service->save();
        $order = $service->order;

        return Response::json([
            'status'  => 'success',
            'details' => 'El servicio '.$order.$message,
            'data'    => null
        ], 200);
    }
}
