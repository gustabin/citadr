<?php
session_start(); 
//error_reporting(0);
require_once('tools/mypathdb.php');
	$cit_id = $_GET ['id'];
   //=========================Consultar la tabla citas ============================================
   //============================Buscar y borrar citas por confirmar ==============================
	$query=mysql_query("DELETE from tbl_citas WHERE cit_id='$cit_id'");
	$_SESSION['citaSinConfirmar']="";
	//desconectar();		
	mysql_close();
	header("Location: citasConfirmar.php")
?>