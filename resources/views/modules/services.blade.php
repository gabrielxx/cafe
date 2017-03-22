<div id="services" class="views">
	<h1 class="page-header">Servicios <small>Modulo de administracion de servicios.</small></h1>


	<div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="#modal-add-services" data-toggle="modal" class="btn btn-lg btn-icon btn-circle btn-primary btn-add"><i class="fa fa-plus"></i></a>
                </div>
                <h4 class="panel-title">Servicios</h4>
            </div>
            <div class="panel-body p-0">

            	<div class="table-responsive">
                    <table id="datatable-services" class="table table-hover table-condensed table-vmiddle bootgrid-table">
                        <thead>
                            <tr>
                                <th data-column-id="order">N° Orden</th>
                                <th data-column-id="ccoo" data-visible="false">CCOO</th>
                                <th data-column-id="week">Semana</th>
                                <th data-column-id="start_date">Fecha</th>
                                <th data-column-id="user">Usuario</th>
                                <th data-column-id="phone_number" data-visible="false">Telefono</th>
                                <th data-column-id="route_name">Ruta</th>
                                <th data-column-id="driver_name">Conductor</th>
                                <th data-column-id="condition" data-formatter="condition" data-sortable="false" data-header-align="center">Status</th>
                                <th data-column-id="commands" data-formatter="commands" data-sortable="false" data-searchable="false" data-header-align="right" data-align="right">Actions</th>
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