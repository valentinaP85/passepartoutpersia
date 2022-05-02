@extends('layouts.app')

@section('content')
<div class="conteiner-fluid container-max p-0 mx-auto">
    <div class="row justify-content-center px-0 pt-5 m-0">
        <div class="col-12 text-center">
            <h1>Cornici</h1>
        </div>
    </div>
    <a href="{{ route('preventivo-acquisto')}}" class="btn btn-danger text-uppercase text-end"> richiedi il tuo preventivo</a>  
</div>
  
{{-- vecchia pagina --}}
<div class="conteiner-fluid container-max p-3 mx-auto" >
    <div class="row justify-content-center px-0 pt-2 m-0 border border-3 border-danger shadow-gray">
        <div class="col-12 p-3">
            <h2>News</h2>
            <p>
                Sconti per passepartout acid free, bianchi, avorio o neri con stessa misura esterna <strong>24x30</strong> e misura interna. Con l'acquisto dei passepartout sconto anche sui fondi. 
                Il prezzo indicato si riferisce ad un singolo pezzo.  
            </p>
        </div>
        <div class="col-12">
            <table class="table text-center">
                <thead>
                    <tr>
                        <td scope="col"> Q.tà</td>
                        <td scope="col"> <div class="div-rett m-auto"><div class="border border-2 border-dark p-3 rounded-0 m-1"></div></div></td>
                        <td scope="col"> <div class="div-rett m-auto"><div class="border border-2 border-dark p-3 rounded-circle m-1"></div></div> </td>
                        <td scope="col"> fondi</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row"> 30 pezzi</td>
                        <td> € 1,80</td>
                        <td> € 2,00</td>
                        <td> € 0,90</td>
                    </tr>
                    <tr>
                        <td scope="row">100 pezzi</td>
                        <td> € 1,60</td>
                        <td> € 1,80</td>
                        <td> € 0,70</td>
                    </tr>
                    
                </tbody>
            </table>
            
        </div>
    </div>
</div>  
<div class="conteiner-fluid container-max p-0 mx-auto">
    <div class="row justify-content-center px-0 pt-5 m-0">
        <div class="col-12 text-center">
            <h2>I PROFILI</h2>
            <p>
                Questi sono alcuni dei nostri profili, usati per realizzare cornici in vari colori, 
                oltre ai classici bianco nero e grigio.
                A richiesta, su disegno dell’Artista, forniamo cornici in profili diversi ed essenze pregiate.
                Il Montaggio delle opere, può essere con passepartout a contatto o con distanziatore.
            </p>
        </div>
     </div>
    <div class="row justify-content-center px-0 pt-5 m-0">       
        @foreach ($frames as $frame) 
        @if($frame->status == '1')
        <div class="col-12 col-md-6 col-ipad-pro col-lg-3 px-3 pb-5 pt-2 mx-0 mx-md-auto">          
            <x-schedaCornice
            id="{{$frame['id']}}"
            profilo="{{$frame['profilo']}}"
            essenze="{{$frame['essenze']}}"
            misuraFronte="{{$frame['misuraFronte']}}"
            imgProfilo="{{$frame['imgProfilo']}}"
            profondita="{{$frame['profondita']}}"
            descrizione="{{$frame['descrizione']}}"
            />
        </div> 
        @endif 
        @endforeach
    </div>
</div>
<div class="conteiner-fluid container-max p-0 mx-auto">
    <div class="row justify-content-center px-0 pt-5 m-0">
        <x-distanziatori />  
    </div>
</div>   
@endsection


