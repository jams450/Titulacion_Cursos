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
<<<<<<< HEAD
                  <img src="/assets/images/cursos/'.$result['imagen_curso'].'" alt="" height="200" width="150">
=======
                  <img src="/assets/images/cursos/'.$result['imagen_curso'].'" style="height:250px" alt="">
>>>>>>> ee15912304dccfaee1802fa00a3eb0cf71f3a886
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

      case 'inscribir':
        session_start();
        if (isset($_SESSION['id_sesion_usuario'])) {
            $stmt=$conexion->prepare("insert into inscripcion_cursos values (?,?,NULL,NULL,NULL)");
            $stmt->bind_param("ii", $_POST['curso'], $_SESSION['id_sesion_usuario']);
            $stmt->execute();
            if ($stmt->affected_rows) {
                $msj="exito";
            } else {
                $msj="error";
            }
            $stmt->close();
            $conexion->close();
            die(json_encode($msj));
        } else {
            die(json_encode('no_login'));
        }
        break;

      case 'examen':
        session_start();
        if (isset($_SESSION['id_sesion_usuario'])) {
            $usuario=$conexion->query("select promedio from inscripcion_cursos where idcurso = ".$_POST['curso']." and idusuario=".$_SESSION['id_sesion_usuario']);
            if ($result=$usuario->fetch_assoc()) {
                if ($result['promedio']==0) {
                    $examen=$conexion->query("select correcta1, correcta2, correcta3, correcta4, correcta5, correcta6, correcta7, correcta8, correcta9, correcta10 from respuestas_examen where idcurso=".$_POST['curso']);
                    if ($result1=$examen->fetch_assoc()) {
                        $respuestas=$result1;
                        $calif=0;
                        for ($i=1; $i < 11 ; $i++) {
                            if ($respuestas['correcta'.$i] == $_POST['respuesta'.$i]) {
                                $calif = $calif + 1;
                            }
                        }

                        $stmt=$conexion->prepare("update inscripcion_cursos set promedio=? where  idcurso =? and idusuario=?");
                        $stmt->bind_param('iii', $calif, $_POST['curso'], $_SESSION['id_sesion_usuario']);
                        $stmt->execute();
                        if ($stmt->affected_rows) {
                            $msj="exito";
                        } else {
                            $msj="error";
                        }
                        $stmt->close();
                    }
                } else {
                    $msj="yahizo";
                }
            }

            $conexion->close();
            die(json_encode($msj));
        } else {
            die(json_encode('no_login'));
        }

        break;

      case 'terminar_info':
        session_start();
        if (isset($_SESSION['id_sesion_usuario'])) {
            $stmt=$conexion->prepare("update inscripcion_cursos set curso =1 where  idcurso = ? and idusuario= ?");
            $stmt->bind_param('ii', $_POST['idcurso'], $_SESSION['id_sesion_usuario']);
            $stmt->execute();
            if ($stmt->affected_rows) {
                $msj="exito";
            } else {
                $msj="error";
            }
            $stmt->close();
            die(json_encode($msj));
        }
        break;
    }
