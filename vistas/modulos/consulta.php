<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="wrapper">
		<div class="content-wrapper">
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0">Consulta proceso.</h1>
						</div>
					</div>
				</div>
			</div>

			<!-- Contenido principal -->
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
								<table id="myTable" class="table table-bordered table-striped"">
									<thead>
										<tr>
											<th>ID</th>
											<th>Objeto</th>
											<th>Descripcion</th>
											<th>Fecha de inicio</th>
											<th>Fecha de fin</th>
											<th>Estado</th>
											<th>Acciones</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$proceso=ControladorProcesos::ctrlConsultarProceso();
										$proceso2=ControladorProcesos::ctrlActualizarEstado();
										foreach($proceso as $key=>$value){
										echo'<tr>
										<td>'.$value["id_proceso"].'</td>
										<td>'.$value["objeto"].'</td>
										<td>'.$value["descripcion"].'</td>
										<td>'.$value["fecha_inicio"].'</td>
										<td>'.$value["fecha_fin"].'</td>
										<td>'.$value["estado"].'</td>
										<td>
										
										<div class="btn-btn-group form-group">
											<div class="btn-btn-group form-group">
												<form method="POST">
													<input type="hidden" name="id_proceso" value="'.$value["id_proceso"].'">
													<input type="hidden" name="estado" value="PUBLICADO">
													<button type="submit" class="btn btn-success" name="Actualizar_Estado" '.($value["estado"]=="ACTIVO" ? "" : "disabled").'>PUBLICAR</button>
												</form>
											</div>
										</div>
										
										</td>';
										}
										?>
										</tr>
									</tbody>
								</table>
								</div>
								<div>
									<a href="exportartabla" class="btn btn-success" >EXPORTAR</a>
								</div>				
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		</div>
	</section>
</div>