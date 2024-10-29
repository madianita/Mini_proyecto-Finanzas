@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Ingresos</h1>

    <div class="mt-4">
    <a href="{{ route('ingresos.ingresos') }}" class="btn btn-primary btn-md"> Nuevo Ingreso</a>

    </div>

    <div class="col-lg-12 mt-5">
        <div class="table-responsive">
            <table class=" table table-stripped">
                <thead>
                    <tr>
                        <th>Monto</th>
                        <th>Fecha</th>
                        <th>Descripcion</th>
                        <th>Categoria</th>
                        <th>Usuario</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ingresos as $item)
                    <tr>
                        <td>{{ $item->monto }}</td>
                        <td>{{ $item->fecha }}</td>
                        <td>{{ $item->descripcion }}</td>
                        <td>{{ $item->categoria->nombre }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>
                            <a href="{{ route('ingresos.edit', $item->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('ingresos.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar?');">Eliminar</button>
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
