<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sistema | Ofertas</title>
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!--Boostrap5-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!--Data table-->
<link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet"/>
<!-- Font Awesome -->
<link rel="stylesheet" href="vistas/recursos/plugins/fontawesome-free/css/all.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="vistas/recursos/dist/css/adminlte.min.css">
<script src="vistas/recursos/plugins/sweetalert2/sweetalert2.min.js"></script>
<link rel="stylesheet" href="vistas/recursos/plugins/sweetalert2/sweetalert2.min.css">
</head>
<body class="hold-transition sidebar-mini sidebar-collapse">

<?php

/**
 * Codigo en PHP que se encarga de incluir diferentes módulos de una página web según la URL que el usuario solicite (enrutamiento).
 */

// Se incluyen los archivos de cabecera y menú de la página.

include "vistas/modulos/cabecera.php";
include "vistas/modulos/menu.php";

// Se verifica si la variable "enlace" está definida en la URL.
if(isset($_GET["enlace"])){
    
    // Se verifica si el valor de "enlace" coincide con algunos de los módulos permitidos.
    if( $_GET["enlace"]=="inicio" ||
        $_GET["enlace"]=="procesos" ||
        $_GET["enlace"]=="crear" ||
        $_GET["enlace"]=="documento" ||
        $_GET["enlace"]=="exportartabla" ||
        $_GET["enlace"]=="consulta"){
        
        // Si coincide, se incluye el módulo correspondiente.
        include "vistas/modulos/".$_GET["enlace"].".php";
    }else{
         // Si no coincide, se incluye un módulo de error.
        include "vistas/modulos/404.php";
    }
}else{

    // Si la variable "enlace" no está definida en la URL, se incluye el módulo de inicio por defecto.
    
    include "vistas/modulos/inicio.php";
}


// Se incluye el archivo de pie de página de la página.
include "vistas/modulos/pie.php";
?>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="vistas/recursos/plugins/jquery/jquery.min.js"></script>
<!--boton de navegacion entre pestañas-->
<script src="vistas/js/procesos.js"></script>
<!--Data table-->
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>
<script>
   // Manipulacion de datatable
    $(document).ready(function() {
    $('#myTable').DataTable( {
        responsive: true,
        autoWidth: false,
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "Nada ha sido encontrado, disculpa",
            "info": "Mostrando la pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Filtrar",
            "paginate":{
                "next": "Siguiente",
                "previous": "Anterior"
            }
        }
    } );
} );
</script>
<!-- Bootstrap 4 -->
<script src="vistas/recursos/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="vistas/recursos/dist/js/adminlte.min.js"></script>
</body>
</html>
