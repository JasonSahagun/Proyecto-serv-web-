{{-- @extends('/admin/plantilla/layout')
@section('titulo','Crear categoria')

@section('contenido')

<h1>CREAR </h1>

<form class="row g-3 needs-validation" method="POST" action="/categorias"  novalidate>
    @csrf
  <div class="col-md-4">
    <label for="validationCustom01" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="validationCustom01" name="name" required>
    <div class="valid-feedback">
      Looks good!
    </div>
    <div class="invalid-feedback">
        Please choose a username.
      </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustom02" class="form-label">Descripcion</label>
    <input type="text" class="form-control" id="validationCustom02" name="description"  required>
    <div class="valid-feedback">
      Looks good!
    </div>
    <div class="invalid-feedback">
        Please choose a description.
      </div>
  </div>

  <div class="col-md-6">
    <label for="validationCustom03" class="form-label">Img</label>
    <input type="file" accept="image/*" class="form-control" id="validationCustom03" name="picture" required>
    <div class="invalid-feedback">
      Please provide a valid Picture .
    </div>
  </div>
  
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit">Registrar</button>
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
            {{ __('Crear proveedor') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  
                    <!-- Formulario con validación de Tailwind -->
                    <form method="POST" action="{{ route('providers.save') }}" enctype="multipart/form-data" novalidate>
                        @csrf

                        <!-- Nombre -->
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                            <input type="text" id="name" name="name" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                            @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <!-- Nombre de contacto -->
                        <div class="mb-4">
                            <label for="contact_name" class="block text-sm font-medium text-gray-700">nombre de contacto </label>
                            <input type="text" id="contact_name" name="contact_name"  class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                            @error('contact_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <!-- Direccion -->
                        <div class="mb-4">
                            <label for="address" class="block text-sm font-medium text-gray-700">Direccion </label>
                            <input type="text" id="address" name="address"  class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                            @error('address') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        
                        <!-- telefono -->
                        <div class="mb-4">
                            <label for="phone" class="block text-sm font-medium text-gray-700">telefono </label>
                            <input type="number" id="phone" name="phone"  class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                            @error('phone') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <!-- Correo -->
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700"> e-mail </label>
                            <input type="email" id="email" name="email"  class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                            @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <!-- Imagen -->
                        <div class="mb-4">
                            <label for="picture" class="block text-sm font-medium text-gray-700">Imagen</label>
                            <div class="flex items-center">
                                {{-- <img src="http://127.0.0.1:8001{{ $categoria->picture }}" alt="http://127.0.0.1:8001{{$categoria->picture}}" class="card-img-top" width="100"> --}}
                              
                                <input type="file" id="picture" name="picture" accept="image/*" class="p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            @error('picture') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <!-- Botón de actualización -->
                        <div class="flex justify-end mt-4">
                            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                crear
                            </button>
                        
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>