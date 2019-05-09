<?php
    session_start();
    if (!isset($_SESSION['alta_gastronomia_response']) && !isset($_SESSION["alta_gastronomia_files"])) {
        header("location: ../panel.php");
    }
    $data = array();
    $data = $_SESSION['alta_gastronomia'];
    $data2 = $_SESSION['alta_gastronomia_response'];
    unset($_SESSION['alta_gastronomia_response']);
    $files =  array();
    $files = $_SESSION['alta_gastronomia_files'];
    unset($_SESSION['alta_gastronomia_files']);
    unset($_SESSION['alta_gastronomia']);
    $target_dir_portada = "/assets/images/gastronomia/portada_gastronomia/";
    $target_dir_galeria = "/assets/images/gastronomia/galeria_gastronomia/";
?>
<!DOCTYPE html>
<html lang="es" >
  <head>

    <?php include_once('../../common/head.php'); ?>
    <link rel="stylesheet" href="assets/css/style_steps.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" talta_actividadype="text/css" media="screen" href="assets/css/bootstrap-datepicker3.standalone.min.css">
    <link rel="stylesheet" href="assets/css/swiper_css/swiper.css">

    <style>
        header.on-top {
            position: relative;
        }
    </style>

  </head>

  <body>

        <div class="page-loading">
            <div class="loadery"></div>
        </div>
        <div class="theme-layout">

            <?php include_once('../../common/menu.php'); ?>

            <section>
              <div class="block no-padding">
                  <div class="container">
                      <div class="row">
                          <div class="col-md-12">
                              <div class="inner-header">
                                  <h2>Datos registrados</h2>
                                  <ul class="breadcrumbs">
                                      <li><a href="index.php" title="">Inicio</a></li>
                                      <li><a href="experiencias-form.php" title="">Gastronomía</a></li>
                                      <li>Formulario de Gastronomía</li>
                                  </ul>
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
                            <div class="col-md-10 col-md-offset-1">
                              <div class="shoping-detail-sec">

                                              <div class='col-md-12'>
                                                  <h3>Información personal/empresa</h3>
                                              </div>
                                              <div class='col-md-12'>
                                                <?php if (empty($data['nombre_empresa']) && empty($data['giro_empresa']) && empty($data['tel_oficina']) && empty($data['pagina_web'])) {
    ?>
                                                <p class='titulo_label col-md-4 col-sm-6 col-xs-12'> No hay información disponible </p>
                                                <?php
} else {
        ?>
                                                <p class='titulo_label col-md-4 col-sm-6 col-xs-12'>Nombre de la empresa: <span class='span_texto_registrado'> <?= $data['nombre_empresa'] ?> </span></p>
                                                <p class='titulo_label col-md-4 col-sm-6 col-xs-12'>Giro de la empresa: <span class='span_texto_registrado'> <?= $data['giro_empresa'] ?> </span></p>
                                                <p class='titulo_label col-md-4 col-sm-6 col-xs-12'>Teléfono oficina: <span class='span_texto_registrado'> <?= $data['tel_oficina'] ?> </span></p>
                                                <p class='titulo_label col-md-4 col-sm-6 col-xs-12'>Página web: <span class='span_texto_registrado'> <?= $data['pagina_web'] ?> </span></p>
                                                <?php
    } ?>
                                              </div>



                                            <hr class='hr_style'><br>
                                              <div class='col-md-12'>
                                                  <h3>Información de la experiencia</h3>
                                              </div>
                                              <div class='col-md-12'>
                                                <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Nombre de la experiencia: <span class='span_texto_registrado'> <?= $data['nombre_gastronomia'] ?> </span></p>
                                                <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Precio por persona: <span class='span_texto_registrado'> <?= $data['precio_persona'] ?> </span></p>
                                                <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Moneda: <span class='span_texto_registrado'> <?= $data['moneda'] ?> </span></p>
                                                <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Fecha: <span class='span_texto_registrado'> <?= $data['fecha'] ?> </span></p>
                                                <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Hora de entrada: <span class='span_texto_registrado'> <?= $data['hora_entrada'] ?> </span></p>
                                                <p class='titulo_label col-md-6 col-sm-6 col-xs-12'>Tipo de Comida: <span class='span_texto_registrado'> <?= $data2['nombre_comida'] ?> </span></p>
                                                <p class='titulo_label col-md-6 col-sm-6 col-xs-12'>Tipo de experiencia: <span class='span_texto_registrado'> <?= $data2['nombre_exp'] ?> </span></p>
                                                <p class='titulo_label col-md-6 col-sm-6 col-xs-12'>Minimo de Huéspedes: <span class='span_texto_registrado'> <?= $data['min_huespedes'] ?> </span></p>
                                                <p class='titulo_label col-md-6 col-sm-6 col-xs-12'>Maximo de Huéspedes: <span class='span_texto_registrado'> <?= $data['max_huespedes'] ?> </span></p>
                                                <p class='titulo_label col-md-6 col-sm-6 col-xs-12'>¿Permiten niños?: <span class='span_texto_registrado'> <?= ($data['ninos']=='si'?'Sí':'No') ?> </span></p>
                                              </div>

                                            <hr class='hr_style'><br>
                                             <div class='col-md-12'>
                                                  <h3>Descripción de la experiencia</h3>
                                              </div>
                                              <div class='col-md-12'>
                                                <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Menu: <span class='span_texto_registrado'> <?= $data['menu'] ?> </span></p>
                                                <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Descripción: <span class='span_texto_registrado'> <?= $data['descripcion_experiencia'] ?> </span></p>
                                                <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Bebidas: <span class='span_texto_registrado'> <?= $data['bebidas'] ?> </span></p>
                                                <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Dieta especial: <span class='span_texto_registrado'> <?= $data['dieta'] ?> </span></p>
                                                <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Requisitos: <span class='span_texto_registrado'> <?= $data['requisitos'] ?> </span></p>
                                                <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Política de cancelación: <span class='span_texto_registrado'> <?= $data['politica'] ?> </span></p>
                                                <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Requisitos: <span class='span_texto_registrado'> <?= $data['requisitos'] ?> </span></p>
                                                <div class='col-md-12'>
                                                  <h4>Servicios</h4>
                                                </div>
                                                    <ul>
                                                   <?php
                                                      for ($i=0; $i < count($data2['nombre_ser']) ; $i++) {
                                                          echo "<li>".$data2['nombre_ser'][$i]."</li>";
                                                      }
                                                   ?>
                                                   </ul>
                                              </div>
                                            <hr class='hr_style'><br>
                                            <div class='col-md-12'>
                                                <h3>Dirección de la actividad</h3>
                                            </div>
                                            <div class='col-md-12'>
                                                <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Dirección completa: <span class='span_texto_registrado'> <?= $data['direccion_larga'] ?> </span></p>
                                                <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Numero: <span class='span_texto_registrado'> <?= $data['numero_calle'] ?> </span></p>
                                                <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Calle, colonia: <span class='span_texto_registrado'> <?= $data['calle_colonia'] ?> </span></p>
                                                <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Ciudad: <span class='span_texto_registrado'> <?= $data['ciudad'] ?> </span></p>
                                                <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Estado: <span class='span_texto_registrado'> <?= $data['estado'] ?> </span></p>
                                                <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Pais: <span class='span_texto_registrado'> <?= $data['pais'] ?> </span></p>
                                                <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Codigo postal: <span class='span_texto_registrado'> <?= $data['cp'] ?> </span></p>
                                                <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Descripción de la dirección: <span class='span_texto_registrado'> <?= $data['desc_ubicacion'] ?> </span></p>
                                                <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Nombre edificio: <span class='span_texto_registrado'> <?= $data['nombre_edificio'] ?> </span></p>
                                                <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Num. interior: <span class='span_texto_registrado'> <?= $data['num_int'] ?> </span></p>
                                                <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Num. apartamento: <span class='span_texto_registrado'> <?= $data['numero_apartamento'] ?> </span></p>
                                            </div>
                                            <div class='col-md-12'>
                                                <h3>Mapa</h3>
                                            </div>
                                            <div class='col-md-12'>
                                              <div id="map" style="height: 400px">

                                              </div>
                                            </div>

                                      <hr class='hr_style'><br>
                                              <div class='col-md-12'>
                                                <h3>Foto de Portada</h3>
                                              </div>
                                              <br>
                                                <div class='col-md-3 col-sm-6 col-xs-12'>
                                                  <img class='thumb' src=' <?php echo $target_dir_portada.$data2['imagen_portada']; ?> '><br>
                                                  <span class='span_texto_registrado'> <?php echo $files['foto_portada']['name']; ?> </span><br><br>
                                                </div>
                                            <hr class='hr_style'><br>
                                              <div class='col-md-12'>
                                                <h3>Fotos de galería</h3>
                                              </div>
                                              <br>
                                                <?php
                                                  // Cargar imagenes de actividades
                                                for ($i = 0 ; $i < count($data2["imagen_galeria"]) ; $i++) {
                                                    ?>
                                                  <div class='col-md-3 col-sm-6 col-xs-12'>
                                                    <img class='thumb' src=' <?php echo $target_dir_galeria.$data2["imagen_galeria"][$i]; ?> '><br>
                                                    <span class='span_texto_registrado'> <?php echo $files['fotos_gastronomia']['name'][$i]; ?> </span><br><br>
                                                  </div>
                                                <?php
                                                } // Fin For imagenes actividades
                                                ?>
                                            <hr class='hr_style'><br>

                                            <!-- <hr class='hr_style'><br> -->
                                              <div class='col-md-6 col-md-offset-4'>
                                                <div class='single-product-info'>
                                                  <a href='/view/anfitrion/panel.php' title=''><i class='la la-step-backward'></i>Terminar</a>
                                                </div>
                                              </div>
                                              <br><br>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

              <?php include_once('../../common/footer.php'); ?>

              <?php include_once('../../common/popups.php'); ?>

            </div>

            <!-- Script -->
            <?php include_once('../../common/script.php'); ?>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSnk9dEgww168WatGDK-FO9GHZ3WY7bRg&libraries=places&callback=initialize" async defer></script>
            <script type="text/javascript">
              function initialize() {
                initMap();
              }
              var lata = <?= $data["lat"] ?>;
              var lnga = <?= $data["lng"] ?>;

              function initMap() {
                map = new google.maps.Map(document.getElementById('map'), {
                  center: {lat: lata, lng: lnga},
                  zoom: 8,
                  streetViewControl: false
                });
                var myLatLng = {lat: lata, lng: lnga};
                var marker = new google.maps.Marker({
                  position: myLatLng,
                  map: map,
                  title: 'Alojamiento'
                });
                map.setZoom(18);
                map.setCenter(marker.getPosition());
              }



            </script>
 </body>

</html>
