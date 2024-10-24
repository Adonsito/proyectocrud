<?php 

session_start();

if ($_SESSION['nivel'] != 1){

 header("Location:../../Login.php");
 
}


?>
<!doctype html>
<html lang="es">
  <head>
    <title>Administrador</title>
<?php  $url="http://".$_SERVER['HTTP_HOST']."/Constructora" ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $url; ?>/template/estilos.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/template/fonts.css">
</head>
<body>
 <header>
        <nav>
            <ul>
            <?php  $url="http://".$_SERVER['HTTP_HOST']."/Constructora" ?>
                <li><a href="<?php echo $url; ?>/administrador/"><span class="primero"><i class="icon icon-home3" style="color: #fff;"></i></span>Inicio</a></li>
                <li><a href="<?php echo $url; ?>/administrador/seccion/productos.php"><span class="segundo"><i class="icon icon-price-tags" style="color: #fff;"></i></span>Productos</a>
                <ul>
                    <li><a href="<?php echo $url; ?>/administrador/seccion/products.php">Categorias</a></li>
                    <li><a href="<?php echo $url; ?>/administrador/seccion/almacenes.php">Almacenes</a></li>
                </ul>
                </li>
                <li><a href="<?php echo $url; ?>/administrador/seccion/clientes.php"><span class="tercero"><i class="icon icon-users" style="color: #fff;"></i></span>Clientes</a>
                <ul>
                    <li><a href="<?php echo $url; ?>/administrador/seccion/pedidos.php">Pedidos pendientes</a></li>
                    <li><a href="<?php echo $url; ?>/administrador/seccion/historialpedidos.php">Historial de Pedidos</a></li>
                    <li><a href="<?php echo $url; ?>/administrador/seccion/historialfactura.php">Historial de Facturas</a></li>
                    <li><a href="<?php echo $url; ?>/administrador/seccion/listaclientes.php">Listado Clientes</a></li>
                </ul>    
                </li>
                <li><a href="<?php echo $url; ?>/administrador/seccion/proveedores.php"><span class="segundo"><i class="icon icon-user-tie" style="color: #fff;"></i></span>Proveedores</a>
                <ul>
                    <li><a href="<?php echo $url; ?>/administrador/seccion/infoproveedores.php">Lista Proveedores</a></li>
                </ul> 
                </li>
                <li><a href="<?php echo $url; ?>"><span class="cuarto"><i class="icon icon-eye" style="color: #fff;" ></i></span>Vista del sitio web</a></li>
                <li><a href="<?php echo $url; ?>/administrador/seccion/cerrar_sesion.php"><span class="quinto"><i class="icon icon-user-minus" style="color: #fff;"></i></span>Cerrar Sesion</a></li>
            </ul>
        </nav>
    </header>
   <div class="container">
   <div class="row">