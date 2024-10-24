<?php  

include("../template/cabecera_admin.php");
include("../config/conexion2.php");

$txtId=(isset($_POST['txtId']))?$_POST['txtId']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtDesc=(isset($_POST['txtDesc']))?$_POST['txtDesc']:"";
$txtLoc=(isset($_POST['txtLoc']))?$_POST['txtLoc']:"";
$txtPrecio=(isset($_POST['txtPrecio']))?$_POST['txtPrecio']:"";
$txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
$txtCategoria=(isset($_POST['categoria']))?$_POST['categoria']:"";
$txtidalmacen=(isset($_POST['idalmacen']))?$_POST['idalmacen']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";


switch($accion){
    case "Agregar":
    
        $fecha = new DateTime();
        $nombreArchivo = ($txtImagen !="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";
        $tmpImagen = $_FILES["txtImagen"]["tmp_name"];
        if($tmpImagen !=""){
            move_uploaded_file($tmpImagen, "../../IMG/".$nombreArchivo);
        }
        $insertar = "INSERT INTO `materiales`(`id`, `nombre`, `id_almacen`, `descripcion`, `locacion`, `precio`, `imagen`, `id_categoria`) VALUES (NULL, '$txtNombre', '$txtidalmacen', '$txtDesc', '$txtLoc', '$txtPrecio','$nombreArchivo', '$txtCategoria') ";
        $query = mysqli_query($conectar, $insertar);
        

       // $modificarstock = "UPDATE almacenes SET cantidad_stock='$txtstock' WHERE nombre_almacen=$txtLoc";
        //$querystock = mysqli_query($conectar, $modificarstock);

        if ($query) {
            echo "<script> alert ('Accion completada con exito !');
             location.href = 'productos.php';
                </script>";
        } else {
            echo "<script> alert ('Accion Fallida!');
             location.href = 'productos.php';
                </script>";
                }
        
        break;

    case "Modificar":
          
          $modificarnombre = "UPDATE materiales SET nombre='$txtNombre', descripcion='$txtDesc', locacion='$txtLoc', precio='$txtPrecio' WHERE id=$txtId";
          $querymodificarnombre = mysqli_query($conectar, $modificarnombre);

          if($txtImagen!=""){
            $fecha = new DateTime();
            $nombreArchivo = ($txtImagen !="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";
            $tmpImagen = $_FILES["txtImagen"]["tmp_name"];

            move_uploaded_file($tmpImagen, "../../IMG/".$nombreArchivo);

            $borrarImagen = "SELECT imagen FROM materiales WHERE id=$txtId";
            $queryborrarImagen = mysqli_query($conectar, $borrarImagen);
            $Listaproducto = $queryborrarImagen;
            foreach ($Listaproducto as $producto){  
             if(isset($producto["imagen"]) && ($producto["imagen"] != "imagen.jpg")){
              if(file_exists("../../IMG/".$producto['imagen'])){
                unlink("../../IMG/".$producto['imagen']);
              }
              
             }
            }

           
            $modificarimagen = "UPDATE materiales SET imagen='$nombreArchivo' WHERE id=$txtId";
            $querymodificarimagen = mysqli_query($conectar, $modificarimagen);
            
          }
          echo "<script> location.href = 'productos.php';
                </script>";
         break;
   
    case "Cancelar":
         echo "<script> location.href = 'productos.php';
                </script>";
         break;

    case "Seleccionar":
          $seleccionar = "SELECT * FROM materiales WHERE id=$txtId";
          $query5 = mysqli_query($conectar, $seleccionar);
          $Listaproducto = $query5;
          foreach ($Listaproducto as $producto){
          $txtNombre = $producto['nombre'];
          $txtImagen = $producto['imagen'];
          $txtDesc = $producto['descripcion'];
          $txtLoc = $producto['locacion'];
          $txtPrecio = $producto['precio'];
          
          }
         break;

    case "Borrar":  
          $borrarImagen = "SELECT imagen FROM materiales WHERE id=$txtId";
          $queryborrarImagen = mysqli_query($conectar, $borrarImagen);
          $Listaproducto = $queryborrarImagen;
          foreach ($Listaproducto as $producto){  
            $borrar =("DELETE FROM materiales WHERE id=$txtId");
            $query = mysqli_query($conectar, $borrar);  

            if ($query) {
              if(isset($producto["imagen"]) && ($producto["imagen"] != "imagen.jpg")){
                if(file_exists("../../IMG/".$producto['imagen'])){
                unlink("../../IMG/".$producto['imagen']);
              }
            }
            } 
              
          }
         
          echo "<script> location.href = 'productos.php';
                </script>";
         break;

}

$mostrar = "SELECT * FROM materiales";
$query2 = mysqli_query($conectar, $mostrar);
$listaProductos = $query2;

?>

<div class="col-md-4">
    <div class="card">
        <div class="card-header text-center">
            <b>Ingresar Producto </b>
         
        </div>

        <div class="card-body">
        <form method="POST" enctype="multipart/form-data" >
           
    <div class = "form-group">
    <label>Id:</label>
    <input type="text" required readonly class="form-control" value="<?php echo $txtId; ?>" name="txtId" id="txtId"  placeholder="Id">
    </div>

    <div class = "form-group">
    <label>Nombre:</label>
    <input type="text" required class="form-control" value="<?php echo $txtNombre; ?>" name="txtNombre" id="txtNombre"  placeholder="Ingresar Nombre del producto">
    </div>
    
    <div class = "form-group">
    <label>Descripcion del producto:</label>
    <input type="text" required class="form-control" value="<?php echo $txtDesc; ?>" name="txtDesc" id="txtDesc"  placeholder="Ingresar Descripcion del producto">
    </div>

    <div class = "form-group">
    <label>Locación:</label>
    
    <?php  

      $Almacen = "SELECT * FROM almacenes"; 
      $queryAlmacen = mysqli_query($conectar, $Almacen);
      $mostrarAlmacen = $queryAlmacen;
       
    ?>
    <select required name="txtLoc" id="txtLoc" value="<?php echo $txtLoc; ?>"> 

    <?php foreach($mostrarAlmacen as $Alm){ ?>
    <option value="<?php echo $Alm['nombre']; ?>"> <?php  echo $Alm['nombre']; ?> </option>
    <?php   }  ?>
    <input type="hidden" value="<?php  echo $Alm['id_almacen']; ?>" name="idalmacen">
    </select>  

    </div>


    <div class = "form-group">
    <label>Precio:</label>
    <input type="text" required class="form-control" value="<?php echo $txtPrecio; ?>" name="txtPrecio" id="txtPrecio"  placeholder="Ingresar Valor unitario del producto">
    </div>
    
    <div class = "form-group">
    <label>Categoria:</label>
    
    <?php  

      $Categoria = "SELECT * FROM categorias"; 
      $querycategoria = mysqli_query($conectar, $Categoria);
      $mostrarcategoria = $querycategoria;
       
    ?>
    <select required name="categoria" id="categoria" value="value="<?php echo $txtCategoria; ?>""> 

    <?php foreach($mostrarcategoria as $cat){ ?>
    <option value="<?php echo $cat['id_categoria']; ?>"> <?php  echo $cat['nombre_categoria']; ?> </option>
    <?php   }  ?>
    </select>  

    </div>


    <div class = "form-group">
    <label>Imagen:</label>

    <br>

    <?php if($txtImagen != ""){  ?>
     <img class="img-thumbnail rounded" src="../../IMG/<?php echo $txtImagen; ?> " width="50" alt="" srcset="">
    <?php  }   ?>

    <input type="file"  class="form-control" name="txtImagen" id="txtImagen"  placeholder="Ingresar Imagen del producto" style="background-color: lightblue;">
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

<div class="col-md-8 text-center">
    <b style="color:green;">Datos del Producto  (Mostrando . . .)</b>
    <table class="table table-bordered">

        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>P/U(kg)</th>
                <th>Categoria</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
          <?php foreach ($listaProductos as $producto) { ?> 
            <tr>
                <td><?php echo $producto['id']; ?> </td>
                <td><?php echo $producto['nombre']; ?> </td>

                <td>
                 <img class="img-thumbnail rounded" src="../../IMG/<?php echo $producto['imagen']; ?> " width="50" alt="" srcset="">
                </td>

                <td><?php echo "$".$producto['precio']; ?> </td>

                <td>
                  <?php
                  
                  $algo=$producto['id_categoria'];
                  $c= "SELECT * FROM categorias WHERE id_categoria=$algo"; 
                  $query_= mysqli_query($conectar, $c);
                  $queryc = $query_;
                    foreach ($queryc as $key){
                         echo $key['nombre_categoria']; 
                    }
                   ?> 
                </td>
                         
                          

                <td>
                <form method="post">
                <input name="txtId" type="hidden" id="txtId" value="<?php echo $producto['id']; ?>"/>
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