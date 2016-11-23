<?php 
session_start();
include "lib/corelib.php";
require_once('tools/mypathdb.php');
error_reporting(0);
//$valor = 5; //Activa la opcion del menu actual
$_SESSION['valor'] = 7; //Activa la opcion del menu actual
include "headers/header.php";
?>
<script type="text/javascript" src="includes/js/jqombo.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo INCLUDES ?>js/jquery.form.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo INCLUDES ?>js/si.files.js"></script>

<script language="JavaScript" type="text/JavaScript">
	$(document).ready(function() {
		$('#titulo').html("Paso 5/ Datos Personales / Resumen curricular del médico");
	});
    
	//Metodo para cargar el curriculum
    $("body").on('submit', '#formCurriculum', function(event) {
		event.preventDefault()
		if ($('#formCurriculum').valid()) {
			$.ajax({
				type: "POST",
				url: "registrarDr2CurriculumProcesar.php",
				dataType: "json",
				data: $(this).serialize(),
				success: function(respuesta) {				
					if (respuesta.exito == 1) {
						$('#mensaje').show();
						$('#siguiente').show();
						$('#enviar').hide();
						$('#cancelar').hide();
						setTimeout(function() {
						$('#mensaje').hide();
						}, 3000);
						
					}
					if (respuesta.error == 1) {
			  			$('#error1').show();
						setTimeout(function() {
			  			$('#error1').hide();
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
    <div class="span4">
 <h5>Registrar Dr - Resúmen Curricular </h5>
 
  <form class="form-vertical" id="formCurriculum">
	<div class="control-group">
	<textarea class="required tdtextarea" id="resumen" name="resumen" placeholder="Describa brevemente su experiencia profesional" style="width:100%; height:500px"></textarea>
	</div>			
	
	<div class="control-group">         
		<button class="btn btn-primary" type="submit" id="enviar">Guardar</button>
		<button class="btn btn-default" type="reset" id="cancelar">Cancelar</button>
	</div>
  </form>
    <!-- ================= boton SIGUIENTE  =====================================================================  !-->
    <div class="control-group" style="display: none" id="siguiente">
		<button class="btn btn-primary" type="botton" onClick="window.location='<?php echo SERVER ?>registrarDr2Especialista.php'">Siguiente</button>
	 </div>
     <div class="alert alert-danger mensaje_form" style="display: none" id="error1">
		<button data-dismiss="alert" class="close" type="button">x</button>
		<strong>MENSAJE!</strong> <span class="textmensaje">Debe colocar su curriculum vitae</span>
	 </div>
	 <div class="alert alert-success mensaje_form" style="display: none" id="mensaje">
		<button data-dismiss="alert" class="close" type="button">x</button>
		<strong>MENSAJE!</strong> <span class="textmensaje">Registro exitoso</span>
	 </div>
</div><!--cierre de spam de formulario !-->
<div class="span6">
<p align="justify">Por Ejemplo: 
      </p>
                  <h3>Especialidades </h3>
                  <ul>
                    <li>Internista </li>
                  </ul>
                  <h3>Educación </h3>
                  <ul>
                    <li>Escuela de Medicina - Univ Lisandro Alvarado </li>
                    <li>Hosp Domingo Luciani, Postgrado en Medicina Interna </li>
                    <li>UCV Facultad de ciencias, Residente en el clinico Univ </li>
                  </ul>
      <h3>Otros cursos realizados</h3>
                    <p>                    Año 2010<br />
      ·         V Congreso Venezolano de Médicos Generales Hotel Alba Caracas del 2 al 6 de Marzo 2010<br />
      ·         X Curso Internacional Actualización en Diabetes Mellitus, Temas Relevantes en el manejo del Paciente con Diabetes. Hotel Eurobuilding Caracas del 25 al 27 de Abril 2010<br />
      ·      XVI Congreso Venezolano de Medicina Interna. Hotel Eurobuilding, Caracas del 19 al 22 de Mayo 2010.<br />
      ·      ECOS de la American Diabetes Association Caracas Hotel Eurobuilding 14 de Agosto 2010<br />
      ·      XIV Congreso de la Asociación Latinoamericana de Diabetes del 7 al 11 de Noviembre 2010 Espacio Risco Santiago de Chile<br />
      AÑO 2011<br />
      ·      XVII Congreso Venezolano de Medicina Interna del 17 al 21 de Mayo 2011. Hotel Eurobuilding Caracas<br />
                    ·         I Congreso Conjunto EMDO Endocrinología, Metabolismo, Diabetes y Obesidad del 11 al 15 de Julio 2011. Palacios de los Eventos Maracaibo<br />
                    ·                    Taller de Pie Diabético Congreso EMDO Julio 2011 Maracaibo<br />
                    ·                    ECOS de la American Diabetes Association 30 de Julio Caracas Hotel Eurobuilding<br />
                    AÑO 2012<br />
                    ·                    72nd Scientific sessions American Diabetes Association Junio 8 al 12  Philadelphia EEUU 2012<br />
                    ·                    III Congreso de Fenadiabetes caracas 10 al 13 de Julio 2012<br />
                    ·                    Taller sobre Administración de Insulina en el marco del III Congreso de Fenadiabetes caracas 10 al 13 de Julio 2012<br />
                    ·                    Taller sobre impacto de las Bombas de Infusion en el control Glucémico en el marco del III Congreso de Fenadiabetes caracas 10 al 13 de Julio 2012<br />
                    ·                    XIII Jornadas cCientíficas ECOS ADA 28 de Julio 2012
    <h3>Reconocimientos</h3> </p>
    ·         Botón Honor al Mérito de la Sociedad Venezolana de Salud Pública 2005<br />
      ·         Mención Especial otorgada por ASOCOMERCIO San Félix en Ciudad Guayana 23 de Noviembre 2006
                    </p>
<p>- Mencion Especial otorgada por la Camara de Comercio de Caroni Estado Bolívar en Puerto Ordaz 12 de Diaciembre 2008</p>
                  <p>- Mencion Especial otorgada por la Camara de Comercio de Caroni Estado Bolívar en Puerto Ordaz 17 de Noviembre 2011<br />
                  </p>
</div>
    </div>         
  </section>
    <!-- .................................... $footer .................................... -->
  <?php include "headers/otrofooter.php"; ?>