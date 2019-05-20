<footer>
    <div class="block remove-bottom">
        <div data-velocity="-.1" style="background: 50% 0px rgb(0, 23, 31);" class="parallax no-parallax scrolly-invisible"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 column">
                    <div class="widget">
                        <h3 class="footer-title">QUIÉNES SOMOS</h3>
                        <div class="about-widget">
                            <p></p>
                        </div>
                    </div><!-- Widget -->
                </div>
                <div class="col-md-4 column">
                    <div class="widget">
                        <h3 class="footer-title">OPCIONES</h3>
                        <div class="link-widget">
                            <ul>
                                <li><a href="view/servicio-actividad/actividad.php" title="">Cursos</a></li>
                                <?php   if (!isset($_SESSION["id_sesion_usuario"])) {
    echo '<li><a href="view/servicio-alojamiento/alojamiento.php" title="">Iniciar Sesion</a></li>';
} else {
    echo '<li><a href="view/servicio-alojamiento/alojamiento.php" title="">Mi perfil</a></li>';
}
                                   ?>
                                <li><a href="view/servicio-coche/coche.php" title="">Control de gastos</a></li>
                            </ul>
                        </div>
                    </div><!-- Widget -->
                </div>
                <div class="col-md-4 column">
                    <div class="widget">
                        <h3 class="footer-title">CONTACTO</h3>
                        <div class="link-widget">
                            <ul>
                                <li>
                                    <a href="" title="">Contacto</a>
                                </li>
                            </ul>
                        </div>
                    </div><!-- Widget -->
                </div>
            </div>
        </div>
        <div class="bottom-line">
            <span>Copyright AEF © 2019. Todos los derechos reservados</span>
        </div>
    </div>
</footer>
