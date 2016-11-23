<?php 
session_start();
include "lib/corelib.php";
require_once('tools/mypathdb.php');
//include "lib/class/classPerfil.php";
error_reporting(0);
$_SESSION['valor'] = 4; //Activa la opcion del menu actual
include "headers/header.php";

?>
<script Language="JavaScript">
	$(document).ready(function() {
		$('#titulo').html("inicio / mi perfil / configuración de historias");
		//$('#contenido').load('registrarDrVista.php');		
		  
	});
	

    //Metodo para cargar los datos personales
    $("body").on('submit', '#formHistoria', function(event) {
		event.preventDefault()
		if ($('#formHistoria').valid()) {
			$.ajax({
				type: "POST",
				url: "configuracion_procesar.php",
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
						window.location.href='configuracion_Lista.php'; 
					  }, 1000);
					}
					
					if (respuesta.exito == 2) {
						$('#exito2').show();
						setTimeout(function() {
						$('#exito2').hide();
						window.location.href='configuracion_Lista.php'; 
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
      <h2>
        <small>Seleccione las opciones que quiere ver en la historia y/o desabilite las que no desee.</small>
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
		<div class="control-group-inline">
            <h2 class="section-title">
            <?php if ($historiaFamiliar == 1) {$historiaFamiliar="checked"; } ?>
            <?php if ($antecedentesPrenatales == 1) {$antecedentesPrenatales="checked"; } ?>
            <?php if ($periodoNeonatal == 1) {$periodoNeonatal="checked"; } ?>
            <?php if ($alimentacion == 1) {$alimentacion="checked"; } ?>
            <?php if ($desarrollo == 1) {$desarrollo="checked"; } ?>
            <?php if ($habitos == 1) {$habitos="checked"; } ?>
            <?php if ($inmunizaciones == 1) {$inmunizaciones="checked"; } ?>
            <?php if ($contactosTBC == 1) {$contactosTBC="checked"; } ?>
            <?php if ($antecedentesEpi == 1) {$antecedentesEpi="checked"; } ?>
            <?php if ($general == 1) {$general="checked"; } ?>
            <?php if ($piel == 1) {$piel="checked"; } ?>
            <?php if ($cabeza == 1) {$cabeza="checked"; } ?>
            <?php if ($ojos == 1) {$ojos="checked"; } ?>
            <?php if ($oidos == 1) {$oidos="checked"; } ?>
            <?php if ($nariz == 1) {$nariz="checked"; } ?>
            <?php if ($boca == 1) {$boca="checked"; } ?>
            <?php if ($garganta == 1) {$garganta="checked"; } ?>
            <?php if ($respiratorio == 1) {$respiratorio="checked"; } ?>
            <?php if ($digestivo == 1) {$digestivo="checked"; } ?>
            <?php if ($circulatorio == 1) {$circulatorio="checked"; } ?>
            <?php if ($genitourinario == 1) {$genitourinario="checked"; } ?>
            <?php if ($muscularOsteoArticular == 1) {$muscularOsteoArticular="checked"; } ?>
            <?php if ($nerviosoMental == 1) {$nerviosoMental="checked"; } ?>
            <?php if ($estadoGeneralEx == 1) {$estadoGeneralEx="checked"; } ?>
            <?php if ($pielPandiculoEx == 1) {$pielPandiculoEx="checked"; } ?>
            <?php if ($cabezaEx == 1) {$cabezaEx="checked"; } ?>
            <?php if ($ojosEx == 1) {$ojosEx="checked"; } ?>
            <?php if ($oidosEx == 1) {$oidosEx="checked"; } ?>
            <?php if ($rinofaringeEx == 1) {$rinofaringeEx="checked"; } ?>
            <?php if ($bocaEx == 1) {$bocaEx="checked"; } ?>
            <?php if ($cuelloEx == 1) {$cuelloEx="checked"; } ?>
            <?php if ($gangliosEx == 1) {$gangliosEx="checked"; } ?>
            <?php if ($toraxPulmonesEx == 1) {$toraxPulmonesEx="checked"; } ?>
            <?php if ($corazonVasosEx == 1) {$corazonVasosEx="checked"; } ?>
            <?php if ($abdomenEx == 1) {$abdomenEx="checked"; } ?>
            <?php if ($urinarioEx == 1) {$urinarioEx="checked"; } ?>
            <?php if ($genitalesEx == 1) {$genitalesEx="checked"; } ?>
            <?php if ($anoRectoEx == 1) {$anoRectoEx="checked"; } ?>
            <?php if ($huesosEx == 1) {$huesosEx="checked"; } ?>
            <?php if ($neurologicosEx == 1) {$neurologicosEx="checked"; } ?>
            <?php if ($sensorialesEx == 1) {$sensorialesEx="checked"; } ?>
            
            <input name="historiaFamiliar" type="checkbox" id="historiaFamiliar" value="1" <?php echo $historiaFamiliar ?>/>  Historia familiar
      		</h2>
            <fieldset disabled>           	
	  		Edad y estado de salud de los padres y hermanos si viven juntos
            <textarea name="edadSaludPadresHermanos" type="text" class="span4" id="edadSaludPadresHermanos"  maxlength="400" style="width: 97%;"><?php echo $edadSaludPadresHermanos ?></textarea>
		  	Estado de salud de otros cohabitantes <textarea name="edadSaludOtros" type="text" class="span4" id="edadSaludOtros"  maxlength="400" placeholder="Indicar parentesco" style="width: 97%;"><?php echo $edadSaludOtros ?></textarea><p></p>
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
        </fieldset>    
        </div>
        <p></p>
        
        <h2 class="section-title">
            <input type="checkbox" name="antecedentesPrenatales" id="antecedentesPrenatales" value="1" <?php echo $antecedentesPrenatales ?>/>  Antecedentes prenatales y obstétricos
      	</h2>        
        <div class="control-group-inline">
        <fieldset disabled>
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
        </fieldset>
        </div>
        <p></p>        
        <h2 class="section-title">
            <input type="checkbox" name="periodoNeonatal" id="periodoNeonatal" value="1" <?php echo $periodoNeonatal ?>/>  Antecedentes personales - Período neonatal
      	</h2>        
        <div class="control-group-inline">
        <fieldset disabled>
        	<input name="peso" type="text" id="peso" size="5" maxlength="5" value="<?php echo $peso ?>" />
            Peso al nacer &nbsp; &nbsp;
            <input name="talla" type="text" id="talla" size="4" maxlength="4" value="<?php echo $talla ?>"  />
            Talla al nacer &nbsp; &nbsp;
            <input type="checkbox" name="respiracion" id="respiracion" value="1" <?php echo $respiracion ?>/> 
            Respiración espontánea o artificial &nbsp; &nbsp;
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
            </fieldset>
        </div>
        <p></p>
        <h2 class="section-title">
            <input type="checkbox" name="alimentacion" id="alimentacion" value="1" <?php echo $alimentacion ?>/>  Alimentación
      	</h2>        
        <div class="control-group-inline">        
        <fieldset disabled>
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
            <input type="checkbox" name="sopa" id="sopa" value="1" <?php echo $sopa ?>/> 
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
            </fieldset>
        </div>
        <br>
        <h2 class="section-title">
            <input type="checkbox" name="desarrollo" id="desarrollo" value="1" <?php echo $desarrollo ?>/>  Desarrollo
      	</h2>        
        <div class="control-group-inline">        
        <fieldset disabled>
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
        </fieldset>
        </div>
        <h2 class="section-title">
            <input type="checkbox" name="habitos" id="habitos" value="1" <?php echo $habitos ?>/>  Hábitos
      	</h2>        
        <div class="control-group-inline">        
        <fieldset disabled>
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
            <input type="checkbox" name="ocupacion" id="ocupacion" value="1" <?php echo $ocupacion ?>/> 
            Ocupación &nbsp; &nbsp;
            <input type="checkbox" name="otrosHabitos" id="otrosHabitos" value="1" <?php echo $otrosHabitos ?>/> 
            Otros &nbsp; &nbsp;
            <p></p>
            <input name="otrosHabitosDescribir" type="text" class="span4" id="otrosHabitosDescribir"  maxlength="400" placeholder="Otros habitos" style="width: 97%;" value="<?php echo $otrosHabitosDescribir ?>" />
		<p></p>
        </fieldset>
        </div>
        <h2 class="section-title">
            <input type="checkbox" name="inmunizaciones" id="inmunizaciones" value="1" <?php echo $inmunizaciones ?>/>  Inmunizaciones y pruebas
      	</h2>        
        <div class="control-group-inline">
        <fieldset disabled>
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
        </fieldset>
        </div>
        <h2 class="section-title">
            <input type="checkbox" name="contactosTBC" id="contactosTBC" value="1" <?php echo $contactosTBC ?>/> Contactos T.B.C.
      	</h2>        
        <div class="control-group-inline">              
        <fieldset disabled>        
	  		<input type="checkbox" name="intradomiciliarios" id="intradomiciliarios" value="1" <?php echo $intradomiciliarios ?>/> 
            Intradomiciliarios &nbsp; &nbsp;
            <input type="checkbox" name="extradomiciliarios" id="extradomiciliarios" value="1" <?php echo $extradomiciliarios ?>/> 
            Extradomiciliarios &nbsp; &nbsp;
        </fieldset>    
        </div>
        <p></p>
        
<!--        //********************************************************************************************* !-->

        <h2 class="section-title">
            <input type="checkbox" name="antecedentesEpi" id="antecedentesEpi" value="1" <?php echo $antecedentesEpi ?>/> Antecedentes epimediologicos - Enfermedades
      	</h2>        
        <div class="control-group-inline">
        <fieldset disabled>
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
        </fieldset>
        </div>
        <p></p>
        <h2 class="section-title">
            <input type="checkbox" name="general" id="general" value="1" <?php echo $general ?>/> General
      	</h2>        
        <div class="control-group-inline">
        <fieldset disabled>
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
        </fieldset>
        </div>
        <p></p>
        <h2 class="section-title">
            <input type="checkbox" name="piel" id="piel" value="1" <?php echo $piel ?>/> Piel
      	</h2>        
        <div class="control-group-inline">
        <fieldset disabled>
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
        </fieldset>
        </div>
        <p></p>
        <h2 class="section-title">
            <input type="checkbox" name="cabeza" id="cabeza" value="1" <?php echo $cabeza ?>/> Cabeza
      	</h2>        
        <div class="control-group-inline">
        <fieldset disabled>
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
        </fieldset>
        </div>
        <p></p>
        <h2 class="section-title">
            <input type="checkbox" name="ojos" id="ojos" value="1" <?php echo $ojos ?>/> Ojos
      	</h2>        
        <div class="control-group-inline">
        <fieldset disabled>
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
        </fieldset>
        </div>
        <h2 class="section-title">
            <input type="checkbox" name="oidos" id="oidos" value="1" <?php echo $oidos ?>/> Oidos
      	</h2>        
		<div class="control-group-inline">
        <fieldset disabled>
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
        </fieldset>
        </div>
        <p></p>
        <h2 class="section-title">
            <input type="checkbox" name="nariz" id="nariz" value="1" <?php echo $nariz ?>/> Nariz
      	</h2>        
        <div class="control-group-inline">
        <fieldset disabled>
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
       </fieldset>
       </div>
        <p></p>
        <h2 class="section-title">
            <input type="checkbox" name="boca" id="boca" value="1" <?php echo $boca ?>/> Boca
      	</h2>        
        <div class="control-group-inline">
        <fieldset disabled>
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
        </fieldset>
        </div>
        <p></p>
        <h2 class="section-title">
            <input type="checkbox" name="garganta" id="garganta" value="1" <?php echo $garganta ?>/> Garganta
      	</h2>        
        <div class="control-group-inline">
        <fieldset disabled>
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
        </fieldset>
        </div>
        <p></p>
        <h2 class="section-title">
            <input type="checkbox" name="respiratorio" id="respiratorio" value="1" <?php echo $respiratorio ?>/> Respiratorio
      	</h2>        
        <div class="control-group-inline">
        <fieldset disabled>
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
        </fieldset>
        </div>
        <p></p>
        <h2 class="section-title">
            <input type="checkbox" name="digestivo" id="digestivo" value="1" <?php echo $digestivo ?>/> Digestivo
      	</h2>        
        <div class="control-group-inline">
        <fieldset disabled>
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
       </fieldset>
       </div>
        <p></p>
        <h2 class="section-title">
            <input type="checkbox" name="circulatorio" id="circulatorio" value="1" <?php echo $circulatorio ?>/> Circulatorio
      	</h2>        
        <div class="control-group-inline">
        <fieldset disabled>
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
       </fieldset>
       </div>
        <p></p>
        <h2 class="section-title">
            <input type="checkbox" name="genitourinario" id="genitourinario" value="1" <?php echo $genitourinario ?>/> Genitourinario
      	</h2>        
        <div class="control-group-inline">
        <fieldset disabled>
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
        </fieldset>
        </div>
        <p></p>
        <h2 class="section-title">
            <input type="checkbox" name="muscularOsteoArticular" id="muscularOsteoArticular" value="1" <?php echo $muscularOsteoArticular ?>/> Muscular y osteo-articular
      	</h2>        
		<div class="control-group-inline">
        <fieldset disabled>
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
        </fieldset>
        </div>
        <p></p>
        <h2 class="section-title">
            <input type="checkbox" name="nerviosoMental" id="nerviosoMental" value="1" <?php echo $nerviosoMental ?>/> Nervioso y mental
      	</h2>        
        <div class="control-group-inline">
        <fieldset disabled>
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
        </fieldset>
        </div>
        <p></p>
        
        <!--*******************************************************************************************!-->
        <h2 align="center">
        EXAMEN FISICO
        <small>(Datos objetivos)</small>
      	</h2>
        <h2 class="section-title">
            <input type="checkbox" name="estadoGeneralEx" id="estadoGeneralEx" value="1" <?php echo $estadoGeneralEx ?>/> Estado general
      	</h2>        
        <div class="control-group-inline">
        <fieldset disabled>
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
        </fieldset>
        </div>
        <p></p>        
        <h2 class="section-title">
            <input type="checkbox" name="pielPandiculoEx" id="pielPandiculoEx" value="1" <?php echo $pielPandiculoEx ?>/> Piel pandiculo adiposo y faneras
      	</h2>        
        <div class="control-group-inline">        
        <fieldset disabled>        
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
        </fieldset>
        </div>
        <p></p>        
        <h2 class="section-title">
            <input type="checkbox" name="cabezaEx" id="cabezaEx" value="1" <?php echo $cabezaEx ?>/> Cabeza
      	</h2>        
        <div class="control-group-inline">        
        <fieldset disabled>        
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
        </fieldset>
        </div>
        <p></p>        
        <h2 class="section-title">
            <input type="checkbox" name="ojosEx" id="ojosEx" value="1" <?php echo $ojosEx ?>/> Ojos
      	</h2>        
        <div class="control-group-inline">        
        <fieldset disabled>  
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
        </fieldset>
        </div>
        <p></p>        
        <h2 class="section-title">
            <input type="checkbox" name="oidosEx" id="oidosEx" value="1" <?php echo $oidosEx ?>/> Oidos
      	</h2>        
        <div class="control-group-inline">        
        <fieldset disabled> 
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
        </fieldset>
        </div>
        <p></p>        
        <h2 class="section-title">
            <input type="checkbox" name="rinofaringeEx" id="rinofaringeEx" value="1" <?php echo $rinofaringeEx ?>/> Rinofaringe
      	</h2>        
        <div class="control-group-inline">        
        <fieldset disabled> 
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
        </fieldset>
        </div>
        <p></p>        
        <h2 class="section-title">
            <input type="checkbox" name="bocaEx" id="bocaEx" value="1" <?php echo $bocaEx ?>/> Boca
      	</h2>        
        <div class="control-group-inline">        
        <fieldset disabled> 
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
        </fieldset>
        </div>
        <p></p>        
        <h2 class="section-title">
            <input type="checkbox" name="cuelloEx" id="cuelloEx" value="1" <?php echo $cuelloEx ?>/> Cuello
      	</h2>        
        <div class="control-group-inline">        
        <fieldset disabled>
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
        </fieldset>
        </div>
        <p></p>        
        <h2 class="section-title">
            <input type="checkbox" name="gangliosEx" id="gangliosEx" value="1" <?php echo $gangliosEx ?>/> Ganglios linfáticos
      	</h2>        
        <div class="control-group-inline">        
        <fieldset disabled>
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
        </fieldset>
        </div>
        <p></p>
        <!--****************************************************************************************!-->
        <h2 class="section-title">
            <input type="checkbox" name="toraxPulmonesEx" id="toraxPulmonesEx" value="1" <?php echo $toraxPulmonesEx ?>/> Torax y pulmones
      	</h2>        
        <div class="control-group-inline">        
        <fieldset disabled>
        <input name="us_id" type="hidden" value="<?php echo $us_id ?>" />
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
        </fieldset>
        </div>
        <p></p>
        <!--****************************************************************************************!-->
        <h2 class="section-title">
            <input type="checkbox" name="corazonVasosEx" id="corazonVasosEx" value="1" <?php echo $corazonVasosEx ?>/> Corazón y vasos
      	</h2>        
        <div class="control-group-inline">        
        <fieldset disabled>
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
        </fieldset>
        </div>
        <p></p>
        <!--****************************************************************************************!-->
        <h2 class="section-title">
            <input type="checkbox" name="abdomenEx" id="abdomenEx" value="1" <?php echo $abdomenEx ?>/> Abdomen
      	</h2>        
        <div class="control-group-inline">        
        <fieldset disabled>
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
        </fieldset>
        </div>
        <p></p>
        <!--****************************************************************************************!-->
        <h2 class="section-title">
            <input type="checkbox" name="urinarioEx" id="urinarioEx" value="1" <?php echo $urinarioEx ?>/> Urinario
      	</h2>        
        <div class="control-group-inline">        
        <fieldset disabled>        
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
            <p></p>
            <input name="dolorUrinarioDescribir" type="text" class="span4" id="dolorUrinarioDescribir"  maxlength="400" placeholder="Otro antecedente urinario" style="width: 97%;" value="<?php echo $dolorUrinarioDescribir ?>"/> 
        </fieldset>
        </div>
        <p></p>
        <!--****************************************************************************************!-->
        <h2 class="section-title">
            <input type="checkbox" name="genitalesEx" id="genitalesEx" value="1" <?php echo $genitalesEx ?>/> Genitales
      	</h2>        
        <div class="control-group-inline">        
        <fieldset disabled>  
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
        </fieldset>
        </div>
        <p></p>
        <!--****************************************************************************************!-->
        <h2 class="section-title">
            <input type="checkbox" name="anoRectoEx" id="anoRectoEx" value="1" <?php echo $anoRectoEx ?>/> Ano y recto
      	</h2>        
        <div class="control-group-inline">        
        <fieldset disabled>        
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
        </fieldset>
        </div>
        <p></p>
        <!--****************************************************************************************!-->
        <h2 class="section-title">
            <input type="checkbox" name="huesosEx" id="huesosEx" value="1" <?php echo $huesosEx ?>/> Huesos, articulaciones y musculos
      	</h2>        
        <div class="control-group-inline">        
        <fieldset disabled>        
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
        </fieldset>
        </div>
        <p></p>
        <!--****************************************************************************************!-->
        <h2 class="section-title">
            <input type="checkbox" name="neurologicosEx" id="neurologicosEx" value="1" <?php echo $neurologicosEx ?>/>Neurologicos y psiquico
      	</h2>        
        <div class="control-group-inline">        
        <fieldset disabled>         
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
        </fieldset>
        </div>
        <p></p>
        <!--****************************************************************************************!-->
        <h2 class="section-title">
            <input type="checkbox" name="sensorialesEx" id="sensorialesEx" value="1" <?php echo $sensorialesEx ?>/>Sensoriales
      	</h2>        
        <div class="control-group-inline">        
        <fieldset disabled>        
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
        </fieldset>
        </div>
        <p></p>
        
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