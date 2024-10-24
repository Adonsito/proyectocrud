<?php  

include("../template/cabecera_admin.php");
include("../config/conexion2.php"); 

$mostrarpedidos = "SELECT * FROM pedidos";
$query = mysqli_query($conectar, $mostrarpedidos);
$listaPedidos = $query;

?>

<table class="table table-hover table-inverse table-responsive">
    <thead class="thead-inverse">
        <h1 style="color: #33FFC1; margin: auto;" ><b>Historial de Pedidos</b></h1>
        <tr>
            <th>Id Pedido</th>
            <th>DNI Cliente</th>
            <th>Material Solicitado</th>
            <th>Cantidad</th>
            <th>Fecha de creación del pedido</th>
            <th>Estado</th>
            <th>Eliminar del Historial</th>
        </tr>
        </thead>

        <tbody>

        <?php  foreach ($listaPedidos as $pedido){    ?>

            <tr>
                <td scope="row"> <?php  echo $pedido['id_pedido'];   ?> </td>
                <td>  <?php  $DNI = (isset($pedido['DNI']))?$pedido['DNI']:""; echo $DNI; ?> </td>
                <td> <?php   $nom = (isset($pedido['nombre_material']))?$pedido['nombre_material']:""; echo $nom; ?> </td>
                <td> <?php   $cant = (isset($pedido['cant_material']))?$pedido['cant_material']:""; echo $cant;   ?> </td>
                <td> <?php   $fecha = (isset($pedido['fecha_pedido']))?$pedido['fecha_pedido']:""; echo $fecha;  ?> </td>
                <td> <?php   $condicion = (isset($pedido['condicion_ped']))?$pedido['condicion_ped']:""; 
                if ($condicion == 'x'){
                   echo "En Proceso...";
                 }else{
                    echo "Completado";

                } ?> </td>
                <td class="text-center"> 
                    
                 <form method ="post">
                   <input name ="id" type="hidden" value ="<?php $id_pedido = (isset($pedido['id_pedido']))?$pedido['id_pedido']:""; echo $id_pedido   ?>" />
                   <button value="eliminar" type="submit" name="eliminar" class="btn btn-danger" >Eliminar</button></td>
                 </form>
            </tr>

            <?php }  ?>

        </tbody>
</table>

<form method="post">
<div id="footer" style="position: fixed; margin: 390px; right: -360px; ">
<button type="submit" class="btn btn-primary btn-lg" name="eliminar" value="eliminar_historial">Eliminar Historial</button>
</div>
</form>

<?php  

$id = (isset($_POST['id']))?$_POST['id']:"";
$eliminar = (isset($_POST['eliminar']))?$_POST['eliminar']:"";

switch ($eliminar) {
    case 'eliminar':
        $eliminarp = "DELETE FROM pedidos WHERE id_pedido=$id";
        $proceso = mysqli_query($conectar, $eliminarp);
        
        echo "<script> location.href = 'historialpedidos.php';
        </script>";

        break;

    case 'eliminar_historial':
        $eliminarp = "DELETE FROM pedidos";
        $proceso = mysqli_query($conectar, $eliminarp);
           
        echo "<script> alert ('Acaba de eliminar el historial');
        location.href = 'historialpedidos.php';
        </script>";

        break;
}

include("../template/pie_admin.php");  

?>