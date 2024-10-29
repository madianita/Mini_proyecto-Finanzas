<div>
@extends('layouts.app')

@section('content')
<div class="container ">
    <h1>{{ $egresos ? 'Editar Egreso' : 'Nueva Egreso' }}</h1>

    <div class="mt-3">
    <form action="{{ $egresos ? route('egresos.update', $egresos->id) : route('egresos.store') }}" method="POST">
        @csrf
        @if ($egresos)
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="monto">Monto:</label>
            <input type="number" class="form-control" id="monto" name="monto" value="{{ $egresos ? $egresos->monto : '' }}" required>
        </div>

        <div class="form-group">
            <label for="fecha">Fecha:</label>
            <input type="date" class="form-control" id="fecha" name="fecha" value="{{ $egresos ? $egresos->fecha : '' }}" required>
        </div>

        <div class="form-group">
            <label for="monto">Descripcion:</label>
            <textarea  class="form-control" id="descripcion" name="descripcion" required>{{ $egresos ? $egresos->descripcion : '' }}</textarea>
        </div>

        <div class="form-group">
            <label for="id_categoria">Categoria</label>
            <select class="form-control" id="id_categoria" name="id_categoria" required>
                <option value="">Selecciona una opcion...</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ ($egresos && $egresos->id_categoria == $categoria->id) ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mt-4">
        <button type="submit" class="btn btn-primary">{{ $egresos ? 'Guardar' : 'Añadir' }}</button>
        <a href="{{ route('egresos.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
    </div>
</div>
@endsection
</div>
