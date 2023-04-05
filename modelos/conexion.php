<?php
/**
 * Clase para la conexión a la base de datos utilizando el patrón Singleton
 */
class Conexion {

    /**
     * Almacena la conexión a la base de datos
     *
     * @var PDO|null
     */

    private static $conexion = null;
    
    /**
     * Constructor privado para evitar que se instancie la clase
     *
     * @return void
     */

    private function __construct() {}
    
    /**
     * Método para obtener la conexión a la base de datos
     *
     * @return PDO
     * @throws PDOException Si ocurre un error al conectarse a la base de datos
     */

    public static function conectar() {
        if (self::$conexion == null) {
            try {
                self::$conexion = new PDO("mysql:host=localhost;dbname=ofertas;charset=utf8mb4", "root", "");
                self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Error al conectar a la base de datos: " . $e->getMessage());
            }
        }

        return self::$conexion;
    }

    /**
     * Método para desconectar la conexión a la base de datos
     *
     * @return void
     */

    public static function desconectar() {
        self::$conexion = null;
    }
}

// Uso de la clase:
// $db = Conexion::conectar(); // Para obtener la conexión
// Conexion::desconectar(); // Para desconectar la conexión