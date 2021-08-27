@extends('layouts.app')

@section('content')
<div class="conteiner-fluid container-max p-0 mx-auto">
    <div class="row justify-content-center px-0 pt-5 m-0">
        <div class="col-12 text-center">
            <h1>Galleria fotografica</h1>
        </div>
    </div>

    <div class="row justify-content-center px-0 pt-5 m-0">
        <div class="col-12 py-2 text-center">
            <h2>Le nostre cornici in mostra</h2>
        </div>
    </div>

    <x-carousel />

<div class="row justify-content-center px-0 pt-5 m-0">
        <div class="col-12  pt-5 text-center">
            <h2 class=" mt-2 mt-md-4">I nostri profili</h2>
        </div>
    </div>
    <div class="row justify-content-center px-0 pt-5 m-0">          
          
        
        @foreach ($photos as $photo) 
        
         <div class="col-12 col-md-6 col-ipad-pro col-lg-3 px-3 pb-5 pt-2 mx-0 mx-md-auto">          
        
            <x-photoProfilo
            profilo="{{$photo->frame['profilo']}}"
            descrizione="{!!$photo->frame['descrizione']!!}"
            img="{{$photo['img']}}"
           id="{{$photo['id']}}"
         
            />
        </div> 

        @endforeach
        
    </div>
</div>
@endsection


