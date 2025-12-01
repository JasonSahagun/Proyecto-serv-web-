<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteProductoController extends Controller
{
    //
    public function catalogo(){
        $products=DB::table('products')->where('status','ACTIVO')->get();
        //return view ('/productos/catalogo')->with ('productos',$products);
        return view ('/productos/products')->with ('productos',$products);
    }

    public function detalle($id){
        $products=DB::table('products')->where('id', $id)->where('status','ACTIVO')->get();
        return view('/productos/detalle')->with ('product',$products);
        
    //   public function detalle($id){
    //   $products=DB::table('products')->where('id', $id)->where('status','ACTIVO')->get();
    //   return view('/productos/detalle')->with ('product',$products);
    // }
        
    
    }
}
