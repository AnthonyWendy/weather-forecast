<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;

Route::get('/', function () {
    return view('layouts/dash/dash');
});


Route::post('/weather/buscar', [WeatherController::class, 'buscarClima'])->name('weather.buscar');
Route::get('/weather/buscar',  [WeatherController::class, 'telaBuscar'])->name('weather.telaBuscar');

Route::get('/weather/compare', [WeatherController::class, 'telaComparar'])->name('weather.comparar');
Route::post('/weather/compare', [WeatherController::class, 'compararCidades'])->name('weather.compare');

Route::get('/weather/relatorio', [WeatherController::class, 'relatorio'])->name('weather.relatorio');
Route::get('/weather/historico', [WeatherController::class, 'telaHistorico'])->name('weather.historico');
Route::get('/historico/pesquisar', [WeatherController::class, 'pesquisarHistorico'])->name('weather.pesquisarHistorico');

