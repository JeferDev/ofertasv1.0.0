<div class="content-wrapper">
<!-- Content Header (Page header) -->
  <section class="content-header">
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0">Registro de documentos para procesos.</h1>
						</div>
					</div>
				</div>
			</div>
	</section>
      
  <!-- Contenido principal -->
	<section class="content">
		<div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <form role="form" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="objeto">Seleccione el objeto</label>
                  <select name="objeto"id="datos" class="form-control" required>
                    <option></option>
                    <?php
                      $proceso=ControladorProcesos::ctrlConsultarProceso();
                      foreach($proceso as $key=>$value){
                        echo'<option value="'.$value["objeto"].'">'.$value["objeto"].'</option>';
                      }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="documento">Seleccione un archivo</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="documento" name="documento" required>
                      <label class="custom-file-label" for="documento">Seleccione un archivo</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Cargar</span>
                    </div>
                  </div>
                </div>

                <div class="modal-footer">
                <button type="submit" class="btn btn-success float-right" name="guardar">Guardar</button>
                      <?php
												$GuardarProceso = ControladorProcesos::ctrlGuardarDocumento();
											?>
											
										</div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

