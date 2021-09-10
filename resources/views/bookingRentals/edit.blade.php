@extends('layouts.app')

@section('content')
<div class="conteiner-fluid container-max p-0 mx-auto">
    <div class="row justify-content-center px-0 pt-5 m-0">
        <div class="col-12 text-center d-none">
            <h1>Crea preventivo</h1>
        </div>
    </div>
</div>
<div class="conteiner-fluid container-max p-0  mx-auto">
    <div  id="preventivo{{$bookingRental->id}}" class="scheda p-5">
        <div class="row justify-content-center px-5 pt-5 m-0">
             <div class="col-6 ">
                <div class="row align-items-center">
                    <div class="col-12 col-md-2 px-2 ">
                        <img src="/media/LogoPassePartoutP.png"  class="img-fluid" width="80px" alt="Logo aziendale">  
                    </div>
                    <div class="col-12 col-md-8 p-2">
                        <h2 class="p-0"> PassePartout Persia</h2>
                        <h4 class="p-0">L'artista ci guadagna! </h4>
                    </div>
                </div>
                <p>
                    Passepartout Persia di Valentina Persia<br>
                    Via Marcello Guidi, 15 <br>
                    00060 Castelnuovo di Porto (RM)<br>
                    P.IVA: 13025661003 <br>
                    telefono:+39 3337546399 <br>
                    mail:passepartoutpersia@gmail.com<br>
                    web: passepartoutpersia.it
                </p> 
                <h2>
                    COD. 
                    {{$bookingRental->formatRentalCode()}}
                </h2>
            </div>
            <div class="col-6 ">
                <h2 class="p-0 pt-2 text-end"> PREVENTIVO</h2>
                <table class="p-0" >
                    <tbody class="w-100 m-0" >
                        <tr >
                            <td class="pt-3  pt-md-5 pe-3 align-text-top">Per:</td>
                            <td colspan="2" class="pt-3 pt-md-5 "><textarea type="text" class="border-0 col-12 w-100 bg-transparent"> </textarea></td>
                        </tr>
                        <tr>
                            <td class="pt-0 pe-3 align-text-top">Data:</td>
                            <td>{{date('d/m/Y')}}</td>
                        </tr>
                        <tr>
                            <td class="pt-0 pe-3 align-text-top">N. preventivo: </td>
                            <td>*****</td>
                        </tr>
                        <tr>
                            <td class="pt-0 pe-3 align-text-top" >Dati Fatturazione: </td>
                            <td colspan="2"><strong> {{$bookingRental->nameSurname}}</strong> <br><strong> <input type="text"  class="border-0 bg-transparent" placeholder="nome società"> </strong> <br><input type="text"  class="border-0 bg-transparent" placeholder="via e civico"> <br> {{$bookingRental->cap}} città (provincia) <br>@if ($bookingRental->telefono)
                                {{$bookingRental->telefono}}
                                @endif  <input type="text"  class="border-0 bg-transparent" placeholder="- codice univoco"><br>{{$bookingRental->email}}  <input type="text"  class="border-0 bg-transparent" placeholder="- Pec">
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
                                    <p class="pb-0 mb-1"> {{$bookingRental->rental->rentalModel->name}}
                                        (profilo:{{$bookingRental->rental->rentalModel->frame->profilo}} , {{$bookingRental->rental->rentalModel->color->name}} , {{$bookingRental->rental->rentalModel->glass->name}}).<br>
                                        {{$bookingRental->rental->size->name}}
                                        di cui  verticali: {{$bookingRental->vert}}, orizzontali: {{$bookingRental->orizz}}
                                    </p>
                                    <p class="pb-0 mb-0"> dal  {{$bookingRental->dal}} al  {{$bookingRental->al}} -
                                        
                                        totale giorni: 
                                        <span class="d-none">
                                            {{ $start = strtotime($bookingRental->dal)}}
                                            
                                            {{$end = strtotime($bookingRental->al)}}
                                        </span>
                                        @if ( 30 > $days_between = ceil(abs($end - $start) / 86400) )   
                                        {{$days_between =30}}<small> <em>(noleggio minimo)</em> </small>


                                        @elseif($bookingRental->trasporto == 'passepartoutPersia'  && ( $days_between = ceil(abs($end - $start) / 86400)) >34)
                                     
                                        {{$days_between = ceil(abs(($end - $start)-(432000))/ 86400)}} <br>(tolti i 5 giorni per il trasporto)
                                        @else 
                                        {{$days_between = ceil(abs($end - $start) / 86400)}}
                                        @endif
                                    </p>
                                    {{-- {{$bookingRental->vert + $bookingRental->orizz}} --}}
                                </th>
                                <td>{{$bookingRental->qta}}</td>
                                <td>{{number_format($bookingRental->rental->rentalPrice,2)}}</td>
                                <td>{{ number_format(($mesi = $days_between / 30), 5)}}</td>
                                <td>
                                    {{ number_format(($totaleRental = ($bookingRental->qta * $bookingRental->rental->rentalPrice) * $mesi),2)}}
                                    
                                </td>
                            </tr>
                            @if ($bookingRental->passepartout || $bookingRental->colorPass)
                            <p class="d-none">{{$bookingRental->passepartout = '1'}}</p>
                            <tr class="pb-0">
                                <th  class="text-start">
                                    <p class="pb-0 mb-0"> {{$bookingRental->rental->size->cardboardForRental->cardboard->caratteristiche}}
                                        (spessore:{{$bookingRental->rental->size->cardboardForRental->cardboard->spessore}}).<br>
                                        @if ($bookingRental->colorPass)
                                        colore: {{$bookingRental->colorPass}}
                                        @else 
                                        colore: bianco. 
                                        @endif
                                    </p>
                                </th>
                                <td>{{$bookingRental->qta}}</td>
                                <td>{{number_format( $prezzo= $bookingRental->rental->size->cardboardForRental->pricePass,2)}}</td>
                                <td></td>
                                <td>
                                    {{ number_format($totalepass = ($bookingRental->qta * $prezzo),2)}}
                                </td>
                            </tr>
                            @endif
                            @if ($bookingRental->fondo)
                            <tr class="pb-0">
                                <th  class="text-start">
                                    <p class="pb-0 mb-0"> Barriera ({{$bookingRental->rental->size->cardboardForRental->cardboard->caratteristiche}}
                                        spessore:1,4mm).
                                    </p>
                                </th>
                                <td>{{$bookingRental->qta}}</td>
                                <td>{{number_format( $prezzoFondo= $bookingRental->rental->size->cardboardForRental->priceFondo,2)}}</td>
                                <td></td>
                                <td>
                                    {{ number_format($totalefondo = ($bookingRental->qta * $prezzoFondo),2)}}
                                </td>
                            </tr>
                            @endif
                            @if ($bookingRental->montaggio)
                            <tr class="pb-0">
                                <th  class="text-start">
                                    <p class="pb-0 mb-0"> Montaggio delle opere nei passepartout e nelle cornici <br>con materiali adatti alla conservazione.
                                    </p>
                                </th>
                                <td>{{$bookingRental->qta}}</td>
                                <td>{{number_format( ($prezzoMontaggio = 10) , 2)}}</td>
                                <td></td>
                                <td>
                                    {{ number_format($totaleMontaggio = ($bookingRental->qta * $prezzoMontaggio),2)}}
                                    
                                </td>
                            </tr>
                            @endif
                            @if ($bookingRental->smontaggio)
                            <tr class="pb-0">
                                <th  class="text-start">
                                    <p> smontaggio delle opere dalle cornici.
                                    </p>
                                </th>
                                <td>{{$bookingRental->qta}}</td>
                                <td>{{number_format( ($prezzoSmontaggio = 4) , 2)}}</td>
                                <td></td>
                                <td>
                                    {{ number_format($totaleSmontaggio = ($bookingRental->qta * $prezzoSmontaggio),2)}}
                                    
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row justify-content-center px-0 pt-0 m-0">
                <div class="col-6 text-start px-3 pt-4">
                    <div class="shadow-gray p-3">
                        {{-- se preventivo restituisci informazioni aggiuntive --}}
                        <p class="pb-0 mb-0"> Per qualsiasi informzione e chiarimento potete contattarci:<br>- al numero +39 333754399; <br> -all' indirizzo passepartoutpersia@gmail.com;<br> -sul form contatti presente sul sito.</p>
                        {{-- se fattura restituisci dati bancari e modalità di pagamento --}}
                    </div>
                </div>
                <div class="col-6 text-center">
                    <table class="table table-striped">
                        <tbody>
                            <tr >
                                <td scope="col" class="text-start">subtotale</td>
                                @if ($bookingRental->passepartout && $bookingRental->fondo && $bookingRental->montaggio && $bookingRental->smontaggio)
                                <td scope="col" class="text-end pe-4">€ {{  number_format( $subtotale = $totaleRental + $totalepass + $totalefondo + $totaleMontaggio + $totaleSmontaggio, 2)}} 
                                </td> 
                                @elseif ($bookingRental->passepartout && $bookingRental->fondo && $bookingRental->montaggio)
                                <td scope="col" class="text-end pe-4">€ {{  number_format( $subtotale = $totaleRental + $totalepass + $totalefondo + $totaleMontaggio, 2)}} 
                                </td> 
                                @elseif ($bookingRental->smontaggio && $bookingRental->fondo && $bookingRental->montaggio)
                                <td scope="col" class="text-end pe-4">€ {{  number_format( $subtotale = $totaleRental + $totaleSmontaggio + $totalefondo + $totaleMontaggio, 2)}} 
                                </td> 
                                @elseif ($bookingRental->passepartout && $bookingRental->fondo && $bookingRental->smontaggio)
                                <td scope="col" class="text-end pe-4">€ {{  number_format( $subtotale = $totaleRental + $totalepass + $totalefondo + $totaleSontaggio, 2)}} 
                                </td> 
                                @elseif ($bookingRental->passepartout && $bookingRental->montaggio && $bookingRental->smontaggio)
                                <td scope="col" class="text-end pe-4">€ {{  number_format( $subtotale = $totaleRental + $totalepass + $totaleMontaggio + $totaleSontaggio, 2)}} 
                                </td> 
                                @elseif ($bookingRental->passepartout && $bookingRental->fondo)
                                <td scope="col" class="text-end pe-4">€ {{  number_format( $subtotale = $totaleRental + $totalepass + $totalefondo, 2)}} 
                                </td> 
                                @elseif ($bookingRental->passepartout && $bookingRental->smontaggio)
                                <td scope="col" class="text-end pe-4">€ {{  number_format( $subtotale = $totaleRental + $totalepass + $totaleSmontaggio, 2)}} 
                                </td> 
                                @elseif ($bookingRental->passepartout && $bookingRental->montaggio)
                                <td scope="col" class="text-end pe-4">€ {{  number_format( $subtotale = $totaleRental + $totalepass + $totaleMontaggio, 2)}} 
                                </td>
                                @elseif ($bookingRental->montaggio && $bookingRental->fondo)
                                <td scope="col" class="text-end pe-4">€ {{  number_format( $subtotale = $totaleRental + $totaleMontaggio + $totalefondo, 2)}} 
                                </td> 
                                @elseif ($bookingRental->fondo && $bookingRental->smontaggio)
                                <td scope="col" class="text-end pe-4">€ {{  number_format( $subtotale = $totaleRental + $totalefondo + $totaleSmontaggio, 2)}} 
                                </td> 
                                @elseif ($bookingRental->montaggio && $bookingRental->smontaggio)
                                <td scope="col" class="text-end pe-4">€ {{  number_format( $subtotale = $totaleRental + $totaleMontaggio + $totaleSmontaggio, 2)}} 
                                </td> 
                                @elseif($bookingRental->passepartout ) 
                                <td scope="col" class="text-end pe-4">€ {{  number_format(  $subtotale =  $totaleRental + $totalepass , 2)}} 
                                </td> 
                                @elseif($bookingRental->fondo )
                                <td scope="col" class="text-end pe-4">€ {{  number_format( $subtotale =  $totaleRental +  $totalefondo , 2)}} 
                                </td> 
                                @elseif($bookingRental->montaggio )
                                <td scope="col" class="text-end pe-4">€ {{  number_format( $subtotale =  $totaleRental +  $totaleMontaggio , 2)}} 
                                </td> 
                                @elseif($bookingRental->smontaggio )
                                <td scope="col" class="text-end pe-4">€ {{  number_format( $subtotale =  $totaleRental +  $totaleSmontaggio , 2)}} 
                                </td> 
                                @else
                                <td scope="col" class="text-end pe-4">€ {{  number_format( $subtotale = $totaleRental, 2)}} 
                                </td>   
                                @endif
                            </tr>
                            <tr >
                                <td scope="col" class="text-start"> Regime forfettario (esente da IVA) - bollo</td>
                                <td scope="col" class="text-end pe-4">2,00 </td>
                            </tr>
                            <tr >
                                <td scope="col" class="text-start">trasporti cornici</td>
                                @if ($bookingRental->trasporto == 'passepartoutPersia')
                                <td scope="col" class="text-end pe-4" >{{number_format(($trasportiAssicurati = 160) ,2)}} <input type="text" class="border-0 bg-transparent text-end" placeholder="Costo trasporti">  </td>
                                @else
                                <td scope="col" class="text-end pe-4">a carico del cliente </td>
                                @endif
                            </tr>
                            {{-- condizione di sconto  --}}
                                @if ($days_between >= '75')
                            <tr >    
                                <td scope="col" class="text-start">sconto noleggio</td>
                                <td scope="col" class="text-end pe-4">
                                    @if ($days_between >= '100' && $bookingRental->qta>=30 && $bookingRental->rental->rentalModel->glass->name == 'vetro anti-UV e anti-riflesso')
                                    (10%) {{ number_format($sconto= -($totaleRental/ 100 *10),2) }}
                                    @elseif($days_between <'100' && $bookingRental->qta>=30 && $bookingRental->rental->rentalModel->glass->name == 'vetro anti-UV e anti-riflesso')
                                    (5%){{number_format($sconto= -($totaleRental/ 100 *5) , 2)}}
                                    @elseif (($days_between >= '100' && $bookingRental->qta>=30 && $bookingRental->rental->rentalModel->glass->name == 'vetro normale'))
                                    (18%) {{number_format($sconto= -($totaleRental/ 100 *18),2)}}
                                    @elseif($days_between <'100' && $bookingRental->qta>=30 && $bookingRental->rental->rentalModel->glass->name == 'vetro normale')
                                    (7%) {{number_format($sconto= -($totaleRental/ 100 *7),2)}}
                                    @else 
                                    (4%) {{number_format($sconto= -($totaleRental/ 100 *4),2)}}
                                    @endif
                                </td>
                            </tr>   
                            @endif
                            <tr >
                                <td scope="col" class="text-start">totale</td>
                                @if ($bookingRental->trasporto =='passepartoutPersia')
                                @if ($days_between >= '75')
                                <td scope="col" class="text-end pe-4">€ {{ number_format($subtotale  + 2 + $sconto + $trasportiAssicurati , 2)}} 
                                </td>  
                                @else
                                <td scope="col" class="text-end pe-4">€ {{number_format(2 + $subtotale  + $trasportiAssicurati , 2)}} 
                                </td>   
                                @endif 
                                @else
                                @if ($days_between >= '75')
                                <td scope="col" class="text-end pe-4">€ {{ number_format($subtotale  + 2 + $sconto  , 2)}} 
                                </td>  
                                @else
                                <td scope="col" class="text-end pe-4">€ {{number_format(2 + $subtotale  , 2)}} 
                                </td>   
                                @endif  
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row justify-content-center px-0 pt-5 m-0">
                <div class="col-12 text-center">
                    <p> <strong>Cauzione: € {{number_format(($bookingRental->rental->valueFrame /4)* $bookingRental->qta , 2)}}       </strong>   </p>
                    <p>IMPORTANTE: La cauzione, stabilita in base al prezzo di vendita della singola cornice corrisponde ad 1/4 del suo valore. Sarà restituita entro 5 giorni dalla fine del noleggio.</p>
                </div>
            </div>
        </div>
    </div>
    @endsection