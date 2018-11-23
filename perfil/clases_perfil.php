<?php

	class objetos_perfil{

		static function datos_perfil(){

            $titulo = $_SESSION['usuario'];
            $numero_cuenta = $_SESSION['numero_cuenta'];

		try{
     		$conexion_perfil = new PDO('mysql:host=localhost;dbname=interprete_tech', 'root','');
    	}catch(PDOException $e){ 
       		echo "error".$e->getMessage();
    	}

   		$Perfil_datos = $conexion_perfil->prepare("SELECT * FROM cuentas_usuarios WHERE usuario = :usuario");

    	$Perfil_datos->execute(array(':usuario' => $titulo));

    	$resultado_perfil = $Perfil_datos->fetch();
    	return $resultado_perfil;
		}

        static function subido_php($Descripcion_arch,$nombre_del_documento,$tamano_del_documento,$temporal,$mi_numero_cuenta){

            $carpeta = 'documentos_usuario/';

        try{
            $conexion_subir = new PDO('mysql:host=localhost;dbname=interprete_tech', 'root','');
        }catch(PDOException $e){ 
            echo "error".$e->getMessage();
        }

         $consulta_arch = $conexion_subir->prepare('INSERT INTO archivos_documentos (nroDocumentos, nombre, descripcion, tamano, fecha, nrocuentas) VALUES (null, :nombre, :descripcion, :tamano, :fecha, :nrocuentas)');

         $consulta_arch->execute(array(
          ':nombre' => $nombre_del_documento,
          ':descripcion' => $Descripcion_arch,
          ':tamano' => $tamano_del_documento.' Bytes',
          ':fecha' => date("d-m-Y"),
          ':nrocuentas' => $mi_numero_cuenta
          ));

         $obtenerNumDocu = $conexion_subir->prepare('SELECT nroDocumentos FROM archivos_documentos WHERE nrocuentas = :nrocuentas ORDER BY nroDocumentos DESC');

         $obtenerNumDocu->execute(array(
                ':nrocuentas' => $mi_numero_cuenta
         ));

         $resultd0 = $obtenerNumDocu->fetch();
   

        $consulta_datelles = $conexion_subir->prepare('INSERT INTO detalles_articulo (nroDetalles, estado, nrocuentas, nroDocumentos, color, nombre_archivo, enlace) VALUES (null, :estado, :nrocuentas, :nroDocumentos, :color, :nombre_archivo, :enlace)');

         $consulta_datelles->execute(array(
          ':estado' => 'Espera..',
          ':nrocuentas' => $mi_numero_cuenta,
          ':nroDocumentos' => $resultd0['nroDocumentos'],
          ':color' => 'alert-info',
          ':nombre_archivo' => $nombre_del_documento,
          ':enlace' => '#'
          ));
    
            opendir($carpeta);
            $destino = $carpeta.$nombre_del_documento;
            copy($temporal,$destino);

        }


        static function mostrar_archivos_subidos_php($mi_numero_cuenta_2){
         
          try{
            $conexion_subir = new PDO('mysql:host=localhost;dbname=interprete_tech', 'root','');
          }catch(PDOException $e){ 
            echo "error".$e->getMessage();
          }
          
          $consulta_mostrar = $conexion_subir->prepare('SELECT * FROM archivos_documentos WHERE nrocuentas = :nrocuentas ORDER BY nroDocumentos DESC');

          $consulta_mostrar->execute(array(':nrocuentas' => $mi_numero_cuenta_2));

          $datos_archivos = $consulta_mostrar->fetchAll();
          return $datos_archivos;
        }


        static function mostrar_detalle_articulo_php($mi_numero_cuenta,$conexion_detalle){

 $consulta_detalle = $conexion_detalle->prepare('SELECT archivos_documentos.fecha, detalles_articulo.nombre_archivo, detalles_articulo.color, detalles_articulo.estado, detalles_articulo.enlace FROM detalles_articulo INNER JOIN archivos_documentos ON detalles_articulo.nroDocumentos = archivos_documentos.nroDocumentos WHERE detalles_articulo.nrocuentas = :nrocuentas ORDER BY nroDetalles DESC');

  $consulta_detalle->execute(array(':nrocuentas' => $mi_numero_cuenta));

    $datos_detalle = $consulta_detalle->fetchAll();
        return $datos_detalle;
        }


        static function mostrar_likes_articulo($mi_numero_cuenta,$conexion_detalle){
          
            $consulta_likes = $conexion_detalle->prepare('SELECT publicaciones.enlace, publicaciones.titulo, publicaciones.nrocuentas FROM le_gustaron INNER JOIN cuentas_usuarios ON le_gustaron.nrocuentas = cuentas_usuarios.nrocuentas INNER JOIN publicaciones ON publicaciones.nroPublicaciones = le_gustaron.nroPublicaciones WHERE cuentas_usuarios.nrocuentas = :nrocuentas ORDER BY nroLike DESC');
            $consulta_likes->execute(array(':nrocuentas' => $mi_numero_cuenta));
            $consulta_like_mostrar = $consulta_likes->fetchAll();
            return $consulta_like_mostrar;
        }


        static function mostrar_usuario_likes($mi_numero_cuenta,$conexion_detalle){

    $sacar_usua = $conexion_detalle->prepare('SELECT cuentas_usuarios.usuario, cuentas_usuarios.nrocuentas FROM publicaciones INNER JOIN cuentas_usuarios ON publicaciones.nrocuentas = cuentas_usuarios.nrocuentas WHERE publicaciones.nrocuentas in (SELECT publicaciones.nrocuentas FROM le_gustaron INNER JOIN cuentas_usuarios ON le_gustaron.nrocuentas = cuentas_usuarios.nrocuentas INNER JOIN publicaciones ON publicaciones.nroPublicaciones = le_gustaron.nroPublicaciones WHERE cuentas_usuarios.nrocuentas = :nrocuentas)');
    $sacar_usua->execute(array(':nrocuentas' => $mi_numero_cuenta));
    $sacar_usua = $sacar_usua->fetchAll();
    return $sacar_usua;
        }


        static function mostrar_notas_php($mi_numero_cuenta,$conexion_detalle){
          
          $consulta_notas_usuario = $conexion_detalle->prepare('SELECT * FROM notas_de_los_articulos WHERE nrocuentas = :nrocuentas');
          $consulta_notas_usuario->execute(array(':nrocuentas' => $mi_numero_cuenta));
          $consulta_notas_usuario = $consulta_notas_usuario->fetchAll();
          return $consulta_notas_usuario;
        }


        static function mostrar_le_gusto_a($mi_numero_cuenta,$conexion_detalle){
              
              $le_gusto_a = $conexion_detalle->prepare('SELECT cuentas_usuarios.usuario, cuentas_usuarios.nrocuentas FROM le_gustaron INNER JOIN cuentas_usuarios ON le_gustaron.nrocuentas = cuentas_usuarios.nrocuentas WHERE le_gustaron.nroPublicaciones IN (SELECT publicaciones.nroPublicaciones FROM publicaciones INNER JOIN le_gustaron ON le_gustaron.nroPublicaciones = publicaciones.nroPublicaciones INNER JOIN cuentas_usuarios ON publicaciones.nrocuentas = cuentas_usuarios.nrocuentas WHERE cuentas_usuarios.nrocuentas = :nrocuentas) ORDER BY cuentas_usuarios.nrocuentas DESC');
          $le_gusto_a->execute(array(':nrocuentas' => $mi_numero_cuenta));
           $le_gusto_a = $le_gusto_a->fetchAll();
           return $le_gusto_a;
        }


        static function mostrar_le_gusto_articulo($mi_numero_cuenta,$conexion_detalle){
              
              $le_gusto_a_articulo = $conexion_detalle->prepare('SELECT publicaciones.titulo, publicaciones.enlace, publicaciones.nrocuentas FROM le_gustaron INNER JOIN publicaciones ON le_gustaron.nroPublicaciones = publicaciones.nroPublicaciones WHERE publicaciones.nrocuentas = :nrocuentas ORDER BY publicaciones.nroPublicaciones DESC');
            $le_gusto_a_articulo->execute(array(':nrocuentas' => $mi_numero_cuenta));
            $le_gusto_a_articulo = $le_gusto_a_articulo->fetchAll();
            return $le_gusto_a_articulo;
        }


        static function mostrar_comentarios_de_tutoriales($conexion_4){

            $mostrar_comentario = $conexion_4->prepare('SELECT comentarios.texto, cuentas_usuarios.usuario, cuentas_usuarios.nrocuentas, cuentas_usuarios.foto_perfil, conocimientos.nriConocimiento FROM comentarios INNER JOIN cuentas_usuarios ON comentarios.nrocuentas = cuentas_usuarios.nrocuentas INNER JOIN conocimientos ON conocimientos.nriConocimiento = comentarios.nriConocimiento WHERE conocimientos.nriConocimiento IN (select nriConocimiento from conocimientos)');
            $mostrar_comentario->execute();
            $mostrar_comentario = $mostrar_comentario->fetchall();
            return $mostrar_comentario;
        }


        static function mostrar_tutoriales($pagina,$conexion_4,$PostPorPagina){
          
          /*consulta a la base de datos*/
          $inicio = ($pagina > 1) ? ($pagina * $PostPorPagina - $PostPorPagina) : 0; 
          $Conocimientos = $conexion_4->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM conocimientos ORDER BY nriConocimiento DESC LIMIT 10");

          $Conocimientos->execute();
          $Conocimientos = $Conocimientos->fetchall();
          return $Conocimientos;
          /*redireccionar si la pagina no existe*/
          if (!$Conocimientos) {
          header('location: perfil/perfil.php');
          }
        }


        static function mostrar_paginacion($conexion_4,$PostPorPagina){
          
            /*mostrar cantidad de articuslos por pagina*/
            $totalArticulos = $conexion_4->query('SELECT FOUND_ROWS() as total');
            $totalArticulos = $totalArticulos->fetch()['total'];
            /*validar paginacion*/
            $numeroPagina = ceil($totalArticulos / $PostPorPagina);
            return $numeroPagina;
        }


        static function mostrar_publicaciones_perfil($conexion_3,$pagina,$PostPorPagina){
          
              $inicio = ($pagina > 1) ? ($pagina * $PostPorPagina - $PostPorPagina) : 0; 
              $publico = $conexion_3->prepare("SELECT SQL_CALC_FOUND_ROWS publicaciones.titulo, publicaciones.nroPublicaciones, publicaciones.descripcion, publicaciones.enlace, cuentas_usuarios.usuario, cuentas_usuarios.nrocuentas, cuentas_usuarios.foto_perfil FROM publicaciones INNER JOIN cuentas_usuarios ON publicaciones.nrocuentas = cuentas_usuarios.nrocuentas ORDER BY nroPublicaciones DESC LIMIT $inicio, $PostPorPagina");

              $publico->execute();
              $publico = $publico->fetchall();
              return $publico;
                /*redireccionar si la pagina no exite*/
              if (!$publico) {
                header('location: inicio.php');
              }
        }


        static function actualizar_datos($actualizacion,$mi_foto,$mi_foto_temporal,$titulo){
          
            $carpeta = 'fotos_usuario/';
            $img = 'fotos_usuario/';

            $actualizar_datos = $conexion_actualizar->prepare("UPDATE cuentas_usuarios SET institucion = :institucion, carrera = :carrera, foto_perfil = :foto_perfil, estado = :estado, apellidos = :apellidos, fecha_nacimiento = :fecha_nacimiento, sexo = :sexo WHERE usuario = :usuario");

        $actualizar_datos->execute(array(
        ':institucion' => $actualizacion[2],
        ':carrera' => $actualizacion[3],
         ':foto_perfil' => $img.$mi_foto,
        ':estado' => $actualizacion[1],
        ':apellidos' => $actualizacion[0],
        ':fecha_nacimiento' => $actualizacion[5],
        ':sexo' => $actualizacion[4],
        ':usuario' => $titulo
       ));

      opendir($carpeta);
      $destino = $carpeta.$_FILES['foto_actu']['name'];
      copy($mi_foto_temporal,$destino);
      }


        static function mostrar_los_datos_montados($conexion_actualizar,$numero_cuentas){
          
              $montar_datos = $conexion_actualizar->prepare('SELECT * FROM cuentas_usuarios WHERE nrocuentas = :nrocuentas');
              $montar_datos->execute(array(':nrocuentas' => $numero_cuentas));
              $montar_datos = $montar_datos->fetch();
              return $montar_datos;
        }

        static function mostrar_vista_previa($conexion_vista,$cuenta_vista){

            $consulta_vista = $conexion_vista->prepare("SELECT * FROM cuentas_usuarios WHERE nrocuentas=".$cuenta_vista.";");    $consulta_vista->execute();
            $consulta_vista_mostrar = $consulta_vista->fetch();
            return $consulta_vista_mostrar;
        }

        static function eliminar_documento($conexion_eliminar,$id){
          
      $consulta_eliminar = $conexion_eliminar->prepare("SELECT nombre FROM archivos_documentos WHERE nroDocumentos=".$id.";");
      $consulta_eliminar->execute();
      $consulta_eliminar = $consulta_eliminar->fetch();

      $espera = unlink("documentos_usuario/".$consulta_eliminar['nombre']);

      $consulta_eliminar_data_base = $conexion_eliminar->prepare("DELETE FROM archivos_documentos  WHERE nroDocumentos =".$id.";");
      $consulta_eliminar_data_base->execute();
        
    }

        static function eliminar_notas($conexion_eliminar,$id_nota){
            
      $consulta_eliminar_nota = $conexion_eliminar->prepare("DELETE FROM notas_de_los_articulos WHERE nroNotas=".$id_nota.";");
      $consulta_eliminar_nota->execute();
        }


        static function agregar_nuevo_comentario($conexion_agregar_comentario,$comentario,$numero_cuenta,$numero){
          
              $usuario_comentario = $conexion_agregar_comentario->prepare('INSERT INTO comentarios (nroComentario, texto, nrocuentas, nriConocimiento) VALUES (null, :texto, :nrocuentas, :nriConocimiento)');

              $usuario_comentario->execute(array(':texto' => $comentario, ':nrocuentas' => $numero_cuenta, ':nriConocimiento' => $numero));

        echo '<script>
                window.history.go(-1);
              </script>';
       exit;
        }
	}

?>