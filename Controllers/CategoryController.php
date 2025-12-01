<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    Public function indice(){
        $categorias=DB::table('categories')->where('status', 'ACTIVO')->get();
        foreach ($categorias as $cat){
            $photos = DB::table('pictures')->where('product_id', $cat ->id )->get();
            $cat ->photos = $photos;
        }
        return view('/admin/categorias/list')->with('categorias',$categorias); //
    }

    Public function crear(){
        return view('/admin/categorias/create'); //
    }

    Public function guardar(Request $request){
        //dd($request);
        $categoria=DB::table('categories') -> insertGetId([
            'name' => $request -> name,
            'description' => $request -> description,
            'picture' => $request -> picture,
            'status'=> 'ACTIVO',
            'created_at'=> now(),
            'updated_at'=>now(),
        ]);

        if($request->hasFile('picture')){
            $ruta='imagenes/categorias';
            $extension=$request->picture->extension();
            $nombre= $request->file('picture')->getClientOriginalName();
            $path=$request->file('picture')->storeAs( '/imagenes/categoria', $nombre);
            DB::table('categories')->update([
                'picture'=>'/storage/'.$path,
                'updated_at'=>now(),
            ]);
        }
        
        if($request->hasFile('photos')){
            $ruta='imagenes/categorias';
            $num=0;
            foreach($request->photos as $img){
                $extensions=$img->extensions(); $num++;
                $extension=$request->picture->extension();
            $nombre= $request->file('picture')->getClientOriginalName();
            $path=$request->file('picture')->storeAs( '/imagenes/categoria', $nombre, 'public');
                DB::table('pictures')->instert([
                    'name'=>$path,
                    'description'=>'informacion de prueba',
                    'category_id'=> $id,
                    'created_at'=> now(),
                    'updated_at'=> now(),
                ]);
            }
        }
        $categorias=DB::table('categories')->where('status', 'ACTIVO')->get();
        return view('/admin/categorias/list')
            ->with('categorias',$categorias)
            ->with('mensaje','registro realizado');
    }

    Public function editar($id){

        $categoria=DB::table('categories')->where('id',$id)->first();
        
        return view('/admin/categorias/edith') -> with ('categoria',$categoria );  //
    }

    Public function actualizar(Request $request, $id){
        //dd($request);
        DB::table('categories') -> where('id',$id)-> update([
            'name' => $request -> name,
            'description' => $request -> description,
            'picture' =>  $request -> picture,
        
        ]);

        if($request->hasFile('picture')){
            $ruta='/imagenes/categoria';
            $extension=$request->picture->extension();
            $nombre= $request->file('picture')->getClientOriginalName();
            $path=$request->file('picture')->storeAs( $ruta, $nombre, 'public');
            DB::table('categories')->where('id',$id)->update([
                'picture'=> '/storage/'.$path,
                'updated_at'=>now(),
            ]);
        }
        
        // if($request->hasFile('photos')){
        //     $ruta='imagenes/categorias';
        //     $num=0;
        //     foreach($request->photos as $img){
        //         $extensions=$img->extensions(); $num++;
        //         $nombre='categoria_'.$id.'_'.$num.'.'.$extension;
        //         $path=$request->picture->storeAS($ruta,$nombre,'public');
        //         DB::table('pictures')->instert([
        //             'name'=>$path,
        //             'description'=>'informacion de prueba',
        //             'category_id'=> $id,
        //             'created_at'=> now(),
        //             'updated_at'=> now(),
        //         ]);
        //     }
        // }
        //dd($request);
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
            'picture' => 'default.jpg'
        ]);
        
        $categorias=DB::table('categories')->where('status', 'ACTIVO')->get();
        return view('/admin/categorias/list')
            ->with('categorias',$categorias)
            ->with('mensaje','registro borrado');
    }
}
