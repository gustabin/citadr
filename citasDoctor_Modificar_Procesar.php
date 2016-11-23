<?php 
session_start();
include "lib/corelib.php";
include "lib/class/classExtraer.php";
require_once('tools/mypathdb.php');
$status=$_POST['status'];
$cit_id=$_SESSION['cit_id'];

switch ($status) {
    case 2:
        $status_cit_id = "Confirmada";
        break;
    case 3:
        $status_cit_id = "Realizada";
        break;
	case 4:
        $status_cit_id = "No asistio";
        break;

}


//====================================buscar el PIN en la tabla citas =====================================
if (isset($status)) 
{
  //=========================Consultar la tabla citas ============================================
  
  $query=("select * from tbl_citas WHERE cit_id= '$cit_id'");
  $resultado = mysql_query($query,$dbConn);
  while($data_cit = mysql_fetch_array($resultado)) {
    $pin= $data_cit['cit_pin'];
	$doc_id = $data_cit['cit_doc_id'];
	$cit_pac_id = $data_cit['cit_pac_id'];
	$motivo = $data_cit['cit_motivo'];
	$fecha=date("d-m-Y",strtotime($data_cit['cit_fecha'])); // cambiar el formato de la fecha
	$hora = $data_cit['cit_hora'];
	$dia=$data_cit['cit_dia'];
	$tipoPaciente=$data_cit['cit_tipo'];
	if ($data_cit['cit_tipo']==1) 
		{
		$tipoPaciente="Primera vez";
		}
	else
		{
		$tipoPaciente="Paciente de esta consulta";
		}
}

	//================================================Recuperar registros tabla doctores==================================================
	$query = mysql_query("SELECT * FROM tbl_doctores WHERE doc_id = '$doc_id'");
	$data_doc = mysql_fetch_array($query);	
	$nombreDr = $data_doc['doc_nombre'];
	$apellidoDr = $data_doc['doc_apellido'];
	$telefonoDr = $data_doc['doc_telefono'];
	$fotoDr= $data_doc['doc_foto'];
	$direccionDr= $data_doc['doc_direccion'];
	$ciudadDr= $data_doc['doc_ciudad'];
	$idEstado= $data_doc['doc_estado'];
	$doc_id= $data_doc['doc_id'];
	$us_idDr= $data_doc['doc_id_user'];
	$calificacion= $data_doc['doc_calificacion'];
	$calificacionDr    = ExtraeCalificacion($calificacion);

	//================================================Recuperar registros tabla Estados==================================================
	$query = mysql_query("SELECT * FROM tbl_estados WHERE id = '$idEstado'");
	$data_est = mysql_fetch_array($query);						
	$estadoDr= $data_est['estado']; 
	
	//================================================Recuperar registros tabla usuarios para el email del doctor==================================================
	$query = mysql_query("SELECT * FROM tbl_usuarios WHERE us_id = '$us_idDr'");
	$data_us = mysql_fetch_array($query);						 
	$emailDr = $data_us['us_email']; 
	
	//================================================Recuperar registros tabla usuarios ==================================================
	$query = mysql_query("SELECT * FROM tbl_usuarios WHERE us_id = '$cit_pac_id'");
	$data_us = mysql_fetch_array($query);						 

	$usuario = $data_us['us_tipo']; 
	$userID = $data_us['us_id']; 
	$email = $data_us['us_email']; 
	

	if ($usuario==1) {	//si es paciente
		//================================================Recuperar registros tabla pacientes==================================================
		$query = mysql_query("SELECT * FROM tbl_pacientes WHERE pac_id_user = '$userID'");
		$data_pac = mysql_fetch_array($query);	
		$nombre = $data_pac['pac_nombre'];
		$apellido = $data_pac['pac_apellido'];
		$telefono = $data_pac['pac_telefono'];	
	}
	
		
	//================================================Recuperar registros tabla doctor especialistas==================================================
	$query = mysql_query("SELECT * FROM tbl_doctor_especialistas WHERE dre_doc_id = '$doc_id'");	
	$data_dre = mysql_fetch_array($query);						 

	//================================================Recuperar registros tabla especialistas==================================================
	$IDespecialidad= $data_dre["dre_especialidad"];
	$query = mysql_query("SELECT * FROM tbl_especialistas WHERE esp_id = '$IDespecialidad'");
	$data_esp = mysql_fetch_array($query);					
	$especialidad = $data_esp['esp_especialidad'];	
}

else

{
	$data=array("error" => '1');
	die(json_encode($data));
} 


	//===============================Actualizar la tabla citas ================================
	$query = mysql_query("UPDATE tbl_citas SET cit_status='$status' WHERE cit_id= '$cit_id'");
	// ========================================envio de correo notificandome que alguien cambio su status ===================
	$destino ="gustabin@yahoo.com";
	$asunto = "Alguien cambio el status de su cita médica";
	$cabeceras = "Content-type: text/html";
	$cuerpo ="<h2>Hola, alguien cambio el status de la cita médica</h2>
	El status de la cita médica ha sido cambiado a <strong>$status_cit_id</strong><br><br>
	<strong>Los datos enviados son los siguientes:</strong><br>
	<b>Paciente: </b>$nombre $apellido<br>
	<b>Historial:  </b>$tipoPaciente<br>
	<b>Email:  </b>$email<br>
	<b>Teléfono:  </b>$telefono<br>
	<b>Motivo:  </b>$motivo<br>
	<b>Día:  </b>$dia<br>
	<b>Fecha:  </b>$fecha<br>
	<b>Hora:  </b>$hora<br><br>
	<img src=".SERVER."pictures/photos/$fotoDr width=74 height=99 /><br><br>
	<b>Con el médico:  </b>$nombreDr $apellidoDr<br>
	$especialidad<br>
	<b>Ubicado en:  </b>$direccionDr<br>
	<b>en:  </b>$ciudadDr, $estadoDr<br>
	<b>Teléfono:  </b>$telefonoDr<br><br>
	Tus amigos en citaDr.<br>
	<img src=".INCLUDES."img/cambio.jpg />
	<p>		
	<img src=".INCLUDES."img/ellogotabin.png />
	<h5>Calle Sanchez Carrero Sur N° 58, Sector Centro<br>
	Maracay, Estado Aragua, 2103<br>
	RIF J403661448<br>
	<p></p>Designed by tabinsoft<br>
	© tabinsoft 2014 - All rights reserved<br></h5>
	</p>";
	$yourWebsite = "citaDr.com";
	$yourEmail   = "info@citadr.com";
    $cabeceras = "From: $yourWebsite <$yourEmail>\n" . "Content-type: text/html" ;
	mail($destino,$asunto,utf8_decode($cuerpo),$cabeceras);		

	// ========================================envio de correo al Doctor notificando que se cambio el status de la cita ===================
	$destino = $emailDr;
	$asunto = "Un paciente cambio el status de la cita medica";	
	$cabeceras = "Content-type: text/html";
	$cuerpo ="Hola, alguien cambió el status de la cita médica<br><br>
	El status de la cita médica ha sido cambiado a <strong>$status_cit_id</strong><br><br>
	<strong>Los datos enviados son los siguientes:</strong><br>
	<b>Paciente: </b>$nombre $apellido<br>
	<b>Historial:  </b>$tipoPaciente<br>
	<b>Email:  </b>$email<br>
	<b>Teléfono:  </b>$telefono<br>
	<b>Motivo:  </b>$motivo<br>
	<b>Día:  </b>$dia<br>
	<b>Fecha:  </b>$fecha<br>
	<b>Hora:  </b>$hora<br><br>
	Tus amigos en citaDr.<br>
	<img src=".INCLUDES."img/cambio.jpg />
	<p>		
	<img src=".INCLUDES."img/ellogotabin.png />
	<h5>Calle Sanchez Carrero Sur N° 58, Sector Centro<br>
	Maracay, Estado Aragua, 2103<br>
	RIF J403661448<br>
	<p></p>Designed by tabinsoft<br>
	© tabinsoft 2014 - All rights reserved<br></h5>
	</p>";
	$yourWebsite = "citaDr.com";
	$yourEmail   = "info@citadr.com";
    $cabeceras = "From: $yourWebsite <$yourEmail>\n" . "Content-type: text/html" ;
	mail($destino,$asunto,utf8_decode($cuerpo),$cabeceras);		
			
	// ========================================envio de correo al paciente ===================
	$destino = $email;
	$asunto = "Cambio de status de tu cita médica";
	$cabeceras = "Content-type: text/html";
	$cuerpo ="<h2>Cambio el status de tu cita!</h2>
    ¡Hola, <b>$nombre $apellido</b> El status de la cita médica ha sido cambiado a <strong>$status_cit_id</strong><br><br>
    <b>Día:  </b>$dia<br>
	<b>Fecha:  </b>$fecha<br>
	<b>Hora:  </b>$hora<br><br>
	<img src=".SERVER."pictures/photos/$fotoDr width=74 height=99 /><br><br>
	<b>Con el médico:  </b>$nombreDr $apellidoDr<br>
	$especialidad</b><br>
	<b>Ubicado en:  </b>$direccionDr<br>
	<b>en:  </b>$ciudadDr, $estadoDr<br>
	<b>Teléfono:  </b>$telefonoDr<br>
	<img src=".INCLUDES."img/$calificacionDr width=82 height=19 /><br>
	Tus amigos en citaDr.<br>
	<img src=".INCLUDES."img/cambio.jpg />/>
	<p>		
	<img src=".INCLUDES."img/ellogotabin.png />
	<h5>Calle Sanchez Carrero Sur N° 58, Sector Centro<br>
	Maracay, Estado Aragua, 2103<br>
	RIF J403661448<br>
	<p></p>Designed by tabinsoft<br>
	© tabinsoft 2014 - All rights reserved<br></h5>
	</p>";
	$yourWebsite = "citaDr.com";
	$yourEmail   = "info@citadr.com";
	$cabeceras = "From: $yourWebsite <$yourEmail>\n" . "Content-type: text/html" ;
	mail($destino,$asunto,utf8_decode($cuerpo),$cabeceras);		
	$_SESSION['citaSinConfirmar']="";
	//desconectar();
	mysql_close();
	$data = array("exito" => '1');
	die(json_encode($data));		
?>