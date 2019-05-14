
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
