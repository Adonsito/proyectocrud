<?php   
include("../config/conexion2.php"); 
include("../template/cabecera_admin.php");


$mostrarpedidos = "SELECT * FROM pedidos WHERE condicion_ped = 'x'";
$query = mysqli_query($conectar, $mostrarpedidos);
$listaPedidos = $query;

 
?>
<div class="col-md-4"></div>
<div class="col-md-5"><h1 style="color: #33FFC1; margin: auto;" ><b>Pedidos Pendientes</b></h1>
</div>
<div class="col-md-3"></div>
<div class="col-md-1"></div>
<div class="col-md-11">
<table class="table table-hover table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>Id del pedido</th>
            <th>DNI del cliente</th>
            <th>Material solicitado</th>
            <th>Cantidad</th>
            <th>Fecha de creación del pedido</th>
            <th>Acciones</th>
        </tr>
        </thead>

        <tbody>

        <?php  foreach ($listaPedidos as $pedido){    ?>

            <tr>
                <td scope="row"> <?php  echo $pedido['id_pedido'];   ?> </td>
                <td>  <?php  echo $pedido['DNI'];   ?> </td>
                <td> <?php  echo $pedido['nombre_material'];   ?> </td>
                <td> <?php  echo $pedido['cant_material'];   ?> </td>
                <td> <?php  echo $pedido['fecha_pedido'];   ?> </td>
                <td> 
                 <!--<form method="post">
                    <input type="hidden" name="id_ped" value="<?php  //echo $pedido['id_pedido'];   ?>">
                    <input name ="accion" type="submit" class="btn btn-info" value="Completado" /> 
                  </form>-->

                  <form action="facturar.php" method="post">
                     <input type="hidden" name="id_ped" value="<?php  echo $pedido['id_pedido'];   ?>">
                    <input name ="idped" type="submit" class="btn btn-success" value = "Generar Factura" />
                  </form>
                </td>
                
            </tr>

            <?php }  ?>

        </tbody>
</table>
</div>



<?php

$accion = (isset($_POST['accion']))?$_POST['accion']:"";

/*
switch ($accion) {

    case 'Completado':
        
        $completado = "UPDATE pedidos SET condicion_ped = 'o' WHERE id_pedido = '$id_ped'";
        $ejecutar = mysqli_query($conectar, $completado);
        echo "<script> location.href = 'pedidos.php';
        </script>";

        break;
}
*/
include("../template/pie_admin.php");

?>


