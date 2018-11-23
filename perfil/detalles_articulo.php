<?php
try{
     $conexion_detalle = new PDO('mysql:host=localhost;dbname=interprete_tech', 'root','');
    }catch(PDOException $e){ 
       echo "error".$e->getMessage();
    }
    $mi_numero_cuenta = $numero_cuenta;
     $datos_detalle = objetos_perfil::mostrar_detalle_articulo_php($mi_numero_cuenta,$conexion_detalle);
    ///////////////////////////////////////////////////////////////////////////////////////
    $consulta_like_mostrar = objetos_perfil::mostrar_likes_articulo($mi_numero_cuenta,$conexion_detalle);
    ///////////////////////////////////////////////////////////////////////////////////////
    $sacar_usua = objetos_perfil::mostrar_usuario_likes($mi_numero_cuenta,$conexion_detalle);
    ////////////////////////////////////////////////////////////////////////////////////////
    $consulta_notas_usuario = objetos_perfil::mostrar_notas_php($mi_numero_cuenta,$conexion_detalle);
    ///////////////////////////////////////////////////////////////////////////////////////////
    /*le gusto a... datos de reacciones izquierdo*/
    $le_gusto_a = objetos_perfil::mostrar_le_gusto_a($mi_numero_cuenta,$conexion_detalle);
    ////////////////////////////////////////////////////////////////////////////////////////////
    $le_gusto_a_articulo = objetos_perfil::mostrar_le_gusto_articulo($mi_numero_cuenta,$conexion_detalle);
    ////////////////////////////////////////////////////////////////////////////////////////////

?>
<section class="container">
						<h5 class="text-center mt-4 tit_datalle">Publicacion en proceso....</h5>

							<div class="progress mt-3">
								<div class="progress-bar bg-info espera">
										ESPERA
								</div>
								<div class="progress-bar bg-success aceptado">
										ACEPTADO
								</div>
								<div class="progress-bar bg-danger rechazado">
										RECHAZADO
								</div>
							</div>
<h6 class="mt-5">Respuesta Publicacion</h6>
<hr/>

		<div class="row mt-0">
				<div class="col">
					<?php foreach ($datos_detalle as $value): ?>
						<a style="text-decoration: none;" href="<?php echo $value['enlace']; ?>">
					<div class="mt-2 alert <?php echo $value['color']; ?>">
						<strong></strong><?php echo $value['nombre_archivo']; ?>...........<strong><?php echo $value['estado']; ?></strong>..........<strong><?php echo $value['fecha']; ?></strong>
					</div>
						</a>
					<?php endforeach; ?>
				</div>
		</div>

<h6>Notas</h6>
<hr/>

<div class="row mt-3">
	<?php foreach ($consulta_notas_usuario as $value): ?>
	<div class="col-12 col-md-3 ml-md-4 col-lg-2 ml-lg-5 ml-xl-3">
		<div class="card" style="width:200px">
			<div class="card-body">
				<h6 class="card-title p-1"><?php echo $value['titulo_articulo']; ?></h6>
				<p class="card-text p-2"><?php echo $value['texto_nota']; ?></p>
				<span class="badge badge-pill badge-info"><strong class="p-2"><?php echo $value['etiqueta']; ?></strong></span>
				<span class="badge badge-pill badge-danger"><a style="color: #fff;" href="eliminar.php?nota=<?php echo $value['nroNotas']; ?>" class="p-2">Eliminar</a></span>
			</div>
		</div>
	</div>
	<?php endforeach; ?>
</div>

<h6 class="mt-4">Reacciones</h6>
<hr>
		<div class="row mt-4">
				<div class="col gusto_col">
					<h6 class="text-center text-md-left le_gusto">Les gustaron</h6>
				</div>
				<div class="col gusto_col">
					<h6 class="text-center text-md-left me_gusto">Me gusto</h6>
				</div>
		</div>

		<div class="row">
				<div class="col col-lg-6 contenido_le_gusta">
		  			<ol class="mis_like_2">
		  				<li class="ninguno_2" class="p-2" style="display: none;"><strong style="color: red;">No existen actividades por el momento</strong></li>
		  				<?php foreach ($le_gusto_a as $value) : ?>
		  					<li class="p-2">A<strong><a href="vista_previa_perfil.php?previa=<?php echo $value['nrocuentas']; ?>"> <?php echo $value['usuario']; ?></a></strong> Le gusto <?php foreach ($le_gusto_a_articulo as $valor): ?>
	<strong>....<a href="<?php echo $valor['enlace']; ?>"> <?php echo $valor['titulo']; ?></a></strong></li>
		  									<?php endforeach; ?>
		  				<?php endforeach; ?>	
		  			</ol>
				</div>	
		</div>

		<div class="row">
				<div class="col col-lg-6 contenido_me_gusta">
					<ol class="mis_like">
		  				<li class="ninguno" class="p-2" style="display: none;"><strong style="color: red;">No existen actividades</strong></li>

		  				<?php foreach ($consulta_like_mostrar as $value) : ?>
		  					<li class="p-2">Te gusto <strong><a href="<?php echo $value['enlace']; ?>?obtener=$value['nroPublicaciones']"><?php echo $value['titulo']; ?></a></strong> De <?php foreach ($sacar_usua as $valor) : ?>
		  					<strong><a href="vista_previa_perfil.php?previa=<?php echo $valor['nrocuentas']; ?>"><?php echo $valor['usuario']; ?></a></strong></li>
		  				<?php endforeach; ?>
		  				<?php endforeach; ?>
		  			</ol>
				</div>
		</div>

</section>


<script type="text/javascript">

	var izquierdo = document.querySelector(".contenido_le_gusta");
	var derecho = document.querySelector(".contenido_me_gusta");

	var le_gusto = document.querySelector(".le_gusto");
	le_gusto.addEventListener("mouseenter", funcion_le_gusto);

	function funcion_le_gusto() {
		izquierdo.style.display = "block";
		derecho.style.display = "none";
	}

	var me_gusto = document.querySelector(".me_gusto");
	me_gusto.addEventListener("mouseenter", funcion_me_gusto);

	function funcion_me_gusto() {
		derecho.style.display = "block";
		izquierdo.style.display = "none";
	}

	
	var ninguno = document.querySelector(".ninguno");
	var mis_like = document.querySelector(".mis_like a");
	if (mis_like == null) {
		ninguno.style.display = "block";
	}else{
		ninguno.style.display = "none";
	}

	var ninguno_2 = document.querySelector(".ninguno_2");
	var mis_like_2 = document.querySelector(".mis_like_2 a");
	if (mis_like_2 == null) {
		ninguno_2.style.display = "block";
	}else{
		ninguno_2.style.display = "none";
	}
</script>