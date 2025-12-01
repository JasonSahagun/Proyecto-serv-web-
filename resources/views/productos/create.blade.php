<div class="container">
    <h1>Agregar Producto</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('productos.store') }}" method="POST">
        @csrf

        <!-- Nombre del producto -->
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del producto</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}" required>
        </div>

        <!-- Precio -->
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" name="precio" id="precio" class="form-control" step="0.01" value="{{ old('precio') }}">
        </div>

        <!-- Cantidad -->
        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" class="form-control" value="{{ old('cantidad') }}" required>
        </div>

        <!-- Estado -->
        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" id="estado" class="form-control" required>
                <option value="disponible" {{ old('estado') == 'disponible' ? 'selected' : '' }}>Disponible</option>
                <option value="agotado" {{ old('estado') == 'agotado' ? 'selected' : '' }}>Agotado</option>
            </select>
        </div>

        <!-- Proveedor -->
        <div class="mb-3">
            <label for="supplier_id" class="form-label">Proveedor</label>
            <select name="supplier_id" id="supplier_id" class="form-control" required>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                        {{ $supplier->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Categoría -->
        <div class="mb-3">
            <label for="category_id" class="form-label">Categoría</label>
            <select name="category_id" id="category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Guardar Producto</button>
    </form>
</div>
