<?php
session_start();
include('clases_perfil.php');
$numero_cuenta = $_SESSION['numero_cuenta'];
try{
  $conexion_agregar_comentario = new PDO('mysql:host=localhost;dbname=interprete_tech', 'root','');
}catch(PDOException $e){
  echo "error" . $e->getMessage();
}

$numero = $_POST['numero'];
$comentario = $_POST['comentario'];

   objetos_perfil::agregar_nuevo_comentario($conexion_agregar_comentario,$comentario,$numero_cuenta,$numero);
?>