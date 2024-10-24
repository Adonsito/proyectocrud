<?php  

include("../template/cabecera_admin.php"); 
include("../config/conexion2.php"); 

$seleccionar = "SELECT * FROM clientes";
$ListaClientes = mysqli_query($conectar, $seleccionar); 

?>


<div class="col-md-5"></div>
<div class="col-md-3"> <h1 style="color: #33FFC1; margin: auto;" ><b>Clientes</b></h1>
</div>
<div class="col-md-4"></div>
<div class="col-md-2"></div>
<div class="col-md-8">
<table class="table table-hover table-inverse table-responsive">
    <thead class="thead-inverse" style="margin: auto;">
        
        <tr>
            <th><h6>DNI</h6></th>
            <th><h6>Nombre</h6></th>
            <th><h6>Direccion</h6></th>
            <th><h6>Teléfono</h6></th>
            <th><h6>Correo Electrónico</h6></th>
            <th><h6>Código Postal</h6></th>
            
        </tr>
        </thead>

        <tbody style="margin: auto;">

        <?php  foreach ($ListaClientes as $cliente){    ?>

            <tr>
                <td scope="row"> <?php  echo $cliente['DNI'];   ?> </td>
                <td> <?php   echo $cliente['Nombre']; ?> </td>
                <td> <?php   echo $cliente['Direccion'];?> </td>
                <td> <?php   echo $cliente['Telefono']; ?> </td>
                <td> <?php   echo $cliente['email']; ?> </td>
                <td> <?php   echo $cliente['Codigo_postal']; ?> </td>
                
            </tr>

            <?php }  ?>

        </tbody>
</table>
</div>
<?php  include("../template/pie_admin.php") ?>