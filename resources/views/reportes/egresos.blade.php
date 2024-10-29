@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Reporte de Egresos</h1>

    <a href="{{ route('egresos.pdf') }}" class="btn btn-success btn-md"> Generar PDF</a>

    @if($egresos->isEmpty())
        <p>No hay egresos para mostrar.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Monto</th>
                    <th>Fecha</th>
                    <th>Descripción</th>
                    <th>Categoría</th>
                </tr>
            </thead>
            <tbody>
                @foreach($egresos as $egreso)
                    <tr>
                        <td>{{ $egreso->monto }}</td>
                        <td>{{ $egreso->fecha}}</td>
                        <td>{{ $egreso->descripcion }}</td>
                        <td>{{ $egreso->categoria->nombre ?? 'Sin categoría' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
