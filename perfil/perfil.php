<?php
session_start();
if (!isset($_SESSION['usuario'])) {
	 header('location: ../iniciar sesion.php');
}
$titulo = $_SESSION['usuario'];
$numero_cuenta = $_SESSION['numero_cuenta'];
include('cabeza_2.php');


  $resultado_perfil = objetos_perfil::datos_perfil();

?>

</style>

<section class="container-fluid mt-5 fondo_animado">
	  <div class="row">
	  	   <div class="col desplegable">
	  	       <div id="mi_perfil"></div>
	  	       <div class="row">
	  	       	  	<div class="col"><figure><img src="<?php echo $resultado_perfil['foto_perfil']; ?>"><figcaption class="text-center"><b><?php echo $titulo; ?></b></figcaption></figure>
	  	       	  	    <article id="listas">
	  	       	  			<ul class="nav flex-column lista">
	  	       	  				<li class="text-center subir"><a href="#" id="uno" onclick="subir(1)">Subir articulo</a></li>
	  	       	  				<li class="text-center mis_art"><a href="#" onclick="Mis_art(2)">Detalles articulo</a></li>
	  	       	  				<li class="text-center actualiza"><a href="#" onclick="act_dat(3)">Actualizar datos</a></li>
	  	       	  				<li class="text-center progreso"><a href="#" onclick="pro_est(4)">Progreso Estudio</a></li>
	  	       	  			</ul>
	  	       	  		</article>

	  	       	  	</div>


	  	       	  	
	  	  				<div class="col mi_contenido grande hidden-sm-down">
	  	  					<article id="principal_perfil">
	  	  						<div class="row mt-3">
	  	  							  <div class="col">
	  	  							  	  <h3 class="text-center dato">Mi Perfil</h3>
	  	  							  </div>
	  	  						</div>
                                <div class="row mt-5">
                                	<div class="col">
                                		<h4 class="text-center">¿Como te llamas?</h4>
                        			<div class="circle_red"></div> 
                        			<div class="circle_exito"></div>
                        						<p class="text-center"><cite class="information"><?php echo $resultado_perfil['nombre']; ?></cite></p>
                                	</div>

                                	<div class="col">
                                		<h4 class="text-center">¿Tus Apellidos?</h4>
                                	<div class="circle_red"></div> 
                                	<div class="circle_exito"></div>
                                				<p class="text-center"><cite class="information"><?php echo $resultado_perfil['apellidos']; ?></cite></p>
                                	</div>

                                </div>

                                <hr/>

                                <div class="row mt-5">
                                	<div class="col">
                                		<h4 class="text-center">¿Donde Estudias?</h4>
                                		<div class="circle_red"></div> 
                                		<div class="circle_exito"></div>
                                					<p class="text-center"><cite class="information"><?php echo $resultado_perfil['institucion']; ?></cite></p>
                                	</div>

                                	<div class="col">
                                		<h4 class="text-center">¿Que estudias?</h4>
                                		<div class="circle_red"></div> 
                                		<div class="circle_exito"></div>
                                					<p class="text-center"><cite class="information"><?php echo $resultado_perfil['carrera']; ?></cite></p>
                                	</div>

                                </div>

                                <hr/>

                                <div class="row mt-5">
                                	<div class="col">
                                		<h4 class="text-center">¿Tu frase favorita?</h4>
                                		<div class="circle_red"></div> 
                                		<div class="circle_exito"></div>
                                					<p class="text-center"><cite class="information"><?php echo $resultado_perfil['estado']; ?></cite></p>
                                	</div>

                                	<div class="col">
                                		<h4 class="text-center">Tu Usuario</h4>
                                		<div class="circle_red"></div> 
                                		<div class="circle_exito"></div>
                                					<p class="text-center"><cite class="information"><?php echo $resultado_perfil['usuario']; ?></cite></p>
                                	</div>

                                </div>

                                <hr/>

                                <div class="row mt-5">
                                	 <div class="col">
                                	 	<h4 class="text-center">¿Cuando Nacistes?</h4>
                                	 	<div class="circle_red"></div> 
                                	 	<div class="circle_exito"></div>
                                	 				<p class="text-center"><cite class="information"><?php echo $resultado_perfil['fecha_nacimiento']; ?></cite></p>
                                	 </div>

                                	 <div class="col">
                                	 	<h4 class="text-center">Tu Sexo</h4>
                                	 	<div class="circle_red"></div> 
                                	 	<div class="circle_exito"></div>
                                	 				<p class="text-center"><cite class="information"><?php echo $resultado_perfil['sexo']; ?></cite></p>
                                	 </div>

                                </div>

	  	  					</article>
           	    			<article id="subir_articulo"><?php include('subir_articulo.php'); ?></article>
           	    			<article id="mis_articulos"><?php include('detalles_articulo.php'); ?></article>
           	    			<article id="actualiza_datos"><?php include('actualizar_datos.php');?></article>
           	    			<article id="progreso_estudio"><?php include('progreso_estudio.php'); ?></article>
	  					</div>
	  	       	</div>

	  	   </div>
	  </div>

<script type="text/javascript">
	
	var circle_red = document.querySelector(".circle_red");
	var circle_exito = document.querySelectorAll(".circle_exito");

	var veri = document.querySelectorAll(".information");
	for (var i = 0; i <= veri.length; i++) {
		if (veri[i].innerText == "No Especificado" || veri[i].innerText == null || veri[i].innerText == '') {
			circle_exito[i].style.display = "none";
		}else{
			circle_exito[i].style.display = "block";
		}
	}
</script>
      <!--Instrucciones para la vercion movil-->


	  <div class="row justify-content-center d-flex hidden-md-up">
	  	  <div class="col mi_contenido_cell" onclick="ocult()">

	  	  		<article id="principal_perfil_cell">
                      
	  	  			<div class="row mt-3">
	  	  							  <div class="col">
	  	  							  	  <h3 class="text-center">Mi Perfil</h3>
	  	  							  </div>
	  	  						</div>
                                <div class="row mt-5">
                                	<div class="col">
                                		<h4 class="text-center">Nombres</h4>
                                		<div class="circle_red_cell"></div>
                                		<div class="circle_exito_cell"></div>
                                					 <p class="text-center"><cite class="information_cell"><?php echo $resultado_perfil['nombre']; ?></cite></p>
                                	</div>

                                	<div class="col">
                                		<h4 class="text-center">Apellidos</h4>
                                		<div class="circle_red_cell"></div> 
                                		<div class="circle_exito_cell"></div>
                                					<p class="text-center"><cite class="information_cell"><?php echo $resultado_perfil['apellidos']; ?></cite></p>
                                	</div>
                                </div>
                                <hr/>
                                <div class="row mt-5">
                                	<div class="col">
                                		<h4 class="text-center">Institucion</h4>
                                		<div class="circle_red_cell"></div> 
                                		<div class="circle_exito_cell"></div>
                                					<p class="text-center"><cite class="information_cell"><?php echo $resultado_perfil['institucion']; ?></cite></p>
                                	</div>

                                	<div class="col">
                                		<h4 class="text-center">Especialidad</h4>
                                		<div class="circle_red_cell"></div> 
                                		<div class="circle_exito_cell"></div>
                                					<p class="text-center"><cite class="information_cell"><?php echo $resultado_perfil['carrera']; ?></cite></p>
                                	</div>
                                </div>
                                <hr/>
                                <div class="row mt-5">
                                	<div class="col">
                                		<h4 class="text-center">Estado</h4>
                                		<div class="circle_red_cell"></div> 
                                		<div class="circle_exito_cell"></div>
                                					<p class="text-center"><cite class="information_cell"><?php echo $resultado_perfil['estado']; ?></cite></p>
                                	</div>

                                	<div class="col">
                                		<h4 class="text-center">Usuario</h4>
                                		<div class="circle_red_cell"></div> 
                                		<div class="circle_exito_cell"></div>
                                					<p class="text-center"><cite class="information_cell"><?php echo $resultado_perfil['usuario']; ?></cite></p>
                                	</div>
                                </div>
                                <hr/>
                                <div class="row mt-5">
                                	 <div class="col">
                                	 	<h4 class="text-center">Nacimiento</h4>
                                	 	<div class="circle_red_cell"></div> 
                                	 	<div class="circle_exito_cell"></div>
                                	 				<p class="text-center"><cite class="information_cell"><?php echo $resultado_perfil['fecha_nacimiento']; ?></cite></p>
                                	 </div>
                                	 <div class="col">
                                	 	<h4 class="text-center">Sexo</h4>
                                	 	<div class="circle_red_cell"></div> 
                                	 	<div class="circle_exito_cell"></div>
                                	 				<p class="text-center"><cite class="information_cell"><?php echo $resultado_perfil['sexo']; ?></cite></p>
                                	 </div>
                                </div>

	  	  		</article>

           	    <article id="subir_articulo_cell"><?php include('subir_articulo_cell.php'); ?></article>
           	    <article id="mis_articulos_cell"><?php include('detalles_articulo_cell.php'); ?></article>
           	    <article id="actualiza_datos_cell"><?php include('actualizar_datos.php');?></article>
           	    <article id="progreso_estudio_cell"><?php include('progreso_estudio.php'); ?></article>
           </div>
	  </div>
	  <div id="Boton_desplegable"><span class="ml-4">Menu</span></div>
<script type="text/javascript">


	var circle_red_cell = document.querySelector(".circle_red_cell");
	var circle_exito_cell = document.querySelectorAll(".circle_exito_cell");

	var veri_cell = document.querySelectorAll(".information_cell");
	for (var i = 0; i <= veri_cell.length; i++) {
		if (veri_cell[i].innerText == "No Especificado" || veri[i].innerText == null || veri[i].innerText == '') {
			circle_exito_cell[i].style.display = "none";
		}else{
			circle_exito_cell[i].style.display = "block";
		}
	}
</script>
</section>

<script type="text/javascript">
    var menu = document.querySelector(".desplegable");

    function ocult(){
        if (menu.style.left == "0px") {
            menu.style.left = "-290px";
            Boton_desplegable.innerText = "Mostrar";
        }
    }

	//////////////////////////////////////////////////////////
	var Boton_desplegable = document.getElementById('Boton_desplegable');
	Boton_desplegable.addEventListener("click", despliegue);

	function despliegue() {

		if (menu.style.left == "-290px") {
			menu.style.left = "0px";
			Boton_desplegable.innerText = "ocultar";
		}else{
			menu.style.left = "-290px";
			Boton_desplegable.innerText = "Mostrar";
		}
	}

	////////////////////////////////////

    var arreglo = [document.getElementById("principal_perfil"),document.getElementById("subir_articulo"),document.getElementById("mis_articulos"),document.getElementById("actualiza_datos"),document.getElementById("progreso_estudio")];

    var arreglo_cell = [document.getElementById("principal_perfil_cell"),document.getElementById("subir_articulo_cell"),document.getElementById("mis_articulos_cell"),document.getElementById("actualiza_datos_cell"),document.getElementById("progreso_estudio_cell")];

    function aparecer_y_desaparecer(vigito){
        for (var i = 0; i <= 10; i++) {
                arreglo[i].style.display = "none";
                arreglo_cell[i].style.display = "none";

            if (arreglo[i] == arreglo[vigito]) {
                arreglo[i].style.display = "block";
            }
            if (arreglo_cell[i] == arreglo_cell[vigito]) {
                arreglo_cell[i].style.display = "block";
            }
        }
    }

    function mover_menu() {
        if (menu.style.left == "0px") {
            menu.style.left = "-290px";
            Boton_desplegable.innerText = "Mostrar";
        }
    }

    function subir(uno){
        mover_menu();
        aparecer_y_desaparecer(uno);
    }

    function Mis_art(dos){
        mover_menu();
        aparecer_y_desaparecer(dos);
    }

    function act_dat(tres){
        mover_menu();
        aparecer_y_desaparecer(tres);
    }

    function pro_est(cuatro){
        mover_menu();
        aparecer_y_desaparecer(cuatro);
    }

</script>

<?php include('pie.php'); ?>