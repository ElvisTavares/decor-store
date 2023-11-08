@extends('layouts.app')

@section('title', 'Carrinho')

@section('content')

    @if(\Illuminate\Support\Facades\Session::has('message-success'))
        <div class="alert alert-success" role="alert">
            <strong> {{ \Illuminate\Support\Facades\Session::get('message-success') }}</strong>
        </div>
    @endif

    @if(\Illuminate\Support\Facades\Session::has('message-failure'))
        <div class="alert alert-danger" role="alert">
            <strong> {{ \Illuminate\Support\Facades\Session::get('message-failure') }}</strong>
        </div>
    @endif

    @forelse($orders as $order)
        <h5>Pedido: {{$order->id}}</h5>
        <h5>Criado em: {{ $order->created_at->format('d/m/Y H:i') }}</h5>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Qtd</th>
            <th scope="col">Produto</th>
            <th scope="col">Valor unitario</th>
            <th scope="col">Desconto</th>
            <th scope="col">Total</th>
        </tr>
        </thead>
        <tbody>

        @php
            $total_order = 0;
        @endphp

        @foreach($order->order_products as $order_product)
          <tr>
              <td>
                  <img width="100" height="100" src="{{$order_product->image}}" alt="">
              </td>
              <td>
                  <div class="input-group">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-default btn-number" data-type="minus">-</button>
                    </span>
                      <input type="text" class="form-control input-number" value="{{$order_product->qtd}}" min="1" max="100">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-default btn-number" data-type="plus">+</button>
                    </span>
                  </div>
                  <a href="">Remover produto</a>
              </td>
              <td>{{$order_product->product->name}}</td>
              <td>{{ number_format($order_product->product->price, 2, ',', '.') }}</td>
              <td>{{ number_format($order_product->discount, 2, ',', '.') }}</td>
              @php
                $total_product = $order_product->value - $order_product->discount;
                $total_order += $total_product;
              @endphp
              <td>R$: {{number_format($total_product,  2, ',', '.')}}</td>
          </tr>
        @endforeach
        </tbody>
    </table>
        <div class="row">
            <strong>
                Total do pedido:
            </strong>
            <span>  {{number_format($total_order,  2, ',', '.')}}</span>
        </div>
        <div class="row">
            <a href="{{route('.index')}}">Continuar comprando</a>
        </div>
    @empty
        <h5>Não há nenhum pedido no carrinho</h5>
    @endforelse
@endsection
