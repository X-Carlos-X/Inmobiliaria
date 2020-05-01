@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $title }}</h1>

        <form action="{{ $action }}" method="POST">
            @csrf
            <div>
                <label for="name">Nombre</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
            </div>
            <div>
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required autocomplete="email">
            </div>
            <div>
                <label for="password">Contraseña</label>
                @if ($require_password)
                    <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                @else
                    <input id="password" type="password" class="form-control" name="password" autocomplete="new-password">
                @endif
            </div>
            <button class="btn btn-primary" type="submit">Guardar</button>
        </form>
    </div>
@endsection