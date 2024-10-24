<?php 

include("../template/cabecera_admin.php");
include("../config/conexion2.php");

$id = (isset($_POST['id']))?$_POST['id']:"";
$accion = (isset($_POST['accion']))?$_POST['accion']:"";

$select = "SELECT * FROM categorias ";
$query = mysqli_query($conectar, $select);

switch ($accion) {

    case 'Eliminar':

       $eliminar = "DELETE FROM categorias WHERE id_categoria='$id'";    
       $queryeliminar = mysqli_query($conectar, $eliminar);
       header("location:categorias.php");

        break;

}

foreach ($query as $categoria) {
   

?>



<div class="card text-center" style="width: 18rem;">
<div class="card-body">
<h5 class="card-title"><?php echo $categoria['nombre_categoria'];?></h5>
   
  <form action="productoscategorizados.php" method="post">
   <input name = "id" type ="hidden" value="<?php echo $categoria['id_categoria']; ?>" />
   <input name = "nombre" type ="hidden" value="<?php echo $categoria['nombre_categoria']; ?>" />
   <button name="accion" type = "submit"  class="btn" value="Ver Seccion" style = "color: blue;">Ver Seccion</button>
  </form>
   
  <form method="post">

   <input name = "id" type ="hidden" value="<?php echo $categoria['id_categoria']; ?>" />
   <button name ="accion" type = "submit"  class="btn" style = "color: blue;" value="Eliminar">Eliminar</button>
 
  </form>

</div>
</div>




<?php 

}

include("../template/pie_admin.php");
?>