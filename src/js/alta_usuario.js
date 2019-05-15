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
});


$('#registro_usuario').click(function(event) {
  event.preventDefault();
  if ($('#newuser').valid()) {
    var datos = $('#newuser').serializeArray();
    $.ajax({
        data: datos,
        type: "POST",
        dataType: "json",
        url: "/src/Controller/controlador_usuario.php",
      })
      .done(function(res) {
        var data = res;
        switch (data) {
          case 'exito':
            alert(data);
            break;
          case 'correo_mal':
            alert(data);
            break;
          case 'usuario_mal':
            alert(data);
            break;
          case 'error':
            alert(data);
            break;
          default:

        }
      })
  }
});
