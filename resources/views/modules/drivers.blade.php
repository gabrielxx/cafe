<div id="drivers" class="views">
	<h1 class="page-header">Conductores <small>Modulo de administracion de conductores.</small></h1>


	<div class="col-md-4">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title" style="line-height: 34px;">Agregar Conductor</h4>
            </div>
            <div class="panel-body">

				{!! Form::open(['route' => 'drivers.store', 'id' => 'form-add-drivers', 'class' => 'form-horizontal']) !!}

                    <div class="form-group m-b-0">
                        <label class="col-md-5 control-label text-left">Conductor</label>
                        <div class="col-md-7">
                            <input type="text" name="name" class="form-control" placeholder="Nombre">
                        	<div class="help-block"><small id="error-name"></small></div>
                        </div>
                    </div>

                    <div class="form-group m-b-0">
                        <label class="col-md-5 control-label text-left">CI</label>
                        <div class="col-md-7">
                            <input type="text" name="id" class="form-control" placeholder="Cedula de Identidad" />
                        	<div class="help-block"><small id="error-id"></small></div>
                        </div>
                    </div>

                    <div class="form-group m-b-0">
                        <label class="col-md-5 control-label text-left">Telefono</label>
                        <div class="col-md-7">
                            <input type="text" name="phone_number" class="form-control phone" placeholder="(0000) 000 0000" />
                        	<div class="help-block"><small id="error-phone_number"></small></div>
                        </div>
                    </div>

                    <div class="form-group m-b-0">
                        <label class="col-md-5 control-label text-left">Categoria</label>
                        <div class="col-md-7">
                            <select class="form-control selectpicker" data-size="10" title="Categoria" data-live-search="false" data-style="btn-white" name="category" style="width:100%;">
                                <option></option>
                                <option value="2">Lujo</option>
                                <option value="1">Sencillo</option>
                            </select>
                            <div class="help-block"><small id="error-category"></small></div>
                        </div>
                    </div>

                    <div class="form-group m-b-0">
                        <label class="col-md-5 control-label text-left">Tipo</label>
                        <div class="col-md-7">
                            <select class="form-control selectpicker" data-size="10" title="Tipo" data-live-search="false" data-style="btn-white" name="type" style="width:100%;">
                                <option></option>
                                <option value="Interno">Interno</option>
                                <option value="Registrado">Registrado</option>
                            </select>
                            <div class="help-block"><small id="error-category"></small></div>
                        </div>
                    </div>

				{!! Form::close() !!}

            </div>
            <div class="panel-footer" style="height: 56px;">
				<button type="button" data-form="form-add-drivers" class="btn btn-lg btn-icon btn-circle btn-success btn-add-center btn-save">
					<i class="fa fa-plus"></i>
				</button>
            </div>
        </div>
    </div>

	<div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title" style="line-height: 34px;">Conductores</h4>
            </div>
            <div class="panel-body p-0">

            	<div class="table-responsive">
                    <table id="datatable-drivers" class="table table-hover table-condensed table-vmiddle bootgrid-table">
                        <thead>
                            <tr>
                                <th data-column-id="name">Nombre</th>
                                <th data-column-id="phone_number">Telefono</th>
                                <th data-column-id="category">Categoria</th>
                                <th data-column-id="type">Tipo</th>
                                <th data-column-id="commands" data-formatter="commands" data-sortable="false" data-searchable="false" data-align="center" data-header-align="center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

</div>