<?php 
session_start();
include "lib/corelib.php";
require_once('tools/mypathdb.php');
include "lib/class/class.php";
include "lib/class/nombres.php";
error_reporting(0);
$_SESSION['valor'] = 3; //Activa la opcion del menu actual
include "headers/header.php";
?>
<script type="text/javascript" src="includes/js/jqombo.js"></script>
<script Language="JavaScript">
	$(document).ready(function() {
		$('#titulo').html("Paciente / Equipo médico");		 
	});
	
//Metodo para verificar que los datos esten completos
    $("body").on('submit', '#formEspecialistas', function(event) {
		event.preventDefault()
		if ($('#formEspecialistas').valid()) {
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
					
					if (respuesta.exito == 1) {
						$('#mensaje').show();						
						$('#siguiente').show();
						$('#enviar').hide();
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
        Buscar un 
        <small>Doctor</small>
      </h2>
      </div>
  
  <!-- .................................... $Contenido .................................... -->
 <section class="section-content section-contact section-color-graylighter">
    <div class="container">
      <div class="row">
        <div id="contenido"> 
        <div class="span8">
		<h5>Por favor completa los siguientes datos</h5>
    <?php
    $generador = Generador::getInstancia();
	?>

  	<form name="formEspecialistas" id="formEspecialistas" method="post" action="">		
		<div></div>
		<div>Estado:
        	<?php JCombo::ver_estados(); ?>
        </div>
        <div>Ciudad: <span id="ciudadesCombo"></span>
		</div>
        <div>
        <p>Especialidad:
        <?php 
		// Consultar la base de datos
		$consulta_mysql='select * from tbl_especialistas WHERE esp_status=TRUE order by esp_especialidad';
		$resultado_consulta_mysql=mysql_query($consulta_mysql,$dbConn);
		echo "<select name='especialidad'>";
		while($fila=mysql_fetch_array($resultado_consulta_mysql)){
		//echo utf8_decode($fila['esp_especialidad']);
		echo "<option value='".$fila['esp_id']."'>". $fila['esp_especialidad']."</option>";
		}
		echo "</select>";
		//desconectar();
		mysql_close();
	?>
	</p>
        <div>
    </div>
    </div>
	<div class="control-group">         
			<button class="btn btn-primary" type="submit" id="enviar">Buscar</button>
	</div>
</form> <!--cierre del formulario !-->

	 <!-- ================= boton SIGUIENTE  =====================================================================  !-->
     <div class="control-group" style="display: none" id="siguiente">    
		<button class="btn btn-primary" type="botton" onClick="window.location='<?php echo SERVER ?>reservarCitaProcesar.php'">Siguiente</button>
	 </div>
     
	 <div class="alert alert-danger mensaje_form" style="display: none" id="error1">
		<button data-dismiss="alert" class="close" type="button">x</button>
		<strong>MENSAJE!</strong> <span class="textmensaje">No hay ningún doctor registrado</span>
	 </div>
     
</div><!--cierre de spam de formulario !-->
        </div>        
      </div>
    </div>
  </section>
    <!-- .................................... $footer .................................... -->
  <?php include "headers/otrofooter.php"; ?>