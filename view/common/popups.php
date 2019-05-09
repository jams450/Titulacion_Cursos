<!-- TODO quitar comentarios para cacharlos como cambio en github-->
<div class="account-popup-sec">
    <div class="acount-popup login-popup">
        <span class="close-popup"><i class="la la-close"></i></span>
        <h3>LOGIN</h3>
        <form method="post" id='log_in' name="log_in" action="src/Controller/usuariosController.php">
            <div class="field-form">
                <input id="nombre_login" name="email_user" required="required" class="effect-16" type="email" placeholder="" autocomplete="off">
                <label>Email</label>
                <span class="focus-border"></span>
            </div>
            <div class="field-form">
                <input id="password_login" name="password_user" required="required" class="effect-16" type="password" placeholder="" autocomplete="off">
                <label>Password</label>
                <span class="focus-border"></span>
            </div>
            <!--<a href="recuperarpass.php" title="Recuperar password">Recupera tu password</a>-->
            <button type="submit" name="login">LOGIN</button>
        </form>
    </div>
</div>
<script type="text/javascript">

</script>
