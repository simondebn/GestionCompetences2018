function addListenersMapsMarkers(markers) {
    $.each(markers, function(indice, marker) {
        marker.addListener('click', function () {
            modalClicList($(this)[0]['data_id']);
        });
    });
}

function initMap() {
    let config_google_maps = {
        center: {lat: 47.351861, lng: 0.6613099},
        zoom: 7,
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
                    let json = JSON.parse(data);
                    let labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    let markers = [];
                    let index = 0;
                    $.each(json, function (id, values) {
                        markers.push(new google.maps.Marker({
                            position: {
                                lat: parseFloat(values['lat_entreprise']),
                                lng: parseFloat(values['lon_entreprise'])
                            },
                            data_id: id
                            //label: labels[index % labels.length]
                        }));
                        index++;
                    });

                    let map = new google.maps.Map(document.getElementById('map'), config_google_maps);
                    let markerCluster = new MarkerClusterer(map, markers, {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});

                    addListenersMapsMarkers(markers);
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
                    let json = JSON.parse(data);
                    let labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    let markers = [];
                    let index = 0;
                    $.each(json, function (id, values) {
                        markers.push(new google.maps.Marker({
                            position: {
                                lat: parseFloat(values['lat_entreprise']),
                                lng: parseFloat(values['lon_entreprise'])
                            },
                            data_id: id
                            //label: labels[index % labels.length]
                        }));
                        index++;
                    });

                    let map = new google.maps.Map(document.getElementById('map'), config_google_maps);
                    let markerCluster = new MarkerClusterer(map, markers, {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});

                    addListenersMapsMarkers(markers);
                }
            });
        }
    }
}

