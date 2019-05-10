<?php

    include_once($_SERVER["DOCUMENT_ROOT"] . "/src/Model/conexion.php");
    //var_dump($_POST);
    $stmt=$conexion->prepare("insert into usuarios (nombre,appat,apmat,edad,sexo,correo,username,passwd,idtipopago) values (?,?,?,?,?,?,?,?,?)");
    echo $stmt->error;
    $stmt->bind_param("sssiisssi", $_POST['nombre'], $_POST['appat'], $_POST['apmat'], $_POST['edad'], $_POST['sexo'], $_POST['correo'], $_POST['username'], $_POST['passwd'], $_POST['tipopago']);
    $stmt->execute();

    if ($stmt->affected_rows) {
        $msj="Exito";
    //die(json_encode($msj)); //codificar en json, el die es como un return, se puede sustituir el die directamente con un return
    } else {
        $msj="Mal";
        //die(json_encode($stmt->error));
    }

    echo $msj;
    $stmt->close();
    $conexion->close();
