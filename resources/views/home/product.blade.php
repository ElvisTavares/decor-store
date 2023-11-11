@extends('layouts.app')

@section('title', 'Carrinho')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="thumbnail">
                <img src="{{$registro->image}}" alt="Produto 1" class="img-responsive img-thumbnail" style="width: 400px; height: 400px;">
            </div>
        </div>
        <div class="col-md-8">
            <h3 class="mt-4">{{ $registro->name }}</h3>
            <div class="caption">
                <p class="left-aligned text-muted mb-4" >{{$registro->description}}.</p>
                <p class="left-aligned text-muted mb-5">R$ {{ number_format($registro->price, 2, ',', '.') }}</p>
                <form method="POST" action="{{route('cart.add')}}">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $registro->id }}">
                    <button class="btn btn-lg">Comprar</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
