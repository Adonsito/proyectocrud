<?php  

include("../template/cabecera_admin.php"); 
include("../config/conexion2.php"); 

$seleccionar = "SELECT * FROM proveedores";
$query = mysqli_query($conectar, $seleccionar);
$ListaProveedores = $query;

?>


<div class="col-md-5"></div>
<div class="col-md-3"> <h1 style="color: #33FFC1; margin: auto;" ><b>Proveedores</b></h1>
</div>
<div class="col-md-4"></div>
<div class="col-md-2"></div>
<div class="col-md-8">
<table class="table table-hover table-inverse table-responsive" >
    <thead class="thead-inverse" style="margin: auto;">
        
        <tr>
            <th><h6>NIF</h6></th>
            <th><h6>Nombre</h6></th>
            <th><h6>Direccion</h6></th>
            <th><h6>Telefono</h6></th>
            <th><h6>Material que ofrece</h6></th>
            <th><h6>Precio actual del material</h6></th>
            
        </tr>
        </thead>

        <tbody style="margin: auto;">

        <?php  foreach ($ListaProveedores as $proveedor){    ?>

            <tr>
                <td scope="row"> <?php  echo $proveedor['NIF'];   ?> </td>
                <td> <?php   echo $proveedor['nombre']; ?> </td>
                <td> <?php   echo $proveedor['direccion'];?> </td>
                <td> <?php   echo $proveedor['telefono']; ?> </td>
                <td> <?php   echo $proveedor['desc_material']; ?> </td>
                <td> <?php   echo $proveedor['precio_actual']; ?> </td>
                
            </tr>

            <?php }  ?>

        </tbody>
</table>
</div>
<?php  include("../template/pie_admin.php") ?>