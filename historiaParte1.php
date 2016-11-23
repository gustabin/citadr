<?php 
session_start();
include "lib/corelib.php";
require_once('tools/mypathdb.php');
include "lib/class/class.php";
error_reporting(0);
$_SESSION['valor'] = 12; //Activa la opcion del menu actual
include "headers/header.php"; //se usa otro header por conflicto con    ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js
if (!empty($_GET ['id'])) 	
	{
	$us_id = $_GET ['id'];	//viene en el URL
	} else {
	$us_id = $_SESSION['us_id'];
	}
?>

  <script language="JavaScript" type="text/JavaScript">
	$(document).ready(function() {
                       	
						$("#fecConsulta").datepicker({
                            changeYear: true,
                            minDate: 0,
                            maxDate: '+30D',							
                            dateFormat: 'yy-mm-dd',
                            defaultDate: new Date(2014, 10 - 1, 1),
                            changeMonth: true,
                            changeYear: true,
                            //yearRange: '-110:-18'
							yearRange: '2014:2018'
                        });
						$("#fecConsultaAnterior").datepicker({
                            changeYear: true,
                            minDate: new Date(2013, 1 - 1, 1),
                            maxDate: '-1D',							
                            dateFormat: 'yy-mm-dd',
                            defaultDate: new Date(2014, 1 - 1, 1),
                            changeMonth: true,
                            changeYear: true,
							//numberOfMonths: 2,
                            //yearRange: '-110:-18'
							yearRange: '2013:2014'
                        });			
						$("#fecEgreso").datepicker({
                            changeYear: true,
                            minDate: new Date(2013, 1 - 1, 1),
                            //maxDate: '-18Y',							
                            dateFormat: 'yy-mm-dd',
                            defaultDate: new Date(2014, 1 - 1, 1),
                            changeMonth: true,
                            changeYear: true,
                            //yearRange: '-110:-18'
							yearRange: '2014:2018'
                        });		
						
						
		
						//MASCARA EN EL INPUT
    				    $(".tlf").mask("(0999) 999-99-99");			 
	
						$('#titulo').html("inicio / historia clinica");
						
						})
	

    //Metodo para cargar los datos personales
    $("body").on('submit', '#formHistoria', function(event) {
		event.preventDefault()
		if ($('#formHistoria').valid()) {
			$.ajax({
				type: "POST",
				url: "historia_procesar_parte1.php",
				dataType: "json",
				data: $(this).serialize(),
				success: function(respuesta) {
					if (respuesta.error == 1) {
						$('#error1').show();
						setTimeout(function() {
						$('#error1').hide();
						}, 1000);
					}
					if (respuesta.error == 2) {
						$('#error2').show();
						setTimeout(function() {
						$('#error2').hide();
						}, 1000);
					}
					if (respuesta.exito == 1) {
						$('#exito1').show();
						setTimeout(function() {
						$('#exito1').hide();
						window.location.href='historiaParte2.php?id=<?php echo $us_id?>'; 
					  }, 1000);
					}
					
					if (respuesta.exito == 2) {
						$('#exito2').show();
						setTimeout(function() {
						$('#exito2').hide();
						window.location.href='historiaParte2.php?id=<?php echo $us_id?>'; 
					  }, 1000);
					}
					
				}
			});
		}
	});	
</script> 

<script type="text/javascript">
$(function() {    
    $('#fechaNacimiento').datepicker({
						   changeYear: true,
                            minDate: new Date(1914, 1 - 1, 1),
                            maxDate: 'D',							
                            dateFormat: 'yy-mm-dd',
                            defaultDate: new Date(1980, 1 - 1, 1),
                            changeMonth: true,
                            changeYear: true,
                            //yearRange: '-110:-18'
							yearRange: '1914:2015',
        onSelect: function(selectedDate) {
            var dataString = 'date='+selectedDate;
            $.ajax({
                type: "POST",
                url: "calcularEdad.php",
                data: dataString,
                success: function(data) {
					$('#edad').val(data);
                }
            });
        }

    });
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
        Historia clinica  
        <small>Parte I</small>
      <a href="historiaPDF.php?id=<?php echo $us_id?>"><img src="includes/img/pdf.jpg" alt="imprimir PDF" width="45" height="45" /></a></h2>
      </div>
  

 <!-- .................................... $Contenido .................................... -->
  <section class="section-content section-contact section-color-graylighter">
    <div class="container">
      <div class="row">
        <div id="contenido">  
       <div class="span12">
	
    
<?php
		$doc_id=$_SESSION['doc_id'];
		

    // ========================= Buscar la historia en tbl_historias ==========================================================
	$query="SELECT * FROM tbl_historias WHERE his_id = '$us_id' AND his_doc_id = '$doc_id'";  

	$resultado=mysql_query($query,$dbConn);
	while($dataHis=mysql_fetch_array($resultado))
	{
	$apellido= $dataHis['his_apellido'];
	$nombre= $dataHis['his_nombre'];
	$telefono= $dataHis['his_telefono'];
	$email= $dataHis['his_email'];
	$cedula= $dataHis['his_cedula'];
	$sexo= $dataHis['his_sexo'];
	$edad= $dataHis['his_edad'];
	$edoCivil= $dataHis['his_edoCivil'];
	$ciudadNacimiento= $dataHis['his_ciudadNacimiento'];
	$fechaNacimiento= $dataHis['his_fechaNacimiento'];
	$nacionalidad= $dataHis['his_nacionalidad'];
	$ocupacion= $dataHis['his_ocupacion'];
	$direccion= $dataHis['his_direccion'];
	$apellidoAvisar= $dataHis['his_apellidoAvisar'];
	$nombreAvisar= $dataHis['his_nombreAvisar'];
	$parentescoAvisar= $dataHis['his_parentescoAvisar'];
	$direccionAvisar= $dataHis['his_direccionAvisar'];
	$fechaConsulta= $dataHis['his_fechaConsulta'];
	$horaConsulta= $dataHis['his_horaConsulta'];
	$fechaConsultaAnterior= $dataHis['his_fechaConsultaAnterior'];
	$motivos= $dataHis['his_motivos'];
	$enfermedad= $dataHis['his_enfermedad'];
	$diagnosticoProvisional= $dataHis['his_diagnosticoProvisional'];
	$diagnosticoFinal= $dataHis['his_diagnosticoFinal'];
	$diagnosticoAnatomo= $dataHis['his_diagnosticoAnatomo'];
	$edadSaludPadresHermanos= $dataHis['his_edadSaludPadresHermanos'];
	$edadSaludOtros= $dataHis['his_edadSaludOtros'];
	$enfermedadFamiliar= $dataHis['his_enfermedadFamiliar'];
	$otraEnfermedad= $dataHis['his_otraEnfermedad'];
	$prenatalObstetrico= $dataHis['his_prenatalObstetrico'];
	$personalNeonatal= $dataHis['his_personalNeonatal'];
	$otroPersonalNeonatal= $dataHis['his_otroPersonalNeonatal'];
	$alimentacion= $dataHis['his_alimentacion'];
	$sostuvo= $dataHis['his_sostuvo'];
	$sento= $dataHis['his_sento'];
	$paro= $dataHis['his_paro'];
	$camino= $dataHis['his_camino'];
	$esfinter= $dataHis['his_esfinter'];
	$diente= $dataHis['his_diente'];
	$palabra= $dataHis['his_palabra'];
	$grado= $dataHis['his_grado'];
	$progreso= $dataHis['his_progreso'];
	$habitos= $dataHis['his_habitos'];
	$otrosHabitos= $dataHis['his_otrosHabitos'];
	$inmunizaciones= $dataHis['his_inmunizaciones'];
	$otrasInmunizaciones= $dataHis['his_otrasInmunizaciones'];
	$tbc= $dataHis['his_tbc'];
	}
?>

  	<form class="form-vertical" id="formHistoria" action="">
    <h5>Datos del paciente</h5>
		<div class="control-group-inline">	 
        	<input name="us_id" type="hidden" value="<?php echo $us_id ?>" /> 		
		  Nombre <input name="nombre" type="text" class="span4 required" id="nombre"  maxlength="30" placeholder="Nombre" style="width: 29%;" value="<?php echo $nombre ?>">
          Apellido  <input name="apellido" type="text" class="span4 required" id="apellido"  maxlength="30" placeholder="Apellido" style="width: 27%;" value="<?php echo $apellido ?>">
          Teléfono  <input name="telefono" type="text" class="span4 required tlf" id="telefono" maxlength="16" value="<?php echo $telefono ?>" placeholder="Teléfono" style="width: 20%;">
        </div>
        <div class="control-group-inline">	 
            Email <input name="email" type="text" class="span4 required email" id="email" value="<?php echo $email ?>" style="width: 38%;" placeholder="Email">
			Cédula <input name="cedula" type="text" class="span4" id="cedula"  maxlength="10" placeholder="Cedula" style="width: 11%;" value="<?php echo $cedula ?>">
           <?php

		   if ($sexo == 1) {
		   		$femenino = checked;
		   }
		   if ($sexo == 2) {
		   		$masculino = checked;
		   }		   
		   ?>
		    <input type="radio" name="sexo" id="sexo" value="F" class="required" <?php echo $femenino ?>>
            Femenino
            <input type="radio" name="sexo" id="sexo" value="M" class="required" <?php echo $masculino ?>>
            Masculino
            <?php
			if ($edoCivil == 1) {
				$soltero = selected;
			}
			if ($edoCivil == 2) {
				$casado = selected;  
			}
			if ($edoCivil == 3) {
				$divorciado = selected;
			}
			if ($edoCivil == 4) {
				$viudo = selected;
			}
			?>
			
           
		  	<select name="edoCivil" id="edoCivil" style="width: 13%;">
            <option value="1" <?php echo $soltero ?>>Soltero</option>
            <option value="2" <?php echo $casado ?>>Casado</option>
            <option value="3" <?php echo $divorciado ?>>Divorciado</option>
            <option value="4" <?php echo $viudo ?>>Viudo</option>
            </select>
		</div>
        <div class="control-group-inline">

          Fec. Nacimiento <input name="fechaNacimiento" type="text" class="span4 required" id="fechaNacimiento"  maxlength="20" placeholder="Fec. Nacimiento" style="width: 10%;" value="<?php echo $fechaNacimiento ?>" readonly="readonly">
          
           
          Edad <input name="edad" type="text" class="span4" id="edad"  maxlength="2" placeholder="Edad" style="width: 3%;" value="<?php echo $edad ?>" readonly="readonly">
           
           
           
	  		Lugar de Nacimiento <input name="ciudadNacimiento" type="text" class="span4" id="ciudadNacimiento"  maxlength="40" placeholder="Lugar de Nacimiento" style="width: 30%;" value="<?php echo $ciudadNacimiento ?>">
		  	
            <?php
		   if ($nacionalidad == 1) {
		   		$venezolano = checked;
		   }
		   if ($nacionalidad == 2) {
		   		$extranjero = checked;
		   }		   
		   ?>
			<input type="radio" name="nacionalidad" id="nacionalidad" value="1" <?php echo $venezolano ?>>
            Venezolano
            <input type="radio" name="nacionalidad" id="nacionalidad" value="2" <?php echo $extranjero ?>>
            Extranjero
        </div>
            Ocupación <input name="ocupacion" type="text" class="span4" id="ocupacion"  maxlength="100" placeholder="ocupación" style="width: 42%;" value="<?php echo $ocupacion ?>">	  	
		
        <div class="control-group-inline">
	  		Dirección <input name="direccion" type="text" class="span4" id="direccion"  maxlength="100" placeholder="Dirección de habitación" style="width: 90%;" value="<?php echo $direccion ?>">
		</div>			
		<h5>En caso de emergencia avisar a:</h5>
        <div class="control-group-inline">
        	Nombre <input name="nombreAvisar" type="text" class="span4" id="nombreAvisar"  maxlength="20" placeholder="Nombre" style="width: 27%;" value="<?php echo $nombreAvisar ?>">
	  		Apellido <input name="apellidoAvisar" type="text" class="span4" id="apellidoAvisar"  maxlength="20" placeholder="Apellido" style="width: 27%;" value="<?php echo $apellidoAvisar ?>">		  	
			Parentesco <input name="parentescoAvisar" type="text" class="span4" id="parentescoAvisar"  maxlength="10" placeholder="Parentesco" style="width: 20%;" value="<?php echo $parentescoAvisar ?>">
        </div>    
            Dirección <input name="direccionAvisar" type="text" class="span4" id="direccionAvisar"  maxlength="100" placeholder="Dirección" style="width: 90%;" value="<?php echo $direccionAvisar ?>">
		
        <div class="control-group-inline">
	  		Fecha de la consulta <input name="fecConsulta" type="text" class="span4" id="fecConsulta"  style="width: 16%;" value="<?php echo $fechaConsulta ?>" readonly="readonly">
            Hora de la consulta <input name="horaConsulta" type="text" class="span4" id="horaConsulta"  style="width: 16%;" value="<?php echo $horaConsulta ?>">
            Fecha de la consulta anterior 
<input name="fecConsultaAnterior" type="text" class="span4" id="fecConsultaAnterior"  maxlength="10" style="width: 16%;" value="<?php echo $fechaConsultaAnterior ?>" readonly="readonly">        
        </div>

        <div class="control-group-inline">
	  		Motivos de la consulta <input name="motivos" type="text" class="span4" id="motivos"  maxlength="400" placeholder="Motivos de la consulta" style="width: 97%;" value="<?php echo $motivos ?>">
		  	Enfermedad actual <textarea name="enfermedad" type="text" class="span4" id="enfermedad"  maxlength="1000" placeholder="Enfermedad actual" style="width: 97%;" cols="45" rows="5"><?php echo $enfermedad ?></textarea>
			Diagnostico provisional <textarea name="diagnosticoProvisional" type="text" class="span4" id="diagnosticoProvisional"  maxlength="1000" placeholder="Diagnostico provisional" style="width: 97%;" cols="45" rows="5"><?php echo $diagnosticoProvisional ?></textarea>
        </div>
       
        <div class="control-group-inline">
	  		Diagnóstico clinico final <textarea name="diagnosticoFinal" type="text" class="span4" id="diagnosticoFinal"  maxlength="400" placeholder="Diagnóstico clinico final" style="width: 97%;" cols="45" rows="5"><?php echo $diagnosticoFinal ?></textarea>
                     
            
            Diagnóstico Anatomo Patológico <textarea name="diagnosticoAnatomoPatologico" type="text" class="span4" id="diagnosticoAnatomoPatologico"  maxlength="400" placeholder="Diagnóstico Anatomo Patológico" style="width: 97%;" cols="45" rows="5"><?php echo $diagnosticoAnatomo ?></textarea>
        </div>
		<div class="control-group">         
			<button class="btn btn-primary" type="submit" id="enviar">Guardar</button>
			<button class="btn btn-default" type="reset" id="cancelar">Cancelar</button>
            <a href="historiaPDF.php"></a> </div>
        
  </form> <!--cierre del formulario !-->

	 <!-- ================= mensajes de EXITO o de ERROR===========================================================  !-->
     <div class="alert alert-success mensaje_form" style="display: none" id="exito1">
		<button data-dismiss="alert" class="close" type="button">x</button>
		<strong>MENSAJE!</strong> <span class="textmensaje">Registro exitoso</span>          
	 </div> 
     
     <div class="alert alert-success mensaje_form" style="display: none" id="exito2">
		<button data-dismiss="alert" class="close" type="button">x</button>
		<strong>MENSAJE!</strong> <span class="textmensaje">Actualización exitosa</span>          
	 </div>       	 
      
	 <div class="alert alert-danger mensaje_form" style="display: none" id="error1">
		<button data-dismiss="alert" class="close" type="button">x</button>
		<strong>MENSAJE!</strong> <span class="textmensaje">Debe elegir un paciente registrado</span>
	 </div>
     
     <div class="alert alert-danger mensaje_form" style="display: none" id="error2">
		<button data-dismiss="alert" class="close" type="button">x</button>
		<strong>MENSAJE!</strong> <span class="textmensaje">Este paciente ya existe</span>
	 </div>

     
</div><!--cierre de spam de formulario !-->
        </div>        
      </div>
    </div>
  </section>

    <!-- .................................... $footer .................................... -->
  <?php include "headers/otrofooter.php"; ?>