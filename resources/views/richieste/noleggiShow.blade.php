@extends('layouts.app')

@section('content')
<div class="conteiner-fluid container-max p-1 mx-auto">
  <div class="row justify-content-center px-0 pt-5 m-0">
    <div class="col-12 text-center">
      <h1>COD. 
        {{$bookingRental->formatRentalCode()}}
      </h1>
    </div>
  </div>
  <div class="row px-0 pt-4 m-0">
    <div class="col-12 col-md-5 p-2 p-md-4 m-2">
      <div>
        <h5><strong>dal</strong>: {{ $bookingRental->dal}} <strong>al</strong>: {{$bookingRental->al}}</h5>
      </div>
      <p ><strong>COD.</strong> 
        <span id='Cod. 
        {{$bookingRental->formatRentalCode()}} '> 
        {{$bookingRental->formatRentalCode()}}</span>   
      </p>
      <p>Richiesta del {{ $bookingRental->created_at}} </p>
      @if( $bookingRental->message !=null)
      <p><strong>Messaggio</strong>: {{ $bookingRental->message}}</p>
      @endif
    </div>  
    <div class="col-12 col-md-5 p-2 p-md-4 m-2">
      <div class="card shadow-gray mb-2 mb-md-4">
        <div class="card-body px-2 px-md-4">
          <h2><strong>{{ $bookingRental->name}} {{ $bookingRental->surname}}</strong></h2>
          @if( $bookingRental->telefono !=null)
          <p><strong>Telefono</strong>: {{ $bookingRental->telefono}}</p>
          @endif
          <p><strong>Mail</strong>: {{ $bookingRental->email}}</p>
          <p><strong>trasporto</strong>: {{$bookingRental->trasporto}}</p>
          <p><strong>Località</strong>:  {{$bookingRental->provincia}}, {{$bookingRental->cap}}  </p>
        </div>
      </div>
    </div>
  </div>
  <div class="row px-0 pt-4 m-0">
    @foreach ($booking_rental_details as $bookingRentalDetails)
    @if ($bookingRentalDetails->bookingRental_id== $bookingRental->id)
    <div class="col-12 col-md-5 shadow-gray p-2 p-md-4 m-2">
      <strong>Modello</strong>:
      {{$bookingRentalDetails->rental->rentalModel->name}}  {{$bookingRentalDetails->rental->rentalModel->surname}}
      - <strong>Misura</strong>: {{$bookingRentalDetails->rental->size->name}}. 
      <p>
        <strong>quantità</strong>: {{$bookingRentalDetails->qta}} di cui verticali " {{$bookingRentalDetails->vert}}" e orizzontali " {{$bookingRentalDetails->orizz}}"
      </p>
      @if( $bookingRentalDetails->montaggio==null && $bookingRentalDetails->smontaggio==null && $bookingRentalDetails->passepartout==null && $bookingRentalDetails->fondo==null )
      @else
      <p class="text-uppercase"> <strong>servizi aggiuntivi richiesti</strong> : </p>
      <p>
        @if( $bookingRentalDetails->montaggio !=null)
        - montaggio
        @endif
        @if( $bookingRentalDetails->smontaggio !=null)
        - smontaggio
        @endif
        @if( $bookingRentalDetails->passepartout !=null || $bookingRentalDetails->colorPass !=null)
        - passepartout
        @if( $bookingRentalDetails->colorPass !=null)
        {{$bookingRentalDetails->colorPass}}
        @endif
        @endif
        @if( $bookingRentalDetails->fondo !=null)
        - fondo
        @endif
      </p>
      @endif
    </div>
    @endif
    @endforeach
    <div class="col-12 text-end">
      <a href="javascript:history.go(-1)" 
      onMouseOver="self.status=document.referrer;return true">
      <i class="far fa-arrow-alt-circle-left fa-4x txt-accent"></i></a>
    </div>
  </div>
</div>
@endsection
