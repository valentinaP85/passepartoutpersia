@props(['profilo','glassName', 'colorName', 'name','id','descrizione','imgProfilo', 'img' ])
<div class="card rounded-0 h-100">
  @if ($imgProfilo==null)
  <div>
    <img src="{{Storage::url('public/default/default.png')}}" class="img-fluid card-img-top " alt="Logo Passepartout Persia">
  </div>
  @else
  <img src="{{Storage::url($imgProfilo)}}" class="img-fluid card-img-top " alt="foto-{{$imgProfilo}}"> 
  @endif
  <div class="card-body p-2 p-md-4">
    <h3 class="card-title txt-accent">{{$name}}</h3>
    <table class="table text-center">
      <thead>
        <tr>
          <th scope="col">Misura</th>
          <th scope="col">prezzo al mese</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($rentals as $rental)
        @if ($rental->rentalModel_id == $id)
        <tr>
          <td scope="row">{{$rental->size->name}}</td>
          <td>{{$rental->rentalPrice}} €</td>
        </tr>  
        @endif   
        @endforeach   
      </tbody>
    </table>
    <div class="text-end p-2">
      <a class="text-decoration-none txt-accent" data-bs-toggle="modal" data-bs-target="#Modal{{$id}}" href="#Modal{{$id}}">
        <em>Leggi di più ></em>
      </a>
    </div>     
    <div class="modal fade m-0 p-0" id="Modal{{$id}}" tabindex="-1" aria-labelledby="ModalLabel{{$id}}" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content rounded-0">
          <div class="modal-header modal-hr">
            <h2 class="modal-title txt-accent" id="ModalLabel{{$id}}"> {{$name}} </h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-center">
            <div class="row m-0 justify-content-center align-items-center h-100">
              @if($imgProfilo ==null && $img ==null)
              <h2 class="txt_accent"> PassePartoutPersia e C</h2>
              @else
              @if ($imgProfilo !=null)
              <div class="col-12 col-md-6">
                <img src="{{Storage::url($imgProfilo)}}" class="img-fluid card-img-top " alt="disegno-{{$imgProfilo}}"> 
              </div>  
              @endif
              @if($img !=null)
              <div class="col-12 col-md-6">
                <img src="{{Storage::url($img)}}" class="img-fluid" alt="foto profilo">
              </div>
              @endif   
              @endif
            </div>
            <div class="p-2 p-md-3">
              <div class="my-3">
                <p class="text-start">Profilo: {!!$profilo!!}, Colore: {!!$colorName!!}, Copertura: {!!$glassName!!}. </p>  
              </div>
              <div class="my-3">
                <p class="text-start">DESCRIZIONE<br> {!!$descrizione!!}</p>  
              </div>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Misura</th>
                    <th scope="col">prezzo al mese</th>
                    <th scope="col">Valore</th>
                    <th scope="col">Q.tà max*</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($rentals as $rental)
                  @if ($rental->rentalModel_id == $id)
                  <tr>
                    <th scope="row">
                      @auth
                      @if(Auth::user()->is_revisor)
                      <a id="modifica{{$id}}" href="{{route ('rentals.edit', ['rental'=>$id])}}" class="btn btn-small rounded-0 px-1 py-0"><i class="fas fa-edit text-gray"></i></a>
                      @endif  
                      @endauth
                      {{$rental->size->name}}</th>
                    <td>{{$rental->rentalPrice}}</td>
                    <td>{{$rental->valueFrame}}</td>
                    <td>{{$rental->qta}} pz</td>
                  </tr>  
                  @endif
                  @endforeach 
                </tbody>
              </table>
              <p>*la disponibilità effettiva varia in base alle altre prenotazioni.</p>
            </div>
            <div class="text-center">
              <a href="{{ route('prenotazione-noleggio')}}" class="btn btn-danger text-uppercase "> prenota subito</a>
          </div>
        </div>
        </div>
      </div>
    </div>  
  </div>
</div>

