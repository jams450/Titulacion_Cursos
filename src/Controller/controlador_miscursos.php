<?php
    include_once($_SERVER["DOCUMENT_ROOT"] . "/src/Model/conexion.php");
    $operacion = $_POST['operacion'];
    switch ($operacion) {
      case 'get':
        //die(json_encode('$cursos_a'));
        $cursos_todos=$conexion->query("select cursos.idcurso, cursos.nombrecurso, cursos.imagen_curso FROM cursos right join inscripcion_cursos on inscripcion_cursos.idcurso = cursos.idcurso group by cursos.idcurso");
        while ($result=$cursos_todos->fetch_assoc()) {

            //vista curso
            $vista_cursos='
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="blog-post">
                    <div class="blog-post-thumb"> <a href="#" title=""><img src="/view/images/'.$result['imagen_curso'].'" alt="" /></a></div>
                      <div class="blog-detail">
                          <ul class="blog-metas">
                            <li>Servicios Financieros</li>
                          </ul>
                          <h3><a href=/view/cursos/detalle_curso?id='.$result['idcurso'].'" >'.$result['nombrecurso'].'</a></h3>
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
