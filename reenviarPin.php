<?php
session_start();
include "lib/corelib.php";
require_once('tools/mypathdb.php');

$nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];
$email = $_SESSION['email'];
//$telefono=$_SESSION['telefono'];//
$NombreDr = $_SESSION['NombreDr'];
$cit_id = $_SESSION['cit_id'];

	//===========Generar el PIN numero aleatorio de 4 digitos ======================
	mt_srand (time());
	$Pin = mt_rand(1000,9999); 
	// ===============================================Actualizar los datos del PIN============================================

	$query = "UPDATE tbl_citas SET cit_pin=$Pin WHERE cit_id= '$cit_id'";

	$dataCitas = mysql_query($query); 
	if($dataCitas == false) 
	{
		//==========================Error al actualizar los campos en la tabla.=========================================
	}
	else
	{

		//===================Enviar PIN de confirmacion via correo
		$destino = $_SESSION['email'];
		$asunto = "PIN para cita médica - CitaDr.com";
		$cabeceras = "Content-type: text/html";
		$cuerpo ="Estimado(a):  <strong>$nombre $apellido</strong>
		<h2>Te hemos Reenviado el PIN </h2><h3>para reservar tu cita médica.</h3>
		Tu PIN es el siguiente:<br>
		<b>PIN: </b>$Pin<br><br>
		Regresa a nuestro website e ingresalo para completar la reservación de tu cita.<br><br>
		Tus amigos en citaDr.<br>
		<img src=".INCLUDES."img/manopin.jpg />
		<p>		
		<img src=".INCLUDES."img/ellogotabin.png />
		<h5>Calle Sanchez Carrero Sur N° 58, Sector Centro<br> 
		Maracay, Estado Aragua, 2103<br>
		RIF J403661448<br>
		<p></p>Designed by tabinsoft<br>
		© tabinsoft 2014 - All rights reserved<br></h5>
		</p>";	
		//echo $cuerpo;
		$yourWebsite = "citaDr.com";
		$yourEmail   = "info@citadr.com";
	    $cabeceras = "From: $yourWebsite <$yourEmail>\n" . "Content-type: text/html" ;
		mail($destino,$asunto,$cuerpo,$cabeceras);
		
		$_SESSION['citaSinConfirmar']=True;
		
		//desconectar(); 
		mysql_close();
	}
				//===================================================Redirigir a otra pagina============================================
		header("Location: reenviarPinListo.php");
		
?>