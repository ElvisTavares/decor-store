@extends('layouts.app')

@section('title', 'Produtos')

@section('content')

    <div class="container">
        <div class="row">
            @foreach($registros as $registro)
                   <div class="col-md-4 mb-4">
                       <div class="thumbnail">
{{--                           <img src="{{$registro->image}}" alt="Produto 1" class="img-responsive img-thumbnail" style="width: 320px; height: 320px;">--}}
                           <img src="{{asset($registro->image)}}" alt="Produto 1" class="img-responsive img-thumbnail" style="width: 320px; height: 320px;">
                           <div class="caption">
                               <h4>{{ $registro->name }}</h4>
{{--                               <p>{{$registro->description}}</p>--}}
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
