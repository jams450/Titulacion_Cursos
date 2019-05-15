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
<script type="text/javascript" src="assets/js/sweetalert2.min.js"></script>
<script type="text/javascript" src="assets/js/script.js"></script>
<!-- Script -->

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>

<script>
  $(document).ready(function () {
    //validar form para login
    jQuery.extend(jQuery.validator.messages, {
      required: "Este campo es obligatorio.",
      remote: "Por favor, rellena este campo.",
      email: "Por favor, escribe una dirección de correo válida",
      url: "Por favor, escribe una URL válida.",
      date: "Por favor, escribe una fecha válida.",
      dateISO: "Por favor, escribe una fecha (ISO) válida.",
      number: "Por favor, escribe un número entero válido.",
      digits: "Por favor, escribe sólo dígitos.",
      creditcard: "Por favor, escribe un número de tarjeta válido.",
      equalTo: "Por favor, escribe el mismo valor de nuevo.",
      accept: "Por favor, escribe un valor con una extensión aceptada.",
      maxlength: jQuery.validator.format("Por favor, no escribas más de {0} caracteres."),
      minlength: jQuery.validator.format("Por favor, no escribas menos de {0} caracteres."),
      rangelength: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1} caracteres."),
      range: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1}."),
      max: jQuery.validator.format("Por favor, escribe un valor menor o igual a {0}."),
      min: jQuery.validator.format("Por favor, escribe un valor mayor o igual a {0}."),
      step: jQuery.validator.format("Por favor, escribe un número multiplo de {0}.")
    });
    $("#log_in").validate({
      rules: {
        nombre_login: {
          required: true
        },
        password_login: {
          required: true
        }
      },
      messages: {
        nombre_login: {
          required: "Es necesario escribir el usuario",
          email: "El formato de correo no es valido"
        },
        password_login: {
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

    });


    $(document).on('click','#login_boton',function(event) {
      event.preventDefault();
      if ($("#log_in").valid()) {
        var datos=$('#log_in').serializeArray();
        $.ajax({
          url: '/src/Controller/controlador_usuario.php',
          type: 'POST',
          dataType: 'JSON',
          data: datos
        })
        .done(function(e) {
          var resultados=e;
          if (resultados=='exito') {
            swal({
                type: 'success',
                title: 'Login correcto',
              });
              setTimeout(function(){
                  window.open('/index.php');
              }, 1500);
          }else {
            swal({
                type: 'error',
                title: 'Ocurrio un error',
                text: 'Alguno de los datos no son correctos',
              })
          }
        })
      }
    });

  });
</script>
