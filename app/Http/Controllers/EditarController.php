<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Category;

class EditarController extends Controller
{
    /**
     * Mostrar formulario para editar un producto específico
     */
    public function edit($id)
    {
        // Buscar el producto o mostrar error 404
        $producto = Product::find($id);
        
        if (!$producto) {
            abort(404, 'Producto no encontrado');
        }

        $suppliers = Supplier::all();
        $categories = Category::all();
        
        return view('productos.edit', compact('producto', 'suppliers', 'categories'));
    }

    public function index()
{
    $productos = Product::all();
    return view('productos.index', compact('productos'));
}

    
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'supplier_id' => 'required|exists:suppliers,id',
            'category_id' => 'required|exists:categories,id',
            'precio' => 'required|numeric|min:0',
            'cantidad' => 'required|integer|min:0',
            'estado' => 'required|in:disponible,agotado'
        ]);

        // Buscar el producto
        $producto = Product::find($id);
        
        if (!$producto) {
            abort(404, 'Producto no encontrado');
        }

        // Actualizar el producto
        $producto->update([
            'nombre' => $validated['nombre'],
            'supplier_id' => $validated['supplier_id'],
            'category_id' => $validated['category_id'],
            'precio' => $validated['precio'],
            'cantidad' => $validated['cantidad'],
            'estado' => $validated['estado'],
            'disponible' => $validated['estado'] == 'disponible',
        ]);

        // Redireccionar con mensaje de éxito
        return redirect()->back()->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy($id)
{
    $producto = Product::find($id);
    
    if (!$producto) {
        abort(404, 'Producto no encontrado');
    }

    $producto->delete();

    return redirect()->route('editar.index')
                     ->with('success', 'Producto eliminado correctamente.');
}

}