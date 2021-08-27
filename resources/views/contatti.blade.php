@extends('layouts.app')

@section('content')
<div class="conteiner-fluid container-max p-0 mx-auto">
  <div class="row justify-content-center px-0 pt-5 m-0">
    <div class="col-12 text-center">
      <h1>Contattaci</h1>
      
    </div>
  </div>
</div>
<div class="container">
 
  <div class="row justify-content-center m-0">
    <div class=" col-12 col-md-6 p-2 p-lg-4 ">
      <div class="row py-4 mb-3 mb-md-5 mx-0 justify-content-center bg-dark">
        <x-social />
         </div>
      <form method="POST" action="{{ route('contact.send') }}" class="border border-3 border-danger shadow-gray m-0" enctype="multipart/form-data">
        @csrf
        <div class="row m-0 p-2 p-md-4"> 
          <div class="col-12">
            <div class="form-group mb-3">
              <label for="name" class="form-label">Nome</label>
              <input name="name" type="text" class="form-control rounded-0" id="nome" value="{{old ('name')}}">
              @error('name')
              <div class="alert alert-danger info-error">
                {{$message}}
              </div>   
              @enderror
            
            <div class=" form-group mb-3">
              <label for="exampleInputEmail1" class="form-label">Email </label>
              <input name="email" type="email" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old ('email')}}">
              @error('email')
              <div class="alert alert-danger info-error">{{$message}}</div>   
              @enderror
            </div>
          </div>
        </div>
        
        
        
        <div class=" form-group px-2">
          <label class="form-label py-3" for="message">Messaggio</label>   
          <span>
            <label for="allegato" class="form-label d-none">immagine allega</label>
            <input type="file" id="allegato" name="allegato" class="d-none">
            <button class="p-0 m-0 border-0" onclick="document.getElementById('allegato').click()">
              <img src="./media/icona-allegato.png" width="40px" alt="allegato" >
            </button>
          </span>
          
          <textarea name="message" type="textarea" class="form-control rounded-0" id="message" cols="40" rows="5">{{old ('message')}}</textarea>
          @error('message')
          <div class="alert alert-danger info-error">{{$message}}</div>   
          @enderror
        </div>
        <div class=" form-group px-2 ">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" required>
          <label class="form-check-label" for="flexCheckChecked">
            <p class="small py-1"> Acconsento al trattamento dei dati personali</p>
          </label>
        </div>
        <div class="col-12 text-center py-3 pb-md-1">
          <button type="submit" class="btn border rounded-0 shadow-dark shadow-h-none text-uppercase">Invia</button>
        </div>
      </form>
    </div>
    
  </div>
</div>
@endsection


