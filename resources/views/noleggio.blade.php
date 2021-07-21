@extends('layouts.app')

@section('content')
<div class="conteiner-fluid container-max p-0 mx-auto">
    <div class="row justify-content-center px-0 pt-5 m-0">
        <div class="col-12 text-center">
            <h1>Il noleggio delle nostre cornici</h1>
        </div>
        <div class="col-12">
            <h2>Perché noleggiare?</h2>
            <p class="">Il noleggio, ha il vantaggio di offrire molte soluzioni e possibilità stilistiche per la presentazione delle vostre opere, senza dover sostenere la spesa dell'acquisto e senza avere la necessità di grandi spazi per la conservazione. <br> Le manifestazioni culturali estemporanee, mostre in musei e gallerie, saranno così arricchite da scelte appropriate ottimizzando i tempi di realizzazione.  </p>
            <h2>Come?</h2>
            <p>Noleggiare le cornici è facilissimo, basta compilare correttamente il modulo in ogni singola parte per avere il preventivo in meno di 48 ore.<br>
            </p>
        </div>
    </div>
    <hr>
    <div class="row justify-content-center px-0 pt-5 m-0">
        <div class="col-12">
            <h3>News</h3> 
            <p>DA OGGI SE PRENOTI CON <strong>3 MESI</strong> DI ANTICIPO HAI IL 15% DI SCONTO SUL NOLEGGIO DI QUALSIASI MODELLO E FORMATO DI CORNICE.<br> RICHIEDI SUBITO IL TUO PREVENTIVO.
            </p>
        </div>
        
        <div class="col-12 col-md-6">
            <p>ESEMPI<br>
                Es.1:noleggio di 30 cornici P2 nere 50x60 (vetro con protezione dai raggi UV ed antiriflesso) per un mese:210,00 €<br>
                prezzo di vendita=  2400,00 €; cauzione= 600,00 €<hr>
                Es.2:noleggio di 30 cornici P2 nere 50x60 (vetro con protezione dai raggi UV ed antiriflesso) per 3 mesi: 630,00 €<br>
                prezzo di vendita=  2400,00 €; cauzione= 600,00 €<hr>
                Es.3:noleggio di 30 cornici P2 bianche 50x70 per un mese:165,00 €<br>
                prezzo di vendita=  1590,00 €; cauzione= 398,00 €<hr>
            </p>					
        </div>
        
        <div class="col-12 col-md-6"><p>qui immagine cassa per trasporto</p></div>
    </div>
    <div class="row justify-content-center px-0 pt-5 m-0">
        <x-schedaNoleggio />
    </div>

    <div class="row justify-content-center px-0 pt-5 m-0">
        <x-regoleNoleggio />
    </div>
</div>
@endsection



{{-- 
    
    <div class="col-lg-12" align="right">
        <div class="col-md-6"></div> 
        <!-- <div class="col-md-6"><a class="pulsante" href="inc_noleggio.php">RICHIEDI UN PREVENTIVO</a>
            <br> </div>-->
        </div><br>
        <div class="clear"></div>
        <br/>
        <br/>
        <!-- <h1 align="center"><a href="fiaf.php"><strong>TARIFFE scontate per i soci FIAF</strong></a></h1><br><br/> -->
        <br/>
        
        
        <div class="col-1g-12">	
            
            <a name="CORNICI NOLEGGIO">.</a>
            <h1 align="center"><strong>TARIFFE</strong></h1><br> <br>
            <div class="col-lg-12">
                <h3 align="center">NOLEGGIO CORNICI <strong>IN FERRO</strong></h3>
                <div class="col-md-3"><table width="100%" border="1"  style="font-size:1em" align="left">
                    <tr class="testotab" style="color:#FF0000">
                        <td style="width:30%"><strong>misure</strong></td>
                        <td style="width:30%"> <strong>al mese</strong></td>
                        <td style="width:40%"><strong>prezzo d'acquisto</strong></td>
                    </tr>
                    <tr class="testotab1">
                        <td>40x50</td>
                        <td>€ 6,00</td> 
                        <td>€ 67,00</td>
                    </tr>
                    <tr class="testotab">
                        <td>50x60</td>
                        <td>€ 7,00</td>
                        <td>€ 69,00</td>
                    </tr>
                    <tr class="testotab1">
                        <td>60x60</td>
                        <td>€ 7,00</td>
                        <td>€ 70,00</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-2"><img src="../images/PL passepartout persia.png" class="img-responsive"></div>
            <div class="col-md-2"> <img src="../images/cornice Passepartout Persia disegni1.png" style="height:auto;border:1px solid;border-color:#000000;margin:2%" class="img-responsive"> </div>
            <div class="col-md-2" ><img src="../images/cornice Passepartout Persia disegni2.png"  style="margin:2%;height:auto;border:1px solid;border-color:#000000" class="img-responsive"></div>
            <div class="col-md-4"> <img src="../images/cornice Passepartout Persia disegni insieme.png" style="height:auto;border:1px solid; border-color:#000000; margin:2%" class="img-responsive"></div>
            <br>
        </div>
        <br>
        
        <div class="clear"></div>
        <br>
        <div class="col-lg-6">
            <h3 align="center">NOLEGGIO CORNICI IN LEGNO <strong>P2</strong></h3>
            <p style="text-align:center"><em> Bianche decapate</em></p>
            <table width="100%" border="1"  style="font-size:1em" align="center">
                <tr class="testotab" style="color:#FF0000">
                    <td style="width:30%"><strong>misure</strong></td>
                    <td style="width:30%"> <strong>al mese</strong></td>
                    <td style="width:40%"><strong>prezzo d'acquisto</strong></td>
                </tr>
                <tr class="testotab1">
                    <td>30x40</td>
                    <td>€ 4,50</td> 
                    <td>€ 31,00 </td>
                </tr>
                <tr class="testotab">
                    <td>40x50</td>
                    <td>€ 4,50</td> 
                    <td>€ 40,00 </td>
                </tr>
                <tr class="testotab1">
                    <td>40x60</td>
                    <td>€ 5,50</td> 
                    <td>€ 44,00</td>
                </tr>
                <tr class="testotab">
                    <td>50x70</td>
                    <td>€ 5,50</td>
                    <td>€ 53,00</td>
                </tr>
            </table> 
        </div>
        <div class="col-lg-6">
            <h3 align="center">NOLEGGIO CORNICI IN LEGNO <strong>P2 </strong></h3>
            <p style="text-align:center"><em> nere (vetro per protezione UV ed antiriflesso)</em></p> 
            <table width="100%" border="1"  style="font-size:1em" align="center">
                <tr class="testotab" style="color:#FF0000">
                    <td style="width:30%"><strong>misure</strong></td>
                    <td style="width:30%"> <strong>al mese</strong></td>
                    <td style="width:40%"><strong>prezzo d'acquisto</strong></td>
                </tr>
                
                <tr class="testotab1">
                    <td>30x40</td>
                    <td>€ 6,00</td> 
                    <td>€ 48,00 </td>
                </tr>
                
                <tr class="testotab">
                    <td>40x50</td>
                    <td>€ 6,00</td> 
                    <td>€ 60,00 </td>
                </tr>
                <tr class="testotab1">
                    <td>50x60</td>
                    <td>€ 7,00</td> 
                    <td>€ 80,00 </td>
                </tr>
                <tr class="testotab">
                    <td>50x70</td>
                    <td>€ 7,00</td>
                    <td>€ 90,00 </td>
                </tr>
            </table><br>
        </div>
        <div class="col-lg-12">
            <div class="col-md-3"><img src="../images/P2 Passepartout Persia.png" class="img-responsive"></div>
            
            <div class="col-md-2"> <img src="../images/cornice Passepartout Persia natura1.png" style="height:auto;border:1px solid;border-color:#000000;margin:2%" class="img-responsive"> </div>
            <div class="col-md-2"><img src="../images/cornice Passepartout Persia natura2.JPG"  style="margin:2%;height:auto;border:1px solid;border-color:#000000" class="img-responsive"></div>
            <div class="col-md-5"> <img src="../images/cornice Passepartout Persia  natura insieme.png" style="vertical-align:middle;height:auto;border:1px solid; border-color:#000000; margin:2%" class="img-responsive"></div>
            
            
        </div>
        
        <div class="clear"></div>
        <div class="col-lg-12">
            <h3 align="center">NOLEGGIO CORNICI IN LEGNO <strong>P4</strong></h3>
            <div class="col-md-3"><table width="100%" border="1"  style="font-size:1em" align="left">
                <tr class="testotab" style="color:#FF0000">
                    <td style="width:30%"><strong>misure</strong></td>
                    <td style="width:30%"> <strong>al mese</strong></td>
                    <td style="width:40%"><strong>prezzo d'acquisto</strong></td>
                </tr>
                <tr class="testotab1"> 
                    <td>40x50</td>
                    <td>€ 4,50 </td> 
                    <td>€ 40,00</td>
                </tr>
                
                <tr class="testotab">
                    <td>50x70</td>
                    <td>€ 5,50 </td>
                    <td>€ 53,00</td>
                </tr>
            </table>
        </div>
        <div class="col-md-2"><img src="../images/P4 Passepartout Persia.png" class="img-responsive"></div>
        <div class="col-md-2"><img src="../images/cornice Passepartout Persia 2 p4.JPG" style="height:auto;border:1px solid;border-color:#000000;margin:2%" class="img-responsive"> </div>
        <div class="col-md-2"><img src="../images/cornice Passepartout Persia p4.png"  style="margin:2%;height:auto;border:1px solid;border-color:#000000" class="img-responsive"></div>
        <div class="col-md-4"> <img src="../images/cornice Passepartout Persia p4insieme.JPG" style="vertical-align:middle;height:auto;border:1px solid; border-color:#000000; margin:2%" class="img-responsive"></div>
        
        
    </div>
    <div class="clear"></div>
    
    <br>
    <div class="col-lg-12">
        <h3 align="center">NOLEGGIO CORNICI IN LEGNO <strong>P6</strong></h3>
        <div class="col-md-3"><table width="100%" border="1"  style="font-size:1em" align="left">
            <tr class="testotab" style="color:#FF0000">
                <td style="width:30%"><strong>misure</strong></td>
                <td style="width:30%"> <strong>al mese</strong></td>
                <td style="width:40%"><strong>prezzo d'acquisto</strong></td>
            </tr>
            <tr class="testotab1">
                <td>40x50</td>
                <td>€ 4,50 </td> 
                <td>€ 43,00</td>
            </tr>
            <tr class="testotab">
                <td>50x70</td>
                <td>€ 5,50 </td>
                <td>€ 58,00 </td>
            </tr>
            
        </table>
    </div>
    <div class="col-md-2"><img src="../images/P6 Passepartout Persia.png" class="img-responsive"></div>
    <div class="col-md-5"> <img src="../images/passepartout persia africa.JPG" style="margin:2%; vertical-align:middle;height:auto;border:1px solid; border-color:#999999" class="img-responsive"></div>
    <!--<img src="/persia/images/particolare africa.jpg" style="margin:2%;height:auto;border:1px solid; border-color:#999999" class="img-responsive"> --><div class="col-md-2" ><img src="../images/cornice Passepartout Persia particolare africa.jpg"  style="margin:2%; height:auto;border:1px solid; border-color:#999999" class="img-responsive"></div>
    <!--<div class="col-md-1" style="width:20%" ></div>-->
</div>
<div class="clear"></div>
<br><hr color="#FF0000" width="80%" align="center"><br>

<h3 align="center"> <strong>QUANTITA' POSSIBILI* </strong></h3>
<table width="80%" border="1" align="center" >
    <tr class="testotab" style="text-align:center; vertical-align:middle">
        <td style="width:12%; vertical-align:middle" >misure e profili
        </td>
        <td style="width:12%">cornice in ferro <br> 
            con vernice protettiva nera.</td>
            <td style="width:12%">P2
                cornice in bianco decapato. profondità 3,2cm</td>
                <td style="width:12%">P2
                    cornice nera. profondità 3,2cm <strong> con vetro protezione UV antiriflesso</strong></td>
                    <td style="width:12%">P4
                        cornice nera. profondità 5,5 cm</td>
                        <td style="width:12%">P6 
                            cornice al naturale fronte 6 cm.</td>
                        </tr>
                        <tr class="testotab1" align="center">
                            <td>30x40</td>
                            <td>/</td>
                            <td>40</td>
                            <td>80</td>
                            <td>/</td>
                            <td>/</td>  </tr>
                            <tr  class="testotab"align="center">
                                <td>40x50</td>
                                <td>10</td>
                                <td>30</td>
                                <td>35</td>
                                <td>40</td>
                                <td>60</td>
                            </tr>
                            <tr  class="testotab1"align="center">
                                <td>40x60</td>
                                <td>/</td>
                                <td>60</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                            </tr>
                            <tr class="testotab" align="center">
                                <td>50x60</td>
                                <td>80</td>
                                <td>/</td>
                                <td>50</td>
                                <td>/</td>
                                <td>/</td>
                            </tr>
                            <tr class="testotab1" align="center">
                                <td>50x70</td>
                                <td>/</td>
                                <td>10</td>
                                <td>25</td>
                                <td>70</td>
                                <td>50</td>
                            </tr>
                            <tr  class="testotab" align="center">
                                <td>60x60</td>
                                <td>5</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                                <td>/</td>
                            </tr>
                            
                            
                        </table>
                        <div align="center">*le quantità variano in base al periodo e alle altre prenotazioni.
                        </div>
                    </div><br><br><br>
                    <em><strong>Sull'acquisto delle cornici dopo il noleggio 6% di sconto  </strong></em><br>
                    <div class="clear"></div>
                    
                    <!--<div class="col-1g-12">	<br>
                        <div class="col-md-6" style="width:50%" ></div>
                        <div class="col-md-6"  >  
                            <p><a class="pulsante" href="inc_noleggio.php"target="_blank" >RICHIEDI UN PREVENTIVO</a></p>
                        </div> -->
                        <br />
                        <br /><strong>IMPORTANTE </strong> <br>
                        Le cornici noleggiate sono complete di vetro molato, attaccaglie e sistema di chiusura, contattateci per richieste differenti.<br>Per noleggi superiori a 2 mesi sconti in base alle quantità.
                        <br><br> 
                        <strong>PRENOTAZIONE E CONFERMA </strong><br>
                        La prenotazione va eseguita almeno 30-40 giorni prima. <BR>
                            Con la compilazione del contratto, ed entro 5 giorni dalla prenotazione va effettuato il pagamento del noleggio ed eventuali trasporti, per confermarla.<br><br>
                            <strong>CANCELLAZIONE </strong><br>
                            La cancellazione deve essere comunicata almeno 40 giorni prima della data del noleggio, in questo caso il cliente sarà rimborsato. Se la cancellazione non sarà comunicata in tempo la ditta non restituirà l'importo già versato.<br>
                            <br>
                            <strong>TRASPORTO</strong><br>
                            Modalità possibili:<br>
                            -ritiro personale presso il nostro magazzino a Castelnuovo di Porto 00060 (RM).<br>
                            -Consegna e ritiro tramite corriere incaricato dalla Passepartout Persia.<br>
                            Tipo di imballo: casse in legno.<br>
                            Solo per Roma: nei confini del GRA il prezzo totale dei 2 trasporti varia da un minimo di € 30,00 ad un massimo di € 60,00.<br><br>
                            <strong>ORARI DI RITIRO E CONSEGNA</strong><br>
                            Se il cliente ritira di persona la merce presso la nostra sede deve farlo tra le 8:30 e le 13:00 del giorno di inizio del noleggio. <br>L'orario preciso verrà concordato al momento della prenotazione.
                            La restituzione presso la nostra sede deve essere effettuata entro le 18:00 dell'ultimo giorno di noleggio.<br>
                            Nel caso in cui la ditta si occuperà del trasporto comunicherà i giorni di consegna e ritiro e dove possibile l'orario preciso.<br><br>
                            <strong>LA CAUZIONE E I RIMBORSI</strong><br>
                            La cauzione che verrà restituita per intero entro 5 giorni dal termine del noleggio se i beni non saranno danneggiati, è 
                            calcolata in base al prezzo di vendità del bene. Nel caso in cui i beni siano rovinati verranno sottratti dalla cauzione i seguenti importi:<br>
                            vetro: € 4,00.<br>
                            vetro con protezione UV antiriflesso: € 20,00 - 30,00.<br>
                            rottura della cassa per il trasporto: € 70,00.<br>
                            rottura della cornice o grave danneggiamento (prezzo di vendita del bene).<br>
                            se la cauzione non fosse sufficiente a ripagare il danno subito, il cliente si impegna a risarcirlo in base ai prezzi qui menzionati.<br><br>
                            <strong>PAGAMENTO</strong><br>
                            Il pagamento sarà diviso in due parti: <br>
                            -la prima comprenderà il noleggio ed eventuali trasporti, tramite bonifico bancario da effettuare entro 5 giorni dalla prenotazione e dalla firma del contratto.<br> La causale sarà: <em> (Codice Ordine di 6 cifre presente nel preventivo) con nome e cognome del richiedente </em><br>
                            -la cauzione verrà pagata 10 giorni prima dell'inizio del noleggio. <br>La causale sarà: <em> cauzione (stesso Codice Ordine) con nome e cognome del richiedente</em> <br><br>
                            
                            I pagamenti devono essere effettuato tramite bonifico bancario intestato a:<br>
                            Passepartout Persia di Persia Valentina <br>
                            IBAN IT62 U087 8739 0100 0000 0051 717
                            <br><br>
                            <strong>CONDIZIONI </strong><br>
                            Noleggio minimo:<br>
                            20 cornici per un mese o 10 cornice per 3 mesi (con vetro normale e stessa misura e profilo) <br>
                            30 cornici per un mese o 15 cornici per 3 mesi (con vetro protezione UV e stessa misura e profilo)<br>
                            per il noleggio di cornici di differenti profili e misure le quantità minime saranno comunicate al momento del preventivo.<br>
                            
                            <br>
                            <strong>Servizi aggiuntivi:</strong><br>
                            -Montaggio ( € 16,00 cadauna): ci occupiamo se richiesto, della misurazione delle opere, dell'assemblaggio con nastro adesivo adatto alla conservazione, del passepartout e relativo fondo, del montaggio dell'opera nel passepartout con angoli in poliestere, ed in fine del montaggio dell'opera (così assemblata) nella cornice.<br>
                            -Smontaggio (€ 4,00): smontaggio del passepartout dalla cornice.<br><br>
                        </div> 
                        <div>
                            PREZZO DEI PASSEPARTOUT E FONDI <br>
                            <table width="50%" border="1"  style="font-size:1em" align="left">
                                <tr class="testotab" style="color:#FF0000">
                                    <td style="width:30%"><strong>misura</strong></td>
                                    <td style="width:30%"> <strong>passepartout*</strong></td>
                                    <td style="width:40%"><strong>fondo</strong></td>
                                </tr>
                                <tr class="testotab1">
                                    <td>30x40</td>
                                    <td>€ 3,30</td> 
                                    <td>€ 1,50 </td>
                                </tr>
                                <tr class="testotab">
                                    <td>40x50</td>
                                    <td>€ 4,68</td> 
                                    <td>€ 3,00 </td>
                                </tr>
                                <tr class="testotab1">
                                    <td>40x60</td>
                                    <td>€ 4,68</td> 
                                    <td>€ 3,00</td>
                                </tr>
                                <tr class="testotab">
                                    <td>50x60</td>
                                    <td>€ 9,36</td>
                                    <td>€ 5,00</td>
                                </tr>
                                <tr class="testotab1">
                                    <td>50x70</td>
                                    <td>€ 9,36</td> 
                                    <td>€ 5,00</td>
                                </tr>
                                <tr class="testotab">
                                    <td>60x60</td>
                                    <td>€ 9,36</td>
                                    <td>€ 5,00</td>
                                </tr>
                            </table> 
                            <div class="clear"></div>
                            *misura minima della fascia del passepartout 3,5 cm
                            <br> disponibili con variazione di prezzi, anche in cartoni per la conservazione museale di diversi spessori e colori.
                        </div>
                    </div> 
                    
                </div>--}}