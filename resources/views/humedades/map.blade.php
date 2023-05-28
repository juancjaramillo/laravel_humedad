<!DOCTYPE html>
<html>

<head>
    <title>Mapa</title>
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>

<body>
    <div id="map"></div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVNS1lqK1cBs0raTgMXDpg_Rxp6C20ZQ4"></script>
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 8,
                center: {
                    lat: 25.7617,
                    lng: -80.1918
                } // Miami coordinates
            });

            var cities = [{
                    name: 'Miami',
                    lat: 25.7617,
                    lng: -80.1918
                },
                {
                    name: 'Orlando',
                    lat: 28.5383,
                    lng: -81.3792
                },
                {
                    name: 'New York',
                    lat: 40.7128,
                    lng: -74.0060
                }
            ];

            cities.forEach(function(city) {
                var marker = new google.maps.Marker({
                    position: {
                        lat: city.lat,
                        lng: city.lng
                    },
                    map: map,
                    title: city.name
                });
            });
        }
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVNS1lqK1cBs0raTgMXDpg_Rxp6C20ZQ4&callback=initMap"></script>
</body>

</html>
