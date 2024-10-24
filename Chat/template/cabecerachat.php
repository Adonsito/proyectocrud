<!DOCTYPE html>
<html lang="es">
<head>
    
    <title>Chat Constructora S.A.S</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php  $url="http://".$_SERVER['HTTP_HOST']."/Constructora" ?>
    <link rel="stylesheet" href="<?php echo $url; ?>/css/united.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/template/estilos.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/template/fonts.css">
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    
</head>
<body>
 <header>
        <nav>
            <ul>
            <?php  $url="http://".$_SERVER['HTTP_HOST']."/Constructora" ?>
                <li><a href="<?php echo $url; ?>"><span class="quinto"><i class="icon icon-home3" style="color: #fff;"></i></span>Página Pricipal</a></li>
                <li><a href="<?php echo $url; ?>/chat/chat.php"><span class="primero"><i class="icon icon-bubbles" style="color: #fff;"></i></span>Chat</a></li>
                <li><a href="<?php echo $url; ?>/chat/cerrarsesion.php"><span style="background-color: black;"><i class="icon icon-user-minus" style="color: #fff;"></i></span>Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>
  