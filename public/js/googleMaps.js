function initMap() {
    if (window.location.pathname.includes('/main') || window.location.pathname.includes('/recherche')) {
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
                        label: labels[index % labels.length]
                    }));
                    index++;
                });

                var map = new google.maps.Map(document.getElementById('map'), {
                    center: {lat: 47.351861, lng: 0.6613099},
                    zoom: 9
                });
                var markerCluster = new MarkerClusterer(map, markers, {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
            }
        });
    }
}

