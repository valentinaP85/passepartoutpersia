@extends('layouts.app')

@section('content')

<div class="conteiner-fluid container-max p-0 mx-auto">
    <div class="row justify-content-center px-0 pt-5 m-0">
        <div class="col-12 text-center">
            <h1>L'azienda</h1>
        </div>
        @if(config('app.locale') =='it')
        <div class="col-12">
            <p>Dal 1991 la famiglia Persia realizza cornici artigianali in legno e passepartout per fotografi, pittori e collezionisti di stampe antiche.
                Si adopera nella realizzazione e promozione di prodotti originali ed innovativi per soddisfare le diverse esigenze dei propri clienti. Per lungo tempo ha collaborato con incontri Internazionali d'Arte in varie mostre importanti e nel 2008 ha fornito cornici e passepartout per la Biennale di Architettura a Venezia.
                Oggi la Passepartout Persia e C amplia il suo mercato con la creazione di cornici in ferro con taglio laser, l'utilizzo di ottimi materiali adatti alla conservazione ed il servizio di noleggio cornici in grandi quantità e varie tipologie, per mostre ed eventi in Italia.</p>
            </div>   
            @else
            <div class="col-12">
               <p> Since 1991 the Persia family has been making handcrafted wooden frames and passepartouts for photographers, painters and collectors of antique prints.
                It works in the realization and promotion of original and innovative products to satisfy the different needs of its customers. For a long time it has collaborated with International Art Meetings in various important exhibitions and in 2008 it supplied frames and passepartouts for the Biennale of Architecture in Venice.
                Today the Passepartout Persia e C expands its market with the creation of iron frames with laser cutting, the use of excellent materials suitable for conservation and the rental service frames in large quantities and various types, for exhibitions and events in Italy.</p>
            </div>
            @endif
            
            
            
        </div>
        <div class="row justify-content-center m-0 p-2 p-md-5">
            <div class="col-12 text-center">
                <h1>Tra i nostri clienti</h1>
            </div>
            <div class="col-12 col-md-3 py-2 text-center">
                <strong>Pittori e Scultori:</strong><br>
                <em>Dessì Gianni<br>
                    <!--Ceccobelli Bruno<br>-->
                    Pizzi Cannella Piero<br>
                    Botticelli Veronica<br>
                    Patané Giangaetano<br>
                    Fumasoni Rossella <br>
                    De Bartolo Giovanna<br>
                    <!--Gallo Giuseppe<br>-->
                </em>
            </div>
            <div class="col-12 col-md-6 py-2 text-center">
                <strong>Enti, Gallerie, Associazioni e Collezionisti:</strong><br>
                <em>Fondazione Marcello Aldega <br>
                    Associazione culturale Annamarra Contemporanea<br>
                    Incontri Internazionali d'Arte (Biennale Arch. 2008)<br>
                    Fondazione Italia Israele per la cultura e le arti<br>
                    Toscana Foto Festival (2015)<br>
                    Archivio centrale dello Stato<br>
                    MACRO Museo di Arte Contemporanea<br>
                    Istituto Italiano di Cultura a Londra<br>
                    Galleria Valentina Bonomo<br>
                    Accademia Nazionale di San Luca<br>
                    MAXXI Museo nazionale delle arti del XXI secolo<br>
                    Castelnuovo Fotografia
                </em>
            </div>
            <div class="col-12 col-md-3 py-2 text-center">
                <strong>Fotografi:</strong><br>
                <em>
                    Abate Claudio <br>
                    Ileana Florescu<br>
                    Piersanti Massimo<br>
                    Delogu Marco<br>
                    Celestino Ottavio<br>
                    D'Alessandro Luciano<br>
                    D'Exéa Simon<br>
                    Garolla Federico<br>
                    <!--Iginio De Luca <br>-->
                    <!--Federico Clavarino-->
                </em>
            </div>
        </div>
    </div>
    @endsection
    