<?php

include ("../administrador/config/conexion2.php"); 
session_start();
if($_POST)
{
	$usuario=$_SESSION['usuario'];
    $mensaje=$_POST['mensaje'];
    
	$insert="INSERT INTO chat VALUES (NULL, '$usuario', '$mensaje')";

	$insertmensaje = mysqli_query($conectar, $insert);

	if($insertmensaje)
	{
		header('Location: chat.php');
	}
	else
	{
		echo "Algo salió mal";
	}
	
	}