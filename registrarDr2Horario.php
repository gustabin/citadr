<?php 
session_start();
include "lib/corelib.php";
require_once('tools/mypathdb.php');
include "lib/class/class.php";
error_reporting(0);
//$valor = 5; //Activa la opcion del menu actual
$_SESSION['valor'] = 7; //Activa la opcion del menu actual
include "headers/header.php";
?>

<script Language="JavaScript">
	$(document).ready(function() {
		$('#titulo').html("Paso 3/ Datos Personales / Horario de consultas");		
	});
    //Metodo para cargar los datos personales
    $("body").on('submit', '#formHorario', function(event) {
		event.preventDefault()
		if ($('#formHorario').valid()) {
			$.ajax({
				type: "POST",
				url: "registrarDr2HorarioProcesar.php",
				dataType: "json",
				data: $(this).serialize(),
				success: function(respuesta) {
					if (respuesta.error == 1) {
						$('#error').show();
						setTimeout(function() {
						$('#error').hide();
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
      <div class="row">
        <div id="contenido"> 
			<form name="formHorario" id="formHorario" method="post" action="">		
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
		<button class="btn btn-primary" type="submit" id="enviar">Guardar</button>
		<button class="btn btn-default" type="reset" id="cancelar">Cancelar</button>   		        
	</div>	
	</form>
    <!-- ================= boton SIGUIENTE  =====================================================================  !-->
    <div class="control-group" style="display: none" id="siguiente">    
		<button class="btn btn-primary" type="botton" onClick="window.location='<?php echo SERVER ?>registrarDr2FotoEquipo.php'">Siguiente</button>
	 </div>
	<!-- ================= mensajes de EXITO o de ERROR===========================================================  !--> 
	<div class="alert alert-danger mensaje_form" style="display: none" id="error">
		<button data-dismiss="alert" class="close" type="button">x</button>
		<strong>MENSAJE!</strong> <span class="textmensaje">Debe seleccionar el horario</span>
	 </div>
	 
	 <div class="alert alert-success mensaje_form control-group" style="display: none" id="mensaje">
		<button data-dismiss="alert" class="close" type="button">x</button>
		<strong>MENSAJE!</strong> <span class="textmensaje">Registro exitoso</span>
	 </div>	
	
    
    
        </div>        
      </div>
    </div>
  </section>
    <!-- .................................... $footer .................................... -->
  <?php include "headers/otrofooter.php"; ?>