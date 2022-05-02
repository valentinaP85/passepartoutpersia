@extends('layouts.app')

@section('content')
<div class="conteiner-fluid container-max p-1 mx-auto">
    <div class="row justify-content-center px-0 pt-5 m-0">
        <div class="col-12 text-center">
            <h1> 
                {{$quote->name}} {{$quote->surname}}
            </h1>
        </div>
    </div>
    <div class="row px-0 pt-4 m-0">
        <div class="col-12 col-md-6 p-2 p-md-4">
            <p>Richiesta preventivo d'acquisto del: {{ $quote->created_at}} </p>
            @if( $quote->message !=null)
            <p><strong>Messaggio</strong>: {{ $quote->message}}</p>
            @endif
        </div>  
        <div class="col-12 col-md-6 p-2 p-md-4">
            {{-- <div class="card shadow-gray mb-2 mb-md-4">
                <div class="card-body px-2 px-md-4"> --}}
                    <h2><strong>{{ $quote->name}} {{ $quote->surname}}</strong></h2>
                    @if( $quote->telefono !=null)
                    <p><strong>Telefono</strong>: {{ $quote->telefono}}</p>
                    @endif
                    <p><strong>Mail</strong>: {{ $quote->email}}</p>
                    <p><strong>Provincia</strong>:  {{$quote->provincia}}</p>
                    <p> <strong>Cap</strong>:  {{$quote->cap}}</p>
                {{-- </div>
            </div> --}}
        </div>
    </div>
    <div class="row px-0 pt-4 m-0">
        <div class="col-12 col-md-6">
            <div class="col-12 shadow-gray p-2 p-md-4 m-2">
                @foreach ($frameDetails->sortBy('frameSize') as $fDetails)
                @if ($fDetails->quote_id== $quote->id)
                <p>
                    <strong>Cornice</strong>:
                    {{$fDetails->frame->profilo}},  {{$fDetails->color->name}}, {{$fDetails->glass->name}}
                    - <strong>Misura</strong>: {{$fDetails->frameSize}}. 
                    <strong>quantità</strong>: {{$fDetails->nFrame}} di cui verticali " {{$fDetails->vertF}}" e orizzontali " {{$fDetails->orizzF}}"
                </p>
                <br>
                @endif
                @endforeach
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="col-12 shadow-gray p-2 p-md-4 m-2">
                @foreach($cardboardDetails->sortBy('misuraE') as $cDetails)
                @if ($cDetails->quote_id== $quote->id)
                <p>
                    <strong>passepartout</strong> {{$cDetails->cardboard->nome}},  {{$cDetails->cardboardColor}},  {{$cDetails->nCardboard}} pezzi:<br>
                    misura esterna:{{$cDetails->misuraE}}; Misura esterna:{{$cDetails->misuraI}}<br>
                    fondo: {{$cDetails->fondo}}
                </p> 
                <br>
                @endif
                @endforeach 
            </div>
        </div>
    </div>    
    <div class="col-12 text-end">
        <a href="javascript:history.go(-1)" onMouseOver="self.status=document.referrer;return true">
            <i class="far fa-arrow-alt-circle-left fa-4x txt-accent"></i>
        </a>
    </div>
    
</div>
@endsection
