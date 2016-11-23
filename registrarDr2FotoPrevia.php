<?php
error_reporting(0);
include "lib/corelib.php";
    $url = 'includes/img/users.jpg'; 

if (!empty($_REQUEST['exito'])) {
	$exito=1;
}else {
	$exito=2;
}

?>  	
		<script type="text/javascript" language="javascript" src="<?php echo INCLUDES ?>js/jquery.form.js"></script>
        <script type="text/javascript" language="javascript" src="<?php echo INCLUDES ?>js/si.files.js"></script>
		
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
        </script>
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
        
        <!-- ================= boton ATRAS / SIGUIENTE  =====================================================================  !-->
		<div class="control-group" id="siguiente">    
			<button class="btn btn-primary" type="botton" onClick="window.location='<?php echo SERVER ?>registrarDr2Horario.php'">Atras</button>           
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
	</div>