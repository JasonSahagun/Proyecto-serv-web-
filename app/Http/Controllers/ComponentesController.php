<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ComponentesController extends Controller
{
    public function mostrar($componente,$id=null){
        $mapa =[
            'index'        => 'index',
            'procesadores' => 'procesadores',
            'memoriaRam'   => 'memoriaRam',
            'almacenamiento'=>'almacenamiento',
            'tarjetaGr'    => 'tarjetaGr',
            'fuentePo'     => 'fuentePo', 
            'gabinete'     => 'gabinete',
            'refrijeracion'=> 'refrijeracion',
            'preArma'      => 'preArma',
            'tienda'       => 'tienda',
            'editar'       => 'editar',
        ];
        if (isset($mapa[$componente]) && method_exists($this,$mapa[$componente])){
            return $this->{$mapa[$componente]}($id);
        }
        abort(404,"componente[$componente] no encontrado");
    }


    private function getMapeoCategorias()
{
    return [
        1 => 'procesadores',
        2 => 'memorias', 
        3 => 'almacenamiento',
        4 => 'graficas',
        5 => 'fuentes',
        6 => 'gabinetes',
        7 => 'refrigeracion',
        8 => 'prearmados',
        9 => 'tienda',
        10=> 'editar'
    ];
}

    private function index($id =null){
        $productos = Product::where('category_id',0)->get();
        return view ('componentes.index', compact ('productos','id'));
    }

private function procesadores($id = null)
{
    $productos = Product::where('category_id',1)->get();
    return view('componentes.procesadores', compact('productos','id'));
}

private function memoriaRam($id = null)
{
    $productos = Product::where('category_id', 2)->get();
    return view('componentes.memoriaRam', compact('productos','id'));
}

private function almacenamiento($id =null)
{   
    $productos = Product::where('category_id', 3)->get();
    return view('componentes.almacenamiento', compact('productos','id'));
}

private function tarjetaGr($id=null)
{
    $productos = Product::where('category_id', 4)->get();
    return view('componentes.tarjetaGr', compact('productos','id'));
}

private function fuentePo($id=null)
{
    $productos = Product::where('category_id', 5)->get();
    return view('componentes.fuentePo', compact('productos','id'));
}

private function gabinete($id=null)
{
    $productos = Product::where('category_id',6)->get();
    return view('componentes.gabinete', compact('productos','id'));
}

private function refrijeracion($id=null)
{
    $productos = Product::where('category_id',7)->get();
    return view('componentes.refrijeracion',compact('productos','id'));
}

private function preArma($id=null)
{
    $productos = Product::where('category_id',8)->get();
    return view('componentes.preArma',compact('productos','id'));
}
private function tienda($id = null){
    $productos = Product::all(); // Mostrar TODOS los productos
    $mapeoCategorias = $this->getMapeoCategorias();
    
    return view('componentes.tienda', compact('productos', 'mapeoCategorias'));
}
private function editar ($id = null){
    $productos = Product.where('category_id',10)->get();
    return view('componentes.editar',compact('productos','id'));
}

}

