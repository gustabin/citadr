<?php
	session_start();  
	include "lib/corelib.php";
	error_reporting(0);
		// conector de BD 
		require_once('tools/mypathdb.php');
		$doc_id=$_SESSION['doc_id'];
				
		$us_id = $_POST ['us_id']; //viene oculto
		
		$nombre = $_POST ['nombre'];
		$apellido = $_POST ['apellido'];
		$telefono= $_POST['telefono'];
		$email= $_POST['email'];
		$cedula = $_POST ['cedula'];
		$sexo = $_POST ['sexo'];
		$edad= $_POST['edad'];
		$edoCivil = $_POST ['edoCivil'];
		$ciudadNacimiento = $_POST ['ciudadNacimiento'];
		$fechaNacimiento = $_POST ['fechaNacimiento'];
		$nacionalidad = $_POST ['nacionalidad'];
		$ocupacion = $_POST ['ocupacion'];
		$direccion= $_POST['direccion'];
		$apellidoAvisar = $_POST ['apellidoAvisar'];
		$nombreAvisar = $_POST ['nombreAvisar'];
		$parentescoAvisar = $_POST ['parentescoAvisar'];		 
		$direccionAvisar = $_POST ['direccionAvisar'];		
		$fechaConsulta = $_POST ['fecConsulta']; 
		$horaConsulta = $_POST ['horaConsulta']; 
		$fechaConsultaAnterior = $_POST ['fecConsultaAnterior']; 
		$motivos = $_POST ['motivos']; 
		$enfermedad = $_POST ['enfermedad']; 
		$diagnosticoProvisional = $_POST ['diagnosticoProvisional']; 
		$egreso = $_POST ['egreso']; 
		$diagnosticoFinal = $_POST ['diagnosticoFinal']; 
		$fechaEgreso = $_POST ['fecEgreso']; 
		$horaEgreso = $_POST ['horaEgreso']; 
		$diagnosticoAnatomoPatologico = $_POST ['diagnosticoAnatomoPatologico']; 

	// ========================= Buscar la historia en tbl_historias ==========================================================

	$queryHistoria = mysql_query("SELECT * FROM tbl_historias WHERE his_id = '$us_id' AND his_doc_id = '$doc_id'");	
	
	$dataHistoria = mysql_fetch_array($queryHistoria);	
		
	if(empty($dataHistoria)) // =================== si no la encuentra ============================================
		{
		// ===========================Registrar en la tbl_usuarios =======================================================================
		$clave=123456;		
		$status=1; //1 activo, 2 inactivo
		$fecha_actual = date("Y-m-d");
		$tipo=1; //1 paciente, 2 doctor, 3 administrador
		$query_insertarUsuario = "INSERT INTO tbl_usuarios (us_email, us_clave, us_status, us_fecha, us_tipo) VALUES ('".$email."', '".$clave."', '".$status."', '".$fecha_actual."', '".$tipo."');";
		
		$insertarUsuario = mysql_query($query_insertarUsuario); 
		$us_id = mysql_insert_id(); //obtener el ultimo us_id
		//$_SESSION['us_id']=$us_id;
		
			// ===============================================Introducir los datos en la tabla tbl_pacientes ==================================
		$query_insertarPaciente = "INSERT INTO tbl_pacientes (pac_nombre, pac_apellido, pac_telefono, pac_fecha_nac, pac_sexo, pac_id_user) VALUES ('".$nombre."','".							$apellido."', '".$telefono."', '".$fechaNacimiento."', '".$sexo."', '".$us_id."');";
	
		$insertarPaciente = mysql_query($query_insertarPaciente); 
		if($insertarUsuario == true) 
		{
			//$data=array("error" => '2'); // no pasa nada aunque ya exista
			//die(json_encode($data));
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
			<a href=".SERVER."login.php>Ingresa a tu cuenta</a>  con tu nombre de usuario: <b> $email </b><br>
			y la clave: <b> $clave </b><br><br>
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
		}
		// ===============================================Insertar los datos en tbl_historias=====================================
		$query = mysql_query("INSERT INTO tbl_historias (his_id_user, his_doc_id, his_apellido, his_nombre, his_email, his_telefono, his_cedula, his_sexo, his_edad, his_edoCivil, his_ciudadNacimiento, his_fechaNacimiento, his_nacionalidad, his_ocupacion, his_direccion, his_apellidoAvisar, his_nombreAvisar, his_parentescoAvisar, his_direccionAvisar, his_fechaConsulta, his_horaConsulta, his_fechaConsultaAnterior, his_motivos, his_enfermedad, his_diagnosticoProvisional, his_diagnosticoFinal, his_diagnosticoAnatomo) VALUES ('$us_id', '$doc_id', '$apellido', '$nombre', '$email', '$telefono', '$cedula', '$sexo', '$edad', '$edoCivil', 
			'$ciudadNacimiento', '$fechaNacimiento', '$nacionalidad','$ocupacion', '$direccion', '$apellidoAvisar','$nombreAvisar', '$parentescoAvisar', 
			'$direccionAvisar','$fechaConsulta', '$horaConsulta', '$fechaConsultaAnterior','$motivos', '$enfermedad', '$diagnosticoProvisional', 
			'$diagnosticoFinal', '$diagnosticoAnatomoPatologico')");		
		//Los datos se han insertado correctamente.';	
		$us_id = mysql_insert_id(); //obtener el ultimo his_id en realidad este es el id de la historia y no el user id
		$_SESSION['us_id']=$us_id;
		$data = array("exito" => '1');
		die(json_encode($data));									
		}
	else	
		{
		$his_id = $dataHistoria['his_id'];
		// ===============================================Actualizar los datos en tbl_historias=====================================	
		$query = mysql_query("UPDATE tbl_historias SET his_apellido='$apellido', his_nombre='$nombre', his_telefono='$telefono', his_cedula='$cedula', his_sexo='$sexo', his_edad='$edad', 
		his_edoCivil='$edoCivil', his_ciudadNacimiento='$ciudadNacimiento', his_fechaNacimiento='$fechaNacimiento', his_nacionalidad='$nacionalidad', 
		his_ocupacion='$ocupacion', his_direccion='$direccion', his_apellidoAvisar='$apellidoAvisar', his_nombreAvisar='$nombreAvisar', 
		his_parentescoAvisar='$parentescoAvisar', his_direccionAvisar='$direccionAvisar', his_fechaConsulta='$fechaConsulta', 
		his_horaConsulta='$horaConsulta', his_fechaConsultaAnterior='$fechaConsultaAnterior', his_motivos='$motivos', his_enfermedad='$enfermedad', 
		his_diagnosticoProvisional='$diagnosticoProvisional', his_diagnosticoFinal='$diagnosticoFinal', 
		his_diagnosticoAnatomo='$diagnosticoAnatomoPatologico' WHERE his_id='$his_id'");	

		//=========================================== REedireccion a otra pagina  =====================================
		//Los datos se han actualizado correctamente.';		
		$data = array("exito" => '2');
		die(json_encode($data));									
		//desconectar();
		mysql_close();	//cerrar la conexion a la bd
		}		
?>