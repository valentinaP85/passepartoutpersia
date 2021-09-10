@extends('layouts.app')

@section('content')
<header class=" container-fluid header m-0 py-5 ">
    <div class="row justify-content-center aling-items-center w-100 h-100 m-0 p-md-5">
        <div class="col-12 col-md-6 text-center mx-auto my-5 m-md-auto">
             <img class="img-fluid m-auto" width="200" src="/media/LogoPassePartoutP.png" alt="Logo Aziendale">
        </div>
        <div class="col-12 col-md-6 text-center mx-auto my-3 m-md-auto">
            <div class="row py-2 py-md-5 aling-items-center w-100 m-0">
                <div class="text-center text-md-start w-100">
                <a href="{{route('cornici')}}" class="text-decoration-none d-inline-block btn-ppp shadow-dark shadow-h-none py-md-4 px-md-5 text-uppercase"><h2 class="m-auto"> cornici</h2></a>
                </div>
            </div>
            <div class="row py-2 py-md-5 aling-items-center w-100 m-0">
                <div class="text-center text-md-start w-100">
                <a href="{{route('passepartout')}}" class="text-decoration-none d-inline-block btn-ppp shadow-dark shadow-h-none py-md-4 px-md-5 text-uppercase"><h2 class="m-auto"> passepartout</h2></a>
                </div>
            </div>
            <div class="row py-2 py-md-5 aling-items-center w-100 m-0">
                <div class="text-center text-md-start w-100">
                <a href="{{route('noleggio')}}" class="text-decoration-none d-inline-block btn-ppp shadow-dark shadow-h-none py-md-4 px-md-5 text-uppercase"><h2 class="m-auto"> noleggio cornici</h2></a>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="conteiner-fluid container-max p-0 mx-auto">
    <div class="row justify-content-center px-0 pt-5 m-0">
        <div class="col-12 text-center">
            <h1>PassePartout Persia</h1>
        </div>
        <div class="col-12 col-md-7">
            
            <p> 	
                Produciamo e vendiamo <a class="" href="{{route('passepartout')}}">passepartout</a> personalizzati con cartone Acid Free e cornici in <a class="" href="#">legno</a> e <a class="" href="#">ferro</a>. <br /> Realizziamo prodotti <a class="" href="#" > unici</a>, creati su modelli e disegni degli artisti.<br />Troverete disponibilità, competenza e tutto quello che cercate per esaltare al meglio le vostre opere d'arte.<br />Effettuiamo il <a class="" href="#">noleggio di cornici</a>, <br /> e su richiesta anche il montaggo delle opere in loco.<br />Il nostro successo è stato legato fino ad oggi al passaparola, <br />perchè abbiamo fatto della qualità e del prezzo un cavallo di battaglia.<br />Il nostro biglietto da visita sono <a class="" href="#">i nostri clienti</a>!
                
            </p>
        </div>
        <div class="col-12 col-md-5 text-center"><img class="img-fluid" src="" alt="fotografia di Sofia Loren incorniciata con passepartout bianco e cornice in ferro"><br>
        </div>
    </div>
</div>
</div>

<script>
    let arr =[1,32,5,2,8,22,2,4]
    let fun =9
 console.log(arr.map(a => a>= fun )? true : false) ;




</script>
@endsection
