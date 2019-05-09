<?php
/**
 * Created by PhpStorm.
 * User: jmpg
 * Date: 1/14/19
 * Time: 12:11 AM
 */
session_start();
if(!isset($_SESSION['id_sesion_usuario'])) {
    header("location: ../../index.php");
}

?>
<!DOCTYPE html>
<head>
    <?php include_once('../common/head.php'); ?>
    <style>
        .img-side-1{
            float: right;
        }
        .img-side-2{
            float: left;
        }
        .user-1{
            -webkit-border-radius: 30px 0px 30px 30px;
            -moz-border-radius: 30px 0px 30px 30px;
            -ms-border-radius: 30px 0px 30px 30px;
            -o-border-radius: 30px 0px 30px 30px;
            border-radius: 30px 0px 30px 30px;
            float: right!important;
        }
        .user-2{
            -webkit-border-radius: 0px 30px 30px 30px;
            -moz-border-radius: 0px 30px 30px 30px;
            -ms-border-radius: 0px 30px 30px 30px;
            -o-border-radius: 0px 30px 30px 30px;
            border-radius: 0px 30px 30px 30px;
            float: left!important;
        }
        .user-1 > h3{
            text-align: right;
        }
        .user-2 > h3{
            text-align: left;
        }
        #rowsChat{
            max-height: 500px;
            overflow: scroll;
            height: 500px;
            margin-top: 10px;
        }
        section {
            top: 100px;
        }
        .block{
            padding: 0!important;
        }
        #questionForm{
            height: 250px;
            margin-top: 30px;
            margin-bottom: 170px;
        }
        .add-review-form > form textarea {
            min-height: 70px!important;
        }
        .add-review-form > form button{
            float: right;
        }
        .mini-title{
            text-align: end;
        }
        .faqs-box{
            background: #dadada none repeat scroll 0 0;
            width: 95%;
            margin-top: 1rem;
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
        <div class="block">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="inner-header">
                            <h2>Mensajes</h2>
                            <ul class="breadcrumbs">
                                <li><a href="/view/anfitrion/preguntas-respuestas.php?idan=<?=$_SESSION['id_sesion_usuario']?>" title="">preguntas & dudas</a></li>
                                <li>Mensajes</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <h3 id="adviceError" style="display: none"></h3>
    <section>
        <div class="block gray ">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="add-review-form column" id="rowsChat">

                        </div>
                        <div class="pagination">
                            <div class="add-review-form" id="questionForm">
                                <form method="post" id="addResponse">
                                    <h3 class="mini-title">Responder </h3>
                                    <input type="hidden" name="ida" value="" id="ida_qa">
                                    <input type="hidden" name="idu" value="" id="idu">
                                    <input type="hidden" name="idan" value="" id="idan">
                                    <input type="hidden" name="idnp" value="" id="idnp">
                                    <input type="hidden" name="idqa" value="" id="idqa">
                                    <textarea name="message" placeholder="Pregunta ó duda *" id="mensajeResponse"></textarea>
                                    <button type="submit" name="preguntaduda">Enviar Pregunta</button>
                                </form>
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
<!-- Script -->
<?php include_once('../common/script.php'); ?>
<script>
    $( document ).ready(function(){
        initChat();

        function initChat(){
            $('#rowsChat').empty();
            $('#mensajeResponse').val("");
            $.ajax({
                data: {
                    "getQuestionsListByActividad" : "getQuestionsListByActividad",
                    "id_qa" : <?=$_GET['id_qa']?>
                },
                type: "POST",
                dataType: "json",
                url: "src/Controller/preguntasRespuestasController.php"
            })
                .done(function( data ) {
                    if(data.status != 0){
                        $("#adviceError").toggle();
                        $("#adviceError").text("Ups! Hubo un problema. " + data.mensaje);
                    }
                    if (data.data.messages == null){
                        history.go(-1);
                    }
                    var claseTipoUsuario = "";
                    var imgSide = "";
                    //create chat
                    data.data.messages.map((item) => {
                        var usuario = data.data.usuario[0];
                        var anfitrion = data.data.anfitrion[0];
                        var path = "";
                        var nombre = "";
                        console.log(item.message);
                        if (anfitrion.id_usuario == item.usuario){
                            claseTipoUsuario = "user-1";
                            imgSide = "img-side-1";
                            path = "assets/images/usersData/"+anfitrion.src_perfil;
                            nombre = anfitrion.nombre;
                        }else{
                            claseTipoUsuario = "user-2";
                            imgSide = "img-side-2";
                            path = "assets/images/usersData/"+usuario.src_perfil;
                            nombre = usuario.nombre;
                        }
                        var div = '<div>' +
                            '           <div class="'+imgSide+'" ><a href="#" title="Imagen de perfil"><img src="'+path+'" class="img_logueo" alt="Imagen de perfil"></a></div>' +
                            '       <div class="faqs-box '+claseTipoUsuario+'">\n' +
                            '                            <h3>Usuario: '+nombre+'</h3>\n' +
                            '                            <div class="content-faq">\n' +
                            '                                <p>'+item.message+'</p>\n' +
                            '                            </div>\n' +
                            '                            <small>'+item.dataTime+'</small>' +
                            '                        </div>' +
                            '</div>';
                        //asignar usuario 1 a primer id y usuario 2 al segundo id en ciclo ir mostrando los mensajes que le corresponden a 1 y a 2 respectivamente
                        $('#rowsChat').append(div);
                    });
                    //add values to form
                    $("#ida_qa").val(data.data.id_actividad);
                    $("#idu").val(data.data.id_usuario);
                    $("#idan").val(data.data.id_anfitrion);
                    $("#idnp").val(0);
                    $("#idqa").val(data.data.id_qa);
                    $("#rowsChat").scrollTop($("#rowsChat")[0].scrollHeight);
                    console.log(data);
                    return true;
                })
                .fail(function( jqXHR, textStatus, errorThrown ) {
                    if ( console && console.log ) {
                        console.log( "La solicitud a fallado: " +  textStatus);
                        return false;
                    }
                });
        }
        //enviar respuesta
        $('#addResponse').submit(function (e) {
            $(".page-loading").css("display","block");
            e.preventDefault();
            var idu = $("#idu").val();
            var ida_qa = $("#ida_qa").val();
            var idan = $("#idan").val();
            var idnp = $("#idnp").val();
            var idqa = $("#idqa").val();
            var mensajeResponse = $("#mensajeResponse").val();
            var fechaObj = new Date();
            var options = { year: 'numeric', month: 'long', day: 'numeric' };
            var seconds = fechaObj.getSeconds();
            var minutes = fechaObj.getMinutes();
            var hour = fechaObj.getHours();
            var fecha = fechaObj.toLocaleDateString("es-ES", options) + "  "+ hour + ":" + minutes + ":" + seconds;
            $.ajax({
                data: {
                    "addResponseAnfitrion" : "addResponseAnfitrion",
                    "idu" : idu,
                    "ida_qa" : ida_qa,
                    "idan" : idan,
                    "idnp" : idnp,
                    "idqa" : idqa,
                    "fecha": fecha,
                    "mensajeResponse" : mensajeResponse
                },
                type: "POST",
                dataType: "json",
                url: "src/Controller/preguntasRespuestasController.php"
            })
                .done(function( data ) {
                    initChat();
                    console.log(data);
                    $(".page-loading").css("display","none");

                })
                .fail(function( jqXHR, textStatus, errorThrown ) {
                    if ( console && console.log ) {
                        console.log( "La solicitud a fallado: " +  textStatus);
                        $(".page-loading").css("display","none");
                    }
                });
        });

    });
</script>
</body>
</html>
