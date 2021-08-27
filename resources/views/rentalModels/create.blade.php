@extends('layouts.app')

@section('content')
<div class="conteiner-fluid container-max p-0 mx-auto">
    <div class="row justify-content-center px-0 pt-5 m-0">
        <div class="col-12 text-center">
            <h1>Inserisci un nuovo modello per il noleggio</h1>
        </div>
    </div>
</div>


  <div class="conteiner-fluid container-max p-0 mx-auto">
    <div class="mx-2">
      <form action="{{route('rentalModels.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <section class="row pt-2 justify-content-center px-2 px-md-5">
          <div class="col-12 col-md-6 mb-3">
            <label for="name" class="form-label">Nome Modello* <small><em>(<strong>NeP2-UV</strong> = <strong>Ne</strong>ro <strong>P2-</strong>vetro anti-<strong>UV</strong> e anti-r)</em></small> </label>
            <input type="text" class="form-control rounded-0" max="30" name="name" value="{{old('name')}}" id="name" required>
            @error('name')
            <div class="alert alert-danger info-error">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-12 col-md-3 mb-3">
          <label for="photo_id" class="form-label">Foto</label>
          <select class="form-select rounded-0"  name="photo_id" value="{{old('photo_id')}}" id="photo_id" aria-label="Default select example">
              <option disabled selected>scegli</option>
              @foreach ($photos as $photo)
              <option value="{{ $photo->id }}">
               {{ $photo->frame->profilo }}, {{ $photo->color->name }}
              </option>
              @endforeach
          </select>
          @error('photo_id')
          <div class="alert alert-danger info-error">{{ $message }}</div>
          @enderror
      </div>
 <div class="col-12 col-md-3 mb-3">
            <label for="status" class="form-label">status*</label>
            <select class="form-select rounded-0"  name="status" value="{{old('status')}}" id="status" aria-label="Default select example" required>
              <option disabled selected>valore</option>
              <option value="1">visibile</option>
              <option value="0">invisibile</option>
            </select>
            @error('status')
            <div class="alert alert-danger info-error">{{ $message }}</div>
            @enderror
          </div>
            <div class="col-12 col-md-4 mb-3">
                <label for="frame_id" class="form-label">Cornice*</label>
                <select class="form-select rounded-0"  name="frame_id" value="{{old('frame_id')}}" id="frame_id" aria-label="Default select example" required>
                    <option disabled selected>scegli</option>
                    @foreach ($frames as $frame)
                    <option value="{{ $frame->id }}">
                      {{ $frame->profilo }}
                    </option>
                    @endforeach
                </select>
                @error('frame_id')
                <div class="alert alert-danger info-error">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="col-12 col-md-4 mb-3">
                <label for="color_id" class="form-label">Colore*</label>
                <select class="form-select rounded-0"  name="color_id" value="{{old('color_id')}}" id="color_id" aria-label="Default select example" required>
                    <option disabled selected>scegli</option>
                    @foreach ($colors as $color)
                    <option value="{{ $color->id }}">
                      {{ $color->name }}
                    </option>
                    @endforeach
                </select>
                @error('color_id')
                <div class="alert alert-danger info-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12 col-md-4 mb-3">
                <label for="glass_id" class="form-label">Vetro*</label>
                <select class="form-select rounded-0"  name="glass_id" value="{{old('glass_id')}}" id="glass_id" aria-label="Default select example" required>
                    <option disabled selected>scegli</option>
                    @foreach ($glasses as $glass)
                    <option value="{{ $glass->id }}">
                      {{ $glass->name }}
                    </option>
                    @endforeach
                </select>
                @error('glass_id')
                <div class="alert alert-danger info-error">{{ $message }}</div>
                @enderror
            </div>
            
            
        
         <p class="small text-end">*campi obbligatori</p>
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

