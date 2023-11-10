@extends('layouts.app')

@section('title', 'Produtos')

@section('content')

    <div class="container">
        <div class="row">
            @foreach($registros as $registro)
{{--                <div class="col s12 m6 l4">--}}
{{--                    <div class="card medium">--}}
{{--                        <div class="card-image">--}}
{{--                            <img src="{{ $registro->image }}">--}}
{{--                        </div>--}}
{{--                        <div class="card-content">--}}
{{--                            <span class="card-title grey-text text-darken-4 truncate" title="{{ $registro->name }}">{{ $registro->name }}</span>--}}
{{--                            <p>R$ {{ number_format($registro->price, 2, ',', '.') }}</p>--}}
{{--                        </div>--}}
{{--                        <div class="card-action">--}}
{{--                            <a class="blue-text" href="{{ route('.product', $registro->id) }}">Veja mais informações</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}


                   <div class="col-md-4 mb-4">
                       <div class="thumbnail">
                           <img src="{{$registro->image}}" alt="Produto 1" class="img-responsive img-thumbnail" style="width: 320px; height: 320px;">
                           <div class="caption">
                               <h4>{{ $registro->name }}</h4>
                               <p>Descrição do Produto 1.</p>
                               <p>R$ {{ number_format($registro->price, 2, ',', '.') }}</p>
{{--                               <a href="{{ route('.product', $registro->id) }}">Veja mais informações</a>--}}
{{--                               <button type="button" class="btn btn-info">Info</button>--}}
                             <div class="button-container">
                                 <a href="{{ route('.product', $registro->id) }}" class="btn btn-secondary btn-md info custom-btn-link" role="button" aria-pressed="true">Veja mais informações</a>
                             </div>
                           </div>
                       </div>
                   </div>


            @endforeach
        </div>
    </div>

@endsection
