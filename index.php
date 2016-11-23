<?php 
session_start();
include "lib/corelib.php";
//$valor = 1; //Activa la opcion del menu actual
$_SESSION['valor'] = 1; //Activa la opcion del menu actual
include "headers/headerIndex.php";
include_once("analyticstracking.php");
?>
  
  <!-- .................................... $jumbotron .................................... -->
  <style type="text/css">
<!--

.verde {
	color: #114A61;
}
-->
  </style>

  <section class="section-content section-jumbotron" id="section-jumbotron">
    <div class="container">
      <div class="row">
        <div class="span5 offset1">
          <img alt="historia medica" src="<?php echo INCLUDES ?>img/ipad2.png">
        </div>
        <div class="span5 _offset1">
          <div class="slogan">
            <H1>cita medica</H1>
            <h1>solo mueve un dedo</h1>
            <p class="lead"><h2>y reserva tu cita médica</h2></p>
            <p> 
              <a class="btn btn-large btn-primary" href="login.php">Ingresar</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- .................................... $Services .................................... -->
  <section class="section-content section-services" id="section-services">
    <div class="container">
      <div class="row">
        <div class="span3">
          <h2 class="section-title">
            Sin esperas            
            <small>cita medica rápida y fàcil</small>
          </h2>
          <p>
            <a class="btn btn-small btn-primary" href="equipomedico.php">
              <i class="icon-search"></i>
              encuentra un doctor
            </a>
          </p>            
        </div>
        
        <div class="span9">
          <div class="row">
            <div class="span3">
              <div class="text-center">
                <figure>
					<a href="javascript:void(0)" class="hipervinculo">
						<i class="icon-time icon-8x icon-border"></i>
					</a>
                </figure>
                <h3 class="verde">
                  Sin madrugar
                </h3>
                <p>No tienes que madrugar para conseguir una cita medica, ni tienes que pedir números. </p>
              </div>
            </div>
            <div class="span3">
              <div class="text-center">
                <figure>
					<a href="javascript:void(0)" class="hipervinculo">
						<i class="icon-group icon-8x icon-border"></i>
					</a>
                </figure>				
                <h3 class="verde">
                Para todos
                </h3>
                <p>No importa si tienes seguro médico o no. Escoje la forma de pago que gustes.</p>
              </div>
            </div>
            <div class="span3">
              <div class="text-center">
                <figure>
					<a href="javascript:void(0)" class="hipervinculo">	
						<i class="icon-cloud-upload icon-8x icon-border"></i>
					</a>
                </figure>				
                <h3 class="verde">
                Haz una cita Online
                </h3>
                <p>Aqui puedes buscar un doctor cercano a tu localidad de acuerdo a la especialidad y reservar tus citas medicas online.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- .................................... $testimonials .................................... -->
  <section class="section-content section-testimonials section-color-white" id="section-testimonials">
    <div class="container">
      <h2 class="section-title">
        Reserva facilmente
        <small> tus citas médicas en línea</small>
      </h2>
      <div class="row">
        <div class="span3">
          <blockquote>
            <p>
              <i class="icon-quote-left icon-4x pull-left icon-muted"></i>
              Lo probe, busque, reserve y contacté a mi médico de una manera muy fácil, lo recomiendo 100%, ahora toda mi familia lo está usando, mi mamá está muy féliz, ya no tiene que madrugar.
            </p>
            <small>Lisbette Fernandez</small>
          </blockquote>
        </div>
        <div class="span3">
          <blockquote>
            <p>
              <i class="icon-quote-left icon-4x pull-left icon-muted"></i>
              Como médico me siento mucho más tranquilo en saber quienes son los pacientes que asisten a mi consulta y poder tener a la mano en cualquier lugar las historias medicas online, hoy estoy mas seguro porque uso citadr.com y no me canso de recomendarlo a mis colegas.
            </p>
            <small>Dr Pedro Luis Quiroga</small>
          </blockquote>
        </div>
        <div class="span3">
          <blockquote>
            <p>
              <i class="icon-quote-left icon-4x pull-left icon-muted"></i>
              Tener quien me ayude a organizar las consultas me ha resultado muy comodo, recibir pacientes por orden de llegada no es algo que como médico yo podia controlar.
            </p>
            <small>Dra Patricia Arismendi Ruiz</small>
          </blockquote>
        </div>
        <div class="span3">
          <blockquote>
            <p>
              <i class="icon-quote-left icon-4x pull-left icon-muted"></i>
              Me recomendaron este website y no lo podía creer, estoy sorprendida de lo fácil que es agendar una cita médica. Ahora dispongo de un directorio de médicos con todas las especialidades a mi alcance!
            </p>
            <small>Libia Hernadez de Bustamante</small>
          </blockquote>
        </div>
      </div>
    </div>
  </section>
  <!-- .................................... $news on carousel .................................... -->
  <section class="section-content section-news-on-carousel" id="section-news-on-carousel">
    <div class="container">
      <div class="row">
        <div class="span3">
          <h2 class="section-title">
            Doctores
            <small>Todas las especialidades a tu alcance</small>
          </h2>
          <p>
            <a class="btn btn-small btn-primary" href="equipomedico.php">
              <i class="icon-search"></i>
              Ver especialidades
            </a>
          </p>
        </div>
        <div class="span9">
          <div class="row">
            <div class="carousel carousel-mini slide" data-pause="true" id="myCarouselNews">
              <div class="carousel-nav">
                <div class="btn-group">
                  <a class="btn btn-link btn-small" data-slide="prev" href="#myCarouselNews">
                    <i class="icon-chevron-left"></i>
                  </a>
                  <a class="btn btn-link btn-small" data-slide="next" href="#myCarouselNews">
                    <i class="icon-chevron-right"></i>
                  </a>
                </div>
              </div>
              <div class="carousel-inner">
                <div class="item active">
                  <div class="span3">
                    <figure>
                        <img alt="historia medica" src="<?php echo INCLUDES ?>img/gallery/01rct-s3.jpg">
                    </figure>
                    <h4>
                      <font color="#1C7CA2">Historias medicas</font>
                    </h4>
                    <p>Manten un registro de tus historias medicas online, personaliza tu cuestionario de preguntas para que muestre solo los aspectos relevantes de tu especialidad.</p>                    
                  </div>
                  <div class="span3">
                    <figure>
						<img alt="historia medica" src="<?php echo INCLUDES ?>img/gallery/02rct-s.jpg">
                    </figure>
                    <h4>
                      <font color="#1C7CA2">Con tu Ipad</font>
                    </h4>
                    <p>Mantente en comunicación con tus pacientes y/o tu médico desde cualquier dispositivo portatil sin perder ningún detalle, cuidamos de ti y de nuestra apariencia en la web!</p>                    
                  </div>
                  <div class="span3">
                    <figure>
						<img alt="cita medica" src="<?php echo INCLUDES ?>img/gallery/03rct-s2.jpg"> 
                    </figure>
                    <h4>
						<font color="#1C7CA2">Desde la tablet</font>
                    </h4>
                    <p>Si prefieres la libertad que brinda la tecnología entonces citadr es para ti, revisa tus citas, fecha, hora, historia clinica, inclusive el motivo de las visitas.</p>                    
                  </div>
                </div>
                <div class="item">
                  <div class="span3">
                    <figure>
						<img alt="cita medica" src="<?php echo INCLUDES ?>img/gallery/04rct-s.jpg">
                    </figure>
                    <h4>
						<font color="#1C7CA2">Con el celular</font>
                    </h4>
                    <p>No tienes que esperar llegar a casa o la oficina para pautar una cita o buscar un médico especialista, desde tu teléfono celular puedes hacerlo con citadr.com</p>                    
                  </div>
                  <div class="span3">
                    <figure>
						<img alt="cita medica" src="<?php echo INCLUDES ?>img/gallery/05rct-s.jpg">
                    </figure>
                    <h4>
						<font color="#1C7CA2">En la computadora</font>
                    </h4>
                    <p>Chequea tu agenda y verifica todas tus citas médicas en la tranquilidad de tu escritorio, sabemos que eres exigente por eso en citadr.com hemos pensado en gente como tu.</p>                    
                  </div>
                  <div class="span3">
                    <figure>
						<img alt="cita medica" src="<?php echo INCLUDES ?>img/gallery/06rct-s.jpg">
                    </figure>
                    <h4>
						<font color="#1C7CA2">Fácil de usar</font>
                    </h4>
                    <p>Con un diseño minimalista enfocado en un ambiente amigable con interface intuitiva que permita a todos los usuarios interactuar lo más sencillo posible.</p>                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      

    </div>
  </section>

  <!-- .................................... $footer .................................... -->
  <?php include "headers/otrofooter.php"; ?>