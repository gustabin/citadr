<?php 
session_start();
include "lib/corelib.php";
require_once('tools/mypathdb.php');
error_reporting(0);
$_SESSION['valor'] = 5; //Activa la opcion del menu actual
include "headers/header.php";
include "lib/class/class2.php";
include "lib/class/classExtraer.php";
//include "lib/class/classConsultar.php";
?>

<script Language="JavaScript">

	$(document).ready(function() {
		$('#titulo').html("Paciente / Equipo médico / Buscar doctor / Reservar cita");
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
        Reservar
        <small>Cita</small>
      </h2>
      </div>
  
  <!-- .................................... $Contenido .................................... -->
  <section class="section-content section-contact section-color-graylighter">
    <div class="container">
      <div class="row">
        <div id="contenido"> 
       
       <form name="form1" id="form1" method="post" action="reservarCitaInfo_Procesar.php">
                  <p><strong>Te has consultado con este doctor anteriormente?</strong></p>
                  <p>
                    <input name="consulta" type="radio" value="nuevo" checked="checked" /> 
                    Primera vez.</p>
                  <p>
<input name="consulta" type="radio" value="viejo" />
Soy paciente de esa consulta.</p>
                  <p><strong>Motivo de tu visita?</strong></p>
                  <p>
<?php
// Consultar especialidad
$especialidad = $_SESSION['IDespecialidad'];
$query=("select * from tbl_especialistas WHERE esp_id= '$especialidad'");

$resultado=mysql_query($query,$dbConn);
echo "<select name='motivos'>";
while($fila=mysql_fetch_array($resultado))
{
	//echo utf8_decode($fila['especialidad']);
	$especialidad= $fila['esp_especialidad'];
	$motivos= $fila['esp_motivo'];
	//Extraer datos separados por coma ',' ==> el campo motivos
	$array_con_datos = explode(",", $motivos);
	// cada elemento de "$array_con_datos" tiene tus datos separados que estaban separados por comas
	foreach($array_con_datos as $cadaMotivo)
	{
		//echo $cadaMotivo."<br>"; // imprime en cada linea cada datos que habia estado separada por comas.
		// dentro de este loop, podes hacer tus llamados a DB usando "$cadaMotivo"
		echo "<option value='".$cadaMotivo."'>".$cadaMotivo."</option>";
	}
}
echo "</select>";
//desconectar();
mysql_close();
	$doctorID= $_GET["id"];
	$query=("SELECT * FROM tbl_doctores WHERE doc_id = '".$doctorID."'");
	$resultado_query=mysql_query($query,$dbConn);
    while($filaDr=mysql_fetch_array($resultado_query))
	{
	//$ID= $filaDr['doc_id'];
	$nombre= $filaDr['doc_nombre'];
	$apellido= $filaDr['doc_apellido'];
	//$telefono= $filaDr['doc_telefono']; //
	//$email= $filaDr['doc_email'];
	$direccion= $filaDr['doc_direccion'];//	
	$ciudad= $filaDr['doc_ciudad'];
	$IDestado= $filaDr['doc_estado'];
	$foto= $filaDr['doc_foto'];
	$calificacion= $filaDr['doc_calificacion'];	
	$curriculum= $filaDr['doc_curriculum'];	
	$status= $filaDr['doc_status'];	
	$_SESSION['IDDr']    = $id;	
	$_SESSION['NombreDr']    = $nombre ." ". $apellido;	 
	$_SESSION['FotoDr']    = $foto;
	$_SESSION['EmailDr']= 	$email;
	$_SESSION['calificacionDr']    = ExtraeCalificacion($calificacion);
	$_SESSION['direccionDr']    = $direccion;
	$_SESSION['ciudadDr']    = $ciudad;  
	$_SESSION['estadoDr']    = $IDestado;  
	$_SESSION['diaCita'] = $_GET["dia"];
	$_SESSION['fechaCita'] = $_GET["fecha"];
	$_SESSION['horaCita'] = $_GET["hora"];
	}	
	
?>
                  </p>
                  <p><strong>Hora y fecha de la cita</strong></p>
				  <?php $fecha= $_GET["fecha"];
				 // $fecha_final=date("d-m-Y",strtotime($fecha)); 
				   ?>
                  <p> <?php echo $_GET["dia"]; ?>, <?php echo $fecha; ?> <?php echo $_GET["hora"]; ?>                  </p>
                  <p><span class="style10">
                    <input type="image" name="Submit" value="Submit" src="images/continuar.png" width="232" height="74" />
                  </span> </p>
                </form>
       
        </div>        
      </div>
    </div>
  </section>
    <!-- .................................... $footer .................................... -->
  <?php include "headers/otrofooter.php"; ?>