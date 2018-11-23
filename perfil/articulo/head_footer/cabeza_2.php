<?php
if (isset($_POST['envio'])) {

    $nombre = $_POST['Nombre'];
    $apellido  = $_POST['Apellido'];
    $correo = $_POST['correo'];
    $tema = $_POST['tema'];
    $descripcion = $_POST['descripcion'];

    if (empty($nombre) == 1 || empty($apellido) == 1 || empty($correo) == 1 || empty($tema) == 1 || empty($descripcion) == 1) {
        //echo "por favor rellenar todo los campos";
     }else{
        $conexion_2 = mysqli_connect("localhost","root","","interprete_tech");
       
       $insertar = "INSERT INTO peticion_usuarios(Nombre, Apellido, correo, tema, descripcion) VALUES ('$nombre','$apellido','$correo','$tema','$descripcion')";

        $verificar_usuario_2 = mysqli_query($conexion_2, "SELECT * FROM peticion_usuarios WHERE correo = '$correo'");
       if (mysqli_num_rows($verificar_usuario_2) > 0) {
         echo '<script>
               alert("Anteriormente estos datos ya han sido registrado");
               window.history.go(-1);
               </script>';
               exit;
       }


       $verificar_usuario = mysqli_query($conexion_2, "SELECT * FROM peticion_usuarios WHERE tema = '$tema'");
       if (mysqli_num_rows($verificar_usuario) > 0) {
         echo '<script>
               alert("Anteriormente estos datos ya han sido registrado");
               window.history.go(-1);
               </script>';
               exit;
       }


       $verificar_usuario_3 = mysqli_query($conexion_2, "SELECT * FROM peticion_usuarios WHERE descripcion = '$descripcion'");
       if (mysqli_num_rows($verificar_usuario_3) > 0) {
         echo '<script>
               alert("Anteriormente estos datos ya han sido registrado");
               window.history.go(-1);
               </script>';
               exit;
       }



       $resultado = mysqli_query($conexion_2, $insertar);
    
     }
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title><?php echo $titulo; ?></title>
  <meta name="descripcion" content="interprete-tech es un sitio creado para la publicaciones de articulos con temas tecnologicos">
  <meta name="keywords" content="temas de tecnologia, informatica, software, hardware">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minium-scale=1.0">
  <meta name="author" content="interprete-t.com">
  <meta name="owner" content="Andres Coello Goyes">
  <meta name="robots" content="index, follow">

  <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../../css/principal.css">
  <link rel="stylesheet" type="text/css" href="../../font/flaticon.css">
  <link rel="stylesheet" type="text/css" href="../../css/sobre_nostros.css">
  <link rel="stylesheet" type="text/css" href="../../css/quieres_publicar.css">
  <link rel="stylesheet" type="text/css" href="../../css/interesante.css">
  <link rel="stylesheet" type="text/css" href="../../css/perfiles_usuario.css">
  <link rel="stylesheet" type="text/css" href="../../css/subir_archivos.css">
  <link rel="stylesheet" type="text/css" href="../../css/fileinput.css">
  <link rel="stylesheet" type="text/css" href="../../css/actualizar.css">
  <link rel="stylesheet" type="text/css" href="../../css/progreso_estudio.css">
  <link rel="stylesheet" type="text/css" href="../../css/detalle_articulo.css">
  <link rel="stylesheet" type="text/css" href="css/estilos_para_los_articulos.css">

</head>
<body>
<!--cabezara de la pagina-->
<header class="container">
        <div class="row">
             <div class="col">

<div class="row">
    <div class="col-12">
       <!--menu vertical-->
       <div id="barra" class="hidden-md-up">
        <div id="menu"></div> 
         <nav id="navegacion-cell" style="width: 180px;">
          <div id="cerrar"></div>
          <ul class="nav flex-column">
            <li class="nav-item">
<div id="bordes">

<div class="circle uno bg-info"></div>
<div class="circle dos bg-info"></div>
<div class="circle tres bg-info"></div>
<div class="circle cuatro bg-info"></div>
<div class="circle cinco bg-info"></div>

<div class="raya R1">|</div>
<div class="raya R2">|</div>
<div class="raya R3">|</div>
<div class="raya R4">|</div>

</div>

              </li>
            <li class="nav-item inicio">
              <a href="#" class="usua usua_cell">Usuario</a>
            </li>
            <li class="nav-item hadware">
                <!--<a href="#">Interesante</a>-->
                <div class="btn-group" style="position: relative;left: 25px; font-weight: bold;">
             Interesantes
            <a class="dropdown-toggle dropdowntoggle-split" data-toggle="dropdown" style="position: relative;left: -15px;top: -10px;">
              <span class="caret"></span>
            </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="../interesantes.php">Introduccion al Desarrollo del Software</a>
          <a class="dropdown-item" href="../interesantes.php">Fundamentos De Programacion</a>
          <a class="dropdown-item" href="../interesantes.php">Base de Datos</a>
          <a class="dropdown-item" href="../interesantes.php">Programacion Orientada a Objetos</a>
          <a class="dropdown-item" href="../interesantes.php">Base de Datos Avanzada</a>
          <a class="dropdown-item" href="../interesantes.php">Programacion Visual</a>
          <a class="dropdown-item" href="../interesantes.php">Desarrollo Aplicaciones Moviles</a>
          <a class="dropdown-item" href="../interesantes.php">Programacion de Aplicaciones Web</a>
        </div>
      </div>  
            </li>
            <li class="nav-item software">
              <a href="../publico.php">Publicaciones</a>
            </li>
            <li class="nav-item" id="menu_bajo">
              <div class="bg-info">Menu</div>
            </li>
          </ul>
        </nav>
      </div>  

                    <div id="submenu_cell" class="hidden-md-up">
                      <h6 class="text-center mt-3 p-1"><a href="../perfil.php">Mi Perfil</a></h6>
                      <h6 class="mt-3 p-1 ml-4"><a href="../cerrar.php">Cerrar Session</a></h6>
                    </div>

     <div class="lista_de_software hidden-sm-down">
          <a class="dropdown-item" href="../interesantes.php">Introduccion al Desarrollo del Software</a>
          <a class="dropdown-item" href="../interesantes.php">Fundamentos De Programacion</a>
          <a class="dropdown-item" href="../interesantes.php">Base de Datos</a>
          <a class="dropdown-item" href="../interesantes.php">Programacion Orientada a Objetos</a>
          <a class="dropdown-item" href="../interesantes.php">Base de Datos Avanzada</a>
          <a class="dropdown-item" href="../interesantes.php">Programacion Visual</a>
          <a class="dropdown-item" href="../interesantes.php">Desarrollo Aplicaciones Moviles</a>
          <a class="dropdown-item" href="../interesantes.php">Programacion de Aplicaciones Web</a>
    </div>

       <!--menu horizontal-->
       <nav id="navegacion" class="hidden-sm-down" style="z-index: 999;">
          <ul class="nav justify-content-center">
            <li class="nav-item">
               
<div id="bordes">

<div class="circle uno bg-info"></div>
<div class="circle dos bg-info"></div>
<div class="circle tres bg-info"></div>
<div class="circle cuatro bg-info"></div>
<div class="circle cinco bg-info"></div>

<div class="raya R1">|</div>
<div class="raya R2">|</div>
<div class="raya R3">|</div>
<div class="raya R4">|</div>

</div>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link usua">Usuario</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link software_lista dropdown-toggle">Interesante</a>
            </li>
            <li class="nav-item">
              <a href="../publico.php" class="nav-link">Publicaciones</a>
            </li>
          </ul>
        </nav>
                    <div id="submenu" class="hidden-sm-down">
                      <h6 class="text-center mt-3 p-1"><a href="../perfil.php">Mi Perfil</a></h6>
                      <h6 class="mt-3 p-1 ml-4"><a href="../cerrar.php">Cerrar Session</a></h6>
                    </div>
     </div>
 </div>
                
             </div>
        </div>
</header>

<script type="text/javascript">
  var sub_cell = document.getElementById('submenu_cell');
  var usua_cell = document.querySelector(".usua_cell");

  usua_cell.addEventListener("mouseenter", mostrar_cell);
  function mostrar_cell() {
    sub_cell.style.display = "block";
  }

  var sub = document.getElementById('submenu');

  var usua = document.querySelector("#navegacion .usua");
  usua.addEventListener("click", mostrar);
  function mostrar() {
    if (sub.style.display == "none") {
      sub.style.display = "block";
    }else{
      sub.style.display = "none";
    }
    /*setTimeout(function(){
      sub.style.display = "none";
    },7000);*/
  }    
</script>