@extends('layouts.app')

@section('content')


<span class="invisible small">
    {{ $rentalTAll=0}} {{$passTAll=0}} {{$fondoTAll=0}} {{$montaggioTAll=0}}{{$smontaggioTAll=0}}{{$trasA=0}}
</span>
{{-- <form action="{{route('#')}}" method="post" enctype="multipart/form-data" id="formCreazionePreventivo">
    @csrf --}}
    <div class="conteiner-fluid container-max p-0  mx-auto">
        <div  id="preventivo{{$bookingRental->id}}" class="scheda p-5 pb-1">
            <div class="row justify-content-center px-5 pt-5 m-0">
                <div class="col-6 ">
                    <div class="row align-items-center m-0 mb-2">
                        <div class="col-12 col-md-3 ps-1 ">
                            <img src="/media/LogoPPeC.png"  class="img-fluid" alt="Logo aziendale">  
                        </div>
                        <div class="col-12 col-md-9 ">
                            <h3 class="p-0 pt-1 m-0"> PassePartout Persia e C</h3>
                        </div>
                    </div>
                    <p>
                        Passepartout Persia e C di Laura Bucci<br>
                        Via Marcello Guidi, 15 <br>
                        00060 Castelnuovo di Porto (RM)<br>
                        P.IVA: 16384421000 <br>
                        telefono:+39 3393401996 / 3397885768 <br>
                        mail:passepartoutpersia.c@gmail.com<br>
                        web: passepartoutpersia.it
                    </p> 
                    <h2>
                        COD. 
                        {{$bookingRental->formatRentalCode()}}
                    </h2>
                </div>
                <div class="col-6 ">
                    <h2 class="p-0 pt-2 pb-5 text-end"> PREVENTIVO</h2>
                    <table class="p-0" >
                        <tbody class="w-100 m-0" >
                            {{-- <tr >
                                <td class="pt-3  pt-md-5 pe-3 align-text-top">Per:</td>
                                <td colspan="2" class="pt-3 pt-md-5 "><textarea type="text" class="border-0 col-12 w-100 bg-transparent" name="informazioni"> </textarea></td>
                            </tr> --}}
                            <tr>
                                <td class="pt-0 pe-3 align-text-top">Data:</td>
                                <td>{{date('d/m/Y')}}</td>
                            </tr>
                            <tr>
                                <td class="pt-0 pe-3 align-text-top">N. preventivo: </td>
                                {{-- da generare dinamicamente con js tenendo conto degli altri possibili preventivi da rifare--}}
                                <td> {{$bookingRental->formatPreventivoN()}}</td>
                            </tr>
                            <tr>
                                <td class="pt-0 pe-3 align-text-top" >Dati Fatturazione: </td>
                                <td colspan="2"><strong> {{$bookingRental->name}}  {{$bookingRental->surname}}</strong><br>
                                    {{-- <strong> <input type="text"  class="border-0 bg-transparent" placeholder="nome società" name="nomeSocieta"> </strong> <br><input type="text"  class="border-0 bg-transparent" placeholder="via e civico" name="viaCivico">   <br> --}}
                                    {{$bookingRental->cap}} ({{$bookingRental->provincia}}) <br>
                                    {{$bookingRental->email}}<br>
                                    @if ($bookingRental->telefono)
                                    {{$bookingRental->telefono}}
                                    @endif  
                                    {{-- <input type="text"  class="border-0 bg-transparent" placeholder="- codice univoco" name="codiceUnivoco"><br>{{$bookingRental->email}}  <input type="text" name="pec" class="border-0 bg-transparent" placeholder="- Pec"> --}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row justify-content-center px-0 pt-5 m-0">
                    <div class="col-12 text-center">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">descrizione</th>
                                    <th scope="col">q.tà</th>
                                    <th scope="col"> prezzo unità</th>
                                    <th scope="col"> mesi</th>
                                    <th scope="col">totale</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="pb-0">
                                    <th  class="text-start">
                                        <p class="pb-0 mb-0">
                                            Noleggio dal {{$bookingRental->dal}} al  {{$bookingRental->al}}.
                                            <span class="d-none">
                                                {{ $start = strtotime($bookingRental->dal)}} 
                                                {{$end = strtotime($bookingRental->al)}}
                                            </span>
                                            totale giorni:                                       
                                            @if ( 30 > $days_between = ceil(abs($end - $start) / 86400) )   
                                            {{$days_between =30}}<small> <em>(noleggio minimo)</em> </small>
                                            @elseif($bookingRental->trasporto == 'passepartoutPersia'  && ( $days_between = ceil(abs($end - $start) / 86400)) >34)
                                            {{$days_between = ceil(abs(($end - $start)-(432000))/ 86400)}} <br>(tolti i 5 giorni per il trasporto)
                                            @else 
                                            {{$days_between = ceil(abs($end - $start) / 86400)}}
                                            @endif
                                            :
                                        </p>
                                    </th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    @foreach ($booking_rental_details as $bRd)
                                    @if ($bRd->bookingRental_id==$bookingRental->id)
                                    <tr class="pb-0">
                                        <th  class="text-start">
                                            <p class="pb-0 mb-1"> {{$bRd->rental->rentalModel->name}}
                                                (profilo:{{$bRd->rental->rentalModel->frame->profilo}} , {{$bRd->rental->rentalModel->color->name}} , {{$bRd->rental->rentalModel->glass->name}}).<br>
                                                {{$bRd->rental->size->name}}.
                                                Verticali: {{$bRd->vert}}, orizzontali: {{$bRd->orizz}}
                                            </p>   
                                        </th>
                                        <td>{{$bRd->qta}}</td>
                                        <td>{{number_format($bRd->rental->rentalPrice,2)}}</td>
                                        <td>{{ number_format(($mesi = $days_between / 30), 4)}}</td>
                                        <td>{{ number_format(($rentalT = ($bRd->qta * $bRd->rental->rentalPrice) * $mesi),2)}} <span class="d-none">{{$rentalTAll +=$rentalT }}</span></td> 
                                    </tr>
                                    @endif
                                    @endforeach
                                </tr>
                                @foreach ($booking_rental_details as $bRd)
                                @if ($bRd->bookingRental_id==$bookingRental->id)
                                @if ($bRd->passepartout || $bRd->colorPass)
                                <p class="d-none">{{$bRd->passepartout = '1'}}</p>
                                <tr class="pb-0">
                                    <th  class="text-start">
                                        <p class="pb-0 mb-0"> 
                                            {{$bRd->rental->size->cardboardForRental->cardboard->caratteristiche}}   
                                            (spessore:{{$bRd->rental->size->cardboardForRental->cardboard->spessore}}).
                                            {{$bRd->rental->size->name}}
                                            @if ($bRd->colorPass)
                                            colore: {{$bRd->colorPass}}
                                            @else 
                                            colore: bianco. 
                                            @endif
                                            passepartout
                                        </p>
                                    </th>
                                    <td>{{$bRd->qta}}</td>
                                    <td>{{number_format( $prezzo= $bRd->rental->size->cardboardForRental->pricePass,2)}}</td>
                                    <td></td>
                                    <td>{{ number_format($passT = ($bRd->qta * $prezzo),2)}} <span class="d-none">{{$passTAll +=$passT }}</span></td>
                                </tr>
                                @endif
                                @if ($bRd->fondo)
                                <tr class="pb-0">
                                    <th  class="text-start">
                                        <p class="pb-0 mb-0"> Barriera ({{$bRd->rental->size->cardboardForRental->cardboard->caratteristiche}}
                                            spessore:0,6mm).{{$bRd->rental->size->name}}
                                        </p>
                                    </th>
                                    <td>{{$bRd->qta}}</td>
                                    <td>{{number_format( $prezzoFondo= $bRd->rental->size->cardboardForRental->priceFondo,2)}}</td>
                                    <td></td>
                                    <td>{{ number_format($fondoT = ($bRd->qta * $prezzoFondo),2)}} <span class="d-none">{{$fondoTAll +=$fondoT }}</span></td>
                                </tr>
                                @endif
                                @if ($bRd->montaggio)
                                <tr class="pb-0">
                                    <th  class="text-start">
                                        <p class="pb-0 mb-0"> Montaggio delle opere nei passepartout e nelle cornici con materiali adatti alla conservazione.</p>
                                    </th>
                                    <td>{{$bRd->qta}}</td>
                                    <td>{{number_format( ($prezzoMontaggio = 10) , 2)}}</td>
                                    <td></td>
                                    <td>{{ number_format($montaggioT = ($bRd->qta * $prezzoMontaggio),2)}}  <span class="d-none">{{$montaggioTAll+=$montaggioT }}</span></td>
                                </tr>
                                @endif
                                @if ($bRd->smontaggio)
                                <tr class="pb-0">
                                    <th  class="text-start">
                                        <p class="pb-0 mb-0"> smontaggio delle opere dalle cornici.</p>
                                    </th>
                                    <td>{{$bRd->qta}}</td>
                                    <td>{{number_format( ($prezzoSmontaggio = 4) , 2)}}</td>
                                    <td></td>
                                    <td>{{ number_format($smontaggioT = ($bRd->qta * $prezzoSmontaggio),2)}} <span class="d-none">{{$smontaggioTAll +=$smontaggioT }}</span></td>
                                </tr> 
                                @endif
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row justify-content-center px-0 pt-0 m-0">
                    <div class="col-6 text-start px-3 pt-4">
                        <div class="shadow-gray p-3">
                            {{-- se preventivo restituisci informazioni aggiuntive --}}
                            <p class="pb-0 mb-0"> Per qualsiasi informzione e chiarimento potete contattarci:<br>- al numero +39 333754399; <br> -all' indirizzo passepartoutpersia.c@gmail.com;<br> -sul form contatti presente sul sito.</p>
                            {{-- se fattura restituisci dati bancari e modalità di pagamento --}}
                        </div>
                    </div>
                    <div class="col-6 text-center">
                        <table class="table table-striped">
                            <tbody>
                                <tr >
                                    <td scope="col" class="text-start">subtotale</td>
                                    <td scope="col" class="text-end pe-4"> €{{  number_format( $subT = $rentalTAll + $passTAll + $fondoTAll + $montaggioTAll + $smontaggioTAll, 2)}} </td> 
                                </tr>
                                <tr >
                                    <td scope="col-md-8" class="text-start"> Regime forfettario (esente da IVA) - bollo</td>
                                    <td scope="col-md-4" class="text-end pe-4">2,00 </td>
                                </tr>
                                <tr >
                                    <td scope="col" class="text-start">trasporti cornici</td>
                                    @if ($bookingRental->trasporto == 'passepartoutPersia')
                                    <td scope="col" class="text-end pe-4" >{{number_format(($trasA = 160) ,2)}} 
                                        <input type="text" class="border-0 bg-transparent text-end" placeholder="" name="prezzoTrasporti"> 
                                    </td>
                                    @else
                                    <td scope="col" class="text-end pe-4">a carico del cliente </td>
                                    @endif
                                </tr>
                                {{-- condizione di sconto  --}}
                                <span class="d-none">{{$scontoTAll=0}}</span>
                                @if ($days_between >= '75')
                                @foreach ($booking_rental_details as $bRd)
                                @if ($bRd->bookingRental_id==$bookingRental->id) 
                                <tr >
                                    <td scope="col" class="text-start">sconto noleggio {{$bRd->rental->size->name}}</td>
                                    <td scope="col" class="text-end pe-4">
                                        @if ($days_between >= '100' && $bRd->qta>=30 && $bRd->rental->rentalModel->glass->name == 'vetro anti-UV e anti-riflesso')
                                        (10%) {{ number_format($sconto= -(($bRd->qta * $bRd->rental->rentalPrice) * $mesi/ 100 *10),2) }}  <span class="d-none">{{$scontoTAll+=$sconto}}</span>
                                        @elseif($days_between <'100' && $bRd->qta>=30 && $bRd->rental->rentalModel->glass->name == 'vetro anti-UV e anti-riflesso')
                                        (5%){{number_format($sconto= -(($bRd->qta * $bRd->rental->rentalPrice) * $mesi/ 100 *5) , 2)}} <span class="d-none">{{$scontoTAll+=$sconto}}</span>
                                        @elseif (($days_between >= '100' && $bRd->qta>=30 && $bRd->rental->rentalModel->glass->name == 'vetro normale'))
                                        (18%) {{number_format($sconto= -(($bRd->qta * $bRd->rental->rentalPrice) * $mesi/ 100 *18),2)}} <span class="d-none">{{$scontoTAll+=$sconto}}</span>
                                        @elseif($days_between <'100' && $bRd->qta>=30 && $bRd->rental->rentalModel->glass->name == 'vetro normale')
                                        (7%) {{number_format($sconto= -(($bRd->qta * $bRd->rental->rentalPrice) * $mesi/ 100 *7),2)}} <span class="d-none">{{$scontoTAll+=$sconto}}</span>
                                        @else 
                                        (4%) {{number_format($sconto= -(($bRd->qta * $bRd->rental->rentalPrice) * $mesi/ 100 *4),2)}} <span class="d-none">{{$scontoTAll+=$sconto}}</span>
                                        @endif
                                    </td>
                                </tr>   
                                @endif
                                @endforeach 
                                @endif
                                <tr >
                                    <td scope="col" class="text-start">totale</td>
                                    <td scope="col" class="text-end pe-4">€ {{ number_format($subT  + 2 + $scontoTAll + $trasA , 2)}}</td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row justify-content-center px-0 pt-3 m-0">
                    <div class="col-12 text-center">
                        <p> 
                            <strong>Cauzione: €<span class="d-none">{{$cauzioneTAll=0}}</span>
                                @foreach ($booking_rental_details as $bRd)
                                @if ($bRd->bookingRental_id==$bookingRental->id)
                                <span class="d-none">{{$cauzione=($bRd->rental->valueFrame /4)* $bRd->qta }} {{$cauzioneTAll+=$cauzione}}</span>
                                @endif
                                @endforeach
                                {{ number_format( $cauzioneTAll, 2)}}
                            </strong> 
                        </p>    
                        <p>IMPORTANTE: La cauzione, stabilita in base al prezzo di vendita della singola cornice corrisponde ad 1/4 del suo valore. Sarà restituita entro 5 giorni dalla fine del noleggio.</p>
                    </div>
                </div>
            </div>
        </div>
        <span class="invisible">
            totale noleggi: {{ $rentalTAll}};  totale pass: {{$passTAll}}; totale fondi: {{$fondoTAll}}; totale montaggi:{{$montaggioTAll}}; totale smontaggi: {{$smontaggioTAll}};
            <br> subtotale : {{ $rentalTAll+$passTAll+$fondoTAll+$montaggioTAll+$smontaggioTAll}};
            sconto totale: <span class="">{{$scontoTAll}}</span>;cauzione totale: <span class="">{{$cauzioneTAll}}</span>
        </span>
        <div class="row justify-content-center w-100">
            {{-- <div class="col-3 m-auto d-inline-block"> --}}
                <button type="submit" class="btn border rounded-0 shadow-dark shadow-h-none text-uppercase m-auto w-75">genera preventivo</button>
                {{-- </div>   --}}
            </div>
            {{-- </form>        --}}
            @endsection