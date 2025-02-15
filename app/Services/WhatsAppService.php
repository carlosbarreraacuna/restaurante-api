<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WhatsAppService
{
    protected $accessToken;
    protected $phoneId;
    protected $apiVersion;

    public function __construct()
    {
        $this->accessToken = config('services.whatsapp.access_token');
        $this->phoneId = config('services.whatsapp.phone_id');
        $this->apiVersion = config('services.whatsapp.api_version', 'v21.0'); // Usa v21.0 por defecto
    }

    public function sendMessage($to, $message)
    {
        $url = "https://graph.facebook.com/{$this->apiVersion}/{$this->phoneId}/messages";

        $response = Http::withOptions([
            'verify' => false, // ⚠️ Solo en desarrollo, en producción debe estar en `true`
        ])->withHeaders([
            'Authorization' => "Bearer {$this->accessToken}",
            'Content-Type' => 'application/json',
        ])->post($url, [
            'messaging_product' => 'whatsapp',
            'to' => $to,
            'type' => 'text',
            'text' => ['body' => $message]
        ]);

        return $response->json(); // Devuelve la respuesta de la API
    }
}
