<?php

include("../config/conexion2.php");

$id = (isset($_POST['id_ped'])?$_POST['id_ped']:"");

$completado = "UPDATE pedidos SET condicion_ped = 'o' WHERE id_pedido = '$id'";
$ejecutar = mysqli_query($conectar, $completado);

$mostrar = "SELECT * FROM pedidos WHERE id_pedido='$id'";
$listaPedidos  = mysqli_query($conectar, $mostrar);

foreach ($listaPedidos as $pedido) {

 $DNIvars= $pedido['DNI'];
 $Nombrevars = $pedido['nombre_material'];

 $querymaterial = "SELECT * FROM materiales WHERE nombre='$Nombrevars'";
 $material  = mysqli_query($conectar, $querymaterial);

 foreach ($material as $mate) {
 }
  $refmaterial = $mate['id'];
  $cantidaduni=$pedido['cant_material'];
  $valor = $pedido['prec_material'];

 $facturar = "INSERT INTO factura(id_pedido, DNI, id_material, material_solicitado, cantidad, preciounitario) VALUES ('$id', '$DNIvars', '$refmaterial', '$Nombrevars', '$cantidaduni', '$valor')";   
 $completfacturar = mysqli_query($conectar, $facturar);
} 

$cliente = "SELECT Nombre FROM clientes WHERE DNI='$DNIvars'";
$completclient = mysqli_query($conectar, $cliente);

foreach ($completclient as $key){}

$nomcliente = $key['Nombre'];


if ($completfacturar){
    echo "<script> alert ('Se generó una factura a nombre de $nomcliente');
    location.href = 'pedidos.php' </script>";
}

        

?>