<?php 

session_start();
if(isset($_SESSION['usuario'])){

        include ("template/cabecerachat.php");
		include ("../administrador/config/conexion2.php"); 
		
		$seleccionar="SELECT * FROM chat";

		$consulta = mysqli_query($conectar, $seleccionar);
?>

<!--<body background="images/chat.JPG" style="background-size: cover;">-->
<div class="container" style="background-color: white;">
  <center><h2>¡Bienvenido de nuevo!  <span style="color:#dd7ff3;"><?php echo $_SESSION['usuario']; ?> </span></h2>
  <br>
	<label>Esta vez a nuestro sistema de Chat</label><br>
    <h6>Recuerda ser amable y respetuoso con la comunidad</h6>
	<br><br>
	<hr class="my-2">
        <p class="lead">
        <br/>
        <a role="button" href="<?php echo $url; ?>/chat/chat.php" class="btn btn-danger" >Chatear</a>
  
</div>

</body>
</html>
<?php
	}
	else
	{
		header('location:../Login.php');
	}
?>

