<?php 
session_start();
include "lib/corelib.php";
require_once('tools/mypathdb.php');
include "lib/class/class.php";
include "lib/class/nombres.php";
error_reporting(0);
$valor = 5; //Activa la opcion del menu actual
include "headers/header.php";
?>
<script type="text/javascript" src="includes/js/jqombo.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo INCLUDES ?>js/jquery.form.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo INCLUDES ?>js/si.files.js"></script>
<script Language="JavaScript">


	$(document).ready(function() {
		$('#titulo').html("Paso 1/ Datos Personales");
		//$('#contenido').load('registrarDrVista.php');		
	
    	//MASCARA EN EL INPUT
         $(".tlf").mask("(0999) 999-99-99");	
	});
    //Metodo para cargar los datos personales
    $("body").on('submit', '#formDoctor', function(event) {
		event.preventDefault()
		if ($('#formDoctor').valid()) {
			$.ajax({
				type: "POST",
				url: "registrarDr2Procesar.php",
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
						$('#siguiente').show();
						$('#enviar').hide();
						$('#cancelar').hide();
						setTimeout(function() {
						$('#mensaje').hide();
						}, 3000);
						
						//$('#titulo').html("Paso 1/ Datos Personales / Foto del doctor");
						//$('#contenido').load('registrarDr2Foto.php');
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
        Registrar 
        <small>Doctor</small>
      </h2>
      </div>
  
  <!-- .................................... $Contenido .................................... -->
  <section class="section-content section-contact section-color-graylighter">
    <div class="container">
      <div id="content2">
		<h1 class="titlePage style3">Citas reservadas por los pacientes </h1>
		<div class="post">
			
			<table width="100%" border="0">
              <tr>
                <td bgcolor="#E3E9ED"> <p align="center">2011</p>                </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td bgcolor="#E3E9ED"><div align="center">2012</div></td>
              </tr>
			  <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td bgcolor="#E3E9ED"><div align="center">2013</div></td>
              </tr>
			  <?php
			  //====================Buscar en la tabla Doctores=================
    $consulta_mysql=("SELECT * FROM Doctores WHERE userName = '".$_SESSION['MM_Username']."'");
	$resultado_consulta_mysql=mysql_query($consulta_mysql,$dbConn);
	while($fila=mysql_fetch_array($resultado_consulta_mysql))
	{
	$ID= $fila['ID'];
	}
	//====================Buscar en la tabla citas================= 
	$consulta_mysql=("SELECT * FROM citas WHERE ID_Dr='".$ID."'");  
	$resultado_consulta_mysql=mysql_query($consulta_mysql,$dbConn);
	while($fila=mysql_fetch_array($resultado_consulta_mysql))
	{
	$IDcita= $fila['ID'];
	$nombre_Paciente= $fila['nombre_Paciente'];
	$apellido_Paciente= $fila['apellido_Paciente'];
	$email= $fila['email'];
	$celular= $fila['celular'];
	$motivo= $fila['motivo'];
	$fecha= $fila['fecha'];
	$hora= $fila['hora'];
	$dia= $fila['dia'];
	$tipo= $fila['tipo'];
	$confirmada= $fila['confirmada'];
	$realizada= $fila['realizada'];
?>
              <tr>
                <td><?php echo $nombre_Paciente." ".$apellido_Paciente ?></td>
			  </tr>
              <tr>
				<td><?php echo $email." ".	$celular ?></td>
			  </tr>
              <tr>
				<td><?php echo $motivo ?></td>
			  </tr>
              <tr>
				<td><?php echo $dia." ".$fecha." ".$hora ?></td>
              </tr>
			  <tr>
				<td><?php 
				if ($tipo=='viejo') 
				{ 
				echo "Paciente con historia clinica";
				}
				else
				{
				?>
				<strong>
				<?php
				echo "Nuevo Paciente";
				?>
				</strong>
				<?php
				}
				 ?>
			     </td>
              </tr>
			  <tr>
				<td><?php 
				if ($confirmada=='1') 
				{ 
				echo "Cita confirmada";
				}
				else
				{
				echo "Cita sin confirmar";
				?>
				<img src="images/errorsigno.png" width="25" height="25" />
				<?php
				}
				?>
			    </td>
              </tr>
			   <tr>
				<td>Cambiar cita </td>
              </tr>
			  <tr>
				<td><?php 
				if ($realizada=='1') 
				{ 
				?>
				<a href="citasDoctorNoLista.php?ID=<?php echo $IDcita ?>">Cita realizada</a> 
				<img src="images/checklist.png" width="25" height="25" />
				<?php
				}
				else
				{
				?>
				<a href="citasDoctorLista.php?ID=<?php echo $IDcita ?>">Cita NO realizada</a> 
				<?php
				}
				?>
                 </td>
              </tr>
			  
			  <tr>
			  	<td bgcolor="#E3E9ED"><div align="center">.</div></td>
			  </tr>
<?php
  }	
  		//desconectar();
		mysql_close();
?>
            </table>
			<h1>&nbsp;</h1>
	  </div>
		
		<div class="post"><div class="postReadMore">
		  <p><img src="images/premio.png" width="114" height="180" /><img src="images/citaMedicaOnline.gif" width="340" height="59" /></p>
			</div>
	  </div>
  </div>
    </div>
  </section>
    <!-- .................................... $footer .................................... -->
  <?php include "headers/otrofooter.php"; ?>