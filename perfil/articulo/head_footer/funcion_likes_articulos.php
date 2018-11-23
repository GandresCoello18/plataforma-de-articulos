<div class="row p-2">	
	   	   	   		<div class="col-6">
	   	   	   			<h5>Te fue util este articulo:</h5>
	   	   	   		</div>
	   	   	   		<div class="col-6">
	   	   	   			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	   	   	   				<a class="btn btn-secondary" href="<?php echo"me gusta/like.php?obtener_2=$id_obtener"; ?>" id="estrella"><i class="flaticon-star-2" id="cambia_color"></i></a>
	   	   	   			</form>
	   	   	   		</div>
              </div>

	  	     </div>
	  </div>

	  <div class="btn_notas" title="Agregar Nota" data-toggle="modal" data-target="#myNota"></div>

	  <div class="modal fade" id="myNota">

		<div class="modal-dialog">
			<div class="modal-content">
<!-- Modal Header -->
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				<div class="modal-header">
					<h4 class="modal-title">Agregar un punto importante</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
<!-- Modal body -->
				<div class="modal-body">
					<textarea class="form-control" placeholder="Escribe....." name="texto_nota"></textarea>
				</div>
<!-- Modal footer -->
				<div class="modal-footer">
					<input type="text" name="etiqueta" placeholder="Etiqueta" id="etiqueta">
					<button type="submit" name="guardar_nota" class="btn btn-success">Guardar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				</div>
		</form>
			</div>
		</div>
	</div>
</section>