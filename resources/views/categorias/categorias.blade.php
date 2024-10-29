<div>
@extends('layouts.app')

@section('content')
<div class="container ">
    <h1>{{ $categoria ? 'Editar Categoría' : 'Nueva Categoría' }}</h1>

    <div class="mt-3">
    <form action="{{ $categoria ? route('categorias.update', $categoria->id) : route('categorias.store') }}" method="POST">
        @csrf
        @if ($categoria)
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $categoria ? $categoria->nombre : '' }}" required>
        </div>

        <div class="mt-4">
        <button type="submit" class="btn btn-primary">{{ $categoria ? 'Guardar' : 'Añadir' }}</button>
        <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
    </div>
</div>
@endsection
</div>
