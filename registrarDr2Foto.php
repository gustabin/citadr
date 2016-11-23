<?php
session_start();
include "lib/corelib.php";
require_once('tools/mypathdb.php');
include "lib/class/class.php";
//error_reporting(0);
$_SESSION['valor'] = 7; //Activa la opcion del menu actual
include "headers/header.php";

$url = 'includes/img/user-icon-180x180.png'; 
$us_id = $_SESSION['us_id'];
$query = mysql_query("SELECT * FROM tbl_doctores WHERE doc_id_user = '$us_id'");
$dataDoctor = mysql_fetch_array($query);
?>

<script type="text/javascript" language="javascript" src="<?php echo INCLUDES ?>js/jquery.form.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo INCLUDES ?>js/si.files.js"></script>
<script language="JavaScript" type="text/JavaScript">
	$(document).ready(function() {		   
		$('#titulo').html("Paso 2/ Datos Personales / Foto del doctor");
    	/* Upload Photo */
        $('.file-photo').change(function() {
		var actual_image_name = $("#actual_image_name").val();
        $("#preview-photo").html('');
        $("#preview-photo").html('<img src="includes/img/loading.gif" alt="Cargando..."/>');
        $("#form-photo").ajaxForm({
        	url: "photo.async.php?actual_image_name="+actual_image_name,
            target: '#preview-photo',
            data: $(this).serialize(),
        }).submit();
        });
        SI.Files.stylizeAll();				
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
      <div class="row">
        <div id="contenido"> 
<div class="span8">
		<h5>Una foto dice mas que mil palabras... </h5>
		<div class="control-group">
	  		<input class="span4 required" id="Nombre" name="Nombre" placeholder="Nombre" type="text" value="<?php echo $dataDoctor["doc_nombre"] ?>" readonly="readonly">
	  		<input class="span4 required" id="Apellido" name="Apellido" placeholder="Apellido" type="text" value="<?php echo $dataDoctor["doc_apellido"] ?>" readonly="readonly">
		</div>	

		<div class="control-group">
	  		<input class="required" id="Direccion" name="Direccion" placeholder="Dirección" type="text" style="width:95%" value="<?php echo $dataDoctor["doc_direccion"] ?>" readonly="readonly">       
              <!-- ================= boton SIGUIENTE  =====================================================================  !-->       
			</div>			  
				<button class="btn btn-primary" type="botton" onClick="window.location='<?php echo SERVER ?>registrarDr2Horario.php'">Siguiente</button>
			</div>
</div><!--cierre de spam de formulario !-->
             
	<div class="span4">
		<div style="margin-left: 30%">Agregue una foto</div>
 		<div class="profilePreviewSideBarWrapper" style="margin-left: 30%">
			<form id="form-photo" action='' method='POST' enctype="multipart/form-data" >
			<div id='preview-photo' style='width:197px'>
				<img width="180px" class='preview' alt="Foto" src="<?php echo $url; ?>">
			</div>
				<label class="cabinet">Seleccionar foto<input class="file file-photo" type="file" accept="image/*" name="photo"  /></label>
			</form><!--cierre del formulario !-->     
		</div>
	</div><!--cierre de spam de foto !-->
        </div>        
      </div>
    </div>
  </section>
  <!-- .................................... $footer .................................... -->
  <?php include "headers/otrofooter.php"; ?>