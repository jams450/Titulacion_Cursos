$(document).ready(function(){
	//------- Google Maps ---------//
    var map, infoWindow;
    // Creating a LatLng object containing the coordinate for the center of the map
    var latlng = new google.maps.LatLng(53.385846,-1.471385);
    // Creating an object literal containing the properties we want to pass to the map
    var options = {
        zoom: 15, // This number can be set to define the initial zoom level of the map
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP // This value can be set to define the map type ROADMAP/SATELLITE/HYBRID/TERRAIN
    };
    var pos = { };
    var markers = [];
    function initMap() {
        map = new google.maps.Map(document.getElementById('map_div'), options);
        infoWindow = new google.maps.InfoWindow;

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                console.log(pos.lat+"-"+pos.lat);
                infoWindow.setPosition(pos);
                infoWindow.setContent('Wiyoi Cerca de ti.');
                infoWindow.open(map);
                map.setCenter(pos);
            }, function() {
                handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }
    }

    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
            'Error: The Geolocation service failed.' :
            'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
    }

	// Calling the constructor, thereby initializing the map
	//var map = new google.maps.Map(document.getElementById('map_div'), options);
    initMap();
    console.log(search+"---"+city+"---"+tipoActividad);

    getActividades(search,city,tipoActividad);
    $("#searcher").submit(function(e){
        e.preventDefault();
        var search = $('#searching').val();
        var inCity = $('#ciudad').val();
        var inTipoActividad = $('#tipo_actividad').val();
        //console.log(search+" - "+inCity+" - "+inTipoActividad);
        $("#resultadosActividades").empty();
        getActividades(search,inCity,inTipoActividad);
        return false;
    });

    /**
     Buscador
     Buscar por ciudad, id del tipo actividad, y keywords en columna nombre y descripcion actividad
     AND actividades.nombre_evento LIKE '%tren%'
     AND descripcion_actividad.descripcion_actividad LIKE '%tren%'
     */
    function getActividades(search = "", ciudad = "", tipo_actividad = ""){
        $(".page-loading").css("display","block");
        console.log(search+" - "+ciudad+" - "+tipo_actividad);
        var data = {};
        reloadMarkers();
        if (search == "" && ciudad == "" && tipo_actividad == ""){
            data = {"lista_actividades" : "lista_actividades"};
            $('#notaBusqueda').text("");
        }else{
            data = {"search" : search, "ciudad" : ciudad, "tipo_actividad" : tipo_actividad};
            $('#notaBusqueda').text("Resultados de busqueda");
        }
        var infowindow =  new google.maps.InfoWindow({
            content: ''
        });
        //ajax get actividades
        $.ajax({
            data: data,
            type: "POST",
            dataType: "json",
            url: "src/Controller/actividadController.php"
        })
            .done(function( data ) {
                //recorrer cada actividad
                for (item in data.actividades.data) {
                    var divMain = '<div class="col-md-6"><div class="recent-places-box">' +
                        '<div class="recent-place-thumb">' +
                            '<a href="view/servicio-actividad/list-detail.php?ida='+data.actividades.data[item].idActividad+'&iddp='+data.actividades.data[item].id_datos_precio_actividad+'&idpa='+data.actividades.data[item].id_precios_actividad+'" title="'+data.actividades.data[item].tituloActividad+'">' +
                                '<img class="img-responsive img-thumbnail" width="245px" height="209px" src="'+data.actividades.data[item].srcImagenportada+data.actividades.data[item].nombreImagenportada+'" alt="'+data.actividades.data[item].nombreImagenportada+'">' +
                            '</a>' +
                        '</div>' +
                        '<div class="recent-place-detail">' +
                            '<div class="listing-box-title">' +
                                '<h3>' +
                                    '<a href="view/servicio-actividad/list-detail.php?ida='+data.actividades.data[item].idActividad+'&iddp='+data.actividades.data[item].id_datos_precio_actividad+'&idpa='+data.actividades.data[item].id_precios_actividad+'" title="'+data.actividades.data[item].tituloActividad+'">'+data.actividades.data[item].tituloActividad+'</a>' +
                                '</h3>' +
                                '<span>acerca del lugar</span>' +
                                '<span>' + data.actividades.data[item].ciudad +'</span>' +
                            '</div>' +
                            '<span>$'+data.actividades.data[item].precio_persona+'</span>' +
                            '<div class="listing-rate-share">' +
                                '<div class="rated-list">' +
                                    '<b class="la la-star"></b><b class="la la-star"></b><b class="la la-star"></b><b class="la la-star-o"></b><b class="la la-star-o"></b>' +
                                    '<span></span>' +
                                '</div>' +
                                '<span></span>' +
                                '<span><i class="la la-share-alt"></i></span>' +
                                '<a href="#" title=""><i class="la la-heart-o"></i></a>' +
                            '</div>' +
                            '</div>' +
                        '</div></div>';

                    $("#resultadosActividades").append(divMain);
                    var image = new google.maps.MarkerImage('/assets/images/marker1.png',
                        new google.maps.Size(46, 57),
                        new google.maps.Point(0,0),
                        new google.maps.Point(18, 42)
                    );
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(data.actividades.data[item].lat,data.actividades.data[item].lng),
                        map: map,
                        icon: image,
                        animation: google.maps.Animation.DROP
                    });
                    markers.push(marker);
                    var content = '<div class="listing-list">' +
                        '<div class="recent-places-box">' +
                        '<div class="recent-place-thumb"> ' +
                        '<a href="view/servicio-actividad/list-detail.php?ida='+data.actividades.data[item].idActividad+'&iddp='+data.actividades.data[item].id_datos_precio_actividad+'&idpa='+data.actividades.data[item].id_precios_actividad+'" title="'+data.actividades.data[item].tituloActividad+'"" title="">' +
                        '<img src="'+data.actividades.data[item].srcImagenportada+data.actividades.data[item].nombreImagenportada+'" alt="'+data.actividades.data[item].nombreImagenportada+'">' +
                        '</a>' +
                        '</div>' +
                        '<div class="recent-place-detail">' +
                        '<div class="listing-box-title">' +
                        '<h3>' +
                        '<a href="view/servicio-actividad/list-detail.php?ida='+data.actividades.data[item].idActividad+'&iddp='+data.actividades.data[item].id_datos_precio_actividad+'&idpa='+data.actividades.data[item].id_precios_actividad+'" title="'+data.actividades.data[item].tituloActividad+'">'+data.actividades.data[item].tituloActividad+'</a>' +
                        '</h3>' +
                        '<span>Acerca del lugar</span> ' +
                        '<span>$'+data.actividades.data[item].precio_persona+'</span>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>';
                    bindInfoWindow(marker, map, infowindow, content);
                }
                $(".page-loading").css("display","none");
            })
            .fail(function( jqXHR, textStatus, errorThrown ) {
                if ( console && console.log ) {
                    console.log( "La solicitud a fallado: " +  textStatus);
                }
                $('#notaBusqueda').text("Sin Resultados");
                $(".page-loading").css("display","none");
            });
    }

    var bindInfoWindow = function(marker, map, infowindow, html) {
        google.maps.event.addListener(marker, 'click', function() {
            infowindow.setContent(html);
            infowindow.open(map, marker);
        });
    }

    function reloadMarkers() {
        // Loop through markers and set map to null for each
        for (var i=0; i<markers.length; i++) {
            markers[i].setMap(null);
        }
        // Reset the markers array
        markers = [];
        return 0;
    }
});
