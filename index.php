<?php
    session_start();
?>
<!DOCTYPE html>

<head>
  <?php include_once('view/common/head.php'); ?>
  <style>
    .top-header {
      padding-top: 45px;
    }
  </style>
</head>

<body>

  <div class="page-loading">
    <div class="loadery"></div>
  </div>
  <div class="theme-layout">
    <?php include_once('view/common/menu.php'); ?>
    <section class="top-header">
      <div class="block no-padding">
        <div class="row">
          <div class="col-md-12">
            <div class="main-featured-sec">
              <ul class="featured-bg-slide">
                <li><img src="assets/images/main_slider/home-banner1.jpg" alt="" /></li>
                <li><img src="assets/images/main_slider/home-banner2.jpg" alt="" /></li>
                <li><img src="assets/images/main_slider/home-banner3.jpg" alt="" /></li>
                <li><img src="assets/images/main_slider/home-banner4.jpg" alt="" /></li>
                <li><img src="assets/images/main_slider/home-banner5.jpg" alt="" /></li>
                <li><img src="assets/images/main_slider/home-banner6.jpg" alt="" /></li>
              </ul>
              <div class="mian-featured-area">
                <div class="main-featured-text">
                  <h1>Cursos de educacion financiera AEF</h1>
                  <span>Algunos de los mejores cursos</span>
                </div>

                <div class="cat-lists">
                  <ul>
                    <li><a href="view/servicio-coche/coche.php" title="Tarjeta"><i class="la la-credit-card"></i><span>Tarjeta de credito</span></a></li>
                    <li><a href="view/servicio-gastronomia/gastronomia.php" title="Gastronomía"><i class="la la-spoon"></i><span>XXX</span></a></li>
                    <li><a href="view/servicio-actividad/actividad.php" title="Actividades"><i class="la la-photo"></i><span>XXX</span></a></li>
                    <li><a href="view/servicio-alojamiento/alojamiento.php" title="Alojamiento"><i class="la la-bed"></i><span>XXXX</span></a></li>
                  </ul>
                </div>
                <a class="arrow-down floating" href="#scroll-here" title=""><i class="la la-angle-down"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="scroll-here">
      <div class="block gray">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="heading">
                <h2>¿Qué te gustaría hacer?</h2>
              </div>
            </div>
            <div class="do-tonight-sec">
              <div class="row">
                <div class="col-md-8">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="dt-box">
                        <a href="view/servicio-alojamiento/alojamiento.php" target="_self" title=""><img src="assets/images/home/alojamiento.jpg" alt="" /><span>Ver Cursos</span></a>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="dt-box">
                        <a href="view/servicio-coche/coche.php" target="_self" title=""><img src="assets/images/home/compartir_coche.jpg" alt="" /><span>Registrarse</span></a>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="dt-box">
                        <a href="view/servicio-gastronomia/gastronomia.php" target="_self" title=""><img src="assets/images/home/gastronomia.jpg" alt="" /><span>Control de Gastos</span></a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="dt-box">
                    <a href="view/servicio-actividad/actividad.php" target="_self" title=""><img src="assets/images/home/aventura.jpg" alt="" /><span>XXXX</span></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="block gray remove-top">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="heading">
                <h2>Fácil y rápido de usar</h2>
              </div>
            </div>
            <div class="col-md-12">
              <div class="services-sec">
                <div class="row">
                  <div class="col-md-4">
                    <div class="services">
                      <i class="la la-paperclip"></i>
                      <h3>Cursos</h3>
                      <p>Tienes la opción de seleccionar entre alojamiento, compartir coche, ir a comer a la casa de algún anfitrión o reservar una actividad turística que puede ir desde escalar una montaña hasta tomar clases de fotografía.</p>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="services">
                      <i class="la la-map-marker"></i>
                      <h3>Hacer actividades</h3>
                      <p>Selecciona el lugar donde quieres realizar tu viaje.</p>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="services">
                      <i class="la la-tencent-weibo"></i>
                      <h3>Gastos</h3>
                      <p>Reserva fácilmente y paga de una manera ágil y segura.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="block dark">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="counter-sec">
                <div class="counter">
                  <i class="la la-file"></i>
                  <h3>ANFITRIONES</h3>
                  <span id="anfitriones"></span>
                </div>
                <div class="counter">
                  <i class="la la-user"></i>
                  <h3>USUARIOS</h3>
                  <span id="usuarios"></span>
                </div>
                <div class="counter">
                  <i class="la la-list"></i>
                  <h3>ACTIVIDADES</h3>
                  <span id="actividades"></span>
                </div>
                <div class="counter">
                  <i class="la la-folder-o"></i>
                  <h3>CATEGORÍAS</h3>
                  <span>4</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="block gray">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="heading">
                <h2>Artículos & Tips</h2>
                <span>Lee nuestras notas donde te daremos consejos para tus viajes y te diremos que nuevos lugares conocer.</span>
              </div>
              <div class="blog-sec">
                <div class="row">
                  <div class="col-md-4">
                    <div class="blog-post">
                      <div class="blog-post-thumb"> <a href="https://wejoytrip.com/blog/5-pueblos-magicos-escapar-del-estres-la-cdmx/" target="_blank" title=""><img class="img-responsive"
                            src="https://i2.wp.com/wejoytrip.com/blog/wp-content/uploads/2016/10/Cholula.jpg?w=1366" alt="" /></a></div>
                      <div class="blog-detail">
                        <ul class="blog-metas">
                          <li><a href="#" title="">10 Diciembre, 2018</a></li>
                          <li><a href="#" title="">PUEBLOS MÁGICOS</a></li>
                          <li><a href="#" title="">by Carlos Drombo</a></li>
                        </ul>
                        <h3><a href="https://wejoytrip.com/blog/5-pueblos-magicos-escapar-del-estres-la-cdmx/" target="_blank" title="">5 Pueblos Mágicos para escapar del estrés de la CDMX</a></h3>
                        <p>El fin de semana está a la vuelta de la esquina y nos ofrece una nueva oportunidad de divertirnos, descansar y liberarnos del estrés, y qué mejor manera que hacerlo con una escapada a un Pueblo Mágico, pero si te detiene la
                          distancia, no hay problema, tenemos para ti cinco maravillosas opciones que se encuentran a aproximadamente dos horas de la Ciudad de México. Así que es hora de preparar el auto y echar a andar la aventura...</p>
                        <a href="https://wejoytrip.com/blog/5-pueblos-magicos-escapar-del-estres-la-cdmx/" target="_blank" title="">MORE</a>
                      </div>
                    </div><!-- BLog Post  -->
                  </div>
                  <div class="col-md-4">
                    <div class="blog-post">
                      <div class="blog-post-thumb"> <a href="https://wejoytrip.com/blog/el-mole-oaxaqueno/" target="_blank" title=""><img class="img-responsive"
                            src="https://i1.wp.com/wejoytrip.com/blog/wp-content/uploads/2016/04/mole-negro001.jpg?w=400" alt="" /></a></div>
                      <div class="blog-detail">
                        <ul class="blog-metas">
                          <li><a href="#" title="">15 de diciembre de 2018</a></li>
                          <li><a href="#" title="">Traveling</a></li>
                          <li><a href="#" title="">by Carlos Drombo</a></li>
                        </ul>
                        <h3><a href="https://wejoytrip.com/blog/el-mole-oaxaqueno/" target="_blank" title="">El Mole Oaxaqueño</a></h3>
                        <p>Mole Oaxaqueño es uno de los platos más importantes y tradicionales de la cocina mexicana es el mole. Un producto representativo de la fusión de culturas ya que surgió en el virreinato, por ello, sus ingredientes provienen
                          de la cocina prehispánica y española. Históricamente el mole de mayor popularidad es el Poblano Rojo, sin embargo, es en el estado de Oaxaca donde existe mayor variedad de clases de Mole…</p>
                        <a href="https://wejoytrip.com/blog/el-mole-oaxaqueno/" target="_blank" title="">MORE</a>
                      </div>
                    </div><!-- BLog Post  -->
                  </div>
                  <div class="col-md-4">
                    <div class="blog-post">
                      <div class="blog-post-thumb"> <a href="https://wejoytrip.com/blog/10-cosas-guadalajara-la-perla-tapatia/" target="_blank" title=""><img class="img-responsive"
                            src="https://i1.wp.com/wejoytrip.com/blog/wp-content/uploads/2016/11/Teatro-Degollado.jpg?w=1422" alt="10 cosas que hacer en Guadalajara, la Perla Tapatía" /></a></div>
                      <div class="blog-detail">
                        <ul class="blog-metas">
                          <li><a href="#" title="">10 Diciembre, 2018</a></li>
                          <li><a href="#" title="">DESTINOS</a></li>
                          <li><a href="#" title="">by Carlos Drombo</a></li>
                        </ul>
                        <h3><a href="https://wejoytrip.com/blog/10-cosas-guadalajara-la-perla-tapatia/" target="_blank" title="">10 cosas que hacer en Guadalajara, la Perla Tapatía</a></h3>
                        <p>Guadalajara es una de las ciudades más hermosas y llenas de cultura que puede haber en México. Capital del estado de Jalisco, es famosa por su tequila, sus mariachis y sus charros, que hacen gala de la cultura nacional como
                          símbolo reconocible a nivel internacional. Durante todo el año es sede de múltiples festivales y fiestas que la convierten en una de las ciudades más visitadas por nacionales y extranjeros…</p>
                        <a href="https://wejoytrip.com/blog/10-cosas-guadalajara-la-perla-tapatia/" target="_blank" title="">MORE</a>
                      </div>
                    </div><!-- BLog Post  -->
                  </div>
                </div>
                <a href="https://wejoytrip.com/blog/" target="_blank" title="" class="view-all-blog">Ver Blog</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section style="display: none">
      <div class="block gray remove-top">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="heading">
                <h2>CATEGORÍAS</h2>
                <span>Visita nuestro blog donde encontrarás información de valor que hará de tu viaje una experiencia inolvidable.</span>
              </div>
              <div class="categories-sec">
                <div class="row">
                  <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="category-box">
                      <a href="#" title=""><img src="http://placehold.it/262x198" alt="" /></a>
                      <div class="category-box-detail">
                        <span><i class="la la-briefcase"></i></span>
                        <h3><a href="https://wejoytrip.com/blog/category/destinos/" target="_blank" title="Destinos">Destinos</a></h3>
                        <p>8 listings</p>
                      </div>
                    </div><!-- Category Box -->
                  </div>
                  <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="category-box">
                      <a href="#" title=""><img src="http://placehold.it/262x198" alt="" /></a>
                      <div class="category-box-detail">
                        <span><i class="la la-car"></i></span>
                        <h3><a href="https://wejoytrip.com/blog/category/gastronomia/" target="_blank" title="Gastronomía">Gastronomía</a></h3>
                        <p>8 listings</p>
                      </div>
                    </div><!-- Category Box -->
                  </div>
                  <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="category-box">
                      <a href="#" title=""><img src="http://placehold.it/262x198" alt="" /></a>
                      <div class="category-box-detail">
                        <span><i class="la la-bed"></i></span>
                        <h3><a href="https://wejoytrip.com/blog/category/rutas-turisticas/" target="_blank" title="Rutas turísticas">Rutas turísticas</a></h3>
                        <p>8 listings</p>
                      </div>
                    </div><!-- Category Box -->
                  </div>
                  <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="category-box">
                      <a href="#" title=""><img src="http://placehold.it/262x198" alt="" /></a>
                      <div class="category-box-detail">
                        <span><i class="la la-spoon"></i></span>
                        <h3><a href="https://wejoytrip.com/blog/category/pueblos-magicos/" target="_blank" title="Pueblos mágicos">Pueblos mágicos</a></h3>
                        <p>8 listings</p>
                      </div>
                    </div><!-- Category Box -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="block gray remove-top">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="subscribe-sec">
                <i class="la la-envelope-o"></i>
                <p>Suscríbase a nuestro newsletter</p>
                <form>
                  <input type="text" placeholder="Tu email" />
                  <button type="submit"><i class="la la-angle-right"></i></button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php include('view/common/footer.php'); ?>

    <?php include('view/common/popups.php'); ?>

    <!-- Muestra popup de Inicio de sesión  -->
    <?php
              if (isset($_SESSION['loginErrors'])) {
                  echo "
      						<script>
      							$(document).ready(function() {
      								$('.account-popup-sec').fadeIn('fast').addClass('active-login');
      							});
      						</script>
      						"; ?>
    <?php
              }
            ?>
    <!-- End Muestra popup de Inicio de sesión  -->
  </div>
  <?php
            //unset($_SESSION['loginErrors']);
        ?>
  <?php include_once('view/common/script.php'); ?>


</body>

</html>
