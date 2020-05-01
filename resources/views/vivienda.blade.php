@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $vivienda->titulo }}</h1>
        <p>{{ $vivienda->precio }}€</p>
        <p>{{ $vivienda->descripcion }}</p>
    </div>
@endsection
