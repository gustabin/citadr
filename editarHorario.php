<?php 
session_start();

include "lib/corelib.php";
require_once('tools/mypathdb.php');
include "lib/class/classExtraerSinEnlace.php";
error_reporting(0);
//$valor = 5; //Activa la opcion del menu actual
$_SESSION['valor'] = 7; //Activa la opcion del menu actual
include "headers/header.php";

?>

<script Language="JavaScript">
	$(document).ready(function() {
		$('#titulo').html("Paso 3/ Datos Personales / Horario de consultas");		
	});
    //Metodo para cargar los datos personales
    $("body").on('submit', '#formHorario', function(event) {
		event.preventDefault()
		if ($('#formHorario').valid()) {
			$.ajax({
				type: "POST",
				url: "registrarDr2HorarioProcesar.php",
				dataType: "json",
				data: $(this).serialize(),
				success: function(respuesta) {
					if (respuesta.error == 1) {
						$('#error').show();
						setTimeout(function() {
						$('#error').hide();
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
        <li><a href="index.php">Acceso</a><span class="divider">/</span></li>
        <li class="active">Mi cuenta</li> 
      </ul>
    </div>
  </section>
  <!-- .................................... $Contact .................................... -->
  
    <div class="container" style="margin-top:10px">
      <h2 class="section-title">
        Mi cuenta 
        <small>Horario</small>
      </h2>
      </div>
  
  <!-- .................................... $Contenido .................................... -->
  <section class="section-content section-contact section-color-graylighter">
    <div class="container">
      <div class="row">
        <div id="contenido"> 
			<form name="formHorario" id="formHorario" method="post" action="">		
		<div></div>
			  <table width="100%"  border="1">
                  <tr>
                    <td><strong>Lun</strong></td>
                    <td bgcolor="#E3E9ED"><strong>Mar</strong></td>
                    <td><strong>Mie</strong></td>
                    <td bgcolor="#E3E9ED"><strong>Jue</strong></td>
                    <td><strong>Vie</strong></td>
                    <td bgcolor="#E3E9ED"><strong>Sab</strong></td>
                    <td><strong>Dom</strong></td>
                  </tr>
                  <tr> 
	<?php
    $doc_id = $_SESSION['doc_id'];
	//================================================Recuperar registros tabla Horarios==================================================
	$query = mysql_query("SELECT * FROM tbl_horarios WHERE hor_doc_id = '$doc_id'");
	$data_hor = mysql_fetch_array($query);		
	$dias= $data_hor['hor_dias']; //tabla horarios
	$horarioLun= $data_hor['hor_lun']; //tabla horarios
	$horarioMar= $data_hor['hor_mar']; //tabla horarios
	$horarioMie= $data_hor['hor_mie']; //tabla horarios
	$horarioJue= $data_hor['hor_jue']; //tabla horarios
	$horarioVie= $data_hor['hor_vie']; //tabla horarios
	$horarioSab= $data_hor['hor_sab']; //tabla horarios
	$horarioDom= $data_hor['hor_dom']; //tabla horarios	
    ?>
                    <td>
                    	<p><?php marcarHoras($horarioLun, "Lun");   ?></p>                      
					</td>
					<td bgcolor="#E3E9ED">
						<p><?php marcarHoras($horarioMar, "Mar");   ?></p>
					</td>
					<td>
                    	<p><?php marcarHoras($horarioMie, "Mie");   ?></p>
					</td>
					<td bgcolor="#E3E9ED">
						<p><?php marcarHoras($horarioJue, "Jue");   ?></p>
					</td>
					<td>
						<p><?php marcarHoras($horarioVie, "Vie");   ?></p>						
					</td>
					<td bgcolor="#E3E9ED">
                    	<p><?php marcarHoras($horarioSab, "Sab");   ?></p>
					</td>
                    <td>
                    	<p><?php marcarHoras($horarioDom, "Dom");   ?></p>
					</td>
				</tr>
			</table>
			<div>&nbsp; </div>
    <div class="control-group">         
         <button class="btn btn-primary" type="submit" id="enviar">Guardar</button>
        <button class="btn btn-default" type="reset" id="cancelar" onClick="window.location='<?php echo SERVER ?>registrarDr2Ficha.php'">Cerrar</button>
    </div>
	</form>
    <!-- ================= boton SIGUIENTE  =====================================================================  !-->
    <div class="control-group" style="display: none" id="siguiente">    
		<button class="btn btn-primary" type="botton" onClick="window.location='<?php echo SERVER ?>registrarDr2Ficha.php'">Cerrar</button>
	 </div>
	<!-- ================= mensajes de EXITO o de ERROR===========================================================  !--> 
	<div class="alert alert-danger mensaje_form" style="display: none" id="error">
		<button data-dismiss="alert" class="close" type="button">x</button>
		<strong>MENSAJE!</strong> <span class="textmensaje">Debe seleccionar el horario</span>
	 </div>
	 
	 <div class="alert alert-success mensaje_form control-group" style="display: none" id="mensaje">
		<button data-dismiss="alert" class="close" type="button">x</button>
		<strong>MENSAJE!</strong> <span class="textmensaje">Registro exitoso</span>
	 </div>	
	
    
    
        </div>        
      </div>
    </div>
  </section>
    <!-- .................................... $footer .................................... -->
  <?php include "headers/otrofooter.php"; ?>