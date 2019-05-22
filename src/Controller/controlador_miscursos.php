<?php
    include_once($_SERVER["DOCUMENT_ROOT"] . "/src/Model/conexion.php");
    $operacion = $_POST['operacion'];
    switch ($operacion) {
      case 'get':
        //die(json_encode('$cursos_a'));
        session_start();
        $cursos_todos=$conexion->query("select cursos.idcurso, cursos.nombrecurso, cursos.imagen_curso , promedio , curso FROM cursos right join inscripcion_cursos on inscripcion_cursos.idcurso = cursos.idcurso where idusuario=".$_SESSION['id_sesion_usuario']." group by cursos.idcurso");
        while ($result=$cursos_todos->fetch_assoc()) {
            if ($result['promedio'] != 0) {
                $icono_examen='<i style="color:green; font-size: 22px" class="la la-check"></i>';
            } else {
                $icono_examen='<i style="color:red; font-size: 22px" class="la la-times"></i>';
            }
            if ($result['curso'] != 0) {
                $icono_curso='<i style="color:green; font-size: 22px" class="la la-check"></i>';
            } else {
                $icono_curso='<i style="color:red; font-size: 22px" class="la la-times"></i>';
            }

            if ($result['curso'] != 0 && $result['promedio'] != 0) {
                $estatus="Terminado";
            } else {
                $estatus="En curso";
            }
            //vista curso
            $vista_cursos='
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="blog-post">
                    <div class="blog-post-thumb"> <a href="#" title=""><img src="/assets/images/cursos/'.$result['imagen_curso'].'" alt="" height="130" /></a></div>
                      <div class="blog-detail">
                          <ul class="blog-metas">
                            <li>Estatus : '.$estatus.' </li>
                          </ul>
                          <div class="row">
                            <div class="col-sm-8">
                              <h3 class="h3_xd"><a href="/view/cursos/detalle_curso.php?id='.$result['idcurso'].'" >'.$result['nombrecurso'].'</a></h3>
                            </div>
                            <div class="col-sm-2 listing-rate-share">
                              <a class="opc">
                                <i class="la la-gear"></i>
                              </a>
                            </div>
                          </div>
                          <div class="lista_opc" style="display:none">
                            <ul >
                              <li> '.$icono_curso.' <a href="/view/cursos/curso.php?id='.$result['idcurso'].'" >Revisar Material  </a></li>
                              <!-- <li><a href="/view/cursos/detalle_curso.php?id='.$result['idcurso'].'" >Actividades <i class="la la-gear"></i> </a></li> -->
                              <li>'.$icono_examen.' <a href="/view/cursos/examenes_cursos.php?id='.$result['idcurso'].'" >Examen </a></li>
                            </ul>
                          </div>
                      </div>
                    </div><!-- Blog Post  -->
                  </div>
                </div>
            ';
            $cursos_a[]=$vista_cursos;
        }
        $conexion->close();
        die(json_encode($cursos_a));
        break;
    }
