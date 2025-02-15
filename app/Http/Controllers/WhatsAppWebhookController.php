<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WhatsAppWebhookController extends Controller
{
    public function verifyWebhook(Request $request)
    {
        // Meta enviará estos parámetros para verificar el webhook
        $mode = $request->query('hub_mode');
        $token = $request->query('hub_verify_token');
        $challenge = $request->query('hub_challenge');

        // Verifica el token de validación
        if ($mode === 'subscribe' && $token === env('WHATSAPP_WEBHOOK_TOKEN')) {
            return response($challenge, 200);
        }

        return response('Invalid token', 403);
    }

    public function receiveMessage(Request $request)
    {
        $data = $request->all();

        // Guardar en logs para depuración
        Log::info('📥 Mensaje recibido:', $data);

        // Verificar si hay un mensaje entrante
        if (isset($data['entry'][0]['changes'][0]['value']['messages'][0])) {
            $message = $data['entry'][0]['changes'][0]['value']['messages'][0];

            // Extraer información
            $from = $message['from']; // Número del remitente
            $text = $message['text']['body'] ?? 'Mensaje sin texto';

            Log::info("📩 Mensaje de $from: $text");

            return response()->json(['status' => 'Mensaje recibido']);
        }

        return response()->json(['status' => 'Sin mensaje'], 200);
    }
}
