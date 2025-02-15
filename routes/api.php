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

Route::apiResource('categorias', CategoriaController::class);
Route::apiResource('productos', ProductoController::class);
Route::apiResource('pedidos', PedidoController::class);


Route::get('/send-test-message', [WhatsAppController::class, 'sendTestMessage']);

Route::get('/whatsapp/webhook', [WhatsAppWebhookController::class, 'verifyWebhook']);
Route::post('/whatsapp/webhook', [WhatsAppWebhookController::class, 'receiveMessage']);



