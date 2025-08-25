<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Weather;

class WeatherController extends Controller
{
    private $key;

    public function __construct()
    {
        $this->key = env('KEY_WEATHERSTACK');
    }


    public function buscarClima(Request $request)
    {
        $cep = $request->input('cep');
        $cidade = $request->input('cidade');

        if (!$cep && !$cidade) {
            return back()->with('error', 'Informe CEP ou cidade');
        }

        $data = $cidade ? $this->buscarPorCidade($cidade) : $this->buscarPorCep($cep);

        if ($this->isErroApi($data)) {
            return back()->with('error', $data['error']['info'] ?? 'Erro ao buscar o clima');
        }

        $weatherArray = $this->montarWeatherArray($data);

        $this->salvarWeather($weatherArray);

        return view('layouts.dash.contentDash', ['weather' => $weatherArray]);
    }


    public function telaComparar()
    {
        return view('layouts.compare.compareContent');
    }

    public function telaBuscar()
    {
        return view('layouts.dash.contentDash');
    }

    public function telaHistorico()
    {
        $weathers = Weather::orderBy('created_at', 'desc')->get();
        return view('layouts.history.contentHistory', compact('weathers'));
    }

    public function pesquisarHistorico(Request $request)
    {
        $query = Weather::query();

        if ($request->filled('busca')) {
            $busca = $request->input('busca');
            $query->where('cidade', 'like', "%$busca%")
                ->orWhere('pais', 'like', "%$busca%");
        }

        if ($request->filled('temperatura')) {
            $query->where('temperatura', $request->input('temperatura'));
        }

        if ($request->filled('data')) {
            $query->whereDate('created_at', $request->input('data'));
        }

        $weathers = $query->orderBy('created_at', 'desc')->get();

        return view('layouts.history.contentHistory', compact('weathers'));
    }


    public function compararCidades(Request $request)
    {
        $cidade1 = $request->input('cidade1');
        $cidade2 = $request->input('cidade2');

        if (!$cidade1 || !$cidade2) {
            return back()->with('error', 'Informe as duas cidades para comparar.');
        }

        // Processa cada cidade usando a função que já trata erros e salva
        $weather1 = $this->processarCidade($cidade1);
        $weather2 = $this->processarCidade($cidade2);

        // Se ambas falharem, retorna erro
        if (empty($weather1) && empty($weather2)) {
            return back()->with('error', 'Não foi possível buscar o clima das duas cidades.');
        }

        // Retorna a view com as cidades válidas
        return view('layouts.compare.compareContent', compact('weather1', 'weather2'));
    }




    private function buscarPorCidade($cidade)
    {
        return $this->chamarApi(['query' => $cidade]);
    }



    private function obterCidadePorCep($cep)
    {

        $response = Http::get("https://viacep.com.br/ws/{$cep}/json/");

        if ($response->failed() || isset($response['erro'])) {
            return null;
        }

        $dadosCep = $response->json();

        return $dadosCep['localidade'] ?? null;
    }

    private function buscarPorCep($cep)
    {
        $cidade = $this->obterCidadePorCep($cep);

        if (!$cidade) {
            return ['error' => ['info' => 'Não foi possível identificar a cidade pelo CEP']];
        }

        return $this->buscarPorCidade($cidade);
    }

    private function chamarApi(array $params)
    {
        $response = Http::get('https://api.weatherstack.com/current', array_merge([
            'access_key' => $this->key,
            'forecast_days' => 1
        ], $params));

        return $response->json();
    }


    private function isErroApi(array $data): bool
    {
        return isset($data['success']) && $data['success'] === false;
    }

    private function montarWeatherArray($data)
    {
        return [
            'cidade' => $data['location']['name'] ?? 'Desconhecida',
            'pais' => $data['location']['country'] ?? 'Desconhecido',
            'temperatura' => isset($data['current']['temperature']) ? $data['current']['temperature'] : 0,
            'descricao' => $data['current']['weather_descriptions'][0] ?? 'Sem descrição',
            'icone' => $data['current']['weather_icons'][0] ?? '',
            'umidade' => isset($data['current']['humidity']) ? $data['current']['humidity'] : 0,
            'vento' => isset($data['current']['wind_speed']) ? $data['current']['wind_speed'] : 0,
            'pressao' => isset($data['current']['pressure']) ? $data['current']['pressure'] : 0,
            'sensacao' => isset($data['current']['feelslike']) ? $data['current']['feelslike'] : 0,
            'cloudcover' => isset($data['current']['cloudcover']) ? $data['current']['cloudcover'] : 0,
            'uv_index' => isset($data['current']['uv_index']) ? $data['current']['uv_index'] : 0,
            'sunrise' => $data['current']['astro']['sunrise'] ?? '',
            'sunset' => $data['current']['astro']['sunset'] ?? '',
            'air_quality' => $data['current']['air_quality'] ?? []
        ];
    }



    private function salvarWeather(array $weatherArray)
    {
        Weather::create($weatherArray);
    }


    private function processarCidade(string $cidade): array
    {
        $data = $this->buscarPorCidade($cidade);

        if ($this->isErroApi($data)) {
            return []; 
        }

        $weatherArray = $this->montarWeatherArray($data);

        $this->salvarWeather($weatherArray);

        return $weatherArray;
    }
}
