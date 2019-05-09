<?php
session_start();
if (!isset($_SESSION['id_sesion_usuario'])) {
    header("location: ../../../index.php");
}
?>
<!DOCTYPE html>
<head>
    <?php include_once('../../common/head.php'); ?>
</head>
<body>
<div class="page-loading">
    <div class="loadery"></div>
</div>
<div class="theme-layout">

    <?php include_once('../../common/menu.php'); ?>

    <section>
        <div class="block no-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="inner-header">
                            <h2>Preguntas & Respuestas</h2>
                            <ul class="breadcrumbs">
                                <li><a href="#" title="">Home</a></li>
                                <li>Preguntas & Respuestas</li>
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
                    <div class="col-md-12" id="itemRows">
                        <h3 id="adviceError" style="display: none"></h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include_once('../../common/footer.php'); ?>

    <?php include_once('../../common/popups.php'); ?>
</div>
<!-- Script -->
<?php include_once('../../common/script.php'); ?>
<script>
    $( document ).ready(function(){
        $.ajax({
            data: {
                "getListQuestionsByUser" : "getListQuestionsByUser",
                "idu" : <?=$_SESSION['id_sesion_usuario']?>
            },
            type: "POST",
            dataType: "json",
            url: "src/Controller/preguntasRespuestasController.php"
        })
        .done(function( data ) {
            if(data.status == 1){
                $("#adviceError").toggle();
                $("#adviceError").text(data.mensaje);
            }
            if (data.data.length == 0){
                history.go(-1);
            }
            data.data.forEach(element => {
                var path = element['src'] + element['nombre_medio'];
                var div = '<div class="how-it-works">\n' +
                                '<div class="work-icon"> <img class="img-responsive" src="'+path+'" alt="" width="224" height="180"/> </div>\n' +
                                '<div class="work-detail">\n' +
                                    '<h3>'+element.nombre_evento+'</h3>\n' +
                                    '<h4>Chat con: '+element.nombre+'</h4>' +
                                    '<p>Revisa las preguntas que has reaalizado en esta actividad <a href="'+window.location.origin+'/view/usuarios/perfil/chat.php?id_qa='+element.id_qa+'" > aqui </a></p>\n' +
                                '</div>\n' +
                            '</div>';
                $('#itemRows').append(div);
            });
        })
        .fail(function( jqXHR, textStatus, errorThrown ) {
            if ( console && console.log ) {
                console.log( "La solicitud a fallado: " +  textStatus);
            }
        });
    });
</script>
</body>
</html>
