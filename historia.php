<?php 
session_start();
include "lib/corelib.php";
require_once('tools/mypathdb.php');
error_reporting(0);
$_SESSION['valor'] = 12; //Activa la opcion del menu actual
include "headers/header.php"; 
?>
<script type="text/javascript" language="javascript" src="<?php echo INCLUDES ?>js/jquery.form.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo INCLUDES ?>js/si.files.js"></script>

<script Language="JavaScript">
	$(document).ready(function() {
		$('#titulo').html("Historias clinicas");
	});
	
    //FUNCIÓN ASIGNAR VALOR A ICONOS DEL DETALLE DE LA HISTORIA
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
		window.location.href='historiaParte1.php?id=' + id;
    }
	
	//FUNCIÓN PARA ELIMINAR
    function Eliminar(id) {
		window.location.href='eliminarHistoria.php?id=' + id;		
    }

</script>


<script type='text/javascript'>                             // tablesorter
    $(document).ready(function() {
        $("#sTable").tablesorter({
            headers: {
                3: {   
                    sorter: false
                }
            }
        });
    });
</script>
<script type = "text/javascript">                            // tablesorter pagination
$(document).ready(function() {
    $('#sTable').tablesorter().tablesorterPager({container: $("#pager")}); 
}); 
</script>
<script type="text/javascript">

    //Metodo para cargar los datos personales
    $("body").on('submit', '#formHistoria', function(event) {
		event.preventDefault()
		if ($('#formHistoria').valid()) {
			$.ajax({
				type: "POST",
				url: "historia_paciente.php",
				dataType: "json",
				data: $(this).serialize(),
				success: function(respuesta) {
					if (respuesta.error == 1) {
						$('#error1').show();
						setTimeout(function() {
						$('#error1').hide();
						}, 2000);
					}
					
					if (respuesta.exito == 1) {
						$('#exito1').show();
						setTimeout(function() {
						$('#exito1').hide();
						window.location.href='historia.php'; 
					  }, 1000);
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
        Pacientes del 
        <small>Doctor</small>
      </h2>
      </div>
  
  <!-- .................................... $Contenido .................................... -->
  <section class="section-content section-contact section-color-graylighter">
    <div class="container">
    	<div class="form-group col-md-12">
      		<form  method="post" name="formHistoria" id="formHistoria">
        		<div class="controls">
          			<input type="text" id="nombre" name="nombre" style="width: 20%;"  placeholder="Nombre del paciente / cédula" />	  
        		
           			<button id="search-btn" type="submit" name="submit" class="btn-main"><i class="icon-search"></i> Buscar </button>
      		</form>
      				<a href='historiaParte1.php'>
      				<button type="button" class="btn-main"><i class="icon-plus"></i> Nuevo </button>
      				</a> 
                    <a href='backup.php'>
      				<button type="button" class="btn-main"><i class="icon-download-alt"></i> Backup </button>
      				</a> 
            	</div>
  		</div>
    
            <div id="sresults" class="col-md-12">
   			<table id="sTable" class="tablesorter table table-bordered table-hover" style="border:1px solid #ECF0F1">
      			<thead>
        		<tr>
                    <td colspan="9" style="text-align: right">
                        <span class="span_required"id="ErrorBoton" style="display: none; font-size: 15px; float: left">
                            Por favor seleccione la historia que desea cambiar o eliminar
                        </span>
                        <span style="margin-right: 10px">                            
                            <i class="icon-large icon-edit" onclick="Error();" id="editar" style="cursor: pointer" title="Modificar"></i>
                        </span>
                        <span style="margin-right: 10px">
                            <i class="icon-large icon-trash" onclick="Error();" id="eliminar" style="cursor: pointer" title="Eliminar"></i>
                        </span>
                    </td>
                </tr>
                <tr>                    
                    <th width="50%" class="header" style="text-align: center">Paciente</th>
					<th width="40%" class="header" style="text-align: center">Email/Tlf</th>
                    <th width="10%" class="header" style="text-align: center">Seleccionar</th>
                </tr>
            </thead>
            <tbody id="contenido"> 
<?php
  	    $doc_id = $_SESSION['doc_id'];
		
		//================================================Recuperar registros tabla historia==================================================

		if (!empty($_SESSION['nombreCedula'])) 
		{	
			$nombre = $_SESSION['nombreCedula'];
			$query = ("SELECT * FROM tbl_historias WHERE his_doc_id= '$doc_id' AND his_nombre LIKE '%$nombre%' OR his_apellido LIKE '%$nombre%'");
			//echo $query;
		}
		else
		{
			$query = ("SELECT * FROM tbl_historias WHERE his_doc_id= '$doc_id'");
			//echo $query;
		}

		$resultadoHistoria=mysql_query($query,$dbConn);
        while($data_his=mysql_fetch_array($resultadoHistoria))
      {
		$userID = $data_his['his_id_user'];
		$nombre_Paciente = $data_his['his_nombre'];
		$apellido_Paciente = $data_his['his_apellido'];
		$telefono = $data_his['his_telefono'];
  
		//================================================Recuperar registros tabla usuarios==================================================
		$query = ("SELECT * FROM tbl_usuarios WHERE us_id = '$userID'");
		//echo $query;
		$resultado3=mysql_query($query,$dbConn);
        $data_us=mysql_fetch_array($resultado3);
		$email = $data_us['us_email'];
	    ?>
        		<tr>
            		<td><?php echo $nombre_Paciente." ". $apellido_Paciente;?></td>
            		<td><?php echo $email." ".	$telefono ?></td>
                  	<td style="text-align: center">
                      <input type="radio" name="his_cita" id="his_cita" value="<?php echo $data_his['his_id'] ?>" onclick="ValorIconos(this.value)">
                  	</td>
                  </tr>
        <?php } // fin del bucle de instrucciones

mysql_free_result($result1); // Liberamos los registros
?>

            </tbody>
          </table>
           <!-- pager -->
    <div id="pager" class="pager">
      <form>
        <input class="pagedisplay" readonly type="text">
        <button type="button" class="btn-main first"><i class="icon-fast-backward"></i></button>
        <button type="button" class="btn-main prev"><i class="icon-backward"></i></button>
        <button type="button" class="btn-main next"><i class="icon-forward"></i></button>
        <button type="button" class="btn-main last"><i class="icon-fast-forward"></i></button>

        <select class="styled-select pagesize" style="height:30px; width:auto">
          <option selected="selected" value="10">10</option>
          <option value="20">20</option>
          <option value="30">30</option>
          <option value="50">50</option>
        </select>
      </form>
    </div>
    </div>
    </div>
  </section>
    <!-- .................................... $footer .................................... -->
  <?php include "headers/otrofooter.php"; ?>