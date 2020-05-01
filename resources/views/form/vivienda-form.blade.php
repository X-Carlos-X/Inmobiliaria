@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $title }}</h1>

        <form action="{{ $action }}" method="POST">
            @csrf
            <div>
                <label for="titulo">Titulo</label>
                <input id="titulo" type="text" name="titulo" value="{{ $vivienda->titulo }}" />
            </div>
            <div>
                <label for="precio">Precio</label>
                <input id="precio" type="number" name="precio" value="{{ $vivienda->precio }}" />
            </div>
            <div>
                <label for="descripcion">Descripcion</label>
                <textarea id="descripcion" name="descripcion">{{ $vivienda->descripcion }}</textarea>
            </div>
            <div>
                <input type="submit" name="submit" value="{{ $submit_label }}" />
            </div>
        </form>
    </div>
@endsection
