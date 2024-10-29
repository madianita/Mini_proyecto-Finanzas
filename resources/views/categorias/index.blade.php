@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Categorías</h1>

    <div class="mt-4">
    <a href="{{ route('categorias.categorias') }}" class="btn btn-primary btn-md"> Nueva Categoría</a>
    </div>

    <div class="col-lg-12 mt-5">
        <div class="table-responsive">
            <table class=" table table-stripped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorias as $item)
                    <tr>
                        <td>{{ $item->nombre }}</td>
                        <td>
                            <a href="{{ route('categorias.edit', $item->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('categorias.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar esta categoría?');">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
