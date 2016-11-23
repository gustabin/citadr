<?php 
session_start();
include "lib/corelib.php";
require_once('tools/mypathdb.php');
include "lib/class/class.php";
include "lib/class/nombres.php";
error_reporting(0);
$_SESSION['valor'] = 5; //Activa la opcion del menu actual
include "headers/header.php";
?>

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
       		<div id="accordion">
				<h3>First</h3>
				<div>Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</div>
				<h3>Second</h3>
				<div>Phasellus mattis tincidunt nibh.</div>
				<h3>Third</h3>
				<div>Nam dui erat, auctor a, dignissim quis.</div>
			</div>
        </div>        
      </div>
    </div>
  </section>
  
  	<link href="includes/jquery-ui-1.11.1/jquery-ui.css" rel="stylesheet">
	<script src="includes/jquery-ui-1.11.1/jquery-ui.js"></script>
	<script src="includes/jquery-ui-1.11.1/jquery-ui.js"></script>
	<script>
		$( "#accordion" ).accordion();
	</script>
    <!-- .................................... $footer .................................... -->
	<?php include "headers/otrofooter.php"; ?>