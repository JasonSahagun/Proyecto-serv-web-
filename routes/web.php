<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteProductoController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProvidersController;
use App\Http\Controllers\OrdersController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/productos/catalogo',[ClienteProductoController::class,'catalogo'])-> name('products.list');
Route::get('/productos/detalle/{id}',[ClienteProductoController::class,'detalle']);

// Route::get('products', [ProductController::class, 'productList'])->name('products.list');
Route::get('/cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('/cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('/update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('/remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('/clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
Route::post('/order', [CartController::class, 'hacerPedido'])->name('cart.order');


//RUTAS CATEGORIAS
Route::view('/categorias', '/admin/categorias/list');
Route::view('/categorias/crear', '/admin/categorias/create');

Route::get('/categorias',[CategoryController::class, 'indice'])->name('categorias.list');
Route::get('/categorias/crear',[CategoryController::class,'crear'])->name('categorias.create');
Route::post('/categorias',[CategoryController::class,'guardar'])->name('categorias.save');
Route::get('/categorias/editar/{id}',[CategoryController::class,'editar'])->name('categorias.edit');
Route::put('/categorias/{id}',[CategoryController::class,'actualizar'])->name('categorias.update');
Route::get('/categorias/mostrar/{id}',[CategoryController::class,'mostrar'])->name('categorias.show');
Route::delete('/categorias/{id}',[CategoryController::class,'borrar'])->name('categorias.delete');

//RUTAS proveedor
Route::view('/proveedor', '/admin/proveedor/list');
Route::view('/proveedor/crear', '/admin/proveedor/create');

Route::get('/proveedor',[ProvidersController::class, 'indice'])->name('providers.list');
Route::get('/proveedor/crear',[ProvidersController::class,'crear'])->name('providers.create');
Route::post('/proveedor',[ProvidersController::class,'guardar'])->name('providers.save');
Route::get('/proveedor/editar/{id}',[ProvidersController::class,'editar'])->name('providers.edit');
Route::put('/proveedor/{id}',[ProvidersController::class,'actualizar'])->name('providers.update');
Route::get('/proveedor/mostrar/{id}',[ProvidersController::class,'mostrar'])->name('providers.show');
Route::delete('/proveedor/{id}',[ProvidersController::class,'borrar'])->name('providers.delete');

//RUTAS orden
Route::view('/orden', '/admin/orden/list');
Route::view('/orden/crear', '/admin/orden/create');

Route::get('/orden',[OrdersController::class, 'indice'])->name('orders.list');
Route::get('/orden/editar/{id}',[OrdersController::class,'editar'])->name('orders.edit');
Route::put('/orden/{id}',[OrdersController::class,'actualizar'])->name('orders.update');
Route::get('/orden/mostrar/{id}',[OrdersController::class,'mostrar'])->name('orders.show');
Route::delete('/orden/{id}',[OrdersController::class,'borrar'])->name('orders.delete');