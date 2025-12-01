<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CarritoController extends Controller
{
    public function agregar(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|exists:products,id',
            'cantidad' => 'required|integer|min:1'
        ]);

        $producto = Product::find($request->producto_id);
        
        // Verificar stock
        if ($producto->cantidad < $request->cantidad) {
            return back()->with('error', 'No hay suficiente stock disponible.');
        }

        $carrito = session()->get('carrito', []);

        if (isset($carrito[$request->producto_id])) {
            $carrito[$request->producto_id]['cantidad'] += $request->cantidad;
        } else {
            $carrito[$request->producto_id] = [
                "nombre" => $producto->nombre,
                "cantidad" => $request->cantidad,
                "precio" => $producto->precio,
                "imagen" => $producto->imagen
            ];
        }

        session()->put('carrito', $carrito);
        return back()->with('success', 'Producto agregado al carrito');
    }

    public function mostrar()
    {
        $carrito = session()->get('carrito', []);
        $total = 0;
        
        foreach ($carrito as $item) {
            $total += $item['precio'] * $item['cantidad'];
        }

        return view('carrito.mostrar', compact('carrito', 'total'));
    }

    public function eliminar($id)
    {
        $carrito = session()->get('carrito', []);
        
        if (isset($carrito[$id])) {
            unset($carrito[$id]);
            session()->put('carrito', $carrito);
        }

        return back()->with('success', 'Producto eliminado del carrito');
    }

    public function actualizar(Request $request, $id)
    {
        $request->validate([
            'cantidad' => 'required|integer|min:1'
        ]);

        $carrito = session()->get('carrito', []);
        
        if (isset($carrito[$id])) {
            $carrito[$id]['cantidad'] = $request->cantidad;
            session()->put('carrito', $carrito);
        }

        return back()->with('success', 'Carrito actualizado');
    }

    public function procesarCompra(Request $request)
    {
        $carrito = session()->get('carrito', []);
        
        if (empty($carrito)) {
            return back()->with('error', 'El carrito está vacío');
        }

        // Validar stock antes de procesar
        foreach ($carrito as $productoId => $item) {
            $producto = Product::find($productoId);
            
            if (!$producto) {
                return back()->with('error', "El producto {$item['nombre']} ya no existe");
            }

            if ($producto->cantidad < $item['cantidad']) {
                return back()->with('error', "No hay suficiente stock de {$item['nombre']}. Disponible: {$producto->cantidad}");
            }
        }

        // Procesar la compra y actualizar stock
        foreach ($carrito as $productoId => $item) {
            $producto = Product::find($productoId);
            
            // Restar la cantidad comprada del stock
            $producto->cantidad -= $item['cantidad'];
            
            // Si el stock llega a 0, marcar como agotado
            if ($producto->cantidad == 0) {
                $producto->estado = 'agotado';
            }
            
            $producto->save();
        }

        // Limpiar el carrito después de la compra
        session()->forget('carrito');

        return redirect()->route('carrito.mostrar')
                         ->with('success', '¡Compra realizada exitosamente! El stock ha sido actualizado.');
    }
}