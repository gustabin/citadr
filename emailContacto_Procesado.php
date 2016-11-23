<?php 
include "lib/corelib.php";

include "headers/header.php";
?>
  
  <!-- .................................... $breadcrumb .................................... -->
  <section class="section-breadcrumb section-color-graylighter">
    <div class="container">
      <ul class="breadcrumb">
        <li><a href="index.php">Inicio</a><span class="divider">/</span></li>
        <li class="active">Contacto</li>
      </ul>
    </div>
  </section>
  <!-- .................................... $Contact .................................... -->
  <section class="section-content section-contact" id="section-contact">
    <div class="container">
      <div class="row">
        <div class="span4">
          <h2 class="section-title">
            Email de contacto enviado
            <small>Ya hemos recibido tu información</small><br>
			<h4>Pronto uno de nuestros operadores te contactará.<br><br>
				El equipo de citadr.
			</h4>
          </h2>
        </div>
        <div class="span4 offset1">
          <div class="media">            
              <img src="<?php echo INCLUDES ?>img/emailEnviado.png">            
          </div>         
        </div>        
      </div>    
    </div>
  </section>
  

    <!-- .................................... $footer .................................... -->
  <?php include "headers/otrofooter.php"; ?>