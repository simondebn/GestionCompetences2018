function initMap() {
    var config_google_maps = {
        center: {lat: 47.351861, lng: 0.6613099},
        zoom: 7,
        clickableIcons: false,
        fullscreenControl: false,
        streetViewControl: false
    };

    if ($('#map').length) {
        if (window.location.pathname.includes('/recherche')) {
            $.ajax({
                url: "map",
                type: 'POST',
                data:
                    {
                        myFunction: 'getAllLocations',
                        recherche : $("#search_test").text(),
                    },
                success: function (data) {
                    console.log(data);
                    console.log($("#search_test").text());
                    var json = JSON.parse(data);
                    var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    var markers = [];
                    var index = 0;
                    $.each(json, function (id, values) {
                        markers.push(new google.maps.Marker({
                            position: {
                                lat: parseFloat(values['lat_entreprise']),
                                lng: parseFloat(values['lon_entreprise'])
                            },
                            //label: labels[index % labels.length]
                        }));
                        index++;
                    });

                    var map = new google.maps.Map(document.getElementById('map'), config_google_maps);
                    var markerCluster = new MarkerClusterer(map, markers, {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
                }
            });
        } else {
            $.ajax({
                url: "main",
                type: 'POST',
                data:
                    {
                        myFunction: 'getAllLocations',
                    },
                success: function (data) {
                    var json = JSON.parse(data);
                    var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    var markers = [];
                    var index = 0;
                    $.each(json, function (id, values) {
                        markers.push(new google.maps.Marker({
                            position: {
                                lat: parseFloat(values['lat_entreprise']),
                                lng: parseFloat(values['lon_entreprise'])
                            },
                            //label: labels[index % labels.length]
                        }));
                        index++;
                    });

                    var map = new google.maps.Map(document.getElementById('map'), config_google_maps);
                    var markerCluster = new MarkerClusterer(map, markers, {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
                }
            });
        }
    }
}

