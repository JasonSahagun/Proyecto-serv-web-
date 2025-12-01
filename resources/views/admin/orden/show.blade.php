{{-- @extends('/admin/plantilla/layout')
@section('titulo','mostrar categoria')

@section('contenido')

<h1>MOSTRAR </h1>
<form class="row g-3 needs-validation" method="POST" action="/categorias/{{$categoria->id}}" >
  @csrf
  @method('delete')
  <div class="col-md-4">
    <label for="validationCustom01" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="validationCustom01" value="{{$categoria->name}}" name="name" readonly>
    
  </div>
  <div class="col-md-4">
    <label for="validationCustom02" class="form-label">Descripcion</label>
    <input type="text" class="form-control" id="validationCustom02"  value="{{$categoria->description}}" name="description" readonly>
    
  </div>
  <div class="col-md-4">
    <label for="validationCustomUsername" class="form-label">usuario</label>
    <div class="input-group has-validation">
      <span class="input-group-text" id="inputGroupPrepend">@</span>
      <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
      <div class="invalid-feedback">
        Please choose a username.
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <label for="validationCustom03" name="picture" class="form-label">Img</label>
    <img src="{{$categoria->picture}}" alt="{{$categoria->picture}}" width="150"></td>
  </div>
  
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit">Borrar</button>
  </div>
</form>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>

@endsection --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Eliminar orden') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  
                    <!-- Formulario con validación de Tailwind -->
                    <form method="POST" action="{{ route('orders.delete', $orden->id) }}" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method('delete')

                        <!-- Id de orden -->
                        <div class="mb-4">
                            <label for="product_id" class="block text-sm font-medium text-gray-700">Id de orden</label>
                            <input type="number" id="order_id" name="order_id" value="{{ $orden->order_id }}"
                            class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" readonly>
                            @error('product_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <!-- id de producto -->
                        <div class="mb-4">
                            <label for="product_id" class="block text-sm font-medium text-gray-700">id de producto </label>
                            <input type="number" id="product_id" name="product_id" value="{{ $orden->product_id }}"
                            class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" readonly>
                            @error('product_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        
                        <!-- cantidad -->
                        <div class="mb-4">
                            <label for="cantidad" class="block text-sm font-medium text-gray-700">Cantidad </label>
                            <input type="text" id="cantidad" name="cantidad" value="{{ $orden->cantidad }}"
                            class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" readonly>
                            @error('cantidad') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        
                        <!-- precio -->
                        <div class="mb-4">
                            <label for="precio" class="block text-sm font-medium text-gray-700">Precio </label>
                            <input type="number" id="precio" name="precio" value="{{ $orden->precio }}"
                            class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" readonly>
                            @error('precio') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <!-- Subtotal -->
                        <div class="mb-4">
                            <label for="subtotal" class="block text-sm font-medium text-gray-700"> Subtotal </label>
                            <input type="number" id="subtotal" name="subtotal" value="{{ $orden->subtotal }}"
                            class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" readonly>
                            @error('subtotal') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        
                        <!-- Botón de actualización -->
                        <div class="flex justify-end mt-4">
                            <button type="submit"
                            class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Borrar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>