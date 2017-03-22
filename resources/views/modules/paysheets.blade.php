<div id="paysheets" class="views">

	<h1 class="page-header">Nominas <small>Modulo de administracion de nominas.</small></h1>

    <div class="col-md-6 col-md-offset-3 m-t-40">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title" style="line-height: 34px;">Consultar</h4>
            </div>
            <div class="panel-body p-l-0 p-r-0">

                {!! Form::open(['route' => 'paysheets.store', 'id' => 'form-paysheets', 'class' => 'form-horizontal', 'target' => '_blank']) !!}

                    <div class="form-group m-b-0">
                        <label class="col-md-4 control-label text-left t-i-40">CONDUCTOR</label>
                        <div class="col-md-7">
                            <select name="driver_id" class="form-control options-drivers selectpicker" data-size="10" title="Conductor" data-live-search="true" data-style="btn-default" style="width:100%;">
                                <option></option>
                            </select>
                            <div class="help-block"><small></small></div>
                        </div>
                    </div>

                    <div class="form-group m-b-0">
                        <label class="col-md-4 control-label text-left t-i-40">PAGO</label>
                        <div class="col-md-7">
                            <select name="payment" class="form-control selectpicker" data-size="10" title="Pago" data-live-search="false" data-style="btn-white" style="width:100%;">
                                <option></option>
                                <option value="Credito">Credito</option>
                                <option value="Contado">Contado</option>
                            </select>
                            <div class="help-block"><small></small></div>
                        </div>
                    </div>

                    <div class="form-group m-b-0">
                        <label class="col-md-4 control-label text-left t-i-40">SEMANA</label>
                        <div class="col-md-7">
                            <select name="week" class="form-control selectpicker" data-size="10" title="Semana" data-live-search="false" data-style="btn-white" style="width:100%;">
                            </select>
                            <div class="help-block"><small></small></div>
                        </div>
                    </div>

                    <div class="form-group m-b-0">
                        <label class="col-md-4 control-label text-left t-i-40">AREA</label>
                        <div class="col-md-7">
                            <select name="area" class="form-control selectpicker" title="Area" data-style="btn-white" style="width:100%;">
                                <option></option>
                                <option value="Paria">Paria</option>
                                <option value="Cumana">Cumana</option>
                            </select>
                            <div class="help-block"><small></small></div>
                        </div>
                    </div>

                    <div class="form-group m-b-0">
                        <label class="col-md-4 control-label text-left t-i-40">FILIAL</label>
                        <div class="col-md-7">
                            <select name="subsidiary_id" class="form-control options-subsidiaries selectpicker" data-size="10" title="Filiales" data-live-search="true" data-style="btn-white" style="width:100%;">
                            </select>
                            <div class="help-block"><small></small></div>
                        </div>
                    </div>


                    <div class="form-group m-b-0">
                        <label class="col-md-6 col-md-offset-5 control-label text-left drivers-toggle">
                        	<i class="fa fa-circle-o fa-lg drivers-check"></i> &nbsp;&nbsp;Todos los conductores
                        </label>
                    	<input type="hidden" name="all_drivers" class="drivers-input">
                    </div>

                    <div class="form-group m-b-0">
                        <label class="col-md-6 col-md-offset-5 control-label text-left subsidiaries-toggle">
                        	<i class="fa fa-circle-o fa-lg subsidiaries-check"></i> &nbsp;&nbsp;Todas las filiales
                        </label>
                    	<input type="hidden" name="all_subsidiaries" class="subsidiaries-input">
                    </div>


                {!! Form::close() !!}

            </div>
            <div class="panel-footer text-right" style="height: 56px;">
                <button type="submit" data-type="excel" class="btn btn-sm btn-success m-r-5 btn-paysheets" data-form="form-paysheets">Excel
                </button>
            </div>
        </div>
    </div>

</div>