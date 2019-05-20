<?php
    include_once($_SERVER["DOCUMENT_ROOT"] . "/src/Model/conexion.php");
    $operacion = $_POST['operacion'];
    switch ($operacion) {
      case 'alta':
        $comprobacion_correo=$conexion->query("select correo from usuarios where correo='".$_POST['correo']."'");
        $comprobacion_usuario=$conexion->query("select username from usuarios where username='".$_POST['username']."'");

        if ($result=$comprobacion_correo->fetch_assoc()) {
            $msj="correo_mal";
        } elseif ($res=$comprobacion_usuario->fetch_assoc()) {
            $msj="usuario_mal";
        } else {
            $stmt=$conexion->prepare("insert into usuarios (nombre,appat,apmat,edad,sexo,correo,username,passwd,idtipopago) values (?,?,?,?,?,?,?,?,?)");
            echo $stmt->error;
            $stmt->bind_param("sssiisssi", $_POST['nombre'], $_POST['appat'], $_POST['apmat'], $_POST['edad'], $_POST['sexo'], $_POST['correo'], $_POST['username'], $_POST['passwd'], $_POST['tipopago']);
            $stmt->execute();

            if ($stmt->affected_rows) {
                $msj="exito";
                session_start();
                $_SESSION['id_sesion_usuario']=$stmt->insert_id;
                $_SESSION['nombre_usuario']=$_POST['username'];
                $_SESSION['username_usuario']=$_POST['nombre'];
                $_SESSION['appat_usuario']=$_POST['appat'];
            } else {
                $msj="error";
            }
            $stmt->close();
        }
        break;

      case 'login':
        $comprobacion_usuario=$conexion->query("select * from usuarios where username='".$_POST['nombre_login']."' and passwd = '".$_POST['password_login']."' ");
        if ($result=$comprobacion_usuario->fetch_assoc()) {
            $msj="exito";
            session_start();
            $_SESSION['id_sesion_usuario']=$result['idusuario'];
            $_SESSION['nombre_usuario']=$result['username'];
            $_SESSION['username_usuario']=$result['nombre'];
            $_SESSION['appat_usuario']=$result['appat'];
        } else {
            $msj="error";
        }
        break;

      case 'cambio':
        // code...
        break;

      default:
        // code...
        break;
    }

    $conexion->close();
    die(json_encode($msj));
