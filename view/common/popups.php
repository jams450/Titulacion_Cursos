<!-- TODO quitar comentarios para cacharlos como cambio en github-->
<div class="account-popup-sec" style="z-index:500">
    <div class="acount-popup login-popup">
        <span class="close-popup"><i class="la la-close"></i></span>
        <h3>LOGIN</h3>
        <form method="post" id='log_in' name="log_in" >
            <div class="field-form">
                <input id="nombre_login" name="nombre_login" required="required" class="effect-16" type="text" placeholder="" >
                <label>Usuario</label>
                <span class="focus-border"></span>
            </div>
            <div class="field-form">
                <input id="password_login" name="password_login" required="required" class="effect-16" type="password" placeholder="" autocomplete="off">
                <label>Password</label>
                <span class="focus-border"></span>
            </div>
            <a href="recuperarpass.php" title="Recuperar password">Recupera tu password</a>
            <input type="hidden" name="operacion" id="operacion" value="login">
            <button type="submit" id="login_boton" name="login">LOGIN</button>
        </form>
    </div>
</div>
