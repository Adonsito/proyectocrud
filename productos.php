<?php include ("template/cabecera.php"); 
include("administrador/config/conexion2.php");

$mostrar = "SELECT * FROM materiales";
$query = mysqli_query($conectar, $mostrar);
$listaProductos = $query;

foreach ($listaProductos as $producto){ 
?>


<div class="col-md-3">
  <div class="card">
    <img class="card-img-top" height="350" src="./IMG/<?php echo $producto['imagen']; ?>" alt="">
    <div class="card-body">
        <h4 class="card-title text-center"> <?php echo $producto['nombre']; ?> </h4>
        <h6 class="card-body"> <?php echo "Precio Unitario: $".$producto['precio']; ?> </h6>
        
        <a > <form method="post" action = "comprar.php">
                <input name="txtnom" type="hidden" id="txtnom" value="<?php echo $producto['nombre']; ?>"/>
                <input name="txtimg" type="hidden" id="txtimg" value="<?php echo $producto['imagen']; ?>"/>
                <input name="txtprecio" type="hidden" id="txtprecio" value="<?php echo $producto['precio']; ?>"/>
                <input name="txtdesc" type="hidden" id="txtdesc" value="<?php echo $producto['descripcion']; ?>"/>
                <input name="txtid" type="hidden" id="txtid" value="<?php echo $producto['id']; ?>"/>
                <input name="accion" type="submit" id="txtnom" value="Más Detalles" class="btn btn-success"/>
              </form> 
        </a>
</div>
</div>  
</div>

<?php }  ?>

<?php include("template/pie.php"); ?>