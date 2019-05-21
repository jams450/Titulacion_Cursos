


$(document).ready(function() {


    // #region Inicializar


    var current_fs, next_fs, previous_fs;
    var left, opacity, scale;
    var animating;
    // #end Inicializar


    // #region botones
    $(".next").click(function() {

        if ((!$('.steps').valid())) {
            $('.steps').validate().focusInvalid();
            return true;
        }
        if (animating) return false;
        animating = true;
        current_fs = $(this).parent();
        next_fs = $(this).parent().next();
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
        next_fs.show();
        if (next_fs.attr('id')=='info_act') {
          $( "#categoria_actividad" ).rules( "add", {
            required:true,
            noigual: 0
          });
        }
        $('#topcontrol').trigger("click");
        current_fs.animate({
            opacity: 0
        }, {
            step: function(now, mx) {
                scale = 1 - (1 - now) * 0.2;
                left = (now * 50) + "%";
                opacity = 1 - now;
                current_fs.css({
                    'transform': 'scale(' + scale + ')'
                });
                next_fs.css({
                    'left': left,
                    'opacity': opacity
                });
            },
            duration: 800,
            complete: function() {
                current_fs.hide();
                animating = false;
            },
            easing: 'easeInOutExpo'
        });
    });

    $(".previous").click(function() {
        $('#topcontrol').trigger("click");
        if (animating) return false;
        animating = true;
        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
        previous_fs.show();
        current_fs.animate({
            opacity: 0
        }, {
            step: function(now, mx) {
                scale = 0.8 + (1 - now) * 0.2;
                left = ((1 - now) * 50) + "%";
                opacity = 1 - now;
                current_fs.css({
                    'left': left
                });
                previous_fs.css({
                    'transform': 'scale(' + scale + ')',
                    'opacity': opacity
                });
            },
            duration: 800,
            complete: function() {
                current_fs.hide();
                animating = false;
            },
            easing: 'easeInOutExpo'
        });
    });

    $("#finalizar").click(function(e){
      e.preventDefault();
      //ajax
      $.ajax({
        url: '/src/Controller/controlador_cursos.php',
        type: 'POST',
        dataType: "json",
        data: {operacion: 'terminar_info' ,  idcurso: $('#id_curso').val()}
      })
      .done(function(e) {
        if (e === 'exito') {
          swal({
            title: 'Ha terminado el curso',
            text: '¿Quiere ir al examen ?',
            type: 'success',
            allowOutsideClick: false,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ir al examen',
            cancelButtonText: 'Ir al menu'
          }).then((result) => {
            if (result.value) {
              document.location.href ='/view/cursos/examenes_cursos.php?id='+$('#id_curso').val();
            }else {
              document.location.href ='/view/miscursos.php';
            }
          });
        }
      })
    });
    // #end


});
