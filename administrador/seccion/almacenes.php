<?php 

include("../template/cabecera_admin.php");
include("../config/conexion2.php");

$idalmacen = (isset($_POST['idalmacen']))?$_POST['idalmacen']:"";
$Nombrealmacen = (isset($_POST['Nombrealmacen']))?$_POST['Nombrealmacen']:"";
$accion = (isset($_POST['accion']))?$_POST['accion']:"";


switch($accion){

    case "Agregar":

        $insertar = "INSERT INTO almacenes VALUES ('$idalmacen', '$Nombrealmacen')";
        $query = mysqli_query($conectar, $insertar);
        
        if ($query) {
            echo "<script> alert ('Almacen Registrado!');
             location.href = 'almacenes.php';
                </script>";
        } else {
            echo "<script> alert ('Ups ocurrio un error!');
             location.href = 'almacenes.php';
                </script>";
                }
        
        
        break;

    case "Modificar":
          
        $modificar = "UPDATE almacenes SET nombre='$Nombrealmacen' WHERE id_almacen=$idalmacen";
         $query = mysqli_query($conectar, $modificar);
         
         echo "<script> location.href = 'almacenes.php';
         </script>";

         break;
   
    case "Cancelar":

         echo "<script> location.href = 'almacenes.php';
                </script>";

         break;

    case "Seleccionar":

          $seleccionar = "SELECT * FROM almacenes WHERE id_almacen='$idalmacen'";
          $query = mysqli_query($conectar, $seleccionar);
          
          foreach ($query as $categoria){
           $idalmacen = $categoria['id_almacen'];
           $Nombrealmacen = $categoria['nombre'];
          
          }
         break;

    case "Eliminar":

            $eliminar = "DELETE FROM almacenes WHERE id_almacen='$idalmacen'";
            $query = mysqli_query($conectar, $eliminar);
            
            echo "<script> location.href = 'almacenes.php';
                </script>";
           
         break;     
}

$mostrar = "SELECT * FROM almacenes";
$ListaAlmacenes = mysqli_query($conectar, $mostrar);
 


?>

<div class="col-md-4">
    <div class="card">
        <div class="card-header text-center">
            <b>Registro de  Almacenes</b>
         
        </div>

        <div class="card-body">
        <form method="POST" enctype="multipart/form-data" >
           
    <div class = "form-group">
    <label>Id Almacen:</label>
    <input type="text" required  class="form-control" value="<?php echo $idalmacen; ?>" name="idalmacen" id="idalmacen"  placeholder="Id">
    </div>

    <div class = "form-group">
    <label>Nombre del Almacen:</label>
    <input type="text" required class="form-control" value="<?php echo $Nombrealmacen; ?>" name="Nombrealmacen" id="Nombrealmacen"  placeholder="Nombre de la ubicacion">
    </div>
    
    <div class="btn-group" role="group" aria-label="">
        <button type="submit" name="accion" class="btn btn-success" <?php echo ($accion == "Seleccionar")?"disabled":""; ?> value="Agregar">Agregar</button>
        <button type="submit" name="accion" class="btn btn-warning" <?php echo ($accion != "Seleccionar")?"disabled":""; ?> value="Modificar">Modificar</button>
        <button type="submit" name="accion" class="btn btn-info" <?php echo ($accion != "Seleccionar")?"disabled":""; ?> value="Cancelar">Cancelar</button>
    </div>

    </form>
            
    </div>
    </div>

</div>


<div class="col-md-8 text-center">
      <b style="color: blue;" >Almacenes (Mostrando . . .)</b>
    <table class="table table-bordered">

        <thead>
            <tr>
                <th>Id Almacen</th>
                <th>Nombre del Almacen</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
          <?php foreach ($ListaAlmacenes as $almacen) { ?> 
            <tr>
                <td><?php echo $almacen['id_almacen']; ?> </td>
                <td><?php echo $almacen['nombre']; ?> </td>

                <td>
                <form method="post">

                <input name="idalmacen" type="hidden" id="idalmacen" value="<?php echo $almacen['id_almacen']; ?>"/>
                <input name="accion" type="submit"  value="Seleccionar" class="btn btn-info" />
                <input name="accion" type="submit"  value="Eliminar" class="btn btn-danger"  />
                </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>

    </table>
</div>

<?php 
include("../template/pie_admin.php");
?>