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
        <h5 class="mb-4">Pedido: {{$order->id}}</h5>
        <h5 class="mb-4">Criado em: {{ $order->created_at->format('d/m/Y H:i') }}</h5>
    <table class="table mb-4 border border-transparent">
        <thead class="bg-light">
        <tr>
            <th scope="col"></th>
            <th scope="col">Produto</th>
            <th scope="col">Qtd</th>
            <th scope="col">Valor unitario</th>
            <th scope="col">Desconto</th>
            <th scope="col">Total</th>
        </tr>
        </thead>
        <tbody class="white-background">

        @php
            $total_order = 0;
        @endphp

        @foreach($order->order_products as $order_product)

          <tr>
              <td>
                  <img width="100" height="100" src="{{$order_product->product->image}}" alt="">
              </td>
              <td class="align-middle px-4 text-muted">{{$order_product->product->name}} {{$order_product->product->id}}</td>
              <td>
                  <div class="input-group" style="width: 120px">
                    <span class="input-group-btn">
                        <button id="minus_{{ $order_product->product->id }}" type="button" class="btn btn-default btn-number" data-product-id="{{ $order_product->product->id }}" data-type="minus">
                            -
                        </button>
                    </span>
                      <input id="quantity_{{ $order_product->product->id }}" type="text" class="form-control input-number"  value="{{$order_product->qtd}}" min="1" max="100">
                    <span class="input-group-btn">
                        <button id="plus_{{ $order_product->product->id }}" type="button" class="btn btn-default btn-number" data-product-id="{{ $order_product->product->id }}" data-type="plus">
                            +
                        </button>
                    </span>
                  </div>
                  <a href="">Remover produto</a>
              </td>

              <td class="align-middle px-4 text-muted">{{ number_format($order_product->product->price, 2, ',', '.') }}</td>
              <td class="align-middle px-4 text-muted">{{ number_format($order_product->discount, 2, ',', '.') }}</td>
              @php
                $total_product = $order_product->product->price - $order_product->discount;
                $total_order += $total_product;
              @endphp
              <td class="align-middle px-4 text-muted">R$: {{number_format($total_product,  2, ',', '.')}}</td>
          </tr>


          <script>
              // var csrfToken = $('meta[name="csrf-token"]').attr('content');

              $('#plus_{{ $order_product->product->id }}').click(function(e) {
                  e.preventDefault();

                  var input = $('#quantity_{{ $order_product->product->id }}');
                  var currentVal = parseInt(input.val());

                  if(!isNaN(currentVal)) {
                      input.val(currentVal + 1);
                  }

                  updateCart($(this).attr('data-product-id'), input.val());
              });

              $('#minus_{{ $order_product->product->id }}').click(function(e) {
                  e.preventDefault();

                  var input = $('#quantity_{{ $order_product->product->id }}');
                  var currentVal = parseInt(input.val());

                  if(!isNaN(currentVal) && currentVal > 1) {
                      input.val(currentVal - 1);
                  }

                  updateCart($(this).attr('data-product-id'), input.val());
              });

              function updateCart(productId, newQuantity) {
                  var csrfToken = $('meta[name="csrf_token"]').attr('content');
                  console.log(csrfToken);
                $.ajax({

                    url: 'cart/update',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    data: {
                        id: productId,
                        newQuantity: newQuantity
                    },
                    success: function(response) {

                    },
                    error: function (xhr, status, error) {

                    }
                });
              }

          </script>

        @endforeach
        </tbody>
    </table>
        <div class="row justify-content-end" style="margin-bottom: 20px;">
            <strong>
                Total do pedido: R$
            </strong>
            <span class="text-muted" style="margin-left: 5px;">{{number_format($total_order, 2, ',', '.')}}</span>
        </div>

        <div class="row justify-content-end">
            <button type="button" class="btn" style="background-color: rgba(109, 53, 48, 0.7); color: white;">Continuar comprando</button>

        </div>


    @empty
        <h5>Não há nenhum pedido no carrinho</h5>
    @endforelse

@endsection
