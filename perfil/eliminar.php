<?php
session_start();
include('clases_perfil.php');
$numero_cuenta = $_SESSION['numero_cuenta'];
try{
     $conexion_eliminar = new PDO('mysql:host=localhost;dbname=interprete_tech', 'root','');
    }catch(PDOException $e){ 
       echo "error".$e->getMessage();
    }
$id= $_GET['eliminar'];

	objetos_perfil::eliminar_documento($conexion_eliminar,$id);

//////////////////////////////////////////////
$id_nota = $_GET['nota'];

	objetos_perfil::eliminar_notas($conexion_eliminar,$id_nota);

header('location: perfil.php');
?>