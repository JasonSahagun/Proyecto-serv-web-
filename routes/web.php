<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ComponentesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\EditarController; // ✅ NUEVO IMPORT

// Rutas de vistas simples
Route::get('/welcome', function () {
    return view('welcome');
});

Route::view('/sign-in', 'sign-in/index');
Route::view('/product', 'product/index');
Route::view('/cover', 'cover/index');
Route::view('/registro_H', 'checkout/index');
Route::view('/registro_C', 'checkout/index_registro');
Route::view('/carousel', 'carousel/index');

// Rutas de Categorías (CRUD completo)
Route::controller(CategoryController::class)->group(function () {
    Route::get('/categorias', 'indice');
    Route::get('/categorias/crear', 'crear');
    Route::post('/categorias', 'guardar');
    Route::get('/categorias/editar/{id}', 'editar');
    Route::put('/categorias/{id}', 'actualizar');
    Route::get('/categorias/mostrar/{id}', 'mostrar');
    Route::delete('/categorias/{id}', 'borrar');
});

// Rutas del carrito
Route::controller(CarritoController::class)->group(function () {
    Route::post('/carrito/agregar', 'agregar')->name('carrito.agregar');
    Route::get('/carrito', 'mostrar')->name('carrito.mostrar');
    Route::delete('/carrito/eliminar/{id}', 'eliminar')->name('carrito.eliminar');
    Route::put('/carrito/actualizar/{id}', 'actualizar')->name('carrito.actualizar');
    Route::post('/carrito/procesar-compra', 'procesarCompra')->name('carrito.procesar');
});

// Rutas de Componentes
Route::get('/componentes/{componente}/{id?}', [ComponentesController::class, 'mostrar'])
    ->name('componentes.mostrar');

// Rutas de Productos (CRUD completo) - EXISTENTES
Route::controller(ProductController::class)->group(function () {
    Route::get('/productos', 'index')->name('productos.index');
    Route::get('/productos/crear', 'create')->name('productos.create');
    Route::post('/productos', 'store')->name('productos.store');
    Route::get('/productos/{producto}/editar', 'edit')->name('productos.edit');
    Route::put('/productos/{producto}', 'update')->name('productos.update');
    Route::delete('/productos/{producto}', 'destroy')->name('productos.destroy');
});

// ✅ NUEVAS RUTAS PARA EDITARCONTROLLER
Route::controller(EditarController::class)->group(function () {
    // Lista de productos para editar
    Route::get('/admin/productos', 'index')->name('editar.index');
    
    // Formulario de edición
    Route::get('/admin/productos/{id}/edit', 'edit')->name('editar.edit');
    
    // Actualizar producto
    Route::put('/admin/productos/{id}', 'update')->name('editar.update');
});

// ✅ NUEVAS RUTAS PARA EDITARCONTROLLER
Route::controller(EditarController::class)->group(function () {
    // Lista de productos para editar
    Route::get('/admin/productos', 'index')->name('editar.index');
    
    // Formulario de edición
    Route::get('/admin/productos/{id}/edit', 'edit')->name('editar.edit');
    
    // Actualizar producto
    Route::put('/admin/productos/{id}', 'update')->name('editar.update');
    
    // ✅ NUEVA: Eliminar producto
    Route::delete('/admin/productos/{id}', 'destroy')->name('editar.destroy');
});