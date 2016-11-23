<?php
session_start(); 
error_reporting(0);
require_once('tools/mypathdb.php');
$email = strtolower($_POST ['email']);
$clave = $_POST ['password'];
	
	$query = mysql_query("SELECT * FROM tbl_usuarios WHERE us_email = '$email' AND us_clave = '$clave'"); 	
	$dataUsuario = mysql_fetch_array($query);	
	
	$usuario = $dataUsuario['us_tipo']; 	
	
	$userID = $dataUsuario['us_id']; 
	$status = $dataUsuario['us_status']; 
	$_SESSION['user_id'] = $userID;
	
	if ($status=='2') //verificar si la cuenta esta activa o inactiva
		{
		$data=array("error" => '2');
		die(json_encode($data));
		} 
	
	if(empty($dataUsuario))
		{
		$data=array("error" => '1');
		die(json_encode($data));
		}
	else
	{
		if ($usuario==1) {	//si es paciente
		  //================================================Recuperar registros tabla pacientes==================================================
		  $query = mysql_query("SELECT * FROM tbl_pacientes WHERE pac_id_user = '$userID'");
		  $data_pac = mysql_fetch_array($query);	
		  $_SESSION['nombre'] = $data_pac['pac_nombre'];
		  $_SESSION['apellido'] = $data_pac['pac_apellido'];
		  $_SESSION['telefono'] = $data_pac['pac_telefono'];
		  $_SESSION['email'] = $email;		
		}
	
		if ($usuario==2) {	//si es doctor
			//================================================Recuperar registros tabla doctores==================================================
			$query = mysql_query("SELECT * FROM tbl_doctores WHERE doc_id_user = '$userID'");
			$data_doc = mysql_fetch_array($query);	
			$_SESSION['nombre'] = $data_doc['doc_nombre'];
			$_SESSION['apellido'] = $data_doc['doc_apellido'];
			$_SESSION['telefono'] = $data_doc['doc_telefono'];
			$_SESSION['email'] = $email;
			$_SESSION['doc_id'] = $data_doc['doc_id'];
			$_SESSION['status']=6; // esto va a mostrar todas las citas de ese doctor
		}

		   //=========================Consultar la tabla citas ============================================
		   //============================Buscar citas por confirmar ==============================
		    
 			$query=mysql_query("select * from tbl_citas WHERE cit_pac_id= '$userID' AND cit_status=1");
			$dataCit = mysql_fetch_array($query);
  			$cita = $dataCit['cit_pin']; 
			
			if (!empty($cita))
    		{
				if ($usuario==1) {	//si es paciente
				  $_SESSION['citaSinConfirmar'] = True;
				  $data=array("exito" => '2'); //citas sin confirmar
				  die(json_encode($data));	
				}

			}else
			{
				$_SESSION['citaSinConfirmar']="";
			}

		//desconectar();
		
		//================== validar que este activo, us_tipo <>0 =========================================
		if ($usuario==0)
		{
			$data=array("error" => '4');
			die(json_encode($data));
		}
		
		
		if ($usuario==1) {	//si es paciente
		  mysql_close();
		  $data=array("exito" => '1');// equipo medico, acceso a paciente
		  die(json_encode($data));
		}
		if ($usuario==2) {	//si es doctor
		  mysql_close();
		  $data=array("exito" => '3');// citas doctor, acceso a doctor
		  die(json_encode($data));
		}
	}
?>