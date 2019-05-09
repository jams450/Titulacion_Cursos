<!--  TODO: Fix path from users when has session  -->
<!--  TODO: Fix path to separate template General - Users - Hosts -->
<!-- Responsive-header -->
<div class="responive-header">
    <div class="logo">
        <a href="index.php" title="Imagen del logo">
            <img src="assets/images/logo/96x96.png" alt="Imagen del logo" />
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
                <a href="view/registro_usuario.php" title="Hazte anfitrión" class="register-btn" >Registro</a>
                <span class="login-btn">Login</span>
            </div>
        <?php
            }
            if (isset($_SESSION["id_sesion_usuario"])) {
                ?>
            <div class="acount-header-btn">
                <img src="assets/images/usersData/<?=$_SESSION["foto"]?>" class="img_logueo" alt="Imagen de perfil">
                <span>Hola, <?=$_SESSION["nombre_usuario"]?></span>
            </div>
        <?php
            }
            if (isset($_SESSION["id_sesion_usuario"]) && $_SESSION["is_anfitrion"] == 0) {
                ?>
            <a href="#" title="Hazte anfitrión" class="add-listing-btn haz_anfitrion" ><i class="la la-user"></i>Hazte anfitrión</a>
        <?php
            }
        ?>
        <?php
            if (isset($_SESSION["id_sesion_usuario"]) && $_SESSION["is_anfitrion"] == 1) {
                ?>
            <a href="view/registro_usuario.php" title="Hazte anfitrión" class="add-listing-btn" style="display:none;"><i class="la la-user"></i>Hazte anfitrión</a>
        <?php
            }
            if (!isset($_SESSION["id_sesion_usuario"])) {
                ?>
            <a href="view/registro_usuario.php?anfitrion=1" title="Hazte anfitrión" class="add-listing-btn"><i class="la la-user"></i>Hazte anfitrión</a>
        <?php
            }
        ?>
        <div class="search-header">
            <span class="open-search">
                <i class="la la-search"></i>
                <i class="la la-close"></i>
            </span>
            <form>
                <input type="text" placeholder="Search">
            </form>
        </div>
    </div>
    <div class="responisve-menu">
        <span class="close-reposive">
            <i class="la la-close"></i>
        </span>
        <div class="logo">
            <a href="index.html" title="Imagen del logo">
                <img src="assets/images/logo/96x96.png" alt="Imagen del logo" />
            </a>
        </div>
        <ul>
        <?php
            if (isset($_SESSION["id_sesion_usuario"])) {
                ?>
                <!--Responsive Menu-->
            <li class="menu-item-has-children">
                <a href="#" title="Imagen de perfil"><img src="assets/images/usersData/<?=$_SESSION["foto"]?>" class="img_logueo" alt="Imagen de perfil"></a>
                <ul>
                    <li><a href="#" title="Nombre del usuario"><?=$_SESSION["nombre_usuario"]?></a></li>
                    <!-- <li><a href="view/ver_perfil.php" title="Ver perfil">Ver Perfil</a></li> -->
                    <?php if (isset($_SESSION["id_sesion_usuario"]) && $_SESSION["is_anfitrion"] == 1) {
                    ?>
                        <li><a href="view/anfitrion/preguntas-respuestas.php?idan=<?=$_SESSION['id_sesion_usuario']?>">Preguntas & respuestas</a></li>
                    <?php
                } else {
                    ?>
                        <li><a href="view/usuarios/perfil/preguntas-respuestas.php">Preguntas & respuestas</a></li>
                    <?php
                } ?>
                    <li><a href="view/anfitrion/panel.php" title="Ver perfil">Panel de control</a></li>
                    <li><a href="view/usuarios/logout.php" title="Cerrar sesión">Cerrar sesión</a></li>
                </ul>
            </li>
        <?php
            }
        ?>
            <li><a href="index.php" title="Inicio">Inicio</a></li>
        <?php
            if (isset($_SESSION["id_sesion_usuario"]) && $_SESSION["is_anfitrion"] > 0) {
                ?>
            <li>
                <a href="view/anfitrion/panel.php" title="Panel de control">Panel de control</a>
            </li>
        <?php
            }
        ?>
            <li class="menu-item-has-children">
                <a href="#" title="Experiencias">Experiencias</a>
                <ul>
                    <li><a href="view/servicio-actividad/actividad.php" title="Experiencias">Actividades</a></li>
                    <li><a href="view/servicio-alojamiento/alojamiento.php" title="Alojamientos">Alojamientos</a></li>
                    <li><a href="view/servicio-coche/coche.php" title="Compartir coche">Compartir coche</a></li>
                    <li><a href="view/servicio-gastronomia/gastronomia.php" title="Gastronomía">Gastronomía</a></li>
                </ul>
            </li>
            <li><a href="https://wejoytrip.com/blog/" target="_blank" title="Blog">Blog</a></li>
            <li><a href="view/contacto.php" title="Contacto">Contacto</a></li>
        </ul>
    </div>
</div>
<!-- Responsive-header -->
<header class="on-top">
    <div class="logo"><a href="index.php" title="Imagen del logo"><img src="assets/images/logo/96x96.png" alt="Imagen del logo" /></a></div>
    <div class="menu-sec">
        <!--select class="SlectBox">
            <option data-display="Select">EN</option>
            <option value="1">ES</option>
        </select-->
        <?php
            if (!isset($_SESSION["id_sesion_usuario"])) {
                ?>
        <div class="acount-header-btn">
            <a href="view/registro_usuario.php" title="Hazte anfitrión" class="register-btn" >Registro</a>
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
                    <a href="#" title="Imagen de perfil"><img src="assets/images/usersData/<?=$_SESSION["foto"]?>" class="img_logueo" alt="Imagen de perfil"></a>
                    <ul>
                        <li><a href="#" title="Nombre del usuario"><?=$_SESSION["nombre_usuario"]?></a></li>
                        <!-- <li><a href="view/ver_perfil.php" title="Ver perfil">Ver Perfil</a></li> -->
                        <?php if (isset($_SESSION["id_sesion_usuario"]) && $_SESSION["is_anfitrion"] == 1) {
                    ?>
                            <li><a href="view/anfitrion/preguntas-respuestas.php?idan=<?=$_SESSION['id_sesion_usuario']?>">Preguntas & respuestas</a></li>
                        <?php
                } else {
                    ?>
                            <li><a href="view/usuarios/perfil/preguntas-respuestas.php">Preguntas & respuestas</a></li>
                        <?php
                } ?>
                        <li><a href="view/anfitrion/panel.php" title="Ver perfil">Panel de control</a></li>
                        <li><a href="view/usuarios/logout.php" title="Cerrar sesión">Cerrar sesión</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <?php
            }
            if (isset($_SESSION["id_sesion_usuario"]) && $_SESSION["is_anfitrion"] == 0) {
                ?>
        <a href="#" title="Hazte anfitrión" class="add-listing-btn haz_anfitrion" ><i class="la la-user"></i>Hazte anfitrión</a>
        <?php
            }
            if (isset($_SESSION["id_sesion_usuario"]) && $_SESSION["is_anfitrion"] == 1) {
                ?>
        <a href="view/registro_usuario.php" title="Hazte anfitrión" class="add-listing-btn" style="display:none;"><i class="la la-user"></i>Hazte anfitrión</a>
        <?php
            }
            if (!isset($_SESSION["id_sesion_usuario"])) {
                ?>
        <a href="view/registro_usuario.php?anfitrion=1" title="Hazte anfitrión" class="add-listing-btn" ><i class="la la-user"></i>Hazte anfitrión</a>
        <?php
            }
        ?>
        <div class="search-header">
            <span class="open-search"><i class="la la-search"></i><i class="la la-close"></i></span>
            <form>
                <input type="text" placeholder="Search">
            </form>
        </div>
        <nav class="header-menu">
            <ul>
                <li><a href="index.php" title="Inicio">Inicio</a></li>
        <?php
            if (isset($_SESSION["id_sesion_usuario"]) && $_SESSION["is_anfitrion"] > 0) {
                ?>
                <li>
                    <a href="view/anfitrion/panel.php" title="">Panel de control</a>
                </li>
        <?php
            }
        ?>
                <li class="menu-item-has-children">
                    <a href="#" title="Experiencias">Experiencias</a>
                    <ul>
                        <li><a href="view/servicio-actividad/actividad.php" title="Experiencias">Actividades</a></li>
                        <li><a href="view/servicio-alojamiento/alojamiento.php" title="Alojamientos">Alojamientos</a></li>
                        <li><a href="view/servicio-coche/coche.php" title="Compartir coche">Compartir coche</a></li>
                        <li><a href="view/servicio-gastronomia/gastronomia.php" title="Gastronomía">Gastronomía</a></li>
                    </ul>
                </li>
                <li><a href="https://wejoytrip.com/blog/" target="_blank" title="Blog">Blog</a></li>
                <li><a href="view/contacto.php" title="Contacto">Contacto</a></li>
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
<div id="leyenda_error" class="account-popup-sec-error" style="display:<?=$error?>" >
    <div class="acount-popup-error">
        <span class="close-popup-error"><i class="la la-close"></i></span>
        <h3>Ups! Hay un problema.</h3>
        <p>
            <?php
                if (isset($_SESSION['error_login'])):
            ?>
            <span><?=$_SESSION['error_login']?><br>Inténtalo nuevamente.</span>
            <?php
            endif;
            unset($_SESSION['error_login']);
            if (isset($_GET["error"])):
                ?>
                <span><?=$_GET["error"]?><br>.</span>
                <?php
            endif;
            unset($_GET["error"]);
            ?>
        </p>
    </div>
</div>
