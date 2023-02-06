<?php

namespace App\Http\Controllers;

use App\Services\WeatherForecastService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

class WeatherController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'city' => ['required', 'string']
        ]);

        $response = (new WeatherForecastService)->getForecast($request->city);

        if ($response['status'] !== 200) {
            $request->session()->put('message', 'City not found');
            return redirect()->route('home');
        }

        $request->session()->forget('message');

        return Inertia::render('Weather', [
            'location' => $response['data']['location'],
            'current' => $response['data']['current'],
        ]);
    }
}
