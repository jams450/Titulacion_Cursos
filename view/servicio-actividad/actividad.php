<?php
    session_start();
    $seach = isset($_GET['search']) ? $_GET['search'] : "";
    $city = isset($_GET['city']) ? $_GET['city'] : "";
    $tipoActividad = isset($_GET['tipoActividad']) ? $_GET['tipoActividad'] : "";
    unset($_GET['search']);
    unset($_GET['city']);
    unset($_GET['tipoActividad']);
?>
<!DOCTYPE html>
	<head>
        <?php include_once('../common/head.php'); ?>
        <style>
            header.on-top {
                position: relative;
            }
            #topcontrol{
                display: none!important;
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
                                    <h2>Experiencias</h2>
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
							<div class="side-search-form">
								<form id="searcher" name="searcher">
									<div class="row">
										<div class="col-md-4">
											<input type="text" name="searching" class="input-style" placeholder="Keywords" id="searching"/>
										</div>
										<div class="col-md-4">
											<select data-placeholder="All Locations" class="chosen-select" tabindex="2" id="ciudad">
												<option value="">Todos los lugares</option>
											</select>
										</div>
										<div class="col-md-4">
											<select data-placeholder="All Categories" class="chosen-select" tabindex="2" id="tipo_actividad">
												<option value="">Todas la categorías</option>
											</select>
										</div>
                                        <!--
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
										</div> -->
										<div class="col-md-12">
											<button type="submit" id="submitbtn">Buscar</button>
										</div>
									</div>
								</form>
							</div>
							<div class="results-sec">
                                <h3 id="notaBusqueda"></h3>
								<?php
                                /*
                                    $query = "SELECT COUNT(*) FROM actividades_experiencias";

                                    //echo $query;
                                    $resTotal=$conection->query($query);
                                    $i = 1;
                                    while ($row = $resTotal->fetch_array(MYSQLI_BOTH)){
                                            //echo $row['COUNT(*)'];
                                            echo "<span class=''>".$row['COUNT(*)']." registrados</span>";
                                    }
                                    $i = 1;
                                    */
                                ?>
								<div class="results-found">
									<div class="row" id="resultadosActividades">

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
        <script>

            var search  = '<?=$seach?>';
            var city  = '<?=$city?>';
            var tipoActividad  = '<?=$tipoActividad?>'
            $( document ).ready(function(){
                $.ajax({
                    data: {
                        "data" : "searcher",

                    },
                    type: "POST",
                    dataType: "json",
                    url: "src/Controller/metadataController.php"
                })
                .done(function(data) {
                    var option = $("<option>").attr("value","");
                    for(item in data.tipo_actividad){
                        var option = $("<option>").attr("value",data.tipo_actividad[item].ID);
                        $('#tipo_actividad').append(option);
                        option.text(data.tipo_actividad[item].tipo_actividad);
                    }
                    for(item in data.ciudad){
                        var option = $("<option>").attr("value",data.ciudad[item].ciudad);
                        $('#ciudad').append(option);
                        option.text(data.ciudad[item].ciudad);
                    }
                })
                .fail(function( jqXHR, textStatus, errorThrown ) {
                    if ( console && console.log ) {
                        console.log( "La solicitud a fallado: " +  textStatus);
                    }
                });
                /**
                 $.ajax({
                    data: {
                        "data" : "estados",
                        "id_pais" : "1"
                    },
                    type: "POST",
                    dataType: "json",
                    url: "src/Controller/metadataController.php"
                })
                 .done(function(data) {
                    var option = $("<option>").attr("value","");
                    for(item in data.estados){
                        var option = $("<option>").attr("value",data.estados[item].id_estado);
                        $('#ciudad').append(option);
                        option.text(data.estados[item].nombre);
                    }
                })
                 .fail(function( jqXHR, textStatus, errorThrown ) {
                    if ( console && console.log ) {
                        console.log( "La solicitud a fallado: " +  textStatus);
                    }
                });
                 */
                /**
                 *
                 $.ajax({
                data: {
                    "lista_actividades" : "lista_actividades"},
                type: "POST",
                dataType: "json",
                url: "src/Controller/actividadController.php"
            })
                 .done(function( data ) {
                for (item in data.actividades.data) {
                    var divMain = $("<div>").attr("class", "col-md-6");
                    var divFirst = $("<div>").attr("class", "recent-places-box");
                    var divThumb = $("<div>").attr("class", "recent-place-thumb");
                    var aImageParent = $("<a>").attr("href", "view/servicio-actividad/list-detail.php?ida="+data.actividades.data[item].idActividad+"&iddp="+data.actividades.data[item].id_datos_precio_actividad+"&idpa="+data.actividades.data[item].id_precios_actividad).attr("title", data.actividades.data[item].tituloActividad);
                    var imgagePortada = $("<img>").attr("src", data.actividades.data[item].srcImagenportada+data.actividades.data[item].nombreImagenportada).attr("alt", "");
                    var divDetail = $("<div>").attr("class", "recent-place-detail");
                    var divTitle = $("<div>").attr("class", "listing-box-title");
                    var h3 = $("<h3>");
                    var asubH3 = $("<a>").attr("href", "view/servicio-actividad/list-detail.php?ida="+data.actividades.data[item].idActividad+"&iddp="+data.actividades.data[item].id_datos_precio_actividad+"&idpa="+data.actividades.data[item].id_precios_actividad).attr("title", data.actividades.data[item].tituloActividad); asubH3.text(data.actividades.data[item].tituloActividad);
                    var spanCity = $("<span>"); spanCity.text("acerca del lugar"); //city
                    var spanTelefeono = $("<span>"); spanTelefeono.text(data.actividades.data[item].usuarioCelular); //telefono
                    var spanEmail = $("<span>"); spanEmail.text();//mail
                    var spanPrice = $("<span>"); spanPrice.text(data.actividades.data[item].precio_persona);
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
                    //divTitle.append(spanTelefeono);
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
                    divRate.append(spanEmpty);
                    divRate.append(socialShare);
                    //spanEmpty.append(iShare);
                    //iShare.append(strongSubShare);
                    //divRate.append(aHeart);
                    //aHeart.append(iHeart);
                    $("#resultadosActividades").append(divMain);
                    //console.log(item);
                }

            //console.log(data);
            })
                 .fail(function( jqXHR, textStatus, errorThrown ) {
                if ( console && console.log ) {
                    console.log( "La solicitud a fallado: " +  textStatus);
                }
            });*/
            });
        </script>
		<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDSnk9dEgww168WatGDK-FO9GHZ3WY7bRg&sensor=true&libraries=places"></script>
		<script type="text/javascript" src="assets/js/maps2.js"></script><!-- Maps2 -->
	</body>
</html>
