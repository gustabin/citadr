<?php
session_start(); 
require_once('tools/mypathdb.php');
$email = $_POST ['Email'];
$clave = $_POST ['Password'];
$nombre = $_POST ['Nombre'];
$apellido = $_POST ['Apellido'];
$telefono= $_POST['Telefono'];
$fecha_nac= $_POST['fecha_nac'];
$sexo= $_POST['Sexo'];
$id_user= $_POST['id_user'];

    //========================== Actualizar solo la clave en la tabla tbl_usuarios=====================
	$query_actualizaUsuario = mysql_query("UPDATE tbl_usuarios SET us_clave='$clave' WHERE us_email='$email'");
	//$actualizaUsuario = mysql_query($query_actualizaUsuario); 	
	
	//========================== Actualizar la tabla tbl_pacientes =====================
	$query_actualizaPaciente = mysql_query("UPDATE tbl_pacientes SET pac_nombre='$nombre', pac_apellido='$apellido', pac_telefono='$telefono', pac_fecha_nac='$fecha_nac', pac_sexo='$sexo' WHERE pac_id_user='$id_user'");		

		mysql_close();
		$data=array("exito" => '1');
		die(json_encode($data));
?>