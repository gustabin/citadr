<?php 
session_start();
include "lib/corelib.php";
require_once('tools/mypathdb.php');
include "lib/class/class.php";
error_reporting(0);
$_SESSION['valor'] = 12; //Activa la opcion del menu actual
include "headers/header.php";
if (!empty($_GET ['id'])) 	
	{
		$us_id = $_GET ['id'];	
	} 
?>
<script Language="JavaScript">
	$(document).ready(function() {
		$('#titulo').html("inicio / historia clinica / lista");
		//$('#contenido').load('registrarDrVista.php');		
		 
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
        <small>Completada</small>
      </h2>
      </div>
  
  <!-- .................................... $Contenido .................................... -->
  <section class="section-content section-contact section-color-graylighter">
    <div class="container">
      <div class="row">
        <div id="contenido">  
        <h5>Lista la historia</h5>
    
        </div>        
      </div>
    </div>
  </section>
  <?php  	//}    ?>
    <!-- .................................... $footer .................................... -->
  <?php include "headers/otrofooter.php"; ?>