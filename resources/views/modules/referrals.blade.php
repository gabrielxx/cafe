<div id="referrals" class="views">

	<h1 class="page-header">Remisiones <small>Modulo de administracion de remisiones.</small></h1>

    <div class="col-md-4 col-md-offset-4 m-t-40">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title" style="line-height: 34px;">Consultar</h4>
            </div>
            <div class="panel-body p-l-0 p-r-0">

                {!! Form::open(['route' => 'referrals.store', 'id' => 'form-referrals', 'class' => 'form-horizontal', 'target' => '_blank']) !!}
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
                            <div class="help-block"><small id="error-area"></small></div>
                        </div>
                    </div>

                    <div class="form-group m-b-0">
                        <label class="col-md-4 control-label text-left t-i-40">FILIAL</label>
                        <div class="col-md-7">
                            <select name="subsidiary_id" class="form-control options-subsidiaries selectpicker" data-size="10" title="Filiales" data-live-search="true" data-style="btn-white" style="width:100%;">
                            </select>
                            <div class="help-block"><small id="error-subsidiary_id"></small></div>
                        </div>
                    </div>

                    <input type="hidden" name="type">

                {!! Form::close() !!}

            </div>
            <div class="panel-footer text-right" style="height: 56px;">
                <button type="submit" data-type="excel" class="btn btn-sm btn-success m-r-5 btn-referrals" data-form="form-referrals">Excel
                </button>
                <button type="submit" data-type="pdf" class="btn btn-sm btn-danger btn-referrals" data-form="form-referrals">PDF
                </button>
            </div>
        </div>
    </div>

</div>