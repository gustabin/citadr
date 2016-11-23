<?php 
session_start();
include "lib/corelib.php";
require_once('tools/mypathdb.php');
error_reporting(0);
$_SESSION['valor'] = 1; //Activa la opcion del menu actual
include "headers/header.php";
?>
<script type="text/javascript" src="includes/js/jqombo.js"></script>
<script Language="JavaScript">
	$(document).ready(function() {
		$('#titulo').html("Nuevo Usuario");				 
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
        <small>nuevo usuario</small>
      </h2>
      </div>
  
  <!-- .................................... $Contenido .................................... -->
  <section class="section-content section-contact section-color-graylighter">
    <div class="container">
      <div class="row">
        <div id="contenido">  
       		<div class="span8">
				 <!-- ================= boton Registrar Paciente / Doctor  =====================================================================  !-->
			    <div class="control-group">    
					<button class="btn btn-primary" type="botton" onClick="window.location='<?php echo SERVER ?>registrar.php'">Paciente</button>
                    <button class="btn btn-primary" type="botton" onClick="window.location='<?php echo SERVER ?>registrarDr2.php'">Doctor</button>    
                    <button class="btn btn-default" type="botton" onClick="window.location='<?php echo SERVER ?>login.php'"><< Atras</button>                    
	 			</div>
			</div><!--cierre de spam de formulario !-->
        </div>        
      </div>
    </div>
  </section>
    <!-- .................................... $footer .................................... -->
  <?php include "headers/otrofooter.php"; ?>