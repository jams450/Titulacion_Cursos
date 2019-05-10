<?php
    //$_POST: variable definida en donde se guarda la info enviada por post
    //var_dump(): imprime la estructura de dicha variable
    var_dump($_POST);

    //conectar con la bd, esto normalmente va aparte, con include_once
    $direccion_db='localhost';
    $password_db='Zaam971212';
    $usuario_db='userpt';
    $nombre_db='titulacion';

    $conexion=new mysqli($direccion_db,$usuario_db,$password_db,$nombre_db);
    $conexion->set_charset("utf8");
?>
