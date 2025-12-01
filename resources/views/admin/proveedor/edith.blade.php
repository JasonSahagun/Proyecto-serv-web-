{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar proveedores') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                
                    <!-- Formulario con validación de Tailwind -->
                    <form method="POST" action="{{ route('providers.update', $proveedores->id) }}" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method('PUT')

                        <!-- Nombre -->
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                            <input type="text" id="name" name="name" value="{{ $proveedores->name }}" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                            @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <!-- Descripción -->
                        <div class="mb-4">
                            <label for="contact_name" class="block text-sm font-medium text-gray-700">nombre de contacto </label>
                            <input type="text" id="contact_name" name="contact_name" value="{{ $proveedores->contact_name }}" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                            @error('contact_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        
                        <!-- Direccion -->
                        <div class="mb-4">
                            <label for="address" class="block text-sm font-medium text-gray-700">Direccion </label>
                            <input type="text" id="address" name="address" value="{{ $proveedores->address }}" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                            @error('address') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        
                        <!-- telefono -->
                        <div class="mb-4">
                            <label for="phone" class="block text-sm font-medium text-gray-700">Telefono </label>
                            <input type="number" id="phone" name="phone" value="{{ $proveedores->phone }}" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                            @error('phone') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <!-- Correo -->
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700"> e-mail </label>
                            <input type="email" id="email" name="email" value="{{ $proveedores->email }}" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                            @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        
                        <!-- Imagen -->
                        <div class="mb-4">
                            <label for="picture" class="block text-sm font-medium text-gray-700">Imagen</label>
                            <div class="flex items-center">
                                <img src="{{ $proveedores->picture }}" alt="{{$proveedores->picture}}" class="card-img-top" width="100">
                            
                                <input type="file" id="picture" name="picture" accept="image/*" class="p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            @error('picture') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        
                        <!-- Botón de actualización -->
                        <div class="flex justify-end mt-4">
                            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Actualizar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

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
                    <form method="POST" action="{{ route('providers.update', $proveedores->id) }}" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method('PUT')
                        <!-- Nombre -->
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                            <input type="text" id="name" name="name" value="{{ $proveedores->name }}"
                            class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                            @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <!-- Nombre de contacto -->
                        <div class="mb-4">
                            <label for="contact_name" class="block text-sm font-medium text-gray-700">nombre de contacto </label>
                            <input type="text" id="contact_name" name="contact_name" value="{{ $proveedores->contact_name }}"
                            class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                            @error('contact_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <!-- Direccion -->
                        <div class="mb-4">
                            <label for="address" class="block text-sm font-medium text-gray-700">Direccion </label>
                            <input type="text" id="address" name="address" value="{{ $proveedores->address }}"
                            class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                            @error('address') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        
                        <!-- telefono -->
                        <div class="mb-4">
                            <label for="phone" class="block text-sm font-medium text-gray-700">telefono </label>
                            <input type="number" id="phone" name="phone" value="{{ $proveedores->phone }}"
                            class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                            @error('phone') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <!-- Correo -->
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700"> e-mail </label>
                            <input type="email" id="email" name="email" value="{{ $proveedores->email }}"
                            class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                            @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <!-- Imagen -->
                        <div class="mb-4">
                            <label for="picture" class="block text-sm font-medium text-gray-700">Imagen</label>
                            <div class="flex items-center">
                                <img src="{{ $proveedores->picture }}" alt="{{$proveedores->picture}}" class="card-img-top" width="100">
                            
                                <input type="file" id="picture" name="picture" accept="image/*"
                                class="p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            @error('picture') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <!-- Botón de actualización -->
                        <div class="flex justify-end mt-4">
                            <button type="submit"
                            class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Editar
                            </button>
                        
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>