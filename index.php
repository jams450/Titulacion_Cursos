<?php
    session_start();
?>
<!DOCTYPE html>

<head>
  <?php include_once('view/common/head.php'); ?>
  <style>
    .top-header {
      padding-top: 90px;
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
                <li><img src="assets/images/main_slider/home-banner6.jpg" alt="" /></li>
              </ul>
              <div class="mian-featured-area">
                <div class="main-featured-text">
                  <h1 style="color:#00171f">Cursos de educacion financiera AEF</h1>
                  <span style="color:#00171f; font-weight: bold;">Los mejores cursos al alcance de una Aplicación Web</span>
                </div>

                <div class="cat-lists">
                  <ul>
                    <li><a href="/view/cursos/detalle_curso.php?id=1" title="Tarjeta"><i class="la la-credit-card"></i><span style="color:#00171f;">Tarjeta de Crédito</span></a></li>
                    <li><a href="/view/cursos/detalle_curso.php?id=1" title="Ahorro"><i class="la la la-bank"></i><span style="color:#00171f;">Cuenta de Ahorro</span></a></li>
                    <li><a href="/view/cursos/detalle_curso.php?id=1" title="Seguros"><i class="la la la-shield"></i><span style="color:#00171f;">Seguros</span></a></li>
                  </ul>
                </div>
                <a style="color:#00171f;" class="arrow-down floating" href="#scroll-here" title=""><i style="color:#00171f;" class="la la-angle-down"></i></a>
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
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="dt-box">
                        <a href="/view/cursos/buscador_cursos.php" target="_self" title=""><img style="height: 400px;" src="assets/images/home/cursos.jpg" sy alt="" /><span>Ver Cursos</span></a>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="dt-box">
                        <a href="/view/registro_usuario.php" target="_self" title=""><img style="height: 330px;" src="assets/images/home/checklist.png" alt="" /><span>Registrarse</span></a>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="dt-box">
                        <a href="" target="_self" title=""><img src="assets/images/home/gastos.jpg" alt="" /><span>Control de Gastos Proximamente</span></a>
                      </div>
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
                      <p>Consulta, inscribe y atiende cualquiera de los cursos que esta plataforma ofrece sobre Servicios Financieros.</p>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="services">
                      <i class="la la-user"></i>
                      <h3>Registro</h3>
                      <p>Accede a tu cuenta o ingresa un nuevo usuario para poder empezar a emplear AEF.</p>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="services">
                      <i class="la la-money"></i>
                      <h3>Control de Gastos</h3>
                      <p>Maneja y administra de forma óptima los ingresos y/o gastos que vayan surgiendo, sea cual sea tu método de pago preferido (EN DESARROLLO).</p>
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
                  <h3>CURSOS</h3>
                  <span id="anfitriones">10</span>
                </div>
                <div class="counter">
                  <i class="la la-user"></i>
                  <h3>USUARIOS</h3>
                  <span id="usuarios">1543</span>
                </div>

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
