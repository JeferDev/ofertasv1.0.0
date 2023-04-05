<?php
require_once("conexion.php");
/*
Clase ModeloProceso que contiene las funciones para interactuar con la base de datos en relación a la gestión de procesos.
*/
class ModeloProceso{

    /*
    Función estática que permite guardar un proceso en la tabla "informacion_basica".
    
    @param string $table El nombre de la tabla donde se va a guardar el proceso.
    
    @param array $datos Los datos del proceso a guardar.
    
    @return string Retorna "ok" si la inserción fue exitosa o "error" en caso contrario.
    */
    static public function mdlGuardarProceso($tabla, $datos){
    
    $stm = conexion::conectar()->prepare("INSERT INTO informacion_basica(objeto, descripcion, moneda, presupuesto, nombre_segmento, estado, fecha_inicio, hora_inicio, fecha_fin, hora_fin)
    VALUES(:objeto, :descripcion, :moneda, :presupuesto, :nombre_segmento, 'ACTIVO', :fecha_inicio, :hora_inicio, :fecha_fin, :hora_fin)");
    $stm->bindParam(":objeto", $datos["objeto"], PDO::PARAM_STR);
    $stm->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
    $stm->bindParam(":moneda", $datos["moneda"], PDO::PARAM_STR);
    $stm->bindParam(":presupuesto", $datos["presupuesto"], PDO::PARAM_STR);
    $stm->bindParam(":nombre_segmento", $datos["nombre_segmento"], PDO::PARAM_STR);
    $stm->bindParam(":fecha_inicio", $datos["fecha_inicio"], PDO::PARAM_STR);
    $stm->bindParam(":fecha_fin", $datos["fecha_fin"], PDO::PARAM_STR);
    $stm->bindParam(":hora_inicio", $datos["hora_inicio"], PDO::PARAM_STR);
    $stm->bindParam(":hora_fin", $datos["hora_fin"], PDO::PARAM_STR);
    
    if($stm->execute()){
    return "ok";
    }else{
    return "error";
    }
    }
    
    /*
    Función estática que permite obtener los procesos registrados en la tabla "informacion_basica".
    
    @return array Retorna un arreglo con los datos de los procesos consultados.
    */
    static public function mdlConsultarProceso(){
    
    $stm= conexion::conectar()->prepare("SELECT id_proceso, objeto, descripcion,estado,fecha_inicio, fecha_fin FROM informacion_basica");
    $stm->execute();
    return $stm->fetchAll();
    
    }
    
    /*

    Función estática que permite obtener los nombres de los segmentos de actividad almacenados en la tabla "actividad".

    @return array Retorna un arreglo con los nombres de los segmentos de actividad.
    */
    static public function mdlConsultarSegmento(){
    
    $stm= conexion::conectar()->prepare("SELECT DISTINCT nombre_segmento FROM actividad");
    $stm->execute();
    
    return $stm->fetchAll();
    }
    
    /*
    
    Función estática que permite actualizar el estado de un proceso en la tabla "informacion_basica".
    
    @param int $id_proceso El id del proceso a actualizar.
    
    @param string $estado El nuevo estado del proceso.
    
    @return bool Retorna true si la actualización fue exitosa o false en caso contrario.
    */
    static public function mdlActualizarEstado($id_proceso, $estado){
        // Se prepara la consulta SQL para actualizar el estado del proceso en la tabla "informacion_basica"
        $stm = conexion::conectar()->prepare("UPDATE informacion_basica SET estado=:estado WHERE id_proceso=:id_proceso AND estado='ACTIVO'");
        // Se enlazan los parámetros con los valores recibidos como argumentos
        $stm->bindParam(":id_proceso", $id_proceso, PDO::PARAM_INT);
        $stm->bindParam(":estado", $estado, PDO::PARAM_STR);
        // Se ejecuta la consulta SQL y se retorna el resultado de la misma
        if($stm->execute()){
        return true;
        }else{
        return false;
        }
        }

    /*

    Función estática que permite guardar un documento en la tabla "documentos" de la base de datos.

    @param array $datos Array que contiene la información del documento a guardar, donde $datos["objeto"] es el nombre del objeto y $datos["documento"] es el archivo a guardar.

    @return string Retorna "ok" si la operación fue exitosa o "error" en caso contrario.
    */
    static public function mdlGuardarDocumento($datos){

        // Se prepara la consulta SQL para insertar el nuevo registro en la tabla "documentos"

        $sql = "INSERT INTO documentos (objeto, documento) VALUES (:objeto, :documento)";
        $stm = Conexion::conectar()->prepare($sql);

        // Se enlazan los parámetros con los valores recibidos como argumentos

        $stm->bindParam(":objeto", $datos["objeto"], PDO::PARAM_STR);
        $stm->bindParam(":documento", $datos["documento"], PDO::PARAM_LOB);
        
        // Se ejecuta la consulta SQL y se retorna el resultado de la misma

        if($stm->execute()){
            return "ok";
            } else {
            return "error";
            }
        }      
}