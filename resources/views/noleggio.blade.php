@extends('layouts.app')

@section('content')
<div class="conteiner-fluid container-max p-0 mx-auto">
    <div class="row justify-content-center px-0 pt-5 m-0">
        <div class="col-12 text-center">
            @if (session('message'))
            <div class="alert text-center mt-2 border bg-success" role="alert">
                {{ session('message') }}
            </div>
            @endif
            <h1>Il noleggio delle nostre cornici</h1>
        </div>
        <div class="col-12">
            <h2>Perché noleggiare?</h2>
            <p class="">
                Il noleggio, ha il vantaggio di offrire molte soluzioni e possibilità stilistiche per la presentazione delle vostre opere, senza dover sostenere la spesa dell'acquisto e senza avere la necessità di grandi spazi per la conservazione. <br> Le manifestazioni culturali estemporanee, mostre in musei e gallerie, saranno così arricchite da scelte appropriate ottimizzando i tempi di realizzazione.
            </p>
            <h2>Come?</h2>
            <p>Noleggiare le cornici è facilissimo, basta compilare correttamente il modulo in ogni singola parte per avere il preventivo in meno di 48 ore.<br>
            </p>
        </div>
    </div>
    <hr>
    <div class="row justify-content-center px-0 pt-2 mx-0 border border-3 border-danger shadow-gray">
        <div class="col-12">
            <h3>News</h3> 
            <p>DA OGGI SE PRENOTI CON <strong>3 MESI</strong> DI ANTICIPO HAI IL 15% DI SCONTO SUL NOLEGGIO DI QUALSIASI MODELLO E FORMATO DI CORNICE.<br> RICHIEDI SUBITO IL TUO PREVENTIVO.
            </p>
        </div>
    </div>

        <div class="row justify-content-center align-items-center px-0 py-4 m-0">
        <div class="col-12 col-md-8">
            <p>
                ESEMPI<br>Es.1:noleggio di 30 cornici P2 nere 50x60 (vetro con protezione dai raggi UV ed antiriflesso) per un mese:210,00 €<br>prezzo di vendita=  2400,00 €; cauzione= 600,00 €<hr> Es.2:noleggio di 30 cornici P2 nere 50x60 (vetro con protezione dai raggi UV ed antiriflesso) per 3 mesi: 630,00 €<br>prezzo di vendita=  2400,00 €; cauzione= 600,00 €<hr>Es.3:noleggio di 30 cornici P2 bianche 50x70 per un mese:165,00 €<br>prezzo di vendita=  1590,00 €; cauzione= 398,00 €<hr>
            </p>					
        </div>
        {{-- <iframe src="https://calendar.google.com/calendar/embed?src=bnputqcp6gk5jq30af5ccdis1o%40group.calendar.google.com&ctz=Europe%2FRome" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>  --}}
        <div class="col-12 col-md-4 h-100 text-center">
            <a href="{{ route('prenotazione-noleggio')}}" class="btn btn-danger text-uppercase "> prenota subito</a>
        </div>
        </div>
        <div class="row justify-content-center px-0 pt-5 m-0">
            @foreach ($rental_models as $rentalModel) 
            @if($rentalModel->status == '1')
            <div class="col-12 col-md-6 col-ipad-pro col-lg-3 px-3 pb-5 pt-2 mx-0 mx-md-auto">        
                <x-schedaNoleggio 
                id="{{$rentalModel['id']}}"
                name="{{$rentalModel['name']}}"
                profilo="{{$rentalModel->frame['profilo']}}"
                colorName="{{$rentalModel->color['name']}}"
                glassName="{{$rentalModel->glass['name']}}"
                descrizione="{{$rentalModel->frame['descrizione']}}"
                imgProfilo="{{$rentalModel->frame['imgProfilo']}}"
                img="{{$rentalModel->Photo['img']}}"
                />
            </div> 
            @endif
            @endforeach
        </div>
      
        <div class="row justify-content-center px-2 m-0">

            {{-- <x-quantitaCorniciNoleggio
           size= "{{$size['id']}}"
             
            /> --}}
            <x-regoleNoleggio />
        </div>
    </div>
</div>   
@endsection







