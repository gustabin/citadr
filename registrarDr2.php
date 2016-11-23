<?php 
session_start();
session_destroy(); 
include "lib/corelib.php";
require_once('tools/mypathdb.php');
require_once('detectaPais.php');
include "lib/class/class.php";
error_reporting(0);
$_SESSION['valor'] = 10; //Activa la opcion del menu actual
include "headers/header.php";
include_once("analyticstracking.php"); // esto jode el tamaño del formulario

?>
<script type="text/javascript" src="includes/js/jqombo.js"></script>
<script Language="JavaScript">
	$(document).ready(function() {
		$('#titulo').html("Paso 1/ Datos Personales");
		//$('#contenido').load('registrarDrVista.php');		
	
    	//MASCARA EN EL INPUT
         $(".tlf").mask("(0999) 999-99-99");			 
	});
	
	
	function ocultarCiudades(){   //funcion para desaparecer cbo_ciudades
		$('#cbo_ciudades').hide();
	} 
		 
	
    //Metodo para cargar los datos personales
    $("body").on('submit', '#formDoctor', function(event) {
		event.preventDefault()
		if ($('#formDoctor').valid()) {
			$.ajax({
				type: "POST",
				url: "registrarDr2Procesar.php",
				dataType: "json",
				data: $(this).serialize(),
				success: function(respuesta) {
					if (respuesta.error == 1) {
						$('#error1').show();
						setTimeout(function() {
						$('#error1').hide();
						}, 2000);
					}
					if (respuesta.error == 2) {
						$('#error2').show();
						setTimeout(function() {
						$('#error2').hide();
						}, 2000);
					}
					if (respuesta.error == 3) {
						$('#error3').show();
						setTimeout(function() {
						$('#error3').hide();
						}, 2000);
					}
					if (respuesta.error == 4) {
						$('#error4').show();
						setTimeout(function() {
						$('#error4').hide();
						}, 2000);
					}
					if (respuesta.exito == 1) {
						$('#mensaje').show();						
						$('#siguiente').show();
						$('#enviar').hide();
						$('#cancelar').hide();
						setTimeout(function() {
						$('#mensaje').hide();
						}, 2000);						
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
        <div class="span4">
          <h5>Disfruta de nuestro servicio</h5>
          <address>
            Estamos orgullosos de poder enviarte notificaciones de tus citas y recordatorios para tu bienestar.
            
          </address>
          <p>
          <h5>Soy un nuevo paciente!</h5>
          <p>Encuentre un Doctor y haga una cita en línea.</p>
          <p>
            <a class="btn btn-small btn-primary" href="login.php">Login</a>
          </p>
        </div>
        <div class="span8">
          <h5>Por favor completa los siguientes datos</h5>
   
    <form class="form-vertical" id="formDoctor">
		<div class="control-group">
	  		<input name="Email" type="text" class="span4 required email" id="Email" placeholder="Email">
		  	<input name="Password" type="password" class="span4 required" id="Password"  placeholder="Password"> 
		</div>
	
		<div class="control-group">
			<input name="Nombre" type="text" class="span4 required" id="Nombre" placeholder="Nombre">
		  	<input name="Apellido" type="text" class="span4 required" id="Apellido"placeholder="Apellido">
		</div>	

		<div class="control-group">
	  		<input name="Direccion" type="text" class="required" id="Direccion" style="width:95%" placeholder="Dirección">              
		</div>			
	
		<div class="control-group">
			<?php JCombo::ver_estados(); ?>
			<span id="ciudadesCombo"> </span>				
		</div>
	
		<div class="control-group">              	
			<input name="celular" type="text" class="span4 required tlf" id="celular"  placeholder="Teléfono">
		</div>
        <div class="control-group">              	
			¿Cuentas con un código promocional? 
            <input name="codigoPromocional" type="text" class="span4" id="codigoPromocional"  placeholder="Código promocional">
		</div>
	
		<div class="control-group">         
			<button class="btn btn-primary" type="submit" id="enviar">Guardar</button>
			<button class="btn btn-default" type="reset" id="cancelar">Cancelar</button>
		</div>
        
  </form> <!--cierre del formulario !-->

	 <!-- ================= boton SIGUIENTE  =====================================================================  !-->
     <div class="control-group" style="display: none" id="siguiente">    
		<button class="btn btn-primary" type="botton" onClick="window.location='<?php echo SERVER ?>registrarDr2Foto.php'">Siguiente</button>
	 </div>
     
     <!-- ================= mensajes de EXITO o de ERROR===========================================================  !-->
     <div class="alert alert-success mensaje_form" style="display: none" id="mensaje">
		<button data-dismiss="alert" class="close" type="button">x</button>
		<strong>MENSAJE!</strong> <span class="textmensaje">Registro exitoso</span>          
	 </div>    
   	 
      
	 <div class="alert alert-danger mensaje_form" style="display: none" id="error1">
		<button data-dismiss="alert" class="close" type="button">x</button>
		<strong>MENSAJE!</strong> <span class="textmensaje">El password debe ser mayor de 6 caracteres</span>
	 </div>
     
	 <div class="alert alert-danger mensaje_form" style="display: none" id="error2">
		<button data-dismiss="alert" class="close" type="button">x</button>
		<strong>MENSAJE!</strong> <span class="textmensaje">El doctor ya está registrado</span>
	 </div>
     
     <div class="alert alert-danger mensaje_form" style="display: none" id="error3">
		<button data-dismiss="alert" class="close" type="button">x</button>
		<strong>MENSAJE!</strong> <span class="textmensaje">Ese código promocional ya fue utilizado 10 veces</span>
	 </div>
     
     <div class="alert alert-danger mensaje_form" style="display: none" id="error4">
		<button data-dismiss="alert" class="close" type="button">x</button>
		<strong>MENSAJE!</strong> <span class="textmensaje">Código promocional no encontrado</span>
	 </div>
        </div>
        
      </div>
    </div>
  </section>
    <!-- .................................... $footer .................................... -->
  <?php include "headers/otrofooter.php"; ?>