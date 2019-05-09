<?php
    session_start();
    if (!isset($_SESSION['alta_actividad']) && !isset($_SESSION["alta_actividad_files"])) {
        //header("location: ../panel.php");
    }
    $data = array();
    $data = $_SESSION['alta_actividad'];
    unset($_SESSION['alta_actividad']);
    $files =  array();
    $files = $_SESSION['alta_actividad_files'];
    unset($_SESSION['alta_actividad_files']);
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
                                      <li><a href="experiencias-form.php" title="">Experiencias</a></li>
                                      <li>Formulario de Experiencias</li>
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
                                                <?php} else {?>
                                                <p class='titulo_label col-md-4 col-sm-6 col-xs-12'>Nombre de la empresa: <span class='span_texto_registrado'> <?= $data['nombre_empresa'] ?> </span></p>
                                                <p class='titulo_label col-md-4 col-sm-6 col-xs-12'>Giro de la empresa: <span class='span_texto_registrado'> <?= $data['giro_empresa'] ?> </span></p>
                                                <p class='titulo_label col-md-4 col-sm-6 col-xs-12'>Teléfono oficina: <span class='span_texto_registrado'> <?= $data['tel_oficina'] ?> </span></p>
                                                <p class='titulo_label col-md-4 col-sm-6 col-xs-12'>Página web: <span class='span_texto_registrado'> <?= $data['pagina_web'] ?> </span></p>
                                                <?php
} ?>
                                              </div>



                                            <hr class='hr_style'><br>
                                              <div class='col-md-12'>
                                                  <h3>Información de la actividad</h3>
                                              </div>
                                              <div class='col-md-12'>
                                                <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Nombre de la actividad: <span class='span_texto_registrado'> <?= $data['nombre_actividad'] ?> </span></p>
                                                <p class='titulo_label col-md-6 col-sm-6 col-xs-12'>Tipo de Actividad: <span class='span_texto_registrado'> <?= $data['tipo_actividad_nom'] ?> </span></p>
                                                <p class='titulo_label col-md-6 col-sm-6 col-xs-12'>¿Cuántas personas adultas?: <span class='span_texto_registrado'> <?= $data['adultas'] ?> </span></p>
                                                <p class='titulo_label col-md-6 col-sm-6 col-xs-12'>¿Permiten niños?: <span class='span_texto_registrado'> <?= ($data['child']=='on'?'Sí':'No') ?> </span></p>
                                              </div>

                                            <hr class='hr_style'><br>
                                             <div class='col-md-12'>
                                                  <h3>Descripción de la actividad</h3>
                                              </div>
                                              <div class='col-md-12'>
                                                <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Descripción de la experiencia: <span class='span_texto_registrado'> <?= $data['descripcion_experiencia'] ?> </span></p>
                                                <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>¿Qué servicios incluye?: <span class='span_texto_registrado'> <?= $data['servicios_incluye'] ?> </span></p>
                                                <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Acerca del lugar: <span class='span_texto_registrado'> <?= $data['acerca_lugar'] ?> </span></p>
                                                <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>¿Quién puede apuntarse?: <span class='span_texto_registrado'> <?= $data['apuntarse'] ?> </span></p>
                                                <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Notas adicionales: <span class='span_texto_registrado'> <?= $data['notas_adicionales'] ?> </span></p>
                                                <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Política de cancelación: <span class='span_texto_registrado'> <?= $data['politica'] ?> </span></p>

                                                <!-- <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>¿Qué haremos durante la experiencia?: <span class='span_texto_registrado'> <?= $data['durante_experiencia'] ?> </span></p> -->
                                                <!-- <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>¿A que otros servicios tienen acceso los contratantes?: <span class='span_texto_registrado'> <?= $data['servicios_acceso'] ?> </span></p> -->
                                                <div class='col-md-12'>
                                                  <h4>Requisitos</h4>
                                                </div>
                                                <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Requisitos: <span class='span_texto_registrado'> <?= $data['requisitos'] ?> </span></p>
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

                                      <hr class='hr_style'><br>
                                              <div class='col-md-12'>
                                                <h3>Foto de Portada</h3>
                                              </div>
                                              <br>
                                                <?php
                                                  // Cargar imagen de portada
                                                  $target_dir = "../../assets/images/actividades/portada_actividad/";
                                                  $prearg = explode('.', $files['foto_portada']["name"]);
                                                  $prearg2 = end($prearg);
                                                  $file_ext = strtolower($prearg2);
                                                  $date = str_replace('/', '-', $data['fecha_inicio'][0]);
                                                  $data['fecha_inicio'][0] =  date('Y-m-d', strtotime($date));
                                                  $prenombreImagen = $_SESSION['id_sesion_usuario'].str_replace("-", "", $data['fecha_inicio'][0]);
                                                  $nombreImagen =  "foto_portada_" . trim($prenombreImagen) . "." . $file_ext;
                                                  $target_file = $target_dir . $nombreImagen;
                                                ?>
                                                <div class='col-md-3 col-sm-6 col-xs-12'>
                                                  <img class='thumb' src=' <?php echo $target_file; ?> '><br>
                                                  <span class='span_texto_registrado'> <?php echo $files['foto_portada']['name']; ?> </span><br><br>
                                                </div>
                                            <hr class='hr_style'><br>
                                              <div class='col-md-12'>
                                                <h3>Fotos de galería</h3>
                                              </div>
                                              <br>
                                                <?php
                                                  // Cargar imagenes de actividades
                                                  for ($i = 0 ; $i < count($files["fotos_actividades"]["name"]) ; $i++) {
                                                      $target_dir = "../../assets/images/actividades/galeria_actividad/";
                                                      $prearg = explode('.', $files['fotos_actividades']["name"][$i]);
                                                      $prearg2 = end($prearg);
                                                      $file_ext = strtolower($prearg2);
                                                      $date = str_replace('/', '-', $data['fecha_inicio'][0]);
                                                      $data['fecha_inicio'][0] =  date('Y-m-d', strtotime($date));
                                                      $prenombreImagen = $_SESSION['id_sesion_usuario']."_".str_replace("-", "", $data['fecha_inicio'][0]);
                                                      $nombreImagen =  "foto_geleria_" . $i . "_" . trim($prenombreImagen) . "." . $file_ext;
                                                      $target_file = $target_dir . $nombreImagen; ?>
                                                <div class='col-md-3 col-sm-6 col-xs-12'>
                                                  <img class='thumb' src=' <?php echo $target_file; ?> '><br>
                                                  <span class='span_texto_registrado'> <?php echo $files['fotos_actividades']["name"][$i]; ?> </span><br><br>
                                                </div>
                                                <?php
                                                  } // Fin For imagenes actividades
                                                ?>
                                            <hr class='hr_style'><br>
                                              <div class='col-md-12'>
                                                <h3>Configuración de precios</h3>
                                              </div>
                                              <br>
                                              <div class='col-md-12'>
                                                <p class='titulo_label col-md-12 col-sm-12 col-xs-12'>Días disponibles: <span class='span_texto_registrado'> <?= count($data["fecha_inicio"]) ?> </span></p>
                                                <?php
                                                 // Cargar fechas
                                                 for ($i = 0 ; $i < count($data["fecha_inicio"]) ; $i++) {
                                                     ?>
                                                <p class='titulo_label col-md-4 col-sm-6 col-xs-12'>Fecha de inicio: <span class='span_texto_registrado'> <?= $data["fecha_inicio"][$i] ?> </span></p>
                                                <p class='titulo_label col-md-4 col-sm-6 col-xs-12'>Hora de inicio: <span class='span_texto_registrado'> <?= $data["hora_inicio"][$i] ?> </span></p>
                                                <p class='titulo_label col-md-4 col-sm-6 col-xs-12'>Duración (horas): <span class='span_texto_registrado'> <?= $data["duracion_horas"][$i] ?> </span></p>
                                                <p class='titulo_label col-md-4 col-sm-6 col-xs-12'>Tarifa (por persona): <span class='span_texto_registrado'> <?= $data["tarifa_persona"][$i] ?> </span></p>
                                                <p class='titulo_label col-md-4 col-sm-6 col-xs-12'> <?= $data["desc_cargo"][$i] ?> <span class='span_texto_registrado'> <?= $data["cargo_adicional"][$i] ?> </span></p>
                                                <p class='titulo_label col-md-12 col-sm-12 col-xs-12'></p>
                                                <hr class='hr_style'>
                                                <?php
                                                 } // Fin For fechas
                                                ?>
                                              </div>
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
 </body>

</html>
