<?php 
session_start();
include "lib/corelib.php";
require_once('tools/mypathdb.php');
error_reporting(0);
$_SESSION['valor'] = 8; //Activa la opcion del menu actual
include "headers/header.php";
include "lib/class/class2.php";
include "lib/class/classExtraer.php";

?>
<script Language="JavaScript">

	$(document).ready(function() {
		$('#titulo').html("Reservar cita");
	});
    //Metodo para realizar la reservacion de la cita
    $("body").on('submit', '#formDoctor', function(event) {
		event.preventDefault()
		if ($('#formDoctor').valid()) {
			$.ajax({
				type: "POST",
				url: "reservarCitaInfo_Procesar.php",
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
						}, 3000);
						
						$('#titulo').html("Paso 1/ Datos Personales / Foto del doctor");
						$('#contenido').load('async_registrarDr.php?puerta=7');
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
        Agendar  Cita M&eacute;dica</h2>
      </div>
  
  <!-- .................................... $Contenido .................................... -->
  <section class="section-content section-contact section-color-graylighter">
    <div class="container">
      <div class="row">
        <div id="contenido"> 
		<div class="span4">
       			<form name="form1" id="form1" method="post" action="reservarCitaInfo_Procesar.php">                  
                  <p><strong>Te has consultado con este doctor anteriormente?</strong></p>
                  <p>
                    <input name="consulta" type="radio" value="Primera vez" checked="checked" /> 
                    Primera vez.</p>
                  <p>
					<input name="consulta" type="radio" value="Paciente de esa consulta" />
					Soy paciente de esa consulta.</p>
                  <p><strong>Motivo de tu visita?</strong></p>
                  <p>
<?php	
// Consultar especialidad
$IDespecialidad = $_SESSION['IDespecialidad'];
$query=("select * from tbl_especialistas WHERE esp_id= '$IDespecialidad'");
$resultado=mysql_query($query,$dbConn);
echo "<select name='motivos'>";
while($fila=mysql_fetch_array($resultado))
{
	$especialidad= $fila['esp_especialidad'];
	$motivos= utf8_encode($fila['esp_motivo']);
	//Extraer datos separados por coma ',' ==> el campo motivos
	$array_con_datos = explode(",", $motivos);
	// cada elemento de "$array_con_datos" tiene tus datos separados que estaban separados por comas
	foreach($array_con_datos as $cadaMotivo)
	{
		echo "<option value='".$cadaMotivo."'>".$cadaMotivo."</option>";
	}
}
echo "</select>";

	$doctorID= $_GET["id"];
	$query=("SELECT * FROM tbl_doctores WHERE doc_id = '".$doctorID."'");
	$resultado_query=mysql_query($query,$dbConn);
    $filaDr=mysql_fetch_array($resultado_query);
	$nombre= $filaDr['doc_nombre'];
	$apellido= $filaDr['doc_apellido'];
	$telefono= $filaDr['doc_telefono']; //
	$direccion= $filaDr['doc_direccion'];//	
	$ciudad= $filaDr['doc_ciudad'];
	$IDestado= $filaDr['doc_estado'];
	$foto= $filaDr['doc_foto'];
	$calificacion= $filaDr['doc_calificacion'];	
	$curriculum= $filaDr['doc_curriculum'];	
	$status= $filaDr['doc_status'];	
	$doc_id_user= $filaDr['doc_id_user'];	
	$_SESSION['IDDr']    = $doctorID;
	$_SESSION['NombreDr']    = $nombre ." ". $apellido;	
	$_SESSION['TelefonoDr']    = $telefono;
	$_SESSION['DireccionDr']    = $direccion;
	$_SESSION['CiudadDr']    = $ciudad;  
	$_SESSION['IDestado']    = $IDestado;  
	$_SESSION['FotoDr']    = $foto;
	$_SESSION['calificacionDr']    = ExtraeCalificacion($calificacion);
	$_SESSION['CurriculumDr']    = $curriculum;
	$_SESSION['statusDr']    = $status;
	$_SESSION['diaCita'] = $_GET["dia"];
	$_SESSION['fechaCita'] = $_GET["fecha"];
	$_SESSION['horaCita'] = $_GET["hora"];
	
	$queryDr = mysql_query("SELECT * FROM tbl_usuarios WHERE us_id = '$doc_id_user'");
	$data_us = mysql_fetch_array($queryDr);	
	$_SESSION['emailDr'] = $data_us['us_email'];	    
?>
                  </p>
                  
                  
				  <div class="control-group">         
						<button class="btn btn-primary" type="submit" id="enviar">Enviar</button>
						<button class="btn btn-default" type="reset" id="cancelar">Cancelar</button>
				  </div>
                </form>
                </div><!--cierre de spam de formulario !-->
                <div class="span4">
           		<p><strong>Hora y fecha de la cita</strong><br>
				<?php 
				 $_SESSION['fechaCita']=date("d-m-Y",strtotime($_SESSION['fechaCita'])); 
				echo $_SESSION['diaCita']." ".$_SESSION['fechaCita']; ?> , &nbsp;	<?php echo ConvertirHoraAMPM($_SESSION['horaCita']);  ?> <br>
                <p><strong>Paciente</strong><br>
                Pendiente </p>
                          
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
<?php
//desconectar();
mysql_close();
?>
    <!-- .................................... $footer .................................... -->
  <?php include "headers/otrofooter.php"; ?>