<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    Public function indice(){
        $categorias=DB::table('categories')->where('status', 'ACTIVO')->get();
        return view('/admin/categorias/list')->with('categorias',$categorias); //
    }

    Public function crear(){
        return view('/admin/categorias/create'); //
    }

    Public function guardar(Request $request){
        //dd($request);
        DB::table('categories') -> insert([ 
            'name' => $request -> name, 
            'description' => $request -> description,
            'picture' => $request -> picture, 
            'status'=> 'ACTIVO',
        ]);
        $categorias=DB::table('categories')->where('status', 'ACTIVO')->get();
        return view('/admin/categorias/list')
            ->with('categorias',$categorias)
            ->with('mensaje','registro realizado');
    }

    Public function editar($id){

        $categoria=DB::table('categories')->where('id',$id)->first();
        return view('/admin/categorias/edit') -> with ('categoria',$categoria );  //
    }

    Public function actualizar(Request $request, $id){
        DB::table('categories') -> where('id',$id)-> update([ 
            'name' => $request -> name, 
            'description' => $request -> description,
            'picture' => $request -> picture, 
        ]);
        $categorias=DB::table('categories')->where('status','ACTIVO')->get();
        return view('/admin/categorias/list')
        ->with('categorias',$categorias)
        ->with('mensaje', 'Registro actualizado');
    }

    Public function mostrar($id){
        $categoria=DB::table('categories')->where('id',$id)->first();
        return view('/admin/categorias/show')-> with ('categoria',$categoria );   //
    }

    Public function borrar($id){
        // $deleted = DB::table('categories') -> where('id',$id)->delete();
            DB::table('categories') -> where('id',$id)-> update([ 
            'status' => "INACTIVO",
            
        ]);
        $categorias=DB::table('categories')->where('status', 'ACTIVO')->get();
        return view('/admin/categorias/list')
            ->with('categorias',$categorias)
            ->with('mensaje','registro borrado');
    }
}
