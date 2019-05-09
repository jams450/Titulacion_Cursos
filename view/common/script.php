<!-- Script -->
<script type="text/javascript" src="assets/js/modernizr.js"></script>
<!-- Modernizer -->
<script type="text/javascript" src="assets/js/jquery.js"></script>
<!-- Jquery -->
<script type="text/javascript" src="assets/js/jquery.validate.js"></script>
<!-- Jquery validator -->
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<!-- Bootstrap -->
<script type="text/javascript" src="assets/js/scrolltopcontrol.js"></script>
<!-- ScrollTopControl -->
<script type="text/javascript" src="assets/js/slick.min.js"></script>
<!-- Slick -->
<script type="text/javascript" src="assets/js/scrolly.js"></script>
<!-- Scrolly -->
<script type="text/javascript" src="assets/js/sumoselect.js"></script>
<!-- Sumoselect -->
<!--script type="text/javascript" src="/assets/js/choosen.min.js"></script-->
<!-- Choosen -->
<script type="text/javascript" src="assets/js/rangeslider.js"></script>
<!-- Rangslider -->
<script type="text/javascript" src="assets/js/jquery.jigowatt.js"></script>
<!-- JIgowatt -->
<script type="text/javascript" src="assets/js/poptrox.js"></script>
<!-- Poptrox -->
<script type="text/javascript" src="assets/js/script.js"></script>
<!-- Script -->

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>

<script>
  $(document).ready(function () {
    //validar form para login
    $("#log_in").validate({
      rules: {
        email_user: {
          required: true
        },
        password_user: {
          required: true
        }
      },
      messages: {
        email_user: {
          required: "Es necesario escribir el correo",
          email: "El formato de correo no es valido"
        },
        password_user: {
          required: "Escriba su contraseña"
        }
      },
      errorElement: "div",
      errorClass: 'error_login',
      errorPlacement: function (label, element) {
        var div = $(element).closest("div");
        label.insertAfter(div);
      },
      highlight: function (element) {
        $(element).closest('.field-form').addClass('has-error');
      },
      unhighlight: function (element) {
        $(element).closest('.field-form').removeClass('has-error');
      },
      submitHandler: function (form) {
        form.preventDefault();
        if ($("#log_in").valid()) {
          form.preventDefault();
          $(form).submit();
        }
      }
    });

    // ------------
    $(".haz_anfitrion").on("click", function (e) {
      e.preventDefault();
      $.ajax({
        data: {
          "hacer_anfitrion": true
        },
        type: "POST",
        dataType: "json",
        url: "src/Controller/usuariosController.php"
      }).done(function (data) {
        console.log(data);
        if (data.data.status == 0) {
          alert("Ahora eres anfitrion.");
          window.location.href = "view/anfitrion/panel.php";
        } else {
          alert("Intente de nuevo mas tarde");
        }
      }).fail(function (jqXHR, textStatus, errorThrown) {
        if (console && console.log) {
          console.log("La solicitud a fallado: " + textStatus);
        }
      });
    });
  });
</script>
