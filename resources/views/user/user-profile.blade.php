@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $user->name }}</h1>
        <h2>Email: {{ $user->email }}</h2>
    </div>
@endsection