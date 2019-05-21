<?php
  session_start(); //Iniciar nueva sesión o reanudar la existente
  unset($_SESSION['id_sesion_usuario']);
  session_destroy(); //Destruye la sesión
  header("location: ../../index.php");
 ?>
