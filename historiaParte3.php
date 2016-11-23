<?php 
session_start();
include "lib/corelib.php";
require_once('tools/mypathdb.php');
include "lib/class/class.php";
error_reporting(0);
$_SESSION['valor'] = 12; //Activa la opcion del menu actual
include "headers/header.php";
if (!empty($_GET ['id'])) 	
	{
		$us_id = $_GET ['id'];	
	} 
?>
<script Language="JavaScript">
	$(document).ready(function() {
		$('#titulo').html("inicio / historia clinica / parte III");
		//$('#contenido').load('registrarDrVista.php');		
		 
	});
	 
	
 //Metodo para cargar los datos personales
    $("body").on('submit', '#formHistoria', function(event) {
		event.preventDefault()
		if ($('#formHistoria').valid()) {
			$.ajax({
				type: "POST",
				url: "historia_procesar_parte3.php",
				dataType: "json",
				data: $(this).serialize(),
				success: function(respuesta) {
					if (respuesta.error == 1) {
						$('#error1').show();
						setTimeout(function() {
						$('#error1').hide();
						}, 1000);
					}
					
					if (respuesta.exito == 1) {
						$('#exito1').show();
						setTimeout(function() {
						$('#exito1').hide();
						window.location.href='historiaParte4.php?id=<?php echo $us_id?>'; 
					  }, 1000);
					}
					
					if (respuesta.exito == 2) {
						$('#exito2').show();
						setTimeout(function() {
						$('#exito2').hide();
						window.location.href='historiaParte4.php?id=<?php echo $us_id?>'; 
					  }, 1000);
					}
					
				}
			});
		}
	});	
	    
</script> 
  <!-- .................................... $breadcrumb .................................... -->
  <section class="section-breadcrumb section-color-graylighter">
    <div class="container">
      <ul class="breadcrumb">
        <li><a href="#"><span id="titulo"></span></a></li>
      </ul>
    </div>
  </section>
  <!-- .................................... $Titulo .................................... -->
  
    <div class="container" style="margin-top:10px">
      <h2 class="section-title">
        Historia clinica 
        <small>Parte III</small>
      </h2>
      </div>
  
  <!-- .................................... $Contenido .................................... -->
  <section class="section-content section-contact section-color-graylighter">
    <div class="container">
      <div class="row">
        <div id="contenido">  
       <div class="span12">	
    
     <?php
		$doc_id=$_SESSION['doc_id'];

    // ========================= Buscar la historia en tbl_historias ==========================================================
	$query="SELECT * FROM tbl_historias WHERE his_id = '$us_id' AND his_doc_id = '$doc_id'";  

	$resultado=mysql_query($query,$dbConn);
	while($dataHis=mysql_fetch_array($resultado))
	{    
	$diarreas= $dataHis['his_diarreas'];
	$vomitosEpi= $dataHis['his_vomitosEpi'];
	$disenterico= $dataHis['his_disenterico'];
	$amibiasis= $dataHis['his_amibiasis'];
	$bilharziosis= $dataHis['his_bilharziosis'];
	$parasitosis= $dataHis['his_parasitosis'];
	$rinofaringitis= $dataHis['his_rinofaringitis'];
	$amigdalitis= $dataHis['his_amigdalitis'];
	$otitis= $dataHis['his_otitis'];
	$bronquitis= $dataHis['his_bronquitis'];
	$neumonia= $dataHis['his_neumonia'];
	$pleuresia= $dataHis['his_pleuresia'];
	$influenza= $dataHis['his_influenza'];
	$tuberculosisEpi= $dataHis['his_tuberculosisEpi'];
	$eritema= $dataHis['his_eritema'];
	$adenitis= $dataHis['his_adenitis'];
	$sifilisEpi= $dataHis['his_sifilisEpi'];
	$varicela= $dataHis['his_varicela'];
	$sarampion= $dataHis['his_sarampion'];
	$tosferina= $dataHis['his_tosferina'];
	$rubeola= $dataHis['his_rubeola'];
	$parotiditis= $dataHis['his_parotiditis'];
	$difteriaEpi= $dataHis['his_difteriaEpi'];
	$tifoidea= $dataHis['his_tifoidea'];
	$paludismo= $dataHis['his_paludismo'];
	$fiebreEpi= $dataHis['his_fiebreEpi'];
	$artritisEpi= $dataHis['his_artritisEpi'];
	$vulvovaginitis= $dataHis['his_vulvovaginitis'];
	$pielEpi= $dataHis['his_pielEpi'];
	$alergiasEpi= $dataHis['his_alergiasEpi'];
	$quirurgicas= $dataHis['his_quirurgicas'];
	$traumatismo= $dataHis['his_traumatismo'];
	$otrosEpimediologicos= $dataHis['his_otrasEpi'];
	$otrosEpimediologicosDescribir= $dataHis['his_otrasEpiDescribir'];
	$progresoPeso= $dataHis['his_progresoPeso'];
	$debilidad= $dataHis['his_debilidad'];
	$fatiga= $dataHis['his_fatiga'];
	$sudores= $dataHis['his_sudores'];
	$otrosGeneral= $dataHis['his_otrosGeneral'];
	$otrosGeneralDescribir= $dataHis['his_otrosGeneralDescribir'];
	$dermatosis= $dataHis['his_dermatosis'];
	$prurito= $dataHis['his_prurito'];
	$cianosisPiel= $dataHis['his_cianosisPiel'];
	$ictericia= $dataHis['his_ictericia'];
	$edemas= $dataHis['his_edemas'];
	$otraPiel= $dataHis['his_otraPiel'];
	$otraPielDescribir= $dataHis['his_otraPielDescribir'];
	$dolor= $dataHis['his_dolor'];
	$mareos= $dataHis['his_mareos'];
	$caida= $dataHis['his_caida'];
	$otrosCabeza= $dataHis['his_otrosCabeza'];
	$otrosCabezaDescribir= $dataHis['his_otrosCabezaDescribir'];
	$cansancio= $dataHis['his_cansancio'];
	$diplopia= $dataHis['his_diplopia'];
	$fotofobia= $dataHis['his_fotofobia'];
	$lagrimeo= $dataHis['his_lagrimeo'];
	$nistagmus= $dataHis['his_nistagmus'];
	$amaurosis= $dataHis['his_amaurosis'];
	$dolorOjos= $dataHis['his_dolorOjos'];
	$anteojos= $dataHis['his_anteojos'];
	$otrosOjos= $dataHis['his_otrosOjos'];
	$otrosOjosDescribir= $dataHis['his_otrosOjosDescribir'];
	$sordera= $dataHis['his_sordera'];
	$secreciones= $dataHis['his_secreciones'];
	$tinnitus= $dataHis['his_tinnitus'];
	$dolorOidos= $dataHis['his_dolorOidos'];
	$otrosOidos= $dataHis['his_otrosOidos'];
	$otrosOidosDescribir= $dataHis['his_otrosOidosDescribir']; 
	$epistaxis= $dataHis['his_epistaxis'];
	$sinusitis= $dataHis['his_sinusitis'];
	$obstruccion= $dataHis['his_obstruccion'];
	$secrecion= $dataHis['his_secrecion'];
	$halitosis= $dataHis['his_halitosis'];
	$dolorsenos= $dataHis['his_dolorsenos'];
	$otrosNariz= $dataHis['his_otrosNariz'];
	$otrosNarizDescribir= $dataHis['his_otrosNarizDescribir'];
	$lengua= $dataHis['his_lengua'];
	$mucosas= $dataHis['his_mucosas'];
	$encias= $dataHis['his_encias'];
	$dientes= $dataHis['his_dientes'];
	$halitosisBoca= $dataHis['his_halitosisBoca'];
	$otrosBoca= $dataHis['his_otrosBoca'];
	$otrosBocaDescribir= $dataHis['his_otrosBocaDescribir'];
	$dolorGarganta= $dataHis['his_dolorGarganta'];
	$ronquera= $dataHis['his_ronquera'];
	$disfoguia= $dataHis['his_disfoguia'];
	$otrosGarganta= $dataHis['his_otrosGarganta'];
	$otrosGargantaDescribir= $dataHis['his_otrosGargantaDescribir'];
	$dolorRespiratorio= $dataHis['his_dolorRespiratorio'];
	$hemoptisis= $dataHis['his_hemoptisis'];
	$tos= $dataHis['his_tos'];
	$expectoracion= $dataHis['his_expectoracion'];
	$disnea= $dataHis['his_disnea'];
	$silbidos= $dataHis['his_silbidos'];
	$estridor= $dataHis['his_estridor'];
	$otrosRespiratorio= $dataHis['his_otrosRespiratorio'];
	$otrosRespiratorioDescribir= $dataHis['his_otrosRespiratorioDescribir'];
	$apetito= $dataHis['his_apetito'];
	$dolorDigestivo= $dataHis['his_dolorDigestivo'];
	$malestar= $dataHis['his_malestar'];
	$nauseas= $dataHis['his_nauseas'];
	$vomitosDigestivo= $dataHis['his_vomitosDigestivo'];
	$pirosis= $dataHis['his_pirosis'];
	$flatulencias= $dataHis['his_flatulencias'];
	$constipacion= $dataHis['his_constipacion'];
	$heces= $dataHis['his_heces'];
	$parasitos= $dataHis['his_parasitos'];
	$prolapso= $dataHis['his_prolapso'];
	$fistulas= $dataHis['his_fistulas'];
	$hemorroides= $dataHis['his_hemorroides'];
	$polipos= $dataHis['his_polipos'];
	$hernias= $dataHis['his_hernias'];
	$otrosDigestivo= $dataHis['his_otrosDigestivo'];
	$otrosDigestivoDescribir= $dataHis['his_otrosDigestivoDescribir'];
	$dolorCirculatorio= $dataHis['his_dolorCirculatorio'];
	$disneaCirculatorio= $dataHis['his_disneaCirculatorio'];
	$palpitaciones= $dataHis['his_palpitaciones'];
	$desmayos= $dataHis['his_desmayos'];
	$edemasCirculatorio= $dataHis['his_edemasCirculatorio'];
	$otrosCirculatorio= $dataHis['his_otrosCirculatorio'];
	$otrosCirculatorioDescribir= $dataHis['his_otrosCirculatorioDescribir'];
	$apetitoGenito= $dataHis['his_apetitoGenito'];
	$dolorGenito= $dataHis['his_dolorGenito'];
	$malestarGenito= $dataHis['his_malestarGenito'];
	$nauseasGenito= $dataHis['his_nauseasGenito'];
	$vomitosGenito= $dataHis['his_vomitosGenito'];
	$pirosisGenito= $dataHis['his_pirosisGenito'];
	$hecesGenito= $dataHis['his_hecesGenito'];
	$parasitosGenito= $dataHis['his_parasitosGenito'];
	$prolapsoGenito= $dataHis['his_prolapsoGenito'];
	$fistulasGenito= $dataHis['his_fistulasGenito'];
	$otrosGenito= $dataHis['his_otrosGenito'];
	$otrosGenitoDescribir= $dataHis['his_otrosGenitoDescribir'];
	$debilidadMuscular= $dataHis['his_debilidadMuscular'];
	$deformidades= $dataHis['his_deformidades'];
	$doloresMuscular= $dataHis['his_doloresMuscular'];
	$otrasMuscular= $dataHis['his_otrasMuscular'];
	$otrasMuscularDescribir= $dataHis['his_otrasMuscularDescribir'];
	$afectiva= $dataHis['his_afectiva'];
	$intelectual= $dataHis['his_intelectual'];
	$volitiva= $dataHis['his_volitiva'];
	$tics= $dataHis['his_tics'];
	$paralisis= $dataHis['his_paralisis'];
	$convulsionesMental= $dataHis['his_convulsionesMental'];
	$estatica= $dataHis['his_estatica'];
	$dinamica= $dataHis['his_dinamica'];
	$otrosMental= $dataHis['his_otrosMental'];
	$otrosMentalDescribir= $dataHis['his_otrosMentalDescribir'];
	}
?>
 <?php
	// ========================= Buscar la configuracion en tbl_perfil ==========================================================
	$query="SELECT * FROM tbl_perfil WHERE per_doc_id = '$doc_id'";  

	$resultado=mysql_query($query,$dbConn);
	while($dataPer=mysql_fetch_array($resultado))
	{    
	$historiaFamiliar= $dataPer['per_historiaFamiliar'];
	$antecedentesPrenatales= $dataPer['per_antecedentesPrenatales'];
	$periodoNeonatal= $dataPer['per_periodoNeonatal'];
	$alimentacion= $dataPer['per_alimentacion'];
	$desarrollo= $dataPer['per_desarrollo'];
	$habitos= $dataPer['per_habitos'];
	$inmunizaciones= $dataPer['per_inmunizaciones'];
	$contactosTBC= $dataPer['per_contactosTBC'];
	$antecedentesEpi= $dataPer['per_antecedentesEpi'];
	$general= $dataPer['per_general'];
	$piel= $dataPer['per_piel'];
	$cabeza= $dataPer['per_cabeza'];
	$ojos= $dataPer['per_ojos'];
	$oidos= $dataPer['per_oidos'];
	$nariz= $dataPer['per_nariz'];
	$boca= $dataPer['per_boca'];
	$garganta= $dataPer['per_garganta'];
	$respiratorio= $dataPer['per_respiratorio'];
	$digestivo= $dataPer['per_digestivo'];
	$circulatorio= $dataPer['per_circulatorio'];
	$genitourinario= $dataPer['per_genitourinario'];
	$muscularOsteoArticular= $dataPer['per_muscularOsteoArticular'];
	$nerviosoMental= $dataPer['per_nerviosoMental'];
	$estadoGeneralEx= $dataPer['per_estadoGeneralEx'];
	$pielPandiculoEx= $dataPer['per_pielPandiculoEx'];
	$cabezaEx= $dataPer['per_cabezaEx'];
	$ojosEx= $dataPer['per_ojosEx'];
	$oidosEx= $dataPer['per_oidosEx'];
	$rinofaringeEx= $dataPer['per_rinofaringeEx'];
	$bocaEx= $dataPer['per_bocaEx'];
	$cuelloEx= $dataPer['per_cuelloEx'];
	$gangliosEx= $dataPer['per_gangliosEx'];
	$toraxPulmonesEx= $dataPer['per_toraxPulmonesEx'];
	$corazonVasosEx= $dataPer['per_corazonVasosEx'];
	$abdomenEx= $dataPer['per_abdomenEx'];
	$urinarioEx= $dataPer['per_urinarioEx'];
	$genitalesEx= $dataPer['per_genitalesEx'];
	$anoRectoEx= $dataPer['per_anoRectoEx'];
	$huesosEx= $dataPer['per_huesosEx'];
	$neurologicosEx= $dataPer['per_neurologicosEx'];
	$sensorialesEx= $dataPer['per_sensorialesEx'];
	}
?>

  	<form class="form-vertical" id="formHistoria" action="historiaParte4.php">
    <input name="us_id" type="hidden" value="<?php echo $us_id ?>" />
    <?php if ($antecedentesEpi == 1) { ?>
    <h5>Antecedentes epimediologicos - Enfermedades</h5>
		<div class="control-group-inline">
         <?php if ($diarreas == 1) {$diarreas="checked"; } ?>
         <?php if ($vomitosEpi == 1) {$vomitosEpi="checked"; } ?>
         <?php if ($disenterico == 1) {$disenterico="checked"; } ?>
         <?php if ($amibiasis == 1) {$amibiasis="checked"; } ?>
         <?php if ($bilharziosis == 1) {$bilharziosis="checked"; } ?>
         <?php if ($parasitosis == 1) {$parasitosis="checked"; } ?>
         <?php if ($rinofaringitis == 1) {$rinofaringitis="checked"; } ?>
         <?php if ($amigdalitis == 1) {$amigdalitis="checked"; } ?>
         <?php if ($otitis == 1) {$otitis="checked"; } ?>
         <?php if ($bronquitis == 1) {$bronquitis="checked"; } ?>
         <?php if ($neumonia == 1) {$neumonia="checked"; } ?>
         <?php if ($pleuresia == 1) {$pleuresia="checked"; } ?>
         <?php if ($influenza == 1) {$influenza="checked"; } ?>
         <?php if ($tuberculosisEpi == 1) {$tuberculosisEpi="checked"; } ?>
         <?php if ($eritema == 1) {$eritema="checked"; } ?>
         <?php if ($adenitis == 1) {$adenitis="checked"; } ?>
         <?php if ($sifilisEpi == 1) {$sifilisEpi="checked"; } ?>
         <?php if ($varicela == 1) {$varicela="checked"; } ?>
         <?php if ($sarampion == 1) {$sarampion="checked"; } ?>
         <?php if ($tosferina == 1) {$tosferina="checked"; } ?>
         <?php if ($rubeola == 1) {$rubeola="checked"; } ?>
         <?php if ($parotiditis == 1) {$parotiditis="checked"; } ?>
         <?php if ($difteriaEpi == 1) {$difteriaEpi="checked"; } ?>
         <?php if ($tifoidea == 1) {$tifoidea="checked"; } ?>
         <?php if ($paludismo == 1) {$paludismo="checked"; } ?>
         <?php if ($fiebreEpi == 1) {$fiebreEpi="checked"; } ?>
         <?php if ($artritisEpi == 1) {$artritisEpi="checked"; } ?>
         <?php if ($vulvovaginitis == 1) {$vulvovaginitis="checked"; } ?>
         <?php if ($pielEpi == 1) {$pielEpi="checked"; } ?>
         <?php if ($alergiasEpi == 1) {$alergiasEpi="checked"; } ?>
         <?php if ($quirurgicas == 1) {$quirurgicas="checked"; } ?>
         <?php if ($traumatismo == 1) {$traumatismo="checked"; } ?>
         <?php if ($otrosEpimediologicos == 1) {$otrosEpimediologicos="checked"; } ?>
        
            <input type="checkbox" name="diarreas" id="diarreas" value="1" <?php echo $diarreas ?>/> 
            Diarreas &nbsp; &nbsp;
            <input type="checkbox" name="vomitosEpi" id="vomitosEpi" value="1" <?php echo $vomitosEpi ?>/> 
            Vómitos &nbsp; &nbsp;
            <input type="checkbox" name="disenterico" id="disenterico" value="1" <?php echo $disenterico ?>/>
            Sind. Disentérico &nbsp; &nbsp;
            <input type="checkbox" name="amibiasis" id="amibiasis" value="1" <?php echo $amibiasis ?>/>
            Amibiasis &nbsp; &nbsp;
            <input type="checkbox" name="bilharziosis" id="bilharziosis" value="1" <?php echo $bilharziosis ?>/>
            Bilharziosis &nbsp; &nbsp;
            <input type="checkbox" name="parasitosis" id="parasitosis" value="1" <?php echo $parasitosis ?>/>
            Otras Parasitósis &nbsp; &nbsp;
            <input type="checkbox" name="rinofaringitis" id="rinofaringitis" value="1" <?php echo $rinofaringitis ?>/>
            Rinofaringitis &nbsp; &nbsp;
            <input type="checkbox" name="amigdalitis" id="amigdalitis" value="1" <?php echo $amigdalitis ?>/>
            Amigdalitis &nbsp; &nbsp;
            <input type="checkbox" name="otitis" id="otitis" value="1" <?php echo $otitis ?>/>
            Otitis &nbsp; &nbsp;
            <input type="checkbox" name="bronquitis" id="bronquitis" value="1" <?php echo $bronquitis ?>/>
            Bronquitis &nbsp; &nbsp;
             <input type="checkbox" name="neumonia" id="neumonia" value="1" <?php echo $neumonia ?>/>
            Neumonía &nbsp; &nbsp;
            <input type="checkbox" name="pleuresia" id="pleuresia" value="1" <?php echo $pleuresia ?>/>
            Pleuresía &nbsp; &nbsp;
            <input type="checkbox" name="influenza" id="influenza" value="1" <?php echo $influenza ?>/>
            Influenza  &nbsp; &nbsp;
            <input type="checkbox" name="tuberculosisEpi" id="tuberculosisEpi" value="1" <?php echo $tuberculosisEpi ?>/>
            Tuberculosis &nbsp; &nbsp;
            <input type="checkbox" name="eritema" id="eritema" value="1" <?php echo $eritema ?>/>
            Eritema Nudoso &nbsp; &nbsp;
            <input type="checkbox" name="adenitis" id="adenitis" value="1" <?php echo $adenitis ?>/>
            Adenitis Crónica &nbsp; &nbsp;
            <input type="checkbox" name="sifilisEpi" id="sifilisEpi" value="1" <?php echo $sifilisEpi ?>/>
            Sífilis Kahn &nbsp; &nbsp;
            <input type="checkbox" name="varicela" id="varicela" value="1" <?php echo $varicela ?>/>
            Varicela &nbsp; &nbsp;
            <input type="checkbox" name="sarampion" id="sarampion" value="1" <?php echo $sarampion ?>/>
            Sarampión &nbsp; &nbsp;
            <input type="checkbox" name="tosferina" id="tosferina" value="1" <?php echo $tosferina ?>/>
            Tosferina &nbsp; &nbsp;
            <input type="checkbox" name="rubeola" id="rubeola" value="1" <?php echo $rubeola ?>/>
            Rubéola &nbsp; &nbsp;
            <input type="checkbox" name="parotiditis" id="parotiditis" value="1" <?php echo $parotiditis ?>/>
            Parotiditis &nbsp; &nbsp;
            <input type="checkbox" name="difteriaEpi" id="difteriaEpi" value="1" <?php echo $difteriaEpi ?>/>
            Difteria &nbsp; &nbsp;
            <input type="checkbox" name="tifoidea" id="tifoidea" value="1" <?php echo $tifoidea ?>/>
            Tifoidea &nbsp; &nbsp;
             <input type="checkbox" name="paludismo" id="paludismo" value="1" <?php echo $paludismo ?>/>
            Paludismo &nbsp; &nbsp;
            <input type="checkbox" name="fiebreEpi" id="fiebreEpi" value="1" <?php echo $fiebreEpi ?>/>
            Fiebres prolongadas &nbsp; &nbsp;
            <input type="checkbox" name="artritisEpi" id="artritisEpi" value="1" <?php echo $artritisEpi ?>/>
            Artritis (R.A.A.)  &nbsp; &nbsp;
            <input type="checkbox" name="vulvovaginitis" id="vulvovaginitis" value="1" <?php echo $vulvovaginitis ?>/>
            Vulvovaginitis &nbsp; &nbsp;
            <input type="checkbox" name="pielEpi" id="pielEpi" value="1" <?php echo $pielEpi ?>/>
            Enfermedad de la piel &nbsp; &nbsp;
             <input type="checkbox" name="alergiasEpi" id="alergiasEpi" value="1" <?php echo $alergiasEpi ?>/>
            Alergias &nbsp; &nbsp;
            <input type="checkbox" name="quirurgicas" id="quirurgicas" value="1" <?php echo $quirurgicas ?>/>
            Quirurgicas &nbsp; &nbsp;
            <input type="checkbox" name="traumatismo" id="traumatismo" value="1" <?php echo $traumatismo ?>/>
            Traumatismos  &nbsp; &nbsp;
            <input type="checkbox" name="otrosEpimediologicos" id="otrosEpimediologicos" value="1" <?php echo $otrosEpimediologicos ?>/>
            Otras &nbsp; &nbsp;
            <p></p>
            <input name="otrosEpimediologicosDescribir" type="text" class="span4" id="otrosEpimediologicosDescribir"  maxlength="400" placeholder="Otro antecedente" style="width: 97%;" value="<?php echo $otrosEpimediologicosDescribir ?>"/> 
        </div>
        <p></p>
        <?php } ?>
        <?php if ($general == 1) { ?>
        <h5>General</h5>
         <?php if ($progresoPeso == 1) {$progresoPeso="checked"; } ?>
         <?php if ($debilidad == 1) {$debilidad="checked"; } ?>
         <?php if ($fatiga == 1) {$fatiga="checked"; } ?>
         <?php if ($sudores == 1) {$sudores="checked"; } ?>
         <?php if ($otrosGeneral == 1) {$otrosGeneral="checked"; } ?>
         
        <div class="control-group-inline">
	  		<input type="checkbox" name="progresoPeso" id="progresoPeso" value="1" <?php echo $progresoPeso ?>/>
            Progreso de peso y talla &nbsp; &nbsp;
            <input type="checkbox" name="debilidad" id="debilidad" value="1" <?php echo $debilidad ?>/>
            Debilidad &nbsp; &nbsp;
            <input type="checkbox" name="fatiga" id="fatiga" value="1" <?php echo $fatiga ?>/>
            Fatiga &nbsp; &nbsp;
            <input type="checkbox" name="sudores" id="sudores" value="1" <?php echo $sudores ?>/>
            Sudores &nbsp; &nbsp;
            <input type="checkbox" name="otrosGeneral" id="otrosGeneral" value="1" <?php echo $otrosGeneral ?>/>
            Otros &nbsp; &nbsp;
            <p></p>
            <input name="otrosGeneralDescribir" type="text" class="span4" id="otrosGeneralDescribir"  maxlength="400" placeholder="Otro antecedente general" style="width: 97%;" value="<?php echo $otrosGeneralDescribir ?>"/> 
        </div>
        <p></p>
        <?php } ?>
        <?php if ($piel == 1) { ?>
        <h5>Piel</h5>
        <?php if ($dermatosis == 1) {$dermatosis="checked"; } ?>
         <?php if ($prurito == 1) {$prurito="checked"; } ?>
         <?php if ($cianosisPiel == 1) {$cianosisPiel="checked"; } ?>
         <?php if ($ictericia == 1) {$ictericia="checked"; } ?>
         <?php if ($edemas == 1) {$edemas="checked"; } ?>
         <?php if ($otraPiel == 1) {$otraPiel="checked"; } ?>
         
        <div class="control-group-inline">
	  		<input type="checkbox" name="dermatosis" id="dermatosis" value="1" <?php echo $dermatosis ?>/>
            Dermatosis &nbsp; &nbsp;
            <input type="checkbox" name="prurito" id="prurito" value="1" <?php echo $prurito ?>/>
            Prurito &nbsp; &nbsp;
            <input type="checkbox" name="cianosisPiel" id="cianosisPiel" value="1" <?php echo $cianosisPiel ?>/>
            Cianosis &nbsp; &nbsp;
            <input type="checkbox" name="ictericia" id="ictericia" value="1" <?php echo $ictericia ?>/>
            Ictericia &nbsp; &nbsp;
            <input type="checkbox" name="edemas" id="edemas" value="1" <?php echo $edemas ?>/>
            Edemas &nbsp; &nbsp;
            <input type="checkbox" name="otraPiel" id="otraPiel" value="1" <?php echo $otraPiel ?>/>
            Otra &nbsp; &nbsp;
            <p></p>
            <input name="otraPielDescribir" type="text" class="span4" id="otraPielDescribir"  maxlength="400" placeholder="Otro antecedente en la piel" style="width: 97%;" value="<?php echo $otraPielDescribir ?>"/> 
        </div>
        <p></p>
        <?php } ?>
        <?php if ($cabeza == 1) { ?>
        <h5>Cabeza</h5>
         <?php if ($dolor == 1) {$dolor="checked"; } ?>
         <?php if ($mareos == 1) {$mareos="checked"; } ?>
         <?php if ($caida == 1) {$caida="checked"; } ?>
         <?php if ($otrosCabeza == 1) {$otrosCabeza="checked"; } ?>
		 
        <div class="control-group-inline">
	  		<input type="checkbox" name="dolor" id="dolor" value="1" <?php echo $dolor ?>/>
            Dolor &nbsp; &nbsp;
            <input type="checkbox" name="mareos" id="mareos" value="1" <?php echo $mareos ?>/>
            Mareos &nbsp; &nbsp;
            <input type="checkbox" name="caida" id="caida" value="1" <?php echo $caida ?>/>
            Caída del cabello &nbsp; &nbsp;
            <input type="checkbox" name="otrosCabeza" id="otrosCabeza" value="1" <?php echo $otrosCabeza ?>/>
            Otros &nbsp; &nbsp;            
            <p></p>
            <input name="otrosCabezaDescribir" type="text" class="span4" id="otrosCabezaDescribir"  maxlength="400" placeholder="Otro antecedente en la cabeza" style="width: 97%;" value="<?php echo $otrosCabezaDescribir ?>"/> 
        </div>
        <p></p>
        <?php } ?>
        <?php if ($ojos == 1) { ?>
        <h5>Ojos</h5>
         <?php if ($cansancio == 1) {$cansancio="checked"; } ?>
		 <?php if ($diplopia == 1) {$diplopia="checked"; } ?>
		 <?php if ($fotofobia == 1) {$fotofobia="checked"; } ?>
		 <?php if ($lagrimeo == 1) {$lagrimeo="checked"; } ?>
		 <?php if ($nistagmus == 1) {$nistagmus="checked"; } ?>
		 <?php if ($amaurosis == 1) {$amaurosis="checked"; } ?>
		 <?php if ($dolorOjos == 1) {$dolorOjos="checked"; } ?>
		 <?php if ($anteojos == 1) {$anteojos="checked"; } ?>
		 <?php if ($otrosOjos == 1) {$otrosOjos="checked"; } ?>		 
        <div class="control-group-inline">
	  		<input type="checkbox" name="cansancio" id="cansancio" value="1" <?php echo $cansancio ?>/>
            Cansancio &nbsp; &nbsp;
            <input type="checkbox" name="diplopia" id="diplopia" value="1" <?php echo $diplopia ?>/>
            Diplopía &nbsp; &nbsp;
            <input type="checkbox" name="fotofobia" id="fotofobia" value="1" <?php echo $fotofobia ?>/>
            Fotofobia &nbsp; &nbsp;
            <input type="checkbox" name="lagrimeo" id="lagrimeo" value="1" <?php echo $lagrimeo ?>/>
            Lagrimeo &nbsp; &nbsp;
            <input type="checkbox" name="nistagmus" id="nistagmus" value="1" <?php echo $nistagmus ?>/>
            Nistagmus &nbsp; &nbsp;
            <input type="checkbox" name="amaurosis" id="amaurosis" value="1" <?php echo $amaurosis ?>/>
            Amaurosis &nbsp; &nbsp;
            <input type="checkbox" name="dolorOjos" id="dolorOjos" value="1" <?php echo $dolorOjos ?>/>
            Dolor &nbsp; &nbsp;
            <input type="checkbox" name="anteojos" id="anteojos" value="1" <?php echo $anteojos ?>/>
            Anteojos &nbsp; &nbsp;
            <input type="checkbox" name="otrosOjos" id="otrosOjos" value="1" <?php echo $otrosOjos ?>/>
            Otros &nbsp; &nbsp;                           
            <p></p>
            <input name="otrosOjosDescribir" type="text" class="span4" id="otrosOjosDescribir"  maxlength="400" placeholder="Otro antecedente en los ojos" style="width: 97%;" value="<?php echo $otrosOjosDescribir ?>"/> 
        </div>
        <?php } ?>
        <?php if ($oidos == 1) { ?>
        <h5>Oidos</h5>
        <?php if ($sordera == 1) {$sordera="checked"; } ?>
		<?php if ($secreciones == 1) {$secreciones="checked"; } ?>
		<?php if ($tinnitus == 1) {$tinnitus="checked"; } ?>
		<?php if ($dolorOidos == 1) {$dolorOidos="checked"; } ?>
		<?php if ($otrosOidos == 1) {$otrosOidos="checked"; } ?>		
        <div class="control-group-inline">
            <input type="checkbox" name="sordera" id="sordera" value="1" <?php echo $sordera ?>/>
            Sordera &nbsp; &nbsp;
            <input type="checkbox" name="secreciones" id="secreciones" value="1" <?php echo $secreciones ?>/>
            Secreciones &nbsp; &nbsp;
            <input type="checkbox" name="tinnitus" id="tinnitus" value="1" <?php echo $tinnitus ?>/>
            Tinnitus &nbsp; &nbsp;
            <input type="checkbox" name="dolorOidos" id="dolorOidos" value="1" <?php echo $dolorOidos ?>/>
            Dolor &nbsp; &nbsp;
            <input type="checkbox" name="otrosOidos" id="otrosOidos" value="1" <?php echo $otrosOidos ?>/>
            Otros &nbsp; &nbsp;                           
            <p></p>
            <input name="otrosOidosDescribir" type="text" class="span4" id="otrosOidosDescribir"  maxlength="400" placeholder="Otro antecedente en los oidos" style="width: 97%;" value="<?php echo $otrosOidosDescribir ?>"/> 
       </div>
        <p></p>
        <?php } ?>
        <?php if ($nariz == 1) { ?>
        <h5>Nariz</h5>
         <?php if ($epistaxis == 1) {$epistaxis="checked"; } ?>
		 <?php if ($sinusitis == 1) {$sinusitis="checked"; } ?>
		 <?php if ($obstruccion == 1) {$obstruccion="checked"; } ?>
		 <?php if ($secrecion == 1) {$secrecion="checked"; } ?>
		 <?php if ($halitosis == 1) {$halitosis="checked"; } ?>
		 <?php if ($dolorsenos == 1) {$dolorsenos="checked"; } ?>
		 <?php if ($otrosNariz == 1) {$otrosNariz="checked"; } ?>		 
        <div class="control-group-inline">
            <input type="checkbox" name="epistaxis" id="epistaxis" value="1" <?php echo $epistaxis ?>/>
            Epistaxis &nbsp; &nbsp;
            <input type="checkbox" name="sinusitis" id="sinusitis" value="1" <?php echo $sinusitis ?>/>
            Sinusitis &nbsp; &nbsp;
            <input type="checkbox" name="obstruccion" id="obstruccion" value="1" <?php echo $obstruccion ?>/>
            Obstrucción &nbsp; &nbsp;
            <input type="checkbox" name="secrecion" id="secrecion" value="1" <?php echo $secrecion ?>/>
            Secreción &nbsp; &nbsp;
            <input type="checkbox" name="halitosis" id="halitosis" value="1" <?php echo $halitosis ?>/>
            Halitosis Nasal &nbsp; &nbsp;
            <input type="checkbox" name="dolorsenos" id="dolorsenos" value="1" <?php echo $dolorsenos ?>/>
            Dolor senos accesorios &nbsp; &nbsp;
            <input type="checkbox" name="otrosNariz" id="otrosNariz" value="1" <?php echo $otrosNariz ?>/>
            Otros &nbsp; &nbsp;                           
            <p></p>
            <input name="otrosNarizDescribir" type="text" class="span4" id="otrosNarizDescribir"  maxlength="400" placeholder="Otro antecedente en la nariz" style="width: 97%;" value="<?php echo $otrosNarizDescribir ?>"/> 
       </div>
        <p></p>
        <?php } ?>
        <?php if ($boca == 1) { ?>
        <h5>Boca</h5>
        <?php if ($lengua == 1) {$lengua="checked"; } ?>
		 <?php if ($mucosas == 1) {$mucosas="checked"; } ?>
		 <?php if ($encias == 1) {$encias="checked"; } ?>
		 <?php if ($dientes == 1) {$dientes="checked"; } ?>
		 <?php if ($halitosisBoca == 1) {$halitosisBoca="checked"; } ?>
         <?php if ($otrosBoca == 1) {$otrosBoca="checked"; } ?>		 
        <div class="control-group-inline">
            <input type="checkbox" name="lengua" id="lengua" value="1" <?php echo $lengua ?>/>
            Lengua &nbsp; &nbsp;
            <input type="checkbox" name="mucosas" id="mucosas" value="1" <?php echo $mucosas ?>/>
            Mucosas &nbsp; &nbsp;
            <input type="checkbox" name="encias" id="encias" value="1" <?php echo $encias ?>/>
            Encias &nbsp; &nbsp;
            <input type="checkbox" name="dientes" id="dientes" value="1" <?php echo $dientes ?>/>
            Dientes &nbsp; &nbsp;
            <input type="checkbox" name="halitosisBoca" id="halitosisBoca" value="1" <?php echo $halitosisBoca ?>/>
            Halitosis &nbsp; &nbsp;
            <input type="checkbox" name="otrosBoca" id="otrosBoca" value="1" <?php echo $otrosBoca ?>/>
            Otros &nbsp; &nbsp;                           
            <p></p>
            <input name="otrosBocaDescribir" type="text" class="span4" id="otrosBocaDescribir"  maxlength="400" placeholder="Otro antecedente en la boca" style="width: 97%;" value="<?php echo $otrosBocaDescribir ?>"/> 
       </div>
        <p></p>
        <?php } ?>
        <?php if ($garganta == 1) { ?>
        <h5>Garganta</h5>
        <?php if ($dolorGarganta == 1) {$dolorGarganta="checked"; } ?>
		 <?php if ($ronquera == 1) {$ronquera="checked"; } ?>
		 <?php if ($disfoguia == 1) {$disfoguia="checked"; } ?>
		 <?php if ($otrosGarganta == 1) {$otrosGarganta="checked"; } ?>		
        <div class="control-group-inline">
            <input type="checkbox" name="dolorGarganta" id="dolorGarganta" value="1" <?php echo $dolorGarganta ?>/>
            Dolor &nbsp; &nbsp;
            <input type="checkbox" name="ronquera" id="ronquera" value="1" <?php echo $ronquera ?>/>
            Ronquera &nbsp; &nbsp;
            <input type="checkbox" name="disfoguia" id="disfoguia" value="1" <?php echo $disfoguia ?>/>
            Disfoguia &nbsp; &nbsp;
            <input type="checkbox" name="otrosGarganta" id="otrosGarganta" value="1" <?php echo $otrosGarganta ?>/>
            Otros &nbsp; &nbsp;                           
            <p></p>
            <input name="otrosGargantaDescribir" type="text" class="span4" id="otrosGargantaDescribir"  maxlength="400" placeholder="Otro antecedente en la garganta" style="width: 97%;" value="<?php echo $otrosGargantaDescribir ?>"/> 
       </div>
        <p></p>
        <?php } ?>
        <?php if ($respiratorio == 1) {  ?>
        <h5>Respiratorio</h5>
         <?php if ($dolorRespiratorio == 1) {$dolorRespiratorio="checked"; } ?>
		 <?php if ($hemoptisis == 1) {$hemoptisis="checked"; } ?>
		 <?php if ($tos == 1) {$tos="checked"; } ?>
		 <?php if ($expectoracion == 1) {$expectoracion="checked"; } ?>
		 <?php if ($disnea == 1) {$disnea="checked"; } ?>
		 <?php if ($silbidos == 1) {$silbidos="checked"; } ?>
		 <?php if ($estridor == 1) {$estridor="checked"; } ?>
		 <?php if ($otrosRespiratorio == 1) {$otrosRespiratorio="checked"; } ?>		 
        <div class="control-group-inline">
            <input type="checkbox" name="dolorRespiratorio" id="dolorRespiratorio" value="1" <?php echo $dolorRespiratorio ?>/>
            Dolor torácico &nbsp; &nbsp;
            <input type="checkbox" name="hemoptisis" id="hemoptisis" value="1" <?php echo $hemoptisis ?>/>
            Hemoptisis &nbsp; &nbsp;
            <input type="checkbox" name="tos" id="tos" value="1" <?php echo $tos ?>/>
            Tos &nbsp; &nbsp;
            <input type="checkbox" name="expectoracion" id="expectoracion" value="1" <?php echo $expectoracion ?>/>
            Expectoración &nbsp; &nbsp;        
            <input type="checkbox" name="disnea" id="disnea" value="1" <?php echo $disnea ?>/>
            Disnea &nbsp; &nbsp;
            <input type="checkbox" name="silbidos" id="silbidos" value="1" <?php echo $silbidos ?>/>
            Silbidos y Roncus &nbsp; &nbsp;
            <input type="checkbox" name="estridor" id="estridor" value="1" <?php echo $estridor ?>/>
            Estridor &nbsp; &nbsp;
            <input type="checkbox" name="otrosRespiratorio" id="otrosRespiratorio" value="1" <?php echo $otrosRespiratorio ?>/>
            Otros &nbsp; &nbsp;                    
            <p></p>
            <input name="otrosRespiratorioDescribir" type="text" class="span4" id="otrosRespiratorioDescribir"  maxlength="400" placeholder="Otro antecedente respiratorio" style="width: 97%;" value="<?php echo $otrosRespiratorioDescribir ?>"/>
       </div>
        <p></p>
        <?php } ?>
        <?php if ($digestivo == 1) {  ?>
        <h5>Digestivo</h5>
        <?php if ($apetito == 1) {$apetito="checked"; } ?>
		 <?php if ($dolorDigestivo == 1) {$dolorDigestivo="checked"; } ?>
		 <?php if ($malestar == 1) {$malestar="checked"; } ?>
		 <?php if ($nauseas == 1) {$nauseas="checked"; } ?>
		 <?php if ($vomitosDigestivo == 1) {$vomitosDigestivo="checked"; } ?>	
		 <?php if ($pirosis == 1) {$pirosis="checked"; } ?>
		 <?php if ($flatulencias == 1) {$flatulencias="checked"; } ?>
		 <?php if ($constipacion == 1) {$constipacion="checked"; } ?>
		 <?php if ($heces == 1) {$heces="checked"; } ?>
		 <?php if ($parasitos == 1) {$parasitos="checked"; } ?>	
		 <?php if ($prolapso == 1) {$prolapso="checked"; } ?>
		 <?php if ($fistulas == 1) {$fistulas="checked"; } ?>
		 <?php if ($hemorroides == 1) {$hemorroides="checked"; } ?>
		 <?php if ($polipos == 1) {$polipos="checked"; } ?>
		 <?php if ($hernias == 1) {$hernias="checked"; } ?>		
		 <?php if ($otrosDigestivo == 1) {$otrosDigestivo="checked"; } ?>			 
        <div class="control-group-inline">
            <input type="checkbox" name="apetito" id="apetito" value="1" <?php echo $apetito ?>/>
            Apetito &nbsp; &nbsp;
            <input type="checkbox" name="dolorDigestivo" id="dolorDigestivo" value="1" <?php echo $dolorDigestivo ?>/>
            Dolor &nbsp; &nbsp;
            <input type="checkbox" name="malestar" id="malestar" value="1" <?php echo $malestar ?>/>
            Malestar &nbsp; &nbsp;
            <input type="checkbox" name="nauseas" id="nauseas" value="1" <?php echo $nauseas ?>/>
            Náuseas &nbsp; &nbsp;        
            <input type="checkbox" name="vomitosDigestivo" id="vomitosDigestivo" value="1" <?php echo $vomitosDigestivo ?>/>
            Vómitos &nbsp; &nbsp;
            <input type="checkbox" name="pirosis" id="pirosis" value="1" <?php echo $pirosis ?>/>
            Pirosis &nbsp; &nbsp;
            <input type="checkbox" name="flatulencias" id="flatulencias" value="1" <?php echo $flatulencias ?>/>
            Flatulencias &nbsp; &nbsp;
            <input type="checkbox" name="constipacion" id="constipacion" value="1" <?php echo $constipacion ?>/>
            Constipación &nbsp; &nbsp;  
            <input type="checkbox" name="heces" id="heces" value="1" <?php echo $heces ?>/>
            Heces (Caracteres) &nbsp; &nbsp;
            <input type="checkbox" name="parasitos" id="parasitos" value="1" <?php echo $parasitos ?>/>
            Parásitos &nbsp; &nbsp;
            <input type="checkbox" name="prolapso" id="prolapso" value="1" <?php echo $prolapso ?>/>
            Prolapso &nbsp; &nbsp;
            <input type="checkbox" name="fistulas" id="fistulas" value="1" <?php echo $fistulas ?>/>
            Fistulas &nbsp; &nbsp;        
            <input type="checkbox" name="hemorroides" id="hemorroides" value="1" <?php echo $hemorroides ?>/>
            Hemorroides &nbsp; &nbsp;
            <input type="checkbox" name="polipos" id="polipos" value="1" <?php echo $polipos ?>/>
            Pólipos &nbsp; &nbsp;
            <input type="checkbox" name="hernias" id="hernias" value="1" <?php echo $hernias ?>/>
            Hernias &nbsp; &nbsp;
            <input type="checkbox" name="otrosDigestivo" id="otrosDigestivo" value="1" <?php echo $otrosDigestivo ?>/>
            Otros &nbsp; &nbsp;                    
            <p></p>
            <input name="otrosDigestivoDescribir" type="text" class="span4" id="otrosDigestivoDescribir"  maxlength="400" placeholder="Otro antecedente digestivo" style="width: 97%;" value="<?php echo $otrosDigestivoDescribir ?>"/>
       </div>
        <p></p>
        <?php } ?>
        <?php if ($circulatorio == 1) { ?>
        <h5>Circulatorio</h5>
         <?php if ($dolorCirculatorio == 1) {$dolorCirculatorio="checked"; } ?>	
		 <?php if ($disneaCirculatorio == 1) {$disneaCirculatorio="checked"; } ?>	 
		 <?php if ($palpitaciones == 1) {$palpitaciones="checked"; } ?>	
		 <?php if ($desmayos == 1) {$desmayos="checked"; } ?>	 
		 <?php if ($edemasCirculatorio == 1) {$edemasCirculatorio="checked"; } ?>	
		 <?php if ($otrosCirculatorio == 1) {$otrosCirculatorio="checked"; } ?>	 		 
        <div class="control-group-inline">
            <input type="checkbox" name="dolorCirculatorio" id="dolorCirculatorio" value="1" <?php echo $dolorCirculatorio ?>/>
            Dolor &nbsp; &nbsp;
            <input type="checkbox" name="disneaCirculatorio" id="disneaCirculatorio" value="1" <?php echo $disneaCirculatorio ?>/>
            Disnea &nbsp; &nbsp;
            <input type="checkbox" name="palpitaciones" id="palpitaciones" value="1" <?php echo $palpitaciones ?>/>
            Palpitaciones &nbsp; &nbsp;
            <input type="checkbox" name="desmayos" id="desmayos" value="1" <?php echo $desmayos ?>/>
            Desmayos &nbsp; &nbsp;        
            <input type="checkbox" name="edemasCirculatorio" id="edemasCirculatorio" value="1" <?php echo $edemasCirculatorio ?>/>
            Edemas &nbsp; &nbsp;
            <input type="checkbox" name="otrosCirculatorio" id="otrosCirculatorio" value="1" <?php echo $otrosCirculatorio ?>/>
            Otros &nbsp; &nbsp;                    
            <p></p>
            <input name="otrosCirculatorioDescribir" type="text" class="span4" id="otrosCirculatorioDescribir"  maxlength="400" placeholder="Otro antecedente circulatorio" style="width: 97%;" value="<?php echo $otrosCirculatorioDescribir ?>"/>
       </div>
        <p></p>
        <?php } ?>
        <?php if ($genitourinario == 1) { ?>
         <h5>Genitourinario</h5>
         <?php if ($apetitoGenito == 1) {$apetitoGenito="checked"; } ?>	
		 <?php if ($dolorGenito == 1) {$dolorGenito="checked"; } ?>	 
		 <?php if ($malestarGenito == 1) {$malestarGenito="checked"; } ?>	
		 <?php if ($nauseasGenito == 1) {$nauseasGenito="checked"; } ?>
		 <?php if ($vomitosGenito == 1) {$vomitosGenito="checked"; } ?>	
		 <?php if ($pirosisGenito == 1) {$pirosisGenito="checked"; } ?>
		 <?php if ($hecesGenito == 1) {$hecesGenito="checked"; } ?>	
		 <?php if ($parasitosGenito == 1) {$parasitosGenito="checked"; } ?>
		 <?php if ($prolapsoGenito == 1) {$prolapsoGenito="checked"; } ?>
		 <?php if ($fistulasGenito == 1) {$fistulasGenito="checked"; } ?>
		 <?php if ($otrosGenito == 1) {$otrosGenito="checked"; } ?>        
        <div class="control-group-inline">
            <input type="checkbox" name="apetitoGenito" id="apetitoGenito" value="1" <?php echo $apetitoGenito ?>/>
            Apetito &nbsp; &nbsp;
            <input type="checkbox" name="dolorGenito" id="dolorGenito" value="1" <?php echo $dolorGenito ?>/>
            Dolor &nbsp; &nbsp;
            <input type="checkbox" name="malestarGenito" id="malestarGenito" value="1" <?php echo $malestarGenito ?>/>
            Malestar &nbsp; &nbsp;
            <input type="checkbox" name="nauseasGenito" id="nauseasGenito" value="1" <?php echo $nauseasGenito ?>/>
            Náuseas &nbsp; &nbsp;        
            <input type="checkbox" name="vomitosGenito" id="vomitosGenito" value="1" <?php echo $vomitosGenito ?>/>
            Vómitos &nbsp; &nbsp;
            <input type="checkbox" name="pirosisGenito" id="pirosisGenito" value="1" <?php echo $pirosisGenito ?>/>
            Pirosis &nbsp; &nbsp; 
            <input type="checkbox" name="hecesGenito" id="hecesGenito" value="1" <?php echo $hecesGenito ?>/>
            Heces (Caracteres) &nbsp; &nbsp;
            <input type="checkbox" name="parasitosGenito" id="parasitosGenito" value="1" <?php echo $parasitosGenito ?>/>
            Parásitos &nbsp; &nbsp;
            <input type="checkbox" name="prolapsoGenito" id="prolapsoGenito" value="1" <?php echo $prolapsoGenito ?>/>
            Prolapso &nbsp; &nbsp;
            <input type="checkbox" name="fistulasGenito" id="fistulasGenito" value="1" <?php echo $fistulasGenito ?>/>
            Fistulas &nbsp; &nbsp;        
            <input type="checkbox" name="otrosGenito" id="otrosGenito" value="1" <?php echo $otrosGenito ?>/>
            Otros &nbsp; &nbsp;                   
            <p></p>
            <input name="otrosGenitoDescribir" type="text" class="span4" id="otrosGenitoDescribir"  maxlength="400" placeholder="Otro antecedente genitourinario" style="width: 97%;" value="<?php echo $otrosGenitoDescribir ?>"/>
       </div>
        <p></p>
        <?php } ?>
        <?php if ($muscularOsteoArticular == 1) { ?>
        <h5>Muscular y osteo-articular</h5>
         <?php if ($debilidadMuscular == 1) {$debilidadMuscular="checked"; } ?>
         <?php if ($deformidades == 1) {$deformidades="checked"; } ?>
         <?php if ($doloresMuscular == 1) {$doloresMuscular="checked"; } ?>
         <?php if ($otrasMuscular == 1) {$otrasMuscular="checked"; } ?>		 
		<div class="control-group-inline">
            <input type="checkbox" name="debilidadMuscular" id="debilidadMuscular" value="1" <?php echo $debilidadMuscular ?>/>
            Debilidad &nbsp; &nbsp;
            <input type="checkbox" name="deformidades" id="deformidades" value="1" <?php echo $deformidades ?>/>
            Deformidades &nbsp; &nbsp;
            <input type="checkbox" name="doloresMuscular" id="doloresMuscular" value="1" <?php echo $doloresMuscular ?>/>
            Dolores &nbsp; &nbsp;
            <input type="checkbox" name="otrasMuscular" id="otrasMuscular" value="1" <?php echo $otrasMuscular ?>/>
            Otras &nbsp; &nbsp;
            <p></p>
            <input name="otrasMuscularDescribir" type="text" class="span4" id="otrasMuscularDescribir"  maxlength="400" placeholder="Otro antecedente muscular" style="width: 97%;" value="<?php echo $otrasMuscularDescribir ?>"/>
        </div>
        <p></p>
        <?php } ?>
        <?php if ($nerviosoMental == 1) { ?>
         <h5>Nervioso y mental</h5>
         <?php if ($afectiva == 1) {$afectiva="checked"; } ?>
         <?php if ($intelectual == 1) {$intelectual="checked"; } ?>
         <?php if ($volitiva == 1) {$volitiva="checked"; } ?>
         <?php if ($tics == 1) {$tics="checked"; } ?>
         <?php if ($paralisis == 1) {$paralisis="checked"; } ?>
         <?php if ($convulsionesMental == 1) {$convulsionesMental="checked"; } ?>
         <?php if ($estatica == 1) {$estatica="checked"; } ?>
         <?php if ($dinamica == 1) {$dinamica="checked"; } ?>
         <?php if ($otrosMental == 1) {$otrosMental="checked"; } ?>

        <div class="control-group-inline">
	  		<input type="checkbox" name="afectiva" id="afectiva" value="1" <?php echo $afectiva ?>/>
            Esfera afectiva &nbsp; &nbsp;
            <input type="checkbox" name="intelectual" id="intelectual" value="1" <?php echo $intelectual ?>/>
            Esfera intelectual &nbsp; &nbsp;
            <input type="checkbox" name="volitiva" id="volitiva" value="1" <?php echo $volitiva ?>/>
            Esfera volitiva &nbsp; &nbsp;
            <input type="checkbox" name="tics" id="tics" value="1" <?php echo $tics ?>/>
            Tics &nbsp; &nbsp;
            <input type="checkbox" name="paralisis" id="paralisis" value="1" <?php echo $paralisis ?>/>
            Parálisis &nbsp; &nbsp;
            <input type="checkbox" name="convulsionesMental" id="convulsionesMental" value="1" <?php echo $convulsionesMental ?>/>
            Convulsiones &nbsp; &nbsp;
            <input type="checkbox" name="estatica" id="estatica" value="1" <?php echo $estatica ?>/>
            Estática &nbsp; &nbsp;
            <input type="checkbox" name="dinamica" id="dinamica" value="1" <?php echo $dinamica ?>/>
            Dinámica &nbsp; &nbsp;
            <input type="checkbox" name="otrosMental" id="otrosMental" value="1" <?php echo $otrosMental ?>/>
            Otros &nbsp; &nbsp;
            <p></p>
            <input name="otrosMentalDescribir" type="text" class="span4" id="otrosMentalDescribir"  maxlength="400" placeholder="Otro antecedente nervioso" style="width: 97%;" value="<?php echo $otrosMentalDescribir ?>"/>
        </div>
        <p></p>
        <?php } ?>
		<div class="control-group">         
			<button class="btn btn-primary" type="submit" id="enviar">Guardar</button>
			<button class="btn btn-default" type="reset" id="cancelar">Cancelar</button>
		</div>
        
   </form> <!--cierre del formulario !-->

	 <!-- ================= mensajes de EXITO o de ERROR===========================================================  !-->
     <div class="alert alert-success mensaje_form" style="display: none" id="exito1">
		<button data-dismiss="alert" class="close" type="button">x</button>
		<strong>MENSAJE!</strong> <span class="textmensaje">Registro exitoso</span>          
	 </div> 
     
     <div class="alert alert-success mensaje_form" style="display: none" id="exito2">
		<button data-dismiss="alert" class="close" type="button">x</button>
		<strong>MENSAJE!</strong> <span class="textmensaje">Actualización exitosa</span>          
	 </div>       	 
      
	 <div class="alert alert-danger mensaje_form" style="display: none" id="error1">
		<button data-dismiss="alert" class="close" type="button">x</button>
		<strong>MENSAJE!</strong> <span class="textmensaje">Debe elegir un paciente registrado</span>
	 </div>
     
</div><!--cierre de spam de formulario !-->
        </div>        
      </div>
    </div>
  </section>
  <?php  	//}    ?>
    <!-- .................................... $footer .................................... -->
  <?php include "headers/otrofooter.php"; ?>