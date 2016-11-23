<?php 
include "lib/corelib.php";
$_SESSION['valor'] = 6; //Activa la opcion del menu actual
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
        <div class="span3">
          <h2 class="section-title">
            Contáctanos
            <small>También puedes llamarnos o escribirnos.</small>
          </h2>
            <figure>
					<a href="javascript:void(0)" class="hipervinculo">
						<i class="icon-stethoscope icon-8x icon-border"></i>
					</a>
                </figure>
        </div>
        <div class="span4 offset1">
          <div class="media">
            <figure class="pull-left">
              <img alt="" class="media-object" height="64" src="<?php echo INCLUDES ?>img/people/tabincomics.png" width="64">
            </figure>
            <div class="media-body">
              <h5 class="media-heading">Ing. Gustavo Arias</h5>
              <p>
                <i class="icon-envelope"></i>
                <a href="mailto:bill@company.com">info@citadr.com</a>
                <br>
                <i class="icon-phone"></i>
                <a href="tel:123-456-7890">(0424) 375-5128</a>
              </p>
            </div>
          </div>
          <!--<div class="media">
            <figure class="pull-left">
              <img alt="" class="media-object" height="64" src="<?php echo INCLUDES ?>img/people/02sqr-s.jpg" width="64">
            </figure>
            <div class="media-body">
              <h5 class="media-heading">Name Surname</h5>
              <p>
                <i class="icon-envelope"></i>
                <a href="mailto:admin@company.com">admin@company.com</a>
                <br>
                <i class="icon-phone"></i>
                <a href="tel:123-456-7890">(123) 456-7890</a>
              </p>
            </div>
          </div>!-->
        </div>
        <div class="span4">
          <div class="media">
            <figure class="pull-left">
              <img alt="" class="media-object" height="64" src="<?php echo INCLUDES ?>img/people/02sqr-s.jpg" width="64">
            </figure>
            <div class="media-body">
              <h5 class="media-heading">Francisco Lago</h5>
              <p>
                <i class="icon-envelope"></i>
                <a href="mailto:info@company.com">ventas@citadr.com</a>
                <br>
                <i class="icon-phone"></i>
                <a href="tel:123-456-7890">(0412) 444-4436</a>
              </p>
            </div>
          </div>
         
          <!--<div class="media">
            <figure class="pull-left">
              <img alt="" class="media-object" height="64" src="<?php echo INCLUDES ?>img/people/04sqr-s.jpg" width="64">
            </figure>
            <div class="media-body">
              <h5 class="media-heading">Name Surname</h5>
              <p>
                <i class="icon-envelope"></i>
                <a href="mailto:sale@company.com">sale@company.com</a>
                <br>
                <i class="icon-phone"></i>
                <a href="tel:123-456-7890">(123) 456-7890</a>
              </p>
            </div>
          </div>!-->
        </div>
        
      </div>
       <a href="terminos.php">Términos del Servicio y Políticas de Privacidad</a>
    </div>
  </section>
  

    <!-- .................................... $footer .................................... -->
  <?php include "headers/footer.php"; ?>