<?php

/**
 * Clase Principal
 *
 * Esta clase controla la vista principal de la aplicación.
 */

class Principal{

    /**
   * Función ControladorPrincipal
   *
   * Esta función carga la plantilla principal de la aplicación.
   * 
   * @return void
   */

    function ControladorPrincipal(){
    include "vistas/plantilla.php"; 
    }
}