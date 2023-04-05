<?php

require_once "controladores/controladorPrincipal.php";
require_once "controladores/ctrlProcesos.php";


require_once "modelos/conexion.php";
require_once "modelos/mdlProcesos.php";


$Obj_Principal = new Principal();
$Obj_Principal->ControladorPrincipal();

