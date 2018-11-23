<div class="row mt-2">
		<div class="col">
		      <h3 class="text-left">Archivos</h3>   
		</div>
</div>
<div class="row">
	 <div class="col">
	 	<button class="btn btn-info nuevos">Nuevo Archivo</button>
	 </div>
</div>

		<div id="ventanas">
			<div class="row">
				  <div class="col">
				  	  <div id="cabezera">
				  	  	<h6 class="text-center">Subir</h6>
				  	  	<span id="ocultacion">X</span>
				  	  </div>

                       <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="subir_archivo" enctype="multipart/form-data">
                       	 <input type="file" class="file" name="subir_documento" id="file-4">
                       	 <input type="text" name="desc_arch" class="mt-2 text-center form-control" placeholder="Descripcion">
				  	  <hr/>
				  	  </form>
				  </div>
			</div>
		</div>

<hr/>
<div class="row">
	<div class="col">
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<th class="text-center">Archivos</th>
				<th class="text-center">Descripcion</th>
				<th class="text-center">Tamaño</th>
				<th class="text-center">Fecha</th>
				<th class="text-center">Opciones</th>
			</thead>
			
				<?php foreach ($datos_archivos as $value): ?>
                  		<tr class=".lis">
							<td><?php echo $value['nombre']; ?></td>
							<td><?php echo $value['descripcion']; ?></td>
							<td><?php echo $value['tamano']; ?></td>
							<td><?php echo $value['fecha']; ?></td>
							<td>
							<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
						<?php echo '<a href="eliminar.php?eliminar='.$value['nroDocumentos'].'" class="btn btn-danger">Eliminar</a>' ?>
							</form>
							</td>
						</tr>
				<?php endforeach; ?>
		</table>
		<h5 class="text-center mt-5 bg-danger p-3 sin_subir_cell" style="color: #fff;">Por el momento no contienes archivos subidos</h5>
	</div>
</div>

<script type="text/javascript">

	var sin_subir = document.querySelector(".sin_subir_cell");
	var resultado_tabla = document.querySelector(".table tr td");
	if (resultado_tabla != null) {
    	sin_subir.style.display = "none";
	}else{
		sin_subir.style.display = "block";
	}

    var formulario_archivo = document.getElementById('subir_archivo');

	var btn_ventanas = document.querySelector(".nuevos");
	btn_ventanas.addEventListener("click", ventanas_modal);

	function ventanas_modal(){
		document.querySelector("#ventanas").style.display = "block";
		document.querySelector("#ventanas").style.WebkitAnimation = "ventana 1s 1";
	}
	//////////////////////////////////////////////
	var ocultacion = document.getElementById("ocultacion");
	ocultacion.addEventListener("click",ocultar_ventanas);
	
	function ocultar_ventanas(){
    document.getElementById("ventanas").style.display = "none";
    formulario_archivo.reset();
	}

</script>