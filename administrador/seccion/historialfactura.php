<?php   
include("../config/conexion2.php"); 
include("../template/cabecera_admin.php");


$mostrarFacturas = "SELECT * FROM factura";
$listaFacturas = mysqli_query($conectar, $mostrarFacturas);

 
?>
<div class="col-md-4"></div>
<div class="col-md-5"><h1 style="color: #33FFC1; margin: auto;" ><b>Historial De Facturas</b></h1>
</div>
<div class="col-md-3"></div>
<div class="col-md-1"></div>
<div class="col-md-11">
<table class="table table-hover table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>Id Factura</th>
            <th>Fecha Facturacion</th>
            <th>DNI del cliente</th>
            <th>Material solicitado</th>
            <th>Cantidad</th>
            <th>Acciones</th>
        </tr>
        </thead>

        <tbody>

        <?php  foreach ($listaFacturas as $Facturas){    ?>

            <tr>
                <td scope="row"> <?php  echo $Facturas['idfactura'];   ?> </td>
                <td> <?php  echo $Facturas['fecha'];   ?> </td>
                <td> <?php  echo $Facturas['DNI'];   ?> </td>
                <td> <?php  echo $Facturas['material_solicitado'];   ?> </td>
                <td> <?php  echo $Facturas['cantidad'];   ?> </td>
                <td> 

                  <form action="factura.php" method="post">
                     <input type="hidden" name="id" value="<?php  echo $Facturas['idfactura'];   ?>">
                    <input name ="accion" type="submit" class="btn btn-success" value = "Visualizar" />
                  </form>
                  <form action="descfactura.php" method="post">
                     <input type="hidden" name="id" value="<?php  echo $Facturas['idfactura'];   ?>">
                     <input name ="accion" type="submit" class="btn btn-info" value = "Descargar" />
                  </form>
                </td>
                
            </tr>

            <?php }  ?>

        </tbody>
</table>
</div>

<form method="post">
<div id="footer" style="position: fixed; margin: 390px; right: -360px; ">
<button type="submit" class="btn btn-primary btn-lg" name="eliminar" value="eliminar_historial">Vaciar Historial</button>
</div>
</form>


<?php  

$id = (isset($_POST['id']))?$_POST['id']:"";
$eliminar = (isset($_POST['eliminar']))?$_POST['eliminar']:"";

switch ($eliminar) {

    case 'eliminar_historial':

        $eliminarh = "DELETE FROM factura";
        $proceso = mysqli_query($conectar, $eliminarh);
           
        echo "<script> alert ('Acaba de eliminar el historial');
        location.href = 'historialfactura.php';
        </script>";

        break;
}

include("../template/pie_admin.php");  

?>