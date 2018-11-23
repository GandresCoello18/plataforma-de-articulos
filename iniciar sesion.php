<?php
session_start();
$titulo = "Iniciar Sesion";
include('cabeza_sin_carrusel.php');

      if (isset($_SESSION['usuario'])) {
          header('location: perfil/perfil.php');
      }

  if (isset($_POST['Registrate'])) {

      $mi_nombre =  filter_var(strtolower($_POST['registroNombre']), FILTER_SANITIZE_STRING);
      $mi_usuario =  $_POST['registroUsuario'];
      $mi_contra = hash("sha512", $_POST['registroContraseña']);
      $verificacion = hash("sha512", $_POST['registroContraseña_2']);
      $prueba_contra = $_POST['registroContraseña'];
      
      if (strlen($prueba_contra) >= 7) {
        if (objetos_usuarios::validar($mi_nombre,$mi_usuario,$mi_contra,$verificacion) == 0) {
            objetos_usuarios::registrar_usuario($mi_nombre,$mi_usuario,$mi_contra,$verificacion);
        }
      }else{
          echo "<script type='text/javascript'>
                    alert('Falta caracteres en contraseña');
                  </script>";
    }
}

//codigo del acceso login.
if (isset($_POST['acceder'])) {

    $usuario_login = $_POST['nombreLoggin'];
    $contra_login = hash("sha512", $_POST['contrasenaLogin']);

    if ($usuario_login == "" || $contra_login == "") {
      $errores_login = "Datos incorrectos";
    }else{
      $errores_login = objetos_usuarios::acceder($usuario_login,$contra_login);
  }
}

?> 

<section class="container mt-5">
	   <div class="row">
	   	    <div class="col mt-2 mt-md-4">
	   	    	  <div id="fondo_imagen">
	   	    	  	  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="registro">
	   	    	  	  	   <h3 class="text-center p-3 mt-2">Registrate</h3>
	   	    	  	  	<div class="form-group p-3">

	   	    	  	  		<div class="row">
                    	  	   <div class="col-12 m-2">
                    	  	      	<label for="nombres">Nombre:</label>
	   	   	    					<input type="text" name="registroNombre" class="form-control" placeholder="Nombre" id="nombres">
	   	   	    		       </div>
                    	  	   <div class="col-12 m-2">
	   	   	    		  			<label for="usuario">Usuario:</label>
	   	   	    					<input type="text" name="registroUsuario" class="form-control" placeholder="Usuario" id="usuario">
                    	  	   </div>
                    	  </div>

                    	  <div class="row">
                    	  	   <div class="col-12 m-2">
                    	  	      	<label for="contra">Contrasena</label>
	   	   	    					<input type="password" name="registroContraseña" class="form-control" placeholder="Con 7 caracteres o mas" id="contra"><samp class="contra_1" onclick="vista_1()"></samp>
	   	   	    		       </div>

                          <div class="col-12 m-2">
                                 <label for="contra_2">Vuelve a escribir la Contrasena</label>
                        <input type="password" name="registroContraseña_2" class="form-control" placeholder="Con 7 caracteres o mas" id="contra_2"><samp class="contra_1" onclick="vista_2()"></samp>
                         </div>

                    	  </div>
                    	  	   
                    	  	   <div class="row mt-4">
                    	  	   		<div class="col-6">
	   	   	    						<button type="submit" name="Registrate" class="btn form-control" id="botom">Registrarse</button>
	   	   	    		       		</div>
	   	   	    		       		<div class="col-6">
	   	   	    						<button class="btn form-control" id="botomLogin">Login</button>
	   	   	    		       		</div>
                    	  	  </div>
                    	  
	   	    	  	  	</div>
	   	    	  	  </form>
	   	    	  </div>
	   	    </div>            
	   </div>

	   <div class="row">
	   	    <div class="col mt-2 mt-md-4">
	   	    	   <div id="fondo_imagen_Login">
                   	   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="login">
            		       <h3 class="text-center p-3 mt-2">Acceder</h3>
            		   	   <?php if(!empty($errores_login)): ?>
                            <strong style="color: red;"><?php echo $errores_login; ?></strong>
                       <?php endif; ?>
            		         <div class="form-group p-3">
                                   <div class="row">
                    	  	   			<div class="col-12 m-2">
                    	  	      			<label for="nombreLogin" class="icon-1">Usuario</label>
	   	   	    							<input type="text" name="nombreLoggin" class="form-control" placeholder="Usuario" id="nombreLogin">
	   	   	    		       			</div>
                    	  	   			<div class="col-12 m-2">
	   	   	    		  					<label for="usuarioLogin" class="icon-2">Contraseña</label>
	   	   	    							<input type="password" name="contrasenaLogin" class="form-control" placeholder="Contraseña" id="usuarioLogin">
                    	  	   			</div>
                    	  	   			</div>
                    	  	   			<div class="col-12 mt-4">
	   	   	    							<button type="submit" name="acceder" class="btn btn-primary form-control">Entrar</button>
                    	  	   			</div>
                    	  	   			<div class="col-12 mt-5">
	   	   	    							<div class="alert alert-info mt-2">
									<strong>Sugerencia:</strong> Accede para publicar contenido a beneficio de la comunidad. Si no posees una cuenta crea una ahora mismo <a href="#" class="alert-link" id="animacion"> Registrate.</a>
											</div>
                    	  	   			</div>
                    	  			</div>
            		         </div>	
            		  </form>
                   </div>
	   	    </div>
	   </div>
</section>
<!--animaciones del formulario de registro y login-->
<script type="text/javascript">
	var cuadro_login = document.getElementById('fondo_imagen_Login');

	var login = document.getElementById('animacion');
	var registro = document.getElementById('botomLogin');

	cargar();
	function cargar(){
		login.addEventListener("click", accion_1);
		registro.addEventListener("click", accion_2);
	}

	function accion_1(e){
		e.preventDefault();
        cuadro_login.style.WebkitAnimation = "maximizar 1s 1";
        setTimeout(function(){
        cuadro_login.style.display = "none";
        },1000);
	}

	function accion_2(){
        //cuadro_login.style.WebkitAnimation = "minimizar 1s 1";
        /*setTimeout(function(){
        cuadro_login.style.display = "block";
        },1000);*/
	}

	/////////////////////////////
  function vista_1(){
    var primer_contra = document.getElementById("contra");
if (primer_contra.getAttribute("type") == "password") {
    primer_contra.setAttribute("type", "text");
   }else{
    primer_contra.setAttribute("type", "password");
   } 
  }

  function vista_2(){
    var segundo_contra = document.getElementById("contra_2");
    if (segundo_contra.getAttribute("type") == "password") {
        segundo_contra.setAttribute("type", "text");
   }else{
    segundo_contra.setAttribute("type", "password");
   }
  }
</script>

<?php include('pie.php'); ?>