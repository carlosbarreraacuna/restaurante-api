<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\WhatsAppController;
use App\Http\Controllers\WhatsAppWebhookController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::apiResource('categorias', CategoriaController::class);
Route::get('/categorias', [CategoriaController::class, 'index']);

Route::apiResource('productos', ProductoController::class);
Route::apiResource('pedidos', PedidoController::class);


Route::get('/send-test-message', [WhatsAppController::class, 'sendTestMessage']);

Route::get('/whatsapp/webhook', [WhatsAppWebhookController::class, 'verifyWebhook']);
Route::post('/whatsapp/webhook', [WhatsAppWebhookController::class, 'receiveMessage']);



Route::get('/webhook/whatsapp', function (Request $request) {
    $verify_token = env('WHATSAPP_VERIFY_TOKEN'); // Debe coincidir con el Verify Token que configures en Facebook
    $mode = $request->query('hub_mode');
    $token = $request->query('hub_verify_token');
    $challenge = $request->query('hub_challenge');

    if ($mode === 'subscribe' && $token === $verify_token) {
        return response($challenge, 200);
    }

    return response('Unauthorized', 403);
});



