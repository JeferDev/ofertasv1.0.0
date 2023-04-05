<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename= Procesos.xls");
?>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Objeto</th>
            <th>Descripcion</th>
            <th>Fecha de inicio</th>
            <th>Fecha de fin</th>
            <th>Estado</th>
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
            <td>'.$value["estado"].'</td>';
										}
		?>
        </tr>
	</tbody>
</table>
								