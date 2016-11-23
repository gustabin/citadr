<?php
	session_start();  
	include "lib/corelib.php";
	error_reporting(0);
		// conector de BD 
		require_once('tools/mypathdb.php');
		$doc_id=$_SESSION['doc_id'];
		
		$us_id = $_POST ['us_id']; //viene oculto

		$circunferenciaTorax = $_POST ['circunferenciaTorax'];
		$forma = $_POST ['forma'];
		$simetria = $_POST ['simetria'];
		$expansion = $_POST ['expansion'];
		$respiracionTorax = $_POST ['respiracionTorax'];
		$disneaTorax = $_POST ['disneaTorax'];
		$palpacion = $_POST ['palpacion'];
		$percusion = $_POST ['percusion'];
		$auscultacion = $_POST ['auscultacion'];
		$radioscopia = $_POST ['radioscopia'];
		$otrasTorax = $_POST ['otrasTorax'];
		$otrasToraxDescribir = $_POST ['otrasToraxDescribir'];
		$region = $_POST ['region'];
		$latido = $_POST ['latido'];
		$thrill = $_POST ['thrill'];
		$ritmo = $_POST ['ritmo'];
		$ruidos = $_POST ['ruidos'];
		$soplos = $_POST ['soplos'];
		$tension = $_POST ['tension'];
		$pulso = $_POST ['pulso'];
		$vasos = $_POST ['vasos'];
		$otrosCorazon = $_POST ['otrosCorazon'];
		$otrosCorazonDescribir = $_POST ['otrosCorazonDescribir'];
		$circunferenciaAbdomen = $_POST ['circunferenciaAbdomen'];
		$aspecto = $_POST ['aspecto'];
		$peristalsis = $_POST ['peristalsis'];
		$cicatrices = $_POST ['cicatrices'];
		$dolorAbdomen = $_POST ['dolorAbdomen'];
		$hiparestesia = $_POST ['hiparestesia'];
		$contractura = $_POST ['contractura'];
		$defensa = $_POST ['defensa'];
		$tumoraciones = $_POST ['tumoraciones'];
		$ascitis = $_POST ['ascitis'];
		$higado = $_POST ['higado'];
		$bazo = $_POST ['bazo'];
		$hernia = $_POST ['hernia'];
		$otrosAbdomen = $_POST ['otrosAbdomen'];
		$otrosAbdomenDescribir = $_POST ['otrosAbdomenDescribir'];
		$rinones = $_POST ['rinones'];
		$puntos = $_POST ['puntos'];
		$miccion = $_POST ['miccion'];
		$orina = $_POST ['orina'];
		$dolorUrinario = $_POST ['dolorUrinario'];		
		$otroUrinario = $_POST ['otroUrinario'];
		$dolorUrinarioDescribir = $_POST ['dolorUrinarioDescribir'];
		$cicatricesGen = $_POST ['cicatricesGen'];
		$lesionesGen = $_POST ['lesionesGen'];
		$secrecionesGen = $_POST ['secrecionesGen'];
		$escroto = $_POST ['escroto'];
		$epididimo = $_POST ['epididimo'];
		$conducto = $_POST ['conducto'];
		$testiculos = $_POST ['testiculos'];
		$prostata = $_POST ['prostata'];
		$vesiculos = $_POST ['vesiculos'];
		$ovarios = $_POST ['ovarios'];
		$externos = $_POST ['externos'];
		$otrosGen = $_POST ['otrosGen'];
		$otrosGenDescribir = $_POST ['otrosGenDescribir'];
		$fisura = $_POST ['fisura'];
		$fistula = $_POST ['fistula'];
		$prolapsoAno = $_POST ['prolapsoAno'];
		$esfinterAno = $_POST ['esfinterAno'];
		$tumoracionesAno = $_POST ['tumoracionesAno'];
		$hemorroidesAno = $_POST ['hemorroidesAno'];
		$eritemaAno = $_POST ['eritemaAno'];
		$tacto = $_POST ['tacto'];
		$rectoscopia = $_POST ['rectoscopia'];
		$otrosAno = $_POST ['otrosAno'];
		$otrosAnoDescribir = $_POST ['otrosAnoDescribir'];
		$deformidadesHuesos = $_POST ['deformidadesHuesos'];
		$inflamacion = $_POST ['inflamacion'];
		$epitisitis = $_POST ['epitisitis'];
		$sensibilidad = $_POST ['sensibilidad'];
		$limitacion = $_POST ['limitacion'];
		$masas = $_POST ['masas'];
		$dedos = $_POST ['dedos'];
		$otrosHuesos = $_POST ['otrosHuesos'];
		$otrosHuesosDescribir = $_POST ['otrosHuesosDescribir'];
		$motilidad = $_POST ['motilidad'];
		$reflejos = $_POST ['reflejos'];
		$objetiva = $_POST ['objetiva'];
		$coordinacion = $_POST ['coordinacion'];
		$troficos = $_POST ['troficos'];
		$lenguaje = $_POST ['lenguaje'];
		$escritura = $_POST ['escritura'];
		$orientacion = $_POST ['orientacion'];
		$psiquismo = $_POST ['psiquismo'];
		$otrosNeu = $_POST ['otrosNeu'];
		$otrosNeuDescribir = $_POST ['otrosNeuDescribir'];
		$visionSen = $_POST ['visionSen'];
		$audicionSen = $_POST ['audicionSen'];
		$olorSen = $_POST ['olorSen'];
		$gustoSen = $_POST ['gustoSen'];
		$otrosSen = $_POST ['otrosSen'];
		$otrosSenDescribir = $_POST ['otrosSenDescribir'];
		

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

		$query =mysql_query("UPDATE tbl_historias SET his_circunferenciaTorax='$circunferenciaTorax', his_forma='$forma', his_simetria='$simetria', his_expansion='$expansion', his_respiracionTorax='$respiracionTorax', his_disneaTorax='$disneaTorax', his_palpacion='$palpacion', his_percusion='$percusion', his_auscultacion='$auscultacion', his_radioscopia='$radioscopia', his_otrasTorax='$otrasTorax', his_otrasToraxDescribir='$otrasToraxDescribir',
his_region='$region', his_latido='$latido', his_thrill='$thrill', his_ritmo='$ritmo', his_ruidos='$ruidos', his_soplos='$soplos',
his_tension='$tension', his_pulso='$pulso', his_vasos='$vasos', his_otrosCorazon='$otrosCorazon', his_otrosCorazonDescribir='$otrosCorazonDescribir',
his_circunferenciaAbdomen='$circunferenciaAbdomen', his_aspecto='$aspecto', his_peristalsis='$peristalsis', his_cicatrices='$cicatrices', his_dolorAbdomen='$dolorAbdomen', his_hiparestesia='$hiparestesia', his_contractura='$contractura', his_defensa='$defensa', his_tumoraciones='$tumoraciones',
his_ascitis='$ascitis', his_higado='$higado', his_bazo='$bazo', his_hernia='$hernia', his_otrosAbdomen='$otrosAbdomen', his_otrosAbdomenDescribir='$otrosAbdomenDescribir', his_rinones='$rinones', his_puntos='$puntos', his_miccion='$miccion', his_orina='$orina', his_dolorUrinario='$dolorUrinario', his_otroUrinario='$otroUrinario', his_dolorUrinarioDescribir='$dolorUrinarioDescribir', his_cicatricesGen='$cicatricesGen', his_lesionesGen='$lesionesGen', his_secrecionesGen='$secrecionesGen', his_escroto='$escroto', his_epididimo='$epididimo', his_conducto='$conducto', 
his_testiculos='$testiculos', his_prostata='$prostata', his_vesiculos='$vesiculos', his_ovarios='$ovarios', his_externos='$externos', his_otrosGen='$otrosGen', his_otrosGenDescribir='$otrosGenDescribir', his_fisura='$fisura', his_fistula='$fistula', his_prolapsoAno='$prolapsoAno', his_esfinterAno='$esfinterAno', his_tumoracionesAno='$tumoracionesAno', his_hemorroidesAno='$hemorroidesAno', his_eritemaAno='$eritemaAno', his_tacto='$tacto',
his_rectoscopia='$rectoscopia', his_otrosAno='$otrosAno', his_otrosAnoDescribir='$otrosAnoDescribir', his_deformidadesHuesos='$deformidadesHuesos', his_inflamacion='$inflamacion', his_epitisitis='$epitisitis', his_sensibilidad='$sensibilidad', his_limitacion='$limitacion', his_masas='$masas', 
his_dedos='$dedos', his_otrosHuesos='$otrosHuesos', his_otrosHuesosDescribir='$otrosHuesosDescribir', his_motilidad='$motilidad', his_reflejos='$reflejos', his_objetiva='$objetiva', his_coordinacion='$coordinacion', his_troficos='$troficos', his_lenguaje='$lenguaje', his_escritura='$escritura', his_orientacion='$orientacion', his_psiquismo='$psiquismo', his_otrosNeu='$otrosNeu', his_otrosNeuDescribir='$otrosNeuDescribir',
his_visionSen='$visionSen', his_audicionSen='$audicionSen', his_olorSen='$olorSen', his_gustoSen='$gustoSen', his_otrosSen='$otrosSen', his_otrosSenDescribir='$otrosSenDescribir' WHERE his_id='$his_id'");	
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