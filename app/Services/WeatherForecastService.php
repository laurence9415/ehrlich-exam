<?php

namespace App\Services;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class WeatherForecastService
{
    public function makeHttpRequest(): PendingRequest
    {
        return Http::withHeaders([
            'key' => config('weather.api_key')
        ])
            ->baseUrl(config('weather.url'));
    }

    public function getForecast(string $city): array
    {
        $response = $this->makeHttpRequest()->get('/current.json', [
            'q' => $city
        ]);

        return [
            'status' => $response->status(),
            'data' => $response->json()
        ];
    }
}
