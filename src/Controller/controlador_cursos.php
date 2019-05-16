<?php
    include_once($_SERVER["DOCUMENT_ROOT"] . "/src/Model/conexion.php");
    $operacion = $_POST['operacion'];
    switch ($operacion) {
      case 'get':
        $cursos_todos=$conexion->query("select cursos.*, avg(puntuacion) as puntuacion, count(idusuario) as cantidad_usuarios  FROM cursos left join inscripcion_cursos on inscripcion_cursos.idcurso = cursos.idcurso group by cursos.idcurso");
        while ($result=$cursos_todos->fetch_assoc()) {
            if ($result['puntuacion']==null) {
                $result['puntuacion']=3;
            }
            //vista puntuacion
            $vista_puntuacion='';
            for ($i=0; $i < $result['puntuacion']; $i++) {
                $vista_puntuacion.='<b class="la la-star"></b>';
            }
            for ($i=0; $i < 5-$result['puntuacion']; $i++) {
                $vista_puntuacion.='<b class="la la-star-o"></b>';
            }

            //vista curso
            $vista_cursos='
            <div class="col-md-4 col-sm-6 col-xs-12 bloque_curso" id="'.$result['nombrecurso'].'" >
              <div class="listing-box">
                <div class="listing-box-thumb">
                  <img src="/assets/images/cursos/'.$result['imagen_curso'].'" alt="">
                  <div class="listing-box-title">
                    <h3><a href="/view/cursos/detalle_curso?id='.$result['idcurso'].'" >'.$result['nombrecurso'].'</a></h3>
                    <span>'.$result['resumen'].'</span>
                  </div>
                </div>
                <div class="listing-rate-share">
                  <div class="rated-list">
                    '.$vista_puntuacion.'
                    <span>'.$result['cantidad_usuarios'].'</span>
                  </div>
                  <a href="/view/cursos/detalle_curso?id='.$result['idcurso'].'" ><i class="la la-eye"></i></a>
                </div>
              </div>
            </div>
            ';
            $cursos_a[]=$vista_cursos;
        }
        $conexion->close();
        die(json_encode($cursos_a));
        break;
    }
