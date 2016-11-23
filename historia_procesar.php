<?php
	session_start();  
	include "lib/corelib.php";
	error_reporting(0);
		// conector de BD 
		require_once('tools/mypathdb.php');


		if(empty($_SESSION['his_id_user'])) {
		//===================================================Redirigir a otra pagina============================================
			$data=array("error" => '1');
			die(json_encode($data));
			} 
			
			// si todo va bien
		$nombre = $_POST ['nombre'];
		$apellido = $_POST ['apellido'];
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

// ===============================================Grabar los datos ===============================================
			// ===============================================Buscar los datos en la tabla=====================================	
	
	$iduser = $_SESSION['his_id_user'];
    $query= mysql_query("SELECT * FROM tbl_historias WHERE his_id_user='$iduser'");
	$dataHistoria = mysql_fetch_array($query);
	$his_id = $dataHistoria['his_id'];
	

	if(empty($his_id))
		{
			// ===============================================Insertar los datos en la tabla=====================================
			$query = mysql_query("INSERT INTO tbl_historias (his_apellido, his_nombre, his_cedula, his_sexo, his_edad, his_edoCivil, his_ciudadNacimiento, 
			his_fechaNacimiento, his_nacionalidad, his_ocupacion, his_direccion, his_apellidoAvisar, his_nombreAvisar, his_parentescoAvisar, his_direccionAvisar, 
			his_fechaConsulta, his_horaConsulta, his_fechaConsultaAnterior, his_motivos, his_enfermedad, his_diagnosticoProvisional, his_egreso, 
			his_diagnosticoFinal, his_fechaEgreso, his_horaEgreso, his_diagnosticoAnatomo) VALUES ('$apellido', '$nombre', '$cedula', '$sexo', '$edad', '$edoCivil', 
			'$ciudadNacimiento', '$fechaNacimiento', '$nacionalidad','$ocupacion', '$direccion', '$apellidoAvisar','$nombreAvisar', '$parentescoAvisar', 
			'$direccionAvisar','$fechaConsulta', '$horaConsulta', '$fechaConsultaAnterior','$motivos', '$enfermedad', '$diagnosticoProvisional','$egreso', 
			'$diagnosticoFinal', '$fechaEgreso','$horaEgreso', '$diagnosticoAnatomoPatologico')");

		//Los datos se han insertado correctamente.';		
		$data = array("exito" => '1');
		die(json_encode($data));									
		}
	else
		{
		// ===============================================Actualizar los datos en la tabla=====================================	
		$query = mysql_query("UPDATE tbl_historias SET his_apellido='$apellido', his_nombre='$nombre', his_cedula='$cedula', his_sexo='$sexo', his_edad='$edad', 
		his_edoCivil='$edoCivil', his_ciudadNacimiento='$ciudadNacimiento', his_fechaNacimiento='$fechaNacimiento', his_nacionalidad='$nacionalidad', 
		his_ocupacion='$ocupacion', his_direccion='$direccion', his_apellidoAvisar='$apellidoAvisar', his_nombreAvisar='$nombreAvisar', 
		his_parentescoAvisar='$parentescoAvisar', his_direccionAvisar='$direccionAvisar', his_fechaConsulta='$fechaConsulta', 
		his_horaConsulta='$horaConsulta', his_fechaConsultaAnterior='$fechaConsultaAnterior', his_motivos='$motivos', his_enfermedad='$enfermedad', 
		his_diagnosticoProvisional='$diagnosticoProvisional', his_egreso='$egreso', his_diagnosticoFinal='$diagnosticoFinal', 
		his_fechaEgreso='$fechaEgreso', his_horaEgreso='$horaEgreso', his_diagnosticoAnatomo='$diagnosticoAnatomoPatologico' WHERE his_id='$his_id'");	
	
		//=========================================== REedireccion a otra pagina  =====================================
		//Los datos se han actualizado correctamente.';		
		$data = array("exito" => '2');
		die(json_encode($data));									
		//desconectar();
		mysql_close();	//cerrar la conexion a la bd
		}
?>