<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda - Lista de Productos</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tu CSS personalizado -->
    <link href="{{ asset('css_boot_50/product.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <header class="site-header sticky-top py-1">
    <nav class="container d-flex flex-column flex-md-row justify-content-between">
    <a class="py-2" href="/product" aria-label="Product">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mx-auto" role="img" viewBox="0 0 24 24"><title>Product</title><circle cx="12" cy="12" r="10"/><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/></svg>
    </a>
    <a class="py-2 d-none d-md-inline-block" href="/product">Inicio</a>
    <a class="py-2 d-none d-md-inline-block" href="{{ route('carrito.mostrar') }}">
        🛒 Carrito
        @if(count(session('carrito', [])) > 0)
            <span class="badge bg-danger">{{ count(session('carrito', [])) }}</span>
        @endif
    </a>
    <a class="py-2 d-none d-md-inline-block" href="#">Registrarse</a>
    <a class="py-2 d-none d-md-inline-block" href="#">Inicia sesion</a>
   <a class="py-2 d-none d-md-inline-block" href="#"></a>
  </nav>
    </header>

    <!-- Contenido Principal -->
    <main class="container my-5">
        <!-- Filtros y Búsqueda -->
        <div class="row mb-4">
            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Buscar productos..." id="buscador">
            </div>
            <div class="col-md-3">
                <select class="form-select" id="categoria-filtro">
                    <option value="">Todas las categorías</option>
                    <option value="procesadores">Procesadores</option>
                    <option value="memorias">Memorias RAM</option>
                    <option value="almacenamiento">Almacenamiento</option>
                    <option value="graficas">Tarjetas Gráficas</option>
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-select" id="ordenar-por">
    <option value="nombre_asc">Nombre: A-Z</option>
    <option value="nombre_desc">Nombre: Z-A</option>
    <option value="precio_asc">Precio: Menor a Mayor</option>
    <option value="precio_desc">Precio: Mayor a Menor</option>
</select>
            </div>
        </div>

        <!-- Mensajes de éxito/error -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Lista de Productos -->
        <div class="row" id="lista-productos">
            @foreach($productos as $producto)
            <div class="col-lg-4 col-md-6 mb-4 producto-item" 
                 data-categoria="{{ $mapeoCategorias[$producto->category_id] ?? 'otros' }}" 
                 data-precio="{{ $producto->precio }}">
                <div class="card h-100 producto-card">
                    <!-- Imagen del Producto -->
                    <div class="producto-imagen-container">
                        @if($producto->imagen)
                        <img src="{{ asset('storage/' . $producto->imagen) }}" 
                             alt="{{ $producto->nombre }}"
                             class="producto-imagen card-img-top">
                        @else
                        <div class="d-flex align-items-center justify-content-center h-100">
                            <span class="text-muted">Sin imagen</span>
                        </div>
                        @endif
                    </div>
                    
                    <!-- Información del Producto -->
                    <div class="card-body">
                        <h5 class="producto-nombre card-title">{{ $producto->nombre }}</h5>
                        <p class="producto-descripcion card-text">
                            {{ $producto->descripcion ?? 'Descripción no disponible' }}
                        </p>
                        <div class="producto-precio">
                            <span class="precio-actual">${{ number_format($producto->precio, 2) }}</span>
                        </div>
                        <div class="producto-stock">
                            <small class="text-muted">Disponibles: {{ $producto->cantidad }}</small>
                        </div>
                        <div class="producto-estado">
                            <small class="badge {{ $producto->estado == 'disponible' ? 'bg-success' : 'bg-danger' }}">
                                {{ ucfirst($producto->estado) }}
                            </small>
                        </div>
                    </div>
                    
                    <!-- Acciones -->
                    <div class="card-footer">
                        <div class="d-flex justify-content-between align-items-center">
                            <form action="{{ route('carrito.agregar') }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                                <input type="hidden" name="cantidad" value="1">
                                <button type="submit" class="btn btn-primary btn-agregar-carrito"
                                        {{ $producto->cantidad == 0 || $producto->estado == 'agotado' ? 'disabled' : '' }}>
                                    {{ $producto->cantidad == 0 || $producto->estado == 'agotado' ? 'Agotado' : 'Agregar al Carrito' }}
                                </button>
                            </form>
                            <a href="#" class="btn btn-outline-secondary">
                                Ver Detalles
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
            @if($productos->isEmpty())
            <div class="col-12 text-center py-5">
                <h4>No hay productos disponibles</h4>
                <p class="text-muted">Próximamente agregaremos más productos a la tienda.</p>
            </div>
            @endif
        </div>
        
        <!-- Paginación -->
        <div class="row">
            <div class="col-12">
                <nav aria-label="Paginación de productos">
                </nav>
            </div>
        </div>
        
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>Mi Tienda</h5>
                    <p>Tu destino para componentes de computadora</p>
                </div>
                <div class="col-md-6 text-end">
                    <p>&copy; 2024 Mi Tienda. Todos los derechos reservados.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- JavaScript embebido para debug -->
    <script>
        console.log('JavaScript cargado - empezando filtrado...');
        
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM cargado - inicializando filtros...');
            
            const buscador = document.getElementById('buscador');
            const categoriaFiltro = document.getElementById('categoria-filtro');
            const ordenarPor = document.getElementById('ordenar-por');
            const productos = document.querySelectorAll('.producto-item');

            console.log('Elementos encontrados:', {
                buscador: !!buscador,
                categoriaFiltro: !!categoriaFiltro,
                ordenarPor: !!ordenarPor,
                productos: productos.length
            });

            function filtrarYOrdenarProductos() {
                console.log('Ejecutando filtrado...');
                
                const textoBusqueda = buscador.value.toLowerCase();
                const categoriaSeleccionada = categoriaFiltro.value;
                const orden = ordenarPor.value;

                let productosFiltrados = [];

                // Filtrar productos
                productos.forEach(producto => {
                    const nombre = producto.querySelector('.producto-nombre').textContent.toLowerCase();
                    const categoria = producto.dataset.categoria;
                    const precio = parseFloat(producto.dataset.precio);
                    
                    const coincideBusqueda = nombre.includes(textoBusqueda);
                    const coincideCategoria = !categoriaSeleccionada || categoria === categoriaSeleccionada;
                    
                    if (coincideBusqueda && coincideCategoria) {
                        productosFiltrados.push({ 
                            elemento: producto, 
                            precio: precio,
                            nombre: nombre
                        });
                        producto.style.display = 'block';
                    } else {
                        producto.style.display = 'none';
                    }
                });

                console.log('Productos filtrados:', productosFiltrados.length);

                // Ordenar productos
                productosFiltrados.sort((a, b) => {
                    switch(orden) {
                        case 'precio_asc':
                            return a.precio - b.precio;
                        case 'precio_desc':
                            return b.precio - a.precio;
                        case 'nombre_asc':
                            return a.nombre.localeCompare(b.nombre);
                        case 'nombre_desc':
                            return b.nombre.localeCompare(a.nombre);
                        default:
                            return 0;
                    }
                });

                // Reorganizar en el DOM
                const contenedor = document.getElementById('lista-productos');
                productosFiltrados.forEach(item => {
                    contenedor.appendChild(item.elemento);
                });
                
                console.log('Filtrado completado');
            }

            // Event listeners
            buscador.addEventListener('input', filtrarYOrdenarProductos);
            categoriaFiltro.addEventListener('change', filtrarYOrdenarProductos);
            ordenarPor.addEventListener('change', filtrarYOrdenarProductos);
            
            // Ordenar inicialmente
            filtrarYOrdenarProductos();
            
            console.log('Event listeners configurados');
        });
    </script>
</body>
</html>