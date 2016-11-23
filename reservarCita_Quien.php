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
		$('#titulo').html("Paciente / Equipo médico / Buscar doctor / Reservar cita / Quién"); 
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
        Reservar 
        <small>cita</small>
      </h2>
      </div>
  
  <!-- .................................... $Contenido .................................... -->
  <section class="section-content section-contact section-color-graylighter">
    <div class="container">
      <div class="row">
        <div id="contenido">  
        <div class="span4">
	
        <form name="formQuien" id="formQuien" method="post" action="reservarCita_QuienValidar.php">                  
                  <p><strong>Quien va a la consulta?</strong></p>
                  <p>
                    <input name="consulta" type="radio" checked="checked" value="<?php echo $_SESSION['nombre']." ".$_SESSION['apellido']?>" />
                     <?php echo $_SESSION['nombre']." ".$_SESSION['apellido']?></p>
                  </p>
                  <p>
					<input name="consulta" type="radio" value="otro" />
					Incluir a un nuevo paciente</p>
                  <p>
                   <div class="control-group">         
						<button class="btn btn-primary" type="submit" id="enviar">Enviar</button>
				  </div>
        </form>
        </div><!--cierre de spam de formulario !-->
        <div class="span4">
           		<p><strong>Hora y fecha de la cita</strong><br>
				<?php echo $_SESSION['diaCita']." ".$_SESSION['fechaCita']; ?> , &nbsp;	<?php echo ConvertirHoraAMPM($_SESSION['horaCita']); ?> <br>
                <p><strong>Paciente</strong><br>
                Pendiente </p>
                <p><strong>Motivo de la visita</strong><br>
                <?php echo $_SESSION['motivoCita'] ?> </p>            
        </div><!--cierre de spam de formulario !-->
        <?php 
         //================================================Recuperar registros tabla Estados==================================================
		$IDestado = $_SESSION['IDestado'];
		$query = mysql_query("SELECT * FROM tbl_estados WHERE id = '$IDestado'");
		$data_est = mysql_fetch_array($query);						
		$estado= $data_est['estado']; ?>
        
		<div class="span4">
           	<p align="justify"><img src="pictures/photos/<?php echo $_SESSION['FotoDr']; ?>" width="74" height="99" /></p>
    		<p><strong><a href="reservarCitaDoctor.php?doctorID=<?php echo $_SESSION['IDDr'] ;?>"><?php echo $_SESSION['NombreDr']; ?></a></strong><br>
          		<?php echo utf8_encode($_SESSION['Especialidad']); ?><br>
          		<img src="includes/img/<?php echo $_SESSION['calificacionDr']; ?>" width="82" height="19" /><br>
   				<?php echo $_SESSION['DireccionDr'] ?> <br>
    			<?php echo $_SESSION['CiudadDr'] ?>, &nbsp;<?php echo  utf8_encode($estado); ?>	                                    
        </div><!--cierre de spam de formulario !-->
  		</div>        
      </div>
    </div>
  </section>
    <!-- .................................... $footer .................................... -->
  <?php include "headers/otrofooter.php"; ?>