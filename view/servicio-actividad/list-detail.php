<?php
    session_start();
    if (!isset($_SESSION['id_sesion_usuario'])) {
        header("location: ../registro_usuario.php");
    }
    $error = isset($_GET['error']) ? 'block' : 'none';
?>
<!DOCTYPE html>
<head>
    <?php include_once('../common/head.php'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
<div class="page-loading">
	<div class="loadery"></div>
</div>
<div class="theme-layout">

    <?php include_once('../common/menu.php'); ?>

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
                                        <form action="/view/servicio-actividad/reserva_actividad.php" method="post">
                                            <input type="hidden" type="text" name="ida" value="<?=$_GET['ida']?>">
                                            <input type="hidden" type="text" name="iddp" value="<?=$_GET['iddp']?>">
                                            <input type="hidden" type="text" name="idpa" value="<?=$_GET['idpa']?>">
                                            <button class="write-review" id="reservar" type="submit">Reservar</button>
                                        </form>
									</div>
								</div>
							</div>
						</div>
						<div class="link-bars">
							<div class="container">
								<a href="#description" title="">DESCRIPCIÓN DE LA ACTIVIDAD</a>
								<a href="#hours" title="">HORARIO</a>
								<!-- <a href="#location" title="">Location</a> -->
								<a href="#contact" title="">CONTACTO</a>
								<a href="#review" title="">REVIEW </a>
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
										<div class="contactinfo-box" id="contact">
											<h3 class="mini-title">Contacto</h3>
											<div class="contact-info-list">
											</div>
										</div>
										<div class="display-review-box" id="review" style="display: none">
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
										<div class="add-review-box" id="questionFormDiv">
											<h3 class="mini-title">Preguntas ó Dudas?</h3>
											<div class="add-review-form" id="questionForm">
												<form method="post" action="/src/Controller/preguntasRespuestasController.php">
													<input type="text" name="nombre" placeholder="Nombre *" />
                                                    <input type="hidden" name="ida" value="" id="ida_qa">
                                                    <input type="hidden" name="idu" value="<?=$_SESSION['id_sesion_usuario']?>">
                                                    <input type="hidden" name="idan" value="" id="idan">
                                                    <input type="hidden" name="iddp" value="" id="iddpa_qa">
                                                    <input type="hidden" name="fecha" value="" id="dataTime">
													<textarea name="message" placeholder="Pregunta ó duda *"></textarea>
													<button type="submit" name="preguntaduda">Enviar Pregunta</button>
												</form>
											</div>
                                            <div class="add-review-form" id="alreadyAsk" style="display: none">
                                                <p>Revisa las preguntas y respuestas que has realizado en esta actividad <a href="" id="hrefQa">aquí</a></p>
                                            </div>
										</div>
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
									</aside>
								</div>
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
<script type="text/javascript" src="assets/js/choosen.min.js"></script><!-- Nice Select -->
<script>
		$( document ).ready(function(){
		    var datatmp = {};
				$.ajax({
						data: {
								"detalleActividad" : "detalletActividad",
								"filter" : {
									"actividades.id_actividad" : <?= $_GET['ida'] ?>,
									"datos_precio_actividad.id_datos_precio_actividad" : <?= $_GET['iddp'] ?>,
									"precios_actividad.id_precios_actividad": <?= $_GET['idpa'] ?>}},
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
							var div = '<div class="col-md-6"><a style="min-height: 90px;min-width: 100px;" href="'+path+'" title=""><img class="img-responsive img-thumbnail" src="'+path+'" alt="" width="100px" height="90px" /></a></div>';
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
						var contact = "";
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
						$( ".contact-info-list" ).append(contact);
						var horario = "<ul><li><h5>Fecha: "+data.actividades.data[0].fecha+
													"</h5><span>Hora: "+data.actividades.data[0].hora+
													"</span><span>Duración: "+data.actividades.data[0].duracion_horas+"</span></li></ul>";
						$( ".opening-hours-box" ).append(horario);
						var info = '<span><i class="la la-cog"></i>Tipo: '+data.actividades.data[0].tipoActividad+'</span>';
						info += '<span><i class="la la-user"></i>Número personas: '+data.actividades.data[0].personasActividad+'</span>';
						info += '<span><i class="la la-child"></i>¿Permiten niños?: '+(data.actividades.data[0].childActividad?'Si':'No')+'</span>';
						info += '<span><i class="la la-money"></i>Precio: '+data.actividades.data[0].precio_persona+'</span>';
						$( ".specifi-widget" ).append(info);
						// console.log(contact);
                        //Form to Ask
                        var fechaObj = new Date();
                        var options = { year: 'numeric', month: 'long', day: 'numeric' };
                        var seconds = fechaObj.getSeconds();
                        var minutes = fechaObj.getMinutes();
                        var hour = fechaObj.getHours();
                        var fecha = fechaObj.toLocaleDateString("es-ES", options) + "  "+ hour + ":" + minutes + ":" + seconds;
                        $('#ida_qa').val(data.actividades.data[0].idActividad);
                        $('#idan').val(data.actividades.data[0].idUsuario);
                        $('#iddpa_qa').val(data.actividades.data[0].id_datos_precio_actividad);
                        $('#dataTime').val(fecha);
						datatmp = data;
                        var foo = $('.open-image');
                        foo.poptrox({
                            usePopupCaption: true
                        });
				})
				.fail(function( jqXHR, textStatus, errorThrown ) {
						if ( console && console.log ) {
								console.log( "La solicitud a fallado: " +  textStatus);
						}
				});
            $.ajax({
                data: {
                    "userAsk" : "userAsk",
                    "ida" : <?= $_GET['ida'] ?>,
                    "idu" : <?= $_SESSION['id_sesion_usuario']?>,
                    "iddp" : <?= $_GET['iddp'] ?>,
                    "idan" : <?= $_SESSION['is_anfitrion'] ?>
                },
                type: "POST",
                dataType: "json",
                url: "src/Controller/preguntasRespuestasController.php"
            })
                .done(function( data ) {
                    console.log(data);
                    if(data.data != 0){
                        $('#questionForm').css("display","none");
                        $('#alreadyAsk').css("display","block");
                        var path = window.location.origin+'/view/usuarios/perfil/chat.php?id_qa='+data.data[0].id_qa;
                        $('#hrefQa').attr('href',path);
                    }else{
                        $('#questionForm').css("display","block");
                        $('#alreadyAsk').css("display","none");
                    }
                    if (data.owner == 1){
                        $('#questionFormDiv').css("display","none");
                    }
                })
                .fail(function( jqXHR, textStatus, errorThrown ) {
                    if ( console && console.log ) {
                        console.log( "La solicitud a fallado: " +  textStatus);
                    }
                });
				///view/servicio-actividad/checkout.php
				/*$("#reservar").on("click", function (e) {
				    e.preventDefault();
				    console.log(datatmp);
                });*/
		});
</script>
</body>
</html>