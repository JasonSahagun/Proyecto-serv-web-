@extends('/admin/plantilla/layout')
@section('titulo','Editar producto')

@section('contenido')

<h1>EDITAR </h1>
<form class="row g-3 needs-validation" method="POST" action="/productos/{{$producto->id}}" novalidate
  enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="col-md-4">
    <label for="validationCustom01" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="validationCustom01" name="name" value="{{$producto->name}}" required>
    <div class="valid-feedback">
      Looks good!
    </div>
    <div class="invalid-feedback">
        Please choose a username.
      </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustom02" class="form-label">Proveedor</label>
    <input type="text" class="form-control" id="validationCustom02" name="supplier_id"
    value="{{$producto->supplier_id}}" required>
    <div class="valid-feedback">
      Looks good!
    </div>
    <div class="invalid-feedback">
        Please choose a description.
      </div>
  </div>

  <div class="col-md-04">
    <label for="validationCustom02" class="form-label">Categoria</label>
    <input type="text" class="form-control" id="validationCustom02" name="categorie_id"
    value="{{$producto->categorie_id}}" required>
    <div class="valid-feedback">
      Looks good!
  </div>

  <div class="col-md-04">
    <label for="validationCustom02" class="form-label">Precio</label>
    <input type="number" class="form-control" id="validationCustom02" name="price"
    value="{{$producto->price}}" required>
    <div class="valid-feedback">
      Looks good!
  </div>

  <div class="col-md-04">
    <label for="validationCustom02" class="form-label">Cantidad</label>
    <input type="number" class="form-control" id="validationCustom02" name="quantity"
    value="{{$producto->quantity}}" required>
    <div class="valid-feedback">
      Looks good!
  </div>

  {{-- <div class="col-md-4">
    <label for="validationCustomUsername" class="form-label">usuario</label>
    <div class="input-group has-validation">
      <span class="input-group-text" id="inputGroupPrepend">@</span>
      <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
      <div class="invalid-feedback">
        Please choose a username.
      </div>
    </div>
  </div> --}}

  <div class="col-md-6">
    <label for="validationCustom03" class="form-label">Img</label>
    <input type="file" accept="image/*" class="form-control" id="validationCustom03" name="imagen" required>
    <div class="invalid-feedback">
      Please provide a valid Picture .
    </div>
  </div>
  
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit">Actualizar</button>
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

@endsection