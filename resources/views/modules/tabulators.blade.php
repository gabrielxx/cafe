<div id="tabulators" class="views">

	<h1 class="page-header">Tabuladores <small>Modulo de administracion de tabuladores.</small></h1>

    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title" style="line-height: 34px;">Categoria 1 (Sencillo)</h4>
            </div>
            <div class="panel-body p-l-0 p-r-0">

                {!! Form::open(['route' => ['tabulators.update', '1'], 'method' => 'PUT', 'id' => 'form-edit-simple', 'class' => 'form-horizontal']) !!}

                    <div class="form-group m-b-0">
                        <label class="col-md-5 control-label text-left t-i-40">KM</label>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" name="km" class="form-control" placeholder="000.00">
                                <span class="input-group-addon">Bs.</span>
                            </div>
                            <div class="help-block"><small id="error-km"></small></div>
                        </div>
                    </div>

                    <div class="form-group m-b-0">
                        <label class="col-md-5 control-label text-left t-i-40">Espera (Hrs.)</label>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" name="wait" class="form-control" placeholder="000.00">
                                <span class="input-group-addon">Bs.</span>
                            </div>
                            <div class="help-block"><small id="error-wait"></small></div>
                        </div>
                    </div>

                    <div class="form-group m-b-0">
                        <label class="col-md-5 control-label text-left t-i-40">Disposicion (Hrs.)</label>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" name="disposition" class="form-control" placeholder="000.00">
                                <span class="input-group-addon">Bs.</span>
                            </div>
                            <div class="help-block"><small id="error-disposition"></small></div>
                        </div>
                    </div>

                    <div class="form-group m-b-0">
                        <label class="col-md-5 control-label text-left t-i-40">Carreras</label>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" name="sprint" class="form-control" placeholder="000.00">
                                <span class="input-group-addon">Bs.</span>
                            </div>
                            <div class="help-block"><small id="error-sprint"></small></div>
                        </div>
                    </div>

                    <div class="form-group m-b-0">
                        <label class="col-md-5 control-label text-left t-i-40">Pernocta</label>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" name="overnight" class="form-control" placeholder="000.00">
                                <span class="input-group-addon">Bs.</span>
                            </div>
                            <div class="help-block"><small id="error-overnight"></small></div>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group m-b-0">
                        <label class="col-md-5 control-label text-left t-i-40">Nocturnos</label>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" name="night" class="form-control" placeholder="000.00">
                                <span class="input-group-addon">%</span>
                            </div>
                            <div class="help-block"><small id="error-night"></small></div>
                        </div>
                    </div>

                    <div class="form-group m-b-0">
                        <label class="col-md-5 control-label text-left t-i-40">Feriados</label>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" name="holiday" class="form-control" placeholder="000.00">
                                <span class="input-group-addon">%</span>
                            </div>
                            <div class="help-block"><small id="error-holiday"></small></div>
                        </div>
                    </div>

                {!! Form::close() !!}

            </div>
            <div class="panel-footer" style="height: 56px;">
                <button type="button" data-form="form-edit-simple" class="btn btn-lg btn-icon btn-circle btn-inverse btn-add-center btn-update-tab">
                    <i class="fa fa-refresh"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title" style="line-height: 34px;">Categoria 2 (Lujo)</h4>
            </div>
            <div class="panel-body p-l-0 p-r-0">

                {!! Form::open(['route' => ['tabulators.update', '2'], 'method' => 'PUT', 'id' => 'form-edit-luxe', 'class' => 'form-horizontal']) !!}

                    <div class="form-group m-b-0">
                        <label class="col-md-5 control-label text-left t-i-40">KM</label>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" name="km" class="form-control" placeholder="000.00">
                                <span class="input-group-addon">Bs.</span>
                            </div>
                            <div class="help-block"><small id="error-km"></small></div>
                        </div>
                    </div>

                    <div class="form-group m-b-0">
                        <label class="col-md-5 control-label text-left t-i-40">Espera (Hrs.)</label>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" name="wait" class="form-control" placeholder="000.00">
                                <span class="input-group-addon">Bs.</span>
                            </div>
                            <div class="help-block"><small id="error-wait"></small></div>
                        </div>
                    </div>

                    <div class="form-group m-b-0">
                        <label class="col-md-5 control-label text-left t-i-40">Disposicion (Hrs.)</label>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" name="disposition" class="form-control" placeholder="000.00">
                                <span class="input-group-addon">Bs.</span>
                            </div>
                            <div class="help-block"><small id="error-disposition"></small></div>
                        </div>
                    </div>

                    <div class="form-group m-b-0">
                        <label class="col-md-5 control-label text-left t-i-40">Carreras</label>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" name="sprint" class="form-control" placeholder="000.00">
                                <span class="input-group-addon">Bs.</span>
                            </div>
                            <div class="help-block"><small id="error-sprint"></small></div>
                        </div>
                    </div>

                    <div class="form-group m-b-0">
                        <label class="col-md-5 control-label text-left t-i-40">Pernocta</label>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" name="overnight" class="form-control" placeholder="000.00">
                                <span class="input-group-addon">Bs.</span>
                            </div>
                            <div class="help-block"><small id="error-overnight"></small></div>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group m-b-0">
                        <label class="col-md-5 control-label text-left t-i-40">Nocturnos</label>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" name="night" class="form-control" placeholder="000.00">
                                <span class="input-group-addon">%</span>
                            </div>
                            <div class="help-block"><small id="error-night"></small></div>
                        </div>
                    </div>

                    <div class="form-group m-b-0">
                        <label class="col-md-5 control-label text-left t-i-40">Feriados</label>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" name="holiday" class="form-control" placeholder="000.00">
                                <span class="input-group-addon">%</span>
                            </div>
                            <div class="help-block"><small id="error-holiday"></small></div>
                        </div>
                    </div>

                {!! Form::close() !!}

            </div>
            <div class="panel-footer" style="height: 56px;">
                <button type="button" data-form="form-edit-luxe" class="btn btn-lg btn-icon btn-circle btn-inverse btn-add-center btn-update-tab">
                    <i class="fa fa-refresh"></i>
                </button>
            </div>
        </div>
    </div>

</div>
