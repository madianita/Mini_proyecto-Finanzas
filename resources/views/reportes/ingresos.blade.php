@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Reporte de Ingresos</h1>

    <a href="{{ route('ingresos.pdf') }}" class="btn btn-success btn-md"> Generar PDF</a>

    @if($ingresos->isEmpty())
        <p>No hay Ingresos para mostrar.</p>
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
                @foreach($ingresos as $ingreso)
                    <tr>
                        <td>{{ $ingreso->monto }}</td>
                        <td>{{ $ingreso->fecha}}</td>
                        <td>{{ $ingreso->descripcion }}</td>
                        <td>{{ $ingreso->categoria->nombre ?? 'Sin categoría' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
