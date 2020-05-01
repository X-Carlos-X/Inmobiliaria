@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dashboard</h1>
        <div class="row">
            <a href="{{ route('vivienda.create') }}" class="btn btn-primary">Crear nueva vivienda</a>
        </div>
        <div class="row">
            <ul class="list-group col-12">
                @foreach ($viviendas as $vivienda)
                    <li class="list-group-item col-12 d-lg-inline-flex justify-content-between align-content-center">
                        <h2>{{ $vivienda->titulo }}</h2>
                        <div>
                            <a href="{{ route('vivienda.update', $vivienda->id) }}">Editar</a>
                            <a href="{{ route('vivienda.delete', $vivienda->id) }}">Borrar</a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
