@extends('layouts.app')

@section('content')

        <div class="conteiner-fluid container-max p-0 mx-auto">
            <div class="row justify-content-center px-0 pt-5 m-0">
        <div class="col-12 text-center">
            <h1>L'azienda</h1>
        </div>
        @if(config('app.locale') =='it')
          <div class="col-12">
            <p>Dal 1991 l'azienda realizza cornici artigianali in legno e passepartout per fotografi, pittori e collezionisti di stampe antiche.<br>
                Si adopera nella realizzazione e promozione di prodotti originali ed innovativi per soddisfare le diverse esigenze dei propri clienti. Per lungo tempo ha collaborato con incontri Internazionali  d'Arte in varie mostre importanti e nel 2008 ha fornito cornici e passepartout per la Biennale di Architettura a Venezia.<br>
                
                Nel 2014 Valentina Persia, seguendo le orme dei suoi genitori, rinnova l'azienda. Da sempre appassionata di arte, frequenta il liceo artistico "Via di Ripetta" ed in seguito all'università della Tuscia, Conservazione dei Beni Culturali.<br>
                
                Oggi la Passepartout Persia amplia il suo mercato con la creazione di cornici in ferro con taglio laser,  l'utilizzo di ottimi materiali adatti alla conservazione ed il servizio di noleggio cornici in grandi quantità e varie tipologie, per mostre ed eventi in Italia.<br>
                Tra i suoi clienti: il Ministero dei Beni e le Attività Culturali, Fondazione Italia Israele per la cultura e le arti , l'Istituto Italiano di Cultura a Londra , fondazioni, musei e molti artisti di fama internazionale.</p>
        </div>   
        @else
           <div class="col-12">
            Our firm has been offering since 1991 handmade wooden picture frames
and passepartout to photographers, painters and collectors of old prints.
We concentrated on making and promoting novel and innovative objects in
response to the varied requirements of our customers.We have long
cooperated with Incontri Internazionali d'Arte on several important
exhibitions and in 2008 we provided frames and passepartout for the Venice
Biennale di Architettura.
In 2014 Valentina Persia, following in her parents' footsteps, proceeded to
renovate the firm and founded P. P. Her long-standing love of art had led her
to pursue her studies at the "Via di Ripetta" secondary art School and later
in the Tuscia University Course in Preservation of Cultural Heritage.
Today P. P. has widened the range of its products to include laser-cut metal
frames, high quality materials suitable for long-term preservation, and the
loan of picture frames in large numbers and different types for exhibitions
and events throughout Italy.
Our customers include: Ministero dei Beni ed Attività Culturali, Fondazione
Italo Israeliana for culture and arts, the Italian Cultural Institute in London,
other Foundations, Museums, and world-renowned artists.
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
