
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
					<div class="mt-2 alert <?php echo $value['color']; ?>">
						<strong><?php echo $value['nombre_archivo']; ?></strong>............<strong class="ml-0"><?php echo $value['estado']; ?></strong>..........<strong class="ml-0">04-11-2018</strong>
					</div>
					<?php endforeach; ?>
				</div>
		</div>

<h6>Notas</h6>
<hr/>
<div class="row mt-3">
	<?php foreach ($consulta_notas_usuario as $value): ?>
		<div class="col mb-3">
			<div class="card targeta_cell">
				<div class="card-body">
					<h6 class="card-title p-1"><?php echo $value['titulo_articulo']; ?></h6>
					<p class="card-text p-2"><?php echo $value['texto_nota']; ?></p>
					<span class="badge badge-pill badge-info"><strong class="p-4"><?php echo $value['etiqueta']; ?></strong></span>
					<span class="badge badge-pill badge-danger"><a style="color: #fff;" href="eliminar.php?nota=<?php echo $value['nroNotas']; ?>" class="p-2">Eliminar</a></span>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>

<h6>Reacciones</h6>		
<hr>
		<div class="row mt-4">
				<div class="col gusto_col">
					<h6 class="text-center text-md-left le_gusto" onclick="le_gusto_cell()">Les gustaron</h6>
				</div>
				<div class="col gusto_col">
					<h6 class="text-center text-md-left me_gusto" onclick="me_gusto_cell()">Me gusto</h6>
				</div>
		</div>

		<div class="row">
				<div class="col col-lg-6 contenido_le_gusta contenido_le_gusta_cell">
		  			<ol class="mis_like_cell_2">
		  				<li class="ninguno_cell_2" class="p-2" style="display: none;"><strong style="color: red;">No existen actividades por el momento</strong></li>

		  					<?php foreach ($le_gusto_a as $value) : ?>
		  					<li class="p-2">A<strong><a href="vista_previa_perfil.php?previa=<?php echo $value['nrocuentas']; ?>"> <?php echo $value['usuario']; ?></a></strong> Le gusto <?php foreach ($le_gusto_a_articulo as $valor): ?>
	<strong>....<a href="<?php echo $valor['enlace']; ?>"> <?php echo $valor['titulo']; ?></a></strong></li>
		  				<?php endforeach; ?>
		  				<?php endforeach; ?>
		  			</ol>
				</div>	
		</div>

		<div class="row">
				<div class="col col-lg-6 contenido_me_gusta contenido_me_gusta_cell">
					<ol class="mis_like_cell">
		  				<li class="ninguno_cell" class="p-2" style="display: none;"><strong style="color: red;">No existen ninguna actividades por el momento</strong></li>

		  				<?php foreach ($consulta_like_mostrar as $value) : ?>
		  					<li class="p-2">Te gusto <strong><a href="<?php echo $value['enlace']; ?>?obtener=$value['nroPublicaciones']"><?php echo $value['titulo']; ?></a></strong> De <?php foreach ($sacar_usua as $valor) : ?>
		  					<strong><a href="vista_previa_perfil.php?previa=<?php echo $valor['nrocuentas']; ?>"><?php echo $valor['usuario']; ?></a></strong></li>
		  				<?php endforeach; ?>
		  				<?php endforeach; ?>
		  				<hr/>
		  			</ol>
				</div>
		</div>
</section>

<script type="text/javascript">

	var ellos_cell = document.querySelector(".contenido_le_gusta_cell");
	var yo_cell = document.querySelector(".contenido_me_gusta_cell");

	function le_gusto_cell() {
		if (ellos_cell.style.display == "none") {
            ellos_cell.style.display = "block";
            yo_cell.style.display = "none";
		}else{
			//ellos_cell.style.display = "none";
		}
	}

	function me_gusto_cell() {
		if (yo_cell.style.display == "none") {
			yo_cell.style.display = "block";
			ellos_cell.style.display = "none";
		}else{
			yo_cell.style.display = "none";
			ellos_cell.style.display = "block";
		}
	}
	var ninguno_cell = document.querySelector(".ninguno_cell");
	var mis_like_cell = document.querySelector(".mis_like_cell a");
	if (mis_like_cell == null) {
		ninguno_cell.style.display = "block";
	}else{
		ninguno_cell.style.display = "none";
	}

	var ninguno_cell_2 = document.querySelector(".ninguno_cell_2");
	var mis_like_cell_2 = document.querySelector(".mis_like_cell_2 a");
	if (mis_like_cell_2 == null) {
		ninguno_cell_2.style.display = "block";
	}else{
		ninguno_cell_2.style.display = "none";
	}
</script>