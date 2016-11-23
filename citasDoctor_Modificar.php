<?php 
session_start();
include "lib/corelib.php";
require_once('tools/mypathdb.php');
error_reporting(1);
$_SESSION['valor'] = 11; //Activa la opcion del menu actual
include "headers/header.php";
?>
<script Language="JavaScript">
	$(document).ready(function() {
		$('#titulo').html("Agenda médica");
	});
	
    //Metodo para cargar los datos personales
    $("body").on('submit', '#formStatus', function(event) {
		event.preventDefault()
		if ($('#formStatus').valid()) {
			$.ajax({
				type: "POST",
				url: "citasDoctor_Modificar_Procesar.php",
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
        <li><a href="#"><span id="titulo"></span></a></li>
      </ul>
    </div>
  </section>
  <!-- .................................... $Titulo .................................... -->
  
     <div class="container" style="margin-top:10px">
      <h2 class="section-title">
        Citas del 
        <small>Doctor</small>
      </h2>
      </div>
  
  <!-- .................................... $Contenido .................................... -->
  <?php  	
   
	if (!empty($_GET ['id'])) 
	{
		$cit_id = $_GET ['id'];
		$_SESSION['cit_id'] =$cit_id ;
	}
	$cit_id = $_SESSION['cit_id'];
	$query=("select * from tbl_citas WHERE cit_id= '$cit_id'");
	$resultado = mysql_query($query,$dbConn);
	  
	while($data_cit = mysql_fetch_array($resultado)) 
	{
		$cit_pac_id = $data_cit['cit_pac_id'];
		$motivoCita = $data_cit['cit_motivo'];
	}
  ?>
  <section class="section-content section-contact section-color-graylighter">
    <div class="container">
      <div class="row">
        <div id="contenido">  
        <?php if (!empty($_GET ['id'])) { ?>
			<div class="control-group" align="right">
				<button class="btn btn-primary" type="botton" onClick="window.location='<?php echo SERVER ?>citasDoctor.php'"><< Atras</button> 
				<button class="btn btn-default" type="botton" onClick="window.location='<?php echo SERVER ?>historiaParte1.php?id=<?php echo $cit_pac_id?>'">Historia >></button> 
            </div>
        <?php } ?>
            <div class="span4">
                <form name="formStatus" id="formStatus" method="post">
                    <h4>Cambiar status de la cita </h4>Motivo: <?php echo $motivoCita ?>
                    <p>                  
                     <label>
                       <select name="status" id="status">
                         <option value="2">Confirmada</option>
                         <option value="3" selected="selected">Realizada</option>
                         <option value="4">No Asistio</option>
                       </select>
                     </label>
                    <div class="control-group">         
                        <button class="btn btn-primary" type="submit" id="enviar">Enviar</button>
                    </div>
                </form>
                        
                 <div class="alert alert-success mensaje_form" style="display: none" id="mensaje">
                    <button data-dismiss="alert" class="close" type="button">x</button>
                    <strong>MENSAJE: </strong> <span class="textmensaje">Modificacion del status realizado con exito</span>
                 </div>
                 <div class="alert alert-danger mensaje_form" style="display: none" id="error1">
                    <button data-dismiss="alert" class="close" type="button">x</button>
                    <strong>MENSAJE: </strong> <span class="textmensaje">No se modifico el status</span>
                 </div>
            </div><!--cierre de spam de formulario !-->

		</div>
        </div>        
      </div>
    </div>
  </section>
    <!-- .................................... $footer .................................... -->
  <?php include "headers/otrofooter.php"; ?>