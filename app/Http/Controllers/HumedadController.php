<?php
/*-----------------------------------------------------------------------------------------
'Descripción :Humedad Controller 
'Autor : Juan Jaramillo . Aseo - Distrito. 
'Fecha de Creación :Mayo  27/2020 
'Fecha de Modificación :
'-------------------------------------------------------------------------------------------'
' Propósito : Maestro de Permisos'
............................................................................ '
'Entradas :Solicitud HTTP a la API de OpenWeatherMap para obtener los datos de la ciudad'
............................................................................ '
Proceso :
'............................................................................
'Modifcaciones : 'Consideraciones : 
*/

namespace App\Http\Controllers;

use App\Models\Humedad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HumedadController extends Controller
{
    public function index()
    {
        $humedades = Humedad::all();
        return view('humedades.index', compact('humedades'));
    }

    public function historico()
    {
       // $humedades = Humedad::all();
		$humedades = Humedad::paginate(10); // Obtener las humedades paginadas, 10 por página
        return view('humedades.historico', compact('humedades'));
		
		
    }

    public function store()
    {
        $ciudades = ['Miami', 'Orlando', 'New York'];
        foreach ($ciudades as $ciudad) {
            $response = Http::get('https://api.openweathermap.org/data/2.5/weather', [
                'q' => $ciudad,
                'appid' => config('services.open_weather_map.api_key'),
            ]);

            $humedad = $response->json()['main']['humidity'];
            Humedad::create([
                'ciudad' => $ciudad,
                'humedad' => $humedad,
            ]);
        }

        return redirect('/');
    }

    public function actualizarHumedades(Request $request)
    {
        // Código para actualizar las humedades
		// Definimos las ciudades para las cuales queremos obtener la humedad
        $ciudades = ['Miami', 'Orlando', 'New York'];
        $apiKey = env('OPENWEATHERMAP_API_KEY');

        $humedades = [];
		 // Iteramos sobre cada ciudad para obtener la humedad
        foreach ($ciudades as $ciudad) {
			 // Hacemos una solicitud HTTP a la API de OpenWeatherMap para obtener los datos de la ciudad
            $response = Http::get("https://api.openweathermap.org/data/2.5/weather?q={$ciudad}&appid=ee9ef08247c0c5eef508ac7828116fd8");
 
			// Verificamos si la solicitud fue exitosa
            if ($response->successful()) {

                $data = $response->json();
				 // Extraemos la humedad de la respuesta JSON
                $humedad = $response->json()['main']['humidity'];
                $lat = $data['coord']['lat'];
                $lon = $data['coord']['lon'];

                // $oneCallResponse = Http::get("https://api.openweathermap.org/data/2.5/onecall?lat={$lat}&lon={$lon}&appid={$apiKey}");
                $arr = $humedades[$ciudad] = [
                    'lat' => $lat,
                    'lon' => $lon,
                    'ciudad' => $ciudad,
                    'humidity' => $humedad,
                ];

                // Guardar los datos en la tabla Humedad
				 // Creamos un registro en la tabla 'Humedad' utilizando el modelo 'Humedad'
                Humedad::create([
                    'ciudad' => $ciudad,
                    'humedad' => $humedad,
                ]);
            }
        }

        //   return $humedades;
		// Redirigimos al usuario de vuelta a la página principal después de actualizar las humedades
        return view('humedades.index', compact('humedades'));
    }
}



