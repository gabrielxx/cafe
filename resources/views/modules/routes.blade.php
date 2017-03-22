<div id="routes" class="views">
	<h1 class="page-header">Rutas <small>Modulo de administracion de rutas.</small></h1>


	<div class="col-md-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title" style="line-height: 34px;">Agregar Ruta</h4>
            </div>
            <div class="panel-body">

				{!! Form::open(['route' => 'routes.store', 'id' => 'form-add-routes', 'class' => 'form-horizontal']) !!}

                    <div class="form-group m-b-0">
                        <label class="col-md-5 control-label text-left">Origen</label>
                        <div class="col-md-7">
                            <input type="text" name="start" class="form-control" placeholder="Origen">
                        	<div class="help-block"><small id="error-start"></small></div>
                        </div>
                    </div>

                    <div class="form-group m-b-0">
                        <label class="col-md-5 control-label text-left">Destino</label>
                        <div class="col-md-7">
                            <input type="text" name="end" class="form-control" placeholder="Destino" />
                        	<div class="help-block"><small id="error-end"></small></div>
                        </div>
                    </div>

                    <div class="form-group m-b-0">
                        <label class="col-md-5 control-label text-left">Kilometraje</label>
                        <div class="col-md-7">
                            <input type="text" name="km" class="form-control" placeholder="Km" />
                        	<div class="help-block"><small id="error-km"></small></div>
                        </div>
                    </div>

				{!! Form::close() !!}

            </div>
            <div class="panel-footer" style="height: 56px;">
				<button type="button" data-form="form-add-routes" class="btn btn-lg btn-icon btn-circle btn-primary btn-add-center btn-save">
					<i class="fa fa-plus"></i>
				</button>
            </div>
        </div>
    </div>

	<div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title" style="line-height: 34px;">Rutas</h4>
            </div>
            <div class="panel-body p-0">

            	<div class="table-responsive">
                    <table id="datatable-routes" class="table table-hover table-condensed table-vmiddle bootgrid-table">
                        <thead>
                            <tr>
                                <th data-column-id="rating">ID</th>
                                <th data-column-id="route">Ruta</th>
                                <th data-column-id="km">Km</th>
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