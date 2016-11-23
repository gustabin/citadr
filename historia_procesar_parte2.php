<?php
	session_start();  
	include "lib/corelib.php";
	error_reporting(0);
		// conector de BD 
		require_once('tools/mypathdb.php');
		$doc_id=$_SESSION['doc_id'];
		
		$us_id = $_POST ['us_id']; //viene oculto
			
		$edadSaludPadresHermanos = $_POST ['edadSaludPadresHermanos'];
		$edadSaludOtros = $_POST ['edadSaludOtros'];
		$cancer = $_POST ['cancer'];
		$diabetes = $_POST ['diabetes'];
		$discrasias= $_POST['discrasias'];
		$renales = $_POST ['renales'];
		$cardiacas = $_POST ['cardiacas'];
		$digestivas = $_POST ['digestivas'];
		$artritis = $_POST ['artritis'];
		$sifilis = $_POST ['sifilis'];
		$tuberculosis= $_POST['tuberculosis'];
		$alergias = $_POST ['alergias'];
		$intoxicaciones = $_POST ['intoxicaciones'];
		$neurologicas = $_POST ['neurologicas'];		
		$mentales = $_POST ['mentales'];		
		$otrasEnfermedades = $_POST ['otrasEnfermedades']; 
		$otrasEnfermedadesDescribir = $_POST ['otrasEnfermedadesDescribir']; 
		$familiarOtras = $_POST ['familiarOtras']; 
		$controles = $_POST ['controles']; 
		$complicaciones = $_POST ['complicaciones']; 
		$atermino = $_POST ['atermino']; 
		$prematuro = $_POST ['prematuro']; 
		$espontaneo = $_POST ['espontaneo']; 
		$anestesia = $_POST ['anestesia']; 
		$trabajo = $_POST ['trabajo']; 
		$instrumental = $_POST ['instrumental']; 
		$domiciliaria = $_POST ['domiciliaria']; 
		$institucional = $_POST ['institucional']; 
		$gestacion = $_POST ['gestacion']; 
		$otroPrenatal = $_POST ['otroPrenatal']; 
		$otroPrenatalDescribir = $_POST ['otroPrenatalDescribir']; 
		$peso = $_POST ['peso']; 
		$talla = $_POST ['talla']; 
		$respiracion = $_POST ['respiracion']; 
		$cianosis = $_POST ['cianosis']; 
		$fiebre = $_POST ['fiebre']; 
		$vomitos = $_POST ['vomitos']; 
		$icteria = $_POST ['icteria']; 
		$hemorragias = $_POST ['hemorragias']; 
		$convulsiones = $_POST ['convulsiones']; 
		$malformaciones = $_POST ['malformaciones']; 
		$oftalmia = $_POST ['oftalmia']; 
		$coriza = $_POST ['coriza']; 
		$otroNeonatal = $_POST ['otroNeonatal']; 
		$otroNeonatalDescribir = $_POST ['otroNeonatalDescribir']; 
		$natural = $_POST ['natural']; 
		$artificial = $_POST ['artificial']; 
		$mixta = $_POST ['mixta']; 
		$destete = $_POST ['destete']; 
		$cereales = $_POST ['cereales']; 
		$sopas = $_POST ['sopas']; 
		$frutas = $_POST ['frutas']; 
		$huevos = $_POST ['huevos']; 
		$carne = $_POST ['carne']; 
		$vitaminas = $_POST ['vitaminas']; 
		$dieta = $_POST ['dieta']; 
		$sesostuvo = $_POST ['sesostuvo']; 
		$sesento = $_POST ['sesento']; 
		$separo = $_POST ['separo']; 
		$camino = $_POST ['camino']; 
		$esfinter = $_POST ['esfinter']; 
		$diente = $_POST ['diente']; 
		$palabra = $_POST ['palabra']; 
		$gradoEscuela = $_POST ['gradoEscuela']; 
		$progresoEscuela = $_POST ['progresoEscuela']; 
		$sueno = $_POST ['sueno']; 
		$siestas = $_POST ['siestas']; 
		$juegos = $_POST ['juegos']; 
		$sexuales = $_POST ['sexuales']; 
		$chupaDedos = $_POST ['chupaDedos'];
		$comeUnas = $_POST ['comeUnas']; 
		$rasgos = $_POST ['rasgos']; 
		$recreacion = $_POST ['recreacion']; 
		$ocupacionHabito = $_POST ['ocupacionHabito']; 
		$otrosHabitos = $_POST ['otrosHabitos']; 
		$otrosHabitosDescribir = $_POST ['otrosHabitosDescribir']; 
		$viruela = $_POST ['viruela']; 
		$tosterona = $_POST ['tosterona'];
		$difteria = $_POST ['difteria']; 
		$tetanos = $_POST ['tetanos'];  
		$tificas = $_POST ['tificas']; 
		$bcc = $_POST ['bcc']; 
		$poliomelitis = $_POST ['poliomelitis']; 
		$tuberculina = $_POST ['tuberculina'];  
		$otrasInmunizaciones = $_POST ['otrasInmunizaciones']; 
		$otrasInmunizacionesDescribir = $_POST ['otrasInmunizacionesDescribir']; 		
		$intradomiciliarios = $_POST ['intradomiciliarios'];
		$extradomiciliarios = $_POST ['extradomiciliarios'];
		

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
		// ===============================================Actualizar los datos en tbl_historias=====================================
		$query =mysql_query("UPDATE tbl_historias SET his_edadSaludPadresHermanos='$edadSaludPadresHermanos', his_edadSaludOtros='$edadSaludOtros', his_cancer='$cancer', his_diabetes='$diabetes', his_discrasias='$discrasias', his_renales='$renales', his_cardiacas='$cardiacas', his_digestivas='$digestivas', his_artritis='$artritis', his_sifilis='$sifilis', his_tuberculosis='$tuberculosis', his_alergias='$alergias', his_intoxicaciones='$intoxicaciones', his_neurologicas='$neurologicas', his_mentales='$mentales', his_otrasEnfermedades='$otrasEnfermedades', his_otrasEnfermedadesDescribir='$otrasEnfermedadesDescribir', his_controles='$controles', his_complicaciones='$complicaciones', his_atermino='$atermino', his_prematuro='$prematuro', his_espontaneo='$espontaneo', his_anestesia='$anestesia', his_trabajo='$trabajo', his_instrumental='$instrumental', his_domiciliaria='$domiciliaria', his_institucional='$institucional', his_gestacion='$gestacion', his_otroPrenatal='$otroPrenatal', his_otroPrenatalDescribir='$otroPrenatalDescribir', his_peso='$peso', his_talla='$talla', his_respiracion='$respiracion', his_cianosis='$cianosis', his_fiebre='$fiebre', his_vomitos='$vomitos', his_icteria='$icteria', his_hemorragias='$hemorragias', his_convulsiones='$convulsiones', his_malformaciones='$malformaciones', his_oftalmia='$oftalmia', his_coriza='$coriza', his_otroNeonatal='$otroNeonatal', his_otroNeonatalDescribir='$otroNeonatalDescribir', his_natural='$natural', his_artificial='$artificial', his_mixta='$mixta', his_destete='$destete', his_cereales='$cereales', his_sopas='$sopas', his_frutas='$frutas', his_huevos='$huevos', his_carne='$carne', his_vitaminas='$vitaminas', his_dieta='$dieta', his_sostuvo='$sesostuvo', his_sento='$sesento', his_paro='$separo', his_camino='$camino', his_esfinter='$esfinter', his_diente='$diente', his_palabra='$palabra', his_grado='$gradoEscuela', his_progreso='$progresoEscuela', his_sueno='$sueno', his_siestas='$siestas', his_juegos='$juegos', his_sexuales='$sexuales', his_chupaDedos='$chupaDedos', his_comeUnas='$comeUnas', his_rasgos='$rasgos', his_recreacion='$recreacion', his_ocupacionHabito='$ocupacionHabito', his_otrosHabitos='$otrosHabitos', his_otrosHabitosDescribir='$otrosHabitosDescribir', his_viruela='$viruela', his_tosterona='$tosterona', his_difteria='$difteria', his_tetanos='$tetanos', his_tificas='$tificas', his_bcc='$bcc', his_poliomelitis='$poliomelitis', his_tuberculina='$tuberculina', his_otrasInmunizaciones='$otrasInmunizaciones', his_otrasInmunizacionesDescribir='$otrasInmunizacionesDescribir', his_intradomiciliarios='$intradomiciliarios', his_extradomiciliarios='$extradomiciliarios' WHERE his_id='$his_id'");	
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