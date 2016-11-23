<?php 
include "lib/corelib.php";
include "headers/header.php";
include('lib/dbpath.php');
include "lib/class/lovBD.php";
error_reporting(0); 
?>
<script type="text/javascript" src="js/jqombo.js"></script>
<script language="JavaScript" type="text/JavaScript"> // Metodo para Procesar Formulario
    $("body").on('submit', '#signup-form', function(event) {  
	event.preventDefault()
	if ($('#signup-form').valid()) {
	    $.ajax({
		type: "POST",
		url: "clienteData.php?opcion=1",
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
			  window.location.href='clienteQry.php';
			}, 3000);
		    }
		    
		}
	    });
	}
	});


</script>
<section id="signup">
  <div class="container">
    <div class="row margin-40">
      <div class="col-sm-8 col-sm-offset-2 text-center signup">
        <h3>Crear Cliente</h3>
        <br/>
        <form id="signup-form" action='#' method="post"> 
          <div class="control-group">
            <div class="controls">
              <div class="col-lg-9" style="text-align: left">
                <input name="nombre" type="text" class="input-xlarge required tdtextarea" id="nombre" maxlength="200" placeholder="Nombre / Raz&oacute;n Social">
			  </div>
			  <div class="col-lg-3">
				 <input name="rif" type="text" class="input-xlarge required tdtextarea" id="rif" maxlength="15" placeholder="Rif">
			  </div>
            </div>
          </div>
          <div class="control-group">
            <div class="controls">
              <div class="col-lg-12" style="text-align: left">
                <input name="direccion" type="text" class="input-xlarge required tdtextarea" id="direccion" maxlength="250" placeholder="Direcci&oacute;n Fiscal">
              </div>
            </div>
          </div>
          <div class="styled-select100 col-md-3">
            <?php JCombo::ver_estados(); ?>
          </div>
          <div class="styled-select100 col-md-4">          
            <span id="ciudadesCombo"> </span> 
		  </div>		  
          <div class="control-group">
            <div class="controls">
              <div class="col-lg-5">
                <input name="email" type="email" class="input-xlarge required tdtextarea" id="email" maxlength="25" placeholder="Correo Electr&oacute;nico">
              </div>
            </div>
          </div>
          <div class="control-group">
            <div class="controls">
              <div align="center" class="styled-select">
                <select name="admin" id="admin" type="text" class="input-xlarge">
                  <option value="A">Administrador</option>
                  <option value="O" selected="selected">Operador</option>
                  <option value="S">Supervisor</option>
                </select>
              </div>
            </div>
          </div>
          <div class="control-group">
          <div class="controls">
          <div align="right">
          <button type="submit" value="Save" class="btn-main"><i class="fa fa-check"></i>Grabar</button>
          <!-- <button class="btn-main" type="reset" id="cancelar">Cancelar</button>		-->
        </form>
        <a class="btn-main" href="userQry.php"><i class="fa fa-arrow-left"></i>&nbsp;Salir</a> </div>
    </div>
  </div>
  <div class="alert alert-success" style="display: none" id="mensaje">
    <button data-dismiss="alert" class="close" type="button">x</button>
    <strong>Mensaje:</strong> <span class="textmensaje">&nbsp;Usuario Creado</span> </div>
  <div class="alert alert-danger mensaje_form" style="display: none" id="error1">
    <button data-dismiss="alert" class="close" type="button">x</button>
    <strong>ERROR:</strong> <span class="textmensaje">&nbsp;Datos Fuera de Rango</span> </div>
  <div class="alert alert-danger mensaje_form" style="display: none" id="error2">
    <button data-dismiss="alert" class="close" type="button">x</button>
    <strong>ERROR:</strong> <span class="textmensaje">&nbsp;Usuario ya existe!!!</span> </div>
  </div>
  <!--End Span6-->
  </div>
  <!--End Row-->
  </div>
  <!--End Container-->
</section>
<!-- .................................... $footer .................................... -->
<?php include "headers/footer.php"; ?>
