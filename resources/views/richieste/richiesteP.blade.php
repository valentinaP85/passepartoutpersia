@extends('layouts.app')

@section('content')
<div class="conteiner-fluid container-max p-0 mx-auto">
  <div class="row justify-content-around px-0 pt-5 m-0">
    <h1 class="text-center">Richieste di preventivo</h1>
    <div class="col-12 col-md-6 px-3">
      <h2>Noleggio</h2>
      <table class="table text-center">
        <thead>
          <tr>
            <th scope="col">Utente</th>
            <th scope="col">dal</th>
            <th scope="col">al</th>
            <th scope="col">azioni</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($booking_rentals as $bookingRental)
          <tr>
            <th scope="row">{{$bookingRental->name}} {{$bookingRental->surname}}</th>
            <td>{{$bookingRental->dal}}</td>
            <td>{{$bookingRental->al}}</td>
            <td>
              <div class="row m-0">
                <div class="col-6 col-md-3 m-0 px-1">
                  <a href="{{route('richieste.noleggiShow', $bookingRental)}}" class="btn btn-q shadow-h-none"><i class="fas fa-eye"></i></a>
                </div> 
                <div class="col-6 col-md-3 m-0 px-1">
                  <a href="{{route('bookingRentals.edit', $bookingRental)}}" class="btn btn-q shadow-h-none"><i class="fas fa-edit"></i></a>
                </div>
                <div class="col-6 col-md-3 m-0 px-1">
                  <a href="
                  {{-- {{route('bookingRentals.edit', $bookingRental)}} --}}
                  " class="btn btn-q shadow-h-none lavorazione"><strong>x</strong></a>
                </div>
                <div class="col-6 col-md-3 m-0 px-1">
                  <a href="" class="btn btn-r shadow-h-none lavorazione">crea fatt.</a>
                </div>
                
              </div>  
            </td>
          </tr>  
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="col-12 col-md-6 px-3">
      <h2>Acquisto</h2>
      <table class="table text-center">
        <thead>
          <tr>
            <th scope="col">Utente</th>
            <th scope="col">data richiesta</th>
            <th scope="col">azioni</th>
            
          </tr>
        </thead>
        <tbody>
          @foreach ($quotes as $quote)
          <tr>
            <th scope="row">{{$quote->name}} {{$quote->surname}}</th>
            <td>{{$quote->created_at}}</td>
            <td>
              <div class="row m-0">
                <div class="col-6 m-0 px-1">
                  <a href="{{route('richieste.acquistoShow', $quote)}}" class="btn btn-q shadow-h-none"><i class="fas fa-eye"></i></a>
                </div> 
                <div class="col-6 m-0 px-1">
                  <a href="" class="btn btn-q shadow-h-none"><i class="fas fa-edit"></i></a>
                </div>
                {{-- <div class="col-6 col-md-3 m-0 px-1">
                  <a href="
                  
                  " class="btn btn-q shadow-h-none lavorazione"><strong>x</strong></a>
                </div>
                
                <div class="col-6 col-md-3 m-0 px-1">
                  <a href="" class="btn btn-r shadow-h-none lavorazione">crea fatt.</a>
                </div> --}}
                
              </div>  
              
            </td>
          </tr>  
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

  @endsection
  