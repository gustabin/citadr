<?php 
session_start();
session_destroy(); 
include "lib/corelib.php";
//$_SESSION['valor'] = 5; //Activa la opcion del menu actual
include "headers/headerCargar.php"; 
//include "lib/class/nombres.php";
//include_once("analyticstracking.php");
$_SESSION['cita'] = $_GET['cita'];
?>
  <script language="JavaScript" type="text/JavaScript">
    //Metodo para cargar el formulario 
    $("body").on('submit', '#formLoteria', function(event) {
	event.preventDefault()
	if ($('#formLoteria').valid()) {
	    $.ajax({
		type: "POST",
		url: "cargar_Procesar.php",
		dataType: "json",
		data: $(this).serialize(),
		success: function(respuesta) {
		    if (respuesta.error == 1) { //nunca ocurre
			  $('#error').show();
			setTimeout(function() {
			  $('#error').hide();
			}, 3000);
		    }
			
			  if (respuesta.exito == 1) {
			  $('#mensaje').show();
			  setTimeout(function() {
			  $('#mensaje').hide();
			}, 3000);
			  window.location.href='cargar_Listo.php';
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
        <li>Inicio<span class="divider">/</span></li>
        <li class="active">Registrar</li>
      </ul>
    </div>
  </section>
  <!-- .................................... $Contact .................................... -->
  
    <div class="container" style="margin-top:10px">
      <h2 class="section-title">
        Registrar 
        <small>resultado</small>
      </h2>
      </div>
  
  <!-- .................................... $Contact .................................... -->
  <section class="section-content section-contact section-color-graylighter">
    <div class="container">
      <div class="row">
        <div class="span4">
          <h5>Carga de los resultados de la loteria</h5>
		   <address>TRIPLE ZULIA</address>		  
        </div>
        <div class="span4">
          <h5>Completa los siguientes datos</h5>
          <form class="form-vertical" id="formLoteria">
		    <div class="control-group" align="right">
              A<input name="A" type="text" class="required" id="A" size="2" maxlength="3" placeholder="XXX">
            </div>
            <div class="control-group" align="right">
              B<input name="B" type="text" class="required" id="B" size="2" maxlength="3" placeholder="XXX">
            </div>
            <div class="control-group" align="right">
			  TRIPLE<input name="triple" type="text" class="required" id="triple" size="2" maxlength="3" placeholder="XXX">
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
			 <div class="alert alert-danger mensaje_form" style="display: none" id="error">
				<button data-dismiss="alert" class="close" type="button">x</button>
				<strong>MENSAJE: </strong> <span class="textmensaje">El numero debe ser de 3 digitos</span>
			 </div>
			 
        </div>
        
      </div>
    </div>
  </section>
    <!-- .................................... $footer .................................... -->
  <?php include "headers/otrofooter.php"; ?>