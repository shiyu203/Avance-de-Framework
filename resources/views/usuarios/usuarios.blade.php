<head>
    <style>
        .centroM{
            margin: 2% 2%;

        };
        .rounded{
            border-radius: 100%
        }
    </style>
</head>
<body>
    @extends('layout.app')

    @section('title','Clientes')

    @section('content')
    <h1>Clientes</h1>
    <h5>Usuarios registrados permitidos y no permitidos</h5>
    <hr>
    <a class="btn btn-success centroM" href="#">Agregar un nuevo cliente</a>
    <div class="centroM">
        <table class="table table-striped rounded">
            <thead>
            <tr>
                <th class="bg-dark text-white" >ID</th>
                <th class="bg-dark text-white" >Nombre</th>
                <th class="bg-dark text-white" >Edad</th>
                <th class="bg-dark text-white" >Categoría</th>
                <th class="bg-dark text-white" >Acciones</th>
            </tr>
        </thead>
        <tbody>
            
            <tr>
                <td>2</td>
                <td>Josue Raul Pineda Santos</td>
                <td>21</td>
                <td>Informatica</td>
                <td>
                    <button class="btn btn-info text-white">Prestar</button>
                    <button class="btn" style="background-color: #6a0dad; color: white;">Bloquear</button>
                    <button class="btn btn-warning text-white">Editar</button>
                    <button class="btn btn-danger">Eliminar</button>                    
                </td>
            </tr>
            

        </tbody>
    </table>
    <br>
    <h2>Usuarios no permitidos</h2>
    <table class="table table-striped rounded">
        <thead>
        <tr>
            <th class="bg-dark text-white" >ID</th>
            <th class="bg-dark text-white" >Nombre</th>
            <th class="bg-dark text-white" >Edad</th>
            <th class="bg-dark text-white" >Categoría</th>
            <th class="bg-dark text-white" >Acciones</th>
        </tr>
    </thead>
    <tbody>
        
        <tr>
            <td>2</td>
            <td>Josue Raul Pineda Santos</td>
            <td>21</td>
            <td>Informatica</td>
            <td>
                <button class="btn btn-info text-white">quitar</button>                  
            </td>
        </tr>
        

    </tbody>
</table>
    @endsection
    </div>
    

    @section('scripts')
    {{-- SweetAlert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- JS --}}
    <script src="{{ asset('js/cliente.js') }}"></script>
    @endsection
</body>

</html>