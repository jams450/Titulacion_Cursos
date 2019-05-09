$(document).on('ready', function(){

    //------- Google Maps ---------//

    // Creating a LatLng object containing the coordinate for the center of the map
    var latlng = new google.maps.LatLng(19.3340783, -99.204513);

    // Creating an object literal containing the properties we want to pass to the map
    var options = {
        zoom: 17, // This number can be set to define the initial zoom level of the map
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP // This value can be set to define the map type ROADMAP/SATELLITE/HYBRID/TERRAIN
    };
    // Calling the constructor, thereby initializing the map
    var map = new google.maps.Map(document.getElementById('map_div'), options);

    // Define Marker properties
    var image = new google.maps.MarkerImage('/assets/images/marker1.png',
        new google.maps.Size(46, 57),
        new google.maps.Point(0,0),
        new google.maps.Point(18, 42)
    );

    // Add Marker
    var marker1 = new google.maps.Marker({
        position: new google.maps.LatLng(19.3340783, -99.204513),
        map: map,
        icon: image // This path is the custom pin to be shown. Remove this line and the proceeding comma to use default pin
    });


    // Create information window
    function createInfo(title, content) {
        return '<div class="infowindow"><span>'+ title +'</span>'+content+'</div>';
    }

});