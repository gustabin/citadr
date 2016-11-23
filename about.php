<?php 
include "lib/corelib.php";
//$valor = 2; //Activa la opcion del menu actual
$_SESSION['valor'] = 2; //Activa la opcion del menu actual
include "headers/header.php";
?>
  <!-- .................................... $breadcrumb .................................... -->
  <section class="section-breadcrumb section-color-graylighter">
    <div class="container">
      <ul class="breadcrumb">
        <li><a href="index.php">Inicio</a><span class="divider">/</span></li>
        <li class="active">Nosotros</li>
      </ul>
    </div>
  </section>
  <!-- .................................... $About .................................... -->
  <section class="section-content section-about" id="section-about">
    <div class="container">
      <h2 class="section-title">
        Contacto directo, 
        <small>haz tu cita rápida y fácilmente</small>
      </h2>
      <div class="row">
        <div class="span4">
          <figure>
            <img alt="" src="<?php echo INCLUDES ?>img/gallery/team.jpeg">
          </figure>
        </div>
        <div class="span8">
          <blockquote>
            <p class="lead">Ya no hay que madrugar para una cita!</p>
          </blockquote>
          <div class="row">
            <div class="span4">              
			  <p>Antes de citadr.com, había que llamar con días o semanas de anticipación para reservar una cita y preguntar a los amigos para que te recomendaran un médico. Ahora puede hacerlo desde nuestra aplicación.</p>
            </div>
            <div class="span4">
              <p>Realiza reserva de citas con el médico, desde los dentistas hasta los dermatólogos, gratis y muy fácilmente, lo más importante conocer los horarios disponibles para las citas y escoger el que mejor se ajuste a tu necesidad.</p>
            </div>
			<div class="span4">
              <p>Este es el libro de citas de último minuto con el doctor cercano a tu localidad de acuerdo a la especialidad. No importa si tienes seguro médico o no. Escoje la forma de pago que gustes.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- .................................... $TEAM .................................... -->
  <section class="section-content section-team section-color-graylighter" id="section-team">
    <div class="container">
      <h2 class="section-title">
        Nuestro equipo
        <small>Nos esforzamos para brindarte el mejor servicio</small>
      </h2>
      <div class="row">
        <div class="span6">
          <div class="row">
            <div class="span2">
              <figure>
                <img alt="" src="<?php echo INCLUDES ?>img/people/tabincomics.png">
              </figure>
              <p class="btn-group">
                <a class="btn btn-squared btn-small" href="mailto:info@citadr.com">
                  <i class="icon-envelope"></i>
                </a>

                
              </p>
            </div>
            <div class="span3">
              <h5>Ing Gustavo Arias</h5>
              <p>Programador de la plataforma ayudando a darle a la gente el poder elegir la cita médica y estar conectado con su doctor. </p>
            </div>
          </div>
        </div>
        <div class="span6">
          <div class="row">
            <div class="span2">
              <figure>
                <img alt="" src="<?php echo INCLUDES ?>img/people/02sqr-s.jpg">
              </figure>
              <p class="btn-group">
                <a class="btn btn-squared btn-small" href="mailto:ventas@citadr.com">
                  <i class="icon-envelope"></i>
                </a>
                
                
              </p>
            </div>
            <div class="span3">
              <h5>Francisco Lago</h5>
              <p>Vendedor estrella, experto en llevarles la tecnología a los doctores y a los pacientes.</p>
            </div>
          </div>
        </div>
      </div>
      <br>
      <br>
      <!--<div class="row">
        <div class="span6">
          <div class="row">
            <div class="span2">
              <figure>
                <img alt="" src="<?php echo INCLUDES ?>img/people/03sqr-s.jpg">
              </figure>
              <p class="btn-group">
                <a class="btn btn-squared btn-small" href="#">
                  <i class="icon-envelope"></i>
                </a>
                <a class="btn btn-squared btn-small" href="#">
                  <i class="icon-facebook"></i>
                </a>
                <a class="btn btn-squared btn-small" href="#">
                  <i class="icon-linkedin"></i>
                </a>
              </p>
            </div>
            <div class="span3">
              <h5>Name Surname</h5>
              <p>Reiciendis deleniti iure repudiandae consectetur totam atque mollitia natus corporis doloremque fuga enim necessitatibus repellat nam molestias eos architecto alias.</p>
            </div>
          </div>
        </div>
        <div class="span6">
          <div class="row">
            <div class="span2">
              <figure>
                <img alt="" src="<?php echo INCLUDES ?>img/people/04sqr-s.jpg">
              </figure>
              <p class="btn-group">
                <a class="btn btn-squared btn-small" href="#">
                  <i class="icon-envelope"></i>
                </a>
                <a class="btn btn-squared btn-small" href="#">
                  <i class="icon-linkedin"></i>
                </a>
              </p>
            </div>
            <div class="span3">
              <h5>Name Surname</h5>
              <p>Odio et non rem consectetur ducimus obcaecati hic quas eveniet qui necessitatibus libero quibusdam quod aperiam laboriosam sit a nemo aut porro!</p>
            </div>
          </div>
        </div>
      </div>!-->
    </div>
  </section>
  <!-- .................................... $footer .................................... -->
  <?php include "headers/otrofooter.php"; ?>