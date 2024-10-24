<?php

include("template/cabecera.php");
include("administrador/config/conexion2.php");
if(isset($_SESSION['usuario'])){
$indicador = $_SESSION['usuario'];

    $nomproducto = $_POST['nom'];
    $imgproducto = $_POST['img'];
    $idproducto = $_POST['id'];
    $precioproducto = $_POST['precio'];

$select = "SELECT * FROM clientes WHERE Nombre='$indicador'";
$selectclients=mysqli_query($conectar, $select);
foreach($selectclients as $seleccion){
    $txtDNI = $seleccion['DNI'];
    $txtNombre = $seleccion['Nombre'];
    $txtDirecc = $seleccion['Direccion'];
    $txtCodpostal = $seleccion['Codigo_postal'];
    $txtTelefono = $seleccion['Telefono'];
    $txtEmail = $seleccion['email'];
}


?>

<div class="col-md-3">
</div>

<div class="col-md-6">
    <div class="card">
        <div class="card-header text-center">
            
            <h5><b><?php echo   "Estos son tus datos " . $indicador;    ?></b></h5>
           
          </div>

           <div class="card-body">
            
           <form method="POST" action="administrador/seccion/insertarpedido.php" enctype="multipart/form-data" >
           
           <div class = "form-group">
           <label>DNI:</label>
           <input type="text" readonly required class="form-control" value="<?php  echo $txtDNI; ?>" name="txtDNI" id="txtDNI">
           </div>

           <br>

           <div class = "form-group">
           <label>Nombre del Cliente:</label>
           <input type="text" readonly required class="form-control" value="<?php  echo $txtNombre; ?>" name="txtNombre" id="txtNombre" >
           </div>
    
           <br>

           <div class = "form-group">
           <label>Dirección y/o Domicilio:</label>
           <input type="text" readonly required class="form-control" value="<?php  echo $txtDirecc; ?>" name="txtDirecc" id="txtDirecc"  placeholder="Ingrese su domicilio o direccion">
           </div>

           <br>

           <div class = "form-group">
           <label>Código postal:</label>
           <input type="text" readonly required class="form-control" value="<?php  echo $txtCodpostal; ?>" name="txtCodpostal" id="txtCodpostal" >
           </div>

           <br>

           <div class = "form-group">
           <label>Teléfono:</label>
           <input type="text" readonly required class="form-control" value="<?php  echo $txtTelefono; ?>" name="txtTelefono" id="txtTelefono" >
           </div>
           
           <br>

           <div class = "form-group">
           <label>Correo Electrónico:</label>
           <input type="text" readonly required class="form-control" value="<?php  echo $txtEmail; ?>" name="txtEmail" id="txtEmail" >
           </div>

           <br>
           
           <div class = "form-group">
           <label>Articulo a comprar:</label>
           <input type="text" readonly class="form-control" value="<?php echo $nomproducto;?>" name="artcom" id="artcom">
           </div>
           <br>  
           <p><img class="img-thumbnail rounded"  width="100" height="100" src="./IMG/<?php echo $imgproducto; ?>" > </p>

           <div class = "form-group">
           <br>
           <label>Cantidad de unidades a comprar:</label>
           <br>
           <input type="number" required  value="" name="unidades" id="unidades"  placeholder="">
           </div>
            
           <input type="hidden"   value="<?php echo $idproducto;?>" name="artid" id="artid"> 

           <br>

           <input type="submit" class="btn btn-info" class="controls" value="Generar Pedido">
           <input type="hidden"   value="<?php echo $precioproducto;?>" name="artprecio" id="artprecio">
           
           <br>
           <br>
           </form>
          </div>  
    </div>
</div>

<?php
include("template/pie.php");

}else {
    echo "<script> alert ('Inicia Sesión para acceder a las compras');
    location.href = 'Login.php';
    </script>";
} 
?>