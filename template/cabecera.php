<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Constructora S.A.S</title>
    <link rel="stylesheet" href="css/united.css">
    <link rel="stylesheet" href="template/estilos.css">
    <link rel="stylesheet" href="template/fonts.css">
</head>
<body>
 <header>
        <nav>
            <ul>
            <?php  $url="http://".$_SERVER['HTTP_HOST']."/Constructora" ?>
                <li><a href="<?php echo $url; ?>"><span class="primero"><i class="icon icon-home3" style="color: #fff;"></i></span>Inicio</a></li>
                <li><a href="<?php echo $url; ?>/productos.php"><span class="segundo"><i class="icon icon-price-tags" style="color: #fff;"></i></span>Nuestros Productos</a></li>
                <li><a href="<?php echo $url; ?>/Nosotros.php"><span class="quinto"><i class="icon icon-profile" style="color: #fff;"></i></span>¿Quienes Somos?</a></li>
                <li><a href="<?php echo $url; ?>/Login.php"><span style="background-color: black;"><i class="icon icon-user-plus" style="color: #fff;"></i></span>Inicio de Sesión</a>
                <ul>
                <?php
                session_start();
                if(!isset($_SESSION['nivel'])){ ?>
                <li><a href="<?php echo $url; ?>/Registrousuario.php">Crear Cuenta</a></li>

                <?php 
                }    
                 if($_SESSION['nivel']==1){ ?>

                <li><a href="<?php echo $url; ?>/administrador/">Administrar Sitio</a></li>

                <?php } 
                if(isset($_SESSION['nivel'])){ ?>

                <li><a href="<?php echo $url; ?>/chat/cerrarsesion.php">Cerrar Sesión</a></li>

                <?php } ?>
                </ul>
                </li>
            </ul>
        </nav>
    </header>
 
 <div class="container">
    
    <div class="row">

<?php    include('template/navchat.php'); ?>