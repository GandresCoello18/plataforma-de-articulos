<?php  
$titulo = 'Interesantes';
include('cabeza_2.php');
/*conexion con base de datos */
try{
  $conexion_4 = new PDO('mysql:host=localhost;dbname=interprete_tech', 'root','');
}catch(PDOException $e){
  echo "error" . $e->getMessage();
  die();
}
/*contando paginas*/
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$PostPorPagina = 10;

  $Conocimientos = objetos_perfil::mostrar_tutoriales($pagina,$conexion_4,$PostPorPagina);
  $numeroPagina = objetos_perfil::mostrar_paginacion($conexion_4,$PostPorPagina);
#codigo del comentario.
session_start();
$numero_cuenta = $_SESSION['numero_cuenta'];
  $mostrar_comentario = objetos_perfil::mostrar_comentarios_de_tutoriales($conexion_4);
?>

<!--cabeza de la pagina-->

<section class="container mt-5">
	    <div class="row">
        	 <div class="col mt-2 mt-md-4"><h1 class="text-center" id="titulo">Adquiere Conocimientos</h1></div>
        </div>	

         <div class="row">
            <!--ciclo con base de datos conocimientos-->
            <?php foreach ($Conocimientos as $value): ?>
               <div class="col">
                     <article class="mt-5">
                        <ul class="nav nav-pills barra_inte">
                        <li class="nav-item">
                        <a class="nav-link active" data-toggle="pill" href="#video<?php echo $value['nriConocimiento']; ?>">Video</a></li>
                        <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#exp<?php echo $value['nriConocimiento']; ?>">Explicacion</a></li>
                        <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#preg<?php echo $value['nriConocimiento']; ?>">Preguntas</a></li>
                        <li class="nav-item">
                        <a class="nav-link mr-3 mr-md-5" data-toggle="pill" href="#" id="temas"><?php echo $value['titulo']; ?></a></li>
                        </ul>
                <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active container" id="video<?php echo $value['nriConocimiento']; ?>">
                                <!--<iframe id="tamano_video" height="315" src="<?php #echo $value['video']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
                            <video src="../img/memorizar.mp4" id="tamano_video" class="cuadro fondo" controls=""></video>
                            </div>

                            <div class="tab-pane container bordes" id="exp<?php echo $value['nriConocimiento']; ?>">
                             <p class="p-3"><?php echo $value['explicacion']; ?></p>

                    <!--cierre del ciclo conocimientos-->
                    
<div class="row">
    <div class="col-12 col-md-6">
        <!--explicacion izquierda-->
<pre>
<?php echo $value['codigo_1']; ?> 
</pre>
    </div>
    <div class="col-12 col-md-6">
        <!--explicacion derecha-->
<pre>
<?php echo $value['codigo_2']; ?>
</pre>  
    </div>
</div>
                                
    
                            </div>
                            <!--ciclo de preguntas-->
                            <div class="tab-pane container bordes" id="preg<?php echo $value['nriConocimiento']; ?>">
                                <div class="row">
                                     <div class="col mt-3">
                                        <h4 class="text-center"><?php echo $value['preguntas']; ?></h4>
                                        <hr>
                                     </div> 
                                </div>

                                    <div class="row mt-4">
                                        <div class="col comentario">
                                            <div class="alert alert-danger text-center vacio_com" style="display:none;">Por el momento no existe comentarios</div>
                                            
                                                <?php foreach ($mostrar_comentario as $valor): ?>
                                                    
                <div class="row mt-1">
                    <div class="col">
                        <div class="media">
                                    <?php if($value['nriConocimiento'] == $valor['nriConocimiento']): ?>
                                <img src="<?php echo $valor['foto_perfil']; ?>" width="50" height="70" class="d-flex align-self-start  mr-2">
                            <div class="media-body ml-3" id="caja_comentarios">
                            <h4 class="ml-2" style="color: #3299bb"><a style="text-decoration: none;" href="vista_previa_perfil.php?previa=<?php echo $valor['nrocuentas']; ?>"><?php echo $valor['usuario']; ?></a></h4>
                            <p class="ml-2" style="color: #000;"><?php echo $valor['texto']; ?></p>
                            </div>
                                    <?php endif; ?>
                        </div>
                    </div>
                </div>
                
                                                <?php endforeach; ?>

                                        </div>
                                    </div>

                                <div class="row mt-2 p-2">
                                    <div class="col-8">
                                         <form method="post" id="form_coment" action="agregar_comentario.php">
                                             <input type="text" name="comentario" id="comentario" placeholder="Escribe tu respuesta" class="form-control comentario_usuario">
                                             <input type="text" style="display: none;" name="numero" value="<?php echo $value['nriConocimiento']; ?>">
                                     </div>
                                     
                                     <div class="col-4">
                                         <button type="submit" id="btn_comento" class="btn btn-primary form-control botom_public" name="public_coment" style="color: #fff;">Enviar</button>
                                         </form>
                                     </div>
                                </div>
                            </div>
                        </div>
                    </article>
               </div>
               
           <?php endforeach; ?>
         </div>
        
</section>  

<div class="row mt-5">
       	     <div class="col">
				 <section class="paginacion justify-content-center d-flex">
        			<ul>
                        <!--validar paginacion derecha o izquierda-->
        				<?php if ($pagina == 1):?>
                            <li class="disable">&laquo;</li>
                        <?php else: ?>
                            <li><a href="?pagina=<?php echo $pagina - 1; ?>">&laquo;</a></li>
                        <?php endif; ?> 

                        <?php  
                        
                         for ($i=1; $i <= $numeroPagina; $i++) { 
                            if ($pagina == $i) {
                                echo "<li class='active'><a href='?pagina=$i'>$i</a></li>";
                            }else{
                                echo "<li><a href='?pagina=$i'>$i</a></li>";
                            }
                         }
                       ?>   
                         <!--crecion de numeros de paginas-->
                         <?php if ($pagina == $numeroPagina):?>
                            <li class="disable">&raquo;</li>
                        <?php else: ?>
                            <li><a href="?pagina=<?php echo $pagina + 1; ?>">&raquo;</a></li>
                        <?php endif; ?> 
        			</ul>
        		</section>     
       	     </div>
       </div>

<!--pie de pagina-->
<?php include('pie.php'); ?> 

<script type="text/javascript">
    var sin_comentario = document.querySelector(".vacio_com");
    var seccion_comentario = document.querySelector(".comentario p");
    if (seccion_comentario == null) {
        sin_comentario.style.display = "block";
    }else{
        sin_comentario.style.display = "none";
    }
////////////////////////////////////////////////////////////////////
    /*$(document).ready(function(){
        $('#btn_comento').click(function(){
            var datos = $('#comentario').val();
            alert(datos);
            $.get('agregar_comentario.php',{"palabras":datos},function(mi_comentario){

            })
            $.ajax({
                type:"post",
                url:"agregar_comentario.php",
                data:datos,
                success:function(datos){
                    if (datos==1) {
                        alert("exito");
                    }else{
                        alert("denegado");
                    }
                }
            })
                    
        })
    })*/
</script>