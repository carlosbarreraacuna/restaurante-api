<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Services\WhatsAppService; // Importar correctamente la clase

class WhatsAppController extends Controller
{
    protected $whatsAppService;

    public function __construct(WhatsAppService $whatsAppService)
    {
        $this->whatsAppService = $whatsAppService;
    }

    public function sendTestMessage()
    {
        $phoneNumber = '573013502893'; // 🔴 Reemplaza con un número válido
        $message = 'Hello from Laravel!';

        // ✅ Llamamos al servicio de WhatsApp para enviar el mensaje
        $response = $this->whatsAppService->sendMessage($phoneNumber, $message);

        return response()->json($response);
    }
}
