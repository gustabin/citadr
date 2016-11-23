<?php 
session_start();
include "lib/corelib.php";
require_once('tools/mypathdb.php');
error_reporting(0);
$_SESSION['valor'] = 8; //Activa la opcion del menu actual
include "headers/header.php";
if ($_SESSION['citaSinConfirmar']==True)
{
	include "lib/class/classExtraerSinEnlace.php";
	$citaSinConfirmar ="No puede agendar nuevas citas sin antes <a href=citasConfirmar.php> confirmar o eliminar la cita pendiente</a>" ;
}
else
{
	include "lib/class/classExtraer.php";
}
?>
<script Language="JavaScript">
	$(document).ready(function() {
		$('#titulo').html("Paciente / Equipo médico / Buscar doctor");		
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
        Resultado de doctores
        <small>encontrados</small>
      </h2>
	</div>
  
  <!-- .................................... $Contenido .................................... -->
  <section class="section-content section-contact section-color-graylighter">
    <div class="container">
      <div class="row">
        <div id="contenido">          
            </span>
			<span id="citaPendiente" style="font-size: 18px; float: left">
                   <?php echo $citaSinConfirmar ?>
            </span>
			<div class="control-group" align="right">
				<p><a href="reservarCita.php"><< Volver a buscar</a></p>
            </div>
			

		<p><h5>Reservar cita</h5></p>
		<div class="post">
			<table width="100%"  border="0">
              <tr>
                <td>	<p>
                <?php
				$IdEspecialidad = $_SESSION['IDespecialidad'];	
				$IDestado = $_SESSION['estados'];
				$ciudad = $_SESSION['ciudades'];
                //================================================Recuperar registros tabla especialistas==================================================
				$query = mysql_query("SELECT * FROM tbl_especialistas WHERE esp_id = '$IdEspecialidad'");
				$data_esp = mysql_fetch_array($query);
				$_SESSION['Especialidad'] = $data_esp["esp_especialidad"];
				
				//================================================Recuperar registros tabla Estados==================================================
				$query = mysql_query("SELECT * FROM tbl_estados WHERE id = '$IDestado'");
				$data_est = mysql_fetch_array($query);						
				$estado= $data_est['estado']; 
				?>
                  <?php echo utf8_encode($data_esp["esp_especialidad"]); ?>  <strong><?php //echo $estado; ?></strong> <p></p>
<table width="100%"  border="0" style="border-top:1px solid #74A1A1">
  <tr style="border-bottom:1px solid #74A1A1">
    <td width="10%"><p class="style4"><?php //echo $especialidad; ?></p></td>
    <td width="16%"><p>&nbsp;</p></td>
    <td width="8%" bgcolor="#E1EBEB"><p align="center" class="style7"><strong> 
	<?php 
	//*********************Prepara la fecha en el encabezado de la tabla********************
	$fecha = time();
	$fecha_final= date("D d-m-y", strtotime("0 day")) ; // suma 0 día
	$dia = date("D", strtotime($fecha_final));  
	echo ExtraeDia($dia);
	$fecha_final= date("d-m-y", strtotime("0 day")) ; // suma 0 día
	echo " " .$fecha_final;
	?> </strong></p></td>
    <td width="8%"><p align="center" class="style7"><strong>	
	<?php 
	$fecha_final= date("D d-m-y", strtotime("1 day")) ; // suma 1 día
	$dia = date("D", strtotime($fecha_final));  
	echo ExtraeDia($dia);
	$fecha_final= date("d-m-y", strtotime("1 day")) ; // suma 1 día
	echo " " .$fecha_final;
	//echo $fecha_final;
	?></strong></p></td>
    <td width="8%" bgcolor="#E1EBEB"><p align="center" class="style7"><strong> 	
	<?php 
	$fecha_final= date("D d-m-y", strtotime("2 day")) ; // suma 2 día
	$dia = date("D", strtotime($fecha_final));  
	echo ExtraeDia($dia);
	$fecha_final= date("d-m-y", strtotime("2 day")) ; // suma 2 día
	echo " " .$fecha_final;
	?></strong></p></td>
    <td width="8%"><p align="center" class="style7"><strong> 
	<?php 
	$fecha_final= date("D d-m-y", strtotime("3 day")) ; // suma 3 día
	$dia = date("D", strtotime($fecha_final));  
	echo ExtraeDia($dia);
	$fecha_final= date("d-m-y", strtotime("3 day")) ; // suma 3 día
	echo " " .$fecha_final;
	?> </strong></p></td>
    <td width="8%" bgcolor="#E1EBEB"><p align="center" class="style7"><strong>
	<?php 
	$fecha_final= date("D d-m-y", strtotime("4 day")) ; // suma 4 día
	$dia = date("D", strtotime($fecha_final));  
	echo ExtraeDia($dia);
	$fecha_final= date("d-m-y", strtotime("4 day")) ; // suma 4 día
	echo " " .$fecha_final;
	?> </strong></p></td>
  <td width="8%"><p align="center" class="style7"><strong> 
  <?php 
	$fecha_final= date("D d-m-y", strtotime("5 day")) ; // suma 5 día
	$dia = date("D", strtotime($fecha_final));  
	echo ExtraeDia($dia);
	$fecha_final= date("d-m-y", strtotime("5 day")) ; // suma 5 día
	echo " " .$fecha_final;
	?> </strong></p></td>
  <td width="7%" bgcolor="#E1EBEB"><p align="center" class="style7"><strong> 
  <?php 
	$fecha_final= date("D d-m-y", strtotime("6 day")) ; // suma 6 día
	$dia = date("D", strtotime($fecha_final));  
	echo ExtraeDia($dia);
	$fecha_final= date("d-m-y", strtotime("6 day")) ; // suma 6 día
	echo " " .$fecha_final; 
	?> </strong></p></td>
  <td width="4%"><p class="style7"><strong><img src="includes/img/arrowflecha.png" width="31" height="31" /></strong></p></td>
  </tr><!-- **************************Termina el ecabezado de la tabla --> 
  <!--******************Aqui comienza el bucle -->
<?php	
		$query = ("SELECT
							tbl_doctor_especialistas.dre_id,
							tbl_doctor_especialistas.dre_especialidad,
							tbl_doctor_especialistas.dre_doc_id,
							tbl_doctores.doc_id,
							tbl_doctores.doc_nombre,
							tbl_doctores.doc_apellido,
							tbl_doctores.doc_telefono,
							tbl_doctores.doc_direccion,
							tbl_doctores.doc_ciudad,
							tbl_doctores.doc_estado,
							tbl_doctores.doc_foto,
							tbl_doctores.doc_calificacion,
							tbl_doctores.doc_curriculum,
							tbl_doctores.doc_status,
							tbl_doctores.doc_id_user
							FROM
							tbl_doctor_especialistas
							INNER JOIN tbl_doctores ON tbl_doctor_especialistas.dre_doc_id = tbl_doctores.doc_id WHERE tbl_doctor_especialistas.dre_especialidad = '$IdEspecialidad' and tbl_doctores.doc_status = '1'");	

	$resultado_query=mysql_query($query,$dbConn);
	while($filaDr=mysql_fetch_array($resultado_query))
	{
	$ID= $filaDr['doc_id'];
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

						//================================================Recuperar registros tabla Horarios==================================================

						$query = mysql_query("SELECT * FROM tbl_horarios WHERE hor_doc_id = '$ID'");
						$data_hor = mysql_fetch_array($query);						 

						//================================================Recuperar registros tabla Estados==================================================
						$query = mysql_query("SELECT * FROM tbl_estados WHERE id = '$IDestado'");
						$data_est = mysql_fetch_array($query);						
						$estado= $data_est['estado']; 


//	$email= $data_us['us_email'];// tabla usuarios
	//$estado= $data_est['estado'];//tabla estados
	$dias= $data_hor['hor_dias']; //tabla horarios
	$horarioLun= $data_hor['hor_lun']; //tabla horarios
	$horarioMar= $data_hor['hor_mar']; //tabla horarios
	$horarioMie= $data_hor['hor_mie']; //tabla horarios
	$horarioJue= $data_hor['hor_jue']; //tabla horarios
	$horarioVie= $data_hor['hor_vie']; //tabla horarios
	$horarioSab= $data_hor['hor_sab']; //tabla horarios
	$horarioDom= $data_hor['hor_dom']; //tabla horarios			


?>
  <tr valign="top" style="border-bottom:1px solid #74A1A1">
    <td><img src="pictures/photos/<?php echo $foto ?>" width="74" height="99" /></td>
    <td class="style9"><p><strong><a href="reservarCitaDoctor.php?doctorID=<?php echo $ID ;?>"><?php echo $nombre ." ". $apellido?></a></strong><br>
          <span class="style11"><?php echo utf8_encode($data_esp["esp_especialidad"]); ?><br />
          </span><img src="includes/img/<?php echo ExtraeCalificacion($calificacion); ?>" width="82" height="19" /><br>
    <?php echo $direccion ?> <br>
    <?php echo $ciudad ?>, &nbsp;<?php echo  utf8_encode($estado) ?></p>
      <p><span class="style7"><a href="reservarCitaDoctor.php?doctorID=<?php echo $ID ;?>">Ver m&aacute;s</a></span><br>
      </p></td>
	  
    <td bgcolor="#E1EBEB" class="style9"><div align="center">    
	
      <?php
	date_default_timezone_set('America/Caracas');
	$fecha= date("Y-m-d", strtotime("0 day")) ; // suma 0 día
	$fecha_final= date("D d-m-y", strtotime("0 day")) ; // suma 0 día
	$dia = date("D", strtotime($fecha_final));  
	$diaAbreviado=ExtraeDia($dia);
	

	if((ExtraeDiaHorario($dias, $diaAbreviado)) == TRUE){
		if ($diaAbreviado=="Lun")
			mostrarHoras($horarioLun, $diaAbreviado, $fecha, $ID);
		if ($diaAbreviado=="Mar")
			mostrarHoras($horarioMar, $diaAbreviado, $fecha, $ID);
		if ($diaAbreviado=="Mie")
			mostrarHoras($horarioMie, $diaAbreviado, $fecha, $ID);
		if ($diaAbreviado=="Jue")
			mostrarHoras($horarioJue, $diaAbreviado, $fecha, $ID);
		if ($diaAbreviado=="Vie")			
			mostrarHoras($horarioVie, $diaAbreviado, $fecha, $ID);
		if ($diaAbreviado=="Sab")
			mostrarHoras($horarioSab, $diaAbreviado, $fecha, $ID);
		if ($diaAbreviado=="Dom")
			mostrarHoras($horarioDom, $diaAbreviado, $fecha, $ID);
	}
    ?>
</div></td>
    <td class="style9"><div align="center">
      <?php
  	$fecha= date("Y-m-d", strtotime("1 day")) ; // suma 1 día
	$fecha_final= date("D d-m-y", strtotime("1 day")) ; // suma 1 día
	$dia = date("D", strtotime($fecha_final));  
	$diaAbreviado=ExtraeDia($dia);

	if((ExtraeDiaHorario($dias, $diaAbreviado)) == TRUE){
		if ($diaAbreviado=="Lun")
			mostrarHoras($horarioLun, $diaAbreviado, $fecha, $ID);
		if ($diaAbreviado=="Mar")
			mostrarHoras($horarioMar, $diaAbreviado, $fecha, $ID);
		if ($diaAbreviado=="Mie")
			mostrarHoras($horarioMie, $diaAbreviado, $fecha, $ID);
		if ($diaAbreviado=="Jue")
			mostrarHoras($horarioJue, $diaAbreviado, $fecha, $ID);
		if ($diaAbreviado=="Vie")			
			mostrarHoras($horarioVie, $diaAbreviado, $fecha, $ID);
		if ($diaAbreviado=="Sab")
			mostrarHoras($horarioSab, $diaAbreviado, $fecha, $ID);
		if ($diaAbreviado=="Dom")
			mostrarHoras($horarioDom, $diaAbreviado, $fecha, $ID);
	}
    ?>
</div></td>
    <td bgcolor="#E1EBEB" class="style9"><div align="center">
      <?php
	$fecha= date("Y-m-d", strtotime("2 day")) ; // suma 2 día
	$fecha_final= date("D d-m-y", strtotime("2 day")) ; // suma 2 día
	$dia = date("D", strtotime($fecha_final));  
	$diaAbreviado=ExtraeDia($dia);
	

	if((ExtraeDiaHorario($dias, $diaAbreviado)) == TRUE){
		if ($diaAbreviado=="Lun")
			mostrarHoras($horarioLun, $diaAbreviado, $fecha, $ID);
		if ($diaAbreviado=="Mar")
			mostrarHoras($horarioMar, $diaAbreviado, $fecha, $ID);
		if ($diaAbreviado=="Mie")
			mostrarHoras($horarioMie, $diaAbreviado, $fecha, $ID);
		if ($diaAbreviado=="Jue")
			mostrarHoras($horarioJue, $diaAbreviado, $fecha, $ID);
		if ($diaAbreviado=="Vie")			
			mostrarHoras($horarioVie, $diaAbreviado, $fecha, $ID);
		if ($diaAbreviado=="Sab")
			mostrarHoras($horarioSab, $diaAbreviado, $fecha, $ID);
		if ($diaAbreviado=="Dom")
			mostrarHoras($horarioDom, $diaAbreviado, $fecha, $ID);
	}
    ?>	
      </div></td>
    <td class="style8"><div align="center">
      <?php
	$fecha= date("Y-m-d", strtotime("3 day")) ; // suma 3 día
	$fecha_final= date("D d-m-y", strtotime("3 day")) ; // suma 3 día
	$dia = date("D", strtotime($fecha_final));  
	$diaAbreviado=ExtraeDia($dia);

	if((ExtraeDiaHorario($dias, $diaAbreviado)) == TRUE){
		if ($diaAbreviado=="Lun")
			mostrarHoras($horarioLun, $diaAbreviado, $fecha, $ID);
		if ($diaAbreviado=="Mar")
			mostrarHoras($horarioMar, $diaAbreviado, $fecha, $ID);
		if ($diaAbreviado=="Mie")
			mostrarHoras($horarioMie, $diaAbreviado, $fecha, $ID);
		if ($diaAbreviado=="Jue")
			mostrarHoras($horarioJue, $diaAbreviado, $fecha, $ID);
		if ($diaAbreviado=="Vie")			
			mostrarHoras($horarioVie, $diaAbreviado, $fecha, $ID);
		if ($diaAbreviado=="Sab")
			mostrarHoras($horarioSab, $diaAbreviado, $fecha, $ID);
		if ($diaAbreviado=="Dom")
			mostrarHoras($horarioDom, $diaAbreviado, $fecha, $ID);
	}
    ?>
</div></td>
    <td bgcolor="#E1EBEB" class="style9"><div align="center">
      <?php
	$fecha= date("Y-m-d", strtotime("4 day")) ; // suma 4 día
	$fecha_final= date("D d-m-y", strtotime("4 day")) ; // suma 4 día
	$dia = date("D", strtotime($fecha_final));  
	$diaAbreviado=ExtraeDia($dia);

	if((ExtraeDiaHorario($dias, $diaAbreviado)) == TRUE){
		if ($diaAbreviado=="Lun")
			mostrarHoras($horarioLun, $diaAbreviado, $fecha, $ID);
		if ($diaAbreviado=="Mar")
			mostrarHoras($horarioMar, $diaAbreviado, $fecha, $ID);
		if ($diaAbreviado=="Mie")
			mostrarHoras($horarioMie, $diaAbreviado, $fecha, $ID);
		if ($diaAbreviado=="Jue")
			mostrarHoras($horarioJue, $diaAbreviado, $fecha, $ID);
		if ($diaAbreviado=="Vie")			
			mostrarHoras($horarioVie, $diaAbreviado, $fecha, $ID);
		if ($diaAbreviado=="Sab")
			mostrarHoras($horarioSab, $diaAbreviado, $fecha, $ID);
		if ($diaAbreviado=="Dom")
			mostrarHoras($horarioDom, $diaAbreviado, $fecha, $ID);
	}
    ?>
</div></td>
    <td class="style9"><div align="center">
      <?php
	$fecha= date("Y-m-d", strtotime("5 day")) ; // suma 5 día
	$fecha_final= date("D d-m-y", strtotime("5 day")) ; // suma 5 día
	$dia = date("D", strtotime($fecha_final));  
	$diaAbreviado=ExtraeDia($dia);

	if((ExtraeDiaHorario($dias, $diaAbreviado)) == TRUE){
		if ($diaAbreviado=="Lun")
			mostrarHoras($horarioLun, $diaAbreviado, $fecha, $ID);
		if ($diaAbreviado=="Mar")
			mostrarHoras($horarioMar, $diaAbreviado, $fecha, $ID);
		if ($diaAbreviado=="Mie")
			mostrarHoras($horarioMie, $diaAbreviado, $fecha, $ID);
		if ($diaAbreviado=="Jue")
			mostrarHoras($horarioJue, $diaAbreviado, $fecha, $ID);
		if ($diaAbreviado=="Vie")			
			mostrarHoras($horarioVie, $diaAbreviado, $fecha, $ID);
		if ($diaAbreviado=="Sab")
			mostrarHoras($horarioSab, $diaAbreviado, $fecha, $ID);
		if ($diaAbreviado=="Dom")
			mostrarHoras($horarioDom, $diaAbreviado, $fecha, $ID);
	}
    ?>
</div></td>
  <td bgcolor="#E1EBEB" class="style9"><div align="center">
    <?php
	$fecha= date("Y-m-d", strtotime("6 day")) ; // suma 6 día
	$fecha_final= date("D d-m-y", strtotime("6 day")) ; // suma 6 día
	$dia = date("D", strtotime($fecha_final));  
	$diaAbreviado=ExtraeDia($dia);

	if((ExtraeDiaHorario($dias, $diaAbreviado)) == TRUE){
		if ($diaAbreviado=="Lun")
			mostrarHoras($horarioLun, $diaAbreviado, $fecha, $ID);
		if ($diaAbreviado=="Mar")
			mostrarHoras($horarioMar, $diaAbreviado, $fecha, $ID);
		if ($diaAbreviado=="Mie")
			mostrarHoras($horarioMie, $diaAbreviado, $fecha, $ID);
		if ($diaAbreviado=="Jue")
			mostrarHoras($horarioJue, $diaAbreviado, $fecha, $ID);
		if ($diaAbreviado=="Vie")			
			mostrarHoras($horarioVie, $diaAbreviado, $fecha, $ID);
		if ($diaAbreviado=="Sab")
			mostrarHoras($horarioSab, $diaAbreviado, $fecha, $ID);
		if ($diaAbreviado=="Dom")
			mostrarHoras($horarioDom, $diaAbreviado, $fecha, $ID);
	}
    ?>
</div></td>

  <td class="style9">&nbsp;</td>
  </tr>
<?php

	}
	//desconectar();
	mysql_close();
?> 
</table>
<p>&nbsp;</p>
</td>
               
              </tr>
          </table>
			
	  </div>
		
	  </div>
  </div>
	<div class="clear"></div>
</div>
        </div>        

  </section>
    <!-- .................................... $footer .................................... -->
  <?php include "headers/otrofooter.php"; ?>