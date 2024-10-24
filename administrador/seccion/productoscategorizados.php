<?php  

include("../template/cabecera_admin.php");
include("../config/conexion2.php");

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$id_product= (isset($_POST['id_product']))?$_POST['id_product']:"";
$accion = (isset($_POST['accion']))?$_POST['accion']:"";

$selectprodxcat = "SELECT * FROM materiales WHERE  id_categoria=$id";
$query = mysqli_query($conectar, $selectprodxcat);

?>
<div class="col-md-3"></div>
<div class="col-md text-center">
<table class="table table-hover table-inverse table-responsive">
    <thead class="thead-inverse">
        <h3 style="color: #33FFC1; position: fixed; left: 470px;" ><b><?php echo " Productos en la categoria " . $nombre; ?></b></h3>
       <br>
       <br>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Locacion</th>
            <th>Precio</th>
            <th>Imagen</th>
            <th>Recomendación</th> 
        </tr>
        </thead>

        <tbody>

        <?php  foreach ($query as $producto){    ?>

            <tr>
                <td scope="row"> <?php  echo $producto['id'];   ?> </td>
                <td>  <?php  echo $producto['nombre'];   ?> </td>
                <td> <?php  echo $producto['locacion'];   ?> </td>
                <td> <?php  echo "$" . $producto['precio'];   ?> </td>
                <td> <img class="img-thumbnail rounded" src="../../IMG/<?php echo $producto['imagen']; ?> " width="50" alt="" srcset=""> </td>

                <td>
                <?php $nomproduct = $producto['nombre'];
                
                    $menor = "SELECT MIN(precio_actual) As precio_actual FROM proveedores WHERE desc_material='$nomproduct'";
                    $sabermenor = mysqli_query($conectar, $menor); 
                    foreach ($sabermenor as $precmenor){
                        }
                        $a=$precmenor['precio_actual'] ;
                    
                    $sugerir = "SELECT nombre FROM proveedores  WHERE  precio_actual='$a'";
                    $saber = mysqli_query($conectar, $sugerir); 
                    foreach ($saber as $sugerencia){
                       ?> <p style = "color: blue;"> <?php echo "Comprar a: " . $sugerencia['nombre']; ?></p> <?php
                    }
                    
                    
                
                ?>
                </td>
            </tr>

            <?php }  ?>

        </tbody>
</table>
        </div>

<?php  include("../template/pie_admin.php") ?>