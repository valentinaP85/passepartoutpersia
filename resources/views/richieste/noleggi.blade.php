@extends('layouts.app')

@section('content')
<div class="conteiner-fluid container-max p-0 mx-auto">
    <div class="row justify-content-center px-0 pt-5 m-0">
        <div class="col-12 text-center">
            <h1>Richieste di noleggio</h1>
        </div>
    </div>
    <div class="row justify-content-around px-0 pt-5 m-0">
        <table class="table">
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
                <th scope="row">{{$bookingRental->nameSurname}}</th>
                <td>{{$bookingRental->dal}}</td>
                <td>{{$bookingRental->al}}</td>
                <td>
                  <div class="row m-0">
                    <div class="col-3 m-0 px-1">
                      <a href="{{route('richieste.noleggiShow', $bookingRental)}}" class="btn btn-small shadow-gray shadow-h-none rounded-0 p-1 m-0">vedi richiesta</a>
                    </div> 
                    <div class="col-3 m-0 px-1">
                        <a href="{{route('bookingRentals.edit', $bookingRental)}}" class="btn btn-small shadow-gray shadow-h-none rounded-0 p-1 m-0">compila preventivo</a>
                      </div>

                    <div class="col-3 m-0 px-1">
                      {{-- @if($bookingRental->status =='0') --}}
                      <a href="#" class="btn btn-small shadow-gray shadow-h-none rounded-0 p-1 m-0 text-white" id="statusX "><i class="fas fa-eye-slash text-dark"></i></a>
                      {{-- @else --}}
                      <a href="#" class="btn btn-small shadow-gray shadow-h-none rounded-0 p-1 m-0" id="statusX "><i class="fas fa-eye text-success"></i></a>
                      {{-- @endif --}}
                    </div>
                    <div class="col-3 m-0 px-1">
                      <div class="d-inline">
                        {{-- inizio form delete --}}
                        <form action="#" method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                            
                            
                              <button   class="btn btn-small shadow-gray shadow-h-none rounded-0 p-1 m-0 text-danger"  > <strong> X</strong></button>
                          
                        </form> 
                        {{-- fine form delete --}}
                      </div>
                    </div>  
                  </div>
                </td>
              </tr>  
              @endforeach
            </tbody>
          </table>
        
    </div>
</div>
@endsection
