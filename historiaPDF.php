<?php
session_start();
include "lib/corelib.php";
require_once('tools/mypathdb.php');
ob_start();
if (!empty($_GET ['id'])) 	
	{
	$us_id = $_GET ['id'];	//viene en el URL
	} else {
	$us_id = $_SESSION['us_id'];
	}
?>
<style type="text/css">
<!--
.style2 {color: #000000}
.style3 {font-size: 18px}
-->
 table.page_footer {width: 100%; border: none; background-color: rgb(17,74,97); border-top: solid 1mm rgb(238,238,238); padding: 2mm}
    table.page_header {width: 100%; border: none; background-color: rgb(17,74,97); border-bottom: solid 1mm rgb(238,238,238); padding: 2mm }
.historia {
	font-size: 9px;
}
</style>

<page backtop="28mm" backbottom="14mm" backleft="20mm" backright="10mm">
    <page_header>
  <table class="page_header">
            <tr>
                <td style="width: 33%; text-align: left; color:#999">&nbsp;&nbsp;&nbsp; <img src="includes/img/logo.png" width="81" height="41" /> tu cita médica online</td>
                <td style="width: 34%; text-align: center">&nbsp;
                </td>
                <td style="width: 33%; text-align: right">&nbsp;                    
                </td>
            </tr>
        </table>

    </page_header>
    <page_footer>
    
<?php
		$doc_id=$_SESSION['doc_id'];
		

    // ========================= Buscar la historia en tbl_historias ==========================================================
	$query="SELECT * FROM tbl_historias WHERE his_id = '$us_id' AND his_doc_id = '$doc_id'";  

	$resultado=mysql_query($query,$dbConn);
	while($dataHis=mysql_fetch_array($resultado))
	{
	$apellido= $dataHis['his_apellido'];
	$nombre= $dataHis['his_nombre'];
	$telefono= $dataHis['his_telefono'];
	$email= $dataHis['his_email'];
	$cedula= $dataHis['his_cedula'];
	$sexo= $dataHis['his_sexo'];
	$edad= $dataHis['his_edad'];
	$edoCivil= $dataHis['his_edoCivil'];
	$ciudadNacimiento= $dataHis['his_ciudadNacimiento'];
	$fechaNacimiento= $dataHis['his_fechaNacimiento'];
	$nacionalidad= $dataHis['his_nacionalidad'];
	$ocupacion= $dataHis['his_ocupacion'];
	$direccion= $dataHis['his_direccion'];
	$apellidoAvisar= $dataHis['his_apellidoAvisar'];
	$nombreAvisar= $dataHis['his_nombreAvisar'];
	$parentescoAvisar= $dataHis['his_parentescoAvisar'];
	$direccionAvisar= $dataHis['his_direccionAvisar'];
	$fechaConsulta= $dataHis['his_fechaConsulta'];
	$horaConsulta= $dataHis['his_horaConsulta'];
	$fechaConsultaAnterior= $dataHis['his_fechaConsultaAnterior'];
	$motivos= $dataHis['his_motivos'];
	$enfermedad= $dataHis['his_enfermedad'];
	$diagnosticoProvisional= $dataHis['his_diagnosticoProvisional'];
	$diagnosticoFinal= $dataHis['his_diagnosticoFinal'];
	$diagnosticoAnatomo= $dataHis['his_diagnosticoAnatomo'];
	
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

$queryDoctor = "SELECT * FROM tbl_doctores WHERE doc_id = '$doc_id'";

	$resultadoDoctor=mysql_query($queryDoctor,$dbConn);
	while($dataDoctor=mysql_fetch_array($resultadoDoctor))
	{    
	$drNombre= $dataDoctor['doc_nombre'];
	$drApellido= $dataDoctor['doc_apellido'];
	$doctor= $drNombre. " " .$drApellido;
	}

?>
<?php
	// ========================= Buscar la configuracion en tbl_perfil ==========================================================
	$query="SELECT * FROM tbl_perfil WHERE per_doc_id = '$doc_id'";  
 
	$resultado=mysql_query($query,$dbConn);
	while($dataPer=mysql_fetch_array($resultado))
	{    
	$historiaFamiliar= $dataPer['per_historiaFamiliar'];
	$Prenatales= $dataPer['per_antecedentesPrenatales'];
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
	
	$paciente = $nombre. " " .$apellido;
	}
?>
        <table class="page_footer">
            <tr>
                <td style="width: 33%; text-align: left; color:#CCC">
                    &nbsp;&nbsp;&nbsp; <span class="historia">Paciente:</span> <?php echo $paciente ?>
                </td>
                <td style="width: 34%; text-align: center; color:#CCC">
                    página [[page_cu]]/[[page_nb]]
                </td>
                <td style="width: 33%; text-align: right; color:#CCC">
                    Dr. <?php echo $doctor ?>&nbsp;&nbsp;&nbsp;</td>
            </tr>
        </table>
    </page_footer>


<table style="border:0px solid gray">
            <thead>
              <tr>
                <th><h3>Historia clinica</h3></th>
                <th></th>
                <th> <?php echo $paciente ?></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><strong>Datos del paciente</strong></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td><span class="historia">Nombre</span>: <?php echo $nombre ?> &nbsp; <?php echo $apellido ?></td>
                <td><span class="historia">Teléfono</span>: <?php echo $telefono ?> </td>
                <td><span class="historia">Cedula:</span> <?php echo $cedula ?></td> 
              </tr>
			  <tr>
                <?php 
			  	if ($sexo==1) {
			  	$sexo='Femenino';
			  	} else { 
			    $sexo='Masculino';
				}
			   ?>
               <?php
				if ($edoCivil == 1) {
					$edoCivil = "Soltero";
				}
				if ($edoCivil == 2) {
					$edoCivil = "Casado";
				}
				if ($edoCivil == 3) {
					$edoCivil = "Divorciado";
				}
				if ($edoCivil == 4) {
					$edoCivil = "Viudo";
				}
			    ?>
                <td><span class="historia">Email:</span> <?php echo $email ?></td>                   
                <td><span class="historia">Sexo:</span> <?php echo $sexo ?></td> 
                <td><span class="historia">Estado civil: </span><?php echo $edoCivil ?></td>                 
              </tr>
              <tr>
              <?php
				if ($nacionalidad == 1) {
					$nacionalidad = "Venezolano";
				}
				if ($nacionalidad == 2) {
					$nacionalidad = "Extranjero";
				}				
			    ?>
                <td><span class="historia">Fecha nac:</span> <?php echo $fechaNacimiento ?></td>
                <td><span class="historia">Edad:</span> <?php echo $edad ?></td>
                <td><span class="historia">Nacionalidad:</span> <?php echo $nacionalidad ?></td>
              </tr>
              <tr>
                <td><span class="historia">Lugar de nac:</span> <?php echo $ciudadNacimiento ?></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td><span class="historia">Ocupacion:</span> <?php echo $ocupacion ?></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td><span class="historia">Direccion:</span> <?php echo $direccion ?></td>
                <td></td>
                <td></td>               
              </tr>
              <tr>
                <td><span class="historia">En caso de emergencia avisar a:</span> <?php echo $nombreAvisar ?>&nbsp;<?php echo $apellidoAvisar ?></td> 
                <td><span class="historia">Parentesco:</span> <?php echo $parentescoAvisar ?></td>
                <td></td>
              </tr>
              <tr>
                <td><span class="historia">Dirección:</span> <?php echo $direccionAvisar ?> </td>
                <td></td> 
                <td></td>                     
              </tr>
              <tr>
                <td><span class="historia">Fecha: </span><?php echo $fechaConsulta ?></td> 
                <td><span class="historia">Hora: </span><?php echo $horaConsulta ?></td>
                <td><span class="historia">Consulta anterior:</span> <?php echo $fechaConsultaAnterior ?></td>
              </tr>
              <tr>                
                <td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>               
              </tr>
              <tr>
                <td><span class="historia">Motivos de consulta:</span> <?php echo $motivos ?></td>  
                <td></td> 
                <td></td>              
              </tr>
              <tr>
                <td><span class="historia">Enfermedad:</span> <?php echo $enfermedad ?></td>
                <td></td> 
                <td></td>
              </tr>
              <tr>
                <td><span class="historia">Diagnostico provisional:</span> <?php echo $diagnosticoProvisional ?></td>
                <td></td> 
                <td></td>
              </tr>
              <tr>
                <td><span class="historia">Diagnostico clinico final:</span> <?php echo $diagnosticoFinal ?></td>  
                <td></td>
                <td></td>            
              </tr>
              <tr>                
                <td><span class="historia">Diagnostico anatomo patologico:</span> <?php echo $diagnosticoAnatomo ?></td>                
                <td></td>
                <td></td>                
              </tr>
              <tr>                
                <td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>               
              </tr>
              </tbody>
              </table>
              
        <?php if ($historiaFamiliar == 1) {  ?>      
              <table style="border:0px solid gray">              
              <tbody>
              <tr>
                <td><strong>Historia clinica pediatrica</strong></td> 
                <td></td> 
                <td></td>                
              </tr>
              <tr>                
                <td>Historia familiar </td>
                <td>&nbsp;</td>   
                <td>&nbsp;</td>            
              </tr>
              <tr>                
                <td><span class="historia">Edad y estado de salud de los padres y hermanos si viven juntos: </span> <?php echo $edadSaludPadresHermanos ?></td>                <td></td>
                <td></td>                
              </tr>
			  <tr>
                <td><span class="historia">Estado de salud de otros cohabitantes: </span> <?php echo $edadSaludOtros ?></td>
                <td></td>     
                <td></td>                   
              </tr>
            <?php if ($cancer == 1) {$antecedenteFamiliar=$antecedenteFamiliar . "cáncer, "; } ?>
            <?php if ($diabetes == 1) {$antecedenteFamiliar=$antecedenteFamiliar . "diabetes, "; } ?>
            <?php if ($discrasias == 1) {$antecedenteFamiliar=$antecedenteFamiliar. "discrasias sanguineas, "; } ?>
            <?php if ($renales == 1) {$antecedenteFamiliar=$antecedenteFamiliar. "enfermedades renales, "; } ?>
            <?php if ($cardiacas == 1) {$antecedenteFamiliar=$antecedenteFamiliar. "enfermedades cardiacas, "; } ?>
            <?php if ($digestivas == 1) {$antecedenteFamiliar=$antecedenteFamiliar. "enfermedades digestivas, "; } ?>
            <?php if ($artritis == 1) {$antecedenteFamiliar=$antecedenteFamiliar. "artritis, "; } ?>
            <?php if ($sifilis == 1) {$antecedenteFamiliar=$antecedenteFamiliar. "sifilis, "; } ?>
            <?php if ($tuberculosis == 1) {$antecedenteFamiliar=$antecedenteFamiliar. "tuberculosis, "; } ?>
            <?php if ($alergias == 1) {$antecedenteFamiliar=$antecedenteFamiliar. "alergias, "; } ?>
            <?php if ($intoxicaciones == 1) {$antecedenteFamiliar=$antecedenteFamiliar. "intoxicaciones, "; } ?>
            <?php if ($neurologicas == 1) {$antecedenteFamiliar=$antecedenteFamiliar. "neurológicas, "; } ?>
            <?php if ($mentales == 1) {$antecedenteFamiliar=$antecedenteFamiliar. "mentales, "; } ?>
            <?php if ($otrasEnfermedades == 1) {$antecedenteFamiliar=$antecedenteFamiliar. $otrasEnfermedadesDescribir; } ?>
              <tr>
              	<td><span class="historia">Antecedente familiar: </span> <?php echo $antecedenteFamiliar ?></td>
                <td></td>  
                <td></td>  
              </tr>
              <tr>                
                <td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>               
              </tr>
              </tbody>
			  </table>
        <?php } ?>
        <?php if ($Prenatales == 1) { ?>
            <?php if ($controles == 1) {$antecedentesPrenatales = $antecedentesPrenatales. "controles, "; } ?>
            <?php if ($complicaciones == 1) {$antecedentesPrenatales= $antecedentesPrenatales. "complicaciones, "; } ?>
            <?php if ($atermino == 1) {$antecedentesPrenatales= $antecedentesPrenatales. "parto a término, "; } ?>
            <?php if ($prematuro == 1) {$antecedentesPrenatales= $antecedentesPrenatales. "parto prematuro, "; } ?>
            <?php if ($espontaneo == 1) {$antecedentesPrenatales= $antecedentesPrenatales. "parto espontáneo, "; } ?>
            <?php if ($anestesia == 1) {$antecedentesPrenatales= $antecedentesPrenatales. "parto con anestesia, "; } ?>
            <?php if (!empty($trabajo)) {$antecedentesPrenatales= $antecedentesPrenatales. $trabajo. " horas en trabajo, "; } ?>
            <?php if ($instrumental == 1) {$antecedentesPrenatales= $antecedentesPrenatales. "parto instrumental, "; } ?>
            <?php if ($domiciliaria == 1) {$antecedentesPrenatales= $antecedentesPrenatales. "asistencia domiciliaria, "; } ?>
            <?php if ($institucional == 1) {$antecedentesPrenatales= $antecedentesPrenatales. "asistencia institucional, "; } ?>
            <?php if (!empty($gestacion)) {$antecedentesPrenatales= $antecedentesPrenatales. $gestacion. " número de la gestación, "; } ?>
            <?php if ($otroPrenatal == 1) {$antecedentesPrenatales= $antecedentesPrenatales. $otroPrenatalDescribir; } ?>
              <table style="border:0px solid gray">              
			  <tbody>
              <tr>   
                <td><span class="historia">Antecedentes prenatales y obstétricos: </span> <?php echo $antecedentesPrenatales ?></td> 
                <td></td>
                <td></td>
              </tr>
              <tr>                
                <td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>               
              </tr>
              </tbody>
			  </table>
        <?php } ?>
        <?php if ($periodoNeonatal == 1) { ?>
            <?php if (!empty($peso)) {$antecedentesNeonatal= $antecedentesNeonatal. $peso. " peso al nacer, "; } ?>
            <?php if (!empty($talla)) {$antecedentesNeonatal= $antecedentesNeonatal. $talla. " talla al nacer, "; } ?> 
            <?php if ($respiracion == 1) {$antecedentesNeonatal= $antecedentesNeonatal. "respiración artificial, "; } ?>
            <?php if ($cianosis == 1) {$antecedentesNeonatal= $antecedentesNeonatal. "cianosis, "; } ?>
            <?php if ($fiebre == 1) {$antecedentesNeonatal= $antecedentesNeonatal. "fiebre, "; } ?>
            <?php if ($vomitos == 1) {$antecedentesNeonatal= $antecedentesNeonatal. "vómitos, "; } ?>
            <?php if ($icteria == 1) {$antecedentesNeonatal= $antecedentesNeonatal. "ictericia, "; } ?>
            <?php if ($hemorragias == 1) {$antecedentesNeonatal= $antecedentesNeonatal. "hemorragias, "; } ?>
            <?php if ($convulsiones == 1) {$antecedentesNeonatal= $antecedentesNeonatal. "convulsiones, "; } ?>
            <?php if ($malformaciones == 1) {$antecedentesNeonatal= $antecedentesNeonatal. "malformaciones, "; } ?>
            <?php if ($oftalmia == 1) {$antecedentesNeonatal= $antecedentesNeonatal. "oftalmia, "; } ?>
            <?php if ($coriza == 1) {$antecedentesNeonatal= $antecedentesNeonatal. "coriza, "; } ?>
            <?php if ($otroNeonatal == 1) {$antecedentesNeonatal= $antecedentesNeonatal. $otroNeonatalDescribir; } ?>
              <table style="border:0px solid gray">              
			  <tbody>
              <tr>   
                <td><span class="historia">Antecedentes personales - neonatal: </span><?php echo $antecedentesNeonatal ?></td>
                <td></td>
                <td></td>
              </tr>
              <tr>                
                <td>&nbsp;</td>       
                <td>&nbsp;</td>  
                <td></td>                 
              </tr>
              </tbody>
			  </table>
        <?php } ?>
        <?php if ($alimentacion == 1) { ?>
            <?php if ($natural == 1) {$antecedentesAlimentacion= $antecedentesAlimentacion. "natural, "; } ?>
            <?php if ($artificial == 1) {$antecedentesAlimentacion= $antecedentesAlimentacion. "artificial, "; } ?>
            <?php if ($mixta == 1) {$antecedentesAlimentacion= $antecedentesAlimentacion. "mixta, "; } ?>
            <?php if ($destete == 1) {$antecedentesAlimentacion= $antecedentesAlimentacion. "destete, "; } ?>
            <?php if ($cereales == 1) {$antecedentesAlimentacion= $antecedentesAlimentacion. "cereales, "; } ?>
            <?php if ($sopas == 1) {$antecedentesAlimentacion= $antecedentesAlimentacion. "sopas, "; } ?>
            <?php if ($frutas == 1) {$antecedentesAlimentacion= $antecedentesAlimentacion. "frutas, "; } ?>
            <?php if ($huevos == 1) {$antecedentesAlimentacion= $antecedentesAlimentacion. "huevos, "; } ?>
            <?php if ($carne == 1) {$antecedentesAlimentacion= $antecedentesAlimentacion. "carne, "; } ?>
            <?php if ($vitaminas == 1) {$antecedentesAlimentacion= $antecedentesAlimentacion. "vitaminas, "; } ?>
            <?php if ($dieta == 1) {$antecedentesAlimentacion= $antecedentesAlimentacion. "dieta "; } ?>
              <table style="border:0px solid gray">              
			  <tbody>
              <tr>
                <td><span class="historia">Alimentación:</span> <?php echo $antecedentesAlimentacion ?></td>
                <td></td>
                <td></td>
              </tr>
              <tr>                
                <td>&nbsp;</td>       
                <td>&nbsp;</td>  
                <td></td>                 
              </tr>
              </tbody>
              </table>
     <?php } ?>
     <?php if ($desarrollo == 1) { ?>         
            <table style="border:0px solid gray">
            <tbody>
			  <tr>                
                <td>Desarrollo</td>       
                <td>&nbsp;</td>  
                <td>&nbsp;</td>  
                <td>&nbsp;</td>              
              </tr>
              <tr>                
                <td><span class="historia">Sostuvo la cabeza a los </span> <?php echo $sostuvo ?> <span class="historia">meses. </span></td> 
                <td><span class="historia">Se sentó a los</span> <?php echo $sento ?> <span class="historia">meses. </span></td>  
                <td><span class="historia">Se paró a los</span> <?php echo $paro ?> <span class="historia">meses. </span></td>   
                <td><span class="historia">Caminó a los</span> <?php echo $camino ?> <span class="historia">meses. </span></td>
              </tr>
              <tr>
                <td><span class="historia">Controló esfinter a los</span> <?php echo $esfinter ?> <span class="historia">meses. </span></td>
                <td><span class="historia">Primer diente a los</span> <?php echo $diente ?> <span class="historia">meses. </span></td>
                <td><span class="historia">Primeras palabras a los</span> <?php echo $palabra ?> <span class="historia">meses. </span></td>
                <td>&nbsp;</td>  
              </tr>
              <tr>
                <td><span class="historia">Grado de escuela</span> <?php echo $grado ?> </td>            
                <td><span class="historia">Progreso en la escuela </span><?php echo $progreso ?></td>
                <td>&nbsp;</td>  
                <td>&nbsp;</td>  
              </tr>
              <tr>                
                <td>&nbsp;</td>       
                <td>&nbsp;</td>  
                <td>&nbsp;</td>
                <td>&nbsp;</td>               
              </tr>
            </tbody>
            </table>
        <?php } ?>
        <?php if ($habitos == 1) { ?>
            <?php if ($sueno == 1) {$antecedentesHabitos= $antecedentesHabitos. "sueño, "; } ?>
            <?php if ($siestas == 1) {$antecedentesHabitos= $antecedentesHabitos. "siestas, "; } ?>
            <?php if ($juegos == 1) {$antecedentesHabitos= $antecedentesHabitos. "juegos, "; } ?>
            <?php if ($sexuales == 1) {$antecedentesHabitos= $antecedentesHabitos. "sexuales, "; } ?>
            <?php if ($chupaDedos == 1) {$antecedentesHabitos= $antecedentesHabitos. "chupa dedos, "; } ?>
            <?php if ($comeUnas == 1) {$antecedentesHabitos= $antecedentesHabitos. "come uñas, "; } ?>
            <?php if ($rasgos == 1) {$antecedentesHabitos= $antecedentesHabitos. "rasgos personales, "; } ?>
            <?php if ($recreacion == 1) {$antecedentesHabitos= $antecedentesHabitos. "recreación, "; } ?>
            <?php if ($ocupacionHabito == 1) {$antecedentesHabitos= $antecedentesHabitos. "ocupación, "; } ?>
            <?php if ($otrosHabitos == 1) {$antecedentesHabitos= $antecedentesHabitos. $otrosHabitosDescribir; } ?>
			  <table style="border:0px solid gray">              
              <tbody>
              <tr>
                <td><span class="historia">Hábitos</span> <?php echo $antecedentesHabitos ?> </td>
                <td></td>
                <td></td>             
              </tr>
			  <tr>                
                <td>&nbsp;</td>       
                <td>&nbsp;</td>  
                <td>&nbsp;</td>               
              </tr>
			</tbody>
			</table>
        <?php } ?>
        <?php if ($inmunizaciones == 1) { ?>
            <?php if ($viruela == 1) {$antecedentesInmunizaciones= $antecedentesInmunizaciones. "viruela, "; } ?>
            <?php if ($tosterona == 1) {$antecedentesInmunizaciones= $antecedentesInmunizaciones. "tosterona, "; } ?>
            <?php if ($difteria == 1) {$antecedentesInmunizaciones= $antecedentesInmunizaciones. "difteria, "; } ?>
            <?php if ($tetanos == 1) {$antecedentesInmunizaciones= $antecedentesInmunizaciones. "tétanos, "; } ?>
            <?php if ($tificas == 1) {$antecedentesInmunizaciones= $antecedentesInmunizaciones. "tificas, "; } ?>
            <?php if ($bcc == 1) {$antecedentesInmunizaciones= $antecedentesInmunizaciones. "B.C.C:, "; } ?>
            <?php if ($poliomelitis == 1) {$antecedentesInmunizaciones= $antecedentesInmunizaciones. "poliomelitis, "; } ?>
            <?php if ($tuberculina == 1) {$antecedentesInmunizaciones= $antecedentesInmunizaciones. "tuberculina, "; } ?>
            <?php if ($otrasInmunizaciones == 1) {$antecedentesInmunizaciones= $antecedentesInmunizaciones. $otrasInmunizacionesDescribir; } ?>             
              <table style="border:0px solid gray">              
			  <tbody>
              <tr>
                <td><span class="historia">Inmunizaciones y pruebas </span><?php echo $antecedentesInmunizaciones ?> </td>
                <td></td>
                <td></td>
              </tr>
 			  <tr>                
                <td>&nbsp;</td>       
                <td>&nbsp;</td>  
                <td>&nbsp;</td>               
              </tr>
              </tbody>
			  </table>
        <?php } ?>
        <?php if ($contactosTBC == 1) { ?>
            <?php if ($intradomiciliarios == 1) {$antecedentesContactos= $antecedentesContactos. "Intradomiciliarios, "; } ?>
            <?php if ($extradomiciliarios == 1) {$antecedentesContactos= $antecedentesContactos. "Extradomiciliarios"; } ?>
              <table style="border:0px solid gray">              
			  <tbody>
              <tr>
                <td><span class="historia">Contactos T.B.C.: </span><?php echo $antecedentesContactos ?> </td>
                <td></td>
                <td></td>
              </tr> 
              <tr>                
                <td>&nbsp;</td>       
                <td>&nbsp;</td>  
                <td>&nbsp;</td>               
              </tr>
            </tbody> 
            </table>
      <?php } ?>
      <?php if ($antecedentesEpi == 1) { ?>
         <?php if ($diarreas == 1) {$antecedentesEnfermedades= $antecedentesEnfermedades. "diarreas, "; } ?>
         <?php if ($vomitosEpi == 1) {$antecedentesEnfermedades= $antecedentesEnfermedades. "vómitos, "; } ?>
         <?php if ($disenterico == 1) {$antecedentesEnfermedades= $antecedentesEnfermedades. "sind. Disentérico, "; } ?>
         <?php if ($amibiasis == 1) {$antecedentesEnfermedades= $antecedentesEnfermedades. "amibiasis, "; } ?>
         <?php if ($bilharziosis == 1) {$antecedentesEnfermedades= $antecedentesEnfermedades. "bilharziosis, "; } ?>
         <?php if ($parasitosis == 1) {$antecedentesEnfermedades= $antecedentesEnfermedades. "otras parasitósis, "; } ?>
         <?php if ($rinofaringitis == 1) {$antecedentesEnfermedades= $antecedentesEnfermedades. "rinofaringitis, "; } ?>
         <?php if ($amigdalitis == 1) {$antecedentesEnfermedades= $antecedentesEnfermedades. "amigdalitis, "; } ?>
         <?php if ($otitis == 1) {$antecedentesEnfermedades= $antecedentesEnfermedades. "otitis, "; } ?>
         <?php if ($bronquitis == 1) {$antecedentesEnfermedades= $antecedentesEnfermedades. "bronquitis, "; } ?>
         <?php if ($neumonia == 1) {$antecedentesEnfermedades= $antecedentesEnfermedades. "neumonia, "; } ?>
         <?php if ($pleuresia == 1) {$antecedentesEnfermedades= $antecedentesEnfermedades. "pleuresia, "; } ?>
         <?php if ($influenza == 1) {$antecedentesEnfermedades= $antecedentesEnfermedades. "influenza, "; } ?>
         <?php if ($tuberculosis == 1) {$antecedentesEnfermedades= $antecedentesEnfermedades. "tuberculosis, "; } ?>
         <?php if ($eritema == 1) {$antecedentesEnfermedades= $antecedentesEnfermedades. "eritema nudoso, "; } ?>
         <?php if ($adenitis == 1) {$antecedentesEnfermedades= $antecedentesEnfermedades. "adenitis crónica, "; } ?>
         <?php if ($sifilisEpi == 1) {$antecedentesEnfermedades= $antecedentesEnfermedades. "sifilis Kahn, "; } ?>
         <?php if ($varicela == 1) {$antecedentesEnfermedades= $antecedentesEnfermedades. "varicela, "; } ?>
         <?php if ($sarampion == 1) {$antecedentesEnfermedades= $antecedentesEnfermedades. "sarampión, "; } ?>
         <?php if ($tosferina == 1) {$antecedentesEnfermedades= $antecedentesEnfermedades. "tosferina, "; } ?>
         <?php if ($rubeola == 1) {$antecedentesEnfermedades= $antecedentesEnfermedades. "rubéola, "; } ?>
         <?php if ($parotiditis == 1) {$antecedentesEnfermedades= $antecedentesEnfermedades. "parotiditis, "; } ?>
         <?php if ($difteriaEpi == 1) {$antecedentesEnfermedades= $antecedentesEnfermedades. "difteria, "; } ?>
         <?php if ($tifoidea == 1) {$antecedentesEnfermedades= $antecedentesEnfermedades. "tifoidea, "; } ?>
         <?php if ($paludismo == 1) {$antecedentesEnfermedades= $antecedentesEnfermedades. "paludismo, "; } ?>
         <?php if ($fiebreEpi == 1) {$antecedentesEnfermedades= $antecedentesEnfermedades. "fiebres prolongadas, "; } ?>
         <?php if ($artritisEpi == 1) {$antecedentesEnfermedades= $antecedentesEnfermedades. "artritis (R.A.A.), "; } ?>
         <?php if ($vulvovaginitis == 1) {$antecedentesEnfermedades= $antecedentesEnfermedades. "vulvovaginitis, "; } ?>
         <?php if ($pielEpi == 1) {$antecedentesEnfermedades= $antecedentesEnfermedades. "enfermedades de la piel, "; } ?>
         <?php if ($alergiasEpi == 1) {$antecedentesEnfermedades= $antecedentesEnfermedades. "alergias, "; } ?>
         <?php if ($quirurgicas == 1) {$antecedentesEnfermedades= $antecedentesEnfermedades. "quirúrgicas, "; } ?>
         <?php if ($traumatismo == 1) {$antecedentesEnfermedades= $antecedentesEnfermedades. "traumatismos, "; } ?>
         <?php if ($otrosEpimediologicos == 1) {$antecedentesEnfermedades= $antecedentesEnfermedades. $otrosEpimediologicosDescribir; } ?>
              <table style="border:0px solid gray">              
              <tbody>
              <tr>
                <td>Antecedentes epimediologicos</td> 
                <td></td>
                <td></td>
              </tr> 
              <tr>
                <td><span class="historia">Enfermedades:</span> <?php echo $antecedentesEnfermedades ?> </td> 
                <td></td>
                <td></td>
              </tr> 
              <tr>
                <td></td> 
                <td></td>
                <td></td>
              </tr>
              </tbody>
			  </table>
       <?php } ?>
       <?php if ($general == 1) { ?>          
         <?php if ($progresoPeso == 1) {$antecedenteGeneral= $antecedenteGeneral. "progreso de peso y talla, "; } ?>
         <?php if ($debilidad == 1) {$antecedenteGeneral= $antecedenteGeneral. "debilidad, "; } ?>
         <?php if ($fatiga == 1) {$antecedenteGeneral= $antecedenteGeneral. "fatiga, "; } ?>
         <?php if ($sudores == 1) {$antecedenteGeneral= $antecedenteGeneral. "sudores, "; } ?>
         <?php if ($otrosGeneral == 1) {$antecedenteGeneral= $antecedenteGeneral. $otrosGeneralDescribir; } ?>
              <table style="border:0px solid gray">              
			  <tbody>
              <tr>
                <td><span class="historia">General:</span> <?php echo $antecedenteGeneral ?> </td> 
				<td></td>
                <td></td>
              </tr> 
              <tr>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              </tbody>
			  </table>
       <?php } ?>
       <?php if ($piel == 1) { ?>
         <?php if ($dermatosis == 1) {$antecedentePiel= $antecedentePiel. "dermatosis, "; } ?>
         <?php if ($prurito == 1) {$antecedentePiel= $antecedentePiel. "prurito, "; } ?>
         <?php if ($cianosisPiel == 1) {$antecedentePiel= $antecedentePiel. "cianosis, "; } ?>
         <?php if ($ictericia == 1) {$antecedentePiel= $antecedentePiel. "ictericia, "; } ?>
         <?php if ($edemas == 1) {$antecedentePiel= $antecedentePiel. "edemas, "; } ?>
         <?php if ($otraPiel == 1) {$antecedentePiel= $antecedentePiel. $otraPielDescribir; } ?>
              <table style="border:0px solid gray">              
			  <tbody>
              <tr>
                <td><span class="historia">Piel:</span> <?php echo $antecedentePiel ?> </td> 
                <td></td>   
                <td></td>                
              </tr> 
              <tr>
                <td></td>
                <td></td>
                <td></td>
              </tr> 
              </tbody>
			  </table>
       <?php } ?>
       <?php if ($cabeza == 1) { ?>
         <?php if ($dolor == 1) {$antecedenteCabeza= $antecedenteCabeza. "dolor, "; } ?>
         <?php if ($mareos == 1) {$antecedenteCabeza= $antecedenteCabeza. "mareos, "; } ?>
         <?php if ($caida == 1) {$antecedenteCabeza= $antecedenteCabeza. "caída del cabello, "; } ?>
         <?php if ($otrosCabeza == 1) {$antecedenteCabeza= $antecedenteCabeza. $otrosCabezaDescribir; } ?>
              <table style="border:0px solid gray">              
			  <tbody>
              <tr>
                <td><span class="historia">Cabeza:</span> <?php echo $antecedenteCabeza ?> </td> 
                <td></td>
                <td></td>
              </tr> 
              <tr>
                <td></td>
                <td></td>
                <td></td>
              </tr> 
              </tbody>
			  </table>
       <?php } ?>
       <?php if ($ojos == 1) { ?>
         <?php if ($cansancio == 1) {$antecedenteOjos= $antecedenteOjos. "cansancio, "; } ?>
		 <?php if ($diplopia == 1) {$antecedenteOjos= $antecedenteOjos. "diplopia, "; } ?>
		 <?php if ($fotofobia == 1) {$antecedenteOjos= $antecedenteOjos. "fotofobia, "; } ?>
		 <?php if ($lagrimeo == 1) {$antecedenteOjos= $antecedenteOjos. "lagrimeo, "; } ?>
		 <?php if ($nistagmus == 1) {$antecedenteOjos= $antecedenteOjos. "nistagmus, "; } ?>
		 <?php if ($amaurosis == 1) {$antecedenteOjos= $antecedenteOjos. "amaurosis, "; } ?>
		 <?php if ($dolorOjos == 1) {$antecedenteOjos= $antecedenteOjos. "dolor, "; } ?>
		 <?php if ($anteojos == 1) {$antecedenteOjos= $antecedenteOjos. "anteojos, "; } ?>
		 <?php if ($otrosOjos == 1) {$antecedenteOjos= $antecedenteOjos. $otrosOjosDescribir; } ?>
              <table style="border:0px solid gray">              
			  <tbody>
              <tr>
                <td><span class="historia">Ojos:</span> <?php echo $antecedenteOjos ?> </td> 
                <td></td>
                <td></td>
              </tr> 
              <tr>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              </tbody>
			  </table>
     <?php } ?>
     <?php if ($oidos == 1) { ?>
        <?php if ($sordera == 1) {$antecedenteOidos= $antecedenteOidos . "sordera, "; } ?>
		<?php if ($secreciones == 1) {$antecedenteOidos= $antecedenteOidos . "secreciones, "; } ?>
		<?php if ($tinnitus == 1) {$antecedenteOidos= $antecedenteOidos . "tinnitus, "; } ?>
		<?php if ($dolorOidos == 1) {$antecedenteOidos= $antecedenteOidos . "dolor, "; } ?>
		<?php if ($otrosOidos == 1) {$antecedenteOidos= $antecedenteOidos . $otrosOidosDescribir; } ?>
              <table style="border:0px solid gray">              
			  <tbody>
              <tr>  
                <td><span class="historia">Oidos:</span> <?php echo $antecedenteOidos ?> </td> 
                <td></td>
                <td></td>
              </tr> 
              <tr>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              </tbody>
			  </table>
     <?php } ?>
     <?php if ($nariz == 1) { ?>
         <?php if ($epistaxis == 1) {$antecedenteNariz= $antecedenteNariz. "epistaxis, "; } ?>
		 <?php if ($sinusitis == 1) {$antecedenteNariz= $antecedenteNariz. "sinusitis, "; } ?>
		 <?php if ($obstruccion == 1) {$antecedenteNariz= $antecedenteNariz. "obstrucción, "; } ?>
		 <?php if ($secrecion == 1) {$antecedenteNariz= $antecedenteNariz. "secreción, "; } ?>
		 <?php if ($halitosis == 1) {$antecedenteNariz= $antecedenteNariz. "halitosis nasal, "; } ?>
		 <?php if ($dolorsenos == 1) {$antecedenteNariz= $antecedenteNariz. "dolor senos accesorios, "; } ?>
		 <?php if ($otrosNariz == 1) {$antecedenteNariz= $antecedenteNariz. $otrosNarizDescribir; } ?>
             <table style="border:0px solid gray">              
			  <tbody> 
              <tr>           
              	<td><span class="historia">Nariz:</span> <?php echo $antecedenteNariz ?> </td> 
                <td></td>
                <td></td>
              </tr> 
              <tr>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              </tbody>
			  </table>
     <?php } ?>
     <?php if ($boca == 1) { ?>
         <?php if ($lengua == 1) {$antecedenteBoca= $antecedenteBoca. "lengua, "; } ?>
		 <?php if ($mucosas == 1) {$antecedenteBoca= $antecedenteBoca. "mucosas, "; } ?>
		 <?php if ($encias == 1) {$antecedenteBoca= $antecedenteBoca. "encias, "; } ?>
		 <?php if ($dientes == 1) {$antecedenteBoca= $antecedenteBoca. "dientes, "; } ?>
		 <?php if ($halitosisBoca == 1) {$antecedenteBoca= $antecedenteBoca. "halitosis, "; } ?>
         <?php if ($otrosBoca == 1) {$antecedenteBoca= $antecedenteBoca. $otrosBocaDescribir; } ?>
              <table style="border:0px solid gray">              
			  <tbody>
              <tr> 
                <td><span class="historia">Boca:</span> <?php echo $antecedenteBoca ?> </td> 
                <td></td>
                <td></td>
              </tr> 
              <tr>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              </tbody>
			  </table>
      <?php } ?>
      <?php if ($garganta == 1) { ?>
         <?php if ($dolorGarganta == 1) {$antecedenteGarganta= $antecedenteGarganta. "dolor, "; } ?>
		 <?php if ($ronquera == 1) {$antecedenteGarganta= $antecedenteGarganta. "ronquera, "; } ?>
		 <?php if ($disfoguia == 1) {$antecedenteGarganta= $antecedenteGarganta. "disfoguia, "; } ?>
		 <?php if ($otrosGarganta == 1) {$antecedenteGarganta= $antecedenteGarganta. $otrosGargantaDescribir; } ?>
              <table style="border:0px solid gray">              
			  <tbody>
              <tr> 
                <td><span class="historia">Garganta:</span> <?php echo $antecedenteGarganta ?> </td> 
                <td></td>
                <td></td>
              </tr> 
              <tr>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              </tbody>
			  </table>
      <?php } ?>
      <?php if ($respiratorio == 1) {  ?>
         <?php if ($dolorRespiratorio == 1) {$antecedenteRespiratorio= $antecedenteRespiratorio. "dolor torácico, "; } ?>
		 <?php if ($hemoptisis == 1) {$antecedenteRespiratorio= $antecedenteRespiratorio. "hemoptisis, "; } ?>
		 <?php if ($tos == 1) {$antecedenteRespiratorio= $antecedenteRespiratorio. "tos, "; } ?>
		 <?php if ($expectoracion == 1) {$antecedenteRespiratorio= $antecedenteRespiratorio. "expectoración, "; } ?>
		 <?php if ($disnea == 1) {$antecedenteRespiratorio= $antecedenteRespiratorio. "disnea, "; } ?>
		 <?php if ($silbidos == 1) {$antecedenteRespiratorio= $antecedenteRespiratorio. "silbidos y roncus, "; } ?>
		 <?php if ($estridor == 1) {$antecedenteRespiratorio= $antecedenteRespiratorio. "estridor, "; } ?>
		 <?php if ($otrosRespiratorio == 1) {$antecedenteRespiratorio= $antecedenteRespiratorio. $otrosRespiratorioDescribir; } ?>
              <table style="border:0px solid gray">              
			  <tbody>
              <tr> 
                <td><span class="historia">Respiratorio:</span> <?php echo $antecedenteRespiratorio ?> </td> 
                <td></td>
                <td></td>
              </tr> 
              <tr>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              </tbody>
			  </table>
     <?php } ?>
     <?php if ($digestivo == 1) {  ?>
         <?php if ($apetito == 1) {$antecedenteDigestivo= $antecedenteDigestivo. "apetito, "; } ?>
		 <?php if ($dolorDigestivo == 1) {$antecedenteDigestivo= $antecedenteDigestivo. "dolor, "; } ?>
		 <?php if ($malestar == 1) {$antecedenteDigestivo= $antecedenteDigestivo. "malestar, "; } ?>
		 <?php if ($nauseas == 1) {$antecedenteDigestivo= $antecedenteDigestivo. "náuseas, "; } ?>
		 <?php if ($vomitosDigestivo == 1) {$antecedenteDigestivo= $antecedenteDigestivo. "vómitos, "; } ?>
		 <?php if ($pirosis == 1) {$antecedenteDigestivo= $antecedenteDigestivo. "pirosis, "; } ?>
		 <?php if ($flatulencias == 1) {$antecedenteDigestivo= $antecedenteDigestivo. "flatulencias, "; } ?>
		 <?php if ($constipacion == 1) {$antecedenteDigestivo= $antecedenteDigestivo. "constipación, "; } ?>
		 <?php if ($heces == 1) {$antecedenteDigestivo= $antecedenteDigestivo. "heces (Caracteres), "; } ?>
		 <?php if ($parasitos == 1) {$antecedenteDigestivo= $antecedenteDigestivo. "parásitos, "; } ?>
		 <?php if ($prolapso == 1) {$antecedenteDigestivo= $antecedenteDigestivo. "prolapso, "; } ?>
		 <?php if ($fistulas == 1) {$antecedenteDigestivo= $antecedenteDigestivo. "fistulas, "; } ?>
		 <?php if ($hemorroides == 1) {$antecedenteDigestivo= $antecedenteDigestivo. "hemorroides, "; } ?>
		 <?php if ($polipos == 1) {$antecedenteDigestivo= $antecedenteDigestivo. "pólipos, "; } ?>
		 <?php if ($hernias == 1) {$antecedenteDigestivo= $antecedenteDigestivo. "hernias, "; } ?>
		 <?php if ($otrosDigestivo == 1) {$antecedenteDigestivo= $antecedenteDigestivo. $otrosDigestivoDescribir; } ?>
              <table style="border:0px solid gray">              
			  <tbody>
              <tr> 
                <td><span class="historia">Digestivo:</span> <?php echo $antecedenteDigestivo ?> </td> 
                <td></td>
                <td></td>
              </tr> 
              <tr>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              </tbody>
			  </table>
    <?php } ?>
    <?php if ($circulatorio == 1) { ?> 
         <?php if ($dolorCirculatorio == 1) {$antecedenteCirculatorio= $antecedenteCirculatorio. "dolor, "; } ?>	
		 <?php if ($disneaCirculatorio == 1) {$antecedenteCirculatorio= $antecedenteCirculatorio. "disnea, "; } ?>	
		 <?php if ($palpitaciones == 1) {$antecedenteCirculatorio= $antecedenteCirculatorio. "palpitaciones, "; } ?>	
		 <?php if ($desmayos == 1) {$antecedenteCirculatorio= $antecedenteCirculatorio. "desmayos, "; } ?>	
		 <?php if ($edemasCirculatorio == 1) {$antecedenteCirculatorio= $antecedenteCirculatorio. "edemas, "; } ?>	
		 <?php if ($otrosCirculatorio == 1) {$antecedenteCirculatorio= $antecedenteCirculatorio. $otrosCirculatorioDescribir; } ?>	
              <table style="border:0px solid gray">              
			  <tbody>
              <tr> 
                <td><span class="historia">Circulatorio:</span> <?php echo $antecedenteCirculatorio ?> </td> 
                <td></td>
                <td></td>
              </tr> 
               <tr>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              </tbody>
			  </table>
     <?php } ?>
     <?php if ($genitourinario == 1) { ?>
         <?php if ($apetitoGenito == 1) {$antecedenteGenitourinario= $antecedenteGenitourinario. "apetito, "; } ?>	
		 <?php if ($dolorGenito == 1) {$antecedenteGenitourinario= $antecedenteGenitourinario. "dolor, "; } ?>	
		 <?php if ($malestarGenito == 1) {$antecedenteGenitourinario= $antecedenteGenitourinario. "malestar, "; } ?>	
		 <?php if ($nauseasGenito == 1) {$antecedenteGenitourinario= $antecedenteGenitourinario. "náuseas, "; } ?>	
		 <?php if ($vomitosGenito == 1) {$antecedenteGenitourinario= $antecedenteGenitourinario. "vómitos, "; } ?>	
		 <?php if ($pirosisGenito == 1) {$antecedenteGenitourinario= $antecedenteGenitourinario. "pirosis, "; } ?>	
		 <?php if ($hecesGenito == 1) {$antecedenteGenitourinario= $antecedenteGenitourinario. "heces (Caracteres), "; } ?>	
		 <?php if ($parasitosGenito == 1) {$antecedenteGenitourinario= $antecedenteGenitourinario. "parásitos, "; } ?>	
		 <?php if ($prolapsoGenito == 1) {$antecedenteGenitourinario= $antecedenteGenitourinario. "prolapso, "; } ?>	
		 <?php if ($fistulasGenito == 1) {$antecedenteGenitourinario= $antecedenteGenitourinario. "fistulas, "; } ?>	
		 <?php if ($otrosGenito == 1) {$antecedenteGenitourinario= $antecedenteGenitourinario. $otrosGenitoDescribir; } ?>	
              <table style="border:0px solid gray">              
			  <tbody>
              <tr> 
                <td><span class="historia">Genitourinario:</span> <?php echo $antecedenteGenitourinario ?> </td> 
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              </tbody>
			  </table>
     <?php } ?>
     <?php if ($muscularOsteoArticular == 1) { ?>
         <?php if ($debilidadMuscular == 1) {$antecedenteMuscular= $antecedenteMuscular. "debilidad, "; } ?>
         <?php if ($deformidades == 1) {$antecedenteMuscular= $antecedenteMuscular. "deformidades, "; } ?>
         <?php if ($doloresMuscular == 1) {$antecedenteMuscular= $antecedenteMuscular. "dolores, "; } ?>
         <?php if ($otrasMuscular == 1) {$antecedenteMuscular= $antecedenteMuscular. $otrasMuscularDescribir; } ?>
              <table style="border:0px solid gray">              
			  <tbody>
              <tr> 
                <td><span class="historia">Muscular y osteo-articular:</span> <?php echo $antecedenteMuscular ?> </td> 
                <td></td>
                <td></td>
              </tr>
              </tbody>
			  </table>
      <?php } ?>
      <?php if ($nerviosoMental == 1) { ?>
         <?php if ($afectiva == 1) {$antecedenteNervioso= $antecedenteNervioso. "esfera afectiva, "; } ?>
         <?php if ($intelectual == 1) {$antecedenteNervioso= $antecedenteNervioso. "esfera intelectual, "; } ?>
         <?php if ($volitiva == 1) {$antecedenteNervioso= $antecedenteNervioso. "esfera volitiva, "; } ?>
         <?php if ($tics == 1) {$antecedenteNervioso= $antecedenteNervioso. "tics, "; } ?>
         <?php if ($paralisis == 1) {$antecedenteNervioso= $antecedenteNervioso. "parálisis, "; } ?>
         <?php if ($convulsionesMental == 1) {$antecedenteNervioso= $antecedenteNervioso. "convulsiones, "; } ?>
         <?php if ($estatica == 1) {$antecedenteNervioso= $antecedenteNervioso. "estática, "; } ?>
         <?php if ($dinamica == 1) {$antecedenteNervioso= $antecedenteNervioso. "dinámica, "; } ?>
         <?php if ($otrosMental == 1) {$antecedenteNervioso= $antecedenteNervioso. $otrosMentalDescribir; } ?>
              <table style="border:0px solid gray">              
			  <tbody>
              <tr> 
                <td><span class="historia">Nervioso y mental:</span> <?php echo $antecedenteNervioso ?> </td>
                <td></td>
                <td></td>
              </tr>
              <tr>                
                <td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>               
              </tr>
              </tbody>
              </table>
     <?php } ?>         
     <?php if ($estadoGeneralEx == 1) { ?>     
         <?php if ($condicionesGral == 1) {$antecedenteExaGeneral= $antecedenteExaGeneral. "Condiciones generales, "; } ?>
         <?php if ($nutricionGral == 1) {$antecedenteExaGeneral= $antecedenteExaGeneral. "Porcentaje de nutrición, "; } ?>
         <?php if ($desarrolloGral == 1) {$antecedenteExaGeneral= $antecedenteExaGeneral. "Desarrollo, "; } ?>
         <?php if ($otrosGral == 1) {$antecedenteExaGeneral= $antecedenteExaGeneral. $otrosGralDescribir; } ?>
              <table style="border:0px solid gray">              
              <tbody>
              <tr> 
              	<td><strong>Examen físico</strong></td>
                <td></td>
                <td></td> 
              </tr>
              <tr> 
                <td>(Datos ojetivos) </td>
                <td></td>
                <td></td>
              </tr>
              <tr> 
                <td><span class="historia">Estado general:</span> <?php echo $antecedenteExaGeneral ?> </td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              </tbody>
			  </table>
    <?php } ?>
    <?php if ($pielPandiculoEx == 1) { ?>
         <?php if ($colorExPiel == 1) {$antecedenteExaPiel= $antecedenteExaPiel. "color, "; } ?>
         <?php if ($humedadExPiel == 1) {$antecedenteExaPiel= $antecedenteExaPiel. "humedad, "; } ?>
         <?php if ($hidratacionExPiel == 1) {$antecedenteExaPiel= $antecedenteExaPiel. "hidratación, "; } ?>
         <?php if ($contexturaExPiel == 1) {$antecedenteExaPiel= $antecedenteExaPiel. "contextura, "; } ?>
         <?php if ($pigmentacionExPiel == 1) {$antecedenteExaPiel= $antecedenteExaPiel. "pigmentación, "; } ?>
         <?php if ($equimosisExPiel == 1) {$antecedenteExaPiel= $antecedenteExaPiel. "equimosis, "; } ?>
         <?php if ($petequiasExPiel == 1) {$antecedenteExaPiel= $antecedenteExaPiel. "petequias, "; } ?>
         <?php if ($cianosisExPiel == 1) {$antecedenteExaPiel= $antecedenteExaPiel. "cianosis, "; } ?>
         <?php if ($erupcionExPiel == 1) {$antecedenteExaPiel= $antecedenteExaPiel. "erupción, "; } ?>
         <?php if ($paniculoExPiel == 1) {$antecedenteExaPiel= $antecedenteExaPiel. "panículo, "; } ?>
         <?php if ($turgorExPiel == 1) {$antecedenteExaPiel= $antecedenteExaPiel. "turgor, "; } ?>
         <?php if ($edemaExPiel == 1) {$antecedenteExaPiel= $antecedenteExaPiel. "edema, "; } ?>
         <?php if ($unasExPiel == 1) {$antecedenteExaPiel= $antecedenteExaPiel. "uñas, "; } ?>
         <?php if ($nodulosExPiel == 1) {$antecedenteExaPiel= $antecedenteExaPiel. "nódulos, "; } ?>
         <?php if ($pelosExPiel == 1) {$antecedenteExaPiel= $antecedenteExaPiel. "pelos, "; } ?>
         <?php if ($vascularizacionExPiel == 1) {$antecedenteExaPiel= $antecedenteExaPiel. "vascularización, "; } ?>
         <?php if ($cicatricesExPiel == 1) {$antecedenteExaPiel= $antecedenteExaPiel. "cicatrices, "; } ?>
         <?php if ($ulcerasExPiel == 1) {$antecedenteExaPiel= $antecedenteExaPiel. "ulceras, "; } ?>
         <?php if ($fistulasExPiel == 1) {$antecedenteExaPiel= $antecedenteExaPiel. "fístulas, "; } ?>
         <?php if ($otrosExPiel == 1) {$antecedenteExaPiel= $antecedenteExaPiel. $otrosExPielDescribir; } ?>
              <table style="border:0px solid gray">              
			  <tbody>
              <tr> 
                <td><span class="historia">Piel pandiculo adiposo y faneras:</span> <?php echo $antecedenteExaPiel ?> </td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              </tbody>
			  </table>
      <?php } ?>
      <?php if ($cabezaEx == 1) { ?>
         <?php if ($configuracion == 1) {$antecedenteExaCabeza= $antecedenteExaCabeza. "configuracion, "; } ?>
         <?php if ($fontanelas == 1) {$antecedenteExaCabeza= $antecedenteExaCabeza. "fontanelas, "; } ?>
         <?php if ($suturas == 1) {$antecedenteExaCabeza= $antecedenteExaCabeza. "suturas, "; } ?>
         <?php if ($circunferencia == 1) {$antecedenteExaCabeza= $antecedenteExaCabeza. "circunferencia, "; } ?>
         <?php if ($craneotabes == 1) {$antecedenteExaCabeza= $antecedenteExaCabeza. "craneotabes, "; } ?>
         <?php if ($cabellos == 1) {$antecedenteExaCabeza= $antecedenteExaCabeza. "cabellos, "; } ?>
         <?php if ($dolorExCabeza == 1) {$antecedenteExaCabeza= $antecedenteExaCabeza. "dolor, "; } ?>
         <?php if ($otrosExCabeza == 1) {$antecedenteExaCabeza= $antecedenteExaCabeza. $otrosExCabezaDescribir; } ?>
              <table style="border:0px solid gray">              
			  <tbody>
              <tr> 
                <td><span class="historia">Cabeza:</span> <?php echo $antecedenteExaCabeza ?> </td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              </tbody>
			  </table>
      <?php } ?>
      <?php if ($ojosEx == 1) { ?>
         <?php if ($conjuntivas == 1) {$antecedenteExaOjos= $antecedenteExaOjos. "conjuntivas, "; } ?>
         <?php if ($esclerotica == 1) {$antecedenteExaOjos= $antecedenteExaOjos. "esclerótica, "; } ?>
         <?php if ($cornea == 1) {$antecedenteExaOjos= $antecedenteExaOjos. "córnea, "; } ?>
         <?php if ($pupilas == 1) {$antecedenteExaOjos= $antecedenteExaOjos. "pupilas, "; } ?>
         <?php if ($movimientos == 1) {$antecedenteExaOjos= $antecedenteExaOjos. "movimientos, "; } ?>
         <?php if ($desviaciones == 1) {$antecedenteExaOjos= $antecedenteExaOjos. "desviaciones, "; } ?>
         <?php if ($nistagmusEx == 1) {$antecedenteExaOjos= $antecedenteExaOjos. "nistagmus, "; } ?>
         <?php if ($ptosis == 1) {$antecedenteExaOjos= $antecedenteExaOjos. "ptosis, "; } ?>
         <?php if ($exoftaimos == 1) {$antecedenteExaOjos= $antecedenteExaOjos. "exoftaimos, "; } ?>
         <?php if ($oftalmoscopicos == 1) {$antecedenteExaOjos= $antecedenteExaOjos. "oftalmoscópicos, "; } ?>
         <?php if ($otrosOjosEx == 1) {$antecedenteExaOjos= $antecedenteExaOjos. $otrosOjosDescribirEx; } ?>
              <table style="border:0px solid gray">              
			  <tbody>
              <tr> 
                <td><span class="historia">Ojos:</span> <?php echo $antecedenteExaOjos ?> </td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              </tbody>
			  </table>
    <?php } ?>
    <?php if ($oidosEx == 1) { ?>    
		 <?php if ($pabellon == 1) {$antecedenteExaOidos= $antecedenteExaOidos. "pabellón, "; } ?>  
         <?php if ($canal == 1) {$antecedenteExaOidos= $antecedenteExaOidos. "canal externo, "; } ?>  
         <?php if ($timpano == 1) {$antecedenteExaOidos= $antecedenteExaOidos. "tímpano, "; } ?>  
         <?php if ($audicion == 1) {$antecedenteExaOidos= $antecedenteExaOidos. "audición, "; } ?>  
         <?php if ($secrecionesEx == 1) {$antecedenteExaOidos= $antecedenteExaOidos. "secreciones, "; } ?>  
         <?php if ($mastoides == 1) {$antecedenteExaOidos= $antecedenteExaOidos. "mastoides, "; } ?>  
         <?php if ($dolorExOidos == 1) {$antecedenteExaOidos= $antecedenteExaOidos. "dolor, "; } ?>  
         <?php if ($otrosExOidos == 1) {$antecedenteExaOidos= $antecedenteExaOidos. $otrosExOidosDescribir; } ?>  
              <table style="border:0px solid gray">              
			  <tbody>
              <tr> 
                <td><span class="historia">Oidos:</span> <?php echo $antecedenteExaOidos ?> </td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              </tbody>
			  </table>
    <?php } ?>
    <?php if ($rinofaringeEx == 1) { ?>         
         <?php if ($fosas == 1) {$antecedenteRinofaringe= $antecedenteRinofaringe. "fosas nasales, "; } ?>
         <?php if ($mucosasRino == 1) {$antecedenteRinofaringe= $antecedenteRinofaringe. "mucosas, "; } ?>
         <?php if ($secrecionRino == 1) {$antecedenteRinofaringe= $antecedenteRinofaringe. "secreción nasal, "; } ?>
         <?php if ($tabique == 1) {$antecedenteRinofaringe= $antecedenteRinofaringe. "tabique, "; } ?>
         <?php if ($seno == 1) {$antecedenteRinofaringe= $antecedenteRinofaringe. "seno accesorios, "; } ?>
         <?php if ($diafanoscopia == 1) {$antecedenteRinofaringe= $antecedenteRinofaringe. "diafanoscopia, "; } ?>
         <?php if ($amigdalas == 1) {$antecedenteRinofaringe= $antecedenteRinofaringe. "amigdalas, "; } ?>
         <?php if ($faringe == 1) {$antecedenteRinofaringe= $antecedenteRinofaringe. "faringe, "; } ?>
         <?php if ($adenoides == 1) {$antecedenteRinofaringe= $antecedenteRinofaringe. "adenoides, "; } ?>
         <?php if ($secrecionPost == 1) {$antecedenteRinofaringe= $antecedenteRinofaringe. "secreción postnasal, "; } ?>
         <?php if ($difagia == 1) {$antecedenteRinofaringe= $antecedenteRinofaringe. "difagia, "; } ?>
         <?php if ($otrosRino == 1) {$antecedenteRinofaringe= $antecedenteRinofaringe. $otrosRinoDescribir; } ?>
              <table style="border:0px solid gray">              
			  <tbody>
              <tr> 
                <td><span class="historia">Rinofaringe:</span> <?php echo $antecedenteRinofaringe ?> </td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              </tbody>
			  </table>
     <?php } ?>
     <?php if ($bocaEx == 1) { ?> 
         <?php if ($alientoBoca == 1) {$antecedenteExBoca= $antecedenteExBoca. "aliento, "; } ?>
         <?php if ($labiosBoca == 1) {$antecedenteExBoca= $antecedenteExBoca. "labios, "; } ?>
         <?php if ($dientesBoca == 1) {$antecedenteExBoca= $antecedenteExBoca. "dientes, "; } ?>
         <?php if ($enciasBoca == 1) {$antecedenteExBoca= $antecedenteExBoca. "encias, "; } ?>
         <?php if ($mucosasBoca == 1) {$antecedenteExBoca= $antecedenteExBoca. "mucosas, "; } ?>
         <?php if ($lenguaBoca == 1) {$antecedenteExBoca= $antecedenteExBoca. "lengua, "; } ?>
         <?php if ($conductosBoca == 1) {$antecedenteExBoca= $antecedenteExBoca. "conductos salivares, "; } ?>
         <?php if ($trismo == 1) {$antecedenteExBoca= $antecedenteExBoca. "parálisis y trismo, "; } ?>
         <?php if ($otrosBocaEx == 1) {$antecedenteExBoca= $antecedenteExBoca. $otrosBocaDescribirEx; } ?>
              <table style="border:0px solid gray">              
			  <tbody>
              <tr> 
                <td><span class="historia">Boca:</span> <?php echo $antecedenteExBoca ?> </td>
                <td></td>
                <td></td>
              </tr>   
              <tr>
                <td></td>
                <td></td>
                <td></td>
              </tr> 
              </tbody>
			  </table>
      <?php } ?>
      <?php if ($cuelloEx == 1) { ?>
         <?php if ($movilidadCuello == 1) {$antecedenteExCuello= $antecedenteExCuello. "movilidad, "; } ?>
         <?php if ($tumoracionCuello == 1) {$antecedenteExCuello= $antecedenteExCuello. "tumoración, "; } ?>
         <?php if ($tiroidesCuello == 1) {$antecedenteExCuello= $antecedenteExCuello. "tiroides, "; } ?>
         <?php if ($vasosCuello == 1) {$antecedenteExCuello= $antecedenteExCuello. "vasos, "; } ?>
         <?php if ($traqueaCuello == 1) {$antecedenteExCuello= $antecedenteExCuello. "tráquea, "; } ?>
         <?php if ($otrosCuello == 1) {$antecedenteExCuello= $antecedenteExCuello. $otrosCuelloDescribir; } ?>
              <table style="border:0px solid gray">              
			  <tbody>
              <tr> 
                <td><span class="historia">Cuello:</span> <?php echo $antecedenteExCuello ?> </td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
              </tr> 
              </tbody>
			  </table>
      <?php } ?>
      <?php if ($gangliosEx == 1) { ?> 
         <?php if ($cervicales == 1) {$antecedenteGanglios= $antecedenteGanglios. "cervicales, "; } ?>
         <?php if ($occipitales == 1) {$antecedenteGanglios= $antecedenteGanglios. "occipitales, "; } ?>
         <?php if ($supraclaviculares == 1) {$antecedenteGanglios= $antecedenteGanglios. "supraclaviculares, "; } ?>
         <?php if ($axilares == 1) {$antecedenteGanglios= $antecedenteGanglios. "axilares, "; } ?>
         <?php if ($inguinales == 1) {$antecedenteGanglios= $antecedenteGanglios. "inguinales, "; } ?>
         <?php if ($epitroclares == 1) {$antecedenteGanglios= $antecedenteGanglios. "epitroclares, "; } ?>
         <?php if ($otrosGanglios == 1) {$antecedenteGanglios= $antecedenteGanglios. $otrosGangliosDescribir; } ?>
              <table style="border:0px solid gray">              
			  <tbody>
              <tr> 
                <td><span class="historia">Ganglios linfáticos:</span> <?php echo $antecedenteGanglios ?> </td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              </tbody>
			  </table>
     <?php } ?>
     <?php if ($toraxPulmonesEx == 1) { ?>         
        <?php if ($circunferenciaTorax == 1) {$antecedenteTorax= $antecedenteTorax. "circunferencia, "; } ?>
        <?php if ($forma == 1) {$antecedenteTorax= $antecedenteTorax. "forma, "; } ?>
        <?php if ($simetria == 1) {$antecedenteTorax= $antecedenteTorax. "simetría, "; } ?>
        <?php if ($expansion == 1) {$antecedenteTorax= $antecedenteTorax. "expansión, "; } ?>
        <?php if ($respiracionTorax == 1) {$antecedenteTorax= $antecedenteTorax. "respiración (tipo - ritmo y frecuencia), "; } ?>
        <?php if ($disneaTorax == 1) {$antecedenteTorax= $antecedenteTorax. "disnea, "; } ?>
        <?php if ($palpacion == 1) {$antecedenteTorax= $antecedenteTorax. "palpación, "; } ?>
        <?php if ($percusion == 1) {$antecedenteTorax= $antecedenteTorax. "percusión, "; } ?>
        <?php if ($auscultacion == 1) {$antecedenteTorax= $antecedenteTorax. "auscultación, "; } ?>
        <?php if ($radioscopia == 1) {$antecedenteTorax= $antecedenteTorax. "radioscopia, "; } ?>
        <?php if ($otrasTorax == 1) {$antecedenteTorax= $antecedenteTorax. $otrasToraxDescribir; } ?>
              <table style="border:0px solid gray">              
			  <tbody>
              <tr> 
                <td><span class="historia">Torax y pulmones:</span> <?php echo $antecedenteTorax ?> </td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              </tbody>
			  </table>
     <?php } ?>
     <?php if ($corazonVasosEx == 1) { ?>
        <?php if ($region == 1) {$antecedenteExCorazon= $antecedenteExCorazon. "región precordial, "; } ?>
        <?php if ($latido == 1) {$antecedenteExCorazon= $antecedenteExCorazon. "latido de la punta, "; } ?>
        <?php if ($thrill == 1) {$antecedenteExCorazon= $antecedenteExCorazon. "thrill, "; } ?>
        <?php if ($ritmo == 1) {$antecedenteExCorazon= $antecedenteExCorazon. "ritmo, "; } ?>
        <?php if ($ruidos == 1) {$antecedenteExCorazon= $antecedenteExCorazon. "ruidos, "; } ?>
        <?php if ($soplos == 1) {$antecedenteExCorazon= $antecedenteExCorazon. "soplos, "; } ?>
        <?php if ($tension == 1) {$antecedenteExCorazon= $antecedenteExCorazon. "tensión arterial, "; } ?>
        <?php if ($pulso == 1) {$antecedenteExCorazon= $antecedenteExCorazon. "pulso, "; } ?>
        <?php if ($vasos == 1) {$antecedenteExCorazon= $antecedenteExCorazon. "vasos periféricos, "; } ?>
        <?php if ($otrosCorazon == 1) {$antecedenteExCorazon= $antecedenteExCorazon. $otrosCorazonDescribir; } ?>
              <table style="border:0px solid gray">              
			  <tbody>
              <tr> 
                <td><span class="historia">Corazón y vasos:</span> <?php echo $antecedenteExCorazon ?> </td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              </tbody>
			  </table>
     <?php } ?>
     <?php if ($abdomenEx == 1) {  ?>
        <?php if ($circunferenciaAbdomen == 1) {$antecedenteAbdomen= $antecedenteAbdomen. "circunferencia, "; } ?>
        <?php if ($aspecto == 1) {$antecedenteAbdomen= $antecedenteAbdomen. "aspecto, "; } ?>
        <?php if ($peristalsis == 1) {$antecedenteAbdomen= $antecedenteAbdomen. "peristalsis, "; } ?>
        <?php if ($cicatrices == 1) {$antecedenteAbdomen= $antecedenteAbdomen. "cicatrices, "; } ?>
        <?php if ($dolorAbdomen == 1) {$antecedenteAbdomen= $antecedenteAbdomen. "dolor, "; } ?>
        <?php if ($hiparestesia == 1) {$antecedenteAbdomen= $antecedenteAbdomen. "hiparestesia, "; } ?>
        <?php if ($contractura == 1) {$antecedenteAbdomen= $antecedenteAbdomen. "contractura, "; } ?>
        <?php if ($defensa == 1) {$antecedenteAbdomen= $antecedenteAbdomen. "defensa, "; } ?>
        <?php if ($tumoraciones == 1) {$antecedenteAbdomen= $antecedenteAbdomen. "tumoraciones, "; } ?>
        <?php if ($ascitis == 1) {$antecedenteAbdomen= $antecedenteAbdomen. "ascitis adiposo, "; } ?>
        <?php if ($higado == 1) {$antecedenteAbdomen= $antecedenteAbdomen. "higado, "; } ?>
        <?php if ($bazo == 1) {$antecedenteAbdomen= $antecedenteAbdomen. "bazo, "; } ?>
        <?php if ($hernia == 1) {$antecedenteAbdomen= $antecedenteAbdomen. "hernia, "; } ?>
        <?php if ($otrosAbdomen == 1) {$antecedenteAbdomen= $antecedenteAbdomen. $otrosAbdomenDescribir; } ?>
              <table style="border:0px solid gray">              
			  <tbody>
              <tr> 
                <td><span class="historia">Abdomen:</span> <?php echo $antecedenteAbdomen ?> </td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              </tbody>
			  </table>
     <?php } ?>
     <?php if ($urinarioEx == 1) {  ?>
        <?php if ($rinones == 1) {$antecedenteExaUrinario= $antecedenteExaUrinario. "riñones, "; } ?>
        <?php if ($puntos == 1) {$antecedenteExaUrinario= $antecedenteExaUrinario. "puntos dolorosos, "; } ?>
        <?php if ($miccion == 1) {$antecedenteExaUrinario= $antecedenteExaUrinario. "micción, "; } ?>
        <?php if ($orina == 1) {$antecedenteExaUrinario= $antecedenteExaUrinario. "orina, "; } ?>
        <?php if ($dolorUrinario == 1) {$antecedenteExaUrinario= $antecedenteExaUrinario. "dolor, "; } ?>
        <?php if ($otroUrinario == 1) {$antecedenteExaUrinario= $antecedenteExaUrinario. $dolorUrinarioDescribir; } ?>
              <table style="border:0px solid gray">              
			  <tbody>
              <tr> 
                <td><span class="historia">Urinario:</span> <?php echo $antecedenteExaUrinario ?> </td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              </tbody>
			  </table>
     <?php } ?>
     <?php if ($genitalesEx == 1) { ?>
        <?php if ($cicatricesGen == 1) {$antecedenteExaGenitales= $antecedenteExaGenitales. "cicatrices, "; } ?>
        <?php if ($lesionesGen == 1) {$antecedenteExaGenitales= $antecedenteExaGenitales. "lesiones, "; } ?>
        <?php if ($secrecionesGen == 1) {$antecedenteExaGenitales= $antecedenteExaGenitales. "secreciones, "; } ?>
        <?php if ($escroto == 1) {$antecedenteExaGenitales= $antecedenteExaGenitales. "escroto, "; } ?>
        <?php if ($epididimo == 1) {$antecedenteExaGenitales= $antecedenteExaGenitales. "epididimo, "; } ?>
        <?php if ($conducto == 1) {$antecedenteExaGenitales= $antecedenteExaGenitales. "conducto deferente, "; } ?>
        <?php if ($testiculos == 1) {$antecedenteExaGenitales= $antecedenteExaGenitales. "testículos, "; } ?>
        <?php if ($prostata == 1) {$antecedenteExaGenitales= $antecedenteExaGenitales. "próstata, "; } ?>
        <?php if ($vesiculos == 1) {$antecedenteExaGenitales= $antecedenteExaGenitales. "vesiculos seminales, "; } ?>
        <?php if ($ovarios == 1) {$antecedenteExaGenitales= $antecedenteExaGenitales. "ovarios, "; } ?>
        <?php if ($externos == 1) {$antecedenteExaGenitales= $antecedenteExaGenitales. "externos, "; } ?>
        <?php if ($otrosGen == 1) {$antecedenteExaGenitales= $antecedenteExaGenitales. $otrosGenDescribir; } ?>
              <table style="border:0px solid gray">              
			  <tbody>
              <tr> 
                <td><span class="historia">Genitales:</span> <?php echo $antecedenteExaGenitales ?> </td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              </tbody>
			  </table>
     <?php } ?>
     <?php if ($anoRectoEx == 1) {  ?>
        <?php if ($fisura == 1) {$antecedenteAno= $antecedenteAno. "fisura, "; } ?>
        <?php if ($fistula == 1) {$antecedenteAno= $antecedenteAno. "fístula, "; } ?>
        <?php if ($prolapsoAno == 1) {$antecedenteAno= $antecedenteAno. "prolapso, "; } ?>
        <?php if ($esfinterAno == 1) {$antecedenteAno= $antecedenteAno. "esfinter, "; } ?>
        <?php if ($tumoracionesAno == 1) {$antecedenteAno= $antecedenteAno. "tumoraciones, "; } ?>
        <?php if ($hemorroidesAno == 1) {$antecedenteAno= $antecedenteAno. "hemorroides, "; } ?>
        <?php if ($eritemaAno == 1) {$antecedenteAno= $antecedenteAno. "eritema anal, "; } ?>
        <?php if ($tacto == 1) {$antecedenteAno= $antecedenteAno. "tacto rectal, "; } ?>
        <?php if ($rectoscopia == 1) {$antecedenteAno= $antecedenteAno. "rectoscopia, "; } ?>
        <?php if ($otrosAno == 1) {$antecedenteAno= $antecedenteAno. $otrosAnoDescribir; } ?>
              <table style="border:0px solid gray">              
			  <tbody>
              <tr> 
                <td><span class="historia">Ano y recto:</span> <?php echo $antecedenteAno ?> </td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              </tbody>
			  </table>
     <?php } ?>
     <?php if ($huesosEx == 1) { ?>
        <?php if ($deformidadesHuesos == 1) {$antecedenteExHuesos= $antecedenteExHuesos. "deformidades, "; } ?>
        <?php if ($inflamacion == 1) {$antecedenteExHuesos= $antecedenteExHuesos. "inflamación, "; } ?>
        <?php if ($epitisitis == 1) {$antecedenteExHuesos= $antecedenteExHuesos. "epitisitis, "; } ?>
        <?php if ($sensibilidad == 1) {$antecedenteExHuesos= $antecedenteExHuesos. "sensibilidad, "; } ?>
        <?php if ($limitacion == 1) {$antecedenteExHuesos= $antecedenteExHuesos. "limitación de movimiento, "; } ?>
        <?php if ($masas == 1) {$antecedenteExHuesos= $antecedenteExHuesos. "masas musculares, "; } ?>
        <?php if ($dedos == 1) {$antecedenteExHuesos= $antecedenteExHuesos. "dedos hipocráticos, "; } ?>
        <?php if ($otrosHuesos == 1) {$antecedenteExHuesos= $antecedenteExHuesos. $otrosHuesosDescribir; } ?>
              <table style="border:0px solid gray">              
			  <tbody> 
              <tr> 
                <td><span class="historia">Huesos, articulaciones y musculos:</span> <?php echo $antecedenteExHuesos ?> </td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              </tbody>
			  </table>
     <?php } ?>
     <?php if ($neurologicosEx == 1) { ?>
        <?php if ($motilidad == 1) {$antecedenteExNeurologicos= $antecedenteExNeurologicos. "motilidad, "; } ?>
        <?php if ($reflejos == 1) {$antecedenteExNeurologicos= $antecedenteExNeurologicos. "reflejos, "; } ?>
        <?php if ($objetiva == 1) {$antecedenteExNeurologicos= $antecedenteExNeurologicos. "sensibilidad objetiva, "; } ?>
        <?php if ($coordinacion == 1) {$antecedenteExNeurologicos= $antecedenteExNeurologicos. "coordinación, "; } ?>
        <?php if ($troficos == 1) {$antecedenteExNeurologicos= $antecedenteExNeurologicos. "tróficos, "; } ?>
        <?php if ($lenguaje == 1) {$antecedenteExNeurologicos= $antecedenteExNeurologicos. "lenguaje, "; } ?>
        <?php if ($escritura == 1) {$antecedenteExNeurologicos= $antecedenteExNeurologicos. "escritura, "; } ?>
        <?php if ($orientacion == 1) {$antecedenteExNeurologicos= $antecedenteExNeurologicos. "orientación, "; } ?>
        <?php if ($psiquismo == 1) {$antecedenteExNeurologicos= $antecedenteExNeurologicos. "psiquismo, "; } ?>
        <?php if ($otrosNeu == 1) {$antecedenteExNeurologicos= $antecedenteExNeurologicos. $otrosNeuDescribir; } ?>
              <table style="border:0px solid gray">              
			  <tbody>
              <tr> 
                <td><span class="historia">Neurologicos y psiquico:</span> <?php echo $antecedenteExNeurologicos ?> </td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              </tbody>
			  </table>
      <?php } ?>
      <?php if ($sensorialesEx == 1) { ?> 
        <?php if ($visionSen == 1) {$antecedenteExSensoriales= $antecedenteExSensoriales. "visión, "; } ?>
        <?php if ($audicionSen == 1) {$antecedenteExSensoriales= $antecedenteExSensoriales. "audición, "; } ?>
        <?php if ($olorSen == 1) {$antecedenteExSensoriales= $antecedenteExSensoriales. "olor, "; } ?>
        <?php if ($gustoSen == 1) {$antecedenteExSensoriales= $antecedenteExSensoriales. "gusto, "; } ?>
        <?php if ($otrosSen == 1) {$antecedenteExSensoriales= $antecedenteExSensoriales. $otrosSenDescribir; } ?>
              <table style="border:0px solid gray">              
			  <tbody>
              <tr> 
                <td><span class="historia">Sensoriales:</span> <?php echo $antecedenteExSensoriales ?> </td>
                <td></td> 
                <td></td>
              </tr>
           	  </tbody>
  			  </table>
      <?php } ?>
</page>


<?php
$content = ob_get_clean();
ob_end_clean();
require_once('lib/html2pdf/html2pdf.class.php');
try {
    $html2pdf = new HTML2PDF('P', 'A4', 'fr', true, 'UTF-8', array(0, 0, 0, 0));
    $html2pdf->pdf->SetDisplayMode('real');
    $html2pdf->writeHTML($content);
    $html2pdf->Output('Comprobante_PDF.pdf');
}
catch (HTML2PDF_exception $e) {
    echo $e;
    exit;
}
?>