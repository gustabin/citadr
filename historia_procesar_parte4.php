<?php
	session_start();  
	include "lib/corelib.php";
	error_reporting(0);
		// conector de BD 
		require_once('tools/mypathdb.php');
		$doc_id=$_SESSION['doc_id'];
		
		$us_id = $_POST ['us_id']; //viene oculto
	
		$condicionesGral = $_POST ['condicionesGral'];
		$nutricionGral = $_POST ['nutricionGral'];
		$desarrolloGral = $_POST ['desarrolloGral'];
		$otrosGral = $_POST ['otrosGral'];
		$otrosGralDescribir = $_POST ['otrosGralDescribir'];
		$colorExPiel = $_POST ['colorExPiel'];
		$humedadExPiel = $_POST ['humedadExPiel'];
		$hidratacionExPiel = $_POST ['hidratacionExPiel'];
		$contexturaExPiel = $_POST ['contexturaExPiel'];
		$pigmentacionExPiel = $_POST ['pigmentacionExPiel'];
		$equimosisExPiel = $_POST ['equimosisExPiel'];
		$petequiasExPiel = $_POST ['petequiasExPiel'];
		$cianosisExPiel = $_POST ['cianosisExPiel'];
		$erupcionExPiel = $_POST ['erupcionExPiel'];
		$paniculoExPiel = $_POST ['paniculoExPiel'];
		$turgorExPiel = $_POST ['turgorExPiel'];
		$edemaExPiel = $_POST ['edemaExPiel'];
		$unasExPiel = $_POST ['unasExPiel'];
		$nodulosExPiel = $_POST ['nodulosExPiel'];
		$pelosExPiel = $_POST ['pelosExPiel'];
		$vascularizacionExPiel = $_POST ['vascularizacionExPiel'];
		$cicatricesExPiel = $_POST ['cicatricesExPiel'];
		$ulcerasExPiel = $_POST ['ulcerasExPiel'];
		$fistulasExPiel = $_POST ['fistulasExPiel'];
		$otrosExPiel = $_POST ['otrosExPiel'];
		$otrosExPielDescribir = $_POST ['otrosExPielDescribir'];
		$configuracion = $_POST ['configuracion'];
		$fontanelas = $_POST ['fontanelas'];
		$suturas = $_POST ['suturas'];
		$circunferencia = $_POST ['circunferencia'];
		$craneotabes = $_POST ['craneotabes'];
		$cabellos = $_POST ['cabellos'];
		$dolorExCabeza = $_POST ['dolorExCabeza'];
		$otrosExCabeza = $_POST ['otrosExCabeza'];
		$otrosExCabezaDescribir = $_POST ['otrosExCabezaDescribir'];
		$conjuntivas = $_POST ['conjuntivas'];
		$esclerotica = $_POST ['esclerotica'];
		$cornea = $_POST ['cornea'];
		$pupilas = $_POST ['pupilas'];
		$movimientos = $_POST ['movimientos'];
		$desviaciones = $_POST ['desviaciones'];
		$nistagmusEx = $_POST ['nistagmusEx'];
		$ptosis = $_POST ['ptosis'];
		$exoftaimos = $_POST ['exoftaimos'];
		$oftalmoscopicos = $_POST ['oftalmoscopicos'];
		$otrosOjosEx = $_POST ['otrosOjosEx'];
		$otrosOjosDescribirEx = $_POST ['otrosOjosDescribirEx'];
		$pabellon = $_POST ['pabellon'];
		$canal = $_POST ['canal'];
		$timpano = $_POST ['timpano'];
		$audicion = $_POST ['audicion'];
		$secrecionesEx = $_POST ['secrecionesEx'];
		$mastoides = $_POST ['mastoides'];
		$dolorExOidos = $_POST ['dolorExOidos'];
		$otrosExOidos = $_POST ['otrosExOidos'];
		$otrosExOidosDescribir = $_POST ['otrosExOidosDescribir'];
		$fosas = $_POST ['fosas'];
		$mucosasRino = $_POST ['mucosasRino'];
		$secrecionRino = $_POST ['secrecionRino'];
		$tabique = $_POST ['tabique'];
		$seno = $_POST ['seno'];
		$diafanoscopia = $_POST ['diafanoscopia'];
		$amigdalas = $_POST ['amigdalas'];
		$faringe = $_POST ['faringe'];
		$adenoides = $_POST ['adenoides'];
		$secrecionPost = $_POST ['secrecionPost'];
		$difagia = $_POST ['difagia'];
		$otrosRino = $_POST ['otrosRino'];
		$otrosRinoDescribir = $_POST ['otrosRinoDescribir'];
		$alientoBoca = $_POST ['alientoBoca'];
		$labiosBoca = $_POST ['labiosBoca'];
		$dientesBoca = $_POST ['dientesBoca'];
		$enciasBoca = $_POST ['enciasBoca'];
		$mucosasBoca = $_POST ['mucosasBoca'];
		$lenguaBoca = $_POST ['lenguaBoca'];
		$conductosBoca = $_POST ['conductosBoca'];
		$trismo = $_POST ['trismo'];
		$otrosBocaEx = $_POST ['otrosBocaEx'];
		$otrosBocaDescribirEx = $_POST ['otrosBocaDescribirEx'];
		$movilidadCuello = $_POST ['movilidadCuello'];
		$tumoracionCuello = $_POST ['tumoracionCuello'];
		$tiroidesCuello = $_POST ['tiroidesCuello'];
		$vasosCuello = $_POST ['vasosCuello'];
		$traqueaCuello = $_POST ['traqueaCuello'];
		$otrosCuello = $_POST ['otrosCuello'];
		$otrosCuelloDescribir = $_POST ['otrosCuelloDescribir'];
		$cervicales = $_POST ['cervicales'];
		$occipitales = $_POST ['occipitales'];
		$supraclaviculares = $_POST ['supraclaviculares'];
		$axilares = $_POST ['axilares'];
		$inguinales = $_POST ['inguinales'];
		$epitroclares = $_POST ['epitroclares'];
		$otrosGanglios = $_POST ['otrosGanglios'];
		$otrosGangliosDescribir = $_POST ['otrosGangliosDescribir'];

	// ========================= Buscar la historia en tbl_historias ==========================================================
//
	$queryHistoria = mysql_query("SELECT * FROM tbl_historias WHERE his_id = '$us_id' AND his_doc_id = '$doc_id'");	

	$dataHistoria = mysql_fetch_array($queryHistoria);	
	if(empty($dataHistoria)) // =================== si no la encuentra ============================================
	{
	}
	else
	{
		$his_id = $dataHistoria['his_id'];
		//
		// ===============================================Actualizar los datos en tbl_historias=====================================

		$query =mysql_query("UPDATE tbl_historias SET his_condicionesGral='$condicionesGral', his_nutricionGral='$nutricionGral', his_desarrolloGral='$desarrolloGral', his_otrosGral='$otrosGral', his_otrosGralDescribir='$otrosGralDescribir', his_colorExPiel='$colorExPiel', his_humedadExPiel='$humedadExPiel', his_hidratacionExPiel='$hidratacionExPiel', his_contexturaExPiel='$contexturaExPiel', his_pigmentacionExPiel='$pigmentacionExPiel', his_equimosisExPiel='$equimosisExPiel', his_petequiasExPiel='$petequiasExPiel', his_cianosisExPiel='$cianosisExPiel', his_erupcionExPiel='$erupcionExPiel', his_paniculoExPiel='$paniculoExPiel', his_turgorExPiel='$turgorExPiel', his_edemaExPiel='$edemaExPiel', his_unasExPiel='$unasExPiel', his_nodulosExPiel='$nodulosExPiel', his_pelosExPiel='$pelosExPiel', his_vascularizacionExPiel='$vascularizacionExPiel', his_cicatricesExPiel='$cicatricesExPiel', his_ulcerasExPiel='$ulcerasExPiel', his_fistulasExPiel='$fistulasExPiel', his_otrosExPiel='$otrosExPiel', his_otrosExPielDescribir='$otrosExPielDescribir', his_configuracion='$configuracion', his_fontanelas='$fontanelas', his_suturas='$suturas', his_circunferencia='$circunferencia', his_craneotabes='$craneotabes', his_cabellos='$cabellos', his_dolorExCabeza='$dolorExCabeza', his_otrosExCabeza='$otrosExCabeza', his_otrosExCabezaDescribir='$otrosExCabezaDescribir',
his_conjuntivas='$conjuntivas', his_esclerotica='$esclerotica', his_cornea='$cornea', his_pupilas='$pupilas', his_movimientos='$movimientos', his_desviaciones='$desviaciones', his_nistagmusEx='$nistagmusEx', his_ptosis='$ptosis', his_exoftaimos='$exoftaimos', his_oftalmoscopicos='$oftalmoscopicos', his_otrosOjosEx='$otrosOjosEx', his_otrosOjosDescribirEx='$otrosOjosDescribirEx', his_pabellon='$pabellon', his_canal='$canal', his_timpano='$timpano', 
his_audicion='$audicion', his_secrecionesEx='$secrecionesEx', his_mastoides='$mastoides', his_dolorExOidos='$dolorExOidos', his_otrosExOidos='$otrosExOidos', his_otrosExOidosDescribir='$otrosExOidosDescribir', his_fosas='$fosas', his_mucosasRino='$mucosasRino', his_secrecionRino='$secrecionRino', 
his_tabique='$tabique', his_seno='$seno', his_diafanoscopia='$diafanoscopia', his_amigdalas='$amigdalas', his_faringe='$faringe', his_adenoides='$adenoides', 
his_secrecionPost='$secrecionPost', his_difagia='$difagia', his_otrosRino='$otrosRino', his_otrosRinoDescribir='$otrosRinoDescribir', 
his_alientoBoca='$alientoBoca', his_labiosBoca='$labiosBoca', his_dientesBoca='$dientesBoca', his_enciasBoca='$enciasBoca', his_mucosasBoca='$mucosasBoca', his_lenguaBoca='$lenguaBoca', his_conductosBoca='$conductosBoca', his_trismo='$trismo', his_otrosBocaEx='$otrosBocaEx', his_otrosBocaDescribirEx='$otrosBocaDescribirEx', his_movilidadCuello='$movilidadCuello', his_tumoracionCuello='$tumoracionCuello', his_tiroidesCuello='$tiroidesCuello', his_vasosCuello='$vasosCuello', his_traqueaCuello='$traqueaCuello', his_otrosCuello='$otrosCuello', his_otrosCuelloDescribir='$otrosCuelloDescribir', his_cervicales='$cervicales', his_occipitales='$occipitales', his_supraclaviculares='$supraclaviculares', his_axilares='$axilares', his_inguinales='$inguinales', his_epitroclares='$epitroclares', his_otrosGanglios='$otrosGanglios', his_otrosGangliosDescribir='$otrosGangliosDescribir' WHERE his_id='$his_id'");	
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