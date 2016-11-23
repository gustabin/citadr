<?php 
session_start();
include "lib/corelib.php";
require_once('tools/mypathdb.php');
error_reporting(0);
$_SESSION['valor'] = 11; //Activa la opcion del menu actual
include "headers/header.php"; 
switch ($_SESSION['status']) {
    case 1:
        $statusDescripcion = "Pendientes";
        break;
    case 2:
        $statusDescripcion = "Confirmadas";
        break;
    case 3:
        $statusDescripcion = "Realizadas";
        break;
	case 4:
        $statusDescripcion = "No asistio";
        break;
    case 5:
        $statusDescripcion = "Borradas";
    	break;
	case 6:
        $statusDescripcion = "Todas";
    break;
	case 7:
        $statusDescripcion = "Para hoy";
    break;
}
?>
<script type="text/javascript" language="javascript" src="<?php echo INCLUDES ?>js/jquery.form.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo INCLUDES ?>js/si.files.js"></script>
<script src="<?php echo INCLUDES ?>js/sweet-alert.js"></script>
<link href="<?php echo INCLUDES ?>css/sweet-alert.css" rel="stylesheet">
<script Language="JavaScript">
	$(document).ready(function() {
		$('#titulo').html("Agenda médica");
	});
	
    //FUNCIÓN ASIGNAR VALOR A ICONOS DEL DETALLE DE LA FACTURA
    function ValorIconos(id) {
        $('#ErrorBoton').hide();
        $("#editar").attr("onclick", "Modificar(" + id + ");");
        $("#eliminar").attr("onclick", "Eliminar(" + id + ");");
    }
		 
	//FUNCIÓN ERROR BOTON
    function Error() {
        $('#ErrorBoton').show();	 
	}
	
	//FUNCIÓN PARA MODIFICAR
    function Modificar(id) {
		window.location.href='citasDoctor_Modificar.php?id=' + id;
    }
	
	//FUNCIÓN PARA ELIMINAR
    function Eliminar(id) {
		window.location.href='eliminarCitaDr.php?id=' + id;		
    }
	
	function changeHandler(id){
	window.location.href='citasDoctor_Procesar.php?id=' + id.value;
	//$('#contenido').load('citasDoctor_Mostrar.php');
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
        Citas del 
        <small>Doctor</small>
      </h2>
      </div>
  
  
  <!-- .................................... $Contenido .................................... -->
  <section class="section-content section-contact section-color-graylighter">
    <div class="container">
      <div id="content2">
		<h1 class="titlePage style3">Citas reservadas por los pacientes - <?php echo $statusDescripcion ?></h1>
		<div class="post">
            <div class="span9">
          <table class="table table-striped table-condensed">
             <thead>
             	<tr>
                	<td colspan="9" style="text-align: left">
                        <span style="margin-left: 10px">
                        
                        <form id="formStatus">
                        <label>Status de la cita
                          <select name="status" id="status" onchange="changeHandler(this);">
                            <option value="0"> Elija un status</option>
                            <option value="1"> Pendientes</option>
                            <option value="2"> Confirmadas</option>
                            <option value="3"> Realizadas</option>
                            <option value="4"> No asistio</option>
                            <option value="5"> Borradas</option>
                            <option value="6"> Todas</option>
                            <option value="7"> Hoy</option>
                          </select>
                        </label>
                        </form>
                        </span>
                	</td>
                </tr>
                <tr>
                    <td colspan="9" style="text-align: right">
                        <span class="span_required"id="ErrorBoton" style="display: none; font-size: 15px; float: left">
                            Por favor seleccione la cita que desea cambiar o eliminar
                        </span>
                        <span style="margin-right: 10px">                            
                            <i class="icon-large icon-edit" onclick="Error();" id="editar" style="cursor: pointer" title="Modificar"></i>
                        </span>
                        <span style="margin-right: 10px">
                            <i class="icon-large icon-trash" onclick="Error();" id="eliminar" style="cursor: pointer" title="Eliminar"></i>
                        </span>
                    </td>
                </tr>
                <tr class="active">
                    <th>Paciente</th>
                    <th>Email/Tlf</th>
                    <th>Tipo</th>
                    <th>Fecha/Hora</th>
                    <th>Motivo</th>
                    <th>Status</th>
                    <th style="text-align: center; width: 10%">Seleccionar</th>
                </tr>
            </thead>
            <tbody id="contenido"> 
            <?php
            if (!empty($_SESSION['status'])) 
{
	$status = $_SESSION['status'];
	$doc_id = $_SESSION['doc_id'];
	$fecha= date("Y-m-d");

	switch ($_SESSION['status']) 
	{
	  case 6:
		  $query=("select * from tbl_citas WHERE cit_doc_id= '$doc_id' AND cit_status<>5 order by cit_fecha DESC");
		  break;
	  case 7:
		  $query=("select * from tbl_citas WHERE cit_doc_id= '$doc_id' AND cit_fecha = '$fecha' order by cit_hora ASC");
		  break;
	  case 1 || 2 || 3 || 4 || 5:
		  $query=("select * from tbl_citas WHERE cit_doc_id= '$doc_id' AND cit_status= '$status' order by cit_fecha DESC");
		  break;
	}

      $resultado=mysql_query($query,$dbConn);
      while($data_cit=mysql_fetch_array($resultado))
      {
        $IDcita = $data_cit['cit_id']; 
		$userID = $data_cit['cit_pac_id'];
		$cita = $data_cit['cit_pin']; 
		$motivo = $data_cit['cit_motivo']; 	
		$tipo = $data_cit['cit_tipo']; 
		$status = $data_cit['cit_status'];
	  
		if ($tipo=='2') //1 nuevo, 2 paciente de esa consulta
				{ 
				  $tipoPaciente= "Paciente con historia clinica";
				}
				else
				{
				  $tipoPaciente= "Paciente Nuevo";
				}

		//================================================Recuperar registros tabla pacientes==================================================
		$query = mysql_query("SELECT * FROM tbl_pacientes WHERE pac_id_user = '$userID'");
		$data_pac = mysql_fetch_array($query);	
		$nombre_Paciente = $data_pac['pac_nombre'];
		$apellido_Paciente = $data_pac['pac_apellido'];
		$telefono = $data_pac['pac_telefono'];
  
		//================================================Recuperar registros tabla usuarios==================================================
		$query = mysql_query("SELECT * FROM tbl_usuarios WHERE us_id = '$userID'");
		$data_us = mysql_fetch_array($query);		
		$email = $data_us['us_email'];
	    ?>
        <tr>
            <td><?php echo $nombre_Paciente." ". $apellido_Paciente;?></td>
            <td><?php echo $email." ".	$telefono ?></td>
            <td><?php echo $tipoPaciente;?></td>
            <td><?php echo $data_cit['cit_dia']." ".$data_cit['cit_fecha']." ".$data_cit['cit_hora']; ?></td>
            <td><?php echo $motivo ?></td>
            <td style="text-align: center">
                <?php if ($data_cit['cit_status'] == 1) { ?>
                    <img src="<?php echo INCLUDES ?>img/user_red.png"/ title="Sin confirmar">
                <?php }
                     if ($data_cit['cit_status'] == 2) { ?>
                    <img src="<?php echo INCLUDES ?>img/user_green.png"/ title="Confirmada">
                <?php } 
                     if ($data_cit['cit_status'] == 3) { ?>
                     <span style="margin-right: 10px">
                        <i class="icon-large icon-thumbs-up" title="Realizada"></i>
                     </span>
                <?php } 
                     if ($data_cit['cit_status'] == 4) { ?>
                     <span style="margin-right: 10px">
                        <i class="icon-large icon-thumbs-down" title="No realizada"></i>
                     </span>
				<?php } 
                     if ($data_cit['cit_status'] == 5) { ?>
                     <span style="margin-right: 10px">
                        <i class="icon-large icon-remove-sign" title="No realizada"></i>
                     </span>
                <?php } ?>							
                  </td>                        
                  <td style="text-align: center">
                      <input type="radio" name="id_cita" id="id_cita" value="<?php echo $data_cit['cit_id'] ?>" onclick="ValorIconos(this.value)">
                  </td>
                  </tr>
        <?php } ?>
<?php  } ?>   
            </tbody>
          </table>
      </div>
			<h1>&nbsp;</h1>
	  </div>
  </div>
    </div>
  </section>
    <!-- .................................... $footer .................................... -->
  <?php include "headers/otrofooter.php"; ?>