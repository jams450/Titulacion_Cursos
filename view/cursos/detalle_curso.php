<?php
    session_start();
    if (!isset($_GET)) {
        header("location: ../../index.php");
    } else {
        include_once($_SERVER["DOCUMENT_ROOT"] . "/src/Model/conexion.php");
        $cursos_todos=$conexion->query("select cursos.*, avg(puntuacion) as puntuacion, count(idusuario) as cantidad_usuarios  FROM cursos left join inscripcion_cursos on inscripcion_cursos.idcurso = cursos.idcurso where cursos.idcurso = " . $_GET['id']. " group by cursos.idcurso ");
        if ($result=$cursos_todos->fetch_assoc()) {
            $informacion_curso=$result;

            if ($informacion_curso['puntuacion']==null) {
                $informacion_curso['puntuacion']=3;
            }
            //vista puntuacion
            $vista_puntuacion='';
            for ($i=0; $i < $informacion_curso['puntuacion']; $i++) {
                $vista_puntuacion.='<b class="la la-star"></b>';
            }
            for ($i=0; $i < 5-$informacion_curso['puntuacion']; $i++) {
                $vista_puntuacion.='<b class="la la-star-o"></b>';
            }

            $vista_temas="";
            $cursos_info=$conexion->query("select * FROM contenido_curso where idcurso = " . $_GET['id']);
            while ($result=$cursos_info->fetch_assoc()) {
                $vista_temas.='
                  <div class="col-md-4 col-sm-6">
                    <span style="color:#d90429"><i class="la la-check-circle tema"></i>'.$result['tema'].'</span>
                  </div>
                ';
            }

            $vista_reviews="";
            $review_info=$conexion->query("select usuarios.idusuario,usuarios.nombre,usuarios.appat, puntuacion , comentario   FROM inscripcion_cursos  join usuarios on usuarios.idusuario = inscripcion_cursos.idusuario where idcurso= " . $_GET['id']);
            while ($result=$review_info->fetch_assoc()) {
                if (isset($_SESSION['id_sesion_usuario'])) {
                    if ($result['idusuario']==$_SESSION['id_sesion_usuario']) {
                        $ya_esta=true;
                    }
                }

                if ($result['puntuacion']==null) {
                    $vista_puntuacion_reviws='';
                    for ($i=0; $i < $result['puntuacion']; $i++) {
                        $vista_puntuacion_reviws.='<b class="la la-star"></b>';
                    }
                    for ($i=0; $i < 5-$result['puntuacion']; $i++) {
                        $vista_puntuacion_reviws.='<b class="la la-star-o"></b>';
                    }

                    $vista_reviews.='
                    <li>
                      <div class="review-list">
                        <div class="reviewer-info">
                          <h3>'.$result['nombre'].' '.$result['appat'].'</h3>
                          <p style="text-justify">'.$result['comentario'].'</p>
                        </div>
                        <div class="reviewer-stars">
                          '.$vista_puntuacion_reviws.'
                        </div>
                      </div>
                    </li>
                  ';
                }
            }
        }

        $conexion->close();
    }
?>
<!DOCTYPE html>

<head>
  <?php include_once('../common/head.php'); ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <style media="screen">
  .tema {
    color: #d90429;
    float: left;
    font-size: 21px;
    margin-right: 10px;
  }
  #foto_portada{
    background-image: url('/assets/images/cursos/<?=$informacion_curso['imagen_curso']?>');
    background-repeat:no-repeat;
    background-size: cover;

  }
  </style>
</head>

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
                      <h3 id="nombre_actividad"><?=$informacion_curso['nombrecurso']?></h3>
                      <br>
                      <div class="rated-list">
                        <?=$vista_puntuacion?>
                        <span>(<?=$informacion_curso['cantidad_usuarios']?>)</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <div class="link-bars">
                <div class="container">
                  <a href="#description" title="">Descripcion</a>
                  <a href="#meals" title="">Temas</a>
                  <a href="#hours" title="">Reviews</a>
                </div>
              </div>
              <div class="mian-listing-detail gray">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12 column">
                      <div class="description-detail-box" >
                        <h3 class="mini-title">DESCRIPCION</h3>
                        <div class="detail-descriptions">
                          <p class="text-justify"><?=$informacion_curso['resumen']?></p>
                        </div>
                      </div>

                      <div class="description-detail-box" >
                        <h3 class="mini-title">Temas</h3>
                        <div class="detail-descriptions">
                          <div class="amenities-sec" >
                            <?=$vista_temas?>
                          </div>
                        </div>
                      </div>

                      <div class="display-review-box" id="review">
                        <h3 class="mini-title">revıewS</h3>
                        <div class="review-list-sec">
                          <ul>
                            <?=$vista_reviews?>
                          </ul>
                        </div>
                      </div>
                      <div style="margin-top:20px; float:left">
                        <input type="hidden" name="curso" id="curso" value="<?=$_GET['id']?>">
                        <?php if (!isset($ya_esta)) {
    echo '<button class="write-review" id="inscribirse" type="submit">Inscribirse</button>';
} ?>

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
    <?php include_once('../common/footer.php'); ?>

    <?php include_once('../common/popups.php'); ?>

  </div>

  <!-- Script -->
  <?php include_once('../common/script.php'); ?>
  <script type="text/javascript" src="assets/js/choosen.min.js"></script><!-- Nice Select -->
  <script type="text/javascript" src="src/js/detalle_curso.js"></script><!-- Nice Select -->
</body>

</html>
