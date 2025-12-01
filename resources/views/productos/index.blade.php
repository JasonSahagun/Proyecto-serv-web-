<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Administrar Productos</h1>
        
        <div class="mb-3">
            <a href="{{ route('productos.create') }}" class="btn btn-success">
                + Crear Nuevo Producto
            </a>
            <a href="{{ route('componentes.mostrar', ['componente' => 'tienda']) }}" class="btn btn-outline-primary">
                Ver Tienda
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $producto)
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->nombre }}</td>
                        <td>${{ number_format($producto->precio, 2) }}</td>
                        <td>{{ $producto->cantidad }}</td>
                        <td>
                            <span class="badge {{ $producto->estado == 'disponible' ? 'bg-success' : 'bg-danger' }}">
                                {{ ucfirst($producto->estado) }}
                            </span>
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('editar.edit', $producto->id) }}" class="btn btn-warning btn-sm">
                                    Editar
                                </a>
                                <form action="{{ route('editar.destroy', $producto->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm ms-1" 
                                            onclick="return confirm('¿Estás seguro de eliminar {{ $producto->nombre }}?')">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>