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

		$('#titulo').html("inicio / historia clinica / parte IV");

		//$('#contenido').load('registrarDrVista.php');		

		 

	});

	

 //Metodo para cargar los datos personales

    $("body").on('submit', '#formHistoria', function(event) {

		event.preventDefault()

		if ($('#formHistoria').valid()) {

			$.ajax({

				type: "POST",

				url: "historia_procesar_parte4.php",

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

						window.location.href='historiaParte5.php?id=<?php echo $us_id?>'; 

					  }, 1000);

					}

					

					if (respuesta.exito == 2) {

						$('#exito2').show();

						setTimeout(function() {

						$('#exito2').hide();

						window.location.href='historiaParte5.php?id=<?php echo $us_id?>'; 

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

        <small>Parte IV</small> 

      </h2>

      </div>

  

  <!-- .................................... $Contenido .................................... -->

  <section class="section-content section-contact section-color-graylighter">

    <div class="container">

      <div class="row">

        <div id="contenido">  

       <div class="span12">

        <h3>Examen fisico</h3>

        <h6>(Datos ojetivoss)</h6>       

<?php

	$doc_id=$_SESSION['doc_id'];



    // ========================= Buscar la historia en tbl_historias ==========================================================

	$query="SELECT * FROM tbl_historias WHERE his_id = '$us_id' AND his_doc_id = '$doc_id'";  



	$resultado=mysql_query($query,$dbConn);

	while($dataHis=mysql_fetch_array($resultado))

	{    

	$condicionesGral= $dataHis['his_condicionesGral'];

	$nutricionGral= $dataHis['his_nutricionGral'];

	$desarrolloGral= $dataHis['his_desarrolloGral'];

	$otrosGral= $dataHis['his_otrosGral'];

	$otrosGralDescribir= $dataHis['his_otrosGralDescribir'];

	$colorExPiel= $dataHis['his_colorExPiel'];

	$humedadExPiel= $dataHis['his_humedadExPiel'];

	$hidratacionExPiel= $dataHis['his_hidratacionExPiel'];

	$contexturaExPiel= $dataHis['his_contexturaExPiel'];

	$pigmentacionExPiel= $dataHis['his_pigmentacionExPiel'];

	$equimosisExPiel= $dataHis['his_equimosisExPiel'];

	$petequiasExPiel= $dataHis['his_petequiasExPiel'];

	$cianosisExPiel= $dataHis['his_cianosisExPiel'];

	$erupcionExPiel= $dataHis['his_erupcionExPiel'];

	$paniculoExPiel= $dataHis['his_paniculoExPiel'];

	$turgorExPiel= $dataHis['his_turgorExPiel'];

	$edemaExPiel= $dataHis['his_edemaExPiel'];

	$unasExPiel= $dataHis['his_unasExPiel'];

	$nodulosExPiel= $dataHis['his_nodulosExPiel'];

	$pelosExPiel= $dataHis['his_pelosExPiel'];

	$vascularizacionExPiel= $dataHis['his_vascularizacionExPiel'];

	$cicatricesExPiel= $dataHis['his_cicatricesExPiel'];

	$ulcerasExPiel= $dataHis['his_ulcerasExPiel'];

	$fistulasExPiel= $dataHis['his_fistulasExPiel'];

	$otrosExPiel= $dataHis['his_otrosExPiel'];

	$otrosExPielDescribir= $dataHis['his_otrosExPielDescribir'];

	$configuracion= $dataHis['his_configuracion'];

	$fontanelas= $dataHis['his_fontanelas'];

	$suturas= $dataHis['his_suturas'];

	$circunferencia= $dataHis['his_circunferencia'];

	$craneotabes= $dataHis['his_craneotabes'];

	$cabellos= $dataHis['his_cabellos'];

	$dolorExCabeza= $dataHis['his_dolorExCabeza'];

	$otrosExCabeza= $dataHis['his_otrosExCabeza'];

	$otrosExCabezaDescribir= $dataHis['his_otrosExCabezaDescribir'];

	$conjuntivas= $dataHis['his_conjuntivas'];

	$esclerotica= $dataHis['his_esclerotica'];

	$cornea= $dataHis['his_cornea'];

	$pupilas= $dataHis['his_pupilas'];

	$movimientos= $dataHis['his_movimientos'];

	$desviaciones= $dataHis['his_desviaciones'];

	$nistagmusEx= $dataHis['his_nistagmusEx'];

	$ptosis= $dataHis['his_ptosis'];

	$exoftaimos= $dataHis['his_exoftaimos'];

	$oftalmoscopicos= $dataHis['his_oftalmoscopicos'];

	$otrosOjosEx= $dataHis['his_otrosOjosEx'];

	$otrosOjosDescribirEx= $dataHis['his_otrosOjosDescribirEx'];

	$pabellon= $dataHis['his_pabellon'];

	$canal= $dataHis['his_canal'];

	$timpano= $dataHis['his_timpano'];

	$audicion= $dataHis['his_audicion'];

	$secrecionesEx= $dataHis['his_secrecionesEx'];

	$mastoides= $dataHis['his_mastoides'];

	$dolorExOidos= $dataHis['his_dolorExOidos'];

	$otrosExOidos= $dataHis['his_otrosExOidos'];

	$otrosExOidosDescribir= $dataHis['his_otrosExOidosDescribir'];

	$fosas= $dataHis['his_fosas'];

	$mucosasRino= $dataHis['his_mucosasRino'];

	$secrecionRino= $dataHis['his_secrecionRino'];

	$tabique= $dataHis['his_tabique'];

	$seno= $dataHis['his_seno'];

	$diafanoscopia= $dataHis['his_diafanoscopia'];

	$amigdalas= $dataHis['his_amigdalas'];

	$faringe= $dataHis['his_faringe'];

	$adenoides= $dataHis['his_adenoides'];

	$secrecionPost= $dataHis['his_secrecionPost'];

	$difagia= $dataHis['his_difagia'];

	$otrosRino= $dataHis['his_otrosRino'];

	$otrosRinoDescribir= $dataHis['his_otrosRinoDescribir'];

	$alientoBoca= $dataHis['his_alientoBoca'];

	$labiosBoca= $dataHis['his_labiosBoca'];

	$dientesBoca= $dataHis['his_dientesBoca'];

	$enciasBoca= $dataHis['his_enciasBoca'];

	$mucosasBoca= $dataHis['his_mucosasBoca'];

	$lenguaBoca= $dataHis['his_lenguaBoca'];

	$conductosBoca= $dataHis['his_conductosBoca'];

	$trismo= $dataHis['his_trismo'];

	$otrosBocaEx= $dataHis['his_otrosBocaEx'];

	$otrosBocaDescribirEx= $dataHis['his_otrosBocaDescribirEx'];

	$movilidadCuello= $dataHis['his_movilidadCuello'];

	$tumoracionCuello= $dataHis['his_tumoracionCuello'];

	$tiroidesCuello= $dataHis['his_tiroidesCuello'];

	$vasosCuello= $dataHis['his_vasosCuello'];

	$traqueaCuello= $dataHis['his_traqueaCuello'];

	$otrosCuello= $dataHis['his_otrosCuello'];

	$otrosCuelloDescribir= $dataHis['his_otrosCuelloDescribir']; 

	$cervicales= $dataHis['his_cervicales'];

	$occipitales= $dataHis['his_occipitales'];

	$supraclaviculares= $dataHis['his_supraclaviculares'];

	$axilares= $dataHis['his_axilares'];

	$inguinales= $dataHis['his_inguinales'];

	$epitroclares= $dataHis['his_epitroclares'];

	$otrosGanglios= $dataHis['his_otrosGanglios'];

	$otrosGangliosDescribir= $dataHis['his_otrosGangliosDescribir'];

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

         <form class="form-vertical" id="formHistoria" action="historiaParte5.php">
         <input name="us_id" type="hidden" value="<?php echo $us_id ?>" />
        <?php if ($estadoGeneralEx == 1) { ?>
         <h5>Estado general</h5>
         <div class="control-group-inline">
         <?php if ($condicionesGral == 1) {$condicionesGral="checked"; } ?>
         <?php if ($nutricionGral == 1) {$nutricionGral="checked"; } ?>
         <?php if ($desarrolloGral == 1) {$desarrolloGral="checked"; } ?>
         <?php if ($otrosGral == 1) {$otrosGral="checked"; } ?>      

	  		<input type="checkbox" name="condicionesGral" id="condicionesGral" value="1" <?php echo $condicionesGral ?>/> 
            Condiciones generales &nbsp; &nbsp;
            <input type="checkbox" name="nutricionGral" id="nutricionGral" value="1" <?php echo $nutricionGral ?>/> 
            Porcentaje de nutrición &nbsp; &nbsp;
            <input type="checkbox" name="desarrolloGral" id="desarrolloGral" value="1" <?php echo $desarrolloGral ?>/> 
            Desarrollo &nbsp; &nbsp;
            <input type="checkbox" name="otrosGral" id="otrosGral" value="1" <?php echo $otrosGral ?>/> 
            Otros &nbsp; &nbsp;
            <p></p>
            <input name="otrosGralDescribir" type="text" class="span4" id="otrosGralDescribir"  maxlength="400" placeholder="Otro exámen de estado general" style="width: 97%;" value="<?php echo $otrosGralDescribir ?>"/> 
        </div>
        <p></p>
        <?php } ?>
        <?php if ($pielPandiculoEx == 1) { ?>
        <h5>Piel pandiculo adiposo y faneras</h5>
        <div class="control-group-inline">
         <?php if ($colorExPiel == 1) {$colorExPiel="checked"; } ?>
         <?php if ($humedadExPiel == 1) {$humedadExPiel="checked"; } ?>
         <?php if ($hidratacionExPiel == 1) {$hidratacionExPiel="checked"; } ?>
         <?php if ($contexturaExPiel == 1) {$contexturaExPiel="checked"; } ?>
         <?php if ($pigmentacionExPiel == 1) {$pigmentacionExPiel="checked"; } ?>
         <?php if ($equimosisExPiel == 1) {$equimosisExPiel="checked"; } ?>
         <?php if ($petequiasExPiel == 1) {$petequiasExPiel="checked"; } ?>
         <?php if ($cianosisExPiel == 1) {$cianosisExPiel="checked"; } ?>
         <?php if ($erupcionExPiel == 1) {$erupcionExPiel="checked"; } ?>
         <?php if ($paniculoExPiel == 1) {$paniculoExPiel="checked"; } ?>
         <?php if ($turgorExPiel == 1) {$turgorExPiel="checked"; } ?>
         <?php if ($edemaExPiel == 1) {$edemaExPiel="checked"; } ?>
         <?php if ($unasExPiel == 1) {$unasExPiel="checked"; } ?>
         <?php if ($nodulosExPiel == 1) {$nodulosExPiel="checked"; } ?>
         <?php if ($pelosExPiel == 1) {$pelosExPiel="checked"; } ?>
         <?php if ($vascularizacionExPiel == 1) {$vascularizacionExPiel="checked"; } ?>
         <?php if ($cicatricesExPiel == 1) {$cicatricesExPiel="checked"; } ?>
         <?php if ($ulcerasExPiel == 1) {$ulcerasExPiel="checked"; } ?>
         <?php if ($fistulasExPiel == 1) {$fistulasExPiel="checked"; } ?>
         <?php if ($otrosExPiel == 1) {$otrosExPiel="checked"; } ?>

	  		<input type="checkbox" name="colorExPiel" id="colorExPiel" value="1" <?php echo $colorExPiel ?>/> 
            Color &nbsp; &nbsp;
            <input type="checkbox" name="humedadExPiel" id="humedadExPiel" value="1" <?php echo $humedadExPiel ?>/> 
            Humedad &nbsp; &nbsp;
            <input type="checkbox" name="hidratacionExPiel" id="hidratacionExPiel" value="1" <?php echo $hidratacionExPiel ?>/> 
            Hidratación &nbsp; &nbsp;
            <input type="checkbox" name="contexturaExPiel" id="contexturaExPiel" value="1" <?php echo $contexturaExPiel ?>/> 
            Contextura &nbsp; &nbsp; 
            <input type="checkbox" name="pigmentacionExPiel" id="pigmentacionExPiel" value="1" <?php echo $pigmentacionExPiel ?>/> 
            Pigmentación &nbsp; &nbsp;
            <input type="checkbox" name="equimosisExPiel" id="equimosisExPiel" value="1" <?php echo $equimosisExPiel ?>/> 
            Equimosis &nbsp; &nbsp;
            <input type="checkbox" name="petequiasExPiel" id="petequiasExPiel" value="1" <?php echo $petequiasExPiel ?>/> 
            Petequias &nbsp; &nbsp;
            <input type="checkbox" name="cianosisExPiel" id="cianosisExPiel" value="1" <?php echo $cianosisExPiel ?>/> 
            Cianosis &nbsp; &nbsp;   
            <input type="checkbox" name="erupcionExPiel" id="erupcionExPiel" value="1" <?php echo $erupcionExPiel ?>/> 
            Erupción &nbsp; &nbsp;
            <input type="checkbox" name="paniculoExPiel" id="paniculoExPiel" value="1" <?php echo $paniculoExPiel ?>/> 
            Panículo adiposo &nbsp; &nbsp;
            <input type="checkbox" name="turgorExPiel" id="turgorExPiel" value="1" <?php echo $turgorExPiel ?>/> 
            Turgor &nbsp; &nbsp;
            <input type="checkbox" name="edemaExPiel" id="edemaExPiel" value="1" <?php echo $edemaExPiel ?>/> 
            Edema &nbsp; &nbsp; 
            <input type="checkbox" name="unasExPiel" id="unasExPiel" value="1" <?php echo $unasExPiel ?>/> 
            Uñas &nbsp; &nbsp;
            <input type="checkbox" name="nodulosExPiel" id="nodulosExPiel" value="1" <?php echo $nodulosExPiel ?>/> 
            Nódulos &nbsp; &nbsp;
            <input type="checkbox" name="pelosExPiel" id="pelosExPiel" value="1" <?php echo $pelosExPiel ?>/> 
            Pelos &nbsp; &nbsp;
            <input type="checkbox" name="vascularizacionExPiel" id="vascularizacionExPiel" value="1" <?php echo $vascularizacionExPiel ?>/> 
            Vascularización &nbsp; &nbsp;        
            <input type="checkbox" name="cicatricesExPiel" id="cicatricesExPiel" value="1" <?php echo $cicatricesExPiel ?>/> 
            Cicatrices &nbsp; &nbsp;
            <input type="checkbox" name="ulcerasExPiel" id="ulcerasExPiel" value="1" <?php echo $ulcerasExPiel ?>/> 
            Ulceras &nbsp; &nbsp;
            <input type="checkbox" name="fistulasExPiel" id="fistulasExPiel" value="1" <?php echo $fistulasExPiel ?>/> 
            Fístulas &nbsp; &nbsp;
            <input type="checkbox" name="otrosExPiel" id="otrosExPiel" value="1" <?php echo $otrosExPiel ?>/> 
            Otros &nbsp; &nbsp;    
            <p></p>
            <input name="otrosExPielDescribir" type="text" class="span4" id="otrosExPielDescribir"  maxlength="400" placeholder="Otro exámen de piel" style="width: 97%;" value="<?php echo $otrosExPielDescribir ?>"/> 
        </div>
        <p></p>
        <?php } ?>
        <?php if ($cabezaEx == 1) { ?>
        <h5>Cabeza</h5>
        <div class="control-group-inline">
         <?php if ($configuracion == 1) {$configuracion="checked"; } ?>
         <?php if ($fontanelas == 1) {$fontanelas="checked"; } ?>
         <?php if ($suturas == 1) {$suturas="checked"; } ?>
         <?php if ($circunferencia == 1) {$circunferencia="checked"; } ?>
         <?php if ($craneotabes == 1) {$craneotabes="checked"; } ?>
         <?php if ($cabellos == 1) {$cabellos="checked"; } ?>
         <?php if ($dolorExCabeza == 1) {$dolorExCabeza="checked"; } ?>         
         <?php if ($otrosExCabeza == 1) {$otrosExCabeza="checked"; } ?>         

	  		<input type="checkbox" name="configuracion" id="configuracion" value="1" <?php echo $configuracion ?>/> 
            Configuración &nbsp; &nbsp;
            <input type="checkbox" name="fontanelas" id="fontanelas" value="1" <?php echo $fontanelas ?>/> 
            Fontanelas &nbsp; &nbsp;
            <input type="checkbox" name="suturas" id="suturas" value="1" <?php echo $suturas ?>/> 
            Suturas &nbsp; &nbsp;
            <input type="checkbox" name="circunferencia" id="circunferencia" value="1" <?php echo $circunferencia ?>/> 
            Circunferencia &nbsp; &nbsp;
            <input type="checkbox" name="craneotabes" id="craneotabes" value="1" <?php echo $craneotabes ?>/> 
            Craneotabes &nbsp; &nbsp;
            <input type="checkbox" name="cabellos" id="cabellos" value="1" <?php echo $cabellos ?>/> 
            Cabellos &nbsp; &nbsp;
            <input type="checkbox" name="dolorExCabeza" id="dolorExCabeza" value="1" <?php echo $dolorExCabeza ?>/> 
            Dolor &nbsp; &nbsp;
            <input type="checkbox" name="otrosExCabeza" id="otrosExCabeza" value="1" <?php echo $otrosExCabeza ?>/> 
            Otros &nbsp; &nbsp;
            <p></p>
            <input name="otrosExCabezaDescribir" type="text" class="span4" id="otrosExCabezaDescribir"  maxlength="400" placeholder="Otro exámen de cabeza" style="width: 97%;" value="<?php echo $otrosExCabezaDescribir ?>"/> 
        </div>
        <p></p>
        <?php } ?>
        <?php if ($ojosEx == 1) { ?>
        <h5>Ojos</h5>
        <div class="control-group-inline">
         <?php if ($conjuntivas == 1) {$conjuntivas="checked"; } ?>
         <?php if ($esclerotica == 1) {$esclerotica="checked"; } ?>
         <?php if ($cornea == 1) {$cornea="checked"; } ?>
         <?php if ($pupilas == 1) {$pupilas="checked"; } ?>
         <?php if ($movimientos == 1) {$movimientos="checked"; } ?>
         <?php if ($desviaciones == 1) {$desviaciones="checked"; } ?>
         <?php if ($nistagmusEx == 1) {$nistagmusEx="checked"; } ?>
         <?php if ($ptosis == 1) {$ptosis="checked"; } ?>
         <?php if ($exoftaimos == 1) {$exoftaimos="checked"; } ?>
         <?php if ($oftalmoscopicos == 1) {$oftalmoscopicos="checked"; } ?>
         <?php if ($otrosOjosEx == 1) {$otrosOjosEx="checked"; } ?>           
	  		<input type="checkbox" name="conjuntivas" id="conjuntivas" value="1" <?php echo $conjuntivas ?>/> 
            Conjuntivas &nbsp; &nbsp;
            <input type="checkbox" name="esclerotica" id="esclerotica" value="1" <?php echo $esclerotica ?>/> 
            Esclerótica &nbsp; &nbsp;
            <input type="checkbox" name="cornea" id="cornea" value="1" <?php echo $cornea ?>/> 
            Córnea &nbsp; &nbsp;
            <input type="checkbox" name="pupilas" id="pupilas" value="1" <?php echo $pupilas ?>/> 
            Pupilas &nbsp; &nbsp;
            <input type="checkbox" name="movimientos" id="movimientos" value="1" <?php echo $movimientos ?>/> 
            Movimientos &nbsp; &nbsp;
            <input type="checkbox" name="desviaciones" id="desviaciones" value="1" <?php echo $desviaciones ?>/> 
            Desviaciones &nbsp; &nbsp;
            <input type="checkbox" name="nistagmusEx" id="nistagmusEx" value="1" <?php echo $nistagmusEx ?>/> 
            Nistagmus &nbsp; &nbsp;
            <input type="checkbox" name="ptosis" id="ptosis" value="1" <?php echo $ptosis ?>/> 
            Ptosis &nbsp; &nbsp;
            <input type="checkbox" name="exoftaimos" id="exoftaimos" value="1" <?php echo $exoftaimos ?>/> 
            Exoftaimos &nbsp; &nbsp;
            <input type="checkbox" name="oftalmoscopicos" id="oftalmoscopicos" value="1" <?php echo $oftalmoscopicos ?>/> 
            Oftalmoscópicos &nbsp; &nbsp;
            <input type="checkbox" name="otrosOjosEx" id="otrosOjosEx" value="1" <?php echo $otrosOjosEx ?>/> 
            Otros &nbsp; &nbsp;
            <p></p>
            <input name="otrosOjosDescribirEx" type="text" class="span4" id="otrosOjosDescribirEx"  maxlength="400" placeholder="Otro exámen de ojos" style="width: 97%;" value="<?php echo $otrosOjosDescribirEx ?>"/> 
        </div>
        <p></p>
        <?php } ?>
        <?php if ($oidosEx == 1) { ?>
        <h5>Oidos</h5>
         <?php if ($pabellon == 1) {$pabellon="checked"; } ?>  
         <?php if ($canal == 1) {$canal="checked"; } ?>  
         <?php if ($timpano == 1) {$timpano="checked"; } ?>  
         <?php if ($audicion == 1) {$audicion="checked"; } ?>  
         <?php if ($secrecionesEx == 1) {$secrecionesEx="checked"; } ?>  
         <?php if ($mastoides == 1) {$mastoides="checked"; } ?>
         <?php if ($dolorExOidos == 1) {$dolorExOidos="checked"; } ?>  
         <?php if ($otrosExOidos == 1) {$otrosExOidos="checked"; } ?>  
        <div class="control-group-inline">
	  		<input type="checkbox" name="pabellon" id="pabellon" value="1" <?php echo $pabellon ?>/> 
            Pabellón &nbsp; &nbsp;
            <input type="checkbox" name="canal" id="canal" value="1" <?php echo $canal ?>/> 
            Canal externo &nbsp; &nbsp;
            <input type="checkbox" name="timpano" id="timpano" value="1" <?php echo $timpano ?>/> 
            Tímpano &nbsp; &nbsp;
            <input type="checkbox" name="audicion" id="audicion" value="1" <?php echo $audicion ?>/> 
            Audición &nbsp; &nbsp;
            <input type="checkbox" name="secrecionesEx" id="secrecionesEx" value="1" <?php echo $secrecionesEx ?>/> 
            Secreciones &nbsp; &nbsp;
            <input type="checkbox" name="mastoides" id="mastoides" value="1" <?php echo $mastoides ?>/> 
            Mastoides &nbsp; &nbsp;
            <input type="checkbox" name="dolorExOidos" id="dolorExOidos" value="1" <?php echo $dolorExOidos ?>/> 
            Dolor &nbsp; &nbsp;
            <input type="checkbox" name="otrosExOidos" id="otrosExOidos" value="1" <?php echo $otrosExOidos ?>/> 
            Otros &nbsp; &nbsp;
            <p></p>
            <input name="otrosExOidosDescribir" type="text" class="span4" id="otrosExOidosDescribir"  maxlength="400" placeholder="Otro exámen de oidos" style="width: 97%;" value="<?php echo $otrosExOidosDescribir ?>"/> 
        </div>
        <p></p>
         <?php } ?>
         <?php if ($rinofaringeEx == 1) { ?>
         <h5>Rinofaringe</h5>
         <?php if ($fosas == 1) {$fosas="checked"; } ?>
         <?php if ($mucosasRino == 1) {$mucosasRino="checked"; } ?>
         <?php if ($secrecionRino == 1) {$secrecionRino="checked"; } ?>
         <?php if ($tabique == 1) {$tabique="checked"; } ?>
         <?php if ($seno == 1) {$seno="checked"; } ?>
         <?php if ($diafanoscopia == 1) {$diafanoscopia="checked"; } ?>
         <?php if ($amigdalas == 1) {$amigdalas="checked"; } ?>
         <?php if ($faringe == 1) {$faringe="checked"; } ?>
         <?php if ($adenoides == 1) {$adenoides="checked"; } ?>
         <?php if ($secrecionPost == 1) {$secrecionPost="checked"; } ?>
         <?php if ($difagia == 1) {$difagia="checked"; } ?>
         <?php if ($otrosRino == 1) {$otrosRino="checked"; } ?>         
        <div class="control-group-inline">
	  		<input type="checkbox" name="fosas" id="fosas" value="1" <?php echo $fosas ?>/> 
            Fosas nasales &nbsp; &nbsp;
            <input type="checkbox" name="mucosasRino" id="mucosasRino" value="1" <?php echo $mucosasRino ?>/> 
            Mucosas &nbsp; &nbsp;
            <input type="checkbox" name="secrecionRino" id="secrecionRino" value="1" <?php echo $secrecionRino ?>/> 
            Secreción nasal &nbsp; &nbsp;
            <input type="checkbox" name="tabique" id="tabique" value="1" <?php echo $tabique ?>/> 
            Tabique &nbsp; &nbsp;
            <input type="checkbox" name="seno" id="seno" value="1" <?php echo $seno ?>/> 
            Seno accesorios &nbsp; &nbsp;
            <input type="checkbox" name="diafanoscopia" id="diafanoscopia" value="1" <?php echo $diafanoscopia ?>/> 
            Diafanoscopia &nbsp; &nbsp;
            <input type="checkbox" name="amigdalas" id="amigdalas" value="1" <?php echo $amigdalas ?>/> 
            Amigdalas &nbsp; &nbsp;
            <input type="checkbox" name="faringe" id="faringe" value="1" <?php echo $faringe ?>/> 
            Faringe &nbsp; &nbsp;
            <input type="checkbox" name="adenoides" id="adenoides" value="1" <?php echo $adenoides ?>/> 
            Adenoides &nbsp; &nbsp;
            <input type="checkbox" name="secrecionPost" id="secrecionPost" value="1" <?php echo $secrecionPost ?>/> 
            Secreción postnasal &nbsp; &nbsp;
            <input type="checkbox" name="difagia" id="difagia" value="1" <?php echo $difagia ?>/> 
            Difagia &nbsp; &nbsp;
            <input type="checkbox" name="otrosRino" id="otrosRino" value="1" <?php echo $otrosRino ?>/> 
            Otros &nbsp; &nbsp;
            <p></p>
            <input name="otrosRinoDescribir" type="text" class="span4" id="otrosRinoDescribir"  maxlength="400" placeholder="Otro exámen de rinofaringe" style="width: 97%;" value="<?php echo $otrosRinoDescribir ?>"/> 
        </div>
        <p></p>
        <?php } ?>

        <?php if ($bocaEx == 1) { ?> 
        <h5>Boca</h5>
         <?php if ($alientoBoca == 1) {$alientoBoca="checked"; } ?>
         <?php if ($labiosBoca == 1) {$labiosBoca="checked"; } ?>
         <?php if ($dientesBoca == 1) {$dientesBoca="checked"; } ?>
         <?php if ($enciasBoca == 1) {$enciasBoca="checked"; } ?>
         <?php if ($mucosasBoca == 1) {$mucosasBoca="checked"; } ?>
         <?php if ($lenguaBoca == 1) {$lenguaBoca="checked"; } ?>
         <?php if ($conductosBoca == 1) {$conductosBoca="checked"; } ?>
         <?php if ($trismo == 1) {$trismo="checked"; } ?>
         <?php if ($otrosBocaEx == 1) {$otrosBocaEx="checked"; } ?>         
        <div class="control-group-inline">
	  		<input type="checkbox" name="alientoBoca" id="alientoBoca" value="1" <?php echo $alientoBoca ?>/> 
            Aliento &nbsp; &nbsp;
            <input type="checkbox" name="labiosBoca" id="labiosBoca" value="1" <?php echo $labiosBoca ?>/> 
            Labios &nbsp; &nbsp;
            <input type="checkbox" name="dientesBoca" id="dientesBoca" value="1" <?php echo $dientesBoca ?>/> 
            Dientes &nbsp; &nbsp;
            <input type="checkbox" name="enciasBoca" id="enciasBoca" value="1" <?php echo $enciasBoca ?>/> 
            Encias &nbsp; &nbsp;
            <input type="checkbox" name="mucosasBoca" id="mucosasBoca" value="1" <?php echo $mucosasBoca ?>/> 
            Mucosas &nbsp; &nbsp;
            <input type="checkbox" name="lenguaBoca" id="lenguaBoca" value="1" <?php echo $lenguaBoca ?>/> 
            Lengua &nbsp; &nbsp;
            <input type="checkbox" name="conductosBoca" id="conductosBoca" value="1" <?php echo $conductosBoca ?>/> 
            Conductos salivares &nbsp; &nbsp;
            <input type="checkbox" name="trismo" id="trismo" value="1" <?php echo $trismo ?>/> 
            Parálisis y trismo &nbsp; &nbsp;
            <input type="checkbox" name="otrosBocaEx" id="otrosBocaEx" value="1" <?php echo $otrosBocaEx ?>/> 
            Otros &nbsp; &nbsp;
            <p></p>
            <input name="otrosBocaDescribirEx" type="text" class="span4" id="otrosBocaDescribirEx"  maxlength="400" placeholder="Otro exámen de boca" style="width: 97%;" value="<?php echo $otrosBocaDescribirEx ?>"/> 
        </div>
        <p></p>
        <?php } ?>
        <?php if ($cuelloEx == 1) { ?>
        <h5>Cuello</h5>
         <?php if ($movilidadCuello == 1) {$movilidadCuello="checked"; } ?>
         <?php if ($tumoracionCuello == 1) {$tumoracionCuello="checked"; } ?>
         <?php if ($tiroidesCuello == 1) {$tiroidesCuello="checked"; } ?>
         <?php if ($vasosCuello == 1) {$vasosCuello="checked"; } ?>
         <?php if ($traqueaCuello == 1) {$traqueaCuello="checked"; } ?>
         <?php if ($otrosCuello == 1) {$otrosCuello="checked"; } ?>        
        <div class="control-group-inline">
	  		<input type="checkbox" name="movilidadCuello" id="movilidadCuello" value="1" <?php echo $movilidadCuello ?>/> 
            Movilidad &nbsp; &nbsp;
            <input type="checkbox" name="tumoracionCuello" id="tumoracionCuello" value="1" <?php echo $tumoracionCuello ?>/> 
            Tumoración &nbsp; &nbsp;
            <input type="checkbox" name="tiroidesCuello" id="tiroidesCuello" value="1" <?php echo $tiroidesCuello ?>/> 
            Tiroides &nbsp; &nbsp;
            <input type="checkbox" name="vasosCuello" id="vasosCuello" value="1" <?php echo $vasosCuello ?>/> 
            Vasos &nbsp; &nbsp;
            <input type="checkbox" name="traqueaCuello" id="traqueaCuello" value="1" <?php echo $traqueaCuello ?>/> 
            Tráquea &nbsp; &nbsp;
            <input type="checkbox" name="otrosCuello" id="otrosCuello" value="1" <?php echo $otrosCuello ?>/> 
            Otros &nbsp; &nbsp;
            <p></p>
            <input name="otrosCuelloDescribir" type="text" class="span4" id="otrosCuelloDescribir"  maxlength="400" placeholder="Otro exámen de cuello" style="width: 97%;" value="<?php echo $otrosCuelloDescribir ?>"/> 
        </div>
        <p></p>
        <?php } ?>
        <?php if ($gangliosEx == 1) { ?>
        <h5>Ganglios linfáticos</h5>
         <?php if ($cervicales == 1) {$cervicales="checked"; } ?>
         <?php if ($occipitales == 1) {$occipitales="checked"; } ?>
         <?php if ($supraclaviculares == 1) {$supraclaviculares="checked"; } ?>
         <?php if ($axilares == 1) {$axilares="checked"; } ?> 
         <?php if ($inguinales == 1) {$inguinales="checked"; } ?> 
         <?php if ($epitroclares == 1) {$epitroclares="checked"; } ?>
         <?php if ($otrosGanglios == 1) {$otrosGanglios="checked"; } ?>
        <div class="control-group-inline">
	  		<input type="checkbox" name="cervicales" id="cervicales" value="1" <?php echo $cervicales ?>/> 
            Cervicales &nbsp; &nbsp;
            <input type="checkbox" name="occipitales" id="occipitales" value="1" <?php echo $occipitales ?>/> 
            Occipitales &nbsp; &nbsp;
            <input type="checkbox" name="supraclaviculares" id="supraclaviculares" value="1" <?php echo $supraclaviculares ?>/> 
            Supraclaviculares &nbsp; &nbsp;
            <input type="checkbox" name="axilares" id="axilares" value="1" <?php echo $axilares ?>/> 
            Axilares &nbsp; &nbsp;
            <input type="checkbox" name="inguinales" id="inguinales" value="1" <?php echo $inguinales ?>/> 
            Inguinales &nbsp; &nbsp;
            <input type="checkbox" name="epitroclares" id="epitroclares" value="1" <?php echo $epitroclares ?>/> 
            Epitroclares &nbsp; &nbsp;
            <input type="checkbox" name="otrosGanglios" id="otrosGanglios" value="1" <?php echo $otrosGanglios ?>/> 
            Otros &nbsp; &nbsp;
            <p></p>
            <input name="otrosGangliosDescribir" type="text" class="span4" id="otrosGangliosDescribir"  maxlength="400" placeholder="Otro exámen de ganglios" style="width: 97%;" value="<?php echo $otrosGangliosDescribir ?>"/> 
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