<?php
	session_start();  
	include "lib/corelib.php";
	error_reporting(0);
		// conector de BD 
		require_once('tools/mypathdb.php');
		$doc_id=$_SESSION['doc_id'];
		
		$us_id = $_POST ['us_id']; //viene oculto
			
		$diarreas = $_POST ['diarreas'];
		$vomitosEpi = $_POST ['vomitosEpi'];
		$disenterico = $_POST ['disenterico'];
		$amibiasis = $_POST ['amibiasis'];
		$bilharziosis= $_POST['bilharziosis'];
		$parasitosis = $_POST ['parasitosis'];
		$rinofaringitis = $_POST ['rinofaringitis'];
		$amigdalitis = $_POST ['amigdalitis'];
		$otitis = $_POST ['otitis'];
		$bronquitis = $_POST ['bronquitis'];
		$neumonia= $_POST['neumonia'];
		$pleuresia = $_POST ['pleuresia'];
		$influenza = $_POST ['influenza'];
		$tuberculosisEpi = $_POST ['tuberculosisEpi'];		
		$eritema = $_POST ['eritema'];		
		$adenitis = $_POST ['adenitis']; 
		$sifilisEpi = $_POST ['sifilisEpi']; 
		$varicela = $_POST ['varicela']; 
		$sarampion = $_POST ['sarampion']; 
		$tosferina = $_POST ['tosferina']; 
		$rubeola = $_POST ['rubeola']; 
		$parotiditis = $_POST ['parotiditis']; 
		$difteriaEpi = $_POST ['difteriaEpi']; 
		$tifoidea = $_POST ['tifoidea']; 
		$paludismo = $_POST ['paludismo']; 
		$fiebreEpi = $_POST ['fiebreEpi']; 
		$artritisEpi = $_POST ['artritisEpi']; 
		$vulvovaginitis = $_POST ['vulvovaginitis']; 
		$pielEpi = $_POST ['pielEpi']; 
		$alergiasEpi = $_POST ['alergiasEpi']; 
		$quirurgicas = $_POST ['quirurgicas']; 
		$traumatismo = $_POST ['traumatismo']; 
		$otrosEpimediologicos = $_POST ['otrosEpimediologicos']; 
		$otrosEpimediologicosDescribir = $_POST ['otrosEpimediologicosDescribir']; 
		$progresoPeso = $_POST ['progresoPeso']; 
		$debilidad = $_POST ['debilidad']; 
		$fatiga = $_POST ['fatiga']; 
		$sudores = $_POST ['sudores']; 
		$otrosGeneral = $_POST ['otrosGeneral']; 
		$otrosGeneralDescribir = $_POST ['otrosGeneralDescribir']; 	
		$dermatosis = $_POST ['dermatosis']; 	
		$prurito = $_POST ['prurito']; 	
		$cianosisPiel = $_POST ['cianosisPiel']; 	
		$ictericia = $_POST ['ictericia']; 	
		$edemas = $_POST ['edemas']; 	
		$otraPiel = $_POST ['otraPiel']; 	
		$otraPielDescribir = $_POST ['otraPielDescribir']; 	
		$dolor = $_POST ['dolor'];
		$mareos = $_POST ['mareos'];
		$caida = $_POST ['caida'];
		$otrosCabeza = $_POST ['otrosCabeza'];
		$otrosCabezaDescribir = $_POST ['otrosCabezaDescribir'];
		$cansancio = $_POST ['cansancio'];
		$diplopia = $_POST ['diplopia'];
		$fotofobia = $_POST ['fotofobia'];
		$lagrimeo = $_POST ['lagrimeo'];
		$nistagmus = $_POST ['nistagmus'];
		$amaurosis = $_POST ['amaurosis'];
		$dolorOjos = $_POST ['dolorOjos'];
		$anteojos = $_POST ['anteojos'];
		$otrosOjos = $_POST ['otrosOjos'];
		$otrosOjosDescribir = $_POST ['otrosOjosDescribir'];
		$sordera = $_POST ['sordera'];
		$secreciones = $_POST ['secreciones'];
		$tinnitus = $_POST ['tinnitus'];
		$dolorOidos = $_POST ['dolorOidos'];
		$otrosOidos = $_POST ['otrosOidos'];
		$otrosOidosDescribir = $_POST ['otrosOidosDescribir'];
		$epistaxis = $_POST ['epistaxis'];
		$sinusitis = $_POST ['sinusitis'];
		$obstruccion = $_POST ['obstruccion'];
		$secrecion = $_POST ['secrecion'];
		$halitosis = $_POST ['halitosis'];
		$dolorsenos = $_POST ['dolorsenos'];
		$otrosNariz = $_POST ['otrosNariz'];
		$otrosNarizDescribir = $_POST ['otrosNarizDescribir'];
		$lengua = $_POST ['lengua'];
		$mucosas = $_POST ['mucosas'];
		$encias = $_POST ['encias'];
		$dientes = $_POST ['dientes'];
		$halitosisBoca = $_POST ['halitosisBoca'];
		$otrosBoca = $_POST ['otrosBoca'];
		$otrosBocaDescribir = $_POST ['otrosBocaDescribir'];
		$dolorGarganta = $_POST ['dolorGarganta'];
		$ronquera = $_POST ['ronquera'];
		$disfoguia = $_POST ['disfoguia'];
		$otrosGarganta = $_POST ['otrosGarganta'];
		$otrosGargantaDescribir = $_POST ['otrosGargantaDescribir'];
		$dolorRespiratorio = $_POST ['dolorRespiratorio'];
		$hemoptisis = $_POST ['hemoptisis'];
		$tos = $_POST ['tos'];
		$expectoracion = $_POST ['expectoracion'];
		$disnea = $_POST ['disnea'];
		$silbidos = $_POST ['silbidos'];
		$estridor = $_POST ['estridor'];
		$otrosRespiratorio = $_POST ['otrosRespiratorio'];
		$otrosRespiratorioDescribir = $_POST ['otrosRespiratorioDescribir'];
		$apetito = $_POST ['apetito'];
		$dolorDigestivo = $_POST ['dolorDigestivo'];
		$malestar = $_POST ['malestar'];
		$nauseas = $_POST ['nauseas'];
		$vomitosDigestivo = $_POST ['vomitosDigestivo'];
		$pirosis = $_POST ['pirosis'];
		$flatulencias = $_POST ['flatulencias'];
		$constipacion = $_POST ['constipacion'];
		$heces = $_POST ['heces'];
		$parasitos = $_POST ['parasitos'];
		$prolapso = $_POST ['prolapso'];
		$fistulas = $_POST ['fistulas'];
		$hemorroides = $_POST ['hemorroides'];
		$polipos = $_POST ['polipos'];
		$hernias = $_POST ['hernias'];
		$otrosDigestivo = $_POST ['otrosDigestivo'];
		$otrosDigestivoDescribir = $_POST ['otrosDigestivoDescribir'];
		$dolorCirculatorio = $_POST ['dolorCirculatorio'];
		$disneaCirculatorio = $_POST ['disneaCirculatorio'];
		$palpitaciones = $_POST ['palpitaciones'];
		$desmayos = $_POST ['desmayos'];
		$edemasCirculatorio = $_POST ['edemasCirculatorio'];
		$otrosCirculatorio = $_POST ['otrosCirculatorio'];		
		$otrosCirculatorioDescribir = $_POST ['otrosCirculatorioDescribir'];
		$apetitoGenito = $_POST ['apetitoGenito'];
		$dolorGenito = $_POST ['dolorGenito'];
		$malestarGenito = $_POST ['malestarGenito'];
		$nauseasGenito = $_POST ['nauseasGenito'];
		$vomitosGenito = $_POST ['vomitosGenito'];
		$pirosisGenito = $_POST ['pirosisGenito'];
		$hecesGenito = $_POST ['hecesGenito'];
		$parasitosGenito = $_POST ['parasitosGenito'];
		$prolapsoGenito = $_POST ['prolapsoGenito'];
		$fistulasGenito = $_POST ['fistulasGenito'];
		$otrosGenito = $_POST ['otrosGenito'];
		$otrosGenitoDescribir = $_POST ['otrosGenitoDescribir'];
		$debilidadMuscular = $_POST ['debilidadMuscular'];
		$deformidades = $_POST ['deformidades'];
		$doloresMuscular = $_POST ['doloresMuscular'];
		$otrasMuscular = $_POST ['otrasMuscular'];
		$otrasMuscularDescribir = $_POST ['otrasMuscularDescribir'];
		$afectiva = $_POST ['afectiva'];
		$intelectual = $_POST ['intelectual'];
		$volitiva = $_POST ['volitiva'];
		$tics = $_POST ['tics'];
		$paralisis = $_POST ['paralisis'];
		$convulsionesMental = $_POST ['convulsionesMental'];
		$estatica = $_POST ['estatica'];
		$dinamica = $_POST ['dinamica'];
		$otrosMental = $_POST ['otrosMental'];
		$otrosMentalDescribir = $_POST ['otrosMentalDescribir'];

	// ========================= Buscar la historia en tbl_historias ==========================================================

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
		$query =mysql_query("UPDATE tbl_historias SET his_diarreas='$diarreas', his_vomitosEpi='$vomitosEpi', his_disenterico='$disenterico', his_amibiasis='$amibiasis', his_bilharziosis='$bilharziosis', 
		his_parasitosis='$parasitosis', his_rinofaringitis='$rinofaringitis', his_amigdalitis='$amigdalitis', his_otitis='$otitis', his_bronquitis='$bronquitis', his_neumonia='$neumonia', 
		his_pleuresia='$pleuresia', his_influenza='$influenza', his_tuberculosisEpi='$tuberculosisEpi', his_eritema='$eritema', his_adenitis='$adenitis', his_sifilisEpi='$sifilisEpi', 
		his_varicela='$varicela', his_sarampion='$sarampion', his_tosferina='$tosferina', his_rubeola='$rubeola', his_parotiditis='$parotiditis', his_difteriaEpi='$difteriaEpi', his_tifoidea='$tifoidea', 
		his_paludismo='$paludismo', his_fiebreEpi='$fiebreEpi', his_artritisEpi='$artritisEpi', his_vulvovaginitis='$vulvovaginitis', his_pielEpi='$pielEpi', his_alergiasEpi='$alergiasEpi', 
		his_quirurgicas='$quirurgicas', his_traumatismo='$traumatismo', his_otrasEpi='$otrosEpimediologicos', his_otrasEpiDescribir='$otrosEpimediologicosDescribir', his_progresoPeso='$progresoPeso', 
		his_debilidad='$debilidad', his_fatiga='$fatiga', his_sudores='$sudores', his_otrosGeneral='$otrosGeneral', his_otrosGeneralDescribir='$otrosGeneralDescribir', his_dermatosis='$dermatosis', 
		his_prurito='$prurito', his_cianosisPiel='$cianosisPiel', his_ictericia='$ictericia', his_edemas='$edemas', his_otraPiel='$otraPiel', 
his_otraPielDescribir='$otraPielDescribir', his_dolor='$dolor', his_mareos='$mareos', his_caida='$caida', his_otrosCabeza='$otrosCabeza', his_otrosCabezaDescribir='$otrosCabezaDescribir', 
his_cansancio='$cansancio', his_diplopia='$diplopia', his_fotofobia='$fotofobia', his_lagrimeo='$lagrimeo', his_nistagmus='$nistagmus', his_amaurosis='$amaurosis', his_dolorOjos='$dolorOjos', 
his_anteojos='$anteojos', his_otrosOjos='$otrosOjos', his_otrosOjosDescribir='$otrosOjosDescribir',
 his_sordera='$sordera', his_secreciones='$secreciones', his_tinnitus='$tinnitus', his_dolorOidos='$dolorOidos', his_otrosOidos='$otrosOidos', his_otrosOidosDescribir='$otrosOidosDescribir', 
 his_epistaxis='$epistaxis', his_sinusitis='$sinusitis', his_obstruccion='$obstruccion', his_secrecion='$secrecion', his_halitosis='$halitosis', his_dolorsenos='$dolorsenos', his_otrosNariz='$otrosNariz', 
 his_otrosNarizDescribir='$otrosNarizDescribir',
  his_lengua='$lengua', his_mucosas='$mucosas', his_encias='$encias', his_dientes='$dientes', his_halitosisBoca='$halitosisBoca', his_otrosBoca='$otrosBoca', his_otrosBocaDescribir='$otrosBocaDescribir', 
  his_dolorGarganta='$dolorGarganta', his_ronquera='$ronquera', his_disfoguia='$disfoguia', his_otrosGarganta='$otrosGarganta', his_otrosGargantaDescribir='$otrosGargantaDescribir', 
  his_dolorRespiratorio='$dolorRespiratorio', his_hemoptisis='$hemoptisis', his_tos='$tos', his_expectoracion='$expectoracion', his_disnea='$disnea', his_silbidos='$silbidos', his_estridor='$estridor', 
  his_otrosRespiratorio='$otrosRespiratorio', his_otrosRespiratorioDescribir='$otrosRespiratorioDescribir',
  his_apetito='$apetito', his_dolorDigestivo='$dolorDigestivo', his_malestar='$malestar', his_nauseas='$nauseas', his_vomitosDigestivo='$vomitosDigestivo', his_pirosis='$pirosis', 
  his_flatulencias='$flatulencias', his_constipacion='$constipacion', his_heces='$heces', his_parasitos='$parasitos', his_prolapso='$prolapso', his_fistulas='$fistulas', his_hemorroides='$hemorroides', 
  his_polipos='$polipos', his_hernias='$hernias', his_otrosDigestivo='$otrosDigestivo', his_otrosDigestivoDescribir='$otrosDigestivoDescribir',
  his_dolorCirculatorio='$dolorCirculatorio', his_disneaCirculatorio='$disneaCirculatorio', his_palpitaciones='$palpitaciones', his_desmayos='$desmayos', his_edemasCirculatorio='$edemasCirculatorio', 
  his_otrosCirculatorio='$otrosCirculatorio', his_otrosCirculatorioDescribir='$otrosCirculatorioDescribir', his_apetitoGenito='$apetitoGenito', his_dolorGenito='$dolorGenito', his_malestarGenito='$malestarGenito', 
  his_nauseasGenito='$nauseasGenito', his_vomitosGenito='$vomitosGenito', his_pirosisGenito='$pirosisGenito', his_hecesGenito='$hecesGenito', his_parasitosGenito='$parasitosGenito', his_prolapsoGenito='$prolapsoGenito', 
  his_fistulasGenito='$fistulasGenito', his_otrosGenito='$otrosGenito', his_otrosGenitoDescribir='$otrosGenitoDescribir', 
  his_debilidadMuscular='$debilidadMuscular', his_deformidades='$deformidades', his_doloresMuscular='$doloresMuscular', his_otrasMuscular='$otrasMuscular', his_otrasMuscularDescribir='$otrasMuscularDescribir', 
  his_afectiva='$afectiva', his_intelectual='$intelectual', his_volitiva='$volitiva', his_tics='$tics', his_paralisis='$paralisis', his_convulsionesMental='$convulsionesMental', his_estatica='$estatica', his_dinamica='$dinamica', his_otrosMental='$otrosMental', his_otrosMentalDescribir='$otrosMentalDescribir' WHERE his_id='$his_id'");	
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