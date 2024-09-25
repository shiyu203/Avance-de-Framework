<body>
    @extends('layout.app')

    @section('title','Nuevovliente')

    @section('content')
    <h1 class="header">Crear</h1>
    <h5 class="subheader">Formulario para crear Cliente</h5>
    <hr class="divider">
    <form action="/cliente/store" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre">
            @error('nombre')
            <span class="invalid-feedback d-block" role="alert">
                <strong></strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="edad">Edad:</label>
            <input type="text" placeholder="ejemplo: 23" name="edad" id="edad">
            @error('edad')
            <span class="invalid-feedback d-block" role="alert">
                <strong></strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="categoriaS">Categorías:</label>
            <select name="categoria" id="categorias">
                
                <option value=""></option>
                @endforeach
            </select>
        </div>
        <div class="col-12 mt-2">
             <button class="btn btn-primary">Guardar</button>
         </div>
    </form>
    @endsection
</body>