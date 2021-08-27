@props(['nome','spessore','caratteristiche','misuraFoglio','superficie','img','colori', 'id'])


    <div class="card rounded-0">
        @if ($img==null)
        <div>
            <img src="{{Storage::url('public/default/default.png')}}" class="img-fluid card-img-top " alt="Logo Passepartout Persia">
        </div>
        @else
        <div>
            <img src="{{Storage::url($img)}}" class="img-fluid card-img-top " alt="foto-{{$nome}}">
        </div>     
        @endif   
        <div class="card-body">
          <h5 class="card-title">{{$nome}}  
            @auth
            @if(Auth::user()->is_revisor)
            <a id="modifica{{$id}}" href="{{route ('cardboards.edit', ['cardboard'=>$id])}}" class="btn btn-small shadow-gray shadow-h-none rounded-0 pe-1 ps-2  mb-2"><i class="fas fa-edit text-gray"></i></a>
            @endif  
            @endauth
        </h5>
          
          <p class="card-text">{{$spessore}}mm</p> 
          <p class="card-text">{{$misuraFoglio}}cm</p>
          <p class="card-text">{{$superficie}}</p>
          <p class="card-text">{{$colori}}</p>
          <p class="card-text">{{$caratteristiche}}</p>
             
       {{-- <a href="{{route('contatti')}}" class="d-inline-block btn rounded-0"> altre informazioni</a> --}}
        </div>
      </div>
          
    