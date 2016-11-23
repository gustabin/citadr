<?php
	session_start(); 
	include "lib/corelib.php";
	$email = strtolower ($_POST ['Email']);
	$nombre = $_POST ['Nombre'];
	$mensaje = $_POST ['Mensaje'];

		// =========================envio de correo notificandome que alguien se contacto ===================
		$destino ="gustabin@yahoo.com";
		$asunto = "Contacto Web Citas Medicas - Contactando";
		$cabeceras = "Content-type: text/html";
		$cuerpo ="Hola, alguien te ha contactado por el formulario Web de citas medicas<br><br>
		Los datos enviados son los siguientes:<br>
		<b>Email: </b>$email<br>
		<b>Nombre: </b>$nombre<br>
		<b>Mensaje:  </b>$mensaje<br>"; //ojo el final de esta linea es importante!!!				
		$yourWebsite = "citaDr.com";
		$yourEmail   = "info@citadr.com";
	    $cabeceras = "From: $yourWebsite <$yourEmail>\n" . "Content-type: text/html" ;
		mail($destino,$asunto,$cuerpo,$cabeceras);
				
		// ========================envio de correo al paciente ===================
		$destino = $email;
		$asunto = "Gracias por contactarnos - CitaDr, la web de citas Medicas";
		$cabeceras = "Content-type: text/html";
		$cuerpo ="En CitaDr estamos para ayudarte!<br><br>
        Hola <b>$nombre</b>,<br>
        Para nosotros es un placer atenderte, pronto uno de nuestros operadores te contactara!<br>
        <br><br>
        
        Tus amigos en citaDr.<br>
		<img src=".INCLUDES."img/premio.png />
		<p>		
		<img src=".INCLUDES."img/ellogotabin.png />
		<h5>Calle Sanchez Carrero Sur N° 58, Sector Centro<br>
		Maracay, Estado Aragua, 2103<br>
		RIF J403661448<br>
		<p></p>Designed by tabinsoft<br>
		© tabinsoft 2014 - All rights reserved<br></h5>
		</p>";
		//die($cuerpo); 
		$yourWebsite = "citaDr.com";
		$yourEmail   = "info@citadr.com";
	    $cabeceras = "From: $yourWebsite <$yourEmail>\n" . "Content-type: text/html" ;
		mail($destino,$asunto,$cuerpo,$cabeceras);
			
		
		
		$data=array("exito" => '1');
		die(json_encode($data));
	
?>