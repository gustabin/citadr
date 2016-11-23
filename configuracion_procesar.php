<?php
	session_start();  
	include "lib/corelib.php";
	error_reporting(0);
		// conector de BD 
		require_once('tools/mypathdb.php');
		$doc_id=$_SESSION['doc_id'];
		
		$historiaFamiliar = $_POST ['historiaFamiliar'];
		$antecedentesPrenatales = $_POST ['antecedentesPrenatales'];
		$periodoNeonatal = $_POST ['periodoNeonatal'];
		$alimentacion = $_POST ['alimentacion'];
		$desarrollo = $_POST ['desarrollo'];
		$habitos = $_POST ['habitos'];
		$inmunizaciones = $_POST ['inmunizaciones'];
		$contactosTBC = $_POST ['contactosTBC'];
		$antecedentesEpi = $_POST ['antecedentesEpi'];
		$general = $_POST ['general'];
		$piel = $_POST ['piel'];
		$cabeza = $_POST ['cabeza'];
		$ojos = $_POST ['ojos'];
		$oidos = $_POST ['oidos'];
		$nariz = $_POST ['nariz'];
		$boca = $_POST ['boca'];
		$garganta = $_POST ['garganta'];
		$respiratorio = $_POST ['respiratorio'];
		$digestivo = $_POST ['digestivo'];
		$circulatorio = $_POST ['circulatorio'];
		$genitourinario = $_POST ['genitourinario'];
		$muscularOsteoArticular = $_POST ['muscularOsteoArticular'];
		$nerviosoMental = $_POST ['nerviosoMental'];
		$estadoGeneralEx = $_POST ['estadoGeneralEx'];
		$pielPandiculoEx = $_POST ['pielPandiculoEx'];
		$cabezaEx = $_POST ['cabezaEx'];
		$ojosEx = $_POST ['ojosEx'];
		$oidosEx = $_POST ['oidosEx'];
		$rinofaringeEx = $_POST ['rinofaringeEx'];
		$bocaEx = $_POST ['bocaEx'];
		$cuelloEx = $_POST ['cuelloEx'];
		$gangliosEx = $_POST ['gangliosEx'];
		$toraxPulmonesEx = $_POST ['toraxPulmonesEx'];
		$corazonVasosEx = $_POST ['corazonVasosEx'];
		$abdomenEx = $_POST ['abdomenEx'];
		$urinarioEx = $_POST ['urinarioEx'];
		$genitalesEx = $_POST ['genitalesEx'];
		$anoRectoEx = $_POST ['anoRectoEx'];
		$huesosEx = $_POST ['huesosEx'];
		$neurologicosEx = $_POST ['neurologicosEx'];
		$sensorialesEx = $_POST ['sensorialesEx'];
		
	// ========================= Buscar la historia en tbl_perfil ==========================================================
	//
	$queryPerfil = mysql_query("SELECT * FROM tbl_perfil WHERE per_doc_id = '$doc_id'");	

	$dataPerfil = mysql_fetch_array($queryPerfil);	
	if(empty($dataPerfil)) // =================== si no la encuentra ============================================
	{
	}
	else
	{
		$per_id = $dataPerfil['per_id'];
		// ===============================================Actualizar los datos en tbl_historias=====================================
		//
		$query =mysql_query("UPDATE tbl_perfil SET per_historiaFamiliar='$historiaFamiliar', per_antecedentesPrenatales='$antecedentesPrenatales', per_periodoNeonatal='$periodoNeonatal', per_alimentacion='$alimentacion', per_desarrollo='$desarrollo',	per_habitos='$habitos', per_inmunizaciones='$inmunizaciones', per_contactosTBC='$contactosTBC', per_antecedentesEpi='$antecedentesEpi', per_general='$general', per_piel='$piel', per_cabeza='$cabeza', per_ojos='$ojos', per_oidos='$oidos', per_nariz='$nariz',	per_boca='$boca', per_garganta='$garganta', per_respiratorio='$respiratorio', per_digestivo='$digestivo', per_circulatorio='$circulatorio', per_genitourinario='$genitourinario', per_muscularOsteoArticular='$muscularOsteoArticular', per_nerviosoMental='$nerviosoMental', per_estadoGeneralEx='$estadoGeneralEx', per_pielPandiculoEx='$pielPandiculoEx',	per_cabezaEx='$cabezaEx', per_ojosEx='$ojosEx', per_oidosEx='$oidosEx', per_rinofaringeEx='$rinofaringeEx', per_bocaEx='$bocaEx', per_cuelloEx='$cuelloEx', per_gangliosEx='$gangliosEx', per_toraxPulmonesEx='$toraxPulmonesEx', per_corazonVasosEx='$corazonVasosEx', per_abdomenEx='$abdomenEx', per_urinarioEx='$urinarioEx', per_genitalesEx='$genitalesEx', per_anoRectoEx='$anoRectoEx', per_huesosEx='$huesosEx', per_neurologicosEx='$neurologicosEx', per_sensorialesEx='$sensorialesEx' WHERE per_id='$per_id'");	
//var_dump($query);
//die();
		//=========================================== REedireccion a otra pagina  =====================================
		//Los datos se han actualizado correctamente.';		
		$data = array("exito" => '2'); 
		die(json_encode($data));									
		//desconectar();
		mysql_close();	//cerrar la conexion a la bd
		}
?>