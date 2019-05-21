

// #region MAPS

var map , map2;
var placeSearch, autocomplete;
var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};

function initialize() {
  initMap();
  initAutocomplete();
}

function initAutocomplete() {
  // Create the autocomplete object, restricting the search to geographical
  // location types.
  autocomplete = new google.maps.places.Autocomplete(
    /** @type {!HTMLInputElement} */
    (document.getElementById('autocomplete')), {
      types: ['geocode']
    });

  // When the user selects an address from the dropdown, populate the address
  // fields in the form.
  autocomplete.addListener('place_changed', fillInAddress);
}

function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();

  for (var component in componentForm) {
    document.getElementById(component).value = '';
    document.getElementById(component).disabled = false;
  }

  //get lat and lng
  document.getElementById("lat").value = place.geometry.location.lat();
  document.getElementById("lng").value = place.geometry.location.lng();


  var myLatLng = {lat:  place.geometry.location.lat(), lng: place.geometry.location.lng()};
  var marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    title: 'Exp'
  });
  map.setZoom(18);
  map.setCenter(marker.getPosition());
  var marker2 = new google.maps.Marker({
    position: myLatLng,
    map: map2,
    title: 'Exp'
  });

  map2.setZoom(18);
  map2.setCenter(marker2.getPosition());
  // Get each component of the address from the place details
  // and fill the corresponding field on the form.
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      document.getElementById(addressType).value = val;
    }
  }
  $(".steps").valid();
}

// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      var circle = new google.maps.Circle({
        center: geolocation,
        radius: position.coords.accuracy
      });
      autocomplete.setBounds(circle.getBounds());
    });
  }
}

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: 19.432608, lng: -99.133209},
      zoom: 8,
      streetViewControl: false
    });

  map2 = new google.maps.Map(document.getElementById('map2'), {
    center: {lat: 19.432608, lng: -99.133209},
    zoom: 8,
    streetViewControl: false
  });
}

// #end



$(document).ready(function() {

    // #region ajax
    $.ajax({
        data: {
          "data": "actividades"
        },
        type: "POST",
        dataType: "json",
        url: "src/Controller/metadataController.php"
      })
      .done(function(data) {
        for (item in data.actividades) {
          var options = '<option value="' + data.actividades[item].id_tipo_actividad + '">' + data.actividades[item].nombre_actividad + '</option>';
          $('#categoria_actividad').append(options);
        }
        var otherOption = '<option value="Otra">Otra</option>';
        $('#categoria_actividad').append(otherOption);
        $("#categoria_actividad").chosen();
        $("#categoria_actividad").trigger("chosen:updated");
      })
      .fail(function(jqXHR, textStatus, errorThrown) {
        if (console && console.log) {
          console.log("La solicitud a fallado: " + textStatus);
        }
      });

      $.ajax({
          data: {
            "data": "empresas"
          },
          type: "POST",
          dataType: "json",
          url: "src/Controller/metadataController.php"
        })
        .done(function(data) {
          for (item in data.empresas) {
            $('#empresa').append($('<option>', {
                value: data.empresas[item].id_empresa,
                text:  data.empresas[item].nombre_empresa
            }));
          }
          $("#empresa").chosen();
          $("#empresa").trigger("chosen:updated");

        })
        .fail(function(jqXHR, textStatus, errorThrown) {
          if (console && console.log) {
            console.log("La solicitud a fallado: " + textStatus + errorThrown + jqXHR);
          }
        });
    // #end


    // #region Inicializar
    var total_img=0;
    $('.datepicker').datepicker({
      format: 'dd/mm/yyyy',
      language: 'es',
      autoclose: true,
      startDate: "today"
    });

    var options = {
      title: 'Escoge la Hora'
    };
    $('#hora_inicio').wickedpicker(options);

    var current_fs, next_fs, previous_fs;
    var left, opacity, scale;
    var animating;

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

    jQuery.validator.addMethod("noigual", function(value, element, param) {
      return this.optional(element) || value != param;
    }, "Escoja una opcion diferente");

    jQuery.validator.addMethod("no_imagen", function(value, element, param) {
      return this.optional(element) || element.files.length >= param;
    }, "Escoja una opcion diferente");

    $(".steps").validate({
        ignore: ':hidden:not(.chosen-select)',
        rules:{
          'nombre_actividad':{
            required:true,
            maxlength:80
          },
          'adultas':{
            required:true,
            min:1
          },
          'child':{
            required:true,
          },
          'descripcion_experiencia':{
            required:true,
          },
          'servicios_incluye':{
            required:true,
          },
          'acerca_lugar':{
            required:true,
          },
          'apuntarse':{
            required:true,
          },
          'politica':{
            required:true,
          },
          'fotos_actividades[]':{
            required:true,
            no_imagen: 4
          }
        },
        messages:{
          'nombre_actividad':{
            required:'Nombre de la acividad esta vacio',
            maxlength:'Nombre de la actividad es demasiado largo'
          },
          'tipo_actividad':{
            required:'Escoja una categoria de actividad',
            noigual: 'Escoja una categoria de actividad'
          },
          'adultas':{
            required:'Personas adultas esta vacío',
            min:'Al menos una persona debe asistir'
          },
          'child':{
            required:'Escoja una opción'
          },
          'descripcion_experiencia':{
            required:'Descripción esta vacío',
          },
          'servicios_incluye':{
            required:'Servicios que incluye no debe estar vacío',
          },
          'acerca_lugar':{
            required:'Acerca del lugar esta vacío',
          },
          'apuntarse':{
            required:'Este campo esta vacío',
          },
          'politica':{
            required:'Política esta vacío',
          },
          'fotos_actividades[]':{
            no_imagen: 'Deben ser al menos 4 imagenes'
          }
        },
        errorElement: "label",
        errorClass:'error_form2',
        errorPlacement: function(label, element) {
           var div= $(element).closest( ".form_re" );
           if (element.attr('id')=='categoria_actividad') {
             label.css('margin-top', '0px');
             label.insertAfter(div);
           }
           if (element.attr('name')=='child'){
             label.css('margin-top', '30px');
             label.insertAfter(div);
           }
            else
              label.insertAfter(div);

       },
       highlight: function(element) {
         $(element).closest('.form_re').addClass('has-error');
       },
       unhighlight: function(element) {
         $(element).closest('.form_re').removeClass('has-error');
       }


    });

    $('#tabla_precios').DataTable({
      'searching'   : false,
      'paging'      : false,
      'lengthChange': false,
      "pageLength": 20,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false,
      "language": {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
      }
    });
    $('#tabla_precios2').DataTable({
      'searching'   : false,
      'paging'      : false,
      'lengthChange': false,
      "pageLength": 20,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false,
      "language": {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
      }
    });
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

    $("#btn_sig_res").click(function(e){
      e.preventDefault();
      if ($('#tabla_precios').DataTable().rows().count() !== 0) {
          //Cargar datos en el resumen
          var datos=$('#form_alta_act').serializeArray();
          var arreglo = {};
          $(datos).each(function(i, field){
            $('#'+field.name+'res').html(field.value);
          });

          $('#empresares').html($( "#empresa option:selected" ).text());
          $('#tipo_actividadres').html($( "#categoria_actividad option:selected" ).text());
          //imagenes resumen
          var portada=$('#list-miniatura').clone();
          var galeria=$('#list-miniatura2').clone();
          $('#list-miniatura3').html(portada.html());
          $('#list-miniatura4').html(galeria.html());

          //tabla precios resumen
          $('#tabla_precios2').DataTable().clear().draw(false);
          var tabla =$('#tabla_precios').DataTable().rows().data().toArray();
          for (var i = 0; i < tabla.length; i++) {
            $('#tabla_precios2').DataTable().row.add( [
                tabla[i][0],
                tabla[i][1],
                tabla[i][2],
                tabla[i][3],
                tabla[i][4],
                tabla[i][5],
                tabla[i][6],
            ] ).draw( false );
          }

          //mostrar resumen
          var current_fs= $('#formulario_vi');
          var next_fs=$('#resumen');
          next_fs.show();
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
      }else {
        alert('Ingrese al menos una fecha');
      }
    });

    $("#ant_res").click(function(e){
      e.preventDefault();
      //mostrar resumen
      var current_fs= $('#resumen');
      var previous_fs=$('#formulario_vi');
      $('#topcontrol').trigger("click");
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

    $("#guardar").click(function(e){
      e.preventDefault();
      //datos
      var datos =new FormData($("#form_alta_act")[0]);
      var datos_fechasvar=JSON.stringify($('#tabla_precios').DataTable().rows().data().toArray());
      datos.append('tabla',datos_fechasvar);
      //ajax
      $.ajax({
        url: '/src/Controller/actividadController.php',
        type: 'POST',
        contentType: false,
        cache: false,
        processData: false,
        data: datos
      })
      .done(function(e) {
        console.log(e);
        if (e === 'exito') {
          Swal(
            'Exito',
            'Experiencia añadida',
            'success'
          );
          //redireccionar a tabla
          window.open('../../view/anfitrion/panel.php');
        }else {
          Swal({
            type: 'error',
            title: 'Error',
            text: e
          })
        }
      })
      .fail(function(e) {
        console.log(e);
      })
    });
    // #end


    // #region Fechas
    $('#addFecha').on('click', function(e) {
      //Validar datos
      $( "#fecha_inicio" ).rules( "add", {
        required:true
      });
      $( "#hora_inicio" ).rules( "add", {
        required:true
      });
      $( "#duracion_horas" ).rules( "add", {
        required:true,
        min: 1
      });
      $( "#tarifa_persona" ).rules( "add", {
        required:true,
        min: 1
      });
      $( "input[name=moneda]" ).rules( "add", {
        required:true
      });

      if ($('.steps').valid()) {
        $('#tabla_precios').DataTable().row.add( [
            $( "#fecha_inicio" ).val(),
            $( "#hora_inicio" ).val(),
            $( "#duracion_horas" ).val(),
            $( "#tarifa_persona" ).val(),
            $("input[name=moneda]:checked").val(),
            $( "#cargo_adicional" ).val(),
            $( "#desc_cargo" ).val(),
            '<td class="text-center"><button type="button" class="btn bg-red "><i class="fa fa-times"></i></a></td></div>'
        ] ).draw( false );

        $( "#fecha_inicio" ).rules( "remove" );
        $( "#hora_inicio" ).rules( "remove" );
        $( "#duracion_horas" ).rules( "remove" );
        $( "#tarifa_persona" ).rules( "remove" );
        $( "input[name=moneda]" ).rules( "remove" );

        $( "#fecha_inicio" ).val('');
        $( "#hora_inicio" ).val('');
        $( "#duracion_horas" ).val('');
        $( "#tarifa_persona" ).val('');
        $( "#cargo_adicional" ).val('');
        $( "#desc_cargo" ).val('');
      }

    });

    $(document).on('click','.bg-red',function(e){
        var index = $('#tabla_precios').DataTable().cell($(this).closest('td, li')).index();
        $('#tabla_precios').DataTable().row(index.row).remove().draw(false);
    });
    // #end

    // #region Imagenes
    function handleFileSelect(evt) {
        var files = evt.target.files; // FileList object

        var element = "";
        if (evt.target.id === "files"){
            element = "list-miniatura";
        } else {
            element = "list-miniatura2";
        }
        // Loop through the FileList and render image files as thumbnails.
        //cuando se cancela
        if ((files.length>0 && element == "list-miniatura")  || (files.length>=4 && element == "list-miniatura2") ) {
          if (evt.target.id === "files"){
            $('#list-miniatura').children('span').remove();
          }else {
            $("#list-miniatura2").html('');
          }
          for (var i = 0, f; f = files[i]; i++) {
              // Only process image files.
              if (!f.type.match('image.*')) {
                  alert('Selecciona una imagen valida.');
                  if (evt.target.id === "files"){
                      $("#list-miniatura").children('span').remove();
                      $('#files').val('');
                  }else {
                    $("#list-miniatura2").html('');
                    $('#files2').val('');
                  }
                  continue;
              }
              var reader = new FileReader();
              // Closure to capture the file information.
              reader.onload = (function(theFile) {
                  return function(e) {
                      //quitar imagen de portada

                      // Render thumbnail.
                      var span = document.createElement('span');
                      span.innerHTML = ['<div class="col-md-3 col-sm-3 col-xs-12"><center><img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/><br><p class="texto_galeria">Nombre: <span class="sub_texto_galeria">', escape(theFile.name), '</span></p><p class="texto_galeria">Tamaño: <span class="sub_texto_galeria">', escape(theFile.size), ' bytes </span></p><p class="texto_galeria">Tipo: <span class="sub_texto_galeria">', escape(theFile.type), '</span></p><br><br></center></div>'].join('');
                      document.getElementById(element).insertBefore(span, null);
                  };
              })(f);
              // Read in the image file as a data URL.
              reader.readAsDataURL(f);
          }
        }else {
          if (evt.target.id === "files"){
              $("#list-miniatura").children('span').remove();
              $('#files').val('');
          }else {
              alert('Elija al menos 4 imagenes');
              $("#list-miniatura2").html('');
              $('#files2').val('');
          }
        }

    }
    document.getElementById('files').addEventListener('change', handleFileSelect, false);
    document.getElementById('files2').addEventListener('change', handleFileSelect, false);
    // #end


});
