@extends('/admin/plantilla/layout')

@section('titulo'.'LISTADO DE PRODUCTO')
    
@section('contenido')

<div class="col-12" >
    <a class="btn btn-primary" href="/productos/crear">Crear productos</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Proveedor</th>
      <th scope="col">Categoria</th>
      <th scope="col">Precio</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Imagen</th>
      <th scope="col">Editar</th>
      <th scope="col">Borrar</th>
    </tr>
  </thead>
  <tbody>
        @foreach($productos as $producto)
    <tr>
      <th scope="row">{{$producto->id}}</th>
      <td>{{$producto->name}}</td>
      <td>{{$producto->supplier_id}}</td>
      <td>{{$producto->categorie_id}}</td>
      <td>{{$producto->price}}</td>
      <td>{{$producto->quantity}}</td>

      <td>
        {{-- <img src="{{$categoria->picture}}" alt="{{$categoria->picture}}" width="150"></td> --}}
        
      {{-- @foreach ($categoria->photos as $photo) --}}
      <img src="{{$producto->imagen}}" alt="{{$producto->imagen}}" width="150">
      {{-- @endforeach --}}
      
      <td> <a href="/productos/{{$producto->id}}/edit"> editar </td>
      <td> <a href="/productos/{{$producto->id}}"> borrar</td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection