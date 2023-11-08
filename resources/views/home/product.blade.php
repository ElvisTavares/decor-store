@extends('layout')
@section('pagina_titulo', $registro->name )

@section('pagina_conteudo')

{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <h3>{{ $registro->name }}</h3>--}}
{{--            <div class="divider"></div>--}}
{{--            <div class="section col s12 m6 l4">--}}
{{--                <div class="card small">--}}
{{--                    <img class="col s12 m12 l12 materialboxed" data-caption="{{ $registro->name }}" src="{{ $registro->image }}" alt="{{ $registro->name }}" title="{{ $registro->name }}">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="section col s12 m6 l6">--}}
{{--                <h4 class="left col l6"> R$ {{ number_format($registro->value, 2, ',', '.') }} </h4>--}}
{{--                <form method="POST" action="">--}}
{{--                    {{ csrf_field() }}--}}
{{--                    <input type="hidden" name="id" value="{{ $registro->id }}">--}}
{{--                    <button class="btn-large col l6 m6 s6 green accent-4 tooltipped" data-position="bottom" data-delay="50" data-tooltip="O produto será adicionado ao seu carrinho">Comprar</button>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--            <div class="section col s12 m6 l6">--}}
{{--                {!! $registro->description !!}--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


{{--    newww--}}
<div class="container">
   <div class="row">
       <div class="d-flex justify-content-center">
           <div style="width: 250px;">
               <h3>{{ $registro->name }}</h3>
               <img src="{{ $registro->image }}" width="100%"><br><Br>
{{--               <button type="button" class="btn btn-info btn-lg">Comprar</button>--}}
           <h4>R$ {{ number_format($registro->price, 2, ',', '.') }}</h4>
               <form method="POST" action="{{route('cart.add')}}">
                   {{ csrf_field() }}
                   <input type="hidden" name="id" value="{{ $registro->id }}">
                   <button class="btn-large col l6 m6 s6 green accent-4 tooltipped" data-position="bottom" data-delay="50" data-tooltip="O produto será adicionado ao seu carrinho">Comprar</button>
               </form>
       </div>
   </div>
</div>
@endsection
