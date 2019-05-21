<!--  TODO: Fix path from users when has session  -->
<!--  TODO: Fix path to separate template General - Users - Hosts -->
<!-- Responsive-header -->
<div class="responive-header">
    <div class="logo">
        <a href="index.php" title="Imagen del logo">
            <img src="assets/images/logos/logo.png" style="height:96px" alt="Imagen del logo" />
        </a>
    </div>
    <span class="open-responsive-btn">
        <i class="la la-bars"></i>
        <i class="la la-close"></i>
    </span>
    <div class="resp-btn-sec">
      <?php
        if (!isset($_SESSION["id_sesion_usuario"])) {
            ?>
            <div class="acount-header-btn">
                <a href="/view/registro_usuario.php" title="Registro" class="register-btn" >Registro</a>
                <span class="login-btn">Login</span>
            </div>
      <?php
        }
        if (isset($_SESSION["id_sesion_usuario"])) {
            ?>
          <div class="acount-header-btn">
              <span>Hola, <?=$_SESSION["nombre_usuario"]?></span>
          </div>
        <?php
        }

       ?>

    </div>
    <div class="responisve-menu">
        <span class="close-reposive">
            <i class="la la-close"></i>
        </span>
        <div class="logo">
            <a href="index.html" title="Imagen del logo">
                <img src="assets/images/logos/logo.png" style="height:96px"  alt="Imagen del logo" />
            </a>
        </div>
        <ul>
        <?php
            if (isset($_SESSION["id_sesion_usuario"])) {
                ?>
                <!--Responsive Menu-->
            <li class="menu-item-has-children">
                <a href="#"><?=$_SESSION["nombre_usuario"]?></a>
                <ul>
                    <li><a href="view/panel.php" title="Mi Perfil">Menu</a></li>
                    <li><a href="view/cursos/buscador_cursos.php" title="Cursos">Cursos</a></li>
                    <li><a href="view/ver_perfil.php" title="Mis Gastos">Perfil</a></li>
                    <li><a href="view/usuarios/logout.php" title="Cerrar Sesión">Cerrar Sesión</a></li>
                </ul>
            </li>
        <?php
            }
        ?>
            <li><a href="index.php" title="Inicio">Inicio</a></li>


            <li><a href="view/cursos/buscador_cursos.php" title="Inicio">Cursos</a></li>


        </ul>
    </div>
</div>
<!-- Responsive-header -->
<header class="on-top">
    <div class="logo"><a href="index.php" title="Imagen del logo"><img src="assets/images/logos/logo.png"  style="height:96px" alt="Imagen del logo" /></a></div>
    <div class="menu-sec">
        <?php
            if (!isset($_SESSION["id_sesion_usuario"])) {
                ?>
          <div class="acount-header-btn">
              <a href="/view/registro_usuario.php" title="Registro" class="register-btn" >Registro</a>
              <span class="login-btn">Login</span>
          </div>
        <?php
            }
            if (isset($_SESSION["id_sesion_usuario"])) {
                ?>
        <!--Menu Normal-->
        <nav class="header-menu">
            <ul>
                <li class="menu-item-has-children imagen_log">
                    <a href="#" title="Imagen de perfil" style="margin-top: 10px;"><?=$_SESSION["nombre_usuario"]?></a>
                    <ul>
                      <li><a href="view/panel.php" title="Mi Perfil">Menu</a></li>
                      <li><a href="view/cursos/buscador_cursos.php" title="Cursos">Cursos</a></li>
                      <li><a href="view/ver_perfil.php" title="Mis Gastos">Perfil</a></li>
                      <li><a href="view/usuarios/logout.php" title="Cerrar Sesión">Cerrar Sesión</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <?php
            }
                ?>


        <nav class="header-menu">
            <ul>
                <li><a href="index.php" title="Inicio">Inicio</a></li>

                <li><a href="view/cursos/buscador_cursos.php" title="Inicio">Cursos</a></li>

              
            </ul>
        </nav>
    </div>
</header>
<style>
    .close-popup-error{
        background-color: #d90429;
        -webkit-transition: all 0.4s ease 0s;
        -moz-transition: all 0.4s ease 0s;
        -ms-transition: all 0.4s ease 0s;
        -o-transition: all 0.4s ease 0s;
        transition: all 0.4s ease 0s;
    }
    .close-popup-error:hover {
        background: #a3a3a3 none repeat scroll 0 0;
    }
    .acount-popup-error > h3 {
        color: #00171f;
        float: left;
        font-family: Oswald;
        font-size: 30px;
        width: 100%;
    }
</style>
<div id="leyenda_error" class="account-popup-sec-error" style="display:none; z-index:10000" >
    <div class="acount-popup-error" style="top : 30%">
        <span class="close-popup-error"><i class="la la-close"></i></span>
        <h3>Ocurrio un problema.</h3>
        <h4 id="nombre_error">Nombre del error</h4>
        <p id="desc_error">
          Descripcion del error
        </p>
    </div>
</div>
