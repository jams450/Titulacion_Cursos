
$(document).ready(function() {


  var valid = $("#newuser").validate({
      errorElement: "label",
      errorClass: 'error_form',
      errorPlacement: function(label, element) {
        var div = $(element).closest(".form_re");
        if (element.attr("class") == "styled-checkbox check_act") {
          if (val) {
            label.insertAfter($('#turisticas'));
            val = false;
          }
        } else
          label.insertAfter(div);

      },
      highlight: function(element) {
        $(element).closest('.form_re').addClass('has-error');
      },
      unhighlight: function(element) {
        $(element).closest('.form_re').removeClass('has-error');
      }
  });


    var datos=$('#newuser').serializeArray();
      $.ajax({
        // En data puedes utilizar un objeto JSON, un array o un query string
        data: datos,
        //Cambiar a type: POST si necesario
        type: "POST",
        // Formato de datos que se espera en la respuesta
        dataType: "json",
        // URL a la que se enviará la solicitud Ajax
        url: "controlador_usuario.php",
    })
     .done(function(res) {
          $('#resultado').html(res);
          alert("CORREO REGISTRADO PREVIAMENTE");
     })

});
