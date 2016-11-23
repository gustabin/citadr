<?php 
include "lib/corelib.php";
$valor = 5; //Activa la opcion del menu actual
include "headers/header.php";

?>
<script Language="JavaScript">

	$(document).ready(function() {
		$('#titulo').html("Paso 1/ Datos Personales");
		$('#contenido').load('async_registrarDr.php?puerta=1');		
	});
    //Metodo para cargar los datos personales
    $("body").on('submit', '#formDoctor', function(event) {
		event.preventDefault()
		if ($('#formDoctor').valid()) {
			$.ajax({
				type: "POST",
				url: "registrarDr_Procesar.php?puerta=1",
				dataType: "json",
				data: $(this).serialize(),
				success: function(respuesta) {
					if (respuesta.error == 1) {
						$('#error1').show();
						setTimeout(function() {
						$('#error1').hide();
						}, 3000);
					}
					if (respuesta.error == 2) {
						$('#error2').show();
						setTimeout(function() {
						$('#error2').hide();
						}, 3000);
					}
					if (respuesta.exito == 1) {
						$('#mensaje').show();
						setTimeout(function() {
						$('#mensaje').hide();
						}, 3000);
						
						$('#titulo').html("Paso 1/ Datos Personales / Foto del doctor");
						$('#contenido').load('async_registrarDr.php?puerta=7');
					}		    
				}
			});
		}
	});
	
	//Metodo para cargar el horario de consultas
    $("body").on('submit', '#horarios', function(event) {
		event.preventDefault()
		if ($('#horarios').valid()) {
			$.ajax({
				type: "POST",
				url: "registrarDr_Procesar.php?puerta=2",
				dataType: "json",
				data: $(this).serialize(),
				success: function(respuesta) {				
					if (respuesta.exito == 1) {
						$('#mensaje').show();
						setTimeout(function() {
						$('#mensaje').hide();
						}, 3000);
						$('#titulo').html("Paso 3/ Fotos de equipo médico");
						$('#contenido').load('async_registrarDr.php?puerta=3');
					}
					if (respuesta.error == 1) {
						$('#error1').show();
						setTimeout(function() {
						$('#error1').hide();
						}, 3000);
					}					
				}
			});
		}
	});
	
	//Metodo para cargar el curriculum
    $("body").on('submit', '#formCurriculum', function(event) {
		event.preventDefault()
		if ($('#formCurriculum').valid()) {
			$.ajax({
				type: "POST",
				url: "registrarDr_Procesar.php?puerta=3",
				dataType: "json",
				data: $(this).serialize(),
				success: function(respuesta) {				
					if (respuesta.exito == 1) {
						$('#mensaje').show();
						setTimeout(function() {
						$('#mensaje').hide();
						}, 3000);
						$('#titulo').html("Paso 5/ Especialidades médico");
						$('#contenido').load('async_registrarDr.php?puerta=8');
					}					
				}
			});
		}
	});
	
	function eliminarFoto(nombreImagen) {
		$('#barra').show();
			$.ajax({
				type: "POST",
				url: "async_registrarDr.php?puerta=5&nombreImagen="+nombreImagen,
				dataType: "html",
				data: $(this).serialize(),
				success: function(respuesta) {
					$('#barra').hide();
					$('#contenido').load('async_registrarDr.php?puerta=3&exito=1');    
				}			
			});
	}
	
	function pasoCurriculum(){
		$('#titulo').html("Paso 4/ Resumen Curricular del médico");
		$('#contenido').load('async_registrarDr.php?puerta=6');
	}
	function paso2Horario(){
		$('#titulo').html("Paso 2/ Horario de consultas");
		$('#contenido').load('async_registrarDr.php?puerta=2');
	}
	
	    
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
        Registrar 
        <small>Doctor</small>
      </h2>
      </div>
  
  <!-- .................................... $Contenido .................................... -->
  <section class="section-content section-contact section-color-graylighter">
    <div class="container">
      <div class="row">
        <div id="contenido"> 
       
        </div>        
      </div>
    </div>
  </section>
    <!-- .................................... $footer .................................... -->
  <?php include "headers/otrofooter.php"; ?>