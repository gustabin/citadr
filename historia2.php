<?php 
session_start();
include "lib/corelib.php";
require_once('tools/mypathdb.php');
include "lib/class/class.php";
error_reporting(0);
$_SESSION['valor'] = 12; //Activa la opcion del menu actual

	if (!empty($_GET ['id'])) 
	{
		$his_id_user = $_GET ['id'];
		$_SESSION['his_id_user'] =$his_id_user ;
	}


include "headers/otroheader.php";
?>
  <script language="JavaScript" type="text/JavaScript">
	$(document).ready(function() {
                        $("#fecConsulta").datepicker({
                            changeYear: true,
                            minDate: new Date(1900, 1 - 1, 1),
                            maxDate: '-18Y',
                            dateFormat: 'yy-mm-dd',
                            defaultDate: new Date(1970, 1 - 1, 1),
                            changeMonth: true,
                            changeYear: true,
                            yearRange: '-110:-18'
                        });			
						$("#fecConsultaAnterior").datepicker({
                            changeYear: true,
                            minDate: new Date(1900, 1 - 1, 1),
                            maxDate: '-18Y',
                            dateFormat: 'yy-mm-dd',
                            defaultDate: new Date(1970, 1 - 1, 1),
                            changeMonth: true,
                            changeYear: true,
                            yearRange: '-110:-18'
                        });			
						
		
						
		$('#titulo').html("inicio / historia clinica");
		//$('#contenido').load('registrarDrVista.php');		
		 
	});
 	

    //Metodo para cargar los datos personales
    $("body").on('submit', '#formHistoria', function(event) {
		event.preventDefault()
		if ($('#formHistoria').valid()) {
			$.ajax({
				type: "POST",
				url: "historia_procesar.php",
				dataType: "json",
				data: $(this).serialize(),
				success: function(respuesta) {
					if (respuesta.error == 1) {
						$('#error1').show();
						setTimeout(function() {
						$('#error1').hide();
						}, 3000);
					}
					
					if (respuesta.exito == 1) {
						$('#mensaje').show();
						setTimeout(function() {
						$('#mensaje').hide();
						window.location.href='historiaParte2.php'; 
					  }, 3000);
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
        <small>Parte I</small>
      <a href="historiaPDF.php"><img src="includes/img/pdf.jpg" alt="imprimir PDF" width="56" height="56" /></a></h2>
      </div>
  
  <!-- .................................... $Contenido .................................... -->
  <section class="section-content section-contact section-color-graylighter">
    <div class="container">
      <div class="row">
        <div id="contenido">  
       <div class="span12">
	<h5>Datos del paciente</h5>
    
    <?php
    //====================Buscar en la tabla citas================= 
	$query="SELECT * FROM tbl_historias WHERE his_id_user='".$his_id_user."'";  
//	var_dump($query);
//	die();
	$resultado=mysql_query($query,$dbConn);
	while($dataHis=mysql_fetch_array($resultado))
	{
	$apellido= $dataHis['his_apellido'];
	$nombre= $dataHis['his_nombre'];
	$cedula= $dataHis['his_cedula'];
	$sexo= $dataHis['his_sexo'];
	$edad= $dataHis['his_edad'];
	$edoCivil= $dataHis['his_edoCivil'];
	$ciudadNacimiento= $dataHis['his_ciudadNacimiento'];
	$fechaNacimiento= $dataHis['his_fechaNacimiento'];
	$nacionalidad= $dataHis['his_nacionalidad'];
	$ocupacion= $dataHis['his_ocupacion'];
	$direccion= $dataHis['his_direccion'];
	$avisarApellido= $dataHis['his_avisarApellido'];
	$avisarNombre= $dataHis['his_avisarNombre'];
	$avisarParentesco= $dataHis['his_avisarParentesco'];
	$avisarDireccion= $dataHis['his_avisarDireccion'];
	$fechaConsulta= $dataHis['his_fechaConsulta'];
	$horaConsulta= $dataHis['his_horaConsulta'];
	$fechaConsultaAnterior= $dataHis['his_fechaConsultaAnterior'];
	$motivos= $dataHis['his_motivos'];
	$enfermedad= $dataHis['his_enfermedad'];
	$diagnosticoProvisional= $dataHis['his_diagnosticoProvisional'];
	$egreso= $dataHis['his_egreso'];
	$diagnosticoFinal= $dataHis['his_diagnosticoFinal'];
	$fechaEgreso= $dataHis['his_fechaEgreso'];
	$horaEgreso= $dataHis['his_horaEgreso'];
	$diagnosticoAnatomo= $dataHis['his_diagnosticoAnatomo'];
	$edadSaludPadresHermanos= $dataHis['his_edadSaludPadresHermanos'];
	$edadSaludOtros= $dataHis['his_edadSaludOtros'];
	$enfermedadFamiliar= $dataHis['his_enfermedadFamiliar'];
	$otraEnfermedad= $dataHis['his_otraEnfermedad'];
	$prenatalObstetrico= $dataHis['his_prenatalObstetrico'];
	$personalNeonatal= $dataHis['his_personalNeonatal'];
	$otroPersonalNeonatal= $dataHis['his_otroPersonalNeonatal'];
	$alimentacion= $dataHis['his_alimentacion'];
	$sostuvo= $dataHis['his_sostuvo'];
	$sento= $dataHis['his_sento'];
	$paro= $dataHis['his_paro'];
	$camino= $dataHis['his_camino'];
	$esfinter= $dataHis['his_esfinter'];
	$diente= $dataHis['his_diente'];
	$palabra= $dataHis['his_palabra'];
	$grado= $dataHis['his_grado'];
	$progreso= $dataHis['his_progreso'];
	$habitos= $dataHis['his_habitos'];
	$otrosHabitos= $dataHis['his_otrosHabitos'];
	$inmunizaciones= $dataHis['his_inmunizaciones'];
	$otrasInmunizaciones= $dataHis['his_otrasInmunizaciones'];
	$tbc= $dataHis['his_tbc'];
	
	}
?>
    <section id="examples">
        <article>
            <div class="demo">
                <h2>Set Time Example</h2>
                <p>Dynamically set the time using a Javascript Date object.</p>
                <p>
                    <input id="setTimeExample" type="text" class="time" />
                    <button id="setTimeButton">Set current time</button>
                </p>
            </div>
            <script>
                $(function() {
                    $('#setTimeExample').timepicker();
                    $('#setTimeButton').on('click', function (){
                        $('#setTimeExample').timepicker('setTime', new Date());
                    });
                });
            </script>
        </article>
    </section>
