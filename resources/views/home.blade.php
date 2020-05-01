@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($viviendas as $vivienda)
                <div class="card">
                    <div class="card-header">{{ $vivienda->titulo }}</div>

                    <div class="card-body">
                        <div class="vivienda-descripcion">
                            {{ substr($vivienda->descripcion, 0, 255) }}...
                        </div>
                        <div class="vivienda-precio">
                            {{ $vivienda->precio }}€
                        </div>
                        <div class="vivienda-contacto">
                            <a href="{{ route('user', $vivienda->usuario()->id) }}">Contacta</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
