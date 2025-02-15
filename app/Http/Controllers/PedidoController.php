<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Pedido::with('productos')->get(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_nombre' => 'required|string|max:255',
            'cliente_email' => 'required|email',
            'productos' => 'required|array',
            'productos.*.id' => 'required|exists:products,id',
            'productos.*.cantidad' => 'required|integer|min:1',
            'total' => 'required|numeric|min:0',
            'status' => 'in:pendiente,procesando,completado,cancelado',
        ]);

        $pedido = Pedido::create([
            'cliente_nombre' => $request->cliente_nombre,
            'cliente_email' => $request->cliente_email,
            'total' => $request->total,
            'status' => $request->status ?? 'pendiente',
        ]);

        foreach ($request->productos as $producto) {
            $pedido->productos()->attach($producto['id'], ['cantidad' => $producto['cantidad']]);
        }

        return response()->json($pedido->load('productos'), 201);
    }

    public function show($id)
    {
        $pedido = Pedido::with('productos')->find($id);
        if (!$pedido) {
            return response()->json(['message' => 'Pedido no encontrado'], 404);
        }
        return response()->json($pedido, 200);
    }

    public function update(Request $request, $id)
    {
        $pedido = Pedido::find($id);
        if (!$pedido) {
            return response()->json(['message' => 'Pedido no encontrado'], 404);
        }

        $request->validate([
            'status' => 'in:pendiente,procesando,completado,cancelado',
        ]);

        $pedido->update($request->only('status'));

        return response()->json($pedido, 200);
    }

    public function destroy($id)
    {
        $pedido = Pedido::find($id);
        if (!$pedido) {
            return response()->json(['message' => 'Pedido no encontrado'], 404);
        }

        $pedido->delete();

        return response()->json(['message' => 'Pedido eliminado'], 200);
    }
}
