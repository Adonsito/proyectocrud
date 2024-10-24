<?php include ("template/cabecera.php"); 

include ("administrador/config/conexion2.php");
if ($_POST) {
  $txtEmail = $_POST['txtEmail'];
  $txtClave = md5($_POST['txtClave']);

  $select = "SELECT * FROM usuarios where email = '" . $txtEmail . "' and clave = '" . $txtClave . "' ";
  $ingresar =  mysqli_query($conectar, $select);
  if (mysqli_num_rows($ingresar) > 0) {
    $row = mysqli_fetch_assoc($ingresar);
    //session_start();
    $_SESSION['usuario'] = $row['usuario'];
    $_SESSION['nivel'] = $row['nivel'];
    $user=$row['usuario'];
    echo "<script> alert('¡Bienvenido $user!'); 
    location.href = 'index.php';
    </script>";
    
  } else {
    echo "<script> alert('Correo o contraseña incorrectas.'); </script>";
  }
}
?>
<div class="col-md-3"></div>
<div class="col-md-6">
    <div class="card">
        <div class="card-header text-center">
            
            <h5><b>Iniciar Sesión </b></h5>
           
          </div>

           <div class="card-body">
            
           <form method="POST" enctype="multipart/form-data" >
           
           <div class = "form-group">
           <label>Correo electrónico:</label>
           <input type="text" required class="form-control" value="" name="txtEmail" id="txtEmail"  placeholder="Ingrese su correo electrónico">
           </div>

           <div class = "form-group">
           <label>Contraseña:</label>
           <input type="password" required class="form-control" value="" name="txtClave" id="txtClave"  placeholder="Ingrese su contraseña">
           </div>  
          
    </div>
    <button name="ingresar" type="submit" class="btn btn-success">Ingresar</button>
    </div>

</body>

</html>