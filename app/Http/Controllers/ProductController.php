<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Category;

class ProductController extends Controller
{
    // Mostrar formulario de creación
    public function create()
    {
        $suppliers = Supplier::all();
        $categories = Category::all();
        return view('productos.create', compact('suppliers', 'categories'));
    }

    // Guardar producto en la BD
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'supplier_id' => 'required|exists:suppliers,id',
            'category_id' => 'required|exists:categories,id',
            'precio' => 'nullable|numeric',
            'cantidad' => 'required|integer',
            'estado' => 'required|string|max:50'
        ]);

        Product::create([
            'nombre' => $validated['nombre'],
            'precio' => $validated['precio'] ?? 0,
            'cantidad' => $validated['cantidad'],
            'estado' => $validated['estado'],
            'supplier_id' => $validated['supplier_id'],
            'category_id' => $validated['category_id'],
            'disponible' => true,
        ]);

        return redirect()->route('productos.create')
                         ->with('success', 'Producto agregado correctamente');
    }

    // Mostrar formulario de edición
    public function edit(Product $producto)
    {
        $suppliers = Supplier::all();
        $categories = Category::all();
        return view('productos.edit', compact('producto', 'suppliers', 'categories'));
    }

   public function update(Request $request, Product $producto)
{
    $validated = $request->validate([
        'nombre' => 'required|string|max:100',
        'supplier_id' => 'required|exists:suppliers,id',
        'category_id' => 'required|exists:categories,id',
        'precio' => 'nullable|numeric',
        'cantidad' => 'required|integer',
        'estado' => 'required|string|max:50'
    ]);

    $producto->update([
        'nombre' => $validated['nombre'],
        'precio' => $validated['precio'] ?? 0,
        'cantidad' => $validated['cantidad'],
        'estado' => $validated['estado'],
        'supplier_id' => $validated['supplier_id'],
        'category_id' => $validated['category_id'],
        'disponible' => $validated['estado'] == 'disponible', // Actualizar disponible según estado
    ]);

    return redirect()->route('productos.edit', $producto)
                     ->with('success', 'Producto actualizado correctamente.');
}
}
