<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <header class="site-header sticky-top py-1">
        <nav class="container d-flex flex-column flex-md-row justify-content-between">
            <a class="py-2" href="{{ route('componentes.mostrar', ['componente' => 'tienda']) }}" aria-label="Product">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mx-auto" role="img" viewBox="0 0 24 24"><title>Product</title><circle cx="12" cy="12" r="10"/><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/></svg>
            </a>
            <a class="py-2 d-none d-md-inline-block" href="{{ route('componentes.mostrar', ['componente' => 'tienda']) }}">Inicio</a>
            <a class="py-2 d-none d-md-inline-block" href="{{ route('carrito.mostrar') }}">
                🛒 Carrito
                @if(count(session('carrito', [])) > 0)
                    <span class="badge bg-danger">{{ count(session('carrito', [])) }}</span>
                @endif
            </a>
        </nav>
    </header>

    <div class="container mt-5">
        <h1>Carrito de Compras</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if(empty($carrito))
            <div class="alert alert-info">Tu carrito está vacío</div>
            <a href="{{ route('componentes.mostrar', ['componente' => 'tienda']) }}" class="btn btn-primary">
                Continuar Comprando
            </a>
        @else
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($carrito as $id => $item)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    @if($item['imagen'])
                                    <img src="{{ asset('storage/' . $item['imagen']) }}" 
                                         alt="{{ $item['nombre'] }}" 
                                         style="width: 50px; height: 50px; object-fit: cover;" 
                                         class="me-3">
                                    @else
                                    <div class="bg-light me-3" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                        <small class="text-muted">Sin imagen</small>
                                    </div>
                                    @endif
                                    <span>{{ $item['nombre'] }}</span>
                                </div>
                            </td>
                            <td>${{ number_format($item['precio'], 2) }}</td>
                            <td>
                                <form action="{{ route('carrito.actualizar', $id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" name="cantidad" value="{{ $item['cantidad'] }}" 
                                           min="1" class="form-control form-control-sm" style="width: 80px;">
                                    <button type="submit" class="btn btn-sm btn-outline-primary mt-1">Actualizar</button>
                                </form>
                            </td>
                            <td>${{ number_format($item['precio'] * $item['cantidad'], 2) }}</td>
                            <td>
                                <form action="{{ route('carrito.eliminar', $id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" 
                                            onclick="return confirm('¿Eliminar este producto del carrito?')">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="row mt-4">
                <div class="col-md-6">
                    <h4>Total: ${{ number_format($total, 2) }}</h4>
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{ route('componentes.mostrar', ['componente' => 'tienda']) }}" 
                       class="btn btn-secondary">Continuar Comprando</a>
                   <form action="{{ route('carrito.procesar') }}" method="POST" class="d-inline">
                            @csrf
                        <button type="submit" class="btn btn-success" 
                            onclick="return confirm('¿Confirmar compra? Esta acción restará el stock de los productos.')">
                         Proceder al Pago
                        </button>
                    </form>
                </div>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
