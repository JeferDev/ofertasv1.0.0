<!-- CONTENEDOR DE PAGINA -->
<div class="content-wrapper">
    <!-- CONTENIDO DE HEADER -->
    <section class="content-header">
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0">Registro de Proceso.</h1>
						</div>
					</div>
				</div>
			</div>
	</section>
	<!-- Contenido principal -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-body">

						<!-- Crea el panel de navegación para las pestañas -->
						<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="pills-tab1" data-toggle="pill" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true">Informacion Basica</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="pills-tab2" data-toggle="pill" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">Cronograma</a>
							</li>
						</ul>

						<!-- Crea las pestañas y los campos de formulario para cada pestaña -->
						<div class="tab-content" id="pills-tabContent">
							<div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="pills-tab1">
								
								<!-- Formulario de informacion basica -->
						
								<form role="form" method="POST">
									<div class="col-sm-6">
										<div class="form-group">
											<label for="objeto">Objeto</label>
											<input type="text" class="form-control" id="objeto" name="objeto">
										</div>
										
										<label for="nombre_segmento">Actividad</label>
										
										<!-- Se realiza llamado al controlador para llenar el select con informacion de la base de datos -->
						
										<select name="nombre_segmento"id="nombre_segmento" class="form-control" >
												<option></option>
												<?php
												$proceso=ControladorProcesos::ctrlConsultarSegmento();
												foreach($proceso as $key=>$value){
													echo'<option value="'.$value["nombre_segmento"].'">'.$value["nombre_segmento"].'</option>';
												}
												?>
										</select>

										<div class="form-group">
											<label for="descripcion">Descripcion</label>
											<textarea name="descripcion" id="descripcion" class="form-control" rows="3" placeholder="Escriba una descripcion del proceso"></textarea>
										</div>
										<div class="form-group">
											<label for="moneda">Moneda</label>
											<select name="moneda" class="form-control" >
                                                <option></option>
                                                <option value="COP">COP</option>
                                                <option value="USD">USD</option>
                                                <option value="EUR">EUR</option>
											</select>
										</div>
										<div class="form-group">
											<label for="presupuesto">Presupuesto</label>
											<input type="number" name="presupuesto" class="form-control" placeholder="Digite presupuesto para el proceso">
										</div>
                                    </div>
									<div class="form-group">
										<button type="button" class="btn btn-primary float-right" id="nextTab1">Siguiente</button>
									</div>
									</div>
									
									<div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="pills-tab2">
                                    
									
										<div class="form-group">
											<label for="fecha_inicio">fecha de inicio</label>
											<input type="date" name="fecha_inicio" class="form-control" id="fecha_inicio">
										</div>
										<div class="form-group">
											<label for="hora_inicio">hora de inicio</label>
											<input type="time" class="form-control" name="hora_inicio" id="hora_inicio">
										</div>
										<div class="form-group">
											<label for="fecha_fin">fecha de fin</label>
											<input type="date" class="form-control" name="fecha_fin" id="fecha_fin">
										</div>
										<div class="form-group">
											<label for="hora_fin">hora de fin</label>
											<input type="time" class="form-control" name="hora_fin" id="hora_fin">
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-success">Guardar</button>
											<?php
												$GuardarProceso = ControladorProcesos::ctrlGuardarProceso();
											?>
											<button type="button" class="btn btn-primary float-left" id="prevTab2">Anterior</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<!-- Archivos JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<!--script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.3/dist/umd/popper.min.js"></!--script-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<!-- Script personalizado para el panel de navegación -->
<script src="vistas/js/navegacion.js"></script>
	
