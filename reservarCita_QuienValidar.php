<?php
session_start();
include "lib/corelib.php";
require_once('tools/mypathdb.php');


if ($_POST ['consulta']=='otro') { 
	//===================================================Redirigir a otra pagina============================================
	$_SESSION['consulta']="Primera vez";
	header("Location: registrar.php?cita=1");
	exit;
};

//falta de aqui pa abajo
//=========================Recuperar datos del Paciente ============================================
$ID_Dr = $_SESSION['IDDr']; 
$pac_id = $_SESSION['user_id'];

$motivo = $_SESSION['motivoCita'];
$_SESSION['fechaCita']=date("Y-m-d",strtotime($_SESSION['fechaCita'])); 
$fecha = $_SESSION['fechaCita'];
$hora = $_SESSION['horaCita'];
$dia = $_SESSION['diaCita']; 
$status= "1"; //1 pendiente, 2 confirmado, 3 asistio, 4 no asistio

if ($_SESSION['consulta']=="Primera vez")
	{
		$cit_tipo=1;
	}
else
	{
		$cit_tipo=2;
	}

$nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];
$email = $_SESSION['email'];
$telefono=$_SESSION['telefono'];
$NombreDr = $_SESSION['NombreDr'];

	//===========Generar el PIN numero aleatorio de 4 digitos ======================
	mt_srand (time());
	$Pin = mt_rand(1000,9999); 
	// ===============================================Grabar los datos ====Guardar el PIN============================================
	// ===============================================Introducir los datos en la tabla=====================================
	$query = "INSERT INTO tbl_citas (cit_doc_id, cit_pac_id, cit_motivo, cit_fecha, cit_hora, cit_dia, cit_pin, cit_status, cit_tipo) VALUES ('$ID_Dr',
	'$pac_id', '$motivo', '$fecha', '$hora', '$dia', '$Pin', '$status', '$cit_tipo')";

	$dataCitas = mysql_query($query); 
	if($dataCitas == false) 
	{
		//==========================Error al insertar los campos en la tabla.=========================================
	}
	else
	{
		//============================Los datos se han insertado correctamente.=========================================
		//============== leer el id del ultimo registro ======================
		$cit_id = mysql_insert_id();
		$_SESSION['cit_id']=$cit_id ;
	}	
		//===================Enviar PIN de confirmacion via correo
		$destino = $_SESSION['email'];
		$asunto = "PIN para cita médica - CitaDr.com";
		$cabeceras = "Content-type: text/html";
		$cuerpo ="Estimado(a):  <strong>$nombre $apellido</strong>
		<h2>Te hemos enviado el PIN </h2><h3>para reservar tu cita médica con el Dr $NombreDr.</h3>
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

				//===================================================Redirigir a otra pagina============================================
		header("Location: reservarCita_validar.php");
?>