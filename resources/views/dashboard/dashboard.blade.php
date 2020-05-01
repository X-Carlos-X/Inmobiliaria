@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dashboard</h1>
        <div class="row">
            <ul class="list-group col-12">
                <li class="list-group-item">
                    <a href="{{ route('dashboard.viviendas') }}"><h2>Viviendas</h2></a>
                    @if (auth()->user()->role == 'ROLE_ADMIN')
                        <a href="{{ route('dashboard.users') }}"><h2>Usuarios</h2></a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
@endsection
