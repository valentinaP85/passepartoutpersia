@props(['profilo','misuraFronte','descrizione','profondita','essenze', 'imgProfilo', 'id'])


<div class="card rounded-0 h-100 pb-3" id="{{$profilo}}">
    @if ($imgProfilo==null)
    <div>
        <img src="{{Storage::url('public/default/default.png')}}" class="img-fluid card-img-top " alt="Logo Passepartout Persia">
    </div>
    @else
    <div>
        <img src="{{Storage::url($imgProfilo)}}" class="img-fluid card-img-top " alt="foto-{{$profilo}}">
    </div>     
    @endif   
    <div class="card-body px-4">
        <h3 class="card-title txt-accent">
            {{$profilo}}       
            @auth
            @if(Auth::user()->is_revisor)
            <a id="modifica{{$id}}" href="{{route ('frames.edit', ['frame'=>$id])}}" class="btn btn-small shadow-gray shadow-h-none rounded-0 pe-1 ps-2  mb-2"><i class="fas fa-edit text-gray"></i></a>
            @endif  
            @endauth
        </h3>
        <p class="card-text">MISURE PROFILO<br>{!!$misuraFronte!!}cm x {!!$profondita!!}cm</p>
        <p class="card-text">ESSENZE DISPONIBILI <br>{!!$essenze!!}</p>

        <p class="card-text" id="desk">DESCRIZIONE<br>
            @if(strlen($descrizione) > 130) 
            {!!substr($descrizione,0,123) . "... "!!}
            <!-- Button trigger modal -->
            <button type="button" class="btn m-0 p-0" data-bs-toggle="modal" data-bs-target="#descrizione{{$id}}">
                <em class="small m-0 p-0 txt-accent">Leggi tutto</em>
            </button>
            
            <!-- Modal -->
            <div class="modal fade" id="descrizione{{$id}}" tabindex="-1" aria-labelledby="{{$id}}Label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header pb-1 pt-2">
                            <h3 class="modal-title txt-accent" id="{{$id}}Label">{{$profilo}}</h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            {!!$descrizione!!}
                        </div>
                        
                    </div>
                </div>
            </div>
            @else
            {!!$descrizione!!}
            @endif
            
        </p>
        
        <p class="card-text" id="mob">DESCRIZIONE<br>
            {!!$descrizione!!}
        </p>

        
    </div>
</div>


