<?php
/**
 * Created by PhpStorm.
 * User: jmpg
 * Date: 11/28/18
 * Time: 1:08 AM
 */

session_start();
?>
<!DOCTYPE html>
<head>
    <?php include_once('../../common/head.php'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
<div class="page-loading">
    <div class="loadery"></div>
</div>
<div class="theme-layout">

    <?php include_once('../../common/menu.php'); ?>
    <section>
        <div class="block gray remove-top">
            <div class="row">
                <div class="col-md-12">
                    <div class="list-detail-sec">
                        <div id="">
                            <div class="row">
                                <div class="list-detail-box" id="foto_portada">
                                    <div class="list-detail-info">
                                        <h3 id="nombre_actividad"></h3>
                                        <span id="acerca_del_lugar"></span>
                                        <br>
                                        <div class="rated-list">
                                            <b class="la la-star"></b>
                                            <b class="la la-star"></b>
                                            <b class="la la-star"></b>
                                            <b class="la la-star-o"></b>
                                            <b class="la la-star-o"></b>
                                            <span>(13)</span>
                                        </div>
                                        <ul class="list-detail-metas">
                                            <li><a href="#" title=""><i class="la la-heart-o"></i>Add to favorites</a></li>
                                            <li><a href="#" title=""><i class="la la-repeat"></i>Compare</a></li>
                                            <li><a href="#" title=""><i class="la la-print"></i>Print</a></li>
                                            <li><a href="#" title=""><i class="la la-share-alt"></i>Share</a></li>
                                        </ul>
                                        <a href="#" title="" class="write-review" id="lugaresDisponibles"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="link-bars">
                            <div class="container">
                                <a href="#description" title="">DESCRIPCIÓN DE LA ACTIVIDAD</a>
                                <a href="#hours" title="">HORARIO</a>
                                <a href="#reservaciones" title="">RESERVACIONES</a>
                                <!--a href="#contact" title="">CONTACTO</a-->
                                <!-- <a href="#review" title="">REVIEW </a> -->
                            </div>
                        </div>
                        <div class="mian-listing-detail">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-9 column">
                                        <div class="description-detail-box" id="description">
                                            <h3 class="mini-title">Descripción de la actividad</h3>
                                            <div class="detail-descriptions">
                                                <!-- <div class="amenities-sec">
                                                    <h3>Amenities</h3>
                                                    <span><i class="la la-check-circle"></i>Wi-Fi</span>
                                                    <span><i class="la la-check-circle"></i>Daily Specials</span>
                                                    <span><i class="la la-check-circle"></i>Take-out</span>
                                                    <span><i class="la la-check-circle"></i>Free Parking</span>
                                                    <span><i class="la la-check-circle"></i>Reservations</span>
                                                    <span><i class="la la-check-circle"></i>Serves Alcoho</span>
                                                    <span><i class="la la-check-circle"></i>Credit Card Payment</span>
                                                    <span><i class="la la-check-circle"></i>Wheelchair Accessible</span>
                                                    <span><i class="la la-check-circle"></i>Online Ordering</span>
                                                </div> -->
                                            </div>
                                        </div>
                                        <div class="hours-box" id="hours">
                                            <h3 class="mini-title">HORARIO</h3>
                                            <div class="opening-hours-box">
                                            </div>
                                        </div>
                                        <!-- <div class="location-box" id="location">
                                            <h3 class="mini-title">LOCATION</h3>
                                            <div class="list-location">
                                                <a class="map-btn" href="#" title=""><i class="la la-map-marker"></i> Map</a>
                                                <a class="street-map-btn" href="#" title=""><i class="la la-street-view"></i> Street Map</a>
                                                <a class="direction-btn" href="#" title=""><i class="la la-mail-forward"></i> Direction</a>
                                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d5925803.412513284!2d-97.57383311511944!3d37.73518855206203!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1506528387794" style="border:0" allowfullscreen></iframe>
                                            </div>
                                        </div> -->
                                        <div class="contactinfo-box" id="reservaciones">
                                            <h3 class="mini-title">Reservado por:</h3>
                                            <!--div class="contact-info-list">
                                            </div-->
                                            <div class="review-list-sec">
                                                <ul id="reservacionesContent">

                                                </ul>
                                                <small><a href="#">Ver panel de reservaciones</a></small>
                                            </div>
                                        </div>
                                        <!--
                                        <div class="display-review-box" id="review">
                                            <h3 class="mini-title">revıew</h3>
                                            <div class="review-list-sec">
                                                <ul>
                                                    <li>
                                                        <div class="review-list">
                                                            <div class="review-avatar"> <img src="http://placehold.it/90x90" alt="" /> </div>
                                                            <div class="reviewer-info">
                                                                <h3><a href="#" title="">Jamies Giroux</a></h3>
                                                                <span>7 months ago</span>
                                                                <p>Donec nec tristique sapien. Aliquam ante felis, sagittis sodales diam sollicitudin, dapibus semper turpis</p>
                                                            </div>
                                                            <div class="reviewer-stars">
                                                                <b class="la la-star"></b>
                                                                <b class="la la-star"></b>
                                                                <b class="la la-star"></b>
                                                                <b class="la la-star"></b>
                                                                <b class="la la-star"></b>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="review-list">
                                                            <div class="review-avatar"> <img src="http://placehold.it/90x90" alt="" /> </div>
                                                            <div class="reviewer-info">
                                                                <h3><a href="#" title="">Brian Krogsgard</a></h3>
                                                                <span>7 months ago</span>
                                                                <p>Donec nec tristique sapien. Aliquam ante felis, sagittis sodales diam sollicitudin, dapibus semper turpis</p>
                                                            </div>
                                                            <div class="reviewer-stars">
                                                                <b class="la la-star"></b>
                                                                <b class="la la-star"></b>
                                                                <b class="la la-star"></b>
                                                                <b class="la la-star"></b>
                                                                <b class="la la-star"></b>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        -->
                                        <!--
                                        <div class="add-review-box">
                                            <h3 class="mini-title">Rate & Wrıte a Revıew</h3>
                                            <div class="add-review-form">
                                                <div class="add-your-stars">
                                                    <h5>Your Rating</h5>
                                                    <div class="reviewer-stars">
                                                        <b class="la la-star"></b>
                                                        <b class="la la-star"></b>
                                                        <b class="la la-star"></b>
                                                        <b class="la la-star"></b>
                                                        <b class="la la-star"></b>
                                                    </div>
                                                </div>
                                                <form>
                                                    <input type="text" placeholder="Name *" />
                                                    <input type="text" placeholder="Email *" />
                                                    <input type="text" placeholder="Website *" />
                                                    <textarea placeholder="Comment *"></textarea>
                                                    <button type="submit">SUBMIT YOUR REVIEW</button>
                                                </form>
                                            </div>
                                        </div>
                                        -->
                                    </div>
                                    <aside class="col-md-3 column">
                                        <div class="widget">
                                            <h3 class="mini-title">INFORMACIÓN</h3>
                                            <div class="specifi-widget">
                                            </div>
                                        </div>
                                        <div class="widget">
                                            <h3 class="mini-title">GALERÍA</h3>
                                            <div class="photo-widget open-image">
                                                <div class="row">
                                                </div>
                                                <span id="total_galeria"></span>
                                            </div>
                                        </div>
                                        <!--div class="widget">
                                            <h3 class="mini-title">Tags</h3>
                                            <div class="tags-widget">
                                                <a href="#" title="">Wine</a>
                                                <a href="#" title="">Drink</a>
                                                <a href="#" title="">Champagne</a>
                                                <a href="#" title="">Cheese</a>
                                                <a href="#" title="">Bordeaux</a>
                                            </div>
                                        </div-->
                                    </aside>
                                </div>
                            </div>
                        </div>
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
                "detalleActividadRegistrada" : "detalleActividadRegistrada",
                "ia" : <?= $_GET['ida'] ?>,
                "dpa" : <?= $_GET['iddp'] ?>,
                "pa": <?= $_GET['idpa'] ?>,
                "iu" : <?=$_SESSION['id_sesion_usuario']?>
            },
            type: "POST",
            dataType: "json",
            url: "src/Controller/actividadController.php"
        })
            .done(function( data ) {
                if (data.actividades.data.length == 0 ){
                    alert("No se encontro la actividad o no esta disponible");
                    history.go(-1);
                }
                $("#foto_portada").css("background-size","100%").css("background-repeat","no-repeat").css("background-position","center")
                    .css("background-image","url(/"+data.actividades.data[0].srcImagenportada+data.actividades.data[0].nombreImagenportada+")");

                $( "#nombre_actividad" ).text(data.actividades.data[0].tituloActividad);
                $( "#acerca_del_lugar" ).text(data.actividades.data[0].usuarioNombre);
                data.actividades.data[0].tipoImagengaleria.forEach(element => {
                    var path = element['srcImagengaleria'] + element['nombreImagengaleria'];
                    var div = '<div class="col-md-6"><a href="'+path+'" title=""><img class="img-responsive img-thumbnail" width="100px" height="90px" src="'+path+'" alt="" /></a></div>';
                    $('div.photo-widget.open-image > div.row').append(div);
                });
                $( "#total_galeria" ).text("Total Galeria (" + data.actividades.data[0].tipoImagengaleria.length+")");
                var descripcion = "<h4>Descripción:</h4>"+"<p>" + data.actividades.data[0].descripcionActividad + "</p>";
                descripcion += "<h4>Acerca del lugar:</h4>"+"<p>" + data.actividades.data[0].acercaLugarActividad + "</p>";
                descripcion += "<h4>Servicios incluidos:</h4>"+"<p>" + data.actividades.data[0].serviciosIncluidosActividad + "</p>";
                descripcion += "<h4>Dirigido a:</h4>"+"<p>" + data.actividades.data[0].dirigidoActividad + "</p>";
                descripcion += "<h4>Notas adicionales:</h4>"+"<p>" + data.actividades.data[0].notasActividad + "</p>";
                descripcion += "<h4>Política de cancelación:</h4>"+"<p>" + data.actividades.data[0].politicaActividad + "</p>";
                descripcion += '<h4>Cargo adicional: '+data.actividades.data[0].descripcion_cargo+':</h4><p> '+data.actividades.data[0].cargo_adicional+'</p>';
                $( ".detail-descriptions" ).append(descripcion);
                /*var contact = "";
                if (data.actividades.data[0].empresaNombre == null &&
                    data.actividades.data[0].empresaPagina == null &&
                    data.actividades.data[0].empresaGiro == null &&
                    data.actividades.data[0].empresaTelefono == null ) {
                    contact = '<span><strong>Nombre:</strong>'+data.actividades.data[0].usuarioNombre+'</span>';
                } else {
                    contact = '<span><strong>Nombre:</strong>'+data.actividades.data[0].empresaNombre+'</span>';
                    contact+= '<span><strong>Giro:</strong>'+data.actividades.data[0].empresaGiro+'</span>';
                    contact+= '<span><strong>Página Web:</strong>'+data.actividades.data[0].empresaPagina+'</span>';
                }
                $( ".contact-info-list" ).append(contact);*/
                var horario = "<ul><li><h5>Fecha: "+data.actividades.data[0].fecha+
                    "</h5><span>Hora: "+data.actividades.data[0].hora+
                    "</span><span>Duración: "+data.actividades.data[0].duracion_horas+"</span></li></ul>";
                $( ".opening-hours-box" ).append(horario);
                var info = '<span><i class="la la-cog"></i>Tipo: '+data.actividades.data[0].tipoActividad+'</span>';
                info += '<span><i class="la la-user"></i>Número personas: '+data.actividades.data[0].personasActividad+'</span>';
                info += '<span><i class="la la-child"></i>¿Permiten niños?: '+(data.actividades.data[0].childActividad?'Si':'No')+'</span>';
                info += '<span><i class="la la-money"></i>Precio: '+data.actividades.data[0].precio_persona+'</span>';
                $( ".specifi-widget" ).append(info);
                var reservados = 0;
                data.actividades.reservacion.forEach(element => {
                    var reservaciones = '<li>' +
                            '<div class="review-list">' +
                                '<div class="review-avatar"> <img class="img-circle img-thumbnail img-responsive" src="/assets/images/usersData/'+ element.src_perfil +'" alt="" width="90" height="90" /> </div>\n' +
                                '<div class="reviewer-info">' +
                                    '<h3>Nombre Usuario: '+element.nombre+'</h3>' +
                                    '<h3>Nombre Solicitante: '+ element.solicitante+'</h3>' +
                                    '<p>Telefono:<span>'+element.telefonoSolicitante+'</span></p>' +
                                    '<p>Nota: <span>'+element.nota+'</span></p>' +
                                    '<p>Status: <span>'+element.pagado+'</span> Metodo de pago: <span>'+element.tipo_pago+'</span></p>' +
                                    '<p>N. Adultos: <span>'+element.numAdultos+'</span></p>' +
                                    '<p>N. Niños: <span>'+element.numChilds+'</span></p>' +
                                    '<p>Total: <span>'+element.total+'</span></p>' +
                                    '<p>Fecha de pago: <span>'+element.fechaPago+'</span></p>' +
                                '</div>'+
                            '</div></li>';

                        //'<p>'+element.solicitante+'</p>';
                    $('#reservacionesContent').append(reservaciones);
                    reservados = reservados + parseInt(element.numAdultos) + parseInt(element.numChilds);
                });
                var lugares = data.actividades.data[0].lugares_disponibles == null ? data.actividades.data[0].personasActividad : data.actividades.data[0].lugares_disponibles;
                var disponibles = lugares > 0 ? 'Lugares disponibles: '+lugares :  'Sin lugares disponibles';
                $('#lugaresDisponibles').append(disponibles);
                var foo = $('.open-image');
                foo.poptrox({
                    usePopupCaption: true
                });
                console.log(data.actividades.reservacion);
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