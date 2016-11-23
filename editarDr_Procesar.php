<?php
	session_start();  
	include "lib/corelib.php";
	error_reporting(0);
		// conector de BD 
		require_once('tools/mypathdb.php');

		$email = $_POST ['Email'];
		$clave = $_POST ['Password'];
	
		//======================validar que el password tenga mas de 6 caracteres=======================================
		if (strlen($clave)<6) {
		//===================================================Redirigir a otra pagina============================================
			$data=array("error" => '1');
			die(json_encode($data));
			} 
			
			// si todo va bien
		$nombre = $_POST ['Nombre'];
		$apellido = $_POST ['Apellido'];
		//$ciudad = $_POST ['Ciudad'];
		//$estado = $_POST ['Estado'];
		$telefono= $_POST['Telefono'];
		$direccion= $_POST['Direccion'];
		$curriculum= $_POST['Curriculum'];		

			// ===============================================Grabar los datos ===============================================
			// ===============================================Buscar los datos en la tabla=====================================	
		// ===============================================Actualizar los datos en la tabla=====================================	
		//$user_id = $_SESSION['us_id'] ;
		$user_id = $_SESSION['user_id'];
		$query = mysql_query("UPDATE tbl_usuarios SET us_clave='$clave' WHERE us_id='$user_id'");	
		//$query = ("UPDATE tbl_usuarios SET us_clave='$clave' WHERE us_id='$user_id'");	
		//var_dump($query);
		//die();
		
		$queryDr = mysql_query("UPDATE tbl_doctores SET doc_nombre='$nombre', doc_apellido='$apellido', doc_telefono='$telefono', doc_direccion='$direccion', doc_curriculum='$curriculum' WHERE doc_id_user='$user_id'");		
		
			
			// =====================grabar ID en variable de session =====================
			
			//$_SESSION['doc_id']=$doc_id;
			//$_SESSION['email']=""; // miron
			
			//$_SESSION['clave'] = $clave;
			//$_SESSION['emailDr'] = $email;
			//$_SESSION['nombre'] = $_POST ['Nombre'];
			//$_SESSION['apellido'] = $_POST ['Apellido'];
			//$_SESSION['telefono']= $_POST['Telefono'];
			//$_SESSION['direccion']= $_POST['Direccion'];
			//$_SESSION['ciudad'] = $_POST ['ciudades'];
			//$_SESSION['idEstado'] = $IdEstado;
			
			
			//================================================Recuperar registros tabla Estados==================================================
			$idEstado = $_POST ['estados'];
			$query = mysql_query("SELECT * FROM tbl_estados WHERE id = '$idEstado'");
			$data_est = mysql_fetch_array($query);						
			$_SESSION['estado'] =$data_est['estado']; 
			$estado=$_SESSION['estado'];		
			


		// ========================================envio de correo notificandome que un doctor modifico los datos ===================
		$destino ="gustabin@yahoo.com";
		$asunto = "Contacto Web Citas Medicas";
		$cabeceras = "Content-type: text/html";
		$cuerpo ="<h2>Hola, un Doctor modifico sus datos CITADR</h2>
		Los datos enviados son los siguientes:<br>
		<b>Email: </b>$email<br>
		<b>Nombre: </b>$nombre $apellido<br>
		<b>Telefono:  </b>$telefono<br>
		<b>Direccion: </b>$direccion<br>
		<b>Ciudad:  </b>$ciudad<br>
		<b>Estado:  </b>$estado<br>
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
		// ========================================envio de correo al doctor ===================
		$destino = $email;
		$asunto = "Modificastes tus datos en CitaDr";
		$cabeceras = "Content-type: text/html";
		$cuerpo ="<h2>Doctor - Acabas de actualizar tus datos</h2><br>
        Hola <b>$nombre $apellido</b>,<br>
        Hemos percibido un cambio en los datos de tu perfil, si crees que no fuistes tu quien modifico los datos, por favor comunicate con nosotros.<br><br>
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
		
		$_SESSION['registrandoDr']=True; //indica que el doctor se esta registrando en el sistema
			//=========================================== REedireccion a otra pagina  =====================================
			//Los datos se han insertado correctamente.';		
			$data = array("exito" => '1');
			die(json_encode($data));									
			//desconectar();
			mysql_close();	//cerrar la conexion a la bd
?>