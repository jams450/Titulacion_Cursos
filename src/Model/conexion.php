<?php
    //conectar con la bd, esto normalmente va aparte, con include_once
    $direccion_db='localhost';
    $password_db='Zaam971212';
    $usuario_db='userpt';
    $nombre_db='titulacion';

    $conexion=new mysqli($direccion_db, $usuario_db, $password_db, $nombre_db);
    $conexion->set_charset("utf8");

    if (mysqli_connect_errno()) {
        echo "Falló la conexión:". mysqli_connect_error();
    }

    ?>
