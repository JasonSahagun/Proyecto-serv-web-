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
        //Nos retorna a vista de lista de categorias
        return view('/admin/categorias/list')->with('categorias',$categorias);  
    }
    //Nos manda al blade de creacion de categoria
    Public function crear(){
        return view('/admin/categorias/create');  
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
            $ruta='imagenes/categorias'; //establecemos la ruta de guardado 
            $extension=$request->picture->extension();//guarda la extencion de la imagen 
            $nombre= $request->file('picture')->getClientOriginalName(); //Guarda la img por su nombre original
            $path=$request->file('picture')->storeAs( '/imagenes/categoria', $nombre, 'public');
            DB::table('categories')->update([
                'picture'=>'/storage/'.$path,
                'updated_at'=>now(),
            ]);
        }
        //en este configuramos las opciones de guardado para mas imagenes 
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
        //aqui guardamos las fotos en la DB y retornamos la vista de categorias 
        $categorias=DB::table('categories')->where('status', 'ACTIVO')->get(); 
        return view('/admin/categorias/list')
            ->with('categorias',$categorias)
            ->with('mensaje','registro realizado');
    }
    
    Public function editar($id){
        //Aqui primero solicitamos la categoria por id y despues retornamos la vista edith con los datos asociados a esa id 
        $categoria=DB::table('categories')->where('id',$id)->first();
        return view('/admin/categorias/edith') -> with ('categoria',$categoria );  //
    }
    //aqui editamos la info y la imagen y la actualizamos 
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
        //dd($request);
        //En este punto se muestra todos los datos que hemos actualizado
        $categorias=DB::table('categories')->where('status','ACTIVO')->get();
        return view('/admin/categorias/list')
        ->with('categorias',$categorias)
        ->with('mensaje', 'Registro actualizado');
        }
    
    //Esta funcion nos permite como el update ver la informacion de una categoria seleccionada pero 
    //con la diferencia de que en este apartado es solo de lectura (READONLY) para su postuma eliminacion 
    Public function mostrar($id){
        $categoria=DB::table('categories')->where('id',$id)->first();
        return view('/admin/categorias/show')-> with ('categoria',$categoria );   //
    }
    //en este punto eliminamos de la base de datos la categoria seleccionada 
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
