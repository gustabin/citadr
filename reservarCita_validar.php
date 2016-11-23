<?php 
session_start();
include "lib/corelib.php";
require_once('tools/mypathdb.php');
include "lib/class/class.php"; 
include "lib/class/classExtraer.php"; 
error_reporting(0);
$_SESSION['valor'] = 8; //Activa la opcion del menu actual
include "headers/header.php";
?>
<script Language="JavaScript">
	$(document).ready(function() {
		$('#titulo').html("Reservar cita / validar");	 
	});	 
	
    //Metodo para cargar los datos personales
    $("body").on('submit', '#formPin', function(event) {
		event.preventDefault()
		if ($('#formPin').valid()) {
			$.ajax({
				type: "POST",
				url: "reservarCita_validar_Procesar.php",
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
			  			window.location.href='citasConfirmar.php';
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
        Validar 
        <small>pin </small>
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
		$pin= $data_cit['cit_pin'];
		$doc_id = $data_cit['cit_doc_id'];
		$cit_pac_id = $data_cit['cit_pac_id'];
		$motivoCita = $data_cit['cit_motivo'];
		$fechaCita=date("d-m-Y",strtotime($data_cit['cit_fecha'])); // cambiar el formato de la fecha
		$horaCita = $data_cit['cit_hora'];
		$diaCita=$data_cit['cit_dia'];
		$tipoPaciente=$data_cit['cit_tipo'];
		$cit_status=$data_cit['cit_status'];
		
		if ($data_cit['cit_tipo']==1) 
			{
			$tipoPaciente="Primera vez";
			}
		else
			{
			$tipoPaciente="Paciente de esta consulta";
			}
	}
	$consulta=$tipoPaciente;

	//================================================Recuperar registros tabla doctores==================================================
	$query = mysql_query("SELECT * FROM tbl_doctores WHERE doc_id = '$doc_id'");
	$data_doc = mysql_fetch_array($query);	
	$NombreDr = $data_doc['doc_nombre'];
	$apellidoDr = $data_doc['doc_apellido'];
	$telefonoDr = $data_doc['doc_telefono'];
	$FotoDr= $data_doc['doc_foto'];
	$DireccionDr= $data_doc['doc_direccion'];
	$CiudadDr= $data_doc['doc_ciudad'];
	$IDestado= $data_doc['doc_estado'];
	$doc_id= $data_doc['doc_id'];
	$us_idDr= $data_doc['doc_id_user'];
	$IDDr=$doc_id;
	$calificacion= $data_doc['doc_calificacion'];
	$calificacionDr    = ExtraeCalificacion($calificacion);
	
	//================================================Recuperar registros tabla Estados==================================================
	$query = mysql_query("SELECT * FROM tbl_estados WHERE id = '$idEstado'");
	$data_est = mysql_fetch_array($query);						
	$estadoDr= $data_est['estado']; 
	
	//================================================Recuperar registros tabla usuarios para el email del doctor==================================================
	$query = mysql_query("SELECT * FROM tbl_usuarios WHERE us_id = '$us_idDr'");
	$data_us = mysql_fetch_array($query);						 
	$emailDr = $data_us['us_email']; 
	
	//================================================Recuperar registros tabla usuarios ==================================================
	$query = mysql_query("SELECT * FROM tbl_usuarios WHERE us_id = '$cit_pac_id'");
	$data_us = mysql_fetch_array($query);						 

	$usuario = $data_us['us_tipo']; 
	$userID = $data_us['us_id']; 
	$email = $data_us['us_email']; 	

	if ($usuario==1) //si es paciente
	{	
		//================================================Recuperar registros tabla pacientes==================================================
		$query = mysql_query("SELECT * FROM tbl_pacientes WHERE pac_id_user = '$userID'");
		$data_pac = mysql_fetch_array($query);	
		$nombre = $data_pac['pac_nombre'];
		$apellido = $data_pac['pac_apellido'];
		$telefono = $data_pac['pac_telefono'];	
	}
			
	//================================================Recuperar registros tabla doctor especialistas==================================================
	$query = mysql_query("SELECT * FROM tbl_doctor_especialistas WHERE dre_doc_id = '$doc_id'");	
	$data_dre = mysql_fetch_array($query);						 

	//================================================Recuperar registros tabla especialistas==================================================
	$IDespecialidad= $data_dre["dre_especialidad"];
	$query = mysql_query("SELECT * FROM tbl_especialistas WHERE esp_id = '$IDespecialidad'");
	$data_esp = mysql_fetch_array($query);					
	$Especialidad = $data_esp['esp_especialidad'];		
  ?>
  <section class="section-content section-contact section-color-graylighter">
    <div class="container">
      <div class="row">
        <div id="contenido">  
        <?php if (!empty($_GET ['id'])) { ?>
			<div class="control-group" align="right">
				<button class="btn btn-primary" type="botton" onClick="window.location='<?php echo SERVER ?>citasConfirmar.php'"><< Atras</button> 
            </div>
        <?php } ?>
		<div class="span4">
      		<form name="formPin" id="formPin" method="post">
                <h4>Te enviamos un PIN a tu correo </h4>
                <p>                  
				<input class="span4 required" name="txt_Pin" type="text" id="txt_Pin" style="width:50px" value="0000" size="4" maxlength="4" />

                <?php if ($cit_status==1) { ?>
                		Ingresa el PIN aqui. &nbsp; <a href="reenviarPin.php">Reenviar Pin</a></p> 
                <?php } else {?>
						Ingresa el PIN aqui. </p> 
				<?php } ?>
                 <div class="control-group">         
						<?php if ($cit_status==1) { ?>
							<button class="btn btn-primary" type="submit" id="enviar">Enviar</button>
						<?php } else {?>
							<button class="btn btn-primary" type="submit" id="enviar" disabled title="Esta cita ya fue confirmada">Enviar</button>
						<?php } ?>
				  </div>
            </form>
					
             <div class="alert alert-success mensaje_form" style="display: none" id="mensaje">
				<button data-dismiss="alert" class="close" type="button">x</button>
				<strong>MENSAJE: </strong> <span class="textmensaje">Pin registrado con exito</span>
			 </div>
			 <div class="alert alert-danger mensaje_form" style="display: none" id="error1">
				<button data-dismiss="alert" class="close" type="button">x</button>
				<strong>MENSAJE: </strong> <span class="textmensaje">PIN invalido</span>
			 </div>
             <div class="alert alert-danger mensaje_form" style="display: none" id="error2">
				<button data-dismiss="alert" class="close" type="button">x</button>
				<strong>MENSAJE: </strong> <span class="textmensaje">El PIN debe ser de 4 caracteres</span>
			 </div>
        </div><!--cierre de spam de formulario !-->
        <div class="span4">
           		<p><strong>Hora y fecha de la cita</strong><br>
                
				<?php 
				echo $diaCita." ".$fechaCita; ?> , &nbsp;	<?php echo ConvertirHoraAMPM($horaCita); ?> <br>
                <p><strong>Paciente</strong><br>
                <?php echo $nombre. " " .$apellido; ?> </p>
                <p><?php echo $consulta ?></p>
                <p><strong>Motivo de la visita</strong><br>
                <?php echo $motivoCita ?> </p>            
        </div><!--cierre de spam de formulario !-->
        <?php 
         //================================================Recuperar registros tabla Estados==================================================
						
		$query = mysql_query("SELECT * FROM tbl_estados WHERE id = '$IDestado'");
		$data_est = mysql_fetch_array($query);						
		$estado= $data_est['estado']; ?>
        
		<div class="span4">
           	<p align="justify"><img src="pictures/photos/<?php echo $FotoDr; ?>" width="74" height="99" /></p>
    		<p><strong><a href="reservarCitaDoctor.php?doctorID=<?php echo $IDDr ;?>"><?php echo $NombreDr; ?>&nbsp;<?php echo $apellidoDr;?></a></strong><br>
          		<?php echo utf8_encode($Especialidad); ?><br>
          		<img src="includes/img/<?php echo $calificacionDr; ?>" width="82" height="19" /><br>
   				<?php echo $DireccionDr ?> <br>
    			<?php echo $CiudadDr ?>, &nbsp;<?php echo  utf8_encode($estado); ?>	                                    
        </div><!--cierre de spam de formulario !-->

		</div>
        </div>        
      </div>
    </div>
  </section>
    <!-- .................................... $footer .................................... -->
  <?php include "headers/otrofooter.php"; ?>