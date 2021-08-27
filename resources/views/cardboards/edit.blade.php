@extends('layouts.app')

@section('content')
<div class="conteiner-fluid container-max p-0 mx-auto">
    <div class="row justify-content-center px-0 pt-5 m-0">
        <div class="col-12 text-center">
            <h1>Modifica il passepartout</h1>
        </div>
    </div>
</div>


  <div class="conteiner-fluid container-max p-0 mx-auto">
    <div class="mx-2">
      <form action="{{route('cardboards.update', $cardboard )}}" method="post" enctype="multipart/form-data">
        @csrf
        <section class="row pt-2 justify-content-center">
          <div class="col-12 col-md-2 mb-3">
            <label for="nome" class="form-label">nome</label>
            <input type="text" class="form-control rounded-0" name="nome" value="{{$cardboard->nome}}" id="nome" required>
            @error('nome')
            <div class="alert alert-danger info-error">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-12 col-md-2 mb-3">
            <label for="misuraFoglio" class="form-label">misuraFoglio</label>
            <input type="text" class="form-control rounded-0" max="30" name="misuraFoglio" value="{{$cardboard->misuraFoglio}}" id="misuraFoglio" required>
            @error('misuraFoglio')
            <div class="alert alert-danger info-error">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-12 col-md-2 mb-3">
            <label for="spessore" class="form-label">spessore</label>
            <input type="text" class="form-control rounded-0" max="30" name="spessore" value="{{$cardboard->spessore}}" id="spessore" required>
            @error('spessore')
            <div class="alert alert-danger info-error">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-12 col-md-3 mb-3">
            <label for="superficie" class="form-label">superficie</label>
            <input type="text" class="form-control rounded-0" max="30" name="superficie" value="{{$cardboard->superficie}}" id="superficie" required>
            @error('superficie')
            <div class="alert alert-danger info-error">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-12 col-md-3 mb-3">
            <label for="colori" class="form-label">colori disponibili</label>
            <input type="text" class="form-control rounded-0" max="30" name="colori" value="{{$cardboard->colori}}" id="colori" required>
            @error('colori')
            <div class="alert alert-danger info-error">{{ $message }}</div>
            @enderror
          </div>       
        
          <div class="col-12 col-md-3 mb-3">
            <label for="status" class="form-label">status</label>
            <select class="form-select rounded-0"  name="status" value="" id="status" aria-label="Default select example" required>
              <option selected>{{$cardboard->status}}</option>
              <option value="1">visibile</option>
              <option value="0">invisibile</option>
            </select>
            @error('status')
            <div class="alert alert-danger info-error">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-12 col-md-3">
            <label for="img" class="form-label">Foto </label>
            <input class="form-control rounded-0" name="img" value="{{$cardboard->img}}" type="file" id="img">
          </div>
          
          
         
          <div class="col-12 col-md-6 mb-3">
            <label for="caratteristiche" class="form-label">caratteristiche</label>
            <textarea class="form-control rounded-0" id="caratteristiche" name="caratteristiche" rows="2" required>{{$cardboard->caratteristiche}}</textarea>
            @error('caratteristiche')
            <div class="alert alert-danger info-error">{{ $message }}</div>
            @enderror
          </div>
          
        </section> 
        <div class="row px-lg-5 justify-content-center">
          <div class="col-12 col-md-6 text-center py-3">
          <button type="submit" class="btn border border-accent rounded-0 btn-width text-text shadow-dark shadow-h-none bg-h-accent text-h-main text-uppercase">Carica</button>
          </div>
        </div>
      </form>
    </div>
  </div>    
  
  
@endsection

