$('#enviar_eval').click(function(event) {
  var respuestas = $('#examen').serializeArray();

  $.ajax({
    url: '/src/Controller/controlador_cursos.php',
    type: 'POST',
    dataType: 'json',
    data: respuestas
  })
  .done(function(e) {
    console.log(e);
    switch (e) {
      case 'exito':
        swal({
          type: 'success',
          title: 'Has completado el '+$('#nombre_actividad').text(),
        });
        break;
      case 'error':
        swal({
          type: 'error',
          title: 'Ocurrio un error',
          text: 'Intente otra vez por favor',
        })
        break;
      case 'yahizo':
        swal({
          type: 'error',
          title: 'Ocurrio un error',
          text: 'El usuario ya resolvio el examen no puede volver hacerlo.',
        })
        break;
      case 'no_login':
        swal({
          type: 'error',
          title: 'Debe logearse para poder hacer el examen',
        });
        break;
      default:

    }
  })

});


$('#regresar').click(function(event) {
  document.location.href ='/view/miscursos.php';
});
