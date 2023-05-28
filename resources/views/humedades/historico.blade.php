<!DOCTYPE html>
<html>
<head>
    <title>Humedades</title>
	 <!-- Agregar enlace al archivo CSS de Bootstrap desde un CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
	
	<!-- Enlazar los archivos CSS de Bootstrap desde un CDN en tu archivo historico.blade.php -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/dist/css/bootstrap.min.css">

</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Historico Humedad</h1>
        <form method="POST" action="{{ url('/') }}">
            @csrf
            <button type="submit" class="btn btn-primary">Regresar</button>
        </form>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Ciudad</th>
                    <th>Humedad</th>
                </tr>
            </thead>
            <tbody>
			<!-- Mostrar los datos de humedad -->
                @foreach ($humedades as $humedad)
                    <tr>
                        <td>{{ $humedad->ciudad }}</td>
                        <td>{{ $humedad->humedad }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

<!-- Agregar los enlaces de paginación utilizando los estilos de Bootstrap -->
<div class="d-flex justify-content-center">
    {{ $humedades->links() }}
</div>
    </div>
</body>
</html>


