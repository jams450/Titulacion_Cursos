<?php
    session_start();
    header("Location: no-disponible.php");
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
                        <div id="---listing-detail-carousel--">
							<div class="row">
								<div class="list-detail-box" id="foto_portada" >
									<div class="list-detail-info">
										<h3 id="nombre_alojamiento"></h3>
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
										<a href="#" title="" class="write-review">WrIte a RevIew</a>
									</div>
								</div>
							</div>
						</div>



						<div class="link-bars">
							<div class="container">
								<a href="#description" title="">DESCRIPCIÓN DEL ALOJAMIENTO</a>
								<a href="#hours" title="">HORARIO</a>
								<a href="#location" title="">DIRECCION</a>
								<a href="#contact" title="">CONTACTO</a>
								<a href="#review" title="">REVIEW </a>
							</div>
						</div>
						<div class="mian-listing-detail">
							<div class="container">
								<div class="row">
									<div class="col-md-9 column">
										<div class="description-detail-box" id="description">
											<h3 class="mini-title">Descripción de la propiedadd</h3>
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
										<div class="location-box" >
											<h3 class="mini-title">Dirección</h3>
											<div class="list-location" id="location">
												<!--a class="map-btn" href="#" title=""><i class="la la-map-marker"></i> Map</a>
												<a class="street-map-btn" href="#" title=""><i class="la la-street-view"></i> Street Map</a>
												<a class="direction-btn" href="#" title=""><i class="la la-mail-forward"></i> Direction</a>
												<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d5925803.412513284!2d-97.57383311511944!3d37.73518855206203!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1506528387794" style="border:0" allowfullscreen></iframe-->
											</div>
										</div>
										<div class="contactinfo-box" id="contact">
											<h3 class="mini-title">Contacto</h3>
											<div class="contact-info-list">
											</div>
										</div>
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
											<h3 class="mini-title" >Servicios</h3>
											<div class="list-tags-widget" id="amenidades">
											</div>
										</div>
                                        <div class="widget">
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
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="swiper-container col-md-12 col-sm-12 col-xs-12">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <div class="swiper-slide">

                            </div>
                        </div>
                        <!-- If we need pagination -->
                        <div class="swiper-pagination"></div>
                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev" id="prev"></div>
                        <div class="swiper-button-next" id="sig"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <?php include_once('../common/footer.php'); ?>

    <?php include_once('../common/popups.php'); ?>

</div>

<!-- Script -->
<?php include_once('../common/script.php'); ?>

<script>
		$( document ).ready(function(){
				$.ajax({
                    data: {
                        "detalle_alojamiento" : "detalle_alojamiento",
                        "filter" : {
                            "alojamiento.id_alojamiento" : <?= $_GET['ida'] ?>,
                            "datos_precio_alojamiento.id_datos_precio_alojamiento" : <?= $_GET['iddp'] ?>,
                            "precios_alojamiento.id_precio_alojamiento": <?= $_GET['idpa'] ?>
                            }
                        },
                    type: "POST",
                    dataType: "json",
                    url: "src/Controller/alojamientoController.php"
				})
				.done(function( data ) {
                        //console.log(data);
                        if (data.alojamiento.data.length == 0 ){
                            alert("No se encontro el alojamiento o no esta disponible");
                            history.go(-1);
                        }
				        //Portada
						$( "#foto_portada" ).css("background-size","80%").css("background-repeat","no-repeat").css("background-position","center")
                            .css("background-image","url(/"+data.alojamiento.data[0].srcImagen+data.alojamiento.data[0].nombreImagen+")");
						$( "#nombre_alojamiento").text(data.alojamiento.data[0].nombreAloamiento);
						$( "#acerca_del_lugar" ).text(data.alojamiento.data[0].usuarioNombre);

						//Galeria de imagenes
						data.alojamiento.data[0].tipoImagengaleria.forEach(element => {
							var path = element['srcImagengaleria'] + element['nombreImagengaleria'];
							var div = '<div class="col-md-6"><a href="'+path+'" title=""><img src="'+path+'" alt="" /></a></div>';
							$('div.photo-widget.open-image > div.row').append(div);
						});
						$( "#total_galeria" ).text("Total Galeria (" + data.alojamiento.data[0].tipoImagengaleria.length+")");
                        /**TODO falta agregas servicios que incluye*/
						//Descripción alojamiento
						var descripcion = "<h4>Nombre de la propiedad:</h4>"+"<p>" + data.alojamiento.data[0].nombreAloamiento + "</p>";
                            descripcion += "<h4>Descripción de la propiedad:</h4>"+"<p>" + data.alojamiento.data[0].descripcionAlojamiento + "</p>";
						descripcion += "<h4>Número de camas:</h4>"+"<p>" + data.alojamiento.data[0].num_camas + "</p>";
                        descripcion += "<h4>Número de sofacamas:</h4>"+"<p>" + data.alojamiento.data[0].sofa_camas + "</p>";
                        descripcion += "<h4>Número de dormitorios:</h4>"+"<p>" + data.alojamiento.data[0].num_dormitorios + "</p>";
                        descripcion += "<h4>Número de baños:</h4>"+"<p>" + data.alojamiento.data[0].num_banos + "</p>";

						descripcion += "<h4>Noches mínimo de hospedaje:</h4>"+"<p>" + data.alojamiento.data[0].min_noches + "</p>";
						descripcion += "<h4>Noches máximo de hospedaje:</h4>"+"<p>" + data.alojamiento.data[0].max_noches + "</p>";
						descripcion += "<h4>Días previos para reservar:</h4>"+"<p>" + data.alojamiento.data[0].prev_reserva + "</p>";
						descripcion += "<h4>Servicios adicionales:</h4>"+"<p>" + data.alojamiento.data[0].servicios_extras + "</p>";
                        descripcion += '<h4>puntos de interés: </h4><p>'+data.alojamiento.data[0].puntos_interes+'</p>';
                        descripcion += "<h4>Politicas de cancelación:</h4><p>"+ data.alojamiento.data[0].politica_cancelacion+"</p>";
						$( ".detail-descriptions" ).append(descripcion);

						//Datos de Contacto
						var contact = "";
						if (data.alojamiento.data[0].empresaNombre == null &&
								data.alojamiento.data[0].empresaPagina == null &&
								data.alojamiento.data[0].empresaGiro == null && 
								data.alojamiento.data[0].empresaTelefono == null ) {
							contact = '<span><strong>Nombre:</strong>'+data.alojamiento.data[0].usuarioNombre+'</span>';
						} else {
							contact = '<span><strong>Nombre:</strong>'+data.alojamiento.data[0].empresaNombre+'</span>';
							contact+= '<span><strong>Giro:</strong>'+data.alojamiento.data[0].empresaGiro+'</span>';
							contact+= '<span><strong>Página Web:</strong>'+data.alojamiento.data[0].empresaPagina+'</span>';
						}
						$( ".contact-info-list" ).append(contact);

						//Descripción precios
						var horario = "<div class='row'>" +
							"<div class='col-md-12 col-sm-12 col-xs-12'> <h5>Disponibilidad</h5></div>" +
                            "<div class='col-md-12'>" +
                                "<div class='col-md-3 col-sm-3 col-xs-12'> <h5>Fecha entrada: </h5><span>"+data.alojamiento.data[0].fecha_inicio+ "</span></div>" +
                                "<div class='col-md-3 col-sm-3 col-xs-12'> <h5>Hora de entrada: </h5><span>"+data.alojamiento.data[0].hora_llegada+ "</span></div>" +
                                "<div class='col-md-3 col-sm-3 col-xs-12'> <h5>Fecha salida: </h5><span>"+data.alojamiento.data[0].fecha_salida+ "</span></div>" +
                                "<div class='col-md-3 col-sm-3 col-xs-12'> <h5>Hora de salida: </h5><span>"+data.alojamiento.data[0].hora_salida+ "</span></div>" +
                            "</div>" +
							"<div class='col-md-6 col-sm-6 col-xs-12'> <h5>Tarifas</h5></div>" +
                            "<div class='col-md-12 col-sm-12 col-xs-12'>" +
                                "<div class='col-md-4 col-sm-4 col-xs-12'> <h5>Tarifa por noche: </h5><span>"+data.alojamiento.data[0].tarifa_noche+"</span></div>" +
                                "<div class='col-md-4 col-sm-4 col-xs-12'> <h5>Tarifa por limpieza: </h5><span>"+data.alojamiento.data[0].tarifa_limpieza+"</span></div>" +
                                "<div class='col-md-4 col-sm-4 col-xs-12'> <h5> "+data.alojamiento.data[0].describir_cargo + " : </h5><span>"+ data.alojamiento.data[0].cargo_adicional+"</span></div>" +
                            "</div>" ;
                        horario +="<div class='col-md-6 col-sm-6 col-xs-12'> <h5>Descuentos</h5> </div>" +
                                    "<div class='col-md-12 col-sm-12 col-xs-12'>" ;
						if  (data.alojamiento.data[0].descuento_siete != ""){
                            horario +=
                                "<div class='col-md-6 col-sm-6 col-xs-12'> <h5>Descuento por 7 noches: </h5><span>"+data.alojamiento.data[0].descuento_siete+"</span></div>";
                        }
                        if(data.alojamiento.data[0].descuento_treinta != ""){
                            horario +=
                                "<div class='col-md-6 col-sm-6 col-xs-12'> <h5>Descuento por 30 noches: </h5><span>"+data.alojamiento.data[0].descuento_treinta+"</span></div>";
                        }
                        if (data.alojamiento.data[0].descuento_siete == "" && data.alojamiento.data[0].descuento_treinta == ""){
                            horario +=
                                "<div class='col-md-6 col-sm-6 col-xs-12'> <h5>Este alojamiento no tiene descuentos</h5> </div>";
                        }
                        horario += "</div> </div>";
						$( ".opening-hours-box" ).append(horario);

                        //location
                        var direccion = "<div class='row'>" +
								"<div class='col-md-12 col-sm-12 col-xs-12'> <h5>Descripción de la ubicación:</h5><span>"+data.alojamiento.data[0].descripcion_ubicacion+"</span></div>" +
								"<div class='col-md-3 col-sm-3 col-xs-12'> <h5>Nombre edificio: </h5><span>"+data.alojamiento.data[0].nombre_edificio+ "</span></div>" +
								"<div class='col-md-12 col-sm-12 col-xs-12'> <h5>Direccion:</h5></div>" +
								"<div class='col-md-12'>" +
									"<div class='col-md-12 col-sm-12 col-xs-12'> " +
										"<p> <strong> Calle: </strong> "+data.alojamiento.data[0].calle+
										"<strong> Número int.: </strong> "+data.alojamiento.data[0].numero_int+
										"<strong> Número ext: </strong> "+data.alojamiento.data[0].numero_ext+
										"<strong> Número apartamento: </strong> "+data.alojamiento.data[0].no_apartamento+
										"<strong> C.P.: </strong> "+data.alojamiento.data[0].codigo_postal+ 
									"</p></div>" +
									"<div class='col-md-12 col-sm-12 col-xs-12'> "+
										"<p><strong>Colonia/Barrio: </strong> "+data.alojamiento.data[0].colonia+
										"<strong> Delegación/Muncipio: </strong> "+data.alojamiento.data[0].municipio +
										"<strong> Estado: </strong> "+data.alojamiento.data[0].estado +
										"<strong> Pais: </strong> "+data.alojamiento.data[0].pais +
									"</p></div>" +
                            	"</div>";
                        $( "#location" ).append(direccion);

						//Informacion
						var info = '<span><i class="la la-cog"></i>Tipo: '+data.alojamiento.data[0].tipo_alojamiento+'</span>';
						info += '<span><i class="la la-user"></i>Número personas: '+data.alojamiento.data[0].huesped_adultos+'</span>';
						info += '<span><i class="la la-child"></i>Número niños: '+data.alojamiento.data[0].huesped_child+'</span>';
						info += '<span><i class="la la-money"></i>Tarifa por noche: '+data.alojamiento.data[0].tarifa_noche+'</span>';
						$( ".specifi-widget" ).append(info);
						//console.log(contact);
				})
				.fail(function( jqXHR, textStatus, errorThrown ) {
						if ( console && console.log ) {
								console.log( "La solicitud a fallado: " +  textStatus);
						}
				});
				//servicios alojamiento
                $.ajax({
                    data: {
                        "tipo_servicios" : <?= $_GET['ida'] ?>
                    },
                    type: "POST",
                    dataType: "json",
                    url: "src/Controller/alojamientoController.php"
                })
                .done(function( data ) {
                    //console.log(data);
                    data.serviciosAlojamiento.data.forEach(element => {
                        var a = '<li><span><i class="la la-check-circle">'+element.nombre+'</i></span></li>';
                        $('#amenidades').append(a);
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