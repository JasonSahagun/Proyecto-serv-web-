<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProvidersController extends Controller
{
    public function indice()
    {
        $proveedores = DB::table('suppliers')
            ->where('status', 'ACTIVO')
            ->get();

        foreach ($proveedores as $pro) {
            $photos = DB::table('pictures')
                ->where('product_id', $pro->id)
                ->get();

            $pro->photos = $photos;
        }

        return view('admin.proveedor.list', compact('proveedores'));
    }

    public function crear()
    {
        return view('admin.proveedor.create');
    }

    public function guardar(Request $request)
    {
        $id = DB::table('suppliers')->insertGetId([
            'name'         => $request->name,
            'contact_name' => $request->contact_name,
            'address'      => $request->address,
            'phone'        => $request->phone,
            'email'        => $request->email,
            'status'       => 'ACTIVO',
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        
        if($request->hasFile('photos')){
            $ruta='imagenes/provider';
            $num=0;
        foreach($request->photos as $img){
            $extensions=$img->extensions();
            $num++;
            $extension=$request->picture->extension();
            $nombre= $request->file('picture')->getClientOriginalName();
            $path=$request->file('picture')->storeAs( '/imagenes/provider', $nombre, 'public');
            
            DB::table('pictures')->insert([
                'name'=>$path,
                'description'=>'informacion de prueba',
                'category_id'=> $id,
                'created_at'=> now(),
                'updated_at'=> now(),
                ]);
            }
        }
        $proveedores=DB::table('suppliers')->where('status', 'ACTIVO')->get();
        return view('/admin/proveedor/list')
        ->with('proveedores',$proveedores);
    
    }

    public function editar($id) //EDITAR
    {
        $proveedores = DB::table('suppliers')->where('id', $id)->first();

        return view('admin.proveedor.edith', compact('proveedores'));
    }

    public function actualizar(Request $request, $id)
    {
        DB::table('suppliers')->where('id', $id)->update([
            'name'         => $request->name,
            'contact_name' => $request->contact_name,
            'address'      => $request->address,
            'phone'        => $request->phone,
            'email'        => $request->email,
            'updated_at'   => now(),
        ]);
    
    if($request->hasFile('picture')){
            $ruta='/imagenes/proveedor';
            $extension=$request->picture->extension();
            $nombre= $request->file('picture')->getClientOriginalName();
            $path=$request->file('picture')->storeAs( '/imagenes/proveedor', $nombre, 'public');
            DB::table('suppliers')->where('id',$id)->update([
                'picture'=> '/storage/'.$path,
                'updated_at'=>now(),
            ]);
        }
        
        if($request->hasFile('photos')){
            $ruta='imagenes/proveedor';
            $num=0;
            foreach($request->photos as $img){
                
                $nombre = $img->getClientOriginalName();
                $path=$request->picture->storeAS($ruta,$nombre,'public');
                DB::table('pictures')->insert([
                    'name'=>$path,
                    'description'=>'informacion de prueba',
                    'category_id'=> $id,
                    'created_at'=> now(),
                    'updated_at'=> now(),
                ]);
            }

        }
        //dd($request);
        $proveedores=DB::table('suppliers')->where('status','ACTIVO')->get();
        
        return view('admin.proveedor.list', compact('proveedores'));
        }

    public function mostrar($id)
    {
        $proveedores = DB::table('suppliers')->where('id', $id)->first();

        return view('admin.proveedor.show', compact('proveedores'));
    }

    public function borrar($id)
    {
        DB::table('suppliers')
            ->where('id', $id)
            ->update([
                'status'  => 'INACTIVO',
                'picture' => 'default.jpg',
                'updated_at' => now(),
            ]);

        return redirect()
            ->route('proveedor.indice')
            ->with('mensaje', 'registro borrado');
    }
}
