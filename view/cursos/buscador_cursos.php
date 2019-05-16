<!DOCTYPE html>

<head>
  <?php include_once('../common/head.php'); ?>
  <style>
    header.on-top {
      position: relative;
    }

    #topcontrol {
      display: none !important;
    }
  </style>
</head>

<body>

  <div class="page-loading">
    <div class="loadery"></div>
  </div>
  <div class="theme-layout">

    <?php include_once('../common/menu.php'); ?>

    <section>
      <div class="block no-padding">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="inner-header">
                <h2>Cursos</h2>
                <ul class="breadcrumbs">
                  <li><a href="/index.php" title="">Inicio</a></li>
                  <li>Cursos</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="block gray ">
        <div class="container">
          <div class="row">
            <div class="col-md-12 column">
              <div class="filter-bar">
                <div class="row">
                  <div class="col-md-4" style="font-size:20px; margin-top:10px">
                    <span id="total_resul"># Resultados Encontrados</span>
                  </div>
                  <div class="col-md-8">
                    <div class="row">
                      <div class="col-md-8">
                        <div class="side-search-form" style="padding:0">
                          <form id="form_buscador" >
                            <input type="text" name="nombre_buscar" id="nombre_buscar" class="input-style" placeholder="Buscar">
                          </form>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="open-filter-btns" id="buscar_curso" style="float:none; ">
          								<span style="width:150px">
                            <i class="la la la-search"></i>
                            Buscar
                          </span>
          							</div>
                      </div>
                    </div>

                  </div>
                </div>

              </div>

              <div class="columns-listings">
                <div class="row" id="lista_cursos">
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>
    <?php include_once('../common/footer.php'); ?>
    <?php include_once('../common/popups.php'); ?>
  </div>
  <?php include_once('../common/script.php'); ?>
  <script>
    $(document).ready(function() {
      $.ajax({
        url: '/src/Controller/controlador_cursos.php',
        type: 'POST',
        dataType: 'json',
        data: {operacion: 'get'}
      })
      .done(function(e) {
        var cursos=e;
        for (var i = 0; i < cursos.length; i++) {
          $('#lista_cursos').append(cursos[i]);
        }
        $('#total_resul').text(cursos.length+'  Resultados Encontrados');
      })

    });

    $('#buscar_curso').click(function(event) {
      buscador_cursos();
    });

    $('#form_buscador').submit(function(event) {
      event.preventDefault();
      buscador_cursos();
    });

    function buscador_cursos()
    {
      if ($('#nombre_buscar').val()!='') {
        $( ".bloque_curso" ).each(function( index ) {
          if ($(this).attr('id').toLowerCase().indexOf($('#nombre_buscar').val()) === -1)
              $(this).hide();
          else
              $(this).show();
        });

      }else {
        $('.bloque_curso').show();
      }
    }

  </script>
</body>

</html>
