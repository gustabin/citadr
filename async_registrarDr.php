<?php
session_start();
include "lib/corelib.php";
require_once('tools/mypathdb.php');
include "lib/class/class.php";
include("lib/class/class2.php"); 
	error_reporting(0);
$puerta = $_REQUEST['puerta'];
switch ($puerta) {
case 1:
$url = 'includes/img/user-icon-180x180.png';  
?>

  <script type="text/javascript" src="includes/js/jqombo.js"></script>
  <script type="text/javascript" language="javascript" src="<?php echo INCLUDES ?>js/jquery.form.js"></script>
        <script type="text/javascript" language="javascript" src="<?php echo INCLUDES ?>js/si.files.js"></script>
		
<script language="JavaScript" type="text/JavaScript">
	$(document).ready(function() {
    					//MASCARA EN EL INPUT
                        $(".tlf").mask("(0999) 999-99-99");	
	
						
						});
					</script>
					 <div class="span8">
 <h5>Por favor completa los siguientes datos</h5>
  <form class="form-vertical" id="formDoctor">
	<div class="control-group">
	  <input name="Email" type="text" class="span4 required email" id="Email" value="gustavo<?php echo rand(5, 15)?>@gmail.com" placeholder="Email">
	  <input name="Password" type="password" class="span4 required" id="Password" value="123456" placeholder="Password">
	</div>
	
	<div class="control-group">
	  <input name="Nombre" type="text" class="span4 required" id="Nombre" value="Gustavo" placeholder="Nombre">
	  <input name="Apellido" type="text" class="span4 required" id="Apellido" value="Arias" placeholder="Apellido">
	</div>	

	<div class="control-group">
	  <input name="Direccion" type="text" class="required" id="Direccion" style="width:95%" value="Av Bolivar Oeste #244" placeholder="Dirección">              
	</div>			
	
	<div class="control-group">
		<?php JCombo::ver_estados(); ?>
		<span id="ciudadesCombo"> </span>				
	</div>
	
	<div class="control-group">              	
		<input name="celular" type="text" class="span4 required tlf" id="celular" value="04243755128" placeholder="Teléfono">
	</div>
	
	<div class="control-group">         
		<button class="btn btn-primary" type="submit">Enviar</button>
		<button class="btn btn-default" type="reset">Cancelar</button>
	</div>
  </form>
	 <div class="alert alert-success mensaje_form" style="display: none" id="mensaje">
		<button data-dismiss="alert" class="close" type="button">x</button>
		<strong>ALERTA!</strong> <span class="textmensaje">Registro exitoso</span>
	 </div>
	 <div class="alert alert-danger mensaje_form" style="display: none" id="error1">
		<button data-dismiss="alert" class="close" type="button">x</button>
		<strong>ALERTA!</strong> <span class="textmensaje">El password debe ser mayor de 6 caracteres</span>
	 </div>
	 <div class="alert alert-danger mensaje_form" style="display: none" id="error2">
		<button data-dismiss="alert" class="close" type="button">x</button>
		<strong>ALERTA!</strong> <span class="textmensaje">El doctor ya está registrado</span>
	 </div>
	 </div><!--cierre de spam de formulario !-->

<?php

break;

case 2:
?>
	<form name="horarios" id="horarios" method="post" action="">		
		<div></div>
			  <table width="100%"  border="1">
                  <tr>
                    <td><strong>Lun</strong></td>
                    <td bgcolor="#E3E9ED"><strong>Mar</strong></td>
                    <td><strong>Mie</strong></td>
                    <td bgcolor="#E3E9ED"><strong>Jue</strong></td>
                    <td><strong>Vie</strong></td>
                    <td bgcolor="#E3E9ED"><strong>Sab</strong></td>
                    <td><strong>Dom</strong></td>
                  </tr>
                  <tr>
                    <td><p>
						<input type="checkbox" name="chkboxLun8a" value="01" />
						8:00 am <br />
						<input type="checkbox" name="chkboxLun83a" value="02" />
						8:30 am <br />
						<input type="checkbox" name="chkboxLun9a" value="03" /> 
						9:00 am <br />
						<input type="checkbox" name="chkboxLun93a" value="04" />
						9:30 am <br />
						<input type="checkbox" name="chkboxLun10a" value="05" />
						10:00 am <br />
						<input type="checkbox" name="chkboxLun103a" value="06" /> 
						10:30 am <br />
						<input type="checkbox" name="chkboxLun11a" value="07" />
						11:00 am <br />
						<input type="checkbox" name="chkboxLun113a" value="08" />
						11:30 am <br /><br />
						<input type="checkbox" name="chkboxLun12m" value="09" /> 
						12:00 m <br />
						<input type="checkbox" name="chkboxLun123p" value="10" />
						12:30 pm <br />
						<input type="checkbox" name="chkboxLun1p" value="11" />
						1:00 pm <br />
						<input type="checkbox" name="chkboxLun13p" value="12" /> 
						1:30 pm <br /><br />
						<input type="checkbox" name="chkboxLun2p" value="13" />
						2:00 pm <br />
						<input type="checkbox" name="chkboxLun23p" value="14" />
						2:30 pm <br />
						<input type="checkbox" name="chkboxLun3p" value="15" /> 
						3:00 pm <br />
						<input type="checkbox" name="chkboxLun33p" value="16" />
						3:30 pm <br />
						<input type="checkbox" name="chkboxLun4p" value="17" />
						4:00 pm <br />
						<input type="checkbox" name="chkboxLun43p" value="18" /> 
						4:30 pm <br />
						<input type="checkbox" name="chkboxLun5p" value="19" />
						5:00 pm <br />
						<input type="checkbox" name="chkboxLun53p" value="20" />
						5:30 pm <br /><br />
						<input type="checkbox" name="chkboxLun6p" value="21" /> 
						6:00 pm <br />
						<input type="checkbox" name="chkboxLun63p" value="22" /> 
						6:30 pm <br />
						<input type="checkbox" name="chkboxLun7p" value="23" /> 
						7:00 pm <br />
						<input type="checkbox" name="chkboxLun73p" value="24" /> 
						7:30 pm <br />
						<input type="checkbox" name="chkboxLun8p" value="25" /> 
						8:00 pm <br />
						<input type="checkbox" name="chkboxLun83p" value="26" /> 
						8:30 pm <br />
						</p>                      
					</td>
					<td bgcolor="#E3E9ED"><p>
						<input type="checkbox" name="chkboxMar8a" value="01" />
						8:00 am <br />
						<input type="checkbox" name="chkboxMar83a" value="02" />
						8:30 am <br />
						<input type="checkbox" name="chkboxMar9a" value="03" /> 
						9:00 am <br />
						<input type="checkbox" name="chkboxMar93a" value="04" />
						9:30 am <br />
						<input type="checkbox" name="chkboxMar10a" value="05" />
						10:00 am <br />
						<input type="checkbox" name="chkboxMar103a" value="06" /> 
						10:30 am <br />
						<input type="checkbox" name="chkboxMar11a" value="07" />
						11:00 am <br />
						<input type="checkbox" name="chkboxMar113a" value="08" />
						11:30 am <br /><br />
						<input type="checkbox" name="chkboxMar12m" value="09" /> 
						12:00 m <br />
						<input type="checkbox" name="chkboxMar123p" value="10" />
						12:30 pm <br />
						<input type="checkbox" name="chkboxMar1p" value="11" />
						1:00 pm <br />
						<input type="checkbox" name="chkboxMar13p" value="12" /> 
						1:30 pm <br /><br />
						<input type="checkbox" name="chkboxMar2p" value="13" />
						2:00 pm <br />
						<input type="checkbox" name="chkboxMar23p" value="14" />
						2:30 pm <br />
						<input type="checkbox" name="chkboxMar3p" value="15" /> 
						3:00 pm <br />
						<input type="checkbox" name="chkboxMar33p" value="16" />
						3:30 pm <br />
						<input type="checkbox" name="chkboxMar4p" value="17" />
						4:00 pm <br />
						<input type="checkbox" name="chkboxMar43p" value="18" /> 
						4:30 pm <br />
						<input type="checkbox" name="chkboxMar5p" value="19" />
						5:00 pm <br />
						<input type="checkbox" name="chkboxMar53p" value="20" />
						5:30 pm <br /><br />
						<input type="checkbox" name="chkboxMar6p" value="21" /> 
						6:00 pm <br />
						<input type="checkbox" name="chkboxMar63p" value="22" /> 
						6:30 pm <br />
						<input type="checkbox" name="chkboxMar7p" value="23" /> 
						7:00 pm <br />
						<input type="checkbox" name="chkboxMar73p" value="24" /> 
						7:30 pm <br />
						<input type="checkbox" name="chkboxMar8p" value="25" /> 
						8:00 pm <br />
						<input type="checkbox" name="chkboxMar83p" value="26" /> 
						8:30 pm <br />
						</p>
					</td>
					<td><p>
						<input type="checkbox" name="chkboxMie8a" value="01" />
						8:00 am <br />
						<input type="checkbox" name="chkboxMie83a" value="02" />
						8:30 am <br />
						<input type="checkbox" name="chkboxMie9a" value="03" /> 
						9:00 am <br />
						<input type="checkbox" name="chkboxMie93a" value="04" />
						9:30 am <br />
						<input type="checkbox" name="chkboxMie10a" value="05" />
						10:00 am <br />
						<input type="checkbox" name="chkboxMie103a" value="06" /> 
						10:30 am <br />
						<input type="checkbox" name="chkboxMie11a" value="07" />
						11:00 am <br />
						<input type="checkbox" name="chkboxMie113a" value="08" />
						11:30 am <br /><br />
						<input type="checkbox" name="chkboxMie12m" value="09" /> 
						12:00 m <br />
						<input type="checkbox" name="chkboxMie123p" value="10" />
						12:30 pm <br />
						<input type="checkbox" name="chkboxMie1p" value="11" />
						1:00 pm <br />
						<input type="checkbox" name="chkboxMie13p" value="12" /> 
						1:30 pm <br /><br />
						<input type="checkbox" name="chkboxMie2p" value="13" />
						2:00 pm <br />
						<input type="checkbox" name="chkboxMie23p" value="14" />
						2:30 pm <br />
						<input type="checkbox" name="chkboxMie3p" value="15" /> 
						3:00 pm <br />
						<input type="checkbox" name="chkboxMie33p" value="16" />
						3:30 pm <br />
						<input type="checkbox" name="chkboxMie4p" value="17" />
						4:00 pm <br />
						<input type="checkbox" name="chkboxMie43p" value="18" /> 
						4:30 pm <br />
						<input type="checkbox" name="chkboxMie5p" value="19" />
						5:00 pm <br />
						<input type="checkbox" name="chkboxMie53p" value="20" />
						5:30 pm <br /><br />
						<input type="checkbox" name="chkboxMie6p" value="21" /> 
						6:00 pm <br />
						<input type="checkbox" name="chkboxMie63p" value="22" /> 
						6:30 pm <br />
						<input type="checkbox" name="chkboxMie7p" value="23" /> 
						7:00 pm <br />
						<input type="checkbox" name="chkboxMie73p" value="24" /> 
						7:30 pm <br />
						<input type="checkbox" name="chkboxMie8p" value="25" /> 
						8:00 pm <br />
						<input type="checkbox" name="chkboxMie83p" value="26" /> 
						8:30 pm <br />
						</p>
					</td>
					<td bgcolor="#E3E9ED"><p>
						<input type="checkbox" name="chkboxJue8a" value="01" />
						8:00 am <br />
						<input type="checkbox" name="chkboxJue83a" value="02" />
						8:30 am <br />
						<input type="checkbox" name="chkboxJue9a" value="03" /> 
						9:00 am <br />
						<input type="checkbox" name="chkboxJue93a" value="04" />
						9:30 am <br />
						<input type="checkbox" name="chkboxJue10a" value="05" />
						10:00 am <br />
						<input type="checkbox" name="chkboxJue103a" value="06" /> 
						10:30 am <br />
						<input type="checkbox" name="chkboxJue11a" value="07" />
						11:00 am <br />
						<input type="checkbox" name="chkboxJue113a" value="08" />
						11:30 am <br /><br />
						<input type="checkbox" name="chkboxJue12m" value="09" /> 
						12:00 m <br />
						<input type="checkbox" name="chkboxJue123p" value="10" />
						12:30 pm <br />
						<input type="checkbox" name="chkboxJue1p" value="11" />
						1:00 pm <br />
						<input type="checkbox" name="chkboxJue13p" value="12" /> 
						1:30 pm <br /><br />
						<input type="checkbox" name="chkboxJue2p" value="13" />
						2:00 pm <br />
						<input type="checkbox" name="chkboxJue23p" value="14" />
						2:30 pm <br />
						<input type="checkbox" name="chkboxJue3p" value="15" /> 
						3:00 pm <br />
						<input type="checkbox" name="chkboxJue33p" value="16" />
						3:30 pm <br />
						<input type="checkbox" name="chkboxJue4p" value="17" />
						4:00 pm <br />
						<input type="checkbox" name="chkboxJue43p" value="18" /> 
						4:30 pm <br />
						<input type="checkbox" name="chkboxJue5p" value="19" />
						5:00 pm <br />
						<input type="checkbox" name="chkboxJue53p" value="20" />
						5:30 pm <br /><br />
						<input type="checkbox" name="chkboxJue6p" value="21" /> 
						6:00 pm <br />
						<input type="checkbox" name="chkboxJue63p" value="22" /> 
						6:30 pm <br />
						<input type="checkbox" name="chkboxJue7p" value="23" /> 
						7:00 pm <br />
						<input type="checkbox" name="chkboxJue73p" value="24" /> 
						7:30 pm <br />
						<input type="checkbox" name="chkboxJue8p" value="25" /> 
						8:00 pm <br />
						<input type="checkbox" name="chkboxJue83p" value="26" /> 
						8:30 pm <br />
						</p>
					</td>
					<td><p>
						<input type="checkbox" name="chkboxVie8a" value="01" />
						8:00 am <br />
						<input type="checkbox" name="chkboxVie83a" value="02" />
						8:30 am <br />
						<input type="checkbox" name="chkboxVie9a" value="03" /> 
						9:00 am <br />
						<input type="checkbox" name="chkboxVie93a" value="04" />
						9:30 am <br />
						<input type="checkbox" name="chkboxVie10a" value="05" />
						10:00 am <br />
						<input type="checkbox" name="chkboxVie103a" value="06" /> 
						10:30 am <br />
						<input type="checkbox" name="chkboxVie11a" value="07" />
						11:00 am <br />
						<input type="checkbox" name="chkboxVie113a" value="08" />
						11:30 am <br /><br />
						<input type="checkbox" name="chkboxVie12m" value="09" /> 
						12:00 m <br />
						<input type="checkbox" name="chkboxVie123p" value="10" />
						12:30 pm <br />
						<input type="checkbox" name="chkboxVie1p" value="11" />
						1:00 pm <br />
						<input type="checkbox" name="chkboxVie13p" value="12" /> 
						1:30 pm <br /><br />
						<input type="checkbox" name="chkboxVie2p" value="13" />
						2:00 pm <br />
						<input type="checkbox" name="chkboxVie23p" value="14" />
						2:30 pm <br />
						<input type="checkbox" name="chkboxVie3p" value="15" /> 
						3:00 pm <br />
						<input type="checkbox" name="chkboxVie33p" value="16" />
						3:30 pm <br />
						<input type="checkbox" name="chkboxVie4p" value="17" />
						4:00 pm <br />
						<input type="checkbox" name="chkboxVie43p" value="18" /> 
						4:30 pm <br />
						<input type="checkbox" name="chkboxVie5p" value="19" />
						5:00 pm <br />
						<input type="checkbox" name="chkboxVie53p" value="20" />
						5:30 pm <br /><br />
						<input type="checkbox" name="chkboxVie6p" value="21" /> 
						6:00 pm <br />
						<input type="checkbox" name="chkboxVie63p" value="22" /> 
						6:30 pm <br />
						<input type="checkbox" name="chkboxVie7p" value="23" /> 
						7:00 pm <br />
						<input type="checkbox" name="chkboxVie73p" value="24" /> 
						7:30 pm <br />
						<input type="checkbox" name="chkboxVie8p" value="25" /> 
						8:00 pm <br />
						<input type="checkbox" name="chkboxVie83p" value="26" /> 
						8:30 pm <br />
						</p>
					</td>
						<td bgcolor="#E3E9ED"><p>
						<input type="checkbox" name="chkboxSab8a" value="01" />
						8:00 am <br />
						<input type="checkbox" name="chkboxSab83a" value="02" />
						8:30 am <br />
						<input type="checkbox" name="chkboxSab9a" value="03" /> 
						9:00 am <br />
						<input type="checkbox" name="chkboxSab93a" value="04" />
						9:30 am <br />
						<input type="checkbox" name="chkboxSab10a" value="05" />
						10:00 am <br />
						<input type="checkbox" name="chkboxSab103a" value="06" /> 
						10:30 am <br />
						<input type="checkbox" name="chkboxSab11a" value="07" />
						11:00 am <br />
						<input type="checkbox" name="chkboxSab113a" value="08" />
						11:30 am <br /><br />
						<input type="checkbox" name="chkboxSab12m" value="09" /> 
						12:00 m <br />
						<input type="checkbox" name="chkboxSab123p" value="10" />
						12:30 pm <br />
						<input type="checkbox" name="chkboxSab1p" value="11" />
						1:00 pm <br />
						<input type="checkbox" name="chkboxSab13p" value="12" /> 
						1:30 pm <br /><br />
						<input type="checkbox" name="chkboxSab2p" value="13" />
						2:00 pm <br />
						<input type="checkbox" name="chkboxSab23p" value="14" />
						2:30 pm <br />
						<input type="checkbox" name="chkboxSab3p" value="15" /> 
						3:00 pm <br />
						<input type="checkbox" name="chkboxSab33p" value="16" />
						3:30 pm <br />
						<input type="checkbox" name="chkboxSab4p" value="17" />
						4:00 pm <br />
						<input type="checkbox" name="chkboxSab43p" value="18" /> 
						4:30 pm <br />
						<input type="checkbox" name="chkboxSab5p" value="19" />
						5:00 pm <br />
						<input type="checkbox" name="chkboxSab53p" value="20" />
						5:30 pm <br /><br />
						<input type="checkbox" name="chkboxSab6p" value="21" /> 
						6:00 pm <br />
						<input type="checkbox" name="chkboxSab63p" value="22" /> 
						6:30 pm <br />
						<input type="checkbox" name="chkboxSab7p" value="23" /> 
						7:00 pm <br />
						<input type="checkbox" name="chkboxSab73p" value="24" /> 
						7:30 pm <br />
						<input type="checkbox" name="chkboxSab8p" value="25" /> 
						8:00 pm <br />
						<input type="checkbox" name="chkboxSab83p" value="26" /> 
						8:30 pm <br />
						</p>
					</td>
					<td><p>
						<input type="checkbox" name="chkboxDom8a" value="01" />
						8:00 am <br />
						<input type="checkbox" name="chkboxDom83a" value="02" />
						8:30 am <br />
						<input type="checkbox" name="chkboxDom9a" value="03" /> 
						9:00 am <br />
						<input type="checkbox" name="chkboxDom93a" value="04" />
						9:30 am <br />
						<input type="checkbox" name="chkboxDom10a" value="05" />
						10:00 am <br />
						<input type="checkbox" name="chkboxDom103a" value="06" /> 
						10:30 am <br />
						<input type="checkbox" name="chkboxDom11a" value="07" />
						11:00 am <br />
						<input type="checkbox" name="chkboxDom113a" value="08" />
						11:30 am <br /><br />
						<input type="checkbox" name="chkboxDom12m" value="09" /> 
						12:00 m <br />
						<input type="checkbox" name="chkboxDom123p" value="10" />
						12:30 pm <br />
						<input type="checkbox" name="chkboxDom1p" value="11" />
						1:00 pm <br />
						<input type="checkbox" name="chkboxDom13p" value="12" /> 
						1:30 pm <br /><br />
						<input type="checkbox" name="chkboxDom2p" value="13" />
						2:00 pm <br />
						<input type="checkbox" name="chkboxDom23p" value="14" />
						2:30 pm <br />
						<input type="checkbox" name="chkboxDom3p" value="15" /> 
						3:00 pm <br />
						<input type="checkbox" name="chkboxDom33p" value="16" />
						3:30 pm <br />
						<input type="checkbox" name="chkboxDom4p" value="17" />
						4:00 pm <br />
						<input type="checkbox" name="chkboxDom43p" value="18" /> 
						4:30 pm <br />
						<input type="checkbox" name="chkboxDom5p" value="19" />
						5:00 pm <br />
						<input type="checkbox" name="chkboxDom53p" value="20" />
						5:30 pm <br /><br />
						<input type="checkbox" name="chkboxDom6p" value="21" /> 
						6:00 pm <br />
						<input type="checkbox" name="chkboxDom63p" value="22" /> 
						6:30 pm <br />
						<input type="checkbox" name="chkboxDom7p" value="23" /> 
						7:00 pm <br />
						<input type="checkbox" name="chkboxDom73p" value="24" /> 
						7:30 pm <br />
						<input type="checkbox" name="chkboxDom8p" value="25" /> 
						8:00 pm <br />
						<input type="checkbox" name="chkboxDom83p" value="26" /> 
						8:30 pm <br />
						</p>
					</td>
				</tr>
			</table>
			<div>&nbsp; </div>
	<div class="control-group">         
		<button class="btn btn-primary" type="submit">Enviar</button>
		<button class="btn btn-default" type="reset">Cancelar</button>
	</div>	

	 <div class="alert alert-success mensaje_form control-group" style="display: none" id="mensaje">
		<button data-dismiss="alert" class="close" type="button">x</button>
		<strong>ALERTA!</strong> <span class="textmensaje">Registro exitoso</span>
	 </div>	
	</form>
<?php

break;

case 3: //registrar fotos de oficina
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
				$('#FotoEquipo').load('async_registrarDr.php?iduser=6&puerta=4');
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

						$('#FotoEquipo').load('async_registrarDr.php?iduser=6&puerta=4');
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
<button class="btn btn-primary" type="button" onclick="pasoCurriculum();">Siguiente</button>
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
	
<?php
break; 
case 4:
$url = 'includes/img/users.jpg';  
$iduser=$_REQUEST['iduser'];
$query=mysql_query("SELECT *FROM tbl_imagenes WHERE ima_doc_id='$iduser'");
// Mostrar resultados de la consulta  
        $nConfig = mysql_num_rows ($query);  
          
        if ($nConfig > 0)  
        {
            for ($i=0; $i<$nConfig; $i++)  
            {  
				$FotoEquipo = mysql_fetch_array($query);
					$nombre_fichero='';
					$nombre_fichero = "pictures/photos/180X180/" . $FotoEquipo['ima_nombre'];
					#SI EXISTE LA FOTO EN LA CARPETA DESTINO ENTRA AQUI
					if (file_exists($nombre_fichero) && !empty($FotoEquipo['ima_nombre'])) 
					{
						$url = "pictures/photos/180X180/" . $FotoEquipo['ima_nombre'];
					}				
					
				?>
					<div class="span2" style="margin-top:14px">
					<div id='preview-photo'>
						<img src="includes/img/borrar.png" onclick="eliminarFoto('<?php echo $FotoEquipo['ima_nombre']; ?>')" style="cursor:pointer;">
						<img width="140px" class='preview' alt="Foto" src="<?php echo $url; ?>">					
					</div>
				</div>
				
				<?php			
            } 
				if($nConfig<8)
				{
					$total=8-$nConfig;
					for ($j=0; $j<$total; $j++)
					{
					?>
					<div class="span2" style="margin-top:36px">
						<div id='preview-photo'>
							<img width="140px" class='preview' alt="Foto" src="includes/img/users.jpg">
						</div> 
					</div>
					<?
					}//FIN FOR 2			 	
				}
				?>

<div style="float:left; display:none" id="barra"><img src="includes/img/barra.gif" alt="Cargando..."/><br>Eliminando foto</div>		
<?php		
		}
break;

case 5:
$nombreImagen=$_REQUEST['nombreImagen'];
$query=mysql_query("DELETE FROM tbl_imagenes WHERE ima_nombre = '$nombreImagen'");

        $foto = 'pictures/photos/';
        $foto_2 = 'pictures/photos/180X180/';
        unlink($foto.$_REQUEST["nombreImagen"]);
        unlink($foto_2.$_REQUEST["nombreImagen"]);

//die("EXITO");
break;

case 6: //formulario de resumen curricular
?>

<div class="span8">
 <h5>Registrar Dr - Resumen Curricular </h5>
 
  <form class="form-vertical" id="formCurriculum">
	<div class="control-group">
	<textarea class="required" id="resumen" name="resumen" placeholder="Describa brevemente su experiencia profesional" style="width:100%; height:300px"></textarea>
	</div>			
	
	<div class="control-group">         
		<button class="btn btn-primary" type="submit">Enviar</button>
		<button class="btn btn-default" type="reset">Cancelar</button>
	</div>
  </form>
     <div class="alert alert-danger mensaje_form" style="display: none" id="error1">
		<button data-dismiss="alert" class="close" type="button">x</button>
		<strong>MENSAJE!</strong> <span class="textmensaje">Debe colocar su curriculum vitae</span>
	 </div>
	 <div class="alert alert-success mensaje_form" style="display: none" id="mensaje">
		<button data-dismiss="alert" class="close" type="button">x</button>
		<strong>MENSAJE!</strong> <span class="textmensaje">Registro exitoso</span>
	 </div>
</div><!--cierre de spam de formulario !-->
	 


<?php

break;

case 7://FORMULARIO DE FOTO DEL DOCTOR
$url = 'includes/img/user-icon-180x180.png'; 

$us_id = $_SESSION['us_id'];
$query = mysql_query("SELECT * FROM tbl_doctores WHERE doc_id_user = '$us_id'");
$dataDoctor = mysql_fetch_array($query);
 
?>

  <script type="text/javascript" language="javascript" src="<?php echo INCLUDES ?>js/jquery.form.js"></script>
        <script type="text/javascript" language="javascript" src="<?php echo INCLUDES ?>js/si.files.js"></script>
		
<script language="JavaScript" type="text/JavaScript">
	$(document).ready(function() {
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
					 <div class="span8">
 <h5>Una foto dice mas que mil palabras... </h5>

	<div class="control-group">
	  <input class="span4 required" id="Nombre" name="Nombre" placeholder="Nombre" type="text" value="<?php echo $dataDoctor["doc_nombre"] ?>" readonly="readonly">
	  <input class="span4 required" id="Apellido" name="Apellido" placeholder="Apellido" type="text" value="<?php echo $dataDoctor["doc_apellido"] ?>" readonly="readonly">
	</div>	

	<div class="control-group">
	  <input class="required" id="Direccion" name="Direccion" placeholder="Dirección" type="text" style="width:95%" value="<?php echo $dataDoctor["doc_direccion"] ?>" readonly="readonly">              
	</div>			
	
	<div class="control-group">         
		<button class="btn btn-primary" type="botton" onclick="paso2Horario();">Siguiente</button>
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
	</form>
</div>
	   </div><!--cierre de spam de foto !-->
<?php

break;
case 8: //especialidades medicas
?>
<form name="form1" id="form1" method="post" action="">		
		<div></div>
				<div></div>
 				<div>Especialidad:
                        <?php JCombo2::ver_especialidad(); ?>
              </div>
                    <div>Motivos: <span id="motivosCombo"> </span></div>
                    <div></div> 
			   <p align="justify">&nbsp;</p>			   
			   
			   <p align="justify">&nbsp;</p>
			   <p align="justify">&nbsp;</p>
			   <p align="justify">&nbsp;</p>
			   <p align="justify">&nbsp;</p>
			   <input type="image" name="Submit" value="Submit" src="images/continuar.png" width="232" height="74" />
</form>
<?php

break;
}

?>