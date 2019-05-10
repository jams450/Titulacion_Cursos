<?php
    var_dump($_POST);

    include_once("conexion.php");

    $stmt=$conexion->prepare("insert into usuarios (nombre,appat,apmat,edad,sexo,correo,username,passwd,tipopago) values (?,?,?,?,?,?,?,?,?)");
    $comprobacion_correo=$conexion->prepare("select correo from ['usuarios'] where correo = '{$correo}' ");
    if (!$comprobacion_correo) {
      $stmt->bind_param("sssiisssi",$_POST['nombre'],$_POST['appat'],$_POST['apmat'],$_POST['edad'],$_POST['sexo'],$_POST['correo'],$_POST['username'],$_POST['passwd'],$_POST['tipopago']);
      $stmt->execute();
      echo $stmt->error;
      if($stmt->affected_rows){
        $msj="Exito";
        die(json_encode($msj)); //codificar en json, el die es como un return, se puede sustituir el die directamente con un return
      } else {
        $msj="Mal";
        die(json_encode($stmt->error));
      }
    }

    $stmt->close();
    $conexion->close();
?>
