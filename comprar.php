<?php 
include("template/cabecera.php");
include("administrador/config/conexion2.php");

$nombreenvio = $_POST['txtnom'];
$imagenenvio = $_POST['txtimg'];
$precioenvio = $_POST['txtprecio'];
$descenvio = $_POST['txtdesc'];
$idenvio = $_POST['txtid'];

?>

<div class="jumbotron   jumbotron-fluid text-center">
    <h1 class="display-3">Detalles del Producto</h1>
    <p class="lead"> Nombre del Producto: <div style="color: black">
    <h1><b><?php  echo  $nombreenvio; ?> </b></h1>
    </div>
    </p>
    <hr class="my-2">
    </p>
    <p class="lead">  
    </p>
</div>
<div class="jumbotron text-center col-md-5">
  <div class="container">
    <p><img class="card-img-top"  style = "backfround-size: cover;" src="./IMG/<?php echo $imagenenvio; ?>" > </p>
  </div>
</div>


<div class="jumbotron jumbotron-fluid col-md-7">
  <div class="container">
    <div style="color: black">
    <h1>Precio unitario o por kilogramo: <?php echo " $" . $precioenvio; ?></h1>
    <br>
    <h4><b> Descripción del producto </b></h4>
    <h5> <?php  echo $descenvio; ?> </h5>

    <form action="crearpedido.php" method="post">
    
      <br>   
      <br>
      <br>
     <input type="hidden" name="nom" value="<?php echo $nombreenvio;?>"> 
     <input type="hidden" name="img" value="<?php echo $imagenenvio;?>">
     <input type="hidden" name="id" value="<?php echo $idenvio;?>">
     <input type="hidden" name="precio" value="<?php echo $precioenvio;?>">
     <input class="form-control" style="background-color: green; color: white;" type="submit" value="Comprar">  
    </form>
  </div>
</div>
</div>


<?php 

 include("template/pie.php"); 
 ?>