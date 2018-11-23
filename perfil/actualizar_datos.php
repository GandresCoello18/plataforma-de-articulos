<?php 
$numero_cuentas = $_SESSION['numero_cuenta'];
try{
     $conexion_actualizar = new PDO('mysql:host=localhost;dbname=interprete_tech', 'root','');
    }catch(PDOException $e){ 
       echo "error".$e->getMessage();
    }
    if (isset($_POST['actualizo'])) {

    	$actualizacion = array(
        $_POST['apellidos_actu'],
        $_POST['estado_actu'],
        $_POST['institucion_actu'],
        $_POST['especialización_actu'],
        $_POST['sexo'],
        $_POST['fecha_actu']
    	);

    	$mi_foto = $_FILES['foto_actu']['name'];
    	$mi_foto_temporal = $_FILES['foto_actu']['tmp_name'];

    	objetos_perfil::actualizar_datos($actualizacion,$mi_foto,$mi_foto_temporal,$titulo);
 }
 /////////////////////////////////////////////////////////////////////
 	$montar_datos = objetos_perfil::mostrar_los_datos_montados($conexion_actualizar,$numero_cuenta);
?>

<section id="container">
		<div class="row">
			  <div class="col">
			  		<article id="fondo_actualiza">
			  			<h5 class="text-center">Completa los campos</h5>
			  			<p class="text-center">Rellena todo los espacios para que los demas puedan saber quien eres.</p>
			  			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

			  				<div class="row">
			  					 <div class="col-6">
			  					 	<label>Apellidos</label>
			  					 	<input type="text" class="form-control" name="apellidos_actu" placeholder="Apellidos Completos" value="<?php echo $montar_datos['apellidos']; ?>"> 
			  					 </div>
			  					 <div class="col-6">
			  					 	<label>Estado</label>
			  					 	<input type="text" value="<?php echo $montar_datos['estado']; ?>" placeholder="Escribe un estado o tu frase favorita" name="estado_actu" class="form-control">
			  					 </div>
			  				</div>

			  				<div class="row mt-4">
			  					 <div class="col-6">
			  					 	<label for="Institucion">Institucion:</label>
			  					 	<select name="institucion_actu" class="form-control" id="Institucion" value="<?php echo $montar_datos['institucion']; ?>">
			  					 		<option value="Babahoyo">Babahoyo</option>
			  					 		<option value="Manuela Espejo">Manuela Espejo</option>
			  					 		<option value="Montalvo">Montalvo</option>
			  					 	</select>
			  					 </div>
			  					 <div class="col-6">
			  					 	<label for="carrera">Especialización:</label>
			  					 	<select name="especialización_actu" class="form-control" id="carrera" value="<?php echo $montar_datos['carrera']; ?>">
			  					 	<option value="Desarrollo de software">Desarrollo de software</option>
			  					 		<option  value="Viajes y Turismo">Viajes y Turismo</option>
			  					 		<option value="Administracion">Administracion</option>
			  					 		<option value="Diseño de moda">Diseño de moda</option>
			  					 		<option value="Diseño grafico">Diseño grafico</option>
			  					 		<option value="Analisis de sistemas">Analisis de sistemas</option>
			  					 	</select>
			  					 </div>
			  				</div>
			  				
			  				<div class="row mt-4">
			  					  	<div class="col-6">
			  					  		
										<label class="custom-control custom-radio"><input type="radio" name="sexo" value="Masculino" class="custom-control-input">
											<span class="custom-control-indicator"></span>
											<span class="custom-control-description">Masculino</span></label>
										

										<label class="custom-control custom-radio"><input type="radio" name="sexo" value="Femenino" class="custom-control-input">
											<span class="custom-control-indicator"></span>
											<span class="custom-control-description">Femenino</span></label>
			  					  </div>
			  					  <div class="col-6">
			  					  	    <label>Fecha de Nacimineto:</label>
			  					  	    <input type="date" name="fecha_actu" value="<?php echo $montar_datos['fecha_nacimiento'];?>">
			  					  </div>
			  				</div>

			  				<div class="row mt-4">
			  					  <div class="col">
			  					  	<label>Foto de Perfil:</label>
			  					  	 <input type="file" name="foto_actu" class="ml-2" id="foto_perfil" value="<?php echo $montar_datos['foto_perfil']; ?>">
			  					  </div>
			  				</div>

			  				<div class="row mt-4">
			  					 <div class="col">
			  					 	<input class="btn btn-info form-control" name="actualizo" type="submit" value="Guardar">
			  					 </div>
			  				</div>

			  			</form>
			  		</article>
			  </div>
		</div>
</section>
