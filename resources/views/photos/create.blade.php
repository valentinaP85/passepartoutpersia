@extends('layouts.app')

@section('content')
<div class="conteiner-fluid container-max p-0 mx-auto">
    <div class="row justify-content-center px-0 pt-5 m-0">
        <div class="col-12 text-center">
            <h1>Inserisci la Foto di una cornice </h1>
        </div>
    </div>
</div>


  <div class="conteiner-fluid container-max p-0 mx-auto">
    <div class="mx-2">
      <form action="{{route('photos.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <section class="row pt-2 justify-content-center">
         <div class="col-12 col-md-2 mb-3">
            <label for="frame_id" class="form-label">Cornice</label>
            <select class="form-select rounded-0"  name="frame_id" value="{{old('frame_id')}}" id="frame_id" aria-label="Default select example" required>
              <option disabled selected>valore</option>
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
          <div class="col-12 col-md-2 mb-3">
            <label for="color_id" class="form-label">Colore</label>
            <select class="form-select rounded-0"  name="color_id" value="{{old('color_id')}}" id="color_id" aria-label="Default select example" required>
              <option disabled selected>valore</option>
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
          <div class="col-12 col-md-3">
            <label for="img" class="form-label">Foto</label>
            <input class="form-control rounded-0" name="img" value="{{old('img')}}" type="file" id="img" required>
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
