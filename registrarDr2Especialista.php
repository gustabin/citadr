<?php 
session_start();
include "lib/corelib.php";
require_once('tools/mypathdb.php');
include "lib/class/class2.php";
error_reporting(0);
//$valor = 5; //Activa la opcion del menu actual
$_SESSION['valor'] = 7; //Activa la opcion del menu actual
include "headers/header.php";
?>
<script type="text/javascript" src="includes/js/jqombo2.js"></script>
<script Language="JavaScript">

	$(document).ready(function() {
		$('#titulo').html("Paso 6/ Datos Personales / Especialidad del médico");
	});
    //Metodo para cargar los datos personales
    $("body").on('submit', '#formEspecialista', function(event) {
		event.preventDefault()
		if ($('#formEspecialista').valid()) {
			$.ajax({
				type: "POST",
				url: "registrarDr2EspecialistaProcesar.php",
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
						$('#siguiente').show();
						$('#enviar').hide();
						$('#cancelar').hide();
						setTimeout(function() {
						$('#mensaje').hide();
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
        Registrar 
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
				<div>Especialidad:
							<?php JCombo2::ver_especialidad(); ?>
				</div>
				<div>	 Motivos: </div>
				<div id="motivosCombo"> </div>	
                				 
				<div class="control-group">      
					<button class="btn btn-primary" type="submit" id="enviar">Guardar</button>
					<button class="btn btn-default" type="reset" id="cancelar">Cancelar</button>
				</div>
			  </form><!--cierre del formulario !-->
				
		

			 <!-- ================= boton SIGUIENTE  =====================================================================  !-->
				<div class="control-group" style="display: none" id="siguiente">     
					<button class="btn btn-primary" type="botton" onClick="window.location='<?php echo SERVER ?>registrarDr2Ficha.php'">Siguiente</button>
				</div>
						
			 
			 <!-- ================= mensajes de EXITO o de ERROR===========================================================  !-->
			 <div class="alert alert-success mensaje_form" style="display: none" id="mensaje">
				<button data-dismiss="alert" class="close" type="button">x</button>
				<strong>MENSAJE!</strong> <span class="textmensaje">Registro exitoso</span>          
			 </div>    
			 
			 
			 <div class="alert alert-danger mensaje_form" style="display: none" id="error1">
				<button data-dismiss="alert" class="close" type="button">x</button>
				<strong>MENSAJE!</strong> <span class="textmensaje">Debe describir la especialidad</span>
			 </div>
     
			</div><!--cierre de spam de formulario !-->
			<div class="span4">
					<h3 align="justify">También puede   </h3>
					agregar, modificar ó eliminar la especialidad.
			</div>
        </div>        
      </div>
    </div>
  </section>
    <!-- .................................... $footer .................................... -->
  <?php include "headers/otrofooter.php"; ?>