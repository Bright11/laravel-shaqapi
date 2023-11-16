<?php



namespace App\helper;

use Illuminate\Support\Facades\Http;

class ApiClient
{
    public function makeRequest($endpoint, $method = 'GET', $data = [])
    {
        $response = Http::withHeaders([
            'Authorization'=>'Bearer' .env('MY_API_TOKEN'),
            'Accept' => 'application/json',
        ])->{$method}($endpoint, $data);

        return $response->json();
    }
}
