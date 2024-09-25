<body>
    @extends('layout.app')

    @section('title','Clientes')

    @section('content')
    <h1>Usuarios</h1>
    <h5>Lista de Clientes</h5>
    <hr>
    <a class="btn btn-success" href="#">Agregar un nuevo cliente</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Categoría</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                </td>
            </tr>
            

        </tbody>
    </table>
    @endsection

    @section('scripts')
    {{-- SweetAlert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- JS --}}
    <script src="{{ asset('js/cliente.js') }}"></script>
    @endsection
</body>

</html>