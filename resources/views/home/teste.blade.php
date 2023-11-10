@extends('layouts.app')

@section('title', 'Carrinho')

@section('content')
    <div class="container">
        <h1 class="text-center">Lista de Produtos</h1>

        <div class="row">
            <!-- Produto 1 -->
            <div class="col-md-4">
                <div class="thumbnail">
                    <img src="https://images-na.ssl-images-amazon.com/images/I/61-gm6pcFkL._AC_UL600_SR600,600_.jpg" alt="Produto 1" class="img-responsive img-thumbnail">
                    <div class="caption">
                        <h3>Produto 1</h3>
                        <p>Descrição do Produto 1.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
