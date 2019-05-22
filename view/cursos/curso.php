<?php
  if (!isset($_GET)) {
      header("location: ../../index.php");
  } else {
      session_start();
      include_once($_SERVER["DOCUMENT_ROOT"] . "/src/Model/conexion.php");
      $curso=$conexion->query("select * from cursos where idcurso =". $_GET['id']);
      $encabezado="";
      if ($resul=$curso->fetch_assoc()) {
          $contenidos=$conexion->query("select tema, codigo, nombrecurso from contenido_curso join cursos on contenido_curso.idcurso = cursos.idcurso where cursos.idcurso=". $_GET['id']);

          $encabezado=$resul['nombrecurso'];
          $resumen=$resul['resumen'];
          $id_curso=$resul['idcurso'];
          $imagen_curso=$resul['imagen_curso'];
          $numero=1;
          while ($result=$contenidos->fetch_assoc()) {
              if ($numero==1) {
                  $tema1 = $result['tema'];
                  $contenido1=$result['codigo'];
              }
              if ($numero==2) {
                  $tema2 = $result['tema'];
                  $contenido2=$result['codigo'];
              }
              if ($numero==3) {
                  $tema3 = $result['tema'];
                  $contenido3=$result['codigo'];
              }
              if ($numero==4) {
                  $tema4 = $result['tema'];
                  $contenido4=$result['codigo'];
              }
              $numero=$numero+1;
          }
      }

      $curso=$conexion->query("select * from inscripcion_cursos where idusuario=".$_SESSION['id_sesion_usuario']." idcurso =". $_GET['id']);
      if ($resul=$curso->fetch_assoc()) {
          $curso_ter=$resul['curso'];
      }
      $conexion->close();
  }
?>
<!DOCTYPE html>

<head>
  <?php include_once('../common/head.php'); ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <link rel="stylesheet" href="assets/css/style_steps.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" media="screen" href="assets/css/bootstrap-datepicker3.standalone.min.css">
  <link rel="stylesheet" type="text/css" media="screen" href="assets/css/bootstrap-datetimepicker.min.css">
  <link rel="stylesheet" type="text/css" media="screen" href="assets/css/wickedpicker.min.css">
  <link rel="stylesheet" type="text/css" media="screen" href="assets/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" type="text/css" media="screen" href="assets/css/sweetalert2.min.css">

  <!-- Include multiselect CSS: -->
  <link rel="stylesheet" href="assets/css/bootstrap-multiselect.css" type="text/css" />
</head>

  <style media="screen">
  #foto_portada{
    background-repeat:no-repeat;
    background-size: cover;
    background-image: url('/assets/images/cursos/<?=$imagen_curso?>');
  }
  </style>

<body>
  <div class="page-loading">
    <div class="loadery"></div>
  </div>
  <div class="theme-layout">
    <?php include_once('../common/menu.php'); ?>
    <section class="gray">
      <div class="block remove-top">
        <div class="row">
          <div class="col-md-12">
            <div class="list-detail-sec">
              <div id="">
                <div class="row">
                  <div class="list-detail-box" id="foto_portada">
                    <div class="list-detail-info">
                      <h3 id="nombre_actividad"><?=$encabezado?></h3>
                      <br>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    </section>
    <section>
      <div class="block gray">
        <div class="container" id="formulario_vi">
          <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <div class="row">
                <div class="col-md-12">
                  <ul id="progressbar" style="padding-inline-start:16%;">
                    <li class="active">Informacion Curso</li>
                    <li><?=$tema1?></li>
                    <li><?=$tema2?></li>
                    <li><?=$tema3?></li>
                    <li><?=$tema4?></li>
                  </ul>
                </div>
              </div>
              <div class="checkout-sec">
                <form class="steps" id="form_alta_act" method="post" name="registro_actividad" action="/src/Controller/actividadController.php" enctype="multipart/form-data">
                  <div class="form-profile">
                    <!-- Información Empresa -->
                    <fieldset>
                      <div class="col-md-12">
                        <div class="inner-header">
                          <h2>Informacion Curso</h2>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <h3><?=$encabezado?></h3>
                      </div>
                      <div class="col-md-12">
                        <div class="dato_empresa">
                          <h4>Resumen</h4>
                          <div class="add-menu-restaurant">
                            <div class="menu-restaurant">
                              <div class="row">
                                <div class="col-md-12">
                                  <p><?=$resumen?></p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <h4>Temas</h4>
                      </div>
                      <div class="col-md-12">
                        <div class="dato_empresa">
                          <div class="add-menu-restaurant">
                            <div class="menu-restaurant">
                              <div class="row">
                                <div class="col-md-12">
                                  <ul>
                                    <li><?=$tema1?></li>
                                    <li><?=$tema2?></li>
                                    <li><?=$tema3?></li>
                                    <li><?=$tema4?></li>
                                  </ul>
                                </div>
                                <div class="col-md-12">
                                  <img src="assets/images/cursos/<?=$imagen_curso?>" width="100%" height="50%">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <input type="button" data-page="2" name="next" class="next action-button style_btn" value="Siguiente" />
                    </fieldset>
                    <!-- End Información Empresa -->
                    <!-- Información Empresa -->
                    <fieldset>
                      <div class="col-md-12">
                        <div class="inner-header">
                          <h2><?=$tema1?></h2>
                        </div>
                      </div>
                      <?=$contenido1?>
                      <input type="button" data-page="1" name="previous" class="previous action-button style_btn" value="Anterior" />
                      <input type="button" data-page="3" name="next" class=" next action-button style_btn" value="Siguiente" />
                    </fieldset>
                    <!-- End Información Empresa -->

                    <!-- Información Empresa -->
                    <fieldset>
                      <div class="col-md-12">
                        <div class="inner-header">
                          <h2><?=$tema2?></h2>
                        </div>
                      </div>
                      <?=$contenido2?>
                      <input type="button" data-page="2" name="previous" class="previous action-button style_btn" value="Anterior" />
                      <input type="button" data-page="4" name="next" class="next action-button style_btn" value="Siguiente" />
                    </fieldset>
                    <!-- End Información Empresa -->

                    <!-- Información Empresa -->
                    <fieldset>
                      <div class="col-md-12">
                        <div class="inner-header">
                          <h2><?=$tema3?></h2>
                        </div>
                      </div>
                      <?=$contenido3?>
                      <input type="button" data-page="3" name="previous" class="previous action-button style_btn" value="Anterior" />
                      <input type="button"  data-page="5" name="next" class="next action-button style_btn" value="Siguiente" />
                    </fieldset>
                    <!-- End Información Empresa -->

                    <!-- Información Empresa -->
                    <fieldset>
                      <div class="col-md-12">
                        <div class="inner-header">
                          <h2><?=$tema4?></h2>
                        </div>
                      </div>
                      <?=$contenido4?>
                      <input type="button" data-page="4" name="previous" class="previous action-button style_btn" value="Anterior" />
                      <?php
                        if ($curso_ter==0) {
                            echo '<input type="button" data-page="4" id="finalizar" class="action-button style_btn" value="Finalizar" />';
                        } else {
                            echo '<input type="button" id="regresar" class="action-button style_btn" value="Regresar" />';
                        }
                       ?>

                      <input type="hidden" name="id_curso" id="id_curso" value="<?=$id_curso?>">
                    </fieldset>
                    <!-- End Información Empresa -->

                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php include_once('../common/footer.php'); ?>
    <?php include_once('../common/popups.php'); ?>
  </div>
  <?php include_once('../common/script.php'); ?>

  <script type="text/javascript" src="assets/js/bootstrap-datepicker.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap-datepicker.es.min.js"></script>
  <script type="text/javascript" src="assets/js/wickedpicker.min.js"></script>
  <script type="text/javascript" src="assets/js/choosen.min.js"></script>
  <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="assets/js/dataTables.bootstrap.min.js"></script>
  <script type="text/javascript" src="assets/js/sweetalert2.min.js"></script>
  <!-- Include multipleselect JS: -->
  <script type="text/javascript" src="assets/js/bootstrap-multiselect.js"></script>
  <script type="text/javascript" src="src/js/cursos.js"></script>


</body>

</html>
