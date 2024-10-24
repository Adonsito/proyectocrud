<?php  include("../template/cabecera_admin.php"); 

$txtDNI=(isset($_POST['txtDNI']))?$_POST['txtDNI']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtDirec=(isset($_POST['txtDirec']))?$_POST['txtDirec']:"";
$txtCodg=(isset($_POST['txtCodg']))?$_POST['txtCodg']:"";
$txtTelf=(isset($_POST['txtTelf']))?$_POST['txtTelf']:"";
$txtEmail = (isset($_POST['txtEmail']))?$_POST['txtEmail']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

include("../config/conexion2.php");

switch($accion){
    case "Agregar":
        
        $insertar = "INSERT INTO clientes VALUES ('$txtDNI', '$txtNombre', '$txtDirec', '$txtCodg', '$txtTelf', '$txtEmail')";
        $query = mysqli_query($conectar, $insertar);
        
        if ($query) {
            echo "<script> alert ('Accion completada con exito !');
             location.href = 'clientes.php';
                </script>";
        } else {
            echo "<script> alert ('Accion Fallida!');
             location.href = 'clientes.php';
                </script>";
                }
        break;

    case "Modificar":
          
          $modificar = "UPDATE clientes SET DNI='$txtDNI', Nombre='$txtNombre', Direccion='$txtDirec', Codigo_postal='$txtCodg', Telefono='$txtTelf',  email = '$txtEmail' WHERE DNI='$txtDNI'";
          $querymodificar = mysqli_query($conectar, $modificar);

   
    case "Cancelar":
         header("location:clientes.php");
         break;

    case "Seleccionar":
          $seleccionar = "SELECT * FROM clientes WHERE DNI=$txtDNI";
          $query5 = mysqli_query($conectar, $seleccionar);
          $ListaCliente = $query5;
          foreach ($ListaCliente as $Cliente){
          $textDNI = $Cliente['DNI'];
          $txtNombre = $Cliente['Nombre'];
          $txtDirec = $Cliente['Direccion'];
          $txtTelf = $Cliente['Telefono'];
          $txtCodg = $Cliente['Codigo_postal'];
          $txtEmail = $Cliente['email'];
          }
         break;

    case "Borrar":  
          
          $borrar =("DELETE FROM clientes WHERE DNI=$txtDNI");
          $query = mysqli_query($conectar, $borrar); 
          header("location:clientes.php");
         break;

}

$mostrar = "SELECT * FROM clientes";
$query2 = mysqli_query($conectar, $mostrar);
$ListaCliente = $query2;

?>

<div class="col-md-5">
    <div class="card">
        <div class="card-header">
            Datos del clientes
         
        </div>

        <div class="card-body">
        <form method="POST" enctype="multipart/form-data" >
           
    <div class = "form-group">
    <label>DNI:</label>
    <input type="text" required class="form-control" value="<?php echo $txtDNI; ?>" name="txtDNI" id="txtDNI"  placeholder="Ingresar DNI">
    </div>

    <div class = "form-group">
    <label>Nombre del Cliente:</label>
    <input type="text" required class="form-control" value="<?php echo $txtNombre; ?>" name="txtNombre" id="txtNombre"  placeholder="Ingresar Nombre del Cliente">
    </div>
    
    <div class = "form-group">
    <label>Direccion:</label>
    <input type="text" required class="form-control" value="<?php echo $txtDirec; ?>" name="txtDirec" id="txtDesc"  placeholder="Ingresar Direccion">
    </div>

    <div class = "form-group">
    <label>Codigo postal:</label>
    <input type="text" required class="form-control" value="<?php echo $txtCodg; ?>" name="txtCodg" id="txtCodg"  placeholder="Ingresar Codigo postal">
    </div>

    <div class = "form-group">
    <label>Telefono:</label>
    <input type="text" required class="form-control" value="<?php echo $txtTelf; ?>" name="txtTelf" id="txtTelf"  placeholder="Ingresar Telefono">
    </div>

    <div class = "form-group">
    <label>Correo Electronico:</label>
    <input type="text" required class="form-control" value="<?php echo $txtEmail; ?>" name="txtEmail" id="txtEmail"  placeholder="ejemplo@dominio.com">
    </div>

    
    
    <div class="btn-group" role="group" aria-label="">
        <button type="submit" name="accion" class="btn btn-success" <?php echo ($accion == "Seleccionar")?"disabled":""; ?> value="Agregar">Agregar</button>
        <button type="submit" name="accion" class="btn btn-warning" <?php echo ($accion != "Seleccionar")?"disabled":""; ?> value="Modificar">Modificar</button>
        <button type="submit" name="accion" class="btn btn-info" <?php echo ($accion != "Seleccionar")?"disabled":""; ?> value="Cancelar">Cancelar</button>
    </div>

    </form>
            
    </div>
    </div>

</div>

<div class="col-md-7">
    Datos del Cliente(Mostrar datos del cliente)
    <table class="table table-bordered">

        <thead>
            <tr>
                <th>DNI</th>
                <th>Nombre del Cliente</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
          <?php foreach ($ListaCliente as $Cliente) { ?> 
            <tr>
                <td><?php echo $Cliente['DNI']; ?> </td>
                <td><?php echo $Cliente['Nombre']; ?> </td>
                <td><?php echo $Cliente['Direccion']; ?> </td>
                <td><?php echo $Cliente['Telefono']; ?> </td>


                <td>
                <form method="post">
                <input name="txtDNI"type="hidden" id="txtDNI" value="<?php echo $Cliente['DNI']; ?>"/>
                <input name="accion" type="submit" id="txtNombre" value="Seleccionar" class="btn btn-primary"/>
                <input name="accion" type="submit" id="txtImagen" value="Borrar" class="btn btn-danger"/>
                </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>

    </table>
</div>

<?php include("../template/pie_admin.php") ?>