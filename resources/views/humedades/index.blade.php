<!DOCTYPE html>
<html>
<head>
    <title>Humedades</title>
	<!-- Enlace a los estilos CSS de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Humedad Ciudades</h1>
        <table class="table mt-6">
            <tbody>
                <tr>
                    <td>
					 <!-- Formulario para actualizar la humedad -->
                        <form method="POST" action="{{ url('/humedades') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary">Actualizar humedades</button>
                        </form>
                    </td>
                    <td><a class="btn btn-primary" href="{{ url('/historico') }}">Ver Historico</a></td>
                </tr>
            </tbody>
        </table>
        <h3 class="mt-5">Mapa</h3>
		 <!-- Mapa de Google Maps -->
        <div id="map"></div>
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzxxxxxxxxxxxxxxxxxxp6C20ZQ4"></script>
	 <!-- Script para cargar el mapa y los datos -->
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 4,
                center: {
                    lat: 32.7617,
                    lng: -83.1918
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


            @foreach ($humedades as $ciudad => $data)
                var marker = new google.maps.Marker({
                    position: {
                        lat: {{ $data['lat'] }},
                        lng: {{ $data['lon'] }}
                    },
                    map,
                    title: "{{ $data['ciudad'] }} ({{ $data['humidity'] }}% humidity)",
                });
            @endforeach
        }

        // Inicializar el mapa una vez se cargue la página
        google.maps.event.addDomListener(window, 'load', initMap);
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIxxxxxxxxxxxxxxxx0ZQ4&callback=initMap"></script>
</body>
</html>
