<div id="subsidiaries" class="views">
	<h1 class="page-header">Filiales <small>Modulo de administracion de filiales.</small></h1>


	<div class="col-md-4">
        <div class="panel panel-danger">
            <div class="panel-heading bg-red">
                <h4 class="panel-title" style="line-height: 34px;">Agregar Filial</h4>
            </div>
            <div class="panel-body">

				{!! Form::open(['route' => 'subsidiaries.store', 'id' => 'form-add-subsidiaries', 'class' => 'form-horizontal']) !!}

                    <div class="form-group m-b-0">
                        <label class="col-md-5 control-label text-left">Nombre</label>
                        <div class="col-md-7">
                            <input type="text" name="name" class="form-control" placeholder="Nombre">
                        	<div class="help-block"><small id="error-name"></small></div>
                        </div>
                    </div>

                    <div class="form-group m-b-0">
                        <label class="col-md-5 control-label text-left">RIF</label>
                        <div class="col-md-7">
                            <input type="text" name="rif" class="form-control rif" placeholder="RIF" />
                        	<div class="help-block"><small id="error-rif"></small></div>
                        </div>
                    </div>

				{!! Form::close() !!}

            </div>
            <div class="panel-footer" style="height: 56px;">
				<button type="button" data-form="form-add-subsidiaries" class="btn btn-lg btn-icon btn-circle btn-danger btn-add-center btn-save">
					<i class="fa fa-plus"></i>
				</button>
            </div>
        </div>
    </div>

	<div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title" style="line-height: 34px;">Filiales</h4>
            </div>
            <div class="panel-body p-0">

            	<div class="table-responsive">
                    <table id="datatable-subsidiaries" class="table table-hover table-condensed table-vmiddle bootgrid-table">
                        <thead>
                            <tr>
                                <th data-column-id="name">Nombre</th>
                                <th data-column-id="rif">RIF</th>
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