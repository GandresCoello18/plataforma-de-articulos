<?php  
$titulo = 'Publicaciones';
 include('cabeza_2.php');
/*concexion con base de datos*/
try{
  $conexion_3 = new PDO('mysql:host=localhost;dbname=interprete_tech', 'root','');
}catch(PDOException $e){
  echo "error" . $e->getMessage();
  die();
}
/*contador de paginas*/
$pagina = isset($_GET['public']) ? (int)$_GET['public'] : 1;
$PostPorPagina = 15;
/*consulta a la base de datos*/
  $publico = objetos_perfil::mostrar_publicaciones_perfil($conexion_3,$pagina,$PostPorPagina);
  $numeroPagina = objetos_perfil::mostrar_paginacion($conexion_3,$PostPorPagina);
?> 
<!--cabeza de la pagina-->

<section class="container mt-5">
      <div class="row">
             <div class="col mt-2 mt-md-3">
                 <div class="alert alert-warning text-center">
                    <strong>Tus Pubicaciones: </strong> esta es la seccion donde se publican los contenidos o temas pedidos por los usuarios. Si deseas enviar tu tema puedes escribir un <a href="../quieres_publicar.php" class="alert-link">Mensaje click aqui</a>
                 </div>
             </div>
      </div>

      <div class="row">
            <div class="col">
                  <div id="accordion">
                    <!--ciclo de base da datos publicaciones-->
                    <?php foreach ($publico as $value): ?>
<div class="card mt-2">
    <div class="card-header">
      <div class="row">
          <div class="col-8">
            <a class="card-link ml-4 pin" style="text-decoration: none;" data-toggle="collapse" data-parent="#accordion" href="#num<?php echo $value['nroPublicaciones']; ?>">
          <?php echo $value['titulo']; ?>............<span class="hidden-sm-down">Articulo Publicado gracias ha: </span>.......<strong><a href="vista_previa_perfil.php?previa=<?php echo $value['nrocuentas']; ?>"><?php echo $value['usuario']; ?></a></strong>
          </a>
        </div>

        <div class="col-4 col-sm-3 col-md-1">
              <figure id="foto_publi" class="ml-3"><img src="<?php echo $value['foto_perfil']; ?>"></figure>
        </div>
      </div>
  </div>

<div id="num<?php echo $value['nroPublicaciones']; ?>" class="collapse show">
        <div class="card-body">
        <p class="p-1"><?php echo $value['descripcion']; ?> <a href="<?php echo $value['enlace'];?>?obtener='<?php echo $value['nroPublicaciones']; ?>' ">Leer mas aqui..</a></p>
        </div>
</div>

</div>
            <?php endforeach; ?>
            <!--cierre del ciclo publicaciones-->

                </div>
            </div>
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


<!--pie de la pagina-->
<?php include('pie.php'); ?>