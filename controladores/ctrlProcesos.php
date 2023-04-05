<?php
/**
 * Clase ControladorProcesos
 * 
 * Clase controlador para el manejo de procesos
 */
class ControladorProcesos{

    /**
     * Método estático para guardar un proceso
     *
     * @return void
     */

    static public function ctrlGuardarProceso(){

        // Verificar si se ha enviado un objeto
        if( isset($_POST['objeto'])){

            // Verificar que los campos obligatorios no están vacíos y que el objeto solo contiene caracteres alfanuméricos
            if(preg_match('/^[a-zA-Z0-9]+$/',$_POST['objeto']) && 
            !empty($_POST['nombre_segmento']) && 
            !empty($_POST['descripcion']) && 
            !empty($_POST['moneda']) && 
            !empty($_POST['presupuesto']) && 
            !empty($_POST['fecha_inicio']) && 
            !empty($_POST['hora_inicio']) && 
            !empty($_POST['fecha_fin']) && 
            !empty($_POST['hora_fin'])
            ){

                

                 // Si los datos son válidos, se preparan para guardarlos en la base de datos
                $tabla="informacion_basica";
                $datos=array(   "objeto" => $_POST["objeto"],
                                "nombre_segmento" => $_POST["nombre_segmento"],  
                                "descripcion" => $_POST["descripcion"],
                                "moneda" => $_POST["moneda"],
                                "presupuesto" => $_POST["presupuesto"],
                                "fecha_inicio" => $_POST["fecha_inicio"],
                                "hora_inicio" => $_POST["hora_inicio"],
                                "fecha_fin" => $_POST["fecha_fin"],
                                "hora_fin" => $_POST["hora_fin"],
                                
                            );
                // Se guarda el proceso en la base de datos a través del modelo
                $respuesta = ModeloProceso::mdlGuardarProceso($tabla, $datos);
                
                // Si la respuesta del modelo es "ok", se muestra una alerta de éxito y se redirige al usuario a la página de procesos
                
                if($respuesta == "ok"){

                echo'<script>
                            swal.fire({
                                        type: "success",
                                        title: "Se guardo correctamente el registro",
                                        showConfirmButton: true,
                                        confirmButtonText:"Cerrar"
                                        }).then(function(result){
                                                                if(result.value){
                                                                                window.location="procesos";
                                                                                }
                                                                })
                    </script>';
            }

             // Si la respuesta del modelo es diferente a "ok", se muestra una alerta de error y se redirige al usuario a la página de procesos
                
            else{
                echo'<script>
                            swal.fire({
                                        type: "error",
                                        title: "hubo un problema",
                                        showConfirmButton: true,
                                        confirmButtonText:"Cerrar"
                                        }).then(function(result){
                                                                if(result.value){
                                                                                window.location="procesos";
                                                                                }
                                                                })
                    </script>';
            }
        }

        // Si no se cumplen las condiciones para los campos obligatorios y/o el objeto no contiene solo caracteres alfanuméricos, se muestra una alerta de error y se redirige al usuario a la página de procesos
            
        else{
            echo'<script>
                        swal.fire({
                                    type: "error",
                                    title: "Faltaron datos o algunos caracteres son incorrectos",
                                    showConfirmButton: true,
                                    confirmButtonText:"Cerrar"
                                    }).then(function(result){
                                                            if(result.value){
                                                                            window.location="procesos";
                                                                            }
                                                            })
                </script>';
        }
        }
    }

    /**
    * Controlador para consultar todos los procesos
    *
    * @return array Retorna un arreglo con los procesos consultados
    */
    static public function ctrlConsultarProceso(){
        $respuesta=ModeloProceso::mdlConsultarProceso();
        return $respuesta;
    }

    /**
    * Controlador para consultar todos los segmentos
    *
    * @return array Retorna un arreglo con los segmentos consultados
    */
    static public function ctrlConsultarSegmento(){
        $respuesta=ModeloProceso::mdlConsultarSegmento();
        return $respuesta;
    }

    /**
    * Controlador para actualizar el estado de un proceso
    *
    * @return void Imprime una alerta con SweetAlert2 indicando si el proceso fue actualizado correctamente
    */

    static public function ctrlActualizarEstado(){

        
        if(isset($_POST['Actualizar_Estado'])){
            $id_proceso=$_POST["id_proceso"];
            $estado=$_POST["estado"];
            $respuesta=ModeloProceso::mdlActualizarEstado($id_proceso, $estado);
            if($respuesta == "ok"){ 
                echo'<script>
                            swal.fire({
                                        type: "success",
                                        title: "El proceso ha sido publicado",
                                        showConfirmButton: true,
                                        confirmButtonText:"Cerrar"
                                        }).then(function(result){
                                                                if(result.value){
                                                                                window.location="consulta";
                                                                                }
                                                                })
                    </script>';
            } else {
                echo'<script>
                            swal.fire({
                                        type: "error",
                                        title: "El proceso ya estaba publicado",
                                        showConfirmButton: true,
                                        confirmButtonText:"Cerrar"
                                        }).then(function(result){
                                                                if(result.value){
                                                                                window.location="consulta";
                                                                                }
                                                                })
                    </script>';
            }
        }
    }

    /**
    * Método para guardar un documento en la base de datos.
    * 
    * @return void
    */

    static public function ctrlGuardarDocumento() {
        // Se verifica si se ha presionado el botón "Guardar"
        if (isset($_POST["guardar"])) { 
        if (isset($_FILES["documento"])) {
            $objeto = $_POST["objeto"];
            $documento = file_get_contents($_FILES["documento"]["tmp_name"]);
            $datos = array(
            "objeto" => $objeto,
            "documento" => $documento
            );
    
            $respuesta = ModeloProceso::mdlGuardarDocumento($datos);
    
            if ($respuesta == "ok") {
            // Muestra un mensaje de éxito    
            echo '<script>
                    swal.fire({
                        type: "success",
                        title: "Se guardó correctamente el archivo",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar"
                    }).then(function(result){
                        if(result.value){
                            window.location="procesos";
                        }
                    })
                </script>';
            } else {
                // Muestra un mensaje de error
            echo '<script>
                    swal.fire({
                        type: "error",
                        title: "Hubo un problema al guardar el archivo",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar"
                    }).then(function(result){
                        if(result.value){
                            window.location="procesos";
                        }
                    })
                </script>';
            }
        }
        }
    }
    

    
}