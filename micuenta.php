<?php 
session_start(); 
include "lib/corelib.php";
require_once('tools/mypathdb.php');
$_SESSION['valor'] = 7; //Activa la opcion del menu actual
include "headers/header.php";
?>
  <script language="JavaScript" type="text/JavaScript">
	$(document).ready(function() {
                        $("#fecha_nac").datepicker({
                            changeYear: true,
                            minDate: new Date(1900, 1 - 1, 1),
                            maxDate: '-18Y',
                            dateFormat: 'yy-mm-dd',
                            defaultDate: new Date(1970, 1 - 1, 1),
                            changeMonth: true,
                            changeYear: true,
                            yearRange: '-110:-18'
                        });					
						//MASCARA EN EL INPUT
                        $(".tlf").mask("(0999) 999-99-99");	
						})

    //Metodo para cargar el formulario 
    $("body").on('submit', '#formMicuenta', function(event) {
	event.preventDefault()
	if ($('#formMicuenta').valid()) {
	    $.ajax({
		type: "POST",
		url: "micuenta_Procesar.php",
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
        <li><a href="index.php">Acceso</a><span class="divider">/</span></li>
        <li class="active">Mi cuenta</li>
      </ul>
    </div>
  </section>
  <!-- .................................... $Contact .................................... -->
  
    <div class="container" style="margin-top:10px">
      <h2 class="section-title">
        Mi cuenta 
        <small>usuario</small>
      </h2>
      </div>
  
  <!-- .................................... $Contact .................................... -->
  <section class="section-content section-contact section-color-graylighter">
    <div class="container">
      <div class="row">
        <div class="span4">
          <?php
		  //$_SESSION['emailDr']
		  	$query_buscarUsuario = "SELECT
							tbl_usuarios.us_id,
							tbl_usuarios.us_email,
							tbl_usuarios.us_clave,
							tbl_usuarios.us_status,
							tbl_usuarios.us_fecha,
							tbl_usuarios.us_tipo,
							tbl_pacientes.pac_id,
							tbl_pacientes.pac_nombre,
							tbl_pacientes.pac_apellido,
							tbl_pacientes.pac_telefono,
							tbl_pacientes.pac_fecha_nac,
							tbl_pacientes.pac_sexo,
							tbl_pacientes.pac_id_user
							FROM
							tbl_usuarios
							INNER JOIN tbl_pacientes ON tbl_usuarios.us_id = tbl_pacientes.pac_id_user WHERE tbl_usuarios.us_email= '".$_SESSION['email']. "'";
	$buscarUsuario = mysql_query($query_buscarUsuario); 
	$dataUsuario = mysql_fetch_array($buscarUsuario);
		   //=========================Consultar la tabla citas ============================================
		   //============================Buscar citas por confirmar ==============================
		    $userID = $_SESSION['user_id'];			
			$query=mysql_query("SELECT * from tbl_citas WHERE cit_pac_id= '$userID'");
			
  			$dataCit = mysql_fetch_array($query);
  			$cita = $dataCit['cit_pin']; 
			
			if (!empty($cita))
    		{?>
            <div class="control-group">              
              <a class="btn btn-large btn-primary" href="citasConfirmar.php">Manejar citas</a>              
            </div>			
        	<?php
			}
		  ?>
          
        </div>
        <div class="span8">
          <h5>Tus datos de registro son:</h5>
          <form class="form-vertical" id="formMicuenta">
            <div class="control-group">
              <input id="id_user" name="id_user" type="hidden" value="<?php echo $dataUsuario["us_id"]; ?>">
			   <input class="span4 required email" id="Email" name="Email" placeholder="Email" type="text" value="<?php echo $dataUsuario["us_email"]; ?>" readonly="readonly">
              <input class="span4 required" id="Password" name="Password" placeholder="Password" type="password" value="<?php echo $dataUsuario["us_clave"]; ?>">
            </div>
			
			<div class="control-group">
              <input class="span4 required" id="Nombre" name="Nombre" placeholder="Nombre" type="text" value="<?php echo $dataUsuario["pac_nombre"]; ?>">
              <input class="span4 required" id="Apellido" name="Apellido" placeholder="Apellido" type="text" value="<?php echo $dataUsuario["pac_apellido"]; ?>">
            </div>
			
			<div class="control-group">
              <input class="span4 required tlf" id="Telefono" name="Telefono" placeholder="Teléfono" type="text" value="<?php echo $dataUsuario["pac_telefono"]; ?>">
              <input class="span4 required" id="fecha_nac" name="fecha_nac" placeholder="Fecha de Nacimiento" type="text" readonly="readonly" value="<?php echo $dataUsuario["pac_fecha_nac"]; ?>">
            </div>
			
			<div class="control-group">
              <select class="span4" id="Sexo" name="Sexo">
			  <option>Seleccione sexo</option>			  
			  <option value="M" <?php if ($dataUsuario["pac_sexo"]=="M") echo "Selected"; ?>>Masculino</option>
			  <option value="F" <?php if ($dataUsuario["pac_sexo"]=="F") echo "Selected"; ?>>Femenino</option>
			  </select>
            </div>
			
            <div class="control-group">         
            <button class="btn btn-primary" type="submit">Enviar</button>
			
			</div>
          </form>
		     <div class="alert alert-success mensaje_form" style="display: none" id="mensaje">
				<button data-dismiss="alert" class="close" type="button">x</button>
				<span class="textmensaje">Los datos se actualizaron exitosamente</span>
			 </div>
        </div>        
      </div>
    </div>
  </section>
    <!-- .................................... $footer .................................... -->
  <?php include "headers/otrofooter.php"; ?>