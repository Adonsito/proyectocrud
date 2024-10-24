<?php 

include("../config/conexion2.php");

$txtDNI = $_POST['txtDNI'];
$txtNombre = $_POST['txtNombre'];
$txtDirec = $_POST['txtDirecc'];
$txtCodg = $_POST['txtCodpostal'];
$txtTelf = $_POST['txtTelefono'];
$txtEmail = $_POST['txtEmail'];
$txtid = $_POST['artid'];
$txtprecio = $_POST['artprecio'];
$txtnomproducto = $_POST['artcom'];
$txtcantidad = $_POST['unidades'];


$insertar = "INSERT INTO pedidos (DNI,id_material, nombre_material, materiales_soli, cant_material, prec_material, condicion_ped) VALUES ('$txtDNI', '$txtid', '$txtnomproducto', '$txtnomproducto', '$txtcantidad', '$txtprecio', 'x')";   
$insertpedido = mysqli_query($conectar, $insertar);


if ($insertpedido) {
 
    echo "<script> alert ('Pedido generado con exito !');
      location.href = '../../productos.php';
      </script>";

}else{

    echo "<script> alert ('Error al generar el pedido!');
    location.href = '../../productos.php';
    </script>";
}
?>