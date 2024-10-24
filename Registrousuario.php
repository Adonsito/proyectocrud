<?php
include("template/cabecera.php");
include("administrador/config/conexion2.php");
/*session_start();
if($_POST){
$usuario = $_POST['user'];
$clave = $_POST['password'];
$consultar = "SELECT * FROM usuarios WHERE usuario='$usuario' AND clave='$clave'";
$consulta = mysqli_query($conectar, $consultar);
$resultado = mysqli_num_rows($consulta);
if($_POST){
  if($resultado){
    $_SESSION['user']="ok";
    echo "<script> alert ('Bienvenido $usuario !');
    location.href = 'inicio.php';
    </script>";
  }else {
    $mensaje = "<script> alert ('Su contraseña o usuario son invalidos');
   location.href = 'Login.php';
   </script>";
  }

}
}*/

if($_POST)
{
	$txtDNI=$_POST['txtDNI'];
	$txtNombre=$_POST['txtNombre'];
	$txtDirec=$_POST['txtDirec'];
	$txtCodg=$_POST['txtCodg'];
	$txtTelf=$_POST['txtTelf'];
	$txtEmail=$_POST['txtEmail'];
	$txtClave=md5($_POST['txtClave']);


	$Insertar="INSERT INTO usuarios VALUES (NULL, 2, '$txtNombre', '$txtClave', '$txtDNI', '$txtDirec', '$txtCodg', '$txtTelf', '$txtEmail')";
  $consulta = mysqli_query($conectar, $Insertar);

  $Insertarcliente="INSERT INTO clientes VALUES ('$txtDNI', '$txtNombre', '$txtDirec', '$txtCodg', '$txtTelf', '$txtEmail')";
  $consultatbcliente = mysqli_query($conectar, $Insertarcliente);

	if($consulta)
	{
		$_SESSION['name'] = $txtNombre;
    echo "<script> alert ('¡ Cuenta creada exitosamente !');
    location.href = 'Login.php';
    </script>";
	}
	else
	{
		echo "<script> alert ('¡ Algo Falló :( !') ;
    location.href = 'Registrousuario.php';
    </script>";
    
	}
	
	}
?>
<div class="col-md-3">
</div>

<div class="col-md-6">
    <div class="card">
        <div class="card-header text-center">
            
            <h5><b>Registro y creación de cuenta </b></h5>
           
          </div>

           <div class="card-body">
            
           <form method="POST" enctype="multipart/form-data" >
           
           <div class = "form-group">
           <label>DNI:</label>
           <input type="text" required class="form-control" value="" name="txtDNI" id="txtDNI"  placeholder="Ingrese su DNI">
           </div>

           <div class = "form-group">
           <label>Nombre:</label>
           <input type="text" required class="form-control" value="" name="txtNombre" id="txtNombre"  placeholder="Ingrese su Nombre completo">
           </div>
    
           <div class = "form-group">
           <label>Dirección:</label>
           <input type="text" required class="form-control" value="" name="txtDirec" id="txtDesc"  placeholder="Ingrese su domicilio o dirección">
           </div>

           <div class = "form-group">
           <label>Código postal:</label>
           <input type="text" required class="form-control" value="" name="txtCodg" id="txtCodg"  placeholder="Ingresar código postal">
           </div>

           <div class = "form-group">
           <label>Teléfono:</label>
           <input type="text" required class="form-control" value="" name="txtTelf" id="txtTelf"  placeholder="Ingresar teléfono">
           </div>

           <div class = "form-group">
           <label>Correo Electrónico:</label>
           <input type="text" required class="form-control" value="" name="txtEmail" id="txtEmail"  placeholder="Ingrese su email aquí">
           </div>

           <div class = "form-group">
           <label>Contraseña:</label>
           <input type="password" required class="form-control" value="" name="txtClave" id="txtClave"  placeholder="Crea una contraseña">
           </div>

          </div>  
          <button name="comprar" type="submit" class="btn btn-success">Crear Cuenta</button>
    </div>
    </div>

  <?php  include("template/pie.php");?>