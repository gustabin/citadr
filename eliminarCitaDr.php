<?php
session_start(); 
//error_reporting(0);
require_once('tools/mypathdb.php');
	$cit_id = $_GET ['id'];
    $cit_status=5; //marcar como borrada
	// ===========================================Marcar como borrada la cita============================================
	$query = "UPDATE tbl_citas SET cit_status='$cit_status' WHERE cit_id= '$cit_id'";

	$dataCitas = mysql_query($query); 
	$_SESSION['citaSinConfirmar']="";
	//desconectar();		
	mysql_close();
	header("Location: citasDoctor.php")
?>