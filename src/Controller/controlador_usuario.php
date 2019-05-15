<?php

    include_once($_SERVER["DOCUMENT_ROOT"] . "/src/Model/conexion.php");
//<<<<<<< HEAD
    //var_dump($_POST);
    $comprobacion_correo=$conexion->query("select correo from usuarios where correo='".$_POST['correo']."'");
    $comprobacion_usuario=$conexion->query("select username from usuarios where username='".$_POST['username']."'");

    if ($result=$comprobacion_correo->fetch_assoc()) {
      ?>
        <script type="text/javascript" src="/src/js/alta_usuario.js"></script>
      <?php
    }else if ($res=$comprobacion_usuario->fetch_assoc()){
      echo'<script type="text/javascript">alert("NOMBRE DE USUARIO REGISTRADO PREVIAMENTE.");</script>';
    }else {
      $stmt=$conexion->prepare("insert into usuarios (nombre,appat,apmat,edad,sexo,correo,username,passwd,idtipopago) values (?,?,?,?,?,?,?,?,?)");
      echo $stmt->error;
      $stmt->bind_param("sssiisssi", $_POST['nombre'], $_POST['appat'], $_POST['apmat'], $_POST['edad'], $_POST['sexo'], $_POST['correo'], $_POST['username'], $_POST['passwd'], $_POST['tipopago']);
      $stmt->execute();

      if ($stmt->affected_rows) {
          //$msj="Exito";
          echo'<script type="text/javascript">alert("NUEVO USUARIO REGISTRADO. /n VERIFICA TU CUENTA DESDE TU CORREO.");</script>';
          //die(json_encode($msj)); //codificar en json, el die es como un return, se puede sustituir el die directamente con un return
      } else {
          $msj="Mal";
          //die(json_encode($stmt->error));
      }
      echo $msj;

      $stmt->close();
    }

    $conexion->close();
      /*if ($res=$comprobacion_usuario->fetch_assoc()) {
        echo'<script type="text/javascript">alert("NOMBRE DE USUARIO REGISTRADO PREVIAMENTE.");</script>';
      }else {
        $stmt=$conexion->prepare("insert into usuarios (nombre,appat,apmat,edad,sexo,correo,username,passwd,idtipopago) values (?,?,?,?,?,?,?,?,?)");
        echo $stmt->error;
        $stmt->bind_param("sssiisssi", $_POST['nombre'], $_POST['appat'], $_POST['apmat'], $_POST['edad'], $_POST['sexo'], $_POST['correo'], $_POST['username'], $_POST['passwd'], $_POST['tipopago']);
        $stmt->execute();

        if ($stmt->affected_rows) {
            $msj="Exito";
            echo'<script type="text/javascript">alert("NUEVO USUARIO REGISTRADO. VERIFICA TU CUENTA DESDE TU CORREO.");</script>';
            //die(json_encode($msj)); //codificar en json, el die es como un return, se puede sustituir el die directamente con un return
        } else {
            $msj="Mal";
            //die(json_encode($stmt->error));
        }
        echo $msj;

        $stmt->close();
      }
      $conexion->close();
    }*/
    //window.location.href="/view/registro_usuario.php"
?>
