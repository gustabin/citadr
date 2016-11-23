<?php 
session_start();
include "lib/corelib.php";
require_once('tools/mypathdb.php');
include "lib/class/class2.php";
error_reporting(0);
$_SESSION['valor'] = 8; //Activa la opcion del menu actual
include "headers/header.php";
?>
<script Language="JavaScript">
	$(document).ready(function() {
		$('#titulo').html("Paciente / Equipo médico");		 
	});
	
//Metodo para verificar que los datos esten completos
    $("body").on('submit', '#formEspecialista', function(event) {
		event.preventDefault()
		if ($('#formEspecialista').valid()) {
			$.ajax({
				type: "POST",
				url: "reservarCitaFormulario.php",
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
						$('#enviar').hide();
						$('#cancelar').hide();
						setTimeout(function() {
						$('#mensaje').hide();
						window.location.href='reservarCitaProcesar.php';
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
        Buscar un 
        <small>Doctor</small>
      </h2>
	</div>
  
 <!-- .................................... $Contenido .................................... -->
  <section class="section-content section-contact section-color-graylighter">
    <div class="container">
      <div class="row">
        <div id="contenido"> 
			<div class="span6">
				<h5>Por favor completa los siguientes datos</h5>
			  <form name="formEspecialista" id="formEspecialista" method="post" action="">		
				<div class="control-group">
                	Especialidad:
					<?php JCombo2::ver_especialidad(); ?>
				</div>

                <!--div class="control-group">  /// esta desabilitada la busqueda por estado y ciudad
					<?php// JCombo::ver_estados(); ?>
					<span id="ciudadesCombo"> </span>				
				</div!-->
                				 
				<div class="control-group">      
					<button class="btn btn-primary" type="submit" id="enviar">Enviar</button>
					<button class="btn btn-default" type="reset" id="cancelar">Cancelar</button>
				</div>
			  </form><!--cierre del formulario !-->
				
		
						
			 
			 <!-- ================= mensajes de EXITO o de ERROR======================================  !-->
			 <div class="alert alert-success mensaje_form" style="display: none" id="mensaje">
				<button data-dismiss="alert" class="close" type="button">x</button>
				<strong>MENSAJE!</strong> <span class="textmensaje">Busqueda exitosa</span>          
			 </div>    
			 
			 
			 <div class="alert alert-danger mensaje_form" style="display: none" id="error1">
				<button data-dismiss="alert" class="close" type="button">x</button>
				<strong>MENSAJE!</strong> <span class="textmensaje">No se encontro ningún registro</span>
			 </div>
             
             <div class="alert alert-danger mensaje_form" style="display: none" id="error2">
				<button data-dismiss="alert" class="close" type="button">x</button>
				<strong>MENSAJE!</strong> <span class="textmensaje">Debe registrarse para poder ver al equipo médico</span>
			 </div>
     
			</div><!--cierre de spam de formulario !-->
			<div class="span4">
					<h4 align="justify">A través de nuestro buscador, <strong>citadr</strong>  pone a su disposición  </h4>
					 una herramienta útil para encontrar los especialistas médicos en su área.
			</div>
        </div>        
      </div>
    </div>
  </section>
    <!-- .................................... $footer .................................... -->
  <?php include "headers/otrofooter.php"; ?>