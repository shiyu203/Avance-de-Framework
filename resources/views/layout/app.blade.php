<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 {{-- Aquí irá el título de cada página--}}
 <title>@yield('title')</title>
 @vite(['resources/sass/app.scss', 'resources/js/app.js']) 
</head>
<body>
    {{-- aqui va nuestro nuevo menú--}}   
    <nav class="navbar navbar-expand-lg bg-secondary navbar-dark">
        <div class="container-fluid">
    <a class="navbar-brand" href="#">Prestamo de Equipos</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Inicio</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             Clientes
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/usuarios/usuarios">clientes</a></li>
              <li><a class="dropdown-item" href="/usuarios/nuevousuario">Crear cliente</a></li>
              
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             vacios
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             vacios
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             vacios
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              
            </ul>
          </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           vacios
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">cosas</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
           
          </ul>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-dark" type="submit">Search</button>
    </form>
    </div>
  </div>
</nav>

    
     {{-- Aquí irá el contenido de todas las páginas siempre al final --}}
 @yield('content') 
</div> 
</body>