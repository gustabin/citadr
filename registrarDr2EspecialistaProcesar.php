<?php
session_start();
	include "lib/corelib.php";
	require_once('tools/mypathdb.php');
	error_reporting(0);

$doc_id = $_SESSION['doc_id'];
$especialidad = $_POST ['especialidad'];
$motivos = $_POST ['motivos']; 

if ((strlen($especialidad)<1) OR (strlen($motivos)<1)) {   
			$data=array("error" => '1');
			die(json_encode($data));
			} 


	// ===============================================Buscar los datos en la tabla=====================================	
	$query = mysql_query("SELECT *FROM tbl_doctor_especialistas WHERE dre_doc_id='$doc_id'");
	$dataEspecialista = mysql_fetch_array($query);	

	if(empty($dataEspecialista))
		{
		// ===============================================Insertar los datos en la tabla=====================================
		$query = mysql_query("INSERT INTO tbl_doctor_especialistas(dre_especialidad, dre_motivos, dre_doc_id) VALUES ('$especialidad', '$motivos', '$doc_id');");
		}
	else
		{
		// ===============================================Actualizar los datos en la tabla=====================================	
		$query = mysql_query("UPDATE tbl_doctor_especialistas SET dre_especialidad='$especialidad', dre_motivos='$motivos' WHERE dre_doc_id='$doc_id'");			
		}
	
	
	// ===============================================Actualizar los datos en la tabla=====================================
	$query = mysql_query("UPDATE tbl_doctores SET doc_status='1' WHERE doc_id='$doc_id'");
	
	$data = array("exito" => '1');
	die(json_encode($data));
	//desconectar();
	mysql_close();
?>