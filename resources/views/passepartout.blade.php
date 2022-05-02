@extends('layouts.app')

@section('content')
<div class="conteiner-fluid container-max p-0 mx-auto">
    <div class="row justify-content-center px-0 pt-5 m-0">
        <div class="col-12 text-center">
            <h1>Passepartout</h1>
        </div> 
    </div>
    <a href="{{ route('preventivo-acquisto')}}" class="btn btn-danger text-uppercase text-end"> richiedi il tuo preventivo</a>
    <div class="row justify-content-center px-0 pt-5 m-0">
        @foreach ($cardboards as $cardboard) 
        @if($cardboard->status == '1')
        <div class="col-12 col-md-6 col-ipad-pro col-lg-3 px-0 pb-5 pt-2 mx-0 mx-md-auto">          
            <x-schedaPassepartout  
            id="{{$cardboard['id']}}"
            nome="{{$cardboard['nome']}}"
            misuraFoglio="{{$cardboard['misuraFoglio']}}"
            superficie="{{$cardboard['superficie']}}"
            img="{{$cardboard['img']}}"
            spessore="{{$cardboard['spessore']}}"
            colori="{{$cardboard['colori']}}"
            caratteristiche="{{$cardboard['caratteristiche']}}"
            />
        </div> 
        @endif 
        @endforeach
        
    </div>
    
</div>
<div class="conteiner-fluid container-max p-0 mx-auto">
    <div class="row justify-content-center px-0 pt-5 m-0">
        <x-passVassoio />  
    </div>
</div> 
@endsection