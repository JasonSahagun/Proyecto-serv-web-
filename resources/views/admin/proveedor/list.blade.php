<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Proveedores') }}
        </h2>
    </x-slot>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
              
              <!-- Aquí comienza la tabla -->
                <table class="min-w-full divide-y divide-gray-200">
                  <a class="px-3 py-1 bg-blue-600 text-white rounded-md hover:bg-blue-700" href="/proveedor/crear">Crear Proveedor</a>
                  <thead class="bg-gray-50">
                    <tr>
                      <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                      <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                      <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">nombre de contacto </th>
                      
                      <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Direccion</th>
                      <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Telefono</th>
                      <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">E-mail</th>
                    
                    </tr>
                  </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                      @foreach ($proveedores as $pro)
                    <tr>
                      <td class="px-6 py-4 whitespace-nowrap">{{ $pro->id }}</td>
                      <td class="px-6 py-4 whitespace-nowrap">{{ $pro->name }}</td>
                      <td class="px-6 py-4 whitespace-nowrap">{{ $pro->contact_name }}</td>
                      
                      <td class="px-6 py-4 whitespace-nowrap">{{ $pro->address }}</td>
                      <td class="px-6 py-4 whitespace-nowrap">{{ $pro->phone }}</td>
                      <td class="px-6 py-4 whitespace-nowrap">{{ $pro->email }}</td>
                        <!-- Enlaces para ver, editar, etc. -->
                      
                      <td>
                        <a class="px-3 py-1 bg-green-600 text-white rounded-md hover:bg-green-700" href="/proveedor/editar/{{ $pro->id }}">Editar</a>
                        <a class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700"href="/proveedor/mostrar/{{ $pro->id }}"> Borrar</a>
                      </td>
                      
                      {{-- <td>
                        <a class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700"href="/categorias/mostrar/{{ $Cat->id }}"> Borrar</a>
                      </td>
                    </tr> --}}

                      @endforeach
                    </tbody>
                  </table>
                </div>
          </div>
        </div>
    </div>
</x-app-layout>


