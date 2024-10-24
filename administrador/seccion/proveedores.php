<?php  include("../template/cabecera_admin.php");

$txtNIF=(isset($_POST['txtNIF']))?$_POST['txtNIF']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtDirec=(isset($_POST['txtDirec']))?$_POST['txtDirec']:"";
$txtTelf=(isset($_POST['txtTelf']))?$_POST['txtTelf']:"";
$txtMaterial=(isset($_POST['txtMaterial']))?$_POST['txtMaterial']:"";
$txtPrecioActual=(isset($_POST['txtPrecioActual']))?$_POST['txtPrecioActual']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

include("../config/conexion2.php");

switch($accion){

    case "Agregar":
        
        $select = "SELECT id FROM materiales WHERE nombre='$txtMaterial'";
        $Listaselect = mysqli_query($conectar, $select);
        
        foreach ($Listaselect as $key) {
            
        }
        $txtidmat=$key['id'];
        
        $insertar = "INSERT INTO proveedores VALUES ('$txtNIF', '$txtidmat', '$txtNombre',  '$txtDirec', '$txtTelf', '$txtMaterial', '$txtPrecioActual')";
        $query = mysqli_query($conectar, $insertar);
        
        if ($query) {
            echo "<script> alert ('Accion completada con exito !');
             location.href = 'proveedores.php';
                </script>";
        } else {
            echo "<script> alert ('Accion Fallida!');
             location.href = 'proveedores.php';
                </script>";
        }
        break;

    case "Actualizar":
        
        $select = "SELECT id FROM materiales WHERE nombre='$txtMaterial'";
        $Listaselect = mysqli_query($conectar, $select);
        
        foreach ($Listaselect as $key) {
            
        }
        $txtidmat=$key['id'];
          
          $modificar = "UPDATE proveedores SET  nombre='$txtNombre', id_material='$txtidmat',  direccion='$txtDirec', telefono='$txtTelf',  desc_material='$txtMaterial', precio_actual='$txtPrecioActual' WHERE NIF=$txtNIF";
          $querymodificar = mysqli_query($conectar, $modificar);
          header("location:proveedores.php");
         break;

    case "Cancelar":
         header("location:proveedores.php");
         break;

    case "Seleccionar":

          $seleccionar = "SELECT * FROM proveedores WHERE NIF=$txtNIF";
          $ListaProveedores = mysqli_query($conectar, $seleccionar);
          
          foreach ($ListaProveedores as $Proveedor){
          $textNIF = $Proveedor['NIF'];
          $txtNombre = $Proveedor['nombre'];
          $txtDirec = $Proveedor['direccion'];
          $txtTelf = $Proveedor['telefono'];
          $txtMaterial = $Proveedor['desc_material'];
          $txtPrecioActual = $Proveedor['precio_actual'];
          }
         break;

    case "Borrar":  
          
          $borrar =("DELETE FROM proveedores WHERE NIF=$txtNIF");
          $query = mysqli_query($conectar, $borrar); 
          header("location:proveedores.php");
         break;

}

$mostrar = "SELECT * FROM proveedores";
$query2 = mysqli_query($conectar, $mostrar);
$ListaProveedores = $query2;

?>

<div class="col-md-5">
    <div class="card">
        <div class="card-header text-center">
            <b>Datos del Proveedor</b>
         
        </div>

        <div class="card-body">
        <form method="POST" enctype="multipart/form-data" >
           
    <div class = "form-group">
    <label>NIF:</label>
    <input type="text" required class="form-control" value="<?php echo $txtNIF; ?>" name="txtNIF" id="txtNIF"  placeholder="Ingresar NIF">
    </div>

    <div class = "form-group">
    <label>Nombre del Proveedor:</label>
    <input type="text" required class="form-control" value="<?php echo $txtNombre; ?>" name="txtNombre" id="txtNombre"  placeholder="Ingresar Nombre del Proveedor">
    </div>
    
    <div class = "form-group">
    <label>Direccion:</label>
    <input type="text" required class="form-control" value="<?php echo $txtDirec; ?>" name="txtDirec" id="txtDesc"  placeholder="Ingresar Direccion">
    </div>

    <div class = "form-group">
    <label>Telefono:</label>
    <input type="text" required class="form-control" value="<?php echo $txtTelf; ?>" name="txtTelf" id="txtTelf"  placeholder="Ingresar Telefono">
    </div>

    <div class = "form-group">
    <label>Material que ofrece:</label>
    <?php  

      $materiales = "SELECT * FROM materiales"; 
      $querymateriales = mysqli_query($conectar, $materiales);
       
    ?>
    <select required name="txtMaterial" id="txtMaterial" value="<?php echo $txtMaterial; ?>" >
    <?php foreach($querymateriales as $mate){ ?>
    <option value="<?php echo $mate['nombre']; ?>"><?php echo $mate['nombre']; ?></option>
    <?php } ?>
    </select>
    
    </div>
    
    <div class = "form-group">
    <label>Precio actual del  Material:</label>
    <input type="number" required class="form-control" value="<?php echo $txtPrecioActual; ?>" name="txtPrecioActual" id="txtPrecioActual"  placeholder="Precio Actual">
    </div>

    
    
    <div class="btn-group" role="group" aria-label="">
        <button type="submit" name="accion" class="btn btn-success" <?php echo ($accion == "Seleccionar")?"disabled":""; ?> value="Agregar">Agregar</button>
        <button type="submit" name="accion" class="btn btn-warning" <?php echo ($accion != "Seleccionar")?"disabled":""; ?> value="Actualizar">Actualizar</button>
        <button type="submit" name="accion" class="btn btn-info" <?php echo ($accion != "Seleccionar")?"disabled":""; ?> value="Cancelar">Cancelar</button>
    </div>

    </form>
            
    </div>
    </div>

</div>

<div class="col-md-7 text-center">
    <b>Datos del Proveedor(Mostrar datos del Proveedor)</b>
    <br>
    <table class="table table-bordered text-center">
    <br>
        <thead>
        
            <tr>
                <th>NIF</th>
                <th>Nombre del Proveedor</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
          <?php foreach ($ListaProveedores as $Proveedor) { ?> 
            <tr>
                <td><?php echo $Proveedor['NIF']; ?> </td>
                <td><?php echo $Proveedor['nombre']; ?> </td>

                <td>
                <form method="post">
                <input name="txtNIF"type="hidden" id="txtNIF" value="<?php echo $Proveedor['NIF']; ?>"/>
                <input name="accion" type="submit" value="Seleccionar" class="btn btn-primary"/>
                <input name="accion" type="submit" value="Borrar" class="btn btn-danger"/>
                </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>

    </table>
</div>




<?php  include("../template/pie_admin.php") ?>