<?php
session_start();
//error_reporting(0);  
require_once('tools/mypathdb.php');

$IdEspecialidad = $_POST ['especialidad'];	
$_SESSION['IDespecialidad'] = $IdEspecialidad;
//$_SESSION['ciudades'] = $_POST ['ciudades'];	
//$_SESSION['estados'] = $_POST ['estados'];

		
if (strlen($IdEspecialidad)<1) {   
			$data=array("error" => '1');
			die(json_encode($data));
}else{ // si todo va bien

		$query = mysql_query("SELECT
							tbl_doctor_especialistas.dre_id,
							tbl_doctor_especialistas.dre_especialidad,
							tbl_doctor_especialistas.dre_doc_id,
							tbl_doctores.doc_id,
							tbl_doctores.doc_nombre,
							tbl_doctores.doc_apellido,
							tbl_doctores.doc_telefono,
							tbl_doctores.doc_direccion,
							tbl_doctores.doc_ciudad,
							tbl_doctores.doc_estado,
							tbl_doctores.doc_foto,
							tbl_doctores.doc_calificacion,
							tbl_doctores.doc_curriculum,
							tbl_doctores.doc_status,
							tbl_doctores.doc_id_user
							FROM
							tbl_doctor_especialistas
							INNER JOIN tbl_doctores ON tbl_doctor_especialistas.dre_doc_id = tbl_doctores.doc_id WHERE tbl_doctor_especialistas.dre_especialidad = '$IdEspecialidad' and tbl_doctores.doc_status = '1'");	


	$dataDoctor = mysql_fetch_array($query);	
	
	if (empty($_SESSION['email']))  
		{
		$data=array("error" => '2');
		die(json_encode($data));
		} 
	
	if(empty($dataDoctor))
		{
		$data=array("error" => '1');
		die(json_encode($data));
		}
	else 
		{				
		$data = array("exito" => '1');
		die(json_encode($data));	
		}											
}
?>