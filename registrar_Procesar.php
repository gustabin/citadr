<?php
	session_start(); 
    include "lib/corelib.php";
	// conector de BD 
	require_once('tools/mypathdb.php');
	$email = strtolower ($_POST ['Email']);
	$clave = $_POST ['Password'];
	//======================validar que el password tenga mas de 6 caracteres=======================================
	if (strlen($clave)<6) 
	{
		//===================================================Redirigir a otra pagina============================================
		$data=array("error" => '1');
		die(json_encode($data));
	} 

	$nombre = $_POST ['Nombre'];
	$apellido = $_POST ['Apellido'];
	$fecha_nac= $_POST['fecha_nac'];
	$sexo= $_POST['Sexo'];
	$telefono= $_POST['Telefono'];
	$status = 1; //usuario activo 
	$tipo="1"; //====== asignar tipo 1 Paciente, 2 Doctor, 3 Administrador ======================
	$fecha_actual = date("Y-m-d");
	
	//===========Generar el PIN numero aleatorio de 4 digitos ======================
	    mt_srand (time());
	    $pin = md5(mt_rand(1000,9999)); 
		$texto = $pin; 
	// ===============================================Grabar los datos ===============================================================
	// ===============================================Introducir los datos en la tabla tbl_usuarios ==================================
	$query_insertarUsuario = "INSERT INTO tbl_usuarios (us_email, us_clave, us_status, us_fecha, us_tipo, us_pin) VALUES ('".$email."','".$clave."',  '".$status."', '".$fecha_actual."', '".$tipo."', '".$pin."')";
	//die($query_insertarUsuario);
	$insertarUsuario = mysql_query($query_insertarUsuario); 
	$us_id = mysql_insert_id(); //obtener el ultimo us_id
	// ===============================================Introducir los datos en la tabla tbl_pacientes ==================================
	$query_insertarPaciente = "INSERT INTO tbl_pacientes (pac_nombre, pac_apellido, pac_telefono, pac_fecha_nac, pac_sexo, pac_id_user) VALUES ('".$nombre."','".$apellido."',  '".$telefono."', '".$fecha_nac."', '".$sexo."', '".$us_id."');";
	$insertarPaciente = mysql_query($query_insertarPaciente); 
	//die($query_insertarPaciente);
	if($insertarUsuario == false) 
	{
		$data=array("error" => '2');
		die(json_encode($data));
	}
	else
	{
		//Los datos se han insertado correctamente.
		//========asignar valor a variable de session ==============
		$_SESSION['nombre']=$nombre;
		$_SESSION['apellido']=$apellido;
		$_SESSION['telefono']=$telefono;
		$_SESSION['fecha_nac']=$fecha_nac;
		$_SESSION['sexo']=$sexo;
		$_SESSION['email']=$email;
		$_SESSION['clave']=$clave;
		$_SESSION['user_id']=$us_id;
		//desconectar();
		mysql_close();
		// ========================================envio de correo notificandome que un paciente se suscribio ===================
		$destino ="gustabin@yahoo.com";
		$asunto = "Contacto Web Citas Medicas";
		$cabeceras = "Content-type: text/html";
		$cuerpo ="<h2>Hola, un paciente se ha registrado en la Web de citas medicas</h2>
		Los datos enviados son los siguientes:<br>
		<b>Email: </b>$email<br>
		<b>Nombre: </b>$nombre $apellido<br>
		<b>Fecha de Nacimiento:  </b>$fecha_nac<br>
		<b>Sexo: </b>$sexo<br><br><br>
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
		// ========================================envio de correo al paciente ===================
		$destino = $email;
		$asunto = "Bienvenido a CitaDr, la web de citas Medicas";
		$cabeceras = "Content-type: text/html";
		$cuerpo ="<h2>CitaDr te da la Bienvenida!</h2><br>
        Hola <b>$nombre $apellido</b>,<br>
        En nuestro sitio puedes encontrar doctores en distintas especialidades y hacer citas al instante!<br>
        También puedes cancelar o reprogramar citas que tengas reservadas.<br><br>
        <a href=".SERVER."activar.php?pin=$texto>Activa tu cuenta</a> para poder disfrutar de nuestro servicio.<br><br>
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
				
		if ($_SESSION['cita']!="")  
		{
			$data=array("exito" => '3');
			die(json_encode($data));
   			//header("Location: reservarCita_validar.php");
			exit;
		} 
		else 
		{
			if ($_SESSION['email']!="")  
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
			header("Location: equipomedico.php");
		}
	}		
?>