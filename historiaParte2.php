<?php 
session_start();
include "lib/corelib.php";
require_once('tools/mypathdb.php');
error_reporting(0);
$_SESSION['valor'] = 12; //Activa la opcion del menu actual
include "headers/header.php";
if (!empty($_GET ['id'])) 	
	{
	$us_id = $_GET ['id'];	//viene en el URL
	} else {
	$us_id = $_SESSION['us_id'];
	}
?>
<script Language="JavaScript">
	$(document).ready(function() {
		$('#titulo').html("inicio / historia clinica / parte II");
		//$('#contenido').load('registrarDrVista.php');		
		 
	});
	

    //Metodo para cargar los datos personales
    $("body").on('submit', '#formHistoria', function(event) {
		event.preventDefault()
		if ($('#formHistoria').valid()) {
			$.ajax({
				type: "POST",
				url: "historia_procesar_parte2.php",
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
						window.location.href='historiaParte3.php?id=<?php echo $us_id?>'; 
					  }, 1000);
					}
					
					if (respuesta.exito == 2) {
						$('#exito2').show();
						setTimeout(function() {
						$('#exito2').hide();
						window.location.href='historiaParte3.php?id=<?php echo $us_id?>'; 
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
        Historia clinica pediatrica
        <small>Parte II</small>
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
	$edadSaludPadresHermanos= $dataHis['his_edadSaludPadresHermanos'];
	$edadSaludOtros= $dataHis['his_edadSaludOtros'];
	$cancer= $dataHis['his_cancer'];
	$diabetes= $dataHis['his_diabetes'];
	$discrasias= $dataHis['his_discrasias'];
	$renales= $dataHis['his_renales'];
	$cardiacas= $dataHis['his_cardiacas'];
	$digestivas= $dataHis['his_digestivas'];
	$artritis= $dataHis['his_artritis'];
	$sifilis= $dataHis['his_sifilis'];
	$tuberculosis= $dataHis['his_tuberculosis'];
	$alergias= $dataHis['his_alergias'];
	$intoxicaciones= $dataHis['his_intoxicaciones'];
	$neurologicas= $dataHis['his_neurologicas'];
	$mentales= $dataHis['his_mentales'];
	$otrasEnfermedades= $dataHis['his_otrasEnfermedades'];
	$otrasEnfermedadesDescribir= $dataHis['his_otrasEnfermedadesDescribir'];
	$controles= $dataHis['his_controles'];
	$complicaciones= $dataHis['his_complicaciones'];
	$atermino= $dataHis['his_atermino'];
	$prematuro= $dataHis['his_prematuro'];
	$espontaneo= $dataHis['his_espontaneo'];
	$anestesia= $dataHis['his_anestesia'];
	$trabajo= $dataHis['his_trabajo'];
	$instrumental= $dataHis['his_instrumental'];
	$domiciliaria= $dataHis['his_domiciliaria'];
	$institucional= $dataHis['his_institucional'];
	$gestacion= $dataHis['his_gestacion'];
	$otroPrenatal= $dataHis['his_otroPrenatal'];
	$otroPrenatalDescribir= $dataHis['his_otroPrenatalDescribir'];
	$peso= $dataHis['his_peso'];
	$talla= $dataHis['his_talla'];
	$respiracion= $dataHis['his_respiracion'];
	$cianosis= $dataHis['his_cianosis'];
	$fiebre= $dataHis['his_fiebre'];
	$vomitos= $dataHis['his_vomitos'];
	$icteria= $dataHis['his_icteria'];
	$hemorragias= $dataHis['his_hemorragias'];
	$convulsiones= $dataHis['his_convulsiones'];
	$malformaciones= $dataHis['his_malformaciones'];
	$oftalmia= $dataHis['his_oftalmia'];
	$coriza= $dataHis['his_coriza'];
	$otroNeonatal= $dataHis['his_otroNeonatal'];
	$otroNeonatalDescribir= $dataHis['his_otroNeonatalDescribir'];
	$natural= $dataHis['his_natural'];
	$artificial= $dataHis['his_artificial'];
	$mixta= $dataHis['his_mixta'];
	$destete= $dataHis['his_destete'];
	$cereales= $dataHis['his_cereales'];
	$sopas= $dataHis['his_sopas'];
	$frutas= $dataHis['his_frutas'];
	$huevos= $dataHis['his_huevos'];
	$carne= $dataHis['his_carne'];
	$vitaminas= $dataHis['his_vitaminas'];
	$dieta= $dataHis['his_dieta'];
	$sostuvo= $dataHis['his_sostuvo'];
	$sento= $dataHis['his_sento'];
	$paro= $dataHis['his_paro'];
	$camino= $dataHis['his_camino'];
	$esfinter= $dataHis['his_esfinter'];
	$diente= $dataHis['his_diente'];
	$palabra= $dataHis['his_palabra'];
	$grado= $dataHis['his_grado'];
	$progreso= $dataHis['his_progreso'];
	$sueno= $dataHis['his_sueno'];
	$siestas= $dataHis['his_siestas'];
	$juegos= $dataHis['his_juegos'];
	$sexuales= $dataHis['his_sexuales'];
	$chupaDedos= $dataHis['his_chupaDedos'];
	$comeUnas= $dataHis['his_comeUnas'];
	$rasgos= $dataHis['his_rasgos'];
	$recreacion= $dataHis['his_recreacion'];
	$ocupacionHabito= $dataHis['his_ocupacionHabito'];
	$otrosHabitos= $dataHis['his_otrosHabitos'];
	$otrosHabitosDescribir= $dataHis['his_otrosHabitosDescribir'];
	$viruela= $dataHis['his_viruela'];
	$tosterona= $dataHis['his_tosterona'];
	$difteria= $dataHis['his_difteria'];
	$tetanos= $dataHis['his_tetanos'];
	$tificas= $dataHis['his_tificas'];
	$bcc= $dataHis['his_bcc'];
	$poliomelitis= $dataHis['his_poliomelitis'];
	$tuberculina= $dataHis['his_tuberculina'];	
	$otrasInmunizaciones= $dataHis['his_otrasInmunizaciones'];
	$otrasInmunizacionesDescribir= $dataHis['his_otrasInmunizacionesDescribir'];
	$intradomiciliarios= $dataHis['his_intradomiciliarios'];
	$extradomiciliarios= $dataHis['his_extradomiciliarios'];		
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
    
    
  	<form class="form-vertical" id="formHistoria" action="">
    <input name="us_id" type="hidden" value="<?php echo $us_id ?>" /> 	
    <?php if ($historiaFamiliar == 1) {  ?>
    <h5>Historia familiar</h5>
		<div class="control-group-inline">
	  		Edad y estado de salud de los padres y hermanos si viven juntos <textarea name="edadSaludPadresHermanos" type="text" class="span4" id="edadSaludPadresHermanos"  maxlength="400" style="width: 97%;"><?php echo $edadSaludPadresHermanos ?></textarea>
		  	Estado de salud de otros cohabitantes <textarea name="edadSaludOtros" type="text" class="span4" id="edadSaludOtros"  maxlength="400" placeholder="Indicar parentesco" style="width: 97%;"><?php echo $edadSaludOtros ?></textarea><p></p>
            <?php if ($cancer == 1) {$cancer="checked"; } ?>
            <?php if ($diabetes == 1) {$diabetes="checked"; } ?>
            <?php if ($discrasias == 1) {$discrasias="checked"; } ?>
            <?php if ($renales == 1) {$renales="checked"; } ?>
            <?php if ($cardiacas == 1) {$cardiacas="checked"; } ?>
            <?php if ($digestivas == 1) {$digestivas="checked"; } ?>
            <?php if ($artritis == 1) {$artritis="checked"; } ?>
            <?php if ($sifilis == 1) {$sifilis="checked"; } ?>
            <?php if ($tuberculosis == 1) {$tuberculosis="checked"; } ?>
            <?php if ($alergias == 1) {$alergias="checked"; } ?>
            <?php if ($intoxicaciones == 1) {$intoxicaciones="checked"; } ?>
            <?php if ($neurologicas == 1) {$neurologicas="checked"; } ?>
            <?php if ($mentales == 1) {$mentales="checked"; } ?>
            <?php if ($otrasEnfermedades == 1) {$otrasEnfermedades="checked"; } ?>            
            <input name="cancer" type="checkbox" id="cancer" value="1" <?php echo $cancer ?>/> 
            Cáncer &nbsp; &nbsp;
            <input type="checkbox" name="diabetes" id="diabetes" value="1" <?php echo $diabetes ?>/> 
            Diabetes &nbsp; &nbsp;
            <input type="checkbox" name="discrasias" id="discrasias" value="1" <?php echo $discrasias ?>/> 
            Discrasias Sanguíneas &nbsp; &nbsp;
            <input type="checkbox" name="renales" id="renales" value="1" <?php echo $renales ?>/> 
            Enfermedades Renales &nbsp; &nbsp;
            <input type="checkbox" name="cardiacas" id="cardiacas" value="1" <?php echo $cardiacas ?>/> 
            Enfermedades Cardiacas &nbsp; &nbsp;
            <input type="checkbox" name="digestivas" id="digestivas" value="1" <?php echo $digestivas ?>/> 
            Enfermedades Digestivas &nbsp; &nbsp;
            <input type="checkbox" name="artritis" id="artritis" value="1" <?php echo $artritis ?>/> 
            Artritis &nbsp; &nbsp;
            <p></p>
            <input type="checkbox" name="sifilis" id="sifilis" value="1" <?php echo $sifilis ?>/> 
            Sifilis &nbsp; &nbsp;
            <input type="checkbox" name="tuberculosis" id="tuberculosis" value="1" <?php echo $tuberculosis ?>/> 
            Tuberculosis &nbsp; &nbsp;
            <input type="checkbox" name="alergias" id="alergias" value="1" <?php echo $alergias ?>/> 
            Alergías &nbsp; &nbsp;
             <input type="checkbox" name="intoxicaciones" id="intoxicaciones" value="1" <?php echo $intoxicaciones ?>/> 
            Intoxicaciones &nbsp; &nbsp;
            <input type="checkbox" name="neurologicas" id="neurologicas" value="1" <?php echo $neurologicas ?>/> 
            Neurológicas &nbsp; &nbsp;
            <input type="checkbox" name="mentales" id="mentales" value="1" <?php echo $mentales ?>/> 
            Mentales  &nbsp; &nbsp;
            <input type="checkbox" name="otrasEnfermedades" id="otrasEnfermedades" value="1" <?php echo $otrasEnfermedades ?>/> 
            Otras &nbsp; &nbsp;
            <p></p>
            <input name="otrasEnfermedadesDescribir" type="text" class="span4" id="otrasEnfermedadesDescribir"  maxlength="400" placeholder="Otra enfermedad" style="width: 97%;" value="<?php echo $otrasEnfermedadesDescribir ?>">
        </div>
        <p></p>
        <?php } ?>
        <?php if ($antecedentesPrenatales == 1) { ?>
        <h5>Antecedentes prenatales y obstétricos</h5>
        <div class="control-group-inline">
            <?php if ($controles == 1) {$controles="checked"; } ?>
            <?php if ($complicaciones == 1) {$complicaciones="checked"; } ?>
            <?php if ($atermino == 1) {$atermino="checked"; } ?>
            <?php if ($prematuro == 1) {$prematuro="checked"; } ?>
            <?php if ($espontaneo == 1) {$espontaneo="checked"; } ?>
            <?php if ($anestesia == 1) {$anestesia="checked"; } ?>
            <?php if ($instrumental == 1) {$instrumental="checked"; } ?>
            <?php if ($domiciliaria == 1) {$domiciliaria="checked"; } ?>
            <?php if ($institucional == 1) {$institucional="checked"; } ?>
            <?php if ($otroPrenatal == 1) {$otroPrenatal="checked"; } ?>
                    
	  		<input type="checkbox" name="controles" id="controles" value="1" <?php echo $controles ?>/> 
            Controles &nbsp; &nbsp;
            <input type="checkbox" name="complicaciones" id="complicaciones" value="1" <?php echo $complicaciones ?>/> 
            Complicaciones &nbsp; &nbsp;
            <input type="checkbox" name="atermino" id="atermino" value="1" <?php echo $atermino ?>/> 
            Parto a término &nbsp; &nbsp;
            <input type="checkbox" name="prematuro" id="prematuro" value="1" <?php echo $prematuro ?>/> 
            Parto prematuro &nbsp; &nbsp;
            <input type="checkbox" name="espontaneo" id="espontaneo" value="1" <?php echo $espontaneo ?>/> 
            Parto espontáneo &nbsp; &nbsp;
            <input type="checkbox" name="anestesia" id="anestesia" value="1" <?php echo $anestesia ?>/> 
            Parto con anestésia &nbsp; &nbsp;
            <input name="trabajo" type="text" id="trabajo" size="2" maxlength="2" value="<?php echo $trabajo ?>"/> 
            Horas en trabajo &nbsp; &nbsp;
            <p></p>
            <input type="checkbox" name="instrumental" id="instrumental" value="1" <?php echo $instrumental ?>/> 
            Parto instrumental &nbsp; &nbsp;
            <input type="checkbox" name="domiciliaria" id="domiciliaria" value="1" <?php echo $domiciliaria ?>/> 
            Asistencia domiciliaria &nbsp; &nbsp;
            <input type="checkbox" name="institucional" id="institucional" value="1" <?php echo $institucional ?>/> 
            Asistencia institucional&nbsp;&nbsp;
            <input name="gestacion" type="text" id="gestacion" size="2" maxlength="2" value="<?php echo $gestacion ?>"/> 
Número de la gestación &nbsp; &nbsp;
            <input type="checkbox" name="otroPrenatal" id="otroPrenatal" value="1" <?php echo $otroPrenatal ?>/> 
            Otros &nbsp; &nbsp;
            <input name="otroPrenatalDescribir" type="text" class="span4" id="otroPrenatalDescribir"  maxlength="400" placeholder="Otro antecedente prenatal" style="width: 97%;" value="<?php echo $otroPrenatalDescribir ?>"/> 
        </div>
        <p></p>
        <?php } ?>
        <?php if ($periodoNeonatal == 1) { ?>
        <h5>Antecedentes personales - Período neonatal</h5>
        <div class="control-group-inline">
        	<?php if ($respiracion == 1) {$respiracion="checked"; } ?>
            <?php if ($cianosis == 1) {$cianosis="checked"; } ?>
            <?php if ($fiebre == 1) {$fiebre="checked"; } ?>
            <?php if ($vomitos == 1) {$vomitos="checked"; } ?>
            <?php if ($icteria == 1) {$icteria="checked"; } ?>
            <?php if ($hemorragias == 1) {$hemorragias="checked"; } ?>
            <?php if ($convulsiones == 1) {$convulsiones="checked"; } ?>
            <?php if ($malformaciones == 1) {$malformaciones="checked"; } ?>
            <?php if ($oftalmia == 1) {$oftalmia="checked"; } ?>
            <?php if ($coriza == 1) {$coriza="checked"; } ?>
            <?php if ($otroNeonatal == 1) {$otroNeonatal="checked"; } ?>
        	<input name="peso" type="text" id="peso" size="5" maxlength="5" value="<?php echo $peso ?>" />
            Peso al nacer &nbsp; &nbsp;
            <input name="talla" type="text" id="talla" size="4" maxlength="4" value="<?php echo $talla ?>"  />
            Talla al nacer &nbsp; &nbsp;
            <input type="checkbox" name="respiracion" id="respiracion" value="1" <?php echo $respiracion ?>/> 
            Respiración artificial &nbsp; &nbsp;
            <input type="checkbox" name="cianosis" id="cianosis" value="1" <?php echo $cianosis ?>/> 
            Cianosis &nbsp; &nbsp;
            <input type="checkbox" name="fiebre" id="fiebre" value="1" <?php echo $fiebre ?>/> 
            Fiebre &nbsp; &nbsp;
            <input type="checkbox" name="vomitos" id="vomitos" value="1" <?php echo $vomitos ?>/> 
            Vómitos &nbsp; &nbsp;
            <input type="checkbox" name="icteria" id="icteria" value="1" <?php echo $icteria ?>/> 
            Ictericia &nbsp; &nbsp;
            <p></p>
            <input type="checkbox" name="hemorragias" id="hemorragias" value="1" <?php echo $hemorragias ?>/> 
            Hemorragias &nbsp; &nbsp;
            <input type="checkbox" name="convulsiones" id="convulsiones" value="1" <?php echo $convulsiones ?>/> 
            Convulsiones &nbsp; &nbsp;
            <input type="checkbox" name="malformaciones" id="malformaciones" value="1" <?php echo $malformaciones ?>/> 
            Malformaciones &nbsp; &nbsp;
            <input type="checkbox" name="oftalmia" id="oftalmia" value="1" <?php echo $oftalmia ?>/> 
            Oftalmia &nbsp; &nbsp;
            <input type="checkbox" name="coriza" id="coriza" value="1" <?php echo $coriza ?>/> 
            Coriza &nbsp; &nbsp;
            <input type="checkbox" name="otroNeonatal" id="otroNeonatal" value="1" <?php echo $otroNeonatal ?>/> 
            Otros &nbsp; &nbsp;
            <p></p>
            <input name="otroNeonatalDescribir" type="text" class="span4" id="otroNeonatalDescribir"  maxlength="400" placeholder="Otro antecedente neonatal" style="width: 97%;" value="<?php echo $otroNeonatalDescribir ?>" />
        </div>
        <p></p>
        <?php } ?>
        <?php if ($alimentacion == 1) { ?>
         <h5>Alimentación</h5>
        <div class="control-group-inline">
            <?php if ($natural == 1) {$natural="checked"; } ?>
            <?php if ($artificial == 1) {$artificial="checked"; } ?>
            <?php if ($mixta == 1) {$mixta="checked"; } ?>
            <?php if ($destete == 1) {$destete="checked"; } ?>
            <?php if ($cereales == 1) {$cereales="checked"; } ?>
            <?php if ($sopas == 1) {$sopas="checked"; } ?>
            <?php if ($frutas == 1) {$frutas="checked"; } ?>
            <?php if ($huevos == 1) {$huevos="checked"; } ?>
            <?php if ($carne == 1) {$carne="checked"; } ?>
            <?php if ($vitaminas == 1) {$vitaminas="checked"; } ?>
            <?php if ($dieta == 1) {$dieta="checked"; } ?>
	  		<input type="checkbox" name="natural" id="natural" value="1" <?php echo $natural ?>/> 
            Natural &nbsp; &nbsp;
            <input type="checkbox" name="artificial" id="artificial" value="1" <?php echo $artificial ?>/> 
            Artificial &nbsp; &nbsp;
            <input type="checkbox" name="mixta" id="mixta" value="1" <?php echo $mixta ?>/> 
            Mixta &nbsp; &nbsp;
            <input type="checkbox" name="destete" id="destete" value="1" <?php echo $destete ?>/> 
            Destete &nbsp; &nbsp;
            <input type="checkbox" name="cereales" id="cereales" value="1" <?php echo $cereales ?>/> 
            Cereales &nbsp; &nbsp;
            <input type="checkbox" name="sopas" id="sopas" value="1" <?php echo $sopas ?>/> 
            Sopas &nbsp; &nbsp;
            <input type="checkbox" name="frutas" id="frutas" value="1" <?php echo $frutas ?>/> 
            Frutas &nbsp; &nbsp;
            <input type="checkbox" name="huevos" id="huevos" value="1" <?php echo $huevos ?>/> 
            Huevos &nbsp; &nbsp;
            <input type="checkbox" name="carne" id="carne" value="1" <?php echo $carne ?>/> 
            Carne &nbsp; &nbsp;
            <input type="checkbox" name="vitaminas" id="vitaminas" value="1" <?php echo $vitaminas ?>/> 
            Vitaminas &nbsp; &nbsp;
            <input type="checkbox" name="dieta" id="dieta" value="1" <?php echo $dieta ?>/> 
            Dieta actual &nbsp; &nbsp;
        </div>
        <br>
        <?php } ?>
        <?php if ($desarrollo == 1) { ?>
        <h5>Desarrollo</h5>
        <table class="table table-striped">
  <tr>
    <td>Sostuvo la cabeza a los <input name="sesostuvo" type="text" class="span4" id="sesostuvo"  maxlength="2" style="width: 6%;" value="<?php echo $sostuvo ?>" /> meses.  </td>
    <td> Se sento a los <input name="sesento" type="text" class="span4" id="sesento"  maxlength="2" style="width: 6%;" value="<?php echo $sento ?>" /> meses.
            </td>
    <td>Se paro a los <input name="separo" type="text" class="span4" id="separo"  maxlength="2" style="width: 6%;" value="<?php echo $paro ?>" /> meses.
            </td>
  </tr>

  <tr>
    <td>Camino a los <input name="camino" type="text" class="span4" id="camino"  maxlength="2" style="width: 6%;" value="<?php echo $camino ?>" /> meses.
           </td>
    <td>Controló esfinter a los <input name="esfinter" type="text" class="span4" id="esfinter"  maxlength="2" style="width: 6%;" value="<?php echo $esfinter ?>" /> meses. 	</td>
    <td>Primer diente a los <input name="diente" type="text" class="span4" id="diente"  maxlength="2" style="width: 6%;" value="<?php echo $diente ?>" /> meses.
           </td>
  </tr>
  <tr>
    <td>Primeras palabras a los <input name="palabra" type="text" class="span4" id="palabra"  maxlength="2" style="width: 6%;" value="<?php echo $palabra ?>" /> meses.      </td>
    <td>Grado de escuela <input name="gradoEscuela" type="text" class="span4" id="gradoEscuela"  maxlength="10" style="width: 6%;" value="<?php echo $grado ?>" />
      </td>
  </tr>
</table>
            Progreso en la escuela <input name="progresoEscuela" type="text" class="span4" id="progresoEscuela"  maxlength="400" style="width: 97%;" value="<?php echo $progreso ?>" />
        <p></p>
         <?php } ?>
         <?php if ($habitos == 1) { ?>
        <h5>Hábitos</h5>
        <div class="control-group-inline">
            <?php if ($sueno == 1) {$sueno="checked"; } ?>
            <?php if ($siestas == 1) {$siestas="checked"; } ?>
            <?php if ($juegos == 1) {$juegos="checked"; } ?>
            <?php if ($sexuales == 1) {$sexuales="checked"; } ?>
            <?php if ($chupaDedos == 1) {$chupaDedos="checked"; } ?>
            <?php if ($comeUnas == 1) {$comeUnas="checked"; } ?>
            <?php if ($rasgos == 1) {$rasgos="checked"; } ?>
            <?php if ($recreacion == 1) {$recreacion="checked"; } ?>
            <?php if ($ocupacionHabito == 1) {$ocupacionHabito="checked"; } ?>
            <?php if ($otrosHabitos == 1) {$otrosHabitos="checked"; } ?>

	  		<input type="checkbox" name="sueno" id="sueno" value="1" <?php echo $sueno ?>/> 
            Sueño &nbsp; &nbsp;
            <input type="checkbox" name="siestas" id="siestas" value="1" <?php echo $siestas ?>/> 
            Siestas &nbsp; &nbsp;
            <input type="checkbox" name="juegos" id="juegos" value="1" <?php echo $juegos ?>/> 
            Juegos &nbsp; &nbsp;
            <input type="checkbox" name="sexuales" id="sexuales" value="1" <?php echo $sexuales ?>/> 
            Sexuales &nbsp; &nbsp;
            <input type="checkbox" name="chupaDedos" id="chupaDedos" value="1" <?php echo $chupaDedos ?>/> 
            Chupa dedos &nbsp; &nbsp;
            <input type="checkbox" name="comeUnas" id="comeUnas" value="1" <?php echo $comeUnas ?>/> 
            Come uñas &nbsp; &nbsp;
            <input type="checkbox" name="rasgos" id="rasgos" value="1" <?php echo $rasgos ?>/> 
            Rasgos personales &nbsp; &nbsp;
            <input type="checkbox" name="recreacion" id="recreacion" value="1" <?php echo $recreacion ?>/> 
            Recreación &nbsp; &nbsp;
            <input type="checkbox" name="ocupacionHabito" id="ocupacionHabito" value="1" <?php echo $ocupacionHabito ?>/> 
            Ocupación &nbsp; &nbsp;
            <input type="checkbox" name="otrosHabitos" id="otrosHabitos" value="1" <?php echo $otrosHabitos ?>/> 
            Otros &nbsp; &nbsp;
            <p></p>
            <input name="otrosHabitosDescribir" type="text" class="span4" id="otrosHabitosDescribir"  maxlength="400" placeholder="Otros habitos" style="width: 97%;" value="<?php echo $otrosHabitosDescribir ?>" />
		<p></p>
        </div>
        <?php } ?>
        <?php if ($inmunizaciones == 1) { ?>
        <h5>Inmunizaciones y pruebas</h5>
        <div class="control-group-inline">
            <?php if ($viruela == 1) {$viruela="checked"; } ?>
            <?php if ($tosterona == 1) {$tosterona="checked"; } ?>
            <?php if ($difteria == 1) {$difteria="checked"; } ?>
            <?php if ($tetanos == 1) {$tetanos="checked"; } ?>
            <?php if ($tificas == 1) {$tificas="checked"; } ?>
            <?php if ($bcc == 1) {$bcc="checked"; } ?>
            <?php if ($poliomelitis == 1) {$poliomelitis="checked"; } ?>
            <?php if ($tuberculina == 1) {$tuberculina="checked"; } ?>
            <?php if ($otrasInmunizaciones == 1) {$otrasInmunizaciones="checked"; } ?>

	  		<input type="checkbox" name="viruela" id="viruela" value="1" <?php echo $viruela ?>/> 
            Viruela &nbsp; &nbsp;
            <input type="checkbox" name="tosterona" id="tosterona" value="1" <?php echo $tosterona ?>/> 
            Tosterona &nbsp; &nbsp;
            <input type="checkbox" name="difteria" id="difteria" value="1" <?php echo $difteria ?>/> 
            Difteria &nbsp; &nbsp;
            <input type="checkbox" name="tetanos" id="tetanos" value="1" <?php echo $tetanos ?>/> 
            Tétanos &nbsp; &nbsp;
            <input type="checkbox" name="tificas" id="tificas" value="1" <?php echo $tificas ?>/> 
            Tificas &nbsp; &nbsp;
            <input type="checkbox" name="bcc" id="bcc" value="1" <?php echo $bcc ?>/> 
            B.C.C. &nbsp; &nbsp;
            <input type="checkbox" name="poliomelitis" id="poliomelitis" value="1" <?php echo $poliomelitis ?>/> 
            Poliomelitis &nbsp; &nbsp;
            <input type="checkbox" name="tuberculina" id="tuberculina" value="1" <?php echo $tuberculina ?>/> 
            Tuberculina &nbsp; &nbsp;
            <input type="checkbox" name="otrasInmunizaciones" id="otrasInmunizaciones" value="1" <?php echo $otrasInmunizaciones ?>/> 
            Otros &nbsp; &nbsp;
            <p></p>
            <input name="otrasInmunizacionesDescribir" type="text" class="span4" id="otrasInmunizacionesDescribir"  maxlength="400" placeholder="Otras inmunizaciones" style="width: 97%;" value="<?php echo $otrasInmunizacionesDescribir ?>" />
		<p></p>
        </div>
        <?php } ?>
        <?php if ($contactosTBC == 1) { ?>
        <h5>Contactos T.B.C.</h5>         
        <div class="control-group-inline">
            <?php if ($intradomiciliarios == 1) {$intradomiciliarios="checked"; } ?>
            <?php if ($extradomiciliarios == 1) {$extradomiciliarios="checked"; } ?>
	  		<input type="checkbox" name="intradomiciliarios" id="intradomiciliarios" value="1" <?php echo $intradomiciliarios ?>/> 
            Intradomiciliarios &nbsp; &nbsp;
            <input type="checkbox" name="extradomiciliarios" id="extradomiciliarios" value="1" <?php echo $extradomiciliarios ?>/> 
            Extradomiciliarios &nbsp; &nbsp;
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
    <!-- .................................... $footer .................................... -->
  <?php include "headers/otrofooter.php"; ?>