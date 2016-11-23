<?php
	require_once('tools/mypathdb.php');
   //=========================Borrar la data de las tablas ============================================

	$query=mysql_query("DELETE from tbl_citas");
	$query=mysql_query("DELETE from tbl_pacientes");
	$query=mysql_query("DELETE from tbl_imagenes");
	$query=mysql_query("DELETE from tbl_horarios");
	$query=mysql_query("DELETE from tbl_doctor_especialistas");
	$query=mysql_query("DELETE from tbl_doctores");
	$query=mysql_query("DELETE from tbl_usuarios");
	
	mysql_close();
	header("Location: logout.php")
?>