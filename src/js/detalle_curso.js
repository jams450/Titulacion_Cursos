$('#inscribirse').click(function(event) {

  $.ajax({
    url: '/src/Controller/controlador_cursos.php',
    type: 'POST',
    dataType: 'json',
    data: {operacion: 'inscribir', curso: $('#curso').val()}
  })
  .done(function(e) {
    switch (e) {
      case 'exito':
        swal({
          type: 'success',
          title: 'Ha sido incrito al curso '+$('#nombre_actividad').text(),
        });
        setTimeout(function(){
          document.location.href ='/view/miscursos.php';
        }, 1500);
        break;
      case 'error':
        swal({
          type: 'error',
          title: 'Ocurrio un error',
          text: 'Intente otra vez por favor',
        })
        break;
      case 'no_login':
        swal({
          type: 'error',
          title: 'Debe logearse para poder inscribirse',
        });
        break;
      default:

    }
  })

});
