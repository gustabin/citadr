<?php
	//session_start(); 
	// conector de BD   
	require_once('tools/mypathdb.php');
	//===============================Encriptar la informacion ==================================
	$pin = $_GET['pin']; 
	//========================== Actualizar el tipo en la tabla tbl_usuarios=====================
	$query = mysql_query("UPDATE tbl_usuarios SET us_tipo=1 WHERE us_pin='$pin'");   
	
	//===================================================Redirigir a otra pagina==================				
	
	//header("Location: tools/ver.php");
	header("Location: login.php");
?>