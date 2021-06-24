<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    const KELVIN = 273;

    function getCurrentWeather(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $city = $request->city ?? 'hanoi';
        $res = Http::get('api.openweathermap.org/data/2.5/weather' , [
            'q' => $city,
            'appid' => config('app.open_weather_key')
        ]);
        $content = $res->body();
        $data = json_decode($content);
        $temp = floor($data->main->temp - self::KELVIN);
        $nameCity = $data->name;
        $windSpeed = $data->wind->speed * 3.6;
        $weather = $data->weather[0]->main;
        $humidity = $data->main->humidity;
        return view('admin.weather.current', compact('temp', 'nameCity', 'windSpeed', 'weather', 'humidity'));
    }
}
