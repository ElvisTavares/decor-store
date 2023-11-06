@extends('layouts.app')

@section('title', 'Registrar usuário')

@section('content')

    <div>
        @if (\Illuminate\Support\Facades\Auth::check())
            <h1>Olá, {{ Auth::user()->name }}</h1>

        @else
            <p>Você nao esta autenticado.</p>
        @endif
    </div>
@endsection
