<?php 

session_start();
$numero_cuenta = $_SESSION['numero_cuenta']; 
$id_obtener = $_GET['obtener'];

if (empty($id_obtener)) {
    header('location: ../publico.php');
}
	
try{
     $conexion_notas = new PDO('mysql:host=localhost;dbname=interprete_tech', 'root','');
    }catch(PDOException $e){ 
       echo "error".$e->getMessage();
    }

    if (isset($_POST['guardar_nota'])) {

    	$texto_nota = $_POST['texto_nota'];
    	$etiqueta = $_POST['etiqueta'];
    	
    $consulta_nota = $conexion_notas->prepare('INSERT INTO notas_de_los_articulos (nroNotas, nrocuentas, titulo_articulo, etiqueta, texto_nota) VALUES (NULL, :nrocuentas, :titulo_articulo, :etiqueta, :texto_nota)');
    $consulta_nota->execute(array(
    	':nrocuentas' => $numero_cuenta,
    	':titulo_articulo' => $titulo,
    	':etiqueta' => $etiqueta,
    	':texto_nota' => $texto_nota
    ));

    }


 ?>