<?php $titulo = "Buscar" ?>
<?php include('cabeza_sin_carrusel.php'); ?>
<?php 
/*consulta a base de datos para  buscar palabra introducida*/
   if (isset($_GET['palabra'])) {

   	   $palabra = $_GET['palabra'];
      $resultado_2 = objetos_usuarios::buscar_principal($palabra);
      $resultado_total_3 = objetos_usuarios::buscar_usuario($palabra); 
   }

?>
<style type="text/css">
	#mensaje{
		display: none;
	}
</style>
<section class="container mt-5">
	   <div class="row">
	   	   <div class="col mt-5"><h2 class="text-center">Tu Busqueda</h2></div>
       </div>
             <div class="row mt-4 justify-content-center" id="aviso">
              <!--mostrar los resultados de la busqueda-->
        	<?php foreach ($resultado_2 as $valor): ?>
        	 <div class="col-12 col-md-4 col-lg-3 mt-md-0 mb-4">
        	 	    <a style="text-decoration: none;" href="<?php echo $valor['enlace'] ?>">
        	 	    <div class="card">
        	 	    	<img src="<?php echo $valor['imagen']; ?>" class="card-img-top img-fluid">
        	 	    	<div class="card-block">
        	 	    		<h2 class="card-title"><?php echo $valor['titulo']; ?></h2>
        	 	    		<p class="card-text text-center" style="color: #000;"><?php echo $valor['descripcion']; ?></p>
        	 	    	</div>
        	 	    </div>
        	 	  </a>  
        	 </div>
        	<?php endforeach ?>
          <!--cierre del ciclo de la busqueda-->
<?php foreach ($resultado_total_3 as $value): ?>
          <div class="card mt-2">
    <div class="card-header">
        <a class="card-link" style="text-decoration: none;" data-toggle="collapse" data-parent="#accordion" href="#num<?php echo $value['nroPublicaciones']; ?>">
        <?php echo $value['titulo']; ?> <span class="mr-5 hidden-sm-down" style="position: absolute; right: 70px;">Articulo Publicado gracias ha: </span> <strong class="float-right"><?php echo $value['usuario']; ?></strong>
        </a>
    </div>

<div id="num<?php echo $value['nroPublicaciones']; ?>" class="collapse show">
        <div class="card-body">
        <p class="p-1"><?php echo $value['descripcion']; ?> <a href="<?php echo $value['enlace']; ?>">Leer mas aqui..</a></p>
        </div>
</div>

</div>
<?php endforeach; ?>
<!--cierre del ciclo de la busqueda-->        	 
        </div>

        <div class="row">
        	   <div class="col">
        	   	 	 <div class="alert alert-danger" id="mensaje">
                  <!--mensaje de contenido no encontrado-->
						<strong>Lo Sentimos: </strong> No se encontro lo que especificastes. Pero puedes ayudarnos a que mas adelante este disponible, Envianos el tema y una descripcion y con gusto lo publicaremos <a href="quieres_publicar.php" class="alert-link">Mensaje click aqui.</a> o crea tu cuenta, ya que tendras mas probabilidad que tu articulo se publique. <a href="iniciar sesion.php" class="alert-link">Iniciar sesion</a>
				  	</div>
        	   </div>
        </div>
</section>

<script type="text/javascript">
  //mostrar el mansaje si no se obtubieron resultados
	var mensaje = document.getElementById('mensaje');
	var verificar = document.querySelector('#aviso div');
	if (verificar == null) {
		mensaje.style.display = "block";
	}
	//console.log(verificar);

</script>
<?php include('pie.php'); ?>
