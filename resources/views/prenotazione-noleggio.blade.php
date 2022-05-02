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
      <p class="pt-3 text-end" > <input class="invisible"id="template1" value=""> <input class="invisible"id="template2">*<small>campi obbligatori</small></p> 
     </div>
  </div>
</div>
<div class="conteiner-fluid container-max p-0 mx-0 mx-md-auto">
  <div class="mx-2">
    <form action="{{route('prenotazione-inviata')}}" method="post" enctype="multipart/form-data" id="form">
      @csrf
      <section class="row pt-2 justify-content-center px-2 px-md-5">
        <div class="col-12 col-md-4 mb-3">
          <label for="dal" class="form-label">dal* <small> <em>(prenota a partire dal  {{$start= date("d/m/Y", strtotime("+1 month",strtotime("now")))}})</em> </small> </label>
          <input type="date" 
          {{-- onfocus="(this.type='date')" placeholder="{{date("d/m/Y", strtotime("+1 month",strtotime("now")))}}" --}}class="form-control rounded-0" name="dal" id="dal" required> 
          @error('dal')
          <div class="alert alert-danger info-error">{{ $message }}</div>
          @enderror
        </div>
        <div class="col-12 col-md-4 mb-3">
          <label for="al" class="form-label">al*</label>
          <input type="date" class="form-control rounded-0" name="al" value="{{old('al')}}"  id="al" required>
          @error('al')
          <div class="alert alert-danger info-error">{{ $message }}</div>
          @enderror
        </div>
        <div class="col-12 col-md-2 mb-3">
          <label for="name" class="form-label">nome*</label>
          <input type="text" class="form-control rounded-0" max="30" name="name" value="{{old('name')}}" id="name" required>
          @error('name')
          <div class="alert alert-danger info-error">{{ $message }}</div>
          @enderror
        </div>
        <div class="col-12 col-md-2 mb-3">
          <label for="surname" class="form-label">cognome*</label>
          <input type="text" class="form-control rounded-0" max="30" name="surname" value="{{old('surname')}}" id="surname" required>
          @error('surname')
          <div class="alert alert-danger info-error">{{ $message }}</div>
          @enderror
        </div>
        <div class="col-12 col-md-3 mb-3">
          <label for="email" class="form-label">email*</label>
          <input type="email" class="form-control rounded-0"  name="email" value="{{old('email')}}" id="email" required>
          @error('email')
          <div class="alert alert-danger info-error">{{ $message }}</div>
          @enderror
        </div>
        <div class="col-12 col-md-2 mb-3">
          <label for="telefono" class="form-label">telefono</label>
          <input type="tel" class="form-control rounded-0" max="30" name="telefono" value="{{old('telefono')}}" id="telefono" autocomplete="tel">
        </div>
        <div class="col-12 col-md-2 mb-3">
          <label for="provincia" class="form-label">provincia*</label>
          <input class="form-control rounded-0" type="text" name="provincia" value="{{old('provincia')}}" required id="frmCityS" >
          @error('provincia')
          <div class="alert alert-danger info-error">{{ $message }}</div>
          @enderror
        </div>
        <div class="col-12 col-md-2 mb-3">
          <label for="cap" class="form-label">cap*</label>
          <input class="form-control rounded-0"  type="number" name="cap" required id ="frmZipS" size="5" autocomplete="shipping postal-code">
          @error('cap')
          <div class="alert alert-danger info-error">{{ $message }}</div>
          @enderror
        </div>
        <div class="col-12 col-md-3 mb-3">
          <label for="trasporto" class="form-label">trasporto*</label>
          <select class="form-select rounded-0"  name="trasporto" value="{{old('trasporto')}}" id="trasporto" aria-label="Default select example" required>
            <option disabled selected>scegli</option>
            <option value="passepartoutPersia">
              PassePartout Persia e C
            </option>
            <option value="cliente">
              A proprio carico
            </option>
          </select>
          @error('trasporto')
          <div class="alert alert-danger info-error">{{ $message }}</div>
          @enderror
        </div>
        <div class="col-12 form-group pb-2 px-2">
          <label class="form-label" for="message">Messaggio</label>
          <textarea name="message" type="textarea" class="form-control rounded-0" id="message" cols="40" rows="3">{{old ('message')}}</textarea>
          @error('message')
          <div class="alert alert-danger info-error">{{$message}}</div>   
          @enderror
        </div>
        <div class="conteiner-fluid container-max p-0 mx-0 mx-md-auto">
          <div class="mx-1 mx-md-2">
            <div class="row p-0 align-items-center h-100 justify-content-between">
              <div class="col-6 col-md-1"> 
                <button class="btn " type="button"  id="addButton" onclick="duplicateDetails()">
                  <i class="fas fa-plus-circle fa-2x txt-accent"> </i>
                </button> 
              </div>
              <div class="col-6 col-md-1">
                <h5> 
                  <input name="numberBox" type="number" class="index-box m-0" id="numberBox" value="0" readonly="readonly">
                </h5>
              </div>
            </div>
          </div>
        </div>
        <div id="newBox">
        </div>    
        <div class="col-1 "> 
          <button class="btn invisible" type="button"  id="removeBox" onclick="deleteDetails()">
            <i class="fas fa-minus-circle fa-2x txt-accent"></i>
          </button>  
        </div>     
        <div class="row px-lg-5 justify-content-center w-100">
          <div class="col-12 col-md-6 text-center py-3 w-100">
            <button type="submit" class="btn border border-danger rounded-0 btn-width text-center shadow-gray shadow-h-none invisible " id="btn-richiesta" ><strong>Richiedi disponibilità</strong> </button>
          </div>
        </div>
      </div> 
    </form> 
  </div>
</div>
</div>

@push('script')
<script>
  let index = 0;   //variabile per incrementare l'ID
  let dal=document.querySelector('#dal').value
  let al=document.querySelector('#al').value
  let numberBox =document.getElementById('numberBox');
  let btnRichiesta= document.getElementById('btn-richiesta');
  let removeBox= document.querySelector('#removeBox');
  
  function duplicateDetails() {
    if(index<=4){
      index++
      let newBox = document.getElementById('newBox');
      let newB = document.createElement('div');
      newB.setAttribute("id","newBox"+index);
      newBox.appendChild(newB);
      var detailsHtml =  ` 
      <div class="row align-items-center my-2">
        <div class="col-11" id=details` + index + `>
          <div class="row shadow-gray ">
            <div class="col-12 col-md-4 mb-3">
              <label for="rental_id` + index + `" class="form-label"> Modello/ Misura/ quantità max*</label>
              <select class="form-select rounded-0"  name="rental_id` + index + `" value="{{old('rental_id` + index + `')}}" id="rental_id` + index + `" aria-label="Default select example" required>
                <option disabled selected >scegli</option>
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
            <div class="col-12 col-md-4 mb-3">
              <div class="row">
                <div class="col-12">
                  <label for="qta` + index + `" class="form-label">quantità*</label>
                  <input type="number" class="form-control rounded-0"  min="1" max=""  name="qta` + index + `" value="{{old('qta` + index + `')}}" id="qta` + index + `" required>
                  @error('qta')
                  <div class="alert alert-danger info-error">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="row">
                <div class="col-12 col-md-6">
                  <label for="vert` + index + `" class="form-label">verticali*</label>
                  <input type="number" class="form-control rounded-0"  min="0" name="vert` + index + `" value="{{old('vert` + index + `')}}" id="vert` + index + `" required>
                  @error('vert')
                  <div class="alert alert-danger info-error">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-12 col-md-6">
                  <label for="orizz` + index + `" class="form-label">orizzontali*</label>
                  <input type="number" class="form-control rounded-0"  min="0" name="orizz` + index + `" id="orizz` + index + `" required>
                  @error('orizz')
                  <div class="alert alert-danger info-error">{{ $message }}</div>
                  @enderror
                </div> 
              </div>
            </div>
            <div class="col-12 col-md-4 mb-3">
              <p><strong>Servizi aggiuntivi</strong> </p>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1"  name="montaggio` + index + `" id="montaggio` + index + `" >
                <label class="form-check-label" for="montaggio` + index + `">
                  Montaggio
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1"  name="smontaggio` + index + `" id="smontaggio` + index + `" >
                <label class="form-check-label" for="smontaggio` + index + `">
                  smontaggio
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1"  name="passepartout` + index + `" id="passepartout` + index + `" >
                <a class="p-0 m-0" data-bs-toggle="collapse" href="#collapseExample` + index + `" role="button" aria-expanded="false" aria-controls="collapseExample">
                  <label class="form-check-label" for="passepartout` + index + `">
                    passepartout
                  </label>
                </a>
              </div> 
              <div class="collapse m-0 p-1" id="collapseExample` + index + `"> 
                <div class="card card-body m-0 p-0 border-0 flex-row bg-transparent">
                  <div class="form-check col-4 d-inline-block pt-1">
                    <input class="form-check-input" type="radio" name="colorPass` + index + `" id="bianco" value="bianco">
                    <label class="form-check-label" for="bianco">
                      <div class="bg-white border border-1 border-dark d-inline-block  p-2 ms-negative"></div>
                    </label>
                  </div>
                  <div class="form-check col-4 d-inline-block pt-1">
                    <input class="form-check-input" type="radio" name="colorPass` + index + `" id="avorio" value="avorio">
                    <label class="form-check-label" for="avorio">
                      <div class="bg-avorio border border-1 border-dark d-inline-block  p-2 ms-negative" ></div>
                    </label>
                  </div>
                  <div class="form-check col-4 d-inline-block pt-1">
                    <input class="form-check-input" type="radio" name="colorPass` + index + `" id="nero" value="nero">
                    <label class="form-check-label" for="nero">
                      <div class="bg-dark border border-1 border-dark d-inline-block  p-2 ms-negative"></div>
                    </label>
                  </div>
                </div> 
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1"  name="fondo` + index + `" id="fondo` + index + `" >
                <label class="form-check-label" for="fondo` + index + `">
                  fondo
                </label>
              </div>
            </div>  
          </div>  
        </div>  
        
      </div>`
      newB.innerHTML= detailsHtml;
      numberBox.setAttribute("value", index);
      if( index>0){
        btnRichiesta.classList.remove("invisible")
        btnRichiesta.classList.add("visible")
        removeBox.classList.remove("invisible")
        removeBox.classList.add("visible")
      }
    }else{
      alert('non è possibile inserire altri box. Raggiunto il numero massimo.') 
      return 
    }
  } 
  function deleteDetails() {
    //per rimuovere solo l'ultimo box
    let element = document.getElementById("newBox"+index);
    element.remove(); 
    index--;
    numberBox.setAttribute("value", index);
    if( index<=0){
      btnRichiesta.classList.remove("visible")
      btnRichiesta.classList.add("invisible")
      removeBox.classList.remove("visible")
      removeBox.classList.add("invisible")
    }   
  } 
  let form=document.querySelector('#form')
  form.addEventListener('submit',(e)=>  {
    e.preventDefault()
    let giuste= 0;
    let totalQta= 0;
    for (let i = 1; i <=index; i++) {
      let qtaV=document.querySelector('#qta'+ i).value
      let vertV=document.querySelector('#vert'+ i).value
      let orizzV=document.querySelector('#orizz'+ i).value
      let sum = Number(vertV)+ Number(orizzV);  
      if(qtaV != sum  ){
        document.querySelector('#qta'+ i).style.borderColor = "red";
      }else {
        document.querySelector('#qta'+ i).style.borderColor = "gray";
        totalQta += parseInt(qtaV);
        giuste++;
      }
    }
    if (dal>al){
      alert('la data non va') 
      return 
    } else if (totalQta<20){
      alert('il numero inserito nelle quantità non può superare il numero di quelle disponibili del modello, la quantità deve essere uguale alla somma delle orizzontali e verticali il numero totale di cornici a noleggio non può essere inferiore a 20, ') 
      return 
    }else {
      if(giuste==index){
        form.submit()
      }
    }
  })
  
</script>
@endpush
@endsection

