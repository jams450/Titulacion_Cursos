<?php

    include_once($_SERVER["DOCUMENT_ROOT"] . "/src/Model/conexion.php");
//<<<<<<< HEAD
    //var_dump($_POST);
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
        } else {
            $msj="error";
        }
        $stmt->close();
    }
    $conexion->close();
    die(json_encode($msj));
