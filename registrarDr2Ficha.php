<?php 
session_start();
include "lib/corelib.php";
require_once('tools/mypathdb.php');
//include "lib/class/classExtraer.php";
include "lib/class/classExtraerSinEnlace.php";
error_reporting(0);
$_SESSION['valor'] = 7; //Activa la opcion del menu actual

include "headers/header.php";
$us_id = $_SESSION['us_id'];
$doc_id = $_SESSION['doc_id'];
if ($_SESSION['registrandoDr']==True)
{
	$registrandoDr ="Ya estas listo para comenzar!,  asi se mostrarán <a href=editarDr.php>tus datos</a>" ;	
}
?>
<link rel="stylesheet" href="includes/css/website.css" type="text/css" media="screen"/>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="includes/js/jquery.tinycarousel.min.js"></script>
	
<script Language="JavaScript">
	$(document).ready(function() {
		$('#titulo').html("Paso 7/ Datos Personales / Ficha del médico");			
		$('#slider1').tinycarousel();	
	}); 	    
</script> 
						<?php
						//================================================Recuperar registros tabla doctores==================================================
						$query = mysql_query("SELECT * FROM tbl_doctores WHERE doc_id = '$doc_id'");
						//$query = ("SELECT * FROM tbl_doctores WHERE doc_id = '$doc_id'");
						$data_doc = mysql_fetch_array($query);			
						
						//var_dump($query);
						//die();
						?>
                        <?php
						//================================================Recuperar registros tabla doctor especialistas==========================
						$query = mysql_query("SELECT * FROM tbl_doctor_especialistas WHERE dre_doc_id = '$doc_id'");
						$data_dre = mysql_fetch_array($query);						 
						?>        
                  		<?php
						//================================================Recuperar registros tabla especialistas==================================================
						$especialidad= $data_dre["dre_especialidad"];
						$query = mysql_query("SELECT * FROM tbl_especialistas WHERE esp_id = '$especialidad'");
						$data_esp = mysql_fetch_array($query);						 
						?>
                        <?php
						//================================================Recuperar registros tabla usuarios==================================================
						$query = mysql_query("SELECT * FROM tbl_usuarios WHERE us_id = '$us_id'");
						$data_us = mysql_fetch_array($query);						 
						?>
                         <?php
						//================================================Recuperar registros tabla Horarios==================================================
						$query = mysql_query("SELECT * FROM tbl_horarios WHERE hor_doc_id = '$doc_id'");
						$data_hor = mysql_fetch_array($query);						 
						?>
						<?php
						//================================================Recuperar registros tabla Estados==================================================
						$idEstado = $data_doc['doc_estado'];
						$query = mysql_query("SELECT * FROM tbl_estados WHERE id = '$idEstado'");
						$data_est = mysql_fetch_array($query);						
						$estado= $data_est['estado']; 
						?>
  <!-- .................................... $breadcrumb .................................... -->
  <section class="section-breadcrumb section-color-graylighter">
    <div class="container">
      <ul class="breadcrumb">
        <li><a href="index.php">Inicio</a><span class="divider">/</span></li>
        <li class="active">Registrar</li>
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
  <section class="section-content section-table" id="section-table">
    <div class="container">
      <div class="row"> 
      <?php if ($_SESSION['registrandoDr']==False) {?>
       <div class="control-group"  id="siguiente" align="right">
		<button class="btn btn-primary" type="botton" onClick="window.location='<?php echo SERVER ?>editarDr.php'">Editar</button>
	   </div>
	  <?php }?>
     
       <span id="citaPendiente" style="font-size: 18px; float: left">
                   <?php echo $registrandoDr ?>
       </span> 
     
       <table width="100%"  border="0">
              <tr>
                <td>	<p>
                  <table width="100%"  border="0" bgcolor="#E3E9ED">
                    <tr>
                      <td width="52%">	
					  <div id="slider1">
			<a class="buttons prev">Anterior</a>
			<div class="viewport">
				<ul class="overview">
						<?php							
						//================================================Recuperar registros==================================================
						$DoctorImagen = mysql_query("SELECT * FROM tbl_imagenes WHERE ima_doc_id= '$doc_id'");
						
						while ($reg_DoctorImagen = mysql_fetch_array($DoctorImagen)) 	{ 
						$matriz_Reg_DoctorImagen[$z] = $reg_DoctorImagen[$z]; 
						$LaImagen = $reg_DoctorImagen['ima_nombre'] ;//revisar esta linea
					    $z++; 
						?>
						<li><img src="pictures/photos/180X180/<?php echo $LaImagen; ?>" alt="Photo" /></li>
						<?php
						} 
						if (empty($reg_DoctorImagen)) {
						?>
							<li><img src="<?php echo INCLUDES ?>/img/equipo.jpg" alt="Equipo médico" /></li>
                        <?php
							}
						//desconectar();
						//mysql_close();
						?>
				</ul>
			</div>
			<a class="buttons next">Siguiente</a>
		</div>
					</td>
                    <td width="48%"><?php echo $data_doc["doc_curriculum"]; ?></td>
                    </tr>
                  </table>                  <h4>&nbsp;</h4>                 		
                  
                  <h4><?php echo utf8_encode($data_esp["esp_especialidad"]); ?>  en <?php echo $data_doc["doc_ciudad"]; ?></h4>
                  <table width="100%"  border="0" style="border-top:1px solid #74A1A1">
  <tr style="border-bottom:1px solid #74A1A1">
    <td width="10%"><p class="style4"><?php echo utf8_encode($data_esp["esp_especialidad"]); ?></p></td>
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
  <td width="8%" bgcolor="#E1EBEB"><p align="center" class="style7"><strong> 
  <?php 
	$fecha_final= date("D d-m-y", strtotime("6 day")) ; // suma 6 día
	$dia = date("D", strtotime($fecha_final));  
	echo ExtraeDia($dia);
	$fecha_final= date("d-m-y", strtotime("6 day")) ; // suma 6 día
	echo " " .$fecha_final; 
	?> </strong></p></td>
  <td width="4%"><p class="style7">&nbsp;</p></td>
  </tr><!-- **************************Termina el ecabezado de la tabla --> 
  <!--******************Aqui comienza el bucle -->
<?php
  	$consulta_mysql=("SELECT * FROM tbl_doctores WHERE doc_id = '$doc_id'");
	//var_dump($consulta_mysql);
	//die();
	$resultado_consulta_mysql=mysql_query($consulta_mysql,$dbConn);
	while($fila=mysql_fetch_array($resultado_consulta_mysql))
	{
	$ID= $data_doc['doc_id'];
	$foto= $data_doc['doc_foto'];
	$nombre= $data_doc['doc_nombre'];
	$apellido= $data_doc['doc_apellido'];
	$direccion= $data_doc['doc_direccion'];
	$ciudad= $data_doc['doc_ciudad'];	
	$telefono= $data_doc['doc_telefono'];	
	$calificacion= $data_doc['doc_calificacion'];
	$email= $data_us['us_email'];// tabla usuarios
	$estado= $data_est['estado'];//tabla estados
	$dias= $data_hor['hor_dias']; //tabla horarios
	$horarioLun= $data_hor['hor_lun']; //tabla horarios
	$horarioMar= $data_hor['hor_mar']; //tabla horarios
	$horarioMie= $data_hor['hor_mie']; //tabla horarios
	$horarioJue= $data_hor['hor_jue']; //tabla horarios
	$horarioVie= $data_hor['hor_vie']; //tabla horarios
	$horarioSab= $data_hor['hor_sab']; //tabla horarios
	$horarioDom= $data_hor['hor_dom']; //tabla horarios		
	$_SESSION['IDDr']    = $ID;	
	$_SESSION['NombreDr']    = $nombre ." ". $apellido;	
	$_SESSION['FotoDr']    = $foto;
	$_SESSION['EmailDr']= 	$email;
	$_SESSION['calificacionDr']    = ExtraeCalificacion($calificacion);
	$_SESSION['direccionDr']    = $direccion;
	$_SESSION['ciudadDr']    = $ciudad;  
	$_SESSION['estadoDr']    = $estado;  
?>
  <tr valign="top" style="border-bottom:1px solid #74A1A1">
    <td>
    <img src="pictures/photos/<?php echo $foto ?>" width="74" height="99" />
    </td>
    <td class="style9"><p><strong><?php echo $nombre ." ". $apellido?></strong><br>
          <span class="style11"><?php echo utf8_encode($data_esp["esp_especialidad"]); ?><br />
          </span><img src="includes/img/<?php echo ExtraeCalificacion($calificacion); ?>" width="82" height="19" /><br>
    <?php echo $direccion ?> <br>
    <?php echo $ciudad ?>, &nbsp;<?php echo  utf8_encode($estado) ?><br>
     <?php echo $telefono ?> <br>
      <p><br>
      </p></td>
	  
    <td bgcolor="#E1EBEB" class="style9"><div align="center">    
	
      <?php
	$fecha= date("d-m-y", strtotime("0 day")) ; // suma 0 día
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
  	$fecha= date("d-m-y", strtotime("1 day")) ; // suma 1 día
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
	$fecha= date("d-m-y", strtotime("2 day")) ; // suma 2 día
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
	$fecha= date("d-m-y", strtotime("3 day")) ; // suma 3 día
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
	$fecha= date("d-m-y", strtotime("4 day")) ; // suma 4 día
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
	$fecha= date("d-m-y", strtotime("5 day")) ; // suma 5 día
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
	$fecha= date("d-m-y", strtotime("6 day")) ; // suma 6 día
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



                
                </td>
                
              </tr>
          </table>
        </div>        
      </div>
    </div>
  </section>
  
 
    <!-- .................................... $footer .................................... -->
  <?php include "headers/otrofooter.php"; ?>