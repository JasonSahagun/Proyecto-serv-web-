<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Product example · Bootstrap v5.0</title>

    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/product/"> -->

    

    <!-- Bootstrap core CSS --><link href="/assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="css_boot_50/product.css" rel="stylesheet">
  </head>
  <body>
    
<header class="site-header sticky-top py-1">
  <nav class="container d-flex flex-column flex-md-row justify-content-between">
    <a class="py-2" href="#" aria-label="Product">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mx-auto" role="img" viewBox="0 0 24 24"><title>Product</title><circle cx="12" cy="12" r="10"/><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/></svg>
    </a>
    <a class="py-2 d-none d-md-inline-block" href="#">Inicio</a>
    <a class="py-2 d-none d-md-inline-block" href="#">Registrarse</a>
    <a class="py-2 d-none d-md-inline-block" href="#">Inicia sesion</a>
   <a class="py-2 d-none d-md-inline-block" href="#"></a>
  </nav>
</header>

<main>
  <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
    <div class="col-md-5 p-lg-5 mx-auto my-5">
      <h1 class="display-4 fw-normal">BugBusters</h1>
      <p class="lead fw-normal">Donde podras vender y comprar tus productos en un solo lugar</p>
      <a class="btn btn-outline-secondary" href="#">Proximamente papu</a>
    </div>
    <div class="product-device shadow-sm d-none d-md-block"></div>
    <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
  </div>

  <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
    <div class="bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
      <div class="my-3 py-3">
        <h2 class="display-5">Procesadores</h2>
        <p class="lead">Aqui encontraras procesadores de Amd o INTEL para tu PC
        </p>
      </div>
      <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"> 
      <a href="{{ route('componentes.mostrar', ['componente' => 'procesadores', 'id' => 1]) }}" class="boton-imagen">
        <img src ="{{asset('images/procesador.jpg')}}" 
        alt="procesador" 
        class="imagen-procesador">
      </a>
      </div>
    </div>
    <div class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
      <div class="my-3 p-3">
        <h2 class="display-5">Memorias RAM</h2>
        <p class="lead">Donde encontraras memorias de diferentes empresas como samsung y rizen</p>
      </div>
      <div class="bg-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
        <a href="{{ route('componentes.mostrar', ['componente' => 'memoriaRam', 'id' => 2]) }}">
        <img src ="{{asset('images/memoria_Ram.png')}}"
        alt="Ram"
        class="imagen-memoria_Ram">
        </a>
      </div>
    </div>
  </div>

  <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
    <div class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
      <div class="my-3 p-3">
        <h2 class="display-5">Almacenamiento</h2>
        <p class="lead">Encontraras memorias desde kingston a samsung para expandir tu almacenamiento</p>
      </div>
      <div class="bg-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
        <a href="{{ route('componentes.mostrar', ['componente' => 'almacenamiento', 'id' => 3]) }}">
        <img src ="{{asset('images/almacenamiento.jpeg')}}"
        alt="Alma"
        class="imagen-almacenamiento">
        </a>
      </div>
    </div>
    <div class="bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
      <div class="my-3 py-3">
        <h2 class="display-5">Tarjeta Grafica</h2>
        <p class="lead">Aqui encontraras las mejores graficas del mercado como las mas basicas </p>
      </div>
      <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
        <a href="{{route('componentes.mostrar',['componente'=> 'tarjetaGr','id'=> 4])}}">
          <img src="{{asset('images/tarjetasGr.jpeg')}}"
          alt="tarGr"
          class="imagen-tarjetaGr">
        </a>
      </div>
    </div>
  </div>

  <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
    <div class="bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
      <div class="my-3 p-3">
        <h2 class="display-5">Fuente de Poder</h2>
        <p class="lead">(descripcion mamalona)</p>
      </div>
      <div class="bg-body shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
          <a href="{{route('componentes.mostrar',['componente'=> 'fuentePo','id'=> 5])}}">
          <img src="{{asset('images/FuentePo.jpg')}}"
          alt="FuenPo"
          class="imagen-fuentePo">
        </a>
      </div>
    </div>
    <div class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
      <div class="my-3 py-3">
        <h2 class="display-5">Gabinetes</h2>
        <p class="lead">Encontraras desde gabinetes sencillos, con cristal, RGB y mas</p>
      </div>
      <div class="bg-body shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
          <a href="{{route('componentes.mostrar',['componente'=> 'gabinete','id'=> 6])}}">
          <img src="{{asset('images/gabinete.jpeg')}}"
          alt="gabi"
          class="imagen-gabinete">
          </a>
      </div>
    </div>
  </div>

  <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
    <div class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
      <div class="my-3 p-3">
        <h2 class="display-5">Refrigeracion</h2>
        <p class="lead">(Descripcion mamalona x2)</p>
      </div>
      <div class="bg-body shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
        <a href="{{route('componentes.mostrar',['componente'=> 'refrijeracion','id'=> 7])}}">
          <img src="{{asset('images/refrigeracion.jpeg')}}"
          alt="refri"
          class="imagen-refrijeracion">
        </a>
      </div>
    </div>
    <div class="bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
      <div class="my-3 py-3">
        <h2 class="display-5">Pre Armados</h2>
        <p class="lead">Pc_s ya hechas para que tu no lo tengas que hacer.</p>
      </div>
      <div class="bg-body shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
        <a href="{{route('componentes.mostrar',['componente'=> 'preArma','id'=> 8])}}">
          <img src="{{asset('images/pcA.jpg')}}"
          alt="pcA"
          class="imagen-pcA">
        </a>
      </div>
    </div>

  <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
    <div class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
      <div class="my-3 p-3">
        <h2 class="display-5">Tienda</h2>
        <p class="lead">(aqui encontraras todos los productos sin filtro)</p>
      </div>
      <div class="bg-body shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
        <a href="{{route('componentes.mostrar',['componente'=> 'tienda','id'=> 9])}}">
          <img src="{{asset('images/tienda.jpg')}}"
          alt="tienda"
          class="imagen-tienda">
        </a>
      </div>
    </div>
  </div>
</main>

<footer class="container py-5">
  <div class="row">
    <div class="col-12 col-md">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mb-2" role="img" viewBox="0 0 24 24"><title>Product</title><circle cx="12" cy="12" r="10"/><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/></svg>
      <small class="d-block mb-3 text-muted">&copy; 2017–2021</small>
    </div>
    <div class="col-6 col-md">
      <h5>Features</h5>
      <ul class="list-unstyled text-small">
        <li><a class="link-secondary" href="#">Cool stuff</a></li>
        <li><a class="link-secondary" href="#">Random feature</a></li>
        <li><a class="link-secondary" href="#">Team feature</a></li>
        <li><a class="link-secondary" href="#">Stuff for developers</a></li>
        <li><a class="link-secondary" href="#">Another one</a></li>
        <li><a class="link-secondary" href="#">Last time</a></li>
      </ul>
    </div>
    <div class="col-6 col-md">
      <h5>Resources</h5>
      <ul class="list-unstyled text-small">
        <li><a class="link-secondary" href="#">Resource name</a></li>
        <li><a class="link-secondary" href="#">Resource</a></li>
        <li><a class="link-secondary" href="#">Another resource</a></li>
        <li><a class="link-secondary" href="#">Final resource</a></li>
      </ul>
    </div>
    <div class="col-6 col-md">
      <h5>Resources</h5>
      <ul class="list-unstyled text-small">
        <li><a class="link-secondary" href="#">Business</a></li>
        <li><a class="link-secondary" href="#">Education</a></li>
        <li><a class="link-secondary" href="#">Government</a></li>
        <li><a class="link-secondary" href="#">Gaming</a></li>
      </ul>
    </div>
    <div class="col-6 col-md">
      <h5>About</h5>
      <ul class="list-unstyled text-small">
        <li><a class="link-secondary" href="#">Team</a></li>
        <li><a class="link-secondary" href="#">Locations</a></li>
     <li> 
    <a href="{{ route('editar.index') }}">Administrar Productos</a></li>
        <li><a class="link-secondary" href="{{route('productos.create')}}" class="btn btn-primary">Terms</a></li>
      </ul>
    </div>
  </div>
</footer>


    <script src="/assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
