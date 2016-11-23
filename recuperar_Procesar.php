<?php
	include "lib/corelib.php";
	// conector de BD 
	require_once('tools/mypathdb.php');
	$email = $_POST ['Email'];
	

	// ===============================================Buscar el password del usuario=====================================
	$query = mysql_query("SELECT * FROM tbl_usuarios WHERE us_email = '$email'");
	//$query = ("SELECT * FROM tbl_usuarios WHERE us_email = '$email'");
	//var_dump($query);
	//die();
	$dataUsuario = mysql_fetch_array($query);	
	
	$usuario = $dataUsuario['us_tipo'];
	
	$userID = $dataUsuario['us_id']; 
	$clave = $dataUsuario['us_clave']; 
	
	if ($usuario==1) {	//si es paciente
		//================================================Recuperar registros tabla pacientes==================================================
		$query = mysql_query("SELECT * FROM tbl_pacientes WHERE pac_id_user = '$userID'");
		$data_pac = mysql_fetch_array($query);	
		$nombre = $data_pac['pac_nombre'];
		$apellido = $data_pac['pac_apellido'];
	}
	
	if ($usuario==2) {	//si es doctor
		//================================================Recuperar registros tabla doctores==================================================
		$query = mysql_query("SELECT * FROM tbl_doctores WHERE doc_id_user = '$userID'");
		$data_doc = mysql_fetch_array($query);	
		$nombre = $data_doc['doc_nombre'];
		$apellido = $data_doc['doc_apellido'];
	}
		
	if(empty($dataUsuario))
		{
		$data=array("error" => '1');
		die(json_encode($data));
		}
	else
		{		
		//Consegui el registro		
		// ==================envio de correo con el password ===================
		$destino = $email;
		//$asunto = html_entity_decode("&#9745; Recuperar Clave de CitaDr");
		
		$asunto = "Recuperar Clave de CitaDr";
		$cabeceras = "Content-type: text/html"; 
		$cuerpo ="<h1>CitaDr te ayuda a recuperarte!</h1><br><br>
				Hola <b>".$nombre." ".$apellido."</b>,<br><br> 
				Hemos recuperado tu password<br>
				<strong>".$clave."</strong><br><br>
				Recuerda ingresar a tu cuenta</a>  con tu nombre de usuario: <b> $email </b><br><br>
				Tus amigos en citaDr.<br>
				<img src=".INCLUDES."img/unamano.gif /><br>
<p>		
<img src=".INCLUDES."img/ellogotabin.png />
<h5>Calle Sanchez Carrero Sur N° 58, Sector Centro<br>
Maracay, Estado Aragua, 2103<br>
RIF J403661448<br>
<p></p>Designed by tabinsoft<br>
© tabinsoft 2014 - All rights reserved<br></h5>
</p>";

		$yourWebsite = "citadr.com";		
		$yourEmail   = "info@citadr.com";
	    $cabeceras = "From: $yourWebsite <$yourEmail>\n" . "Content-type: text/html" ;
		mail($destino,$asunto,$cuerpo,$cabeceras);		
		$data = array("exito" => '1');
		die(json_encode($data));				
		}
			
		//desconectar();
		mysql_close();
?>