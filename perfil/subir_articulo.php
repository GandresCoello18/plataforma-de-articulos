<?php

if (isset($_POST['mio'])) {
	$carpeta = 'documentos_usuario/';
    
    $Descripcion_arch = $_POST['desc_arch'];
    $nombre_del_documento = $_FILES['subir_documento']['name'];
    $tamano_del_documento = $_FILES['subir_documento']['size'];
    $temporal = $_FILES['subir_documento']['tmp_name'];
    $mi_numero_cuenta = $numero_cuenta;

    objetos_perfil::subido_php($Descripcion_arch,$nombre_del_documento,$tamano_del_documento,$temporal,$mi_numero_cuenta);
}
	$mi_numero_cuenta_2 = $numero_cuenta;
 	$datos_archivos = objetos_perfil::mostrar_archivos_subidos_php($mi_numero_cuenta_2);
?>


<div class="row mt-2">
		<div class="col">
		      <h3 class="text-left">Archivos</h3>   
		</div>
</div>
<div class="row">
	 <div class="col">
	 	<button class="btn btn-info nuevo">Nuevo Archivo</button>
	 </div>
</div>

		<div id="ventana">
			<div class="row">
				  <div class="col">
				  	  <div id="cabezera">
				  	  	<h6 class="text-center">Subir</h6>
				  	  	<span id="ocultar">X</span>
				  	  </div>

                       <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="subir_arch" enctype="multipart/form-data">
                       	<div class="form-group">
                       	 	<input type="file" class="file" name="subir_documento" id="file_arch">
                       	 	<input type="text" name="desc_arch" class="mt-2 text-center form-control" placeholder="Descripcion">
                       	</div>
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
                  		<tr>
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
		<h5 class="text-center mt-5 bg-danger p-3 sin_subir" style="color: #fff;">Por el momento no contienes archivos subidos</h5>
	</div>
</div>


<script type="text/javascript"> 

    var sin_subir = document.querySelector(".sin_subir");
	var resultado_tabla = document.querySelector(".table tr td");
	if (resultado_tabla != null) {
    	sin_subir.style.display = "none";
	}else{
		sin_subir.style.display = "block";
	}

    var formulario_arch = document.getElementById('subir_arch');

	var btn_ventana = document.querySelector(".nuevo");
	btn_ventana.addEventListener("click", ventana_modal);

	function ventana_modal(){
		document.querySelector("#ventana").style.display = "block";
		document.querySelector("#ventana").style.WebkitAnimation = "ventana 1s 1";
	}
	//////////////////////////////////////////////
	var ocultar = document.getElementById("ocultar");
	ocultar.addEventListener("click",ocultar_ventana);
	
	function ocultar_ventana(){
    document.getElementById("ventana").style.display = "none";
    formulario_arch.reset();
	}
</script>