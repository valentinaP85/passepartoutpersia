@extends('layouts.app')

@section('content')
<div class="conteiner-fluid container-max p-0 mx-auto">
  <div class="row justify-content-center px-0 pt-5 m-0">
    @if (session('message'))
    <div class="alert text-center mt-2 bg-danger" role="alert">
      {{ session('message') }}
    </div>
    @endif 
    <div class="col-12 text-center px-md-5">
      <h1>Richiedi un preventivo e prenota il tuo noleggio</h1>
      
      <p class="pt-3 text-end" >*<small>campi obbligatori</small></p> 
    </div>
  </div>
</div>


<div class="conteiner-fluid container-max p-0 mx-0 mx-md-auto">
  <div class="mx-2">
    <form action="{{route('prenotazione-inviata')}}" method="post" enctype="multipart/form-data" id="form">
      @csrf
      <section class="row pt-2 justify-content-center px-2 px-md-5">
        
        
        <div class="col-12 col-md-4 mb-3">
          <label for="dal" class="form-label">dal* <small> <em>(ricorda di prenotare con almeno un mese di anticipo)</em> </small> </label>
          <input type="date" class="form-control rounded-0" name="dal" value="{{old('dal')}}" id="dal" required>
          @error('dal')
          <div class="alert alert-danger info-error">{{ $message }}</div>
          @enderror
        </div>
        <div class="col-12 col-md-4 mb-3">
          <label for="al" class="form-label">al*</label>
          
          <input type="date" class="form-control rounded-0" name="al" value="{{old('al')}}" id="al" required>
          @error('al')
          <div class="alert alert-danger info-error">{{ $message }}</div>
          @enderror
        </div>
        
        
        
        
        <div class="col-12 col-md-4 mb-3">
          <label for="nameSurname" class="form-label">nome e cognome*</label>
          <input type="text" class="form-control rounded-0" max="30" name="nameSurname" value="{{old('nameSurname')}}" id="nameSurname" required>
          @error('nameSurname')
          <div class="alert alert-danger info-error">{{ $message }}</div>
          @enderror
        </div>
        <div class="col-12 col-md-4 mb-3">
          <label for="email" class="form-label">email*</label>
          <input type="email" class="form-control rounded-0"  name="email" value="{{old('email')}}" id="email" required>
          @error('email')
          <div class="alert alert-danger info-error">{{ $message }}</div>
          @enderror
        </div>
        <div class="col-12 col-md-2 mb-3">
          <label for="telefono" class="form-label">telefono</label>
          <input type="tel" class="form-control rounded-0" max="30" name="telefono" value="{{old('telefono')}}" id="telefono">
        </div>
        
        
        
        <div class="col-12 col-md-2 mb-3">
          <label for="cap" class="form-label">cap*</label>
          <select class="form-select rounded-0"  name="cap" value="{{old('cap')}}" id="cap" aria-label="Default select example" required>
            <option disabled selected>scegli</option>
            <option value="56395">
              56395
            </option>
            <option value=" 29401">
              29401
            </option>
            <option value="00060">
              00060
            </option>
          </select>
          @error('cap')
          <div class="alert alert-danger info-error">{{ $message }}</div>
          @enderror
        </div>
        <div class="col-12 col-md-4 mb-3">
          <label for="trasporto" class="form-label">trasporto*</label>
          <select class="form-select rounded-0"  name="trasporto" value="{{old('trasporto')}}" id="trasporto" aria-label="Default select example" required>
            <option disabled selected>scegli</option>
            
            <option value="passepartoutPersia">
              PassePartout Persia
            </option>
            <option value="cliente">
              A proprio carico
            </option>
            
          </select>
          @error('trasporto')
          <div class="alert alert-danger info-error">{{ $message }}</div>
          @enderror
        </div>
        
        <div class="row p-0">
          <div class="col-12 form-group pb-2 px-2">
            <label class="form-label" for="message">Messaggio</label>
            <textarea name="message" type="textarea" class="form-control rounded-0" id="message" cols="40" rows="3">{{old ('message')}}</textarea>
            @error('message')
            <div class="alert alert-danger info-error">{{$message}}</div>   
            @enderror
          </div>
        </div> 
        
        
        
        {{-- parte moltiplicabile --}}
        <div class="row p-0 align-items-center h-100">
          <div class="col-11 border border-gray my-2 ">
            <div class="row p-2 shadow-gray ">
              
              <div class="col-12 col-md-4 mb-3">
                <label for="rental_id" class="form-label"> Modello / Misura / (quantità max)*</label>
                <select class="form-select rounded-0"  name="rental_id" value="{{old('rental_id')}}" id="rental_id" aria-label="Default select example" required>
                  <option disabled selected>scegli</option>
                  @foreach ($rentals as $rental)
                  <option value="{{ $rental->id }}">
                    {{ $rental->rentalModel->name}} -- {{ $rental->size->name }} -- ({{ $rental->qta }})
                  </option>
                  @endforeach
                </select>
                @error('rental_id')
                <div class="alert alert-danger info-error">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-12 col-md-2 mb-3">
                <label for="qta" class="form-label">quantità*</label>
                <input type="number" class="form-control rounded-0" name="qta" value="{{old('qta')}}" id="qta" required>
                @error('qta')
                <div class="alert alert-danger info-error">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-6 col-md-2 mb-3">
                <label for="vert" class="form-label">verticali*</label>
                <input type="number" class="form-control rounded-0" name="vert" value="{{old('vert')}}" id="vert" required>
                @error('vert')
                <div class="alert alert-danger info-error">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-6 col-md-2 mb-3">
                <label for="orizz" class="form-label">orizzontali*</label>
                <input type="number" class="form-control rounded-0" name="orizz" value="{{old('orizz')}}" id="orizz" required>
                @error('orizz')
                <div class="alert alert-danger info-error">{{ $message }}</div>
                @enderror
              </div> 
              <div class="col-12 col-md-2 px-3">
                <p><strong>Servizi aggiuntivi</strong> </p>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="1"  name="montaggio" id="montaggio" >
                  <label class="form-check-label" for="montaggio">
                    Montaggio
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="1"  name="smontaggio" id="smontaggio" >
                  <label class="form-check-label" for="smontaggio">
                    smontaggio
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="1"  name="passepartout" id="passepartout" >
                  <a class="p-0 m-0" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <label class="form-check-label" for="passepartout">
                      passepartout
                    </label>
                  </a>
                </div> 
                <div class="collapse m-0 p-1" id="collapseExample"> 
                  <div class="card card-body m-0 p-0 border-0 flex-row bg-transparent">
                    <div class="form-check col-4 d-inline-block pt-1">
                      <input class="form-check-input" type="radio" name="colorPass" id="bianco" value="bianco">
                      <label class="form-check-label" for="bianco">
                        <div class="bg-white border border-1 border-dark d-inline-block  p-2 ms-negative"></div>
                      </label>
                    </div>
                    <div class="form-check col-4 d-inline-block pt-1">
                      <input class="form-check-input" type="radio" name="colorPass" id="avorio" value="avorio">
                      <label class="form-check-label" for="avorio">
                        
                        <div class="bg-avorio border border-1 border-dark d-inline-block  p-2 ms-negative" ></div>
                      </label>
                    </div>
                    <div class="form-check col-4 d-inline-block pt-1">
                      <input class="form-check-input" type="radio" name="colorPass" id="nero" value="nero">
                      <label class="form-check-label" for="nero">
                        <div class="bg-dark border border-1 border-dark d-inline-block  p-2 ms-negative"></div>
                      </label>
                    </div>
                  </div> 
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="1"  name="fondo" id="fondo" >
                  <label class="form-check-label" for="fondo">
                    fondo
                  </label>
                </div>
              </div>
            </div>
          </div>
          <div class="col-1 "> 
            <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#AddRental" aria-expanded="false" aria-controls="AddRental">
              <i class="fas fa-plus-circle fa-2x txt-accent"> </i>
            </button> 
          </div>
        </div>
          </section> 
          <div class="row px-lg-5 justify-content-center w-100">
            <div class="col-12 col-md-6 text-center py-3 w-100">
              <button type="submit" class="btn border border-danger rounded-0 btn-width text-center shadow-gray shadow-h-none text-uppercase my-3 bg-white fixed-bottom w-100"><strong>Richiedi disponibilità</strong> </button>
            </div>
          </div>
        </form> 
        
      </div>
      
      
      
      
      
      
    </div>
    
    
    
    
    
    <div class="collapse" id="AddRental">
      <div class="conteiner-fluid container-max p-0 mx-0 mx-md-auto">
        <div class="mx-2 mx-md-5">
      <div class="row p-0 align-items-center h-100">
        <div class="col-11 border my-2 ">
          <div class="row p-2 shadow-gray ">
            <form action="{{route('otherRentals.store')}}" method="post" enctype="multipart/form-data" id="formAdd">
              @csrf
              <div class="row d-none">
                <div class="col-12 mb-3">
              <label for="bookingRental_id" class="form-label"> bookingbookingRental_id*</label>
              <select class="form-select rounded-0"  name="bookingRental_id" id="bookingRental_id" aria-label="Default select example" required>
                @foreach ($booking_rentals as $bookingRental)
                <option value="{{ $bookingRental->id }}">
                  {{ $bookingRental->id}} -- {{ $bookingRental->nameSurname }}
                </option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-md-3 mb-3">
              <label for="rental_id" class="form-label"> Modello / Misura / (quantità max)*</label>
              <select class="form-select rounded-0"  name="rental_id" value="{{old('rental_id')}}" id="rental_id" aria-label="Default select example" required>
                <option disabled selected>scegli</option>
                @foreach ($rentals as $rental)
                <option value="{{ $rental->id }}">
                  {{ $rental->rentalModel->name}} -- {{ $rental->size->name }} -- ({{ $rental->qta }})
                </option>
                @endforeach
              </select>
              @error('rental_id')
              <div class="alert alert-danger info-error">{{ $message }}</div>
              @enderror
<br>
<button type="submit" class="btn border rounded-0 btn-width text-text shadow-gray shadow-h-none text-uppercase">add</button>

            </div>
            <div class="col-12 col-md-2 mb-3">
              <label for="qta" class="form-label">quantità*</label>
              <input type="number" class="form-control rounded-0" name="qta" value="{{old('qta')}}" id="qta" required>
              @error('qta')
              <div class="alert alert-danger info-error">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-6 col-md-2 mb-3">
              <label for="vert" class="form-label">verticali*</label>
              <input type="number" class="form-control rounded-0" name="vert" value="{{old('vert')}}" id="vert" required>
              @error('vert')
              <div class="alert alert-danger info-error">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-6 col-md-2 mb-3">
              <label for="orizz" class="form-label">orizzontali*</label>
              <input type="number" class="form-control rounded-0" name="orizz" value="{{old('orizz')}}" id="orizz" required>
              @error('orizz')
              <div class="alert alert-danger info-error">{{ $message }}</div>
              @enderror
            </div> 
            <div class="col-12 col-md-2 px-3">
              <p><strong>Servizi aggiuntivi</strong> </p>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1"  name="montaggio" id="montaggio" >
                <label class="form-check-label" for="montaggio">
                  Montaggio
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1"  name="smontaggio" id="smontaggio" >
                <label class="form-check-label" for="smontaggio">
                  smontaggio
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1"  name="passepartout" id="passepartout" >
                <a class="p-0 m-0" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                  <label class="form-check-label" for="passepartout">
                    passepartout
                  </label>
                </a>
              </div> 
              <div class="collapse m-0 p-1" id="collapseExample"> 
                <div class="card card-body m-0 p-0 border-0 flex-row bg-transparent">
                  <div class="form-check col-4 d-inline-block pt-1">
                    <input class="form-check-input" type="radio" name="colorPass" id="bianco" value="bianco">
                    <label class="form-check-label" for="bianco">
                      <div class="bg-white border border-1 border-dark d-inline-block  p-2 ms-negative"></div>
                    </label>
                  </div>
                  <div class="form-check col-4 d-inline-block pt-1">
                    <input class="form-check-input" type="radio" name="colorPass" id="avorio" value="avorio">
                    <label class="form-check-label" for="avorio">
                      
                      <div class="bg-avorio border border-1 border-dark d-inline-block  p-2 ms-negative" ></div>
                    </label>
                  </div>
                  <div class="form-check col-4 d-inline-block pt-1">
                    <input class="form-check-input" type="radio" name="colorPass" id="nero" value="nero">
                    <label class="form-check-label" for="nero">
                      <div class="bg-dark border border-1 border-dark d-inline-block  p-2 ms-negative"></div>
                    </label>
                  </div>
                </div> 
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1"  name="fondo" id="fondo" >
                <label class="form-check-label" for="fondo">
                  fondo
                </label>
              </div>
            </div>

              </div>
           
            </form>
          </div>
        </div>
        @if ($other_rentals)
         <div class="col-1 "> 
         {{-- <a href="{{route('otherRentals.destroy', $otherRental )}}">
        
        </a>  --}}
         <i class="fas fa-minus-circle fa-2x txt-accent"></i>
         
        </div>   
        @endif
        
      </div>
        </div>
      </div>
      {{-- <div class="row p-0 align-items-center h-100">
        <div class="col-11 border border-gray my-2 shadow-gray">
          <form action="{{route('otherRentals.store')}}" method="post" enctype="multipart/form-data" id="formAdd">
            @csrf
            <div class="row p-2 ">
              <div class="col-12 mb-3">
                <label for="bookingRental_id" class="form-label"> bookingbookingRental_id*</label>
                <select class="form-select rounded-0"  name="bookingRental_id" id="bookingRental_id" aria-label="Default select example" required>
                  <option selected>id della prenotazione noleggio appena reggistrata</option>
                  @foreach ($booking_rentals as $bookingRental)
                  <option value="{{ $bookingRental->id }}">
                    {{ $bookingRental->id}} -- {{ $bookingRental->nameSurname }}
                  </option>
                  @endforeach
                </select>
              </div>
              
              <div class="col-12 col-md-4 mb-3">
                <label for="rental_id" class="form-label"> Modello / Misura / (quantità massima)*</label>
                <select class="form-select rounded-0"  name="rental_id" value="{{old('rental_id')}}" id="rental_id" aria-label="Default select example" required>
                  <option disabled selected>scegli</option>
                  @foreach ($rentals as $rental)
                  <option value="{{ $rental->id }}">
                    {{ $rental->rentalModel->name}} -- {{ $rental->size->name }} -- ({{ $rental->qta }})
                  </option>
                  @endforeach
                </select>
                @error('rental_id')
                <div class="alert alert-danger info-error">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-12 col-md-2 mb-3">
                <label for="qta" class="form-label">quantità*</label>
                <input type="number" class="form-control rounded-0" name="qta" value="{{old('qta')}}" id="qta" required>
                @error('qta')
                <div class="alert alert-danger info-error">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-6 col-md-2 mb-3">
                <label for="vert" class="form-label">verticali*</label>
                <input type="number" class="form-control rounded-0" name="vert" value="{{old('vert')}}" id="vert" required>
                @error('vert')
                <div class="alert alert-danger info-error">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-6 col-md-2 mb-3">
                <label for="orizz" class="form-label">orizzontali*</label>
                <input type="number" class="form-control rounded-0" name="orizz" value="{{old('orizz')}}" id="orizz" required>
                @error('orizz')
                <div class="alert alert-danger info-error">{{ $message }}</div>
                @enderror
              </div> 
              <div class="col-12 col-md-2 px-3">
                <p><strong>Servizi aggiuntivi</strong> </p>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="1"  name="montaggio" id="montaggio" >
                  <label class="form-check-label" for="montaggio">
                    Montaggio
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="1"  name="smontaggio" id="smontaggio" >
                  <label class="form-check-label" for="smontaggio">
                    smontaggio
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="1"  name="passepartout" id="passepartout" >
                  <a class="p-0 m-0" data-bs-toggle="collapse" href="#collapseColorPass" role="button" aria-expanded="false" aria-controls="collapseColorPass">
                    <label class="form-check-label" for="passepartout">
                      passepartout
                    </label>
                  </a>
                </div> 
                <div class="collapse m-0 p-1" id="collapseColorPass"> 
                  <div class="card card-body m-0 p-0 border-0 flex-row bg-transparent">
                    <div class="form-check col-4 d-inline-block pt-1">
                      <input class="form-check-input" type="radio" name="colorPass" id="bianco" value="bianco">
                      <label class="form-check-label" for="bianco">
                        <div class="bg-white border border-1 border-dark d-inline-block  p-2 ms-negative" ></div>
                      </label>
                    </div>
                    <div class="form-check col-4 d-inline-block pt-1">
                      <input class="form-check-input" type="radio" name="colorPass" id="avorio" value="avorio">
                      <label class="form-check-label" for="avorio">
                        
                        <div class="bg-avorio border border-1 border-dark d-inline-block  p-2 ms-negative" ></div>
                      </label>
                    </div>
                    <div class="form-check col-4 d-inline-block pt-1">
                      <input class="form-check-input" type="radio" name="colorPass" id="nero" value="nero">
                      <label class="form-check-label" for="nero">
                        <div class="bg-dark border border-1 border-dark d-inline-block  p-2 ms-negative" ></div>
                      </label>
                    </div>
                  </div> 
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="1"  name="fondo" id="fondo" >
                  <label class="form-check-label" for="fondo">
                    fondo
                  </label>
                </div>
              </div>
            </div>
            
            <div class="row px-lg-5 justify-content-center">
              <div class="col-12 col-md-6 text-center py-3">
                <button type="submit" class="btn border rounded-0 btn-width text-text shadow-dark shadow-h-none text-uppercase my-3">add</button>
              </div>
            </div>
          </form>
        </div>
      </div>
<div class="col-1 "> 
    <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
      
      
    </button> 
  </div> --}}

    </div>
  </div>
  
  
</div>
</div>    

@push('script')
<script>
  //       fetch('./cap.json')
  // .then(response=>response.json())
  // .then(dati =>{
    //    console.log(dati) 
    // })
    let form=document.querySelector('#form')
    form.addEventListener('submit',(e)=>
    {
      e.preventDefault()
      let dal=document.querySelector('#dal').value
      let al=document.querySelector('#al').value
      
      let qta=document.querySelector('#qta').value
      let vert=document.querySelector('#vert').value
      let orizz=document.querySelector('#orizz').value
      let sum = Number(vert)+ Number(orizz);  
      
      if (dal>al){
        alert('la data non va')
        
        return
      }else if(qta != sum ){
        alert('la somma delle cornici verticali ed orizzontali deve essere uguale alla quantità')
        return 
        
      } else {
        form.submit()
      }
      
      
    })
  </script>
  @endpush
  
  @endsection
  
  