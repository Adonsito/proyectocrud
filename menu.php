<style type="text/css">

    * {
      padding:0px;
      margin: 0px;
    }

    #header {
      margin:auto;
      width:1100px;
      font-family:Arial, Helvetica, sans-serif;
    }

    ul, ol {
      list-style:none;
    }

    .nav li a {
        background-color: #000;
        color:#fff;
        text-decoration:none;
        padding:10px 15px;
        display:block;
    }

    .nav>li{
        float:left;
    }

      .nav li a:hover {
        background-color:#434343;
      }
      .nav>li{
        float:left;
      }

      .nav li ul{
        display:none;
        position:relative;
        right:-140px;
        top:0px;
      }

      .nav li:hover>ul{
          display:block;
      }

    </style>

<div id="header">
       <ul class="nav">
           <li><a  href=""> Administrador del sitio web <span class="sr-only">(current)</span></a></li>
           <li><a  href="">Inicio</a></li>
           <li><a  href="">Productos</a></li>
           <li><a  href="">Registro de Clientes</a></li>
           <li><a  href="">Cerrar Sesion</a></li>
           <li><a  href="" >Vista del sitio web</a></li>          
           <li><a  href="">Dropdown</a>
           <ul>
            <li><a  href="#">Action</a></li>
            <li><a  href="#">Another action</a></li>
            <li><a  href="#">Something else here</a></li>
            <li><a  href="#">Separated link</a></li>
            </ul>
            </li>
      </ul>  
    </div>


    <?php $fecha_actual = date("d");   
    
    echo $fecha_actual;
    ?>


