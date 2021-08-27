@extends('layouts.app')

@section('content')
<div class="conteiner-fluid container-max p-0 mx-auto">
    <div class="row justify-content-center px-0 pt-5 m-0">
        <div class="col-12 text-center">
            <h1>Modifica la cornice {{$frame->profilo}}</h1>
        </div>
    </div>
</div>


  <div class="conteiner-fluid container-max p-0 mx-auto">
    <div class="mx-2">
      <form action="{{route('frames.update', $frame) }}" method="post" enctype="multipart/form-data">
        @csrf
        <section class="row pt-2 justify-content-center">
          <div class="col-12 col-md-2 mb-3">
            <label for="profilo" class="form-label">Profilo</label>
            <input type="text" class="form-control rounded-0" min="2" name="profilo" value="{{$frame->profilo}}" id="profilo" required>
            @error('profilo')
            <div class="alert alert-danger info-error">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-12 col-md-2 mb-3">
            <label for="misuraFronte" class="form-label">misuraFronte</label>
            <input type="text" class="form-control rounded-0" max="5" name="misuraFronte" value="{{$frame->misuraFronte}}" id="misuraFronte" required>
            @error('misuraFronte')
            <div class="alert alert-danger info-error">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-12 col-md-2 mb-3">
            <label for="profondita" class="form-label">profondità</label>
            <input type="text" class="form-control rounded-0" max="5" name="profondita" value="{{$frame->profondita}}" id="profondita" required>
            @error('profondita')
            <div class="alert alert-danger info-error">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-12 col-md-4 mb-3">
            <label for="essenze" class="form-label">essenze disponibili</label>
            <input type="text" class="form-control rounded-0" max="30" name="essenze" value="{{$frame->essenze}}" id="essenze" required>
            @error('essenze')
            <div class="alert alert-danger info-error">{{ $message }}</div>
            @enderror
          </div>
                  
          <div class="col-12 col-md-2 mb-3">
            <label for="status" class="form-label">status</label>
            <select class="form-select rounded-0" min="1"  name="status" id="status" aria-label="Default select example" required>
              <option selected value="{{$frame->status}}">{{$frame->status}}</option>
              <option value="1">visibile</option>
              <option value="0">invisibile</option>
            </select>
            @error('status')
            <div class="alert alert-danger info-error">{{ $message }}</div>
            @enderror
          </div>
         
          <div class="col-12 col-md-4">
            <label for="imgProfilo" class="form-label">disegno profilo</label>
            <input class="form-control rounded-0" name="imgProfilo" value="{{$frame->imgProfilo}}" type="file" id="imgProfilo">
          </div>
          
         
          <div class="col-12  col-md-8 mb-3">
            <label for="descrizione" class="form-label">Descrizione</label>
            <textarea class="form-control rounded-0" id="descrizione" name="descrizione" rows="2" required>{{$frame->descrizione}}</textarea>
            @error('descrizione')
            <div class="alert alert-danger info-error">{{ $message }}</div>
            @enderror
          </div>
          
        </section> 
        <div class="row px-lg-5 justify-content-center">
          <div class="col-12 col-md-6 text-center py-3">
          <button type="submit" class="btn border border-accent rounded-0 btn-width text-text shadow-dark shadow-h-none bg-h-accent text-h-main text-uppercase">Applica le modifiche</button>
          </div>
        </div>
      </form>
    </div>
  </div>    
  
  
@endsection

