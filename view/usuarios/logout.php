<?php
  session_start();
  unset($_SESSION['id_sesion_usuario']);
  session_destroy();
  header("location: ../../index.php");
 ?>