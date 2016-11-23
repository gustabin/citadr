<?php 
session_start();
session_destroy(); 
include "lib/corelib.php";
$_SESSION['valor'] = 5; //Activa la opcion del menu actual
include "headers/header.php";
//include "lib/class/nombres.php";
include_once("analyticstracking.php");
$_SESSION['cita'] = $_GET['cita'];
?>
  <script language="JavaScript" type="text/JavaScript">
	$(document).ready(function() {
                        $("#fecha_nac").datepicker({
                            changeYear: true,
                            minDate: new Date(1900, 1 - 1, 1),
                            maxDate: '-18Y',
                            dateFormat: 'yy-mm-dd',
                            defaultDate: new Date(1970, 1 - 1, 1),
                            changeMonth: true,
                            changeYear: true,
                            yearRange: '-110:-18'
                        });					
						//MASCARA EN EL INPUT
                        $(".tlf").mask("(0999) 999-99-99");	
						})

    //Metodo para cargar el formulario 
    $("body").on('submit', '#formPaciente', function(event) {
	event.preventDefault()
	if ($('#formPaciente').valid()) {
	    $.ajax({ 
		type: "POST",
		url: "registrar_Procesar.php", 
		dataType: "json", 
		data: $(this).serialize(), 
		success: function(respuesta) {
		    if (respuesta.error == 1) { //nunca ocurre
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
			  window.location.href='equipomedico.php';
		    }		  
			
			 if (respuesta.exito == 3) {
			  $('#mensaje').show();
			  setTimeout(function() {
			  $('#mensaje').hide();
			}, 3000);
			  window.location.href='reservarCita_validar.php';
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
        <li><a href="index.php">Inicio</a><span class="divider">/</span></li>
        <li class="active">Registrar</li>
      </ul>
    </div>
  </section>
  <!-- .................................... $Contact .................................... -->
  
    <div class="container" style="margin-top:10px">
      <h2 class="section-title">
        Registrar 
        <small>Paciente</small>
      </h2>
      </div>
  
  <!-- .................................... $Contact .................................... -->
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
          <form class="form-vertical" id="formPaciente">
            <div class="control-group">
              <input class="span4 required email" id="Email" name="Email" placeholder="Email" type="text">
              <input class="span4 required" minlength="6" id="Password" name="Password" placeholder="Password" type="password">
            </div>
			
			<div class="control-group">
              <input class="span4 required" id="Nombre" name="Nombre" placeholder="Nombre" type="text">
              <input class="span4 required" id="Apellido" name="Apellido" placeholder="Apellido" type="text">
            </div>
			
			<div class="control-group">
              <input class="span4 required tlf" id="Telefono" name="Telefono" placeholder="Teléfono" type="text">
              <input class="span4 required" id="fecha_nac" name="fecha_nac" placeholder="Fecha de Nacimiento" type="text" readonly="readonly">
            </div>
			
			<div class="control-group">
              <select class="span4 required tdtextarea" name="Sexo" id="Sexo">
			  <option value="">Seleccione sexo</option>
			  <option value="M">Masculino</option>
			  <option value="F">Femenino</option>
			  </select>
            </div>
			
            <div class="control-group">         
            <button class="btn btn-primary" type="submit">Enviar</button>
			<button class="btn btn-default" type="reset">Cancelar</button>
			</div>
          </form>
		     <div class="alert alert-success mensaje_form" style="display: none" id="mensaje">
				<button data-dismiss="alert" class="close" type="button">x</button>
				<strong>MENSAJE: </strong> <span class="textmensaje">Registro exitoso</span>
			 </div>
			 <div class="alert alert-danger mensaje_form" style="display: none" id="error1">
				<button data-dismiss="alert" class="close" type="button">x</button>
				<strong>MENSAJE: </strong> <span class="textmensaje">El password debe ser mayor de 6 caracteres</span>
			 </div>
			 <div class="alert alert-danger mensaje_form" style="display: none" id="error2">
				<button data-dismiss="alert" class="close" type="button">x</button>
				<strong>MENSAJE: </strong> <span class="textmensaje">El paciente ya está registrado</span>
			 </div>
        </div>
        
      </div>
    </div>
  </section>
    <!-- .................................... $footer .................................... -->
  <?php include "headers/otrofooter.php"; ?>