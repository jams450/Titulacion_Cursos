<?php
session_start();
header("Location: no-disponible.php");
?>
<!DOCTYPE html>
	<head>
        <?php include_once('../common/head.php'); ?>
        <style>
            header.on-top {
                position: relative;
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
                            <div class="col-md-6">
                                <div class="inner-header">
                                    <h2>Alojamientos</h2>	
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
			<section>
				<div class="block no-padding">
					<div class="row no-gap">
						<div class="col-md-8">
							<!--div class="side-search-form">
								<form>
									<div class="row">
										<div class="col-md-4">
											<input type="text" class="input-style" placeholder="Keywords" />
										</div>
										<div class="col-md-4">
											<select data-placeholder="All Locations" class="chosen-select" tabindex="2">
												<option value="All Locations">Todos los lugares</option>
												<option value="United States">United States</option>
												<option value="United Kingdom">United Kingdom</option>
												<option value="Afghanistan">Afghanistan</option>
												<option value="Aland Islands">Aland Islands</option>
												<option value="Albania">Albania</option>
											</select>
										</div>
										<div class="col-md-4">
											<select data-placeholder="All Categories" class="chosen-select" tabindex="2">
												<option value="All Categories">Todas la categorías</option>
												<option value="Restaurants">Restaurants</option>
												<option value="Foods">Foods</option>
												<option value="Hotels">Hotels</option>
												<option value="Bars">Bars</option>
												<option value="PlayLands">PlayLands</option>
											</select>
										</div>
										<div class="col-md-12">
											<div class="filter-by-tags">
												<h3>Filter by tag:</h3>
												<div class="row">
													<div class="col-md-3">
														<p>
															<input class="styled-checkbox" id="styled-checkbox-2" type="checkbox" value="value1">
															<label for="styled-checkbox-2">Aceptan tarjetas</label>
														</p>
														<p>
															<input class="styled-checkbox" id="styled-checkbox-3" type="checkbox" value="value1">
															<label for="styled-checkbox-3">Bike Parking</label>
														</p>
													</div>
													<div class="col-md-3">
														<p>
															<input class="styled-checkbox" id="styled-checkbox-4" type="checkbox" value="value1">
															<label for="styled-checkbox-4">Street Parking</label>
														</p>
														<p>
															<input class="styled-checkbox" id="styled-checkbox-5" type="checkbox" value="value1">
															<label for="styled-checkbox-5">Cupones</label>
														</p>
													</div>
													<div class="col-md-3">
														<p>
															<input class="styled-checkbox" id="styled-checkbox-6" type="checkbox" value="value1">
															<label for="styled-checkbox-6">Alcohol</label>
														</p>
														<p>
															<input class="styled-checkbox" id="styled-checkbox-7" type="checkbox" value="value1">
															<label for="styled-checkbox-7">Pets Friendly</label>
														</p>
													</div>
													<div class="col-md-3">
														<p>
															<input class="styled-checkbox" id="styled-checkbox-8" type="checkbox" value="value1">
															<label for="styled-checkbox-8">Reservaciones</label>
														</p>
														<p>
															<input class="styled-checkbox" id="styled-checkbox-9" type="checkbox" value="value1">
															<label for="styled-checkbox-9">Good for Kids</label>
														</p>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<button type="submit">Update Listings</button>
										</div>
									</div>
								</form>
							</div-->
							<div class="results-sec">

								<div class="results-found">
									<div class="row" id="resultadosAlojamientos">

									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div id="map-container" class="fixed-this">
								<div id="map_div">&nbsp;</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<?php include_once('../common/footer.php'); ?>

			<?php include_once('../common/popups.php'); ?>

		</div>

		<?php include_once('../common/script.php'); ?>
		<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAmPaXRfpU6s-vrCkDBChbKeNYQMpeSsco=true&libraries=places"></script>
		<script type="text/javascript" src="assets/js/maps2.js"></script><!-- Maps2 -->
        <script>
            $( document ).ready(function(){
                $.ajax({
                    data: {
                        "lista_alojamientos" : "lista_alojamientos"
                        },
                    type: "POST",
                    dataType: "json",
                    url: "src/Controller/alojamientoController.php"
                })
                    .done(function( data ) {
                        for (item in data.alojamientos.data) {
                            var divMain = $("<div>").attr("class", "col-md-6");
                            var divFirst = $("<div>").attr("class", "recent-places-box");
                            var divThumb = $("<div>").attr("class", "recent-place-thumb");
                            var aImageParent = $("<a>").attr("href", "view/servicio-alojamiento/list-detail.php?ida="+data.alojamientos.data[item].idAlojamiento+"&iddp="+data.alojamientos.data[item].id_datos_precio_alojamiento+"&idpa="+data.alojamientos.data[item].id_datos_precio_alojamiento).attr("title", data.alojamientos.data[item].nombreAlojamiento);
                            var imgagePortada = $("<img>").attr("src", data.alojamientos.data[item].srcImagen+data.alojamientos.data[item].nombreImagen).attr("alt", "");
                            var divDetail = $("<div>").attr("class", "recent-place-detail");
                            var divTitle = $("<div>").attr("class", "listing-box-title");
                            var h3 = $("<h3>");
                            var asubH3 = $("<a>").attr("href", "view/servicio-alojamiento/list-detail.php?ida="+data.alojamientos.data[item].idAlojamiento+"&iddp="+data.alojamientos.data[item].id_datos_precio_alojamiento+"&idpa="+data.alojamientos.data[item].id_datos_precio_alojamiento).attr("title", data.alojamientos.data[item].nombreAlojamiento); asubH3.text(data.alojamientos.data[item].nombreAlojamiento);
                            var spanCity = $("<span>"); spanCity.text(data.alojamientos.data[item].nombreAloamiento); //city
                            var spanDireccion = $("<span>"); spanDireccion.text(data.alojamientos.data[item].colonia); //telefono
                            var spanEmail = $("<span>"); spanEmail.text();//mail
                            var spanPrice = $("<span>"); spanPrice.text(data.alojamientos.data[item].tarifa_noche);
                            var divRate = $("<div>").attr("class", "listing-rate-share");
                            var divList = $("<div>").attr("class", "rated-list");
                            var bStart1 = $("<b>").attr("class", "la la-star");
                            var bStart2 = $("<b>").attr("class", "la la-star");
                            var bStart3 = $("<b>").attr("class", "la la-star");
                            var bStart4 = $("<b>").attr("class", "la la-star-o");
                            var bStart5 = $("<b>").attr("class", "la la-star-o");
                            var spanTotal = $("<span>");
                            var spanEmpty = $("<span>");
                            //var iShare = $("<span>").attr("class", "la la-share-alt");
                            //var strongSubShare = $("<strong>"); strongSubShare.text("Share");
                            //var aHeart = $("<a>").attr("href", "#").attr("title", "");
                            //var iHeart = $("<i>").attr("class", "la la-heart-o");
                            var socialShare = '<span><i class="la la-share-alt"></i></span><a href="#" title=""><i class="la la-heart-o"></i></a>';

                            divMain.append(divFirst);
                            divFirst.append(divThumb);
                            divThumb.append(aImageParent);
                            aImageParent.append(imgagePortada);
                            divFirst.append(divDetail);
                            divDetail.append(divTitle);
                            divTitle.append(h3);
                            h3.append(asubH3);
                            divTitle.append(spanCity);
                            divTitle.append(spanDireccion);
                            divTitle.append(spanEmail);
                            divDetail.append(spanPrice);
                            divDetail.append(divRate);
                            divRate.append(divList);
                            divList.append(bStart1);
                            divList.append(bStart2);
                            divList.append(bStart3);
                            divList.append(bStart4);
                            divList.append(bStart5);
                            divList.append(spanTotal);
                            divRate.append(socialShare);
                            //spanEmpty.append(iShare);
                            //iShare.append(strongSubShare);
                            //divRate.append(aHeart);
                            //aHeart.append(iHeart);
                            $("#resultadosAlojamientos").append(divMain);
                            //console.log(data.alojamientos.data[item]);
                        }
                        //console.log(data);
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