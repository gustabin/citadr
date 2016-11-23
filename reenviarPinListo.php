<?php 
session_start();
include "lib/corelib.php";
require_once('tools/mypathdb.php');
error_reporting(0);
$_SESSION['valor'] = 8; //Activa la opcion del menu actual
include "headers/header.php";
include "lib/class/classExtraer.php";
?>
<script Language="JavaScript">
	$(document).ready(function() {
		$('#titulo').html("Paciente / Equipo médico / Buscar doctor / Reservar cita / Reeenviar Pin"); 
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
        Pin 
        <small>reenviado</small>
      </h2>
      </div>
  
  <!-- .................................... $Contenido .................................... -->
  <section class="section-content section-contact section-color-graylighter">
    <div class="container">
      <div class="row">
        <div id="contenido">  
       		<?php 
			
			
			if (!empty($_SESSION['cit_id'])) 
			{
				$id = $_SESSION['cit_id'];	
						
			?>
       		<div class="control-group" align="right">
			  <button class="btn btn-primary" type="botton" onClick="window.location='<?php echo SERVER ?>reservarCita_validar.php?id=<?php echo $id ?>'"><< Atras</button> 
          </div>
			<?php  } ?>
       	  <div class="span4">
       		Te hemos enviado un email con tu nuevo PIN
       		</div>
  		</div>        
      </div>
    </div>
  </section>
    <!-- .................................... $footer .................................... -->
  <?php include "headers/otrofooter.php"; ?>