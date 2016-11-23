<?php 
session_start();
include "lib/corelib.php";
require_once('tools/mypathdb.php');
error_reporting(0);
//$valor = 5; //Activa la opcion del menu actual
$_SESSION['valor'] = 7; //Activa la opcion del menu actual
include "headers/header.php";

$url = 'includes/img/users.jpg'; 

if (!empty($_REQUEST['exito'])) {
	$exito=1;
}else {
	$exito=2;
}
?>  	
<script type="text/javascript" language="javascript" src="<?php echo INCLUDES ?>js/jquery.form.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo INCLUDES ?>js/si.files.js"></script>

<script language="JavaScript" type="text/JavaScript">
	$(document).ready(function() {
		$('#titulo').html("Paso 4/ Datos Personales / Fotos del equipo médico");
	});
</script>
		
        <script>
            $(function() {
			var exito='<?php echo $exito; ?>';
			if (exito==1) {
				$('#FotoEquipo').load('registrarDr2FotoEquipoProcesar.php');
				$('.profilePreviewSideBarWrapper, .maximo8fotos').show();	
			}
			$('#seleccionarfoto').html("Seleccionar foto");
                /* Upload Photo */
                $('.file-photo').change(function() {
				var actual_image_name = $("#actual_image_name").val();
                    $("#preview-photo").html('');
                    $("#preview-photo").html('<img src="includes/img/loading.gif" alt="Cargando..."/>');
                    $("#form-photo").ajaxForm({
                        url: "photo.asyncEquipo.php?actual_image_name="+actual_image_name,
                        target: '#preview-photo',
						//dataType: "json",
                        data: $(this).serialize(),
						success: function(respuesta) {
						if(respuesta=='error'){
							$('.profilePreviewSideBarWrapper, .maximo8fotos').hide();						
						}

						$('#FotoEquipo').load('registrarDr2FotoEquipoProcesar.php');
						$('#seleccionarfoto').html("Cargar más fotos"); 
						}
                    }).submit();
                });
                SI.Files.stylizeAll();
            });
			
		function eliminarFoto(nombreImagen) {
		$('#barra').show();
			$.ajax({
				type: "POST",
				url: "eliminarFotoDr.php?nombreImagen="+nombreImagen,
				dataType: "html",
				data: $(this).serialize(),
				success: function(respuesta) {
					$('#barra').hide();
					$('#contenido').load('registrarDr2FotoPrevia.php?exito=1');    
				}			
			});
	}
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
					<div class="span3">
						<div class="maximo8fotos">Agregue hasta 8 fotos de su equipo médico</div>
						<div class="profilePreviewSideBarWrapper">
							<form id="form-photo" action='' method='POST' enctype="multipart/form-data" >
							<div id='preview-photo' style='width:197px'>
								<img width="180px" class='preview' alt="Foto" src="<?php echo $url; ?>">
							</div>
							<label class="cabinet"><span id="seleccionarfoto"></span><input class="file file-photo" type="file" accept="image/*" name="photo"  /></label>
							</form>
						</div>
						<!-- ================= boton SIGUIENTE  =====================================================================  !-->
						<div class="control-group" id="siguiente">    
                            <button class="btn btn-primary" type="botton" onClick="window.location='<?php echo SERVER ?>registrarDr2Curriculum.php'">Siguiente</button>
						</div>
					</div>
				 
					<div class="span9">
						<div class="control-group" id="FotoEquipo">
							<?php if (empty($_REQUEST['exito'])) { ?>	
							<div class="span2">
								<div id='preview-photo'>
									<img width="140px" class='preview' alt="Foto" src="<?php echo $url; ?>">
								</div>
							</div>			
							<div class="span2">
								<div id='preview-photo'>
									<img width="140px" class='preview' alt="Foto" src="<?php echo $url; ?>">
								</div>
							</div>			
							<div class="span2">
								<div id='preview-photo'>
									<img width="140px" class='preview' alt="Foto" src="<?php echo $url; ?>">
								</div>
							</div>			
							<div class="span2">
								<div id='preview-photo'>
									<img width="140px" class='preview' alt="Foto" src="<?php echo $url; ?>">
								</div>
							</div>				
							<div class="span2">
								<div id='preview-photo'>
									<img width="140px" class='preview' alt="Foto" src="<?php echo $url; ?>">
								</div>
							</div>				
							<div class="span2">
								<div id='preview-photo'>
									<img width="140px" class='preview' alt="Foto" src="<?php echo $url; ?>">
								</div>
							</div>				
							<div class="span2">
								<div id='preview-photo'>
									<img width="140px" class='preview' alt="Foto" src="<?php echo $url; ?>">
								</div>
							</div>				
							<div class="span2">
								<div id='preview-photo'>
									<img width="140px" class='preview' alt="Foto" src="<?php echo $url; ?>">
								</div>
							</div>
							<?php } ?>
						</div>
					</div><!--cierre del div span9 !-->   
				</div>
			</div>
		</div>
	</section>
    <!-- .................................... $footer .................................... -->
  <?php include "headers/otrofooter.php"; ?>