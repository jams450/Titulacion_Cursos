<?php

    include_once($_SERVER["DOCUMENT_ROOT"] . "/src/Model/conexion.php");

    $resultado=$conexion->query("select correo from usuarios where correo = '".$_POST['correo']."'");
    if ($res = $resultado->fetch_assoc()) {
        $msj="Ya existe correo";
    } else {
        $stmt=$conexion->prepare("insert into usuarios (nombre,appat,apmat,edad,sexo,correo,username,passwd,idtipopago) values (?,?,?,?,?,?,?,?,?)");
        echo $stmt->error;
        $stmt->bind_param("sssiisssi", $_POST['nombre'], $_POST['appat'], $_POST['apmat'], $_POST['edad'], $_POST['sexo'], $_POST['correo'], $_POST['username'], $_POST['passwd'], $_POST['tipopago']);
        $stmt->execute();

        if ($stmt->affected_rows) {
            $msj="Exito";
        } else {
            $msj="Mal";
        }
        $stmt->close();
    }
    echo $msj;

    $conexion->close();
