@props(['img','id','profilo','descrizione'])


    <div class="card rounded-0 shadow-gray">
        
        <div>
            <img src="{{Storage::url($img)}}" class="img-fluid card-img-top"  alt="foto {{$id}}">
           
       
         <div class="card-body">
          <h3 class="card-title"><a href="{{route('cornici')}}/#{{$profilo}}">{{$profilo}}</a></h3>
          @if(strlen($descrizione) > 40) 
         <p> {!!substr($descrizione,0,37) . "... "!!} </p>
        
         @else
             {!!$descrizione!!}
         @endif
        </div>     
      
        </div>
      </div>


   