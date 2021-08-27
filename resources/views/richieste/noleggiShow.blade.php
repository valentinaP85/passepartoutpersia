@extends('layouts.app')

@section('content')
<div class="conteiner-fluid container-max p-1 mx-auto">
    <div class="row justify-content-center px-0 pt-5 m-0">
        
        <div class="col-12 text-center">
            <h1>noleggio n. 
                @if ($bookingRental->id > '99') 
                {{date('y') . $bookingRental->id}}
             @elseif($bookingRental->id > '9')
               {{date('y') . '0' . $bookingRental->id}}
             @else
                {{date('y') . '00' .  $bookingRental->id}}

             @endif</h1>
        </div>
    </div>
    <div class="row justify-content-around px-0 pt-5 m-0">
        <div class="col-12 col-md-4">

            <div>
              
                <h5><strong>dal</strong>: {{ $bookingRental->dal}} 
                   <strong>al</strong>: {{$bookingRental->al}}</h5>
               </div>

            <p ><strong>COD.</strong> 
                <span id='Cod. 
                @if ($bookingRental->id > '99') 
                {{date('y') . $bookingRental->id}}
             @elseif($bookingRental->id > '9')
               {{date('y') . '0' . $bookingRental->id}}
             @else
                {{date('y') . '00' .  $bookingRental->id}}
                @endif  '> 
            @if ($bookingRental->id > '99') 
                {{date('y') . $bookingRental->id}}
             @elseif($bookingRental->id > '9')
               {{date('y') . '0' . $bookingRental->id}}
             @else
                {{date('y') . '00' .  $bookingRental->id}}

             @endif   
             </span> - <strong>Modello</strong>:
              
               {{$bookingRental->rental->rentalModel->name}}
                
                 - <strong>Misura</strong>: {{$bookingRental->rental->size->name}}. </p>

                 <p><strong>quantità</strong>: {{$bookingRental->qta}} di cui verticali " {{$bookingRental->vert}}" e orizzontali " {{$bookingRental->orizz}}"</p>


                 @if( $bookingRental->message !=null)
                 <p><strong>Messaggio</strong>: {{ $bookingRental->message}}</p>
                  @endif
        </div>

        <div class="col-12 col-md-4 px-3">
          
          @if( $bookingRental->montaggio==null && $bookingRental->smontaggio==null && $bookingRental->passepartout==null && $bookingRental->fondo==null )
 
          @else
         <p class="text-uppercase"> <strong>servizi aggiuntivi richiesti</strong> : </p>
          @if( $bookingRental->montaggio !=null)
          <p>- montaggio</p>
          @endif
          @if( $bookingRental->smontaggio !=null)
          <p>- smontaggio</p>
          @endif
          @if( $bookingRental->passepartout !=null || $bookingRental->colorPass !=null)
          <p>- passepartout
            @if( $bookingRental->colorPass !=null)
          {{$bookingRental->colorPass}}
          @endif
          </p>
          @endif
          @if( $bookingRental->fondo !=null)
          <p>- fondo</p>
          @endif

          @endif
        </div>
        <div class="col-12 col-md-4 ">      

<div class="card shadow-gray mb-2 mb-md-4">
  <div class="card-body px-2 px-md-4">
    <h2><strong>{{ $bookingRental->nameSurname}}</strong></h2>
           
    @if( $bookingRental->telefono !=null)
   <p><strong>Telefono</strong>: {{ $bookingRental->telefono}}</p>
    @endif
    <p><strong>Mail</strong>: {{ $bookingRental->email}}</p>

    @if( $bookingRental->trasporto =='passepartoutPersia')
    <div class="border border-danger my-2 pt-2 px-2 px-5">
      <p><strong>trasporto</strong>: {{$bookingRental->trasporto}}</p>
    
    <p><strong>Località</strong>: {{$bookingRental->cap}}</p>
    </div>
@else 
    <div >
      <p><strong>trasporto</strong>: {{$bookingRental->trasporto}}</p>
    
    <p><strong>Località</strong>: {{$bookingRental->cap}}</p>
    </div>
    @endif
    

   

   

  </div>
</div>


          
            

            
        </div>

        

        <div class="col-12 text-end">
            <a href="javascript:history.go(-1)" 
onMouseOver="self.status=document.referrer;return true">
<i class="far fa-arrow-alt-circle-left fa-4x txt-accent"></i></a>
        </div>
    </div>
</div>
@endsection
