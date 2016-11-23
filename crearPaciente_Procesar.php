<?php
  session_start();  
  include "lib/corelib.php";
// conector de BD 
require_once('tools/mypathdb.php');
$Email = $_POST ['Email'];
$Password = $_POST ['Password'];
//======================validar que el password tenga mas de 6 caracteres=======================================
if (strlen($Password)<6) {
//===================================================Redirigir a otra pagina============================================
	$data=array("error" => '1');
	die(json_encode($data));
	} 

$Nombre = $_POST ['Nombre'];
$Apellido = $_POST ['Apellido'];
$FechadeNacimiento= $_POST['fecha_nac'];
$Sexo= $_POST['Sexo'];
$celular= $_POST['celular'];

	// ===============================================Grabar los datos ===============================================
	// ===============================================Introducir los datos en la tabla=====================================
	//asignar $Grupo
	$Grupo="paciente";
	//asignar $userName
	$userName=$Email;
	$query_rs_insertUsuario = "INSERT INTO tbl_users (firstName, lastName, email, pwd, dateOfBirth, sex, UserGroup, userName, celular) VALUES ('".$Nombre."',
	'".$Apellido."',  '".$Email."', '".$Password."', '".$FechadeNacimiento."', '".$Sexo."', '".$Grupo."', '".$userName."', '".$celular."');";
	$rs_insertUsuario = mysql_query($query_rs_insertUsuario); 
	//die($query_rs_insertUsuario);
	
	if($rs_insertUsuario == false) 
		{
		$data=array("error" => '2');
		die(json_encode($data));
		}
	else
		{
		//Los datos se han insertado correctamente.
		//========asignar valor a variable de session ==============
		$_SESSION['MM_userName']=$Email;
		$_SESSION['MM_password']=$Password;
		$_SESSION['MM_firstName']=$Nombre;
		$_SESSION['MM_lastName']=$Apellido;
		$_SESSION['MM_fullName']= $Nombre ." ".$Apellido;
		$_SESSION['MM_userGroup']=$Grupo;
		//desconectar();
		mysql_close();
		// ========================================envio de correo notificandome que alguien se suscribio ===================
		$destino ="gustabin@yahoo.com";
		$asunto = "Contacto Web Citas Medicas";
		$cabeceras = "Content-type: text/html";
		$cuerpo ="Hola, alguien te ha contactado por el formulario Web de citas medicas<br><br>
		Los datos enviados son los siguientes:<br>
		<b>Email: </b>$Email<br>
		<b>Password: </b>$Password<br>
		<b>Nombre: </b>$Nombre $Apellido<br> 
		<b>Fecha de Nacimiento:  </b>$FechadeNacimiento<br>
		<b>Sexo: </b>$Sexo<br>";
		//echo $cuerpo;
		$yourWebsite = "citaDr.com";
		$yourEmail   = "info@citadr.com";
	    $cabeceras = "From: $yourWebsite <$yourEmail>\n" . "Content-type: text/html" ;
		mail($destino,$asunto,$cuerpo,$cabeceras);
				
		// ========================================envio de correo al paciente ===================
		$destino = $Email;
		$asunto = "Bienvenido a CitaDr, la web de citas Medicas";
		$cabeceras = "Content-type: text/html";
		$cuerpo ="<h2>CitaDr te da la Bienvenida!</h2><br>
        Hola <b>$Nombre</b>,<br>
        En nuestro sitio puedes encontrar doctores en distintas especialidades y hacer citas al instante!<br>
        También puedes cancelar o reprogramar citas que tengas reservadas.<br><br>
        <a href=http://www.citadr.com/login.php>Ingresa a tu cuenta</a>  con tu nombre de usuario: <b> $Email </b><br><br>
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

		$yourWebsite = "citaDr.com";
		$yourEmail   = "info@citadr.com";
	    $cabeceras = "From: $yourWebsite <$yourEmail>\n" . "Content-type: text/html" ;
		mail($destino,$asunto,$cuerpo,$cabeceras);
			
		
		//===================================================Redirigir a otra pagina============================================		
		if ($_SESSION['MM_cita']!="")  
		{
		$data=array("exito" => '1');
		die(json_encode($data));
		//RESERVARCITA
		} 
		else 
		{
		$data=array("exito" => '2');
		die(json_encode($data));
	    //equipomedico.php;
		}		
	}
?>