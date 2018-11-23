<?php 
session_start();
$numero_cuenta = $_SESSION['numero_cuenta'];

try{
     $conexion_art = new PDO('mysql:host=localhost;dbname=interprete_tech', 'root','');
    }catch(PDOException $e){ 
       echo "error".$e->getMessage();
    }

    $id_obtener_2 = $_GET['obtener_2'];

$consultar_art = $conexion_art->prepare("INSERT INTO le_gustaron (nroLike, nrocuentas, nroPublicaciones) VALUES (NULL, ".$numero_cuenta.", ".$id_obtener_2.")");
	$consultar_art->execute();
	echo '<script>
          window.history.go(-1);
          </script>';
          exit;
?>