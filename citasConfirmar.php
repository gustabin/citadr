<?php 
session_start();
include "lib/corelib.php";
error_reporting(0);
require_once('tools/mypathdb.php');
$_SESSION['valor'] = 9; //Activa la opcion del menu actual
include "headers/header.php";
include "lib/class/classExtraer.php";
?>
<script Language="JavaScript">
	$(document).ready(function() {
		$('#titulo').html("Manejo de citas");		 
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
		window.location.href='reservarCita_validar.php?id=' + id;
    }
	
	//FUNCIÓN PARA ELIMINAR
    function Eliminar(id) {
		window.location.href='eliminarCita.php?id=' + id;		
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
        Listado de 
        <small>citas mádicas</small>
      </h2>
      </div>
  
  <!-- .................................... $Contenido .................................... -->
  <section class="section-content section-table section-color-graylighter">
    <div class="container">
      <div class="row">
        <div class="span3">
          <h3 class="section-title">
            Historico de citas
            <small>Estas son todas las citas que ha realizado en citadr</small>
          </h3>
        </div>
        <div class="span9">
          <table class="table table-striped table-condensed">
            
             <thead>
                <tr>
                    <td colspan="6" style="text-align: right">

                        <span class="span_required"id="ErrorBoton" style="display: none; font-size: 15px; float: left">
                            Por favor seleccione la cita que desea confirmar o eliminar
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
                    <th>Doctor</th>
                    <th>Teléfono</th>
                    <th>Día</th>
                    <th>Status</th>
                    <th style="text-align: center; width: 10%">Seleccionar</th>
                </tr>
            </thead>
            <tbody>
              <?php
			   //============================Buscar citas por confirmar ==============================
			   
			   	$userID = $_SESSION['user_id'];
			   	$query=("SELECT * from tbl_citas WHERE cit_pac_id= '$userID'");
				$resultado=mysql_query($query,$dbConn);
				while($data_cit=mysql_fetch_array($resultado))
				{
                    
					//================================================Recuperar registros tabla doctores==================================================
	$doc_id = $data_cit['cit_doc_id'];
	$query = mysql_query("SELECT * FROM tbl_doctores WHERE doc_id = '$doc_id'");
	
	$data_doc = mysql_fetch_array($query);	
	$nombreDr = $data_doc['doc_nombre'];
	$apellidoDr = $data_doc['doc_apellido'];
	$telefonoDr = $data_doc['doc_telefono'];
	$fotoDr= $data_doc['doc_foto'];
	?>
                    <tr>
                        <td><?php echo $nombreDr." ". $apellidoDr;?></td>
                        <td><?php echo $telefonoDr;?></td>
                        <td><?php echo $data_cit['cit_dia']." ".$data_cit['cit_fecha']." "?><?php echo ConvertirHoraAMPM($data_cit['cit_hora']);  ?></td>
                        <td style="text-align: center">
                            <?php if ($data_cit['cit_status'] == 1) { ?>
                                <img src="<?php echo INCLUDES ?>img/user_red.png"/ title="Sin confirmar">
                            <?php }
                            else { ?>
                                <img src="<?php echo INCLUDES ?>img/user_green.png"/ title="Confirmada">
                            <?php } ?>
                        </td>
                        <td style="text-align: center">
                            <input type="radio" name="id_cita" id="id_cita" value="<?php echo $data_cit['cit_id'] ?>" onclick="ValorIconos(this.value)">
                        </td>
                    </tr>
        <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
  
    <!-- .................................... $footer .................................... -->
  <?php include "headers/otrofooter.php"; ?>