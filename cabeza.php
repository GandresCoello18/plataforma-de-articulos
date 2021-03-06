<?php
/*verificar el botom submit*/
include('clases.php');
if (isset($_POST['envio'])) {

    $nombre = $_POST['Nombre'];
    $apellido  = $_POST['Apellido'];
    $correo = $_POST['correo'];
    $tema = $_POST['tema'];
    $descripcion = $_POST['descripcion'];

      objetos_usuarios::peticion_usuario($nombre,$apellido,$correo,$tema,$descripcion);
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

  <meta property="og:title" content="esto es una prueba">
  <meta property="og:description" content="mi descripcion graica de mi articulos">
  <meta property="og:image" content="">
  <meta property="og:url" content="https://cursosmegaup.bid">
  
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/principal.css">
	<link rel="stylesheet" type="text/css" href="font/flaticon.css">
  
</head>
<body>
<!--cabezara de la pagina-->
<header class="container">
        <div class="row">
        	   <div class="col">

<div class="row">
    <div class="col-12">
       <!--menu vertical en modo celular-->
       <div id="barra" class="hidden-md-up">
       	<div id="menu"></div> <div id="busco"><form action="buscar.php" method="get"><input type="search" name="palabra" placeholder="Escribe aqui..!" style="height: 40px; width: 150px; top: -40px; left: 150px; position: relative;"><button type="submit" class="nav-link btn btn-info" style="position: relative; left: 300px; top: -80px; height: 40px;"><img src="png/search - copia.png" style="width: 30px; height: 30px; position: relative; left: -5px; top: -5px;"></button></form></div>

         <nav id="navegacion-cell" style="width: 180px;">
         	<div id="cerrar"></div>
        	<ul class="nav flex-column">
        		<li class="nav-item">
<div id="bordes">
<!--logo izquierdo-->
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
        			<a href="inicio.php">Inicio</a>
        		</li>
        		<li class="nav-item hadware">
        		    <a href="iniciar sesion.php">Iniciar Sesion</a>	
        		</li>
        		<li class="nav-item software">
        			<a href="publico.php">Publicaciones</a>
        		</li>
        		<li class="nav-item" id="menu_bajo">
        			<div class="bg-info">Menu</div>
        		</li>
        	</ul>
        </nav>
      </div>  

       <!--menu horizontal vercion ordenador-->
       <nav id="navegacion" class="hidden-sm-down">
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
        			<a href="inicio.php" class="nav-link">Inicio</a>
        		</li>
        		<li class="nav-item">
        		    <a href="publico.php" class="nav-link">Publicaciones</a>	
        		</li>
        		<li class="nav-item">
        			<a href="iniciar sesion.php" class="nav-link">Iniciar Sesion</a>
        		</li>
        		<li class="nav-item">
        			<form method="get" action="buscar.php"><input type="search" name="palabra" placeholder="Escribe aqui..!" style="height: 40px; top: 5px; position: relative;"><button type="submit" class="nav-link btn btn-info" style="position: relative; left: 100px; top: -35px; height: 40px;"><img src="png/search - copia.png" style="width: 30px; height: 30px; position: relative; left: -5px; top: -5px;"></button></form>
        		</li>
        	</ul>
        </nav>

     </div>
 </div>
        	   	  <section id="carrusel">

        	   	  <div id="demo" class="carousel slide" data-ride="carousel">
						<ul class="carousel-indicators">
							<li data-target="#demo" data-slide-to="0" class="active"></li>
							<li data-target="#demo" data-slide-to="1"></li>
							<li data-target="#demo" data-slide-to="2"></li>
							<li data-target="#demo" data-slide-to="3"></li>
							<li data-target="#demo" data-slide-to="4"></li>
						</ul>
						
 						<div class="carousel-inner">
							<div class="carousel-item active">
								<img src="img/programa.jpg">
									<div class="carousel-caption">

									  <div class="row justify-content-center">
									  	<div class="col-12 col-md-4 caja">
										<h3 class="p-1">Informacion</h3>
										<p> Navega y Conoce</p>
									    </div>
									  </div>
									  	
									</div>
							</div>
							<div class="carousel-item">
								<img src="img/herramientas-2.jpg">
								<div class="carousel-caption">
									  <div class="row justify-content-center">
									  	<div class="col-12 col-md-5 caja">
										<h3 class="p-1">Herramientas y Metodologias</h3>
										<p style="font-size: 20px;"></p>
									    </div>
									  </div>	
								</div>
							</div>
							<div class="carousel-item">
								<img src="img/laptop.jpg">
								<div class="carousel-caption">
									 <div class="row justify-content-center">
									  	<div class="col-12 col-md-5 caja">
										<h3 class="p-1">Programacion</h3>
										<p style="font-size: 20px;">Para que sirven   Y  cuantos existen</p>
									    </div>
									 </div> 
								</div>
							</div>
							<div class="carousel-item">
								<img src="img/apps.jpg">
								<div class="carousel-caption">
									<div class="row justify-content-center">
									  	<div class="col-12 col-md-5 caja">
										<h3 class="p-1">Aplicaciones</h3>
										<p style="font-size: 20px;">Como funcionan en nuestro movil</p>
									    </div>
									</div>
								</div>
							</div>
							<div class="carousel-item">
								<img src="img/ordenador.jpg">
								<div class="carousel-caption">
									<div class="row justify-content-center">
									  	<div class="col-12 col-md-5 caja">
										<h3 class="p-1">Programacion</h3>
										<p style="font-size: 20px;">Como empezar  Y   En que nos benefician</p>
									    </div>
									</div>
								</div>
							</div>
						</div>

  						<a class="carousel-control-prev" href="#demo" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						</a>
						<a class="carousel-control-next" href="#demo" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
						</a>
    				</div>

                  </section>
        	   </div>
        </div>
</header>
