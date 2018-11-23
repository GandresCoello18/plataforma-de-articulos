<?php
$titulo = "Vista Previa";
include('cabeza_2.php');

$cuenta_vista = $_GET['previa'];

try{
     $conexion_vista = new PDO('mysql:host=localhost;dbname=interprete_tech', 'root','');
    }catch(PDOException $e){ 
       echo "error".$e->getMessage();
    }

   $consulta_vista_mostrar = objetos_perfil::mostrar_vista_previa($conexion_vista,$cuenta_vista);
?>

<section class="container mt-5 blanco_fondo">
		<div class="row justify-content-center">
				<div class="col-4 col-md-2 bg-inf foto_vista_previa">
					<figure><img src="<?php echo $consulta_vista_mostrar['foto_perfil']; ?>"></figure>
				</div>
				<div class="col-8 col-md-5">
					<h5 class="mt-5 ml-3"><?php echo $consulta_vista_mostrar['usuario']; ?></h5>
					<p class="ml-3"><?php echo $consulta_vista_mostrar['estado']; ?></p>
				</div>
		</div>
		<div class="row justify-content-center">
				<div class="col_12 col-md-6 info_vista_previa">
					<h5 class="text-center p-3">Informacion</h5>
				</div>
		</div>
		<div class="row justify-content-center">
			<div class="col_12 col-md-6">
					<ul class="p-2">
						<li class="p-1"><strong>Se llama: </strong><cite><?php echo $consulta_vista_mostrar['nombre']; ?>  <?php echo $consulta_vista_mostrar['apellidos']; ?></cite></li>
						<li class="p-1"><strong>Estudia en: </strong><cite><?php echo $consulta_vista_mostrar['institucion']; ?></cite></li>
						<li class="p-1"><strong>En la especialidad: </strong><cite><?php echo $consulta_vista_mostrar['carrera']; ?></cite></li>
						<li class="p-1"><strong>articulos publicados: </strong><cite><?php echo $consulta_vista_mostrar['articulos_publicados']; ?></cite></li>
					</ul>
				</div>
		</div>
</section>

<?php include('pie.php'); ?>