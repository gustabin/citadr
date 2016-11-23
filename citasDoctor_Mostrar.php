<?php 
session_start();
include "lib/corelib.php";
require_once('tools/mypathdb.php');

if (!empty($_SESSION['status'])) 
{
	$status = $_SESSION['status'];
	$doc_id = $_SESSION['doc_id'];
	$fecha= date("Y-m-d"); ;

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