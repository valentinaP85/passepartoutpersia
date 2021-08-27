@extends('layouts.app')

@section('content')
<div class="conteiner-fluid container-max p-0 mx-auto">
    <div class="row justify-content-center px-0 pt-5 m-0">
        <div class="col-12 text-center">
            <h1>Modifica la Cornice a noleggio</h1>
        </div>
    </div>
</div>


  <div class="conteiner-fluid container-max p-0 mx-auto">
    <div class="mx-2">
      <form action="{{route('rentals.update', $rental)}}" method="post" enctype="multipart/form-data">
        @csrf
        <section class="row pt-2 justify-content-center">
            <div class="col-12 col-md-2 mb-3">
                <label for="size_id" class="form-label">Misura*</label>
                <select class="form-select rounded-0"  name="size_id" value="{{$rental->size_id}}" id="size_id" aria-label="Default select example" required>
                    <option selected value="{{$rental->size_id}}">{{$rental->size_id}}</option>
                    @foreach ($sizes as $size)
                    <option value="{{ $size->id }}">
                      {{ $size->name }}
                    </option>
                    @endforeach
                </select>
                @error('size_id')
                <div class="alert alert-danger info-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12 col-md-2 mb-3">
                <label for="rentalModel_id" class="form-label">Modello*</label>
                <select class="form-select rounded-0"  name="rentalModel_id" value="{{$rental->rentalModel_id}}" id="rentalModel_id" aria-label="Default select example" required>
                    <option selected {{$rental->rentalModel_id}}>{{$rental->rentalModel_id}}</option>
                    @foreach ($rental_models as $rentalModel)
                    <option value="{{ $rentalModel->id }}">
                      {{ $rentalModel->name }}
                    </option>
                    @endforeach
                </select>
                @error('rentalModel_id')
                <div class="alert alert-danger info-error">{{ $message }}</div>
                @enderror
            </div>
           
            <div class="col-12 col-md-2 mb-3">
                <label for="rentalPrice" class="form-label">Prezzo noleggio</label>
                <input type="number" step="0.01" class="form-control rounded-0" max="30" name="rentalPrice" value="{{$rental->rentalPrice}}" id="rentalPrice" required>
                @error('rentalPrice')
                <div class="alert alert-danger info-error">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-12 col-md-2 mb-3">
                <label for="valueFrame" class="form-label">Prezzo di vendita</label>
                <input type="number" step="0.01"  class="form-control rounded-0" max="100" name="valueFrame" value="{{$rental->valueFrame}}" id="valueFrame" required>
                @error('valueFrame')
                <div class="alert alert-danger info-error">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-12 col-md-2 mb-3">
                <label for="qta" class="form-label">Quantità</label>
                <input type="number" class="form-control rounded-0" max="500" name="qta" value="{{$rental->qta}}" id="qta" required>
                @error('qta')
                <div class="alert alert-danger info-error">{{ $message }}</div>
                @enderror
              </div>
        
          <div class="col-12 col-md-2 mb-3">
            <label for="status" class="form-label">status</label>
            <select class="form-select rounded-0"  name="status"  id="status" aria-label="Default select example" required>
              <option value="{{$rental->status}}" selected>{{$rental->status}}</option>
              <option value="1">visibile</option>
              <option value="0">invisibile</option>
            </select>
            @error('status')
            <div class="alert alert-danger info-error">{{ $message }}</div>
            @enderror
          </div>
        </section> 
        <div class="row px-lg-5 justify-content-center">
          <div class="col-12 col-md-6 text-center py-3">
          <button type="submit" class="btn border border-accent rounded-0 btn-width text-text shadow-dark shadow-h-none bg-h-accent text-h-main text-uppercase">Modifica</button>
          </div>
        </div>
      </form>
    </div>
  </div>    
  
  
@endsection

