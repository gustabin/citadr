<?php
	session_start();
	include "lib/corelib.php";
	require_once('tools/mypathdb.php');
//error_reporting(0);
	$text = $_POST ['resumen'];
    $replaced = str_replace("'", "", $text); //eliminar comillas
	$curriculum = str_replace('"', "", $replaced);
	$doc_id = $_SESSION['doc_id'];
	
	if (strlen($curriculum)<100) {   //validar que el curriculum no este en blanco
			$data=array("error" => '1');
			die(json_encode($data));
			} 
	
	
	// ===============================================Actualizar los datos en la tabla=====================================
	$query = mysql_query("UPDATE tbl_doctores SET doc_curriculum='$curriculum' WHERE doc_id='$doc_id'"); 
	
	
		
	//===================================================Redirigir a otra pagina============================================

	if($query == false) 
		{
		$data = array("error" => '1'); // nunca ocurre
		die(json_encode($data));
		}
	else 
		{
		$data = array("exito" => '1');
		die(json_encode($data));
		}
	//desconectar();
	mysql_close();
?>