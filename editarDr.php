<?php 
session_start(); 
include "lib/corelib.php";
require_once('tools/mypathdb.php');
error_reporting(0);
include "lib/class/classExtraerSinEnlace.php";
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
		$('#titulo').html("Mi cuenta/ Datos Personales / Fotos del equipo médico");
	});
</script>

  <script language="JavaScript" type="text/JavaScript">
	$(document).ready(function() {
                        
	//MASCARA EN EL INPUT
    $(".tlf").mask("(0999) 999-99-99");	
	})

    //Metodo para cargar el formulario 
    $("body").on('submit', '#formMicuenta', function(event) {
	event.preventDefault()
	if ($('#formMicuenta').valid()) {
	    $.ajax({
		type: "POST",
		url: "editarDr_Procesar.php",
		dataType: "json",
		data: $(this).serialize(),
		success: function(respuesta) {
		    if (respuesta.error == 1) { //nunca ocurre
			  $('#error1').show();
			setTimeout(function() {
			  $('#error1').hide();
			}, 3000);
		    }
			  
			if (respuesta.exito == 1) {
						$('#mensaje').show();						
						$('#siguiente').show();
						$('#enviar').hide();
						$('#cancelar').hide();
						setTimeout(function() {
						$('#mensaje').hide();
						}, 2000);						
					}
			
		}
	    });
	}
	});
	    
</script>
<script Language="JavaScript">
	$(document).ready(function() {
		$('#titulo').html("Mi cuenta/ Datos Personales / Horario de consultas");		
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
						$('#mensajeHor').show();						
						$('#siguienteHor').show();
						$('#enviarHor').hide();
						$('#cancelarHor').hide();
						setTimeout(function() {
						$('#mensajeHor').hide();
						}, 3000);
					}		    
				}
			});
		}
	});	
	    
</script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $('#tabs').tab();
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
        <li><a href="index.php">Acceso</a><span class="divider">/</span></li>
        <li class="active">Mi cuenta</li>
      </ul>
    </div>
  </section>  
   <!-- .................................... $Titulo .................................... -->
  
    <div class="container" style="margin-top:10px">
      <h2 class="section-title">
        Editar datos 
        <small>Doctor</small>
      </h2>
      </div>
   
  <!-- .................................... $Contact .................................... -->
  <section class="section-content section-contact section-color-graylighter">
  <div class="container">
 
<!-------->
<div id="content">
    <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
        <li class="active"><a href="#red" data-toggle="tab">Datos personales</a></li>
        <li><a href="#orange" data-toggle="tab">Horario</a></li>
        <li><a href="#yellow" data-toggle="tab">Fotos</a></li>
        <li><a href="#green" data-toggle="tab">Historias médicas</a></li>
    </ul>
    <div id="my-tab-content" class="tab-content">
        <div class="tab-pane active" id="red">
    <div class="container">
      <div class="row">
          <?php
		  //$_SESSION['emailDr']
		  	$query_buscarUsuario = "SELECT
							tbl_usuarios.us_id,
							tbl_usuarios.us_email,
							tbl_usuarios.us_clave,
							tbl_usuarios.us_status,
							tbl_usuarios.us_fecha,
							tbl_usuarios.us_tipo,
							tbl_doctores.doc_id,							
							tbl_doctores.doc_id_user
							FROM
							tbl_usuarios
							INNER JOIN tbl_doctores ON tbl_usuarios.us_id = tbl_doctores.doc_id_user WHERE tbl_usuarios.us_email= '".$_SESSION['email']. "'";
	//var_dump($query_buscarUsuario);
	//die();
	$buscarUsuario = mysql_query($query_buscarUsuario); 
	$dataUsuario = mysql_fetch_array($buscarUsuario);
	$us_id = $_SESSION['user_id'];
	$query = mysql_query("SELECT * FROM tbl_doctores WHERE doc_id_user = '$us_id'");
	//$query = ("SELECT * FROM tbl_doctores WHERE doc_id_user = '$us_id'");
	//var_dump($query);
	//die();
	$data_doc = mysql_fetch_array($query);
	$calificacion= $data_doc['doc_calificacion'];
	$foto= $data_doc["doc_foto"];
	
	//================================================Recuperar registros tabla Estados==================================================						
	//$idEstado = $data_doc['doc_estado'];
	//$query = mysql_query("SELECT * FROM tbl_estados WHERE id = '$idEstado'");
	//$data_est = mysql_fetch_array($query);						
	//$estado= $data_est['estado']; 
	?>
       
        <div class="span8">
          <h5>Tus datos de registro son:</h5>
          <form class="form-vertical" id="formMicuenta">
            <div class="control-group">
              <input id="doc_id" name="doc_id" type="hidden" value="<?php echo $data_doc["doc_id"]; ?>">
			   <input class="span4 required" id="Email" name="Email" placeholder="Email" type="text" value="<?php echo $dataUsuario["us_email"]; ?>" readonly>
              <input class="span4 required" id="Password" name="Password" placeholder="Password" type="password" value="<?php echo $dataUsuario["us_clave"]; ?>">
            </div>
			
			<div class="control-group">
              <input class="span4 required" id="Nombre" name="Nombre" placeholder="Nombre" type="text" value="<?php echo $data_doc["doc_nombre"]; ?>">
              <input class="span4 required" id="Apellido" name="Apellido" placeholder="Apellido" type="text" value="<?php echo $data_doc["doc_apellido"]; ?>">
            </div>
			
			<div class="control-group">
              <input class="span4 required tlf" id="Telefono" name="Telefono" placeholder="Teléfono" type="text" value="<?php echo $data_doc["doc_telefono"]; ?>">           </div>
            
            <div class="control-group">
	  		  <input class="span4 required" id="Direccion" name="Direccion" placeholder="Dirección" type="text" style="width:95%" value="<?php echo $data_doc["doc_direccion"]; ?>">        
            </div>	
            
            <div class="control-group">  
              <?php echo $data_doc["doc_ciudad"] .", ". $_SESSION['estadoDr'] ?>
			</div>	
            
            <div class="control-group">              
             <img src="pictures/photos/<?php echo $foto ?>" width="74" height="99" />
             <img src="includes/img/<?php echo ExtraeCalificacion($calificacion); ?>" width="82" height="19" />
            </div>
             <div class="control-group">
              <input class="span4 required" id="Curriculum" name="Curriculum" placeholder="Curriculum" type="text" value="<?php echo $data_doc["doc_curriculum"]; ?>" style="width:100%; height:200px">
              
             
            </div>
			
            <div class="control-group">         
             <button class="btn btn-primary" type="submit" id="enviar">Guardar</button>
			<button class="btn btn-default" type="reset" id="cancelar" onClick="window.location='<?php echo SERVER ?>registrarDr2Ficha.php'">Cerrar</button>
			</div>
          </form>
           <!-- ================= boton SIGUIENTE  =====================================================================  !-->
     <div class="control-group" style="display: none" id="siguiente">    
		<button class="btn btn-primary" type="botton" onClick="window.location='<?php echo SERVER ?>registrarDr2Ficha.php'">Cerrar</button>
	 </div>
          
             <div class="alert alert-success mensaje_form" style="display: none" id="mensaje">
				<button data-dismiss="alert" class="close" type="button">x</button>
				<span class="textmensaje">Los datos se actualizaron exitosamente</span>
			 </div>
        </div>        
      </div>
    </div>

        </div>
        <div class="tab-pane" id="orange">
             <!-- .................................... $Contenido .................................... -->
  
    <div class="container">
      <div class="row">
        <div id="contenido" align="center"> 
			<form name="formHorario" id="formHorario" method="post" action="">		
		<div></div>
			  <table width="80%"  border="1">
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
	<?php
    $doc_id = $_SESSION['doc_id'];
	//================================================Recuperar registros tabla Horarios==================================================
	$query = mysql_query("SELECT * FROM tbl_horarios WHERE hor_doc_id = '$doc_id'");
	$data_hor = mysql_fetch_array($query);		
	$dias= $data_hor['hor_dias']; //tabla horarios
	$horarioLun= $data_hor['hor_lun']; //tabla horarios
	$horarioMar= $data_hor['hor_mar']; //tabla horarios
	$horarioMie= $data_hor['hor_mie']; //tabla horarios
	$horarioJue= $data_hor['hor_jue']; //tabla horarios
	$horarioVie= $data_hor['hor_vie']; //tabla horarios
	$horarioSab= $data_hor['hor_sab']; //tabla horarios
	$horarioDom= $data_hor['hor_dom']; //tabla horarios	
    ?>
                    <td>
                    	<p><?php marcarHoras($horarioLun, "Lun");   ?></p>                      
					</td>
					<td bgcolor="#E3E9ED">
						<p><?php marcarHoras($horarioMar, "Mar");   ?></p>
					</td>
					<td>
                    	<p><?php marcarHoras($horarioMie, "Mie");   ?></p>
					</td>
					<td bgcolor="#E3E9ED">
						<p><?php marcarHoras($horarioJue, "Jue");   ?></p>
					</td>
					<td>
						<p><?php marcarHoras($horarioVie, "Vie");   ?></p>						
					</td>
					<td bgcolor="#E3E9ED">
                    	<p><?php marcarHoras($horarioSab, "Sab");   ?></p>
					</td>
                    <td>
                    	<p><?php marcarHoras($horarioDom, "Dom");   ?></p>
					</td>
				</tr>
			</table>
			<div>&nbsp; </div>
    <div class="control-group">         
         <button class="btn btn-primary" type="submit" id="enviarHor">Guardar</button>
        <button class="btn btn-default" type="reset" id="cancelarHor" onClick="window.location='<?php echo SERVER ?>registrarDr2Ficha.php'">Cerrar</button>
    </div>
	</form>
    <!-- ================= boton SIGUIENTE  =====================================================================  !-->
    <div class="control-group" style="display: none" id="siguienteHor">    
		<button class="btn btn-primary" type="botton" onClick="window.location='<?php echo SERVER ?>registrarDr2Ficha.php'">Cerrar</button>
	 </div>
	<!-- ================= mensajes de EXITO o de ERROR===========================================================  !--> 
	<div class="alert alert-danger mensaje_form" style="display: none" id="error">
		<button data-dismiss="alert" class="close" type="button">x</button>
		<strong>MENSAJE!</strong> <span class="textmensaje">Debe seleccionar el horario</span>
	 </div>
	 
	 <div class="alert alert-success mensaje_form control-group" style="display: none" id="mensajeHor">
		<button data-dismiss="alert" class="close" type="button">x</button>
		<strong>MENSAJE!</strong> <span class="textmensaje">Registro exitoso</span>
	 </div>	
	
    
    
        </div>        
      </div>
    </div>
  
        </div>
        <div class="tab-pane" id="yellow">
        <!--*************************************** Carga de fotos **************************************************-->
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
        </div>
        <div class="tab-pane" id="green">
            <h1>Historias médicas</h1>
            <p>En construcción</p>
        </div>        
    </div>
</div>
 
 
   
</div> <!-- container -->
  </section>
    <!-- .................................... $footer .................................... -->
  <?php include "headers/otrofooter.php"; ?>