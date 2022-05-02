@extends('layouts.app')

@section('content')
<div class="conteiner-fluid container-max p-0 mx-auto">
  <div class="row justify-content-center px-0 pt-5 m-0">
    <div class="col-12 text-center">
      <h1>Revisor</h1>
      @if (session('message'))
      <div class="alert text-center mt-2 bg-info" role="alert">
        {{ session('message') }}
      </div>
      @endif 
    </div>
  </div>
  <a href="javascript:history.go(-1)" 
  onMouseOver="self.status=document.referrer;return true">
  Torna indietro</a>
  <div>
    
    
    <div class="row justify-content-around px-0 pt-5 m-0">
      <div class="list-group list-group-horizontal px-2" id="list-tab" role="tablist">
        <a class="" href="{{ route('frames.create') }}"><i class="fas fa-plus-circle fa-2x txt-accent"></i></a><a class="list-group-item list-group-item-action rounded-0  active dt p-1 me-1 me-md-5 border-0 w-25" id="list-frame-list" data-bs-toggle="list" href="#list-frame" role="tab" aria-controls="list-frame">cornici</a> 
        
        <a class="" href="{{ route('cardboards.create') }}"><i class="fas fa-plus-circle fa-2x txt-accent"></i></a><a class="list-group-item list-group-item-action rounded-0 dt p-1 me-1 me-md-5 border-0 w-25" id="list-passepartout-list" data-bs-toggle="list" href="#list-passepartout" role="tab" aria-controls="list-passepartout">passepartout</a>
        
        <a class="" href="{{ route('photos.create') }}"><i class="fas fa-plus-circle fa-2x txt-accent"></i></a><a class="list-group-item list-group-item-action rounded-0 dt p-1 me-1 me-md-5 border-0 w-25"  id="list-foto-list" data-bs-toggle="list" href="#list-foto" role="tab" aria-controls="list-foto">Foto</a>
        
        <a class="" href="{{ route('rentalModels.create') }}"><i class="fas fa-plus-circle fa-2x txt-accent"></i></a><a class="list-group-item list-group-item-action rounded-0 dt p-1 me-1 me-md-5 border-0 w-25" id="list-modello-list" data-bs-toggle="list" href="#list-modello" role="tab" aria-controls="list-modello">Modelli</a>
        
        <a class="" href="{{ route('rentals.create') }}"><i class="fas fa-plus-circle fa-2x txt-accent"></i></a><a class="list-group-item list-group-item-action rounded-0 dt p-1 me-1 me-md-5 border-0 w-25" id="list-noleggio-list" data-bs-toggle="list" href="#list-noleggio" role="tab" aria-controls="list-noleggio">cornici a noleggio</a>
        
      </div>
      
    </div>
    
    <div class="row  m-0 p-0 m-0 justify-content-center ">
      <div class="col-12  col-md-11 m-0 p-0 ">
        <div class="tab-content m-0" id="nav-tabContent">
          <div class="tab-pane fade text-text show active form-for-insertion bg-main p-1 p-md-2 pb-3 border-top-accent" id="list-frame" role="tabpanel" aria-labelledby="list-frame-list">
            {{-- cornici tab --}}
            <div class="row justify-content-center px-0 pt-5 m-0">
              <div class="col-12 text-center">
                <h3>cornici</h3>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">profilo</th>
                      <th scope="col">essenze</th>
                      <th scope="col">azioni</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($frames as $frame)
                    <tr>
                      <th scope="row">{{$frame->profilo}}</th>
                      <td>{{$frame->essenze}}</td>
                      <td>
                        <div class="row m-0">
                          <div class="col-3 m-0 px-1">
                            <a href="{{route ('frames.edit',compact('frame'))}}" class="btn btn-q shadow-h-none"><i class="fas fa-edit text-gray"></i></a>
                          </div>
                          <div class="col-3 m-0 px-1">
                            @if($frame->status =='0')
                            <a href="{{route ('frames.status', $frame)}}" class="btn btn-q shadow-h-none" id="statusX "><i class="fas fa-eye-slash text-dark"></i></a>
                            @else
                            <a href="{{route ('frames.status', $frame)}}" class="btn btn-q shadow-h-none" id="statusX "><i class="fas fa-eye text-success"></i></a>
                            @endif
                          </div>
                          <div class="col-3 m-0 px-1">
                            <div class="d-inline">
                              
                              {{-- inizio form delete --}}
                              <!-- Button trigger modal -->
                              
                              <button type="button" class="btn btn-q shadow-h-none" data-bs-toggle="modal" data-bs-target="#cornice{{$frame->id}}">
                                <strong> X</strong>
                              </button>
                              
                              <!-- Modal -->
                              
                              <div class="modal fade" id="cornice{{$frame->id}}" tabindex="-1" aria-labelledby="{{$frame->id}}Label" aria-hidden="true">
                                <div class="modal-dialog">
                                  
                                  <div class="modal-content">
                                    <div class="modal-header ">
                                      <h3 class="text-center w-100" id="{{$frame->id}}Label"><strong>{{$frame->profilo}}</strong></h3>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <p>vuoi eliminare questa cornice?</p>
                                      <button type="button" class="btn btn-success btn-small shadow-gray shadow-h-none rounded-0 mx-3 " data-bs-dismiss="modal">no</button>
                                      <form action="{{ route('frames.destroy', $frame) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        
                                        
                                        <button   class="btn  btn-danger btn-small shadow-gray shadow-h-none rounded-0 mx-3"  > <strong> si</strong></button>
                                        
                                      </form> 
                                    </div>
                                    
                                  </div>
                                </div>
                              </div>
                              
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
          </div>
          
          <div class="tab-pane fade text-text show form-for-insertion bg-main p-1 p-md-2 pb-3 border-top-accent" id="list-passepartout" role="tabpanel" aria-labelledby="list-passepartout-list">
            {{-- passepartout tab --}}
            <div class="row justify-content-center px-0 pt-5 m-0">
              <div class="col-12 text-center">
                <h3>passepartout</h3>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">nome</th>
                      <th scope="col">spessore</th>
                      <th scope="col">azioni</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($cardboards as $cardboard)
                    <tr>
                      <th scope="row">{{$cardboard->nome}}</th>
                      <td>{{$cardboard->spessore}}</td>
                      <td>
                        <div class="row m-0">
                          <div class="col-3 m-0 px-1">
                            <a href="{{route ('cardboards.edit',compact('cardboard'))}}" class="btn btn-q shadow-h-none"><i class="fas fa-edit text-gray"></i></a>
                          </div>
                          <div class="col-3 m-0 px-1">
                            @if($cardboard->status =='0')
                            <a href="{{route ('cardboards.status', $cardboard)}}" class="btn btn-q shadow-h-none" id="statusX "><i class="fas fa-eye-slash text-dark"></i></a>
                            @else
                            <a href="{{route ('cardboards.status', $cardboard)}}" class="btn btn-q shadow-h-none" id="statusX "><i class="fas fa-eye text-success"></i></a>
                            @endif
                          </div>
                          <div class="col-3 m-0 px-1">
                            <div class="d-inline">
                              {{-- inizio form delete --}}
                              <!-- Button trigger modal -->
                              
                              <button type="button" class="btn btn-q shadow-h-none" data-bs-toggle="modal" data-bs-target="#passepartout{{$cardboard->id}}">
                                <strong> X</strong>
                              </button>
                              
                              <!-- Modal -->
                              
                              <div class="modal fade" id="passepartout{{$cardboard->id}}" tabindex="-1" aria-labelledby="{{$cardboard->id}}Label" aria-hidden="true">
                                <div class="modal-dialog">
                                  
                                  <div class="modal-content">
                                    <div class="modal-header ">
                                      <h3 class="text-center w-100" id="{{$cardboard->id}}Label"><strong>{{$cardboard->nome}}</strong></h3>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <p>vuoi eliminare questo passepartout?</p>
                                      <button type="button" class="btn btn-success btn-small shadow-gray shadow-h-none rounded-0 mx-3 " data-bs-dismiss="modal">no</button>
                                      <form action="{{ route('cardboards.destroy', $cardboard) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        
                                        
                                        <button   class="btn  btn-danger btn-small shadow-gray shadow-h-none rounded-0 mx-3"  > <strong> si</strong></button>
                                        
                                      </form> 
                                    </div>
                                    
                                  </div>
                                </div>
                              </div>
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
              <div class="col-12 text-center pt-5">
                <h3> prezzi passepartout e fondi per il noleggio</h3>
                <a class="" href="{{ route('cardboardForRentals.create') }}"><i class="fas fa-plus-circle fa-2x txt-accent"></i></a> 
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">misura</th>
                      <th scope="col">prezzo pass</th>
                      <th scope="col">prezzo fondo</th>
                      <th scope="col">azioni</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($cardboard_for_rentals as $cardboardForRental)
                    <tr>
                      <th scope="row">{{$cardboardForRental->size->name}}</th>
                      <td>{{$cardboardForRental->pricePass}}</td>
                      <td>{{$cardboardForRental->priceFondo}}</td>
                      <td>
                        <div class="row m-0">
                          <div class="col-3 m-0 px-1">
                            <a href="{{route ('cardboardForRentals.edit',compact('cardboardForRental'))}}" class="btn btn-q shadow-h-none"><i class="fas fa-edit text-gray"></i></a>
                          </div>
                          {{-- <div class="col-3 m-0 px-1">
                            @if($cardboardForRental->status =='0')
                            <a href="{{route ('cardboardForRentals.status', $cardboardForRental)}}" class="btn btn-q shadow-h-none" id="statusX "><i class="fas fa-eye-slash text-dark"></i></a>
                            @else
                            <a href="{{route ('cardboardForRentals.status', $cardboardForRental)}}" class="btn btn-q shadow-h-none" id="statusX "><i class="fas fa-eye text-success"></i></a>
                            @endif
                          </div> --}}
                          <div class="col-3 m-0 px-1">
                            <div class="d-inline">
                              {{-- inizio form delete --}}
                              <!-- Button trigger modal -->
                              
                              {{-- <button type="button" class="btn btn-q shadow-h-none" data-bs-toggle="modal" data-bs-target="#passepartout{{$cardboardForRental->id}}">
                                <strong> X</strong>
                              </button> --}}
                              
                              <!-- Modal -->
                              
                              <div class="modal fade" id="passepartout{{$cardboardForRental->id}}" tabindex="-1" aria-labelledby="{{$cardboardForRental->id}}Label" aria-hidden="true">
                                <div class="modal-dialog">
                                  
                                  <div class="modal-content">
                                    <div class="modal-header ">
                                      <h3 class="text-center w-100" id="{{$cardboardForRental->id}}Label"><strong>{{$cardboardForRental->nome}}</strong></h3>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <p>vuoi eliminare questo passepartout?</p>
                                      <button type="button" class="btn btn-success btn-small shadow-gray shadow-h-none rounded-0 mx-3 " data-bs-dismiss="modal">no</button>
                                      <form action="{{ route('cardboardForRentals.destroy', $cardboardForRental) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        
                                        
                                        <button   class="btn  btn-danger btn-small shadow-gray shadow-h-none rounded-0 mx-3"  > <strong> si</strong></button>
                                        
                                      </form> 
                                    </div>
                                    
                                  </div>
                                </div>
                              </div>
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
          </div>
          
          <div class="tab-pane fade text-text show form-for-insertion bg-main p-1 p-md-2 pb-3 border-top-accent" id="list-foto" role="tabpanel" aria-labelledby="list-foto-list">
            {{-- foto tab --}}
            <div class="row justify-content-center px-0 pt-5 m-0">
              <div class="col-12 text-center">
                <h3>Gallery</h3>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">profilo</th>
                      <th scope="col">colori</th>
                      <th scope="col">azioni</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($photos as $photo)
                    <tr>
                      <th scope="row">{{$photo->frame->profilo}}</th>
                      <td>{{$photo->color->name}}</td>
                      <td>
                        <div class="row m-0">
                          <div class="col-3 m-0 px-1">
                            <a href="{{route ('photos.edit',compact('photo'))}}" class="btn btn-q shadow-h-none"><i class="fas fa-edit text-gray"></i></a>
                          </div>
                          {{-- <div class="col-3 m-0 px-1">
                            @if($photo->status =='0')
                            <a href="{{route ('photos.status', $photo)}}" class="btn btn-q shadow-h-none" id="statusX "><i class="fas fa-eye-slash text-dark"></i></a>
                            @else
                            <a href="{{route ('photos.status', $photo)}}" class="btn btn-q shadow-h-none" id="statusX "><i class="fas fa-eye text-success"></i></a>
                            @endif
                          </div>
                          <div class="col-3 m-0 px-1">
                            <div class="d-inline">
                              
                              <form action="{{ route('photos.destroy', $photo) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                
                                
                                <button   class="btn btn-q shadow-h-none"  > <strong> X</strong></button>
                                
                              </form> 
                              
                            </div>
                          </div>   --}}
                        </div>
                      </td>
                    </tr>  
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>  
          </div>
          <div class="tab-pane fade text-text show form-for-insertion bg-main p-1 p-md-2 pb-3 border-top-accent" id="list-modello" role="tabpanel" aria-labelledby="list-modello-list">
            
            {{-- Modelli a noleggio tab --}}
            <div class="row justify-content-center px-0 pt-5 m-0">
              <div class="col-12 text-center p-0">
                <h3>Modelli a noleggio</h3>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Modello</th>
                      <th scope="col">profilo</th>
                      <th scope="col">colore</th>
                      <th scope="col">azioni</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($rental_models as $rentalModel)
                    <tr>
                      <th scope="row">{{$rentalModel->name}}</th>
                      <td>  {{$rentalModel->frame->profilo}}</td>
                      <td>{{$rentalModel->color->name}}</td>
                      
                      
                      <td>
                        <div class="row m-0">
                          <div class="col-3 m-0 px-1">
                            <a href="{{route ('rentalModels.edit',compact('rentalModel'))}}" class="btn btn-q shadow-h-none"><i class="fas fa-edit text-gray"></i></a>
                          </div>
                          <div class="col-3 m-0 px-1">
                            @if($rentalModel->status =='0')
                            <a href="{{route ('rentals.status', $rentalModel)}}" class="btn btn-q shadow-h-none" id="statusX "><i class="fas fa-eye-slash text-dark"></i></a>
                            @else
                            <a href="{{route ('rentalModels.status', $rentalModel)}}" class="btn btn-q shadow-h-none" id="statusX "><i class="fas fa-eye text-success"></i></a>
                            @endif
                          </div>
                          <div class="col-3 m-0 px-1">
                            <div class="d-inline">
                              {{-- inizio form delete --}}
                              <!-- Button trigger modal -->
                              
                              <button type="button" class="btn btn-q shadow-h-none" data-bs-toggle="modal" data-bs-target="#modello-{{$rentalModel->id}}">
                                <strong> X</strong>
                              </button>
                              
                              <!-- Modal -->
                              
                              <div class="modal fade" id="modello-{{$rentalModel->id}}" tabindex="-1" aria-labelledby="{{$rentalModel->id}}Label" aria-hidden="true">
                                <div class="modal-dialog">
                                  
                                  <div class="modal-content">
                                    <div class="modal-header ">
                                      <h3 class="text-center w-100" id="{{$rentalModel->id}}Label"><strong>{{$rentalModel->name}}</strong></h3>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <p>vuoi eliminare questo passepartout?</p>
                                      <button type="button" class="btn btn-success btn-small shadow-gray shadow-h-none rounded-0 mx-3 " data-bs-dismiss="modal">no</button>
                                      <form action="{{ route('rentalModels.destroy', $rentalModel) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        
                                        
                                        <button   class="btn  btn-danger btn-small shadow-gray shadow-h-none rounded-0 mx-3"  > <strong> si</strong></button>
                                        
                                      </form> 
                                    </div>
                                    
                                  </div>
                                </div>
                              </div>
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
          </div>
          <div class="tab-pane fade text-text show form-for-insertion bg-main p-1 p-md-2 pb-3 border-top-accent" id="list-noleggio" role="tabpanel" aria-labelledby="list-noleggio-list">
            
            {{-- cornici a noleggio tab --}}
            <div class="row justify-content-center px-0 pt-5 m-0">
              <div class="col-12 text-center p-0">
                <h3>cornici a noleggio</h3>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Modello</th>
                      <th scope="col">misura</th>
                      <th scope="col">p. noleggio</th>
                      <th scope="col">valore</th>
                      <th scope="col">q.tà</th>
                      <th scope="col">azioni</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($rentals as $rental)
                    <tr>
                      <th scope="row"> {{$rental->rentalModel->name}}</th>
                      <td>{{$rental->size->name}}</td>
                      <td>{{$rental->rentalPrice}}</td>
                      <td>{{$rental->valueFrame}}</td>
                      <td>{{$rental->qta }}
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-q shadow-h-none" data-bs-toggle="modal" data-bs-target="#Model-{{$rental->id}}">
                          <i class="fas fa-plus"></i>
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="Model-{{$rental->id}}" tabindex="-1" aria-labelledby="{{$rental->id}}Label" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="{{$rental->id}}Label">{{$rental->rentalModel->name}}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <p>Le cornici disponibili per questo modello attualmente sono  {{$rental->qta }}.</p>
                                <p>Quante cornici vuoi aggiungere?</p>
                                <form action="{{route('rental.increment', $rental)}}" method="post" enctype="multipart/form-data">
                                  @csrf
                                 
                                  <input type="number" id="qta" name="qta">
                                  
                                  <button type="submit" class="btn shadow-h-none">aggiungi cornici</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="row m-0">
                          <div class="col-3 m-0 px-1">
                            <a href="{{route ('rentals.edit',compact('rental'))}}" class="btn btn-q shadow-h-none"><i class="fas fa-edit text-gray"></i></a>
                          </div>
                          <div class="col-3 m-0 px-1">
                            @if($rental->status =='0')
                            <a href="{{route ('rentals.status', $rental)}}" class="btn btn-q shadow-h-none" id="statusX "><i class="fas fa-eye-slash text-dark"></i></a>
                            @else
                            <a href="{{route ('rentals.status', $rental)}}" class="btn btn-q shadow-h-none" id="statusX "><i class="fas fa-eye text-success"></i></a>
                            @endif
                          </div>
                          <div class="col-3 m-0 px-1">
                            <div class="d-inline">
                              {{-- inizio form delete --}}
                              <!-- Button trigger modal -->
                              
                              <button type="button" class="btn btn-q shadow-h-none" data-bs-toggle="modal" data-bs-target="#m-{{$rental->id}}">
                                <strong> X</strong>
                              </button>
                              
                              <!-- Modal -->
                              
                              <div class="modal fade" id="m-{{$rental->id}}" tabindex="-1" aria-labelledby="{{$rental->id}}LabelM" aria-hidden="true">
                                <div class="modal-dialog">
                                  
                                  <div class="modal-content">
                                    <div class="modal-header ">
                                      <h3 class="text-center w-100" id="{{$rental->id}}LabelM"><strong>{{$rental->rentalModel_id}}</strong></h3>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <p>vuoi eliminare questo modello a noleggio?</p>
                                      <button type="button" class="btn btn-success btn-small shadow-gray shadow-h-none rounded-0 mx-3 " data-bs-dismiss="modal">no</button>
                                      <form action="{{ route('rentals.destroy', $rental) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        
                                        
                                        <button   class="btn  btn-danger btn-small shadow-gray shadow-h-none rounded-0 mx-3"  > <strong> si</strong></button>
                                        
                                      </form> 
                                    </div>
                                    
                                  </div>
                                </div>
                              </div>
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
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
  