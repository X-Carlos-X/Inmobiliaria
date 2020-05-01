@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dashboard</h1>
        <div class="row">
            <a href="{{ route('user.create') }}" class="btn btn-primary">Crear nuevo usuario</a>
        </div>
        <div class="row">
            <ul class="list-group col-12">
                @foreach ($users as $user)
                    <li class="list-group-item col-12 d-lg-inline-flex justify-content-between align-content-center">
                        <h2>{{ $user->name }}</h2>
                        <div>
                            <a href="{{ route('user.update', $user->id) }}">Editar</a>
                            @if ($user->id != $current_user->id)
                                <a href="{{ route('user.delete', $user->id) }}">Borrar</a>
                            @endif
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection