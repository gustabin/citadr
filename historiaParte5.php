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
		$('#titulo').html("inicio / historia clinica / parte V");
		//$('#contenido').load('registrarDrVista.php');		
		 
	});
	
 //Metodo para cargar los datos personales
    $("body").on('submit', '#formHistoria', function(event) {
		event.preventDefault()
		if ($('#formHistoria').valid()) {
			$.ajax({
				type: "POST",
				url: "historia_procesar_parte5.php",
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
						window.location.href='historiaLista.php?id=<?php echo $us_id?>'; 
					  }, 1000);
					}
					
					if (respuesta.exito == 2) {
						$('#exito2').show();
						setTimeout(function() {
						$('#exito2').hide();
						window.location.href='historiaLista.php?id=<?php echo $us_id?>'; 
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
        <small>Parte V</small>
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
	$circunferenciaTorax= $dataHis['his_circunferenciaTorax'];
	$forma= $dataHis['his_forma'];
	$simetria= $dataHis['his_simetria'];
	$expansion= $dataHis['his_expansion'];
	$respiracionTorax= $dataHis['his_respiracionTorax'];
	$disneaTorax= $dataHis['his_disneaTorax'];
	$palpacion= $dataHis['his_palpacion'];
	$percusion= $dataHis['his_percusion'];
	$auscultacion= $dataHis['his_auscultacion'];
	$radioscopia= $dataHis['his_radioscopia'];
	$otrasTorax= $dataHis['his_otrasTorax'];
	$otrasToraxDescribir= $dataHis['his_otrasToraxDescribir'];
	$region= $dataHis['his_region'];
	$latido= $dataHis['his_latido'];
	$thrill= $dataHis['his_thrill'];
	$ritmo= $dataHis['his_ritmo'];
	$ruidos= $dataHis['his_ruidos'];
	$soplos= $dataHis['his_soplos'];
	$tension= $dataHis['his_tension'];
	$pulso= $dataHis['his_pulso'];
	$vasos= $dataHis['his_vasos'];
	$otrosCorazon= $dataHis['his_otrosCorazon'];
	$otrosCorazonDescribir= $dataHis['his_otrosCorazonDescribir'];
	$circunferenciaAbdomen= $dataHis['his_circunferenciaAbdomen'];
	$aspecto= $dataHis['his_aspecto'];
	$peristalsis= $dataHis['his_peristalsis'];
	$cicatrices= $dataHis['his_cicatrices'];
	$dolorAbdomen= $dataHis['his_dolorAbdomen'];
	$hiparestesia= $dataHis['his_hiparestesia'];
	$contractura= $dataHis['his_contractura'];
	$defensa= $dataHis['his_defensa'];
	$tumoraciones= $dataHis['his_tumoraciones'];
	$ascitis= $dataHis['his_ascitis'];
	$higado= $dataHis['his_higado'];
	$bazo= $dataHis['his_bazo'];
	$hernia= $dataHis['his_hernia'];
	$otrosAbdomen= $dataHis['his_otrosAbdomen'];
	$otrosAbdomenDescribir= $dataHis['his_otrosAbdomenDescribir'];
	$rinones= $dataHis['his_rinones'];
	$puntos= $dataHis['his_puntos'];
	$miccion= $dataHis['his_miccion'];
	$orina= $dataHis['his_orina'];
	$dolorUrinario= $dataHis['his_dolorUrinario'];
	$otroUrinario= $dataHis['his_otroUrinario']; 
	$dolorUrinarioDescribir= $dataHis['his_dolorUrinarioDescribir'];
	$cicatricesGen= $dataHis['his_cicatricesGen'];
	$lesionesGen= $dataHis['his_lesionesGen'];
	$secrecionesGen= $dataHis['his_secrecionesGen'];
	$escroto= $dataHis['his_escroto'];
	$epididimo= $dataHis['his_epididimo'];
	$conducto= $dataHis['his_conducto'];
	$testiculos= $dataHis['his_testiculos'];
	$prostata= $dataHis['his_prostata'];
	$vesiculos= $dataHis['his_vesiculos'];
	$ovarios= $dataHis['his_ovarios'];
	$externos= $dataHis['his_externos'];
	$otrosGen= $dataHis['his_otrosGen'];
	$otrosGenDescribir= $dataHis['his_otrosGenDescribir'];
	$fisura= $dataHis['his_fisura'];
	$fistula= $dataHis['his_fistula'];
	$prolapsoAno= $dataHis['his_prolapsoAno'];
	$esfinterAno= $dataHis['his_esfinterAno'];
	$tumoracionesAno= $dataHis['his_tumoracionesAno'];
	$hemorroidesAno= $dataHis['his_hemorroidesAno'];
	$eritemaAno= $dataHis['his_eritemaAno'];
	$tacto= $dataHis['his_tacto'];
	$rectoscopia= $dataHis['his_rectoscopia'];
	$otrosAno= $dataHis['his_otrosAno'];
	$otrosAnoDescribir= $dataHis['his_otrosAnoDescribir'];
	$deformidadesHuesos= $dataHis['his_deformidadesHuesos'];
	$inflamacion= $dataHis['his_inflamacion'];
	$epitisitis= $dataHis['his_epitisitis'];
	$sensibilidad= $dataHis['his_sensibilidad'];
	$limitacion= $dataHis['his_limitacion'];
	$masas= $dataHis['his_masas'];
	$dedos= $dataHis['his_dedos'];
	$otrosHuesos= $dataHis['his_otrosHuesos'];
	$otrosHuesosDescribir= $dataHis['his_otrosHuesosDescribir'];
	$motilidad= $dataHis['his_motilidad'];
	$reflejos= $dataHis['his_reflejos'];
	$objetiva= $dataHis['his_objetiva'];
	$coordinacion= $dataHis['his_coordinacion'];
	$troficos= $dataHis['his_troficos'];
	$lenguaje= $dataHis['his_lenguaje'];
	$escritura= $dataHis['his_escritura'];
	$orientacion= $dataHis['his_orientacion'];
	$psiquismo= $dataHis['his_psiquismo'];
	$otrosNeu= $dataHis['his_otrosNeu'];
	$otrosNeuDescribir= $dataHis['his_otrosNeuDescribir'];
	$visionSen= $dataHis['his_visionSen'];
	$audicionSen= $dataHis['his_audicionSen'];
	$olorSen= $dataHis['his_olorSen'];
	$gustoSen= $dataHis['his_gustoSen'];
	$otrosSen= $dataHis['his_otrosSen'];
	$otrosSenDescribir= $dataHis['his_otrosSenDescribir'];
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
  	<form class="form-vertical" id="formHistoria">
    	<input name="us_id" type="hidden" value="<?php echo $us_id ?>" />
        <?php if ($toraxPulmonesEx == 1) { ?>
       	<h5>Torax y pulmones</h5>
		<div class="control-group-inline">
        <?php if ($circunferenciaTorax == 1) {$circunferenciaTorax="checked"; } ?>
        <?php if ($forma == 1) {$forma="checked"; } ?>
        <?php if ($simetria == 1) {$simetria="checked"; } ?>
        <?php if ($expansion == 1) {$expansion="checked"; } ?>
        <?php if ($respiracionTorax == 1) {$respiracionTorax="checked"; } ?>
        <?php if ($disneaTorax == 1) {$disneaTorax="checked"; } ?>
        <?php if ($palpacion == 1) {$palpacion="checked"; } ?>
        <?php if ($percusion == 1) {$percusion="checked"; } ?>
        <?php if ($auscultacion == 1) {$auscultacion="checked"; } ?>
        <?php if ($radioscopia == 1) {$radioscopia="checked"; } ?>
        <?php if ($otrasTorax == 1) {$otrasTorax="checked"; } ?>	

            <input type="checkbox" name="circunferenciaTorax" id="circunferenciaTorax" value="1" <?php echo $circunferenciaTorax ?>/> 
            Circunferencia &nbsp; &nbsp;
            <input type="checkbox" name="forma" id="forma" value="1" <?php echo $forma ?>/> 
            Forma &nbsp; &nbsp;
            <input type="checkbox" name="simetria" id="simetria" value="1" <?php echo $simetria ?>/> 
            Simetría &nbsp; &nbsp;
            <input type="checkbox" name="expansion" id="expansion" value="1" <?php echo $expansion ?>/> 
            Expansión &nbsp; &nbsp;
            <input type="checkbox" name="respiracionTorax" id="respiracionTorax" value="1" <?php echo $respiracionTorax ?>/>
            Respiración (tipo - ritmo y frecuencia) &nbsp; &nbsp;
            <input type="checkbox" name="disneaTorax" id="disneaTorax" value="1" <?php echo $disneaTorax ?>/>
            Disnea &nbsp; &nbsp;
            <input type="checkbox" name="palpacion" id="palpacion" value="1" <?php echo $palpacion ?>/>
            Palpación &nbsp; &nbsp;
            <input type="checkbox" name="percusion" id="percusion" value="1" <?php echo $percusion ?>/>
            Percusión &nbsp; &nbsp;
            <input type="checkbox" name="auscultacion" id="auscultacion" value="1" <?php echo $auscultacion ?>/>
            Auscultación &nbsp; &nbsp;
            <input type="checkbox" name="radioscopia" id="radioscopia" value="1" <?php echo $radioscopia ?>/>
            Radioscopia &nbsp; &nbsp;
            <input type="checkbox" name="otrasTorax" id="otrasTorax" value="1" <?php echo $otrasTorax ?>/>
            Otras &nbsp; &nbsp;
            <p></p>
            <input name="otrasToraxDescribir" type="text" class="span4" id="otrasToraxDescribir"  maxlength="400" placeholder="Otro antecedente en torax y pulmones" style="width: 97%;" value="<?php echo $otrasToraxDescribir ?>"/> 
        </div>
        <p></p>
        <?php } ?>
        <?php if ($corazonVasosEx == 1) { ?>
        <h5>Corazón y vasos</h5>
        <div class="control-group-inline">
        <?php if ($region == 1) {$region="checked"; } ?>
        <?php if ($latido == 1) {$latido="checked"; } ?>
        <?php if ($thrill == 1) {$thrill="checked"; } ?>
        <?php if ($ritmo == 1) {$ritmo="checked"; } ?>
        <?php if ($ruidos == 1) {$ruidos="checked"; } ?>
        <?php if ($soplos == 1) {$soplos="checked"; } ?>
        <?php if ($tension == 1) {$tension="checked"; } ?>
        <?php if ($pulso == 1) {$pulso="checked"; } ?>
        <?php if ($vasos == 1) {$vasos="checked"; } ?>
        <?php if ($otrosCorazon == 1) {$otrosCorazon="checked"; } ?>
       
	  		<input type="checkbox" name="region" id="region" value="1" <?php echo $region ?>/>
            Región precordial &nbsp; &nbsp;
            <input type="checkbox" name="latido" id="latido" value="1" <?php echo $latido ?>/>
            Latido de la punta &nbsp; &nbsp;
            <input type="checkbox" name="thrill" id="thrill" value="1" <?php echo $thrill ?>/>
            Thrill &nbsp; &nbsp;
            <input type="checkbox" name="ritmo" id="ritmo" value="1" <?php echo $ritmo ?>/>
            Ritmo &nbsp; &nbsp;
            <input type="checkbox" name="ruidos" id="ruidos" value="1" <?php echo $ruidos ?>/>
            Ruidos &nbsp; &nbsp;
            <input type="checkbox" name="soplos" id="soplos" value="1" <?php echo $soplos ?>/>
            Soplos &nbsp; &nbsp;
            <input type="checkbox" name="tension" id="tension" value="1" <?php echo $tension ?>/>
            Tensión arterial &nbsp; &nbsp;
            <input type="checkbox" name="pulso" id="pulso" value="1" <?php echo $pulso ?>/>
            Pulso &nbsp; &nbsp;
            <input type="checkbox" name="vasos" id="vasos" value="1" <?php echo $vasos ?>/>
            Vasos periféricos &nbsp; &nbsp;
            <input type="checkbox" name="otrosCorazon" id="otrosCorazon" value="1" <?php echo $otrosCorazon ?>/>
            Otros &nbsp; &nbsp;
            <p></p>
            <input name="otrosCorazonDescribir" type="text" class="span4" id="otrosCorazonDescribir"  maxlength="400" placeholder="Otro antecedente en corazon y vasos" style="width: 97%;" value="<?php echo $otrosCorazonDescribir ?>"/> 
        </div>
        <p></p>
        <?php } ?>
        <?php if ($abdomenEx == 1) {  ?>
        <h5>Abdomen</h5>
        <div class="control-group-inline">
        <?php if ($circunferenciaAbdomen == 1) {$circunferenciaAbdomen="checked"; } ?>
        <?php if ($aspecto == 1) {$aspecto="checked"; } ?>
        <?php if ($peristalsis == 1) {$peristalsis="checked"; } ?>
        <?php if ($cicatrices == 1) {$cicatrices="checked"; } ?>
        <?php if ($dolorAbdomen == 1) {$dolorAbdomen="checked"; } ?>
        <?php if ($hiparestesia == 1) {$hiparestesia="checked"; } ?>
        <?php if ($contractura == 1) {$contractura="checked"; } ?>
        <?php if ($defensa == 1) {$defensa="checked"; } ?>
        <?php if ($tumoraciones == 1) {$tumoraciones="checked"; } ?>
        <?php if ($ascitis == 1) {$ascitis="checked"; } ?>
        <?php if ($higado == 1) {$higado="checked"; } ?>
        <?php if ($bazo == 1) {$bazo="checked"; } ?>
        <?php if ($hernia == 1) {$hernia="checked"; } ?>
        <?php if ($otrosAbdomen == 1) {$otrosAbdomen="checked"; } ?>
        
	  		<input type="checkbox" name="circunferenciaAbdomen" id="circunferenciaAbdomen" value="1" <?php echo $circunferenciaAbdomen ?>/>
            Circunferencia &nbsp; &nbsp;
            <input type="checkbox" name="aspecto" id="aspecto" value="1" <?php echo $aspecto ?>/>
            Aspecto &nbsp; &nbsp;
            <input type="checkbox" name="peristalsis" id="peristalsis" value="1" <?php echo $peristalsis ?>/>
            Peristalsis &nbsp; &nbsp;
            <input type="checkbox" name="cicatrices" id="cicatrices" value="1" <?php echo $cicatrices ?>/>
            Cicatrices &nbsp; &nbsp; 
            <input type="checkbox" name="dolorAbdomen" id="dolorAbdomen" value="1" <?php echo $dolorAbdomen ?>/>
            Dolor &nbsp; &nbsp;
            <input type="checkbox" name="hiparestesia" id="hiparestesia" value="1" <?php echo $hiparestesia ?>/>
            Hiparestesia &nbsp; &nbsp;
            <input type="checkbox" name="contractura" id="contractura" value="1" <?php echo $contractura ?>/>
            Contractura &nbsp; &nbsp;
            <input type="checkbox" name="defensa" id="defensa" value="1" <?php echo $defensa ?>/>
            Defensa &nbsp; &nbsp;   
            <input type="checkbox" name="tumoraciones" id="tumoraciones" value="1" <?php echo $tumoraciones ?>/>
            Tumoraciones &nbsp; &nbsp;
            <input type="checkbox" name="ascitis" id="ascitis" value="1" <?php echo $ascitis ?>/>
            Ascitis adiposo &nbsp; &nbsp;
            <input type="checkbox" name="higado" id="higado" value="1" <?php echo $higado ?>/>
            Higado &nbsp; &nbsp;
            <input type="checkbox" name="bazo" id="bazo" value="1" <?php echo $bazo ?>/>
            Bazo &nbsp; &nbsp; 
            <input type="checkbox" name="hernia" id="hernia" value="1" <?php echo $hernia ?>/>
            Hernia &nbsp; &nbsp;
            <input type="checkbox" name="otrosAbdomen" id="otrosAbdomen" value="1" <?php echo $otrosAbdomen ?>/>          
            Otros &nbsp; &nbsp;    
            <p></p>
            <input name="otrosAbdomenDescribir" type="text" class="span4" id="otrosAbdomenDescribir"  maxlength="400" placeholder="Otro antecedente en abdomen" style="width: 97%;" value="<?php echo $otrosAbdomenDescribir ?>"/> 
        </div>
        <p></p>
        <?php } ?>
        <?php if ($urinarioEx == 1) {  ?>
        <h5>Urinario</h5>
        <div class="control-group-inline">
        <?php if ($rinones == 1) {$rinones="checked"; } ?>
        <?php if ($puntos == 1) {$puntos="checked"; } ?>
        <?php if ($miccion == 1) {$miccion="checked"; } ?>
        <?php if ($orina == 1) {$orina="checked"; } ?>
        <?php if ($dolorUrinario == 1) {$dolorUrinario="checked"; } ?>
        <?php if ($otroUrinario == 1) {$otroUrinario="checked"; } ?>
       
	  		<input type="checkbox" name="rinones" id="rinones" value="1" <?php echo $rinones ?>/>
            Riñones &nbsp; &nbsp;
            <input type="checkbox" name="puntos" id="puntos" value="1" <?php echo $puntos ?>/>
            Puntos dolorosos &nbsp; &nbsp;
            <input type="checkbox" name="miccion" id="miccion" value="1" <?php echo $miccion ?>/>
            Micción &nbsp; &nbsp;
            <input type="checkbox" name="orina" id="orina" value="1" <?php echo $orina ?>/>
            Orina &nbsp; &nbsp;
            <input type="checkbox" name="dolorUrinario" id="dolorUrinario" value="1" <?php echo $dolorUrinario ?>/>
            Dolor &nbsp; &nbsp;
            <input type="checkbox" name="otroUrinario" id="otroUrinario" value="1" <?php echo $otroUrinario ?>/>
            Otros &nbsp; &nbsp;
            <p></p>
            <input name="dolorUrinarioDescribir" type="text" class="span4" id="dolorUrinarioDescribir"  maxlength="400" placeholder="Otro antecedente urinario" style="width: 97%;" value="<?php echo $dolorUrinarioDescribir ?>"/> 
        </div>
        <p></p>
        <?php } ?>
        <?php if ($genitalesEx == 1) { ?>
        <h5>Genitales</h5>
        <div class="control-group-inline">
        <?php if ($cicatricesGen == 1) {$cicatricesGen="checked"; } ?>
        <?php if ($lesionesGen == 1) {$lesionesGen="checked"; } ?>
        <?php if ($secrecionesGen == 1) {$secrecionesGen="checked"; } ?>
        <?php if ($escroto == 1) {$escroto="checked"; } ?>
        <?php if ($epididimo == 1) {$epididimo="checked"; } ?>
        <?php if ($conducto == 1) {$conducto="checked"; } ?>
        <?php if ($testiculos == 1) {$testiculos="checked"; } ?>
        <?php if ($prostata == 1) {$prostata="checked"; } ?>
        <?php if ($vesiculos == 1) {$vesiculos="checked"; } ?>
        <?php if ($ovarios == 1) {$ovarios="checked"; } ?>
        <?php if ($externos == 1) {$externos="checked"; } ?>
        <?php if ($otrosGen == 1) {$otrosGen="checked"; } ?>
		
	  		<input type="checkbox" name="cicatricesGen" id="cicatricesGen" value="1" <?php echo $cicatricesGen ?>/>
            Cicatrices &nbsp; &nbsp;
            <input type="checkbox" name="lesionesGen" id="lesionesGen" value="1" <?php echo $lesionesGen ?>/>
            Lesiones &nbsp; &nbsp;
            <input type="checkbox" name="secrecionesGen" id="secrecionesGen" value="1" <?php echo $secrecionesGen ?>/>
            Secreciones &nbsp; &nbsp;
            <input type="checkbox" name="escroto" id="escroto" value="1" <?php echo $escroto ?>/>
            Escroto &nbsp; &nbsp;
            <input type="checkbox" name="epididimo" id="epididimo" value="1" <?php echo $epididimo ?>/>
            Epididimo &nbsp; &nbsp;
            <input type="checkbox" name="conducto" id="conducto" value="1" <?php echo $conducto ?>/>
            Conducto deferente &nbsp; &nbsp;
            <input type="checkbox" name="testiculos" id="testiculos" value="1" <?php echo $testiculos ?>/>
            Testículos &nbsp; &nbsp;
            <input type="checkbox" name="prostata" id="prostata" value="1" <?php echo $prostata ?>/>
            Próstata &nbsp; &nbsp;
            <input type="checkbox" name="vesiculos" id="vesiculos" value="1" <?php echo $vesiculos ?>/>
            Vesiculos seminales &nbsp; &nbsp;
            <input type="checkbox" name="ovarios" id="ovarios" value="1" <?php echo $ovarios ?>/>
            Ovarios &nbsp; &nbsp;
            <input type="checkbox" name="externos" id="externos" value="1" <?php echo $externos ?>/>
            Externos &nbsp; &nbsp;
            <input type="checkbox" name="otrosGen" id="otrosGen" value="1" <?php echo $otrosGen ?>/>
            Otros &nbsp; &nbsp;
            <p></p>
            <input name="otrosGenDescribir" type="text" class="span4" id="otrosGenDescribir"  maxlength="400" placeholder="Otro antecedente en genitales" style="width: 97%;" value="<?php echo $otrosGenDescribir ?>"/> 
        </div>
        <p></p>
        <?php } ?>
        <?php if ($anoRectoEx == 1) {  ?>
        <h5>Ano y recto</h5>
        <?php if ($fisura == 1) {$fisura="checked"; } ?>
        <?php if ($fistula == 1) {$fistula="checked"; } ?>
        <?php if ($prolapsoAno == 1) {$prolapsoAno="checked"; } ?>
        <?php if ($esfinterAno == 1) {$esfinterAno="checked"; } ?>
        <?php if ($tumoracionesAno == 1) {$tumoracionesAno="checked"; } ?>
        <?php if ($hemorroidesAno == 1) {$hemorroidesAno="checked"; } ?>
        <?php if ($eritemaAno == 1) {$eritemaAno="checked"; } ?>
        <?php if ($tacto == 1) {$tacto="checked"; } ?>
        <?php if ($rectoscopia == 1) {$rectoscopia="checked"; } ?>
        <?php if ($otrosAno == 1) {$otrosAno="checked"; } ?>
		
        <div class="control-group-inline">
	  		<input type="checkbox" name="fisura" id="fisura" value="1" <?php echo $fisura ?>/>
            Fisura &nbsp; &nbsp;
            <input type="checkbox" name="fistula" id="fistula" value="1" <?php echo $fistula ?>/>
            Fístula &nbsp; &nbsp;
            <input type="checkbox" name="prolapsoAno" id="prolapsoAno" value="1" <?php echo $prolapsoAno ?>/>
            Prolapso &nbsp; &nbsp;
            <input type="checkbox" name="esfinterAno" id="esfinterAno" value="1" <?php echo $esfinterAno ?>/>
            Esfinter &nbsp; &nbsp;
            <input type="checkbox" name="tumoracionesAno" id="tumoracionesAno" value="1" <?php echo $tumoracionesAno ?>/>
            Tumoraciones &nbsp; &nbsp;
            <input type="checkbox" name="hemorroidesAno" id="hemorroidesAno" value="1" <?php echo $hemorroidesAno ?>/>
            Hemorroides &nbsp; &nbsp;
            <input type="checkbox" name="eritemaAno" id="eritemaAno" value="1" <?php echo $eritemaAno ?>/>
            Eritema anal &nbsp; &nbsp;
            <input type="checkbox" name="tacto" id="tacto" value="1" <?php echo $tacto ?>/>
            Tacto rectal &nbsp; &nbsp;
            <input type="checkbox" name="rectoscopia" id="rectoscopia" value="1" <?php echo $rectoscopia ?>/>
            Rectoscopia &nbsp; &nbsp;
            <input type="checkbox" name="otrosAno" id="otrosAno" value="1" <?php echo $otrosAno ?>/>
            Otros &nbsp; &nbsp;            
            <p></p>
            <input name="otrosAnoDescribir" type="text" class="span4" id="otrosAnoDescribir"  maxlength="400" placeholder="Otro antecedente en ano y recto" style="width: 97%;" value="<?php echo $otrosAnoDescribir ?>"/> 
        </div>
        <p></p>
         <?php } ?>
         <?php if ($huesosEx == 1) { ?>
         <h5>Huesos, articulaciones y musculos</h5>
        <div class="control-group-inline">
        <?php if ($deformidadesHuesos == 1) {$deformidadesHuesos="checked"; } ?>
        <?php if ($inflamacion == 1) {$inflamacion="checked"; } ?>
        <?php if ($epitisitis == 1) {$epitisitis="checked"; } ?>
        <?php if ($sensibilidad == 1) {$sensibilidad="checked"; } ?>
        <?php if ($limitacion == 1) {$limitacion="checked"; } ?>
        <?php if ($masas == 1) {$masas="checked"; } ?>
        <?php if ($dedos == 1) {$dedos="checked"; } ?>
        <?php if ($otrosHuesos == 1) {$otrosHuesos="checked"; } ?>
		
	  		<input type="checkbox" name="deformidadesHuesos" id="deformidadesHuesos" value="1" <?php echo $deformidadesHuesos ?>/>
            Deformidades &nbsp; &nbsp;
            <input type="checkbox" name="inflamacion" id="inflamacion" value="1" <?php echo $inflamacion ?>/>
            Inflamación &nbsp; &nbsp;
            <input type="checkbox" name="epitisitis" id="epitisitis" value="1" <?php echo $epitisitis ?>/>
            Epitisitis &nbsp; &nbsp;
            <input type="checkbox" name="sensibilidad" id="sensibilidad" value="1" <?php echo $sensibilidad ?>/>
            Sensibilidad &nbsp; &nbsp;
            <input type="checkbox" name="limitacion" id="limitacion" value="1" <?php echo $limitacion ?>/>
            Limitación de movimiento &nbsp; &nbsp;
            <input type="checkbox" name="masas" id="masas" value="1" <?php echo $masas ?>/>
            Masas musculares &nbsp; &nbsp;
            <input type="checkbox" name="dedos" id="dedos" value="1" <?php echo $dedos ?>/>
            Dedos hipocráticos &nbsp; &nbsp;
            <input type="checkbox" name="otrosHuesos" id="otrosHuesos" value="1" <?php echo $otrosHuesos ?>/>
            Otros &nbsp; &nbsp;
            <p></p>
            <input name="otrosHuesosDescribir" type="text" class="span4" id="otrosHuesosDescribir"  maxlength="400" placeholder="Otro antecedente en huesos, articulaciones y musculos" style="width: 97%;" value="<?php echo $otrosHuesosDescribir ?>"/> 
        </div>
        <p></p>
        <?php } ?>
        <?php if ($neurologicosEx == 1) { ?>
        <h5>Neurologicos y psiquico</h5>
        <div class="control-group-inline">
        <?php if ($motilidad == 1) {$motilidad="checked"; } ?>
        <?php if ($reflejos == 1) {$reflejos="checked"; } ?>
        <?php if ($objetiva == 1) {$objetiva="checked"; } ?>
        <?php if ($coordinacion == 1) {$coordinacion="checked"; } ?>
        <?php if ($troficos == 1) {$troficos="checked"; } ?>
        <?php if ($lenguaje == 1) {$lenguaje="checked"; } ?>
        <?php if ($escritura == 1) {$escritura="checked"; } ?>
        <?php if ($orientacion == 1) {$orientacion="checked"; } ?>
        <?php if ($psiquismo == 1) {$psiquismo="checked"; } ?>
        <?php if ($otrosNeu == 1) {$otrosNeu="checked"; } ?>
		
	  		<input type="checkbox" name="motilidad" id="motilidad" value="1" <?php echo $motilidad ?>/>
            Motilidad &nbsp; &nbsp;
            <input type="checkbox" name="reflejos" id="reflejos" value="1" <?php echo $reflejos ?>/>
            Reflejos &nbsp; &nbsp;
            <input type="checkbox" name="objetiva" id="objetiva" value="1" <?php echo $objetiva ?>/>
            Sensibilidad objetiva &nbsp; &nbsp;
            <input type="checkbox" name="coordinacion" id="coordinacion" value="1" <?php echo $coordinacion ?>/>
            Coordinación &nbsp; &nbsp;
            <input type="checkbox" name="troficos" id="troficos" value="1" <?php echo $troficos ?>/>
            Tróficos &nbsp; &nbsp;
            <input type="checkbox" name="lenguaje" id="lenguaje" value="1" <?php echo $lenguaje ?>/>
            Lenguaje &nbsp; &nbsp;
            <input type="checkbox" name="escritura" id="escritura" value="1" <?php echo $escritura ?>/>
            Escritura &nbsp; &nbsp;
            <input type="checkbox" name="orientacion" id="orientacion" value="1" <?php echo $orientacion ?>/>
            Orientación &nbsp; &nbsp;
            <input type="checkbox"name="psiquismo" id="psiquismo" value="1" <?php echo $psiquismo ?>/>
            Psiquismo &nbsp; &nbsp;
            <input type="checkbox"name="otrosNeu" id="otrosNeu" value="1" <?php echo $otrosNeu ?>/>
            Otros &nbsp; &nbsp;
            <p></p>
            <input name="otrosNeuDescribir" type="text" class="span4" id="otrosNeuDescribir"  maxlength="400" placeholder="Otro antecedente neurologicos y psiquico" style="width: 97%;" value="<?php echo $otrosNeuDescribir ?>"/> 
        </div>
        <p></p>
        <?php } ?>
        <?php if ($sensorialesEx == 1) { ?>
        <h5>Sensoriales</h5>
        <?php if ($visionSen == 1) {$visionSen="checked"; } ?>
        <?php if ($audicionSen == 1) {$audicionSen="checked"; } ?>
        <?php if ($olorSen == 1) {$olorSen="checked"; } ?>
        <?php if ($gustoSen == 1) {$gustoSen="checked"; } ?>
        <?php if ($otrosSen == 1) {$otrosSen="checked"; } ?>
        <div class="control-group-inline">
	  		<input type="checkbox" name="visionSen" id="visionSen" value="1" <?php echo $visionSen ?>/>
            Visión &nbsp; &nbsp;
            <input type="checkbox" name="audicionSen" id="audicionSen" value="1" <?php echo $audicionSen ?>/>
            Audición &nbsp; &nbsp;
            <input type="checkbox" name="olorSen" id="olorSen" value="1" <?php echo $olorSen ?>/>
            Olor &nbsp; &nbsp;
            <input type="checkbox" name="gustoSen" id="gustoSen" value="1" <?php echo $gustoSen ?>/>
            Gusto &nbsp; &nbsp;
            <input type="checkbox" name="otrosSen" id="otrosSen" value="1" <?php echo $otrosSen ?>/>
            Otros &nbsp; &nbsp;
            <p></p>
            <input name="otrosSenDescribir" type="text" class="span4" id="otrosSenDescribir"  maxlength="400" placeholder="Otro antecedente sensorial" style="width: 97%;" value="<?php echo $otrosSenDescribir ?>"/> 
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