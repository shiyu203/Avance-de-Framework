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
    <a class="navbar-brand fw-bold" href="#">Prestamo de Equipos</a>
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
             Prestarmo
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/prestamo/prestamos">Prestamos</a></li>
              <li><a class="dropdown-item" href="/prestamo/nuevopresta">Crear nuevo prestamo</a></li>
              
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Equipo
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/equipo/equipos">Equipos</a></li>
              <li><a class="dropdown-item" href="/equipo/nuevoequipo">Crear equipo</a></li>
              
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             Admin
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/administrador/admins">Administradores</a></li>
              <li><a class="dropdown-item" href="/administrador/nuevoadmin">Crear admin</a></li>
              
            </ul>
          </li>
      </ul>
    </div>
  </div>
</nav>

    
     {{-- Aquí irá el contenido de todas las páginas siempre al final --}}
 @yield('content') 
</div> 
</body>