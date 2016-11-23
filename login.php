<?php 
session_start();
include "lib/corelib.php";
error_reporting(0);
$_SESSION['valor'] = 1; //Activa la opcion del menu actual
include "headers/header.php";
?> 
  <script language="JavaScript" type="text/JavaScript">
	                       
    //Metodo para cargar el formulario  
    $("body").on('submit', '#formLogin', function(event) {
	event.preventDefault()
	if ($('#formLogin').valid()) {
		$('#barra').show();
	    $.ajax({
		type: "POST",
		url: "login_Procesar.php",
		dataType: "json",
		data: $(this).serialize(),
		success: function(respuesta) {
			$('#barra').hide();
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
			
			if (respuesta.error == 4) {
			  $('#error4').show();
			setTimeout(function() {
			  $('#error4').hide();
			}, 3000);
		    }
			
			if (respuesta.exito == 1) {
			  $('#mensaje').show();
			  setTimeout(function() {
			  $('#mensaje').hide();
			  window.location.href='equipomedico.php'; 
			}, 3000);
		    }
			
			if (respuesta.exito == 2) {
			  $('#mensaje2').show();
			  setTimeout(function() {
			  $('#mensaje2').hide();
			  window.location.href='citasConfirmar.php';
			}, 3000);
		    }
			
			if (respuesta.exito == 3) {
			  $('#mensaje').show();
			  setTimeout(function() {
			  $('#mensaje').hide();
			  window.location.href='citasDoctor.php';
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
        <li><a href="index.php">Inicio</a><span class="divider">/</span></li>
        <li class="active">Ingresar</li>
      </ul>
    </div>
  </section>
  <!-- .................................... $Contact .................................... -->
  
    <div class="container" style="margin-top:10px">
      <h2 class="section-title">
        Accesar 
        <small>usuario</small>
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
          
        </div>
        <div class="span8">
          <h5>Por favor completa los siguientes datos</h5>
          <form class="form-vertical" id="formLogin">
            <div class="control-group"> 
              <input class="span4 required email" id="email" name="email" placeholder="Email" type="text">
              <input class="span4 required" id="password" name="password" placeholder="Password" type="password">              	
            </div>
  				
					
			<div class="control-group">
				<p><a href="recuperar.php">Olvidates tu password?  </a> &nbsp; &nbsp; &nbsp;  &nbsp;   <a href="nuevoUsuario.php">  Nuevo usuario</a></p>
                
            </div>
			
            <div class="control-group">         
            <button class="btn btn-primary" type="submit">Enviar</button>
			<button class="btn btn-default" type="reset">Cancelar</button>
			</div>
          </form>
		     <div class="alert alert-success mensaje_form" style="display: none" id="mensaje">
				<button data-dismiss="alert" class="close" type="button">x</button>
				<strong></strong> <span class="textmensaje">Bienvenido!...</span>
			 </div>
             <div class="alert alert-success mensaje_form" style="display: none" id="mensaje2">
				<button data-dismiss="alert" class="close" type="button">x</button>
				<strong></strong> <span class="textmensaje">Tienes una cita por confirmar</span>
			 </div>
			 <div class="alert alert-danger mensaje_form" style="display: none" id="error1">
				<button data-dismiss="alert" class="close" type="button">x</button>
				<strong></strong> <span class="textmensaje">Email o password incorrecto</span>
			 </div>
			 <div class="alert alert-danger mensaje_form" style="display: none" id="error2">
				<button data-dismiss="alert" class="close" type="button">x</button>
				<strong></strong> <span class="textmensaje">Esta cuenta esta desactivada</span>
			 </div>
			 <div class="alert alert-danger mensaje_form" style="display: none" id="error4">	
				<button data-dismiss="alert" class="close" type="button">x</button>
				<strong>MENSAJE: </strong> <span class="textmensaje">Aun no ha activado su cuenta</span>
			</div>
             
             <div style="float:left; display:none" id="barra"><img src="includes/img/barra.gif" alt="Cargando..."/><br>Ingresando....</div>	
             
        </div>
        
      </div>
    </div>
  </section>
    <!-- .................................... $footer .................................... -->
  <?php include "headers/otrofooter.php"; ?>