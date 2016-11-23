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
		$telefono= $_POST['celular'];
		$direccion= $_POST['Direccion'];
		$ciudad = $_POST ['ciudades'];
		$IdEstado = $_POST ['estados']; 
		$codigoPromocional = $_POST ['codigoPromocional']; 
		$status = 1;//"1 Activo, 2 Inactivo";
			//=========== Buscar el codigo promocional en la tbl_promociones ===============================
	if (!empty($codigoPromocional)) 
	{
		$queryPro = mysql_query("SELECT *FROM tbl_promocion WHERE pro_codigo='$codigoPromocional'");		
		$dataPromocion = mysql_fetch_array($queryPro);	

		if(empty($dataPromocion))
			{
				$data=array("error" => '4');
				die(json_encode($data));
			}	
		else
			{
				$pro_contador = $dataPromocion['pro_contador'];
				if ($pro_contador==100) 
					{
						$data=array("error" => '3');
						die(json_encode($data));
					}			  
			$pro_contador = $pro_contador + 1;
			// ===============================================Actualizar los datos en la tabla=====================================	
			$query = mysql_query("UPDATE tbl_promocion SET pro_contador='$pro_contador' WHERE pro_codigo='$codigoPromocional'");	
			}
	}
	
			// ===============================================Grabar los datos ===============================================
			// ===============================================Buscar los datos en la tabla=====================================	
			
	if(empty($_SESSION['us_id']))
		{
			// ===============================================Insertar los datos en la tabla=====================================
			$query_insertarUsuario = mysql_query("INSERT INTO tbl_usuarios (us_email, us_clave, us_status, us_fecha, us_tipo) VALUES ('$email', '$clave', '$status', NOW(), '2')");
			if($query_insertarUsuario == false) 
			{
				$data=array("error" => '2');
				die(json_encode($data));
			}
			
			$user_id = mysql_insert_id();
			$_SESSION['us_id']=$user_id ;
			
			$query_insertarDoctor = mysql_query("INSERT INTO tbl_doctores(doc_nombre, doc_apellido, doc_telefono, doc_direccion, doc_ciudad, doc_estado, doc_id_user, doc_promocion) VALUES ('$nombre', '$apellido', '$telefono', '$direccion', '$ciudad', '$IdEstado', '$user_id', '$codigoPromocional');");
			
			$doc_id = mysql_insert_id();
			
			$query_insertarPerfil = mysql_query("INSERT INTO tbl_perfil(per_doc_id, per_historiaFamiliar, per_antecedentesPrenatales, per_periodoNeonatal, per_alimentacion, per_desarrollo, per_habitos, per_inmunizaciones, per_contactosTBC, per_antecedentesEpi, per_general, per_piel, per_cabeza, per_ojos, per_oidos, per_nariz, per_boca, per_garganta, per_respiratorio, per_digestivo, per_circulatorio, per_genitourinario, per_muscularOsteoArticular, per_nerviosoMental, per_estadoGeneralEx, per_pielPandiculoEx, per_cabezaEx, per_ojosEx, per_oidosEx, per_rinofaringeEx, per_bocaEx, per_cuelloEx, per_gangliosEx, per_toraxPulmonesEx, per_corazonVasosEx, per_abdomenEx, per_urinarioEx, per_genitalesEx, per_anoRectoEx, per_huesosEx, per_neurologicosEx, per_sensorialesEx) VALUES ('$doc_id', 1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1);");
			
		}
	else
		{
		// ===============================================Actualizar los datos en la tabla=====================================	
		$user_id = $_SESSION['us_id'] ;
		$query = mysql_query("UPDATE tbl_usuarios SET us_email='$email', us_clave='$clave', us_status='$status', us_fecha=NOW(), us_tipo='2' WHERE us_id='$user_id'");	
		
		$queryDr = mysql_query("UPDATE tbl_doctores SET doc_nombre='$nombre', doc_apellido='$apellido', doc_telefono='$telefono', doc_direccion='$direccion', doc_ciudad='$ciudad', doc_estado='$IdEstado' WHERE doc_id_user='$user_id'");		
		}
			
			
			// =====================grabar ID en variable de session =====================
			
			$_SESSION['doc_id']=$doc_id;
			$_SESSION['clave'] = $clave;
			$_SESSION['emailDr'] = $email;
			$_SESSION['nombre'] = $_POST ['Nombre'];
			$_SESSION['apellido'] = $_POST ['Apellido'];
			$_SESSION['telefono']= $_POST['celular'];
			$_SESSION['direccion']= $_POST['Direccion'];
			$_SESSION['ciudad'] = $_POST ['ciudades'];
			$_SESSION['idEstado'] = $IdEstado;
			
			//$_SESSION['email']=""; // miron
			//estas dos lineas son provisionales
			$_SESSION['email']=$email;
			$_SESSION['user_id']=$_SESSION['us_id'];
			
			//================================================Recuperar registros tabla Estados==================================================
			$idEstado = $_POST ['estados'];
			$query = mysql_query("SELECT * FROM tbl_estados WHERE id = '$idEstado'");
			$data_est = mysql_fetch_array($query);						
			$_SESSION['estado'] =$data_est['estado']; 
			$estado=$_SESSION['estado'];		
			


		// ========================================envio de correo notificandome que un doctor se suscribio ===================
		$destino ="gustabin@yahoo.com";
		$asunto = "Contacto Web Citas Medicas";
		$cabeceras = "Content-type: text/html";
		$cuerpo ="<h2>Hola, un Doctor se ha registrado en la Web de citas médicas</h2>
		Los datos enviados son los siguientes:<br>
		<b>Email: </b>$email<br>
		<b>Nombre: </b>$nombre $apellido<br>
		<b>Telefono:  </b>$telefono<br>
		<b>Direccion: </b>$direccion<br>
		<b>Ciudad:  </b>$ciudad<br>
		<b>Estado:  </b>$estado<br>
		<b>Codigo promocional:  </b>$codigo<br>
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
		$asunto = "Bienvenido a CitaDr, la web de citas Medicas para ti";
		$cabeceras = "Content-type: text/html";
		$cuerpo ="<h2>Doctor - CitaDr te da la Bienvenida!</h2><br>
        Hola <b>$nombre $apellido</b>,<br>
        En nuestro sitio los pacientes podrán encontrarte y realizar las citas médicas de manera online. <br>
		Tenemos un buscador que permite clasificar los médicos por especialidades y hacer citas al instante!<br>		
        También puedes cancelar o reprogramar citas que tengas reservadas.<br><br>
        <a href=".SERVER."login.php>Ingresa a tu cuenta</a>  con tu nombre de usuario: <b> $email </b><br><br>
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