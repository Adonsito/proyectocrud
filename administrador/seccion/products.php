<?php  

include("../template/cabecera_admin.php");
include("../config/conexion2.php");

$id = (isset($_POST['id']))?$_POST['id']:"";
$Nombre = (isset($_POST['nombre']))?$_POST['nombre']:"";
$accion = (isset($_POST['accion']))?$_POST['accion']:"";

switch($accion){
    case "Agregar":

        $insertar = "INSERT INTO categorias VALUES (NULL, '$Nombre')";
        $query = mysqli_query($conectar, $insertar);
        
        if ($query) {
            echo "<script> alert ('categoría creada con exito !');
             location.href = 'products.php';
                </script>";
        } else {
            echo "<script> alert ('Accion Fallida!');
             location.href = 'products.php';
                </script>";
                }
        
        
        break;

    case "Modificar":
          
         $modificar = "UPDATE categorias SET nombre_categoria='$Nombre' WHERE id_categoria=$id";
         $query = mysqli_query($conectar, $modificar);
         
         header("location:products.php");
      
         break;
   
    case "Cancelar":

         header("location:products.php");

         break;

    case "Seleccionar":

          $seleccionar = "SELECT * FROM categorias WHERE id_categoria='$id'";
          $query = mysqli_query($conectar, $seleccionar);
          
          foreach ($query as $categoria){
           $id = $categoria['id_categoria'];
           $Nombre = $categoria['nombre_categoria'];
          }
         break;
}

$mostrar = "SELECT * FROM categorias";
$query2 = mysqli_query($conectar, $mostrar);



?>

<div class="col-md-5">
    <div class="card">
        <div class="card-header text-center">
            <b>Crear categoría de Productos</b>
         
        </div>

        <div class="card-body">
        <form method="POST" enctype="multipart/form-data" >
           
    <div class = "form-group">
    <label>Id:</label>
    <input type="text" required readonly class="form-control" value="<?php echo $id; ?>" name="id" id="id"  placeholder="Id">
    </div>

    <div class = "form-group">
    <label>Nombre:</label>
    <input type="text" required class="form-control" value="<?php echo $Nombre; ?>" name="nombre" id="nombre"  placeholder="Nombre para la categoría">
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


<div class="col-md-7 text-center">
      <b style="color: blue;" >Categorías Existentes</b>
    <table class="table table-bordered">

        <thead>
            <tr>
                <th>Id Categoría</th>
                <th>Nombre de la categoría</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
          <?php foreach ($query2 as $categoria) { ?> 
            <tr>
                <td><?php echo $categoria['id_categoria']; ?> </td>
                <td><?php echo $categoria['nombre_categoria']; ?> </td>

                <td>
                <form method="post">

                <input name="id" type="hidden" id="id" value="<?php echo $categoria['id_categoria']; ?>"/>
                <input name="accion" type="submit"  value="Seleccionar" class="btn" style="background-color: black; color: white;" />
                
                </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>

    </table>
</div>

<form action="categorias.php" method="post">
  <input type="submit" value="Categorias Existentes" class="btn btn-info" style ="position: relative; top: 50px; right: -40px;" >
</form>

<?php include("../template/pie_admin.php") ?>