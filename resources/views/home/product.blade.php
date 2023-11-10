@extends('layouts.app')

@section('title', 'Carrinho')

@section('content')
    <div class="container">
        <h3>{{ $registro->name }}</h3>

        <div class="row">
            <div class="col-md-4">
                <div class="thumbnail">
                    <img src="{{$registro->image}}" alt="Produto 1" class="img-responsive img-thumbnail" style="width: 400px; height: 400px;">
                    <div class="caption">
{{--                        <h3>{{ $registro->name }}</h3>--}}
                        <p>Descrição do Produto 1.</p>
                        <p>R$ {{ number_format($registro->price, 2, ',', '.') }}</p>
                        <form method="POST" action="{{route('cart.add')}}">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $registro->id }}">
                            <button class="btn btn-info btn-lg">Comprar</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
