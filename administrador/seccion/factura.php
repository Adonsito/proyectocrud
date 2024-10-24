<?php  ob_start();   ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Factura</title>
</head>
<body>

<?php 

include("../config/conexion2.php");

$idfactura = (isset($_POST['id']))?$_POST['id']:""; 

$generarfactura = "SELECT * FROM factura WHERE idfactura='$idfactura'";
$queryfactura = mysqli_query($conectar, $generarfactura);

foreach ($queryfactura as $key) {
    
    $DNIvars = $key['DNI'];
    $cliente = "SELECT * FROM clientes WHERE DNI='$DNIvars'";
    $completclient = mysqli_query($conectar, $cliente);

    foreach ($completclient as $complet){}

?>

<h5 style="position: fixed; left: 600px;">Factura No : <?php echo $key['idfactura'];?></h5>
<h5 style="position: fixed; top: 40px; left: 550px;">Fecha: <?php echo $key['fecha'];?></h5>
<center>
<h2>Constructora S.A.S</h2>
<h3>NIT: 311620672-0</h3>
<h3>Avenida Guajira bella 215</h3>
<h3>constructorasas@gmail.com</h3>
</center>

<?php $Total = (($key['cantidad']) * ($key['preciounitario'])); ?>

<h3  style="position: fixed; top: 350px; left: 120px;">Cliente:</h3>
<h3 style="position: fixed; top: 400px; left: 90px;"><?php echo $complet['Nombre']; ?></h3> 
<h3 style="position: fixed; top: 333px; left: 260px;">DNI: </h3> 
<h3 style="position: fixed; top: 400px; left: 255px;"><?php echo  $key['DNI'];?></h3>
<h3 style="position: fixed; top: 331px; left: 370px;">Direccion: </h3> 
<h3 style="position: fixed; top: 400px; left: 355px;"> <?php echo $complet['Direccion']; ?></h3> 
<h3 style="position: fixed; top: 331px; left: 510px;">Telefono: </h3> 
<h3 style="position: fixed; top: 400px; left: 520px;"> <?php echo $complet['Telefono']; ?> </h3> 

<h3 style="position: fixed; top: 600px; left: 120px;"> Descripcion------Valor Unitario------Cantidad------Total </h3> 
<h3 style="position: fixed; top: 650px; left: 120px;"><?php echo  $key['material_solicitado'];?> </h3> 
<h3 style="position: fixed; top: 650px; left: 280px;"><?php echo  "$" . $key['preciounitario'];?> </h3> 
<h3 style="position: fixed; top: 650px; left: 440px;"> <?php echo  $key['cantidad'];?></h3> 
<h3 style="position: fixed; top: 650px; left: 520px;"> <?php echo "$" . $Total  ;?></h3> 

<h3 style="position: fixed; top: 900px; left: 520px;"> Total a pagar: <?php echo "$" . $Total; ?> </h3>

<?php  } ?>

</body>
</html>

<?php 


$html = ob_get_clean();  

//echo $html;

require_once '../libreria/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnable' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);
$dompdf->setpaper('letter');
//$dompdf->setpaper('A4', 'landscape');

$dompdf->render();

$dompdf->stream("Factura.pdf", array("Attachment" => false));

?>