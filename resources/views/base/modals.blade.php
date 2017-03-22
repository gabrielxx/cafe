


<!-- MODAL: ADD SERVICES -->

	<div class="modal fade" id="modal-add-services">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">Nuevo Servicio</h4>
				</div>
				<div class="modal-body" data-scrollbar="true" data-height="500px">
					{!! Form::open(['route' => 'services.store', 'id' => 'form-add-services', 'class' => 'form-horizontal']) !!}

						<div class="form-group m-b-0">
	                        <label class="col-md-3 control-label text-left t-i-40">N° Orden</label>
	                        <div class="col-md-8">
	                            <input type="text" name="order" class="form-control" placeholder="Codigo" />
	                        	<div class="help-block"><small id="error-order"></small></div>
	                        </div>
	                    </div>

	                    <div class="form-group m-b-0">
	                        <label class="col-md-3 control-label text-left t-i-40">CCOO</label>
	                        <div class="col-md-8">
	                            <input type="text" name="ccoo" class="form-control" placeholder="Codigo" />
	                        	<div class="help-block"><small id="error-ccoo"></small></div>
	                        </div>
	                    </div>

	                    <div class="form-group m-b-0">
	                        <label class="col-md-3 control-label text-left t-i-40">Usuario</label>
	                        <div class="col-md-8">
	                            <input type="text" name="user" class="form-control" placeholder="Nombre" id="usuario">
	                        	<div class="help-block"><small id="error-user"></small></div>
	                        </div>
	                    </div>

	                    <div class="form-group m-b-0">
	                        <label class="col-md-3 control-label text-left t-i-40">CI</label>
	                        <div class="col-md-8">
	                            <input type="text" name="user_id" class="form-control" placeholder="Cedula de Identidad (usuario)" />
	                        	<div class="help-block"><small id="error-user_id"></small></div>
	                        </div>
	                    </div>

	                    <div class="form-group m-b-0">
	                        <label class="col-md-3 control-label text-left t-i-40">Telefono</label>
	                        <div class="col-md-8">
	                            <input type="text" name="phone_number" class="form-control phone" placeholder="(0000) 000 0000" />
	                        	<div class="help-block"><small id="error-phone_number"></small></div>
	                        </div>
	                    </div>

	                    <div class="form-group m-b-0">
	                        <label class="col-md-3 control-label text-left t-i-40">Contacto</label>
	                        <div class="col-md-8">
	                            <input type="text" name="contact" class="form-control" placeholder="Nombre" id="contacto">
	                        	<div class="help-block"><small id="error-contact"></small></div>
	                        </div>
	                    </div>

	                    <div class="form-group m-b-0">
	                        <label class="col-md-3 control-label text-left t-i-40">Aprobador</label>
	                        <div class="col-md-8">
	                            <input type="text" name="approver" class="form-control" placeholder="Nombre">
	                        	<div class="help-block"><small id="error-approver"></small></div>
	                        </div>
	                    </div>

	                    <div class="form-group m-b-0">
	                        <label class="col-md-3 control-label text-left t-i-40">CI</label>
	                        <div class="col-md-8">
	                            <input type="text" name="approver_id" class="form-control" placeholder="Cedula de Identidad (aprobador)">
	                        	<div class="help-block"><small id="error-approver_id"></small></div>
	                        </div>
	                    </div>

	                    <div class="form-group m-b-0">
	                        <label class="col-md-3 control-label text-left t-i-40">Fecha</label>
	                        <div class="col-md-4">
	                            <div class="input-group date" id="start-date">
	                                <input type="text" name="start_date" class="form-control blur" placeholder="Salida">
	                                <span class="input-group-addon">
	                                    <span class="glyphicon glyphicon-calendar"></span>
	                                </span>
	                            </div>
	                        	<div class="help-block"><small id="error-start_date"></small></div>
	                        </div>
	                        <div class="col-md-4">
	                            <div class="input-group date" id="end-date">
	                                <input type="text" name="end_date" class="form-control blur" placeholder="Llegada">
	                                <span class="input-group-addon">
	                                    <span class="glyphicon glyphicon-calendar"></span>
	                                </span>
	                            </div>
	                        	<div class="help-block"><small id="error-end_date"></small></div>
	                        </div>
	                    </div>

	                    <div class="form-group m-b-0">
	                        <label class="col-md-3 control-label text-left t-i-40">Semana</label>
	                        <div class="col-md-3">
	                            <input type="text" name="week" class="form-control week" placeholder="Semana" />
	                        	<div class="help-block"><small id="error-week"></small></div>
	                        </div>
	                        <label class="col-md-4 control-label text-left p-l-0 laggard-toggle">
	                        	<i class="fa fa-circle-o fa-lg laggard-check"></i> &nbsp;&nbsp;Rezagada
	                        </label>
	                    	<input type="hidden" name="laggard" class="laggard-input">
	                    </div>

	                    <div class="form-group m-b-0">
	                        <label class="col-md-3 control-label text-left t-i-40">Area</label>
	                        <div class="col-md-8">
	                            <select name="area" class="form-control selectpicker" title="Area" style="width:100%;">
	                            	<option></option>
	                                <option value="Paria">Paria</option>
	                                <option value="Cumana">Cumana</option>
	                                <option value="Carupano">Carupano</option>
	                            </select>
	                        	<div class="help-block"><small id="error-area"></small></div>
	                        </div>
	                    </div>

	                    <div class="form-group m-b-0">
	                        <label class="col-md-3 control-label text-left t-i-40">Ruta</label>
	                        <div class="col-md-8">
	                            <select  name="route_id" class="form-control options-routes selectpicker" data-size="10" title="Rutas" data-live-search="true" data-style="btn-inverse" style="width:100%;">
	                            </select>
	                        	<div class="help-block"><small id="error-route_id"></small></div>
	                        </div>
	                    </div>

	                    <div class="form-group m-b-0">
	                        <label class="col-md-3 control-label text-left t-i-40">Conductor</label>
	                        <div class="col-md-8">
	                            <select name="driver_id" class="form-control options-drivers selectpicker" data-size="10" title="Conductor (Registrado)" data-live-search="true" data-style="btn-white" style="width:100%;">
	                            </select>
	                        	<div class="help-block"><small id="error-driver_id"></small></div>
	                        </div>
	                    </div>

	                    <div class="form-group m-b-0">
	                        <label class="col-md-3 control-label text-left t-i-40">Conductor</label>
	                        <div class="col-md-8">
	                            <select name="internal_driver_id" class="form-control options-drivers selectpicker" data-size="10" title="Conductor (Interno)" data-live-search="true" data-style="btn-white" style="width:100%;">
	                            </select>
	                        	<div class="help-block"><small id="error-internal_driver_id"></small></div>
	                        </div>
	                    </div>

	                    <div class="form-group m-b-0">
	                        <label class="col-md-3 control-label text-left t-i-40">Filial</label>
	                        <div class="col-md-8">
	                            <select name="subsidiary_id" class="form-control options-subsidiaries selectpicker" data-size="10" title="Filiales" data-live-search="true" data-style="btn-white" style="width:100%;">
	                            </select>
	                        	<div class="help-block"><small id="error-subsidiary_id"></small></div>
	                        </div>
	                    </div>

	                    <div class="form-group m-b-0">
	                        <label class="col-md-3 control-label text-left t-i-40">Pago</label>
	                        <div class="col-md-8">
	                            <select name="payment" class="form-control selectpicker" data-size="10" title="Pago" data-live-search="false" data-style="btn-white" style="width:100%;">
	                                <option></option>
	                                <option value="Credito">Credito</option>
	                                <option value="Contado">Contado</option>
	                            </select>
	                        	<div class="help-block"><small id="error-payment"></small></div>
	                        </div>
	                    </div>

	                    <div class="form-group m-b-0">
	                        <label class="col-md-3 control-label text-left t-i-40">Tipo</label>
	                        <div class="col-md-8">
	                            <select name="type" class="form-control selectpicker" data-size="10" title="Tipo" data-live-search="false" data-style="btn-white" style="width:100%;">
	                                <option></option>
	                                <option>Cambio de guardia</option>
	                                <option>Viaje sencillo</option>
	                                <option>Viaje con espera y retorno</option>
	                                <option>Viaje a disposicion</option>
	                                <option>Local sensillo</option>
	                                <option>Local con espera y retorno</option>
	                                <option>Local a disposicion</option>
	                            </select>
	                        	<div class="help-block"><small id="error-type"></small></div>
	                        </div>
	                    </div>

					{!! Form::close() !!}
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-sm btn-primary btn-save" data-form="form-add-services">Guardar</a>
					<button type="button" class="btn btn-sm btn-white btn-cancel" data-dismiss="modal">Cerrar</a>
				</div>
			</div>
		</div>
	</div>


<!-- MODAL: UPDATE SERVICES -->

	<div class="modal fade" id="modal-edit-services">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">Editar Servicio</h4>
				</div>
				<div class="modal-body" data-scrollbar="true" data-height="500px">
					{!! Form::open(['route' => ['services.update', ':UI'], 'method' => 'PUT', 'id' => 'form-edit-services', 'class' => 'form-horizontal']) !!}

						<div class="form-group m-b-0">
	                        <label class="col-md-3 control-label text-left t-i-40">N° Orden</label>
	                        <div class="col-md-8">
	                            <input type="text" name="order-u" class="form-control" placeholder="Codigo" />
	                        	<div class="help-block"><small id="error-order-u"></small></div>
	                        </div>
	                    </div>

	                    <div class="form-group m-b-0">
	                        <label class="col-md-3 control-label text-left t-i-40">CCOO</label>
	                        <div class="col-md-8">
	                            <input type="text" name="ccoo-u" class="form-control" placeholder="Codigo" />
	                        	<div class="help-block"><small id="error-ccoo-u"></small></div>
	                        </div>
	                    </div>

	                    <div class="form-group m-b-0">
	                        <label class="col-md-3 control-label text-left t-i-40">Usuario</label>
	                        <div class="col-md-8">
	                            <input type="text" name="user-u" class="form-control" placeholder="Nombre" id="usuario-u">
	                        	<div class="help-block"><small id="error-user-u"></small></div>
	                        </div>
	                    </div>

	                    <div class="form-group m-b-0">
	                        <label class="col-md-3 control-label text-left t-i-40">CI</label>
	                        <div class="col-md-8">
	                            <input type="text" name="user_id-u" class="form-control" placeholder="Cedula de Identidad (usuario)" />
	                        	<div class="help-block"><small id="error-user_id-u"></small></div>
	                        </div>
	                    </div>

	                    <div class="form-group m-b-0">
	                        <label class="col-md-3 control-label text-left t-i-40">Telefono</label>
	                        <div class="col-md-8">
	                            <input type="text" name="phone_number-u" class="form-control phone" placeholder="(0000) 000 0000" />
	                        	<div class="help-block"><small id="error-phone_number-u"></small></div>
	                        </div>
	                    </div>

	                    <div class="form-group m-b-0">
	                        <label class="col-md-3 control-label text-left t-i-40">Contacto</label>
	                        <div class="col-md-8">
	                            <input type="text" name="contact-u" class="form-control" placeholder="Nombre" id="contacto-u">
	                        	<div class="help-block"><small id="error-contact-u"></small></div>
	                        </div>
	                    </div>

	                    <div class="form-group m-b-0">
	                        <label class="col-md-3 control-label text-left t-i-40">Aprobador</label>
	                        <div class="col-md-8">
	                            <input type="text" name="approver-u" class="form-control" placeholder="Nombre">
	                        	<div class="help-block"><small id="error-approver-u"></small></div>
	                        </div>
	                    </div>

	                    <div class="form-group m-b-0">
	                        <label class="col-md-3 control-label text-left t-i-40">CI</label>
	                        <div class="col-md-8">
	                            <input type="text" name="approver_id-u" class="form-control" placeholder="Cadula de Identidad (aprobador)">
	                        	<div class="help-block"><small id="error-approver_id-u"></small></div>
	                        </div>
	                    </div>

	                    <div class="form-group m-b-0">
	                        <label class="col-md-3 control-label text-left t-i-40">Fecha</label>
	                        <div class="col-md-4">
	                            <div class="input-group date" id="start-date-u">
	                                <input type="text" name="start_date-u" class="form-control blur" placeholder="Salida">
	                                <span class="input-group-addon">
	                                    <span class="glyphicon glyphicon-calendar"></span>
	                                </span>
	                            </div>
	                        	<div class="help-block"><small id="error-start_date-u"></small></div>
	                        </div>
	                        <div class="col-md-4">
	                            <div class="input-group date" id="end-date-u">
	                                <input type="text" name="end_date-u" class="form-control blur" placeholder="Llegada">
	                                <span class="input-group-addon">
	                                    <span class="glyphicon glyphicon-calendar"></span>
	                                </span>
	                            </div>
	                        	<div class="help-block"><small id="error-end_date-u"></small></div>
	                        </div>
	                    </div>

	                    <div class="form-group m-b-0">
	                        <label class="col-md-3 control-label text-left t-i-40">Semana</label>
	                        <div class="col-md-3">
	                            <input type="text" name="week-u" class="form-control week" placeholder="Semana" />
	                        	<div class="help-block"><small id="error-week-u"></small></div>
	                        </div>
	                        <label class="col-md-4 control-label text-left p-l-0 laggard-toggle-u">
	                        	<i class="fa fa-circle-o fa-lg laggard-check-u"></i> &nbsp;&nbsp;Rezagada
	                        </label>
	                    	<input type="hidden" name="laggard-u" class="laggard-input-u">
	                    </div>

	                    <div class="form-group m-b-0">
	                        <label class="col-md-3 control-label text-left t-i-40">Area</label>
	                        <div class="col-md-8">
	                            <select name="area-u" class="form-control selectpicker" style="width:100%;">
	                                <option value="Paria">Paria</option>
	                                <option value="Cumana">Cumana</option>
	                                <option value="Carupano">Carupano</option>
	                            </select>
	                        	<div class="help-block"><small id="error-area-u"></small></div>
	                        </div>
	                    </div>

	                    <div class="form-group m-b-0">
	                        <label class="col-md-3 control-label text-left t-i-40">Ruta</label>
	                        <div class="col-md-8">
	                            <select  name="route_id-u" class="form-control options-routes selectpicker" data-size="10" title="Rutas" data-live-search="true" data-style="btn-inverse" style="width:100%;">
	                            </select>
	                        	<div class="help-block"><small id="error-route_id-u"></small></div>
	                        </div>
	                    </div>

	                    <div class="form-group m-b-0">
	                        <label class="col-md-3 control-label text-left t-i-40">Conductor</label>
	                        <div class="col-md-8">
	                            <select name="driver_id-u" class="form-control options-drivers selectpicker" data-size="10" title="Conductor (Registrado)" data-live-search="true" data-style="btn-white" style="width:100%;">
	                            </select>
	                        	<div class="help-block"><small id="error-driver_id-u"></small></div>
	                        </div>
	                    </div>

	                    <div class="form-group m-b-0">
	                        <label class="col-md-3 control-label text-left t-i-40">Conductor</label>
	                        <div class="col-md-8">
	                            <select name="internal_driver_id-u" class="form-control options-drivers selectpicker" data-size="10" title="Conductor (Interno)" data-live-search="true" data-style="btn-white" style="width:100%;">
	                            </select>
	                        	<div class="help-block"><small id="error-internal_driver_id-u"></small></div>
	                        </div>
	                    </div>

	                    <div class="form-group m-b-0">
	                        <label class="col-md-3 control-label text-left t-i-40">Filial</label>
	                        <div class="col-md-8">
	                            <select name="subsidiary_id-u" class="form-control options-subsidiaries selectpicker" data-size="10" title="Filiales" data-live-search="true" data-style="btn-white" style="width:100%;">
	                            </select>
	                        	<div class="help-block"><small id="error-subsidiary_id-u"></small></div>
	                        </div>
	                    </div>

	                    <div class="form-group m-b-0">
	                        <label class="col-md-3 control-label text-left t-i-40">Pago</label>
	                        <div class="col-md-8">
	                            <select name="payment-u" class="form-control selectpicker" data-size="10" title="Pago" data-live-search="false" data-style="btn-white" style="width:100%;">
	                                <option></option>
	                                <option value="Credito">Credito</option>
	                                <option value="Contado">Contado</option>
	                            </select>
	                        	<div class="help-block"><small id="error-payment-u"></small></div>
	                        </div>
	                    </div>

	                    <div class="form-group m-b-0">
	                        <label class="col-md-3 control-label text-left t-i-40">Tipo</label>
	                        <div class="col-md-8">
	                            <select name="type-u" class="form-control selectpicker" data-size="10" title="Tipo" data-live-search="false" data-style="btn-white" style="width:100%;">
	                                <option></option>
	                                <option>Cambio de guardia</option>
	                                <option>Viaje sencillo</option>
	                                <option>Viaje con espera y retorno</option>
	                                <option>Viaje a disposicion</option>
	                                <option>Local sensillo</option>
	                                <option>Local con espera y retorno</option>
	                                <option>Local a disposicion</option>
	                            </select>
	                        	<div class="help-block"><small id="error-type-u"></small></div>
	                        </div>
	                    </div>

					{!! Form::close() !!}
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-sm btn-primary btn-update" data-form="form-edit-services">Guardar</a>
					<button type="button" class="btn btn-sm btn-white btn-cancel" data-dismiss="modal">Cerrar</a>
				</div>
			</div>
		</div>
	</div>


<!-- MODAL: INVOICE SERVICES -->

	<div class="modal fade" id="modal-invoice-services">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">Servicio: <span id="order-title"></span><small id="driver-title"></small>
						<span class="pull-right m-r-20">Bs. <span id="total-title"></span></span>
					</h4>
				</div>
				<div class="modal-body" data-scrollbar="true" data-height="500px">

					<div class="row">
						<div class="col-md-12">
					        <div class="panel panel-default">
					            <div class="panel-heading" style="background-color: #e2e7eb;">
					                <div class="panel-heading-btn">
					                    <button data-form="form-add-items" class="btn btn-lg btn-icon btn-circle btn-primary btn-add btn-add-item"><i class="fa fa-plus"></i></button>
					                </div>
					                <h4 class="panel-title">Rutas</h4>
					            </div>
					            <div class="panel-body" style="border-style: solid; border-color: #e2e7eb; border-width: 1px; border-bottom-left-radius: 4px; border-bottom-right-radius: 4px;">
									{!! Form::open(['route' => 'items.store', 'id' => 'form-add-items', 'class' => 'form-inline']) !!}

										<input type="hidden" name="service_id" class="input-service-id">
										<input type="hidden" name="factor" class="input-factor">

										<div class="form-group m-r-10 col-md-4 p-0">
											<select id="route-invoice-select" name="route_id" class="form-control options-routes selectpicker" data-size="10" title="Rutas" data-live-search="true" data-style="btn-default" style="width:100%;">
		                            		</select>
										</div>

										<div class="form-group m-r-10 col-md-5 p-0">
											<div class="form-group m-r-10">
												<input type="text" name="km" id="input_km" class="form-control" placeholder="km" style="width: 70px;">
											</div>

											<div class="form-group m-r-10">
												<input type="text" name="night" id="input_night" readonly class="form-control hand" placeholder="RN" style="width: 100px;">
											</div>

											<div class="form-group m-r-10">
												<input type="text" name="holiday" id="input_holiday" readonly class="form-control hand" placeholder="RFFV" style="width: 100px;">
											</div>


										</div>

										<div class="form-group m-r-10 col-md-2 p-0 pull-right">
											<div class="input-group">
												<input type="text" name="subtotal" readonly class="form-control" placeholder="Subtotal" style="width: 100%;">
												<span class="input-group-addon">Bs.</span>
											</div>
										</div>
									{!! Form::close() !!}
					            </div>
					        </div>
					    </div>
					</div>

					<div class="row">
					    <div class="col-md-12">
					    	<div class="table-responsive m-b-20" style="border-style: solid; border-color: #e2e7eb; border-width: 1px; border-radius: 4px;">
						    	<table class="table table-hover m-b-0">
		                            <thead>
		                                <tr>
		                                    <th>Ruta</th>
		                                    <th>Km</th>
		                                    <th>Factor</th>
		                                    <th>Nocturno</th>
		                                    <th>Feriado</th>
		                                    <th>Subtotal</th>
		                                    <th class="text-center">Eliminar</th>
		                                </tr>
		                            </thead>
		                            <tbody id="table-items">

		                            </tbody>
		                        </table>
					    	</div>
					    </div>
					</div>

					<div class="row">
						<div class="col-md-12">
					        <div class="panel panel-inverse">
					            <div class="panel-heading">
					                <h4 class="panel-title">Miscelaneos</h4>
					            </div>
					            <div class="panel-body p-l-0 p-r-0 p-b-0" style="border-style: solid; border-color: #e2e7eb; border-width: 1px; border-bottom-left-radius: 4px; border-bottom-right-radius: 4px;">
									{!! Form::open(['route' => 'invoices.store', 'id' => 'form-add-invoices', 'class' => 'form-inline']) !!}

										<input type="hidden" name="service_id" class="input-service-id">
										<input type="hidden" name="total_routes" class="input-total">
										<input type="hidden" name="total">

										<div class="row" style="width: 100%; margin: 0px 0px 0px 0px;">
											<div class="form-group col-md-2 p-l-15 p-r-15">
												<button type="button" class="btn btn-inverse btn-block">Espera</button>
											</div>
											<div class="form-group col-md-5">
												<div class="form-group m-r-10">
													<input type="text" name="wait_daytime" class="form-control" placeholder="Min" style="width: 100px;">
												</div>
												<div class="form-group m-r-10">
													<input type="text" name="wait_night" class="form-control" placeholder="Noct." style="width: 100px;">
												</div>
												<div class="form-group m-r-10">
													<input type="text" name="wait_holiday" readonly class="form-control hand" placeholder="RFFV" style="width: 100px;">
												</div>
											</div>
											<div class="form-group col-md-5 p-l-15 p-r-15">
												<div class="input-group pull-right">
													<input type="text" name="wait_night_subtotal" readonly class="form-control" placeholder="Subt. Noct." style="width: 100px;">
													<span class="input-group-addon">Bs.</span>
												</div>

												<div class="input-group pull-right m-r-10">
													<input type="text" name="wait_daytime_subtotal" readonly class="form-control" placeholder="Subt. Diur." style="width: 100px;">
													<span class="input-group-addon">Bs.</span>
												</div>
											</div>
										</div>

										<hr>

										<div class="row" style="width: 100%; margin: 0px 0px 0px 0px;">
											<div class="form-group col-md-2 p-l-15 p-r-15">
												<button type="button" class="btn btn-inverse btn-block">Disposicion</button>
											</div>
											<div class="form-group col-md-5">
												<div class="form-group m-r-10">
													<input type="text" name="disposition_daytime" class="form-control" placeholder="Min" style="width: 100px;">
												</div>
												<div class="form-group m-r-10">
													<input type="text" name="disposition_night" class="form-control" placeholder="Noct." style="width: 100px;">
												</div>
												<div class="form-group m-r-10">
													<input type="text" name="disposition_holiday" readonly class="form-control hand" placeholder="RFFV" style="width: 100px;">
												</div>
											</div>
											<div class="form-group col-md-5 p-l-15 p-r-15">
												<div class="input-group pull-right">
													<input type="text" name="disposition_night_subtotal" readonly class="form-control" placeholder="Subt. Noct." style="width: 100px;">
													<span class="input-group-addon">Bs.</span>
												</div>
												<div class="input-group pull-right m-r-10">
													<input type="text" name="disposition_daytime_subtotal" readonly class="form-control" placeholder="Subt. Diur." style="width: 100px;">
													<span class="input-group-addon">Bs.</span>
												</div>
											</div>
										</div>

										<hr>

										<div class="row" style="width: 100%; margin: 0px 0px 0px 0px;">
											<div class="form-group col-md-2 p-l-15 p-r-15">
												<button type="button" class="btn btn-inverse btn-block">Carreras</button>
											</div>
											<div class="form-group col-md-5">
												<div class="form-group m-r-10">
													<input type="text" name="sprint_daytime" class="form-control" placeholder="Min" style="width: 100px;">
												</div>
												<div class="form-group m-r-10">
													<input type="text" name="sprint_night" class="form-control" placeholder="Noct." style="width: 100px;">
												</div>
												<div class="form-group m-r-10">
													<input type="text" name="sprint_holiday" readonly class="form-control hand" placeholder="RFFV" style="width: 100px;">
												</div>
											</div>
											<div class="form-group col-md-5 p-l-15 p-r-15">
												<div class="input-group pull-right">
													<input type="text" name="sprint_night_subtotal" readonly class="form-control" placeholder="Subt. Noct." style="width: 100px;">
													<span class="input-group-addon">Bs.</span>
												</div>
												<div class="input-group pull-right m-r-10">
													<input type="text" name="sprint_daytime_subtotal" readonly class="form-control" placeholder="Subt. Diur." style="width: 100px;">
													<span class="input-group-addon">Bs.</span>
												</div>
											</div>
										</div>

										<hr>

										<div class="row m-b-20" style="width: 100%; margin: 0px 0px 0px 0px;">
											<div class="form-group col-md-3 p-l-15 p-r-15">
												<button type="button" class="btn btn-inverse btn-block">Recorrido Nocturno</button>
											</div>
											<div class="form-group col-md-6">
												<div class="form-group m-r-10">
													<input type="text" name="night_tour" class="form-control" placeholder="Min" style="width: 100px;">
												</div>
												<div class="form-group m-r-10">
													<input type="text" name="overnight" class="form-control hand" readonly placeholder="Pernocta" style="width: 100px;">
												</div>
											</div>
											<div class="form-group col-md-3 p-l-15 p-r-15">
												<div class="input-group pull-right">
													<input type="text" name="night_tour_subtotal" readonly class="form-control" placeholder="Subt. RN." style="width: 100px;">
													<span class="input-group-addon">Bs.</span>
												</div>
											</div>
										</div>

										<input type="hidden" name="factor_wait_daytime">
										<input type="hidden" name="factor_wait_night">
										<input type="hidden" name="factor_disposition_daytime">
										<input type="hidden" name="factor_disposition_night">
										<input type="hidden" name="factor_sprint_daytime">
										<input type="hidden" name="factor_sprint_night">
										<input type="hidden" name="factor_night_tour">

									{!! Form::close() !!}
					            </div>
					        </div>
					    </div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" data-print="true" class="btn btn-sm btn-success btn-save-invoice" data-form="form-add-invoices">Guardar e Imprimir</a>
					<button type="button" data-print="false" class="btn btn-sm btn-primary btn-save-invoice" data-form="form-add-invoices">Guardar</a>
					<button type="button" class="btn btn-sm btn-white btn-cancel" data-dismiss="modal">Cerrar</a>
				</div>
			</div>
		</div>
	</div>


<!-- MODAL: UPDATE DRIVER -->

	<div class="modal fade" id="modal-edit-drivers">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">Editar Conductor</h4>
				</div>
				<div class="modal-body">
					{!! Form::open(['route' => ['drivers.update', ':UI'], 'method' => 'PUT', 'id' => 'form-edit-drivers', 'class' => 'form-horizontal']) !!}

	                    <div class="form-group m-b-0">
	                        <label class="col-md-5 control-label text-left">Conductor</label>
	                        <div class="col-md-7">
	                            <input type="text" name="name-u" class="form-control" placeholder="Nombre">
	                        	<div class="help-block"><small id="error-name-u"></small></div>
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
	                            <input type="text" name="phone_number-u" class="form-control phone" placeholder="(0000) 000 0000" />
	                        	<div class="help-block"><small id="error-phone_number-u"></small></div>
	                        </div>
	                    </div>

	                    <div class="form-group m-b-0">
	                        <label class="col-md-5 control-label text-left">Categoria</label>
	                        <div class="col-md-7">
	                            <select class="form-control selectpicker" data-size="10" title="Categoria" data-live-search="false" data-style="btn-white" name="category-u" style="width:100%;">
	                                <option></option>
	                                <option value="2">Lujo</option>
	                                <option value="1">Sencillo</option>
	                            </select>
	                        	<div class="help-block"><small id="error-category-u"></small></div>
	                        </div>
	                    </div>

	                    <div class="form-group m-b-0">
	                        <label class="col-md-5 control-label text-left">Tipo</label>
	                        <div class="col-md-7">
	                            <select class="form-control selectpicker" data-size="10" title="Tipo" data-live-search="false" data-style="btn-white" name="type-u" style="width:100%;">
	                                <option></option>
	                                <option value="Interno">Interno</option>
	                                <option value="Registrado">Registrado</option>
	                            </select>
	                        	<div class="help-block"><small id="error-category-u"></small></div>
	                        </div>
	                    </div>

					{!! Form::close() !!}
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-sm btn-primary btn-update" data-form="form-edit-drivers">Guardar</a>
					<button type="button" class="btn btn-sm btn-white btn-cancel" data-dismiss="modal">Cerrar</a>
				</div>
			</div>
		</div>
	</div>


<!-- MODAL: UPDATE ROUTE -->

	<div class="modal fade" id="modal-edit-routes">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">Editar Ruta</h4>
				</div>
				<div class="modal-body">
					{!! Form::open(['route' => ['routes.update', ':UI'], 'method' => 'PUT', 'id' => 'form-edit-routes', 'class' => 'form-horizontal']) !!}

	                    <div class="form-group m-b-0">
	                        <label class="col-md-5 control-label text-left">Origen</label>
	                        <div class="col-md-7">
	                            <input type="text" name="start-u" class="form-control" placeholder="Origen">
	                        	<div class="help-block"><small id="error-start-u"></small></div>
	                        </div>
	                    </div>

	                    <div class="form-group m-b-0">
	                        <label class="col-md-5 control-label text-left">Destino</label>
	                        <div class="col-md-7">
	                            <input type="text" name="end-u" class="form-control" placeholder="Destino" />
	                        	<div class="help-block"><small id="error-end-u"></small></div>
	                        </div>
	                    </div>

	                    <div class="form-group m-b-0">
	                        <label class="col-md-5 control-label text-left">Kilometraje</label>
	                        <div class="col-md-7">
	                            <input type="text" name="km-u" class="form-control" placeholder="Km" />
	                        	<div class="help-block"><small id="error-km-u"></small></div>
	                        </div>
	                    </div>

					{!! Form::close() !!}
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-sm btn-primary btn-update" data-form="form-edit-routes">Guardar</a>
					<button type="button" class="btn btn-sm btn-white btn-cancel" data-dismiss="modal">Cerrar</a>
				</div>
			</div>
		</div>
	</div>


<!-- MODAL: UPDATE SUBSIDIARY -->

	<div class="modal fade" id="modal-edit-subsidiaries">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">Editar Filial</h4>
				</div>
				<div class="modal-body">
					{!! Form::open(['route' => ['subsidiaries.update', ':UI'], 'method' => 'PUT', 'id' => 'form-edit-subsidiaries', 'class' => 'form-horizontal']) !!}

	                    <div class="form-group m-b-0">
	                        <label class="col-md-5 control-label text-left">Nombre</label>
	                        <div class="col-md-7">
	                            <input type="text" name="name-u" class="form-control" placeholder="Nombre">
	                        	<div class="help-block"><small id="error-name-u"></small></div>
	                        </div>
	                    </div>

	                    <div class="form-group m-b-0">
	                        <label class="col-md-5 control-label text-left">Rif</label>
	                        <div class="col-md-7">
	                            <input type="text" name="rif-u" class="form-control rif" placeholder="RIF" />
	                        	<div class="help-block"><small id="error-rif-u"></small></div>
	                        </div>
	                    </div>

					{!! Form::close() !!}
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-sm btn-primary btn-update" data-form="form-edit-subsidiaries">Guardar</a>
					<button type="button" class="btn btn-sm btn-white btn-cancel" data-dismiss="modal">Cerrar</a>
				</div>
			</div>
		</div>
	</div>





{!! Form::open(['route' => ['services.destroy', ':UI'], 'method' => 'DELETE', 'id' => 'form-delete-services']) !!}
{!! Form::close() !!}

{!! Form::open(['route' => ['drivers.destroy', ':UI'], 'method' => 'DELETE', 'id' => 'form-delete-drivers']) !!}
{!! Form::close() !!}

{!! Form::open(['route' => ['routes.destroy', ':UI'], 'method' => 'DELETE', 'id' => 'form-delete-routes']) !!}
{!! Form::close() !!}

{!! Form::open(['route' => ['subsidiaries.destroy', ':UI'], 'method' => 'DELETE', 'id' => 'form-delete-subsidiaries']) !!}
{!! Form::close() !!}

{!! Form::open(['route' => ['items.destroy', ':UI'], 'method' => 'DELETE', 'id' => 'form-delete-items']) !!}
{!! Form::close() !!}

