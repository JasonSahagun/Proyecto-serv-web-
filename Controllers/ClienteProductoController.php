<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteProductoController extends Controller
{
    //
    public function catalogo(){ //De aqui solo toma los productos con imagenes y los mostramos 
        $products=DB::table('products')->where('status','ACTIVO')->get();
        return view ('/productos/products')->with ('productos',$products);
    }

    public function detalle($id){ //esta es la vista detallada de productos 
        $products=DB::table('products')->where('id', $id)->where('status','ACTIVO')->get();
        return view('/productos/detalle')->with ('product',$products);

    }
}
