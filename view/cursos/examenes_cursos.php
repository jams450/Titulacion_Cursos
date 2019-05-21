<?php
    if (!isset($_GET)) {
        header("location: ../../index.php");
    } else {
        session_start();
        include_once($_SERVER["DOCUMENT_ROOT"] . "/src/Model/conexion.php");
        $usuario=$conexion->query("select promedio from inscripcion_cursos where idcurso = ".$_GET['id']." and idusuario=".$_SESSION['id_sesion_usuario']);
        if ($result2=$usuario->fetch_assoc()) {
            $promedio=0;
            $examen=$conexion->query("select * from examenes_cursos join cursos on cursos.idcurso=examenes_cursos.idcurso where examenes_cursos.idcurso =". $_GET['id']);
            if ($result2['promedio']==0) {
                $encabezado="";
                if ($result=$examen->fetch_assoc()) {
                    $informacion_examen=$result;
                    $preguntas="";
                    $preguntas_examen=$conexion->query("select preguntas_cursos.pregunta, preguntas_cursos.respuesta1, preguntas_cursos.respuesta2, preguntas_cursos.respuesta3 from preguntas_cursos join examenes_cursos on preguntas_cursos.idexamen = examenes_cursos.idexamen WHERE examenes_cursos.idcurso=". $_GET['id']);
                    $numero=1;
                    while ($result=$preguntas_examen->fetch_assoc()) {
                        $preguntas.='
                          <div class="col-md-12 col-sm-12 col-xs-12">
                              <h4>'.$numero.'.   '.$result['pregunta'].'</h4><br>
                          </div>
                          <div class="row">
                              <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                                <label class="container_radio">'.$result['respuesta1'].'
                                  <input required type="radio" name="respuesta'.$numero.'" data-msg-required="Es necesario seleccionar una respuesta" value="1">
                                  <span class="checkmark"></span>
                                </label>
                              </div>
                              <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                                <label class="container_radio">'.$result['respuesta2'].'
                                  <input required type="radio" name="respuesta'.$numero.'" data-msg-required="Es necesario seleccionar una respuesta" value="2">
                                  <span class="checkmark"></span>
                                </label>
                              </div>
                              <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                                <label class="container_radio">'.$result['respuesta3'].'
                                  <input required type="radio" name="respuesta'.$numero.'" data-msg-required="Es necesario seleccionar una respuesta" value="3">
                                  <span class="checkmark"></span>
                                </label>
                              </div>
                          </div>

                          ';
                        $numero=$numero+1;
                    }
                }
            } else {
                $promedio=$result2['promedio'];
                $result=$examen->fetch_assoc();
                $informacion_examen=$result;
                $preguntas="";
                $preguntas.='
                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                    <h2>Examen Finalizado</h2><br>
                    <h4>Tu promedio fue de : '.$result2['promedio'].'</h4><br>
                </div>';
            }
        }


        $conexion->close();
    }
?>

     <!DOCTYPE html>

    <head>
      <?php include_once('../common/head.php');  ?>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      <style media="screen">
      .tema {
        color: #d90429;
        float: left;
        font-size: 21px;
        margin-right: 10px;
      }
      #foto_portada{
        background-repeat:no-repeat;
        background-size: cover;
        background-image: url('/assets/images/cursos/<?=$informacion_examen['imagen_curso']?>');
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
						  <h3 id="nombre_actividad"><?=$informacion_examen['encabezado']?></h3>
						  <br>
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
						<div>
							<div class="checkout-sec">
                  <form class="steps" method="post" id='examen' name="examen" action="/src/Controller/controlador_cursos.php" enctype="multipart/form-data">
                      <div class="form-profile">
											<fieldset>
												<?=$preguntas?>
                        <input type="hidden" name="curso" id="curso" value="<?=$_GET['id']?>">
												<input type="hidden" name="operacion" id="operacion" value="examen">
                        <?php
                          if ($promedio==0) {
                              echo '<button type="button" id="enviar_eval" name="enviar_eval" class="btn_guardar col-md-12 col-sm-12 col-xs-12" id="enviar_Eval">Enviar</button>';
                          } else {
                              echo '<div class="text-center"><button type="button" id="regresar" name="regresar" class="btn_guardar col-md-12 col-sm-12 col-xs-12" id="enviar_Eval">Regresar</button></div>';
                          }
                         ?>

											</fieldset>
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

      <!-- Script -->
      <?php include_once('../common/script.php'); ?>
      <script type="text/javascript" src="assets/js/choosen.min.js"></script><!-- Nice Select -->
      <script type="text/javascript" src="src/js/examenes_curso.js"></script><!-- Nice Select -->
    </body>

    </html>
