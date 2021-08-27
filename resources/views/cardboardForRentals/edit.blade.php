@extends('layouts.app')

@section('content')
<div class="conteiner-fluid container-max p-0 mx-auto">
    <div class="row justify-content-center px-0 pt-5 m-0">
        <div class="col-12 text-center">
            <h1>Modifica il passepartout per il noleggio</h1>
        </div>
    </div>
</div>


  <div class="conteiner-fluid container-max p-0 mx-auto">
    <div class="mx-2">
      <form action="{{route('cardboardForRentals.update' , $cardboardForRental)}}" method="post" enctype="multipart/form-data">
        @csrf
        <section class="row pt-2 justify-content-center">
          <div class="col-12 col-md-2 mb-3">
            <label for="cardboard_id" class="form-label">cardboard_id</label>
                <select class="form-select rounded-0"  name="cardboard_id" id="cardboard_id" aria-label="Default select example" required>
                    <option  value="{{$cardboardForRental->cardboard_id}}"  selected>{{$cardboardForRental->cardboard_id}}</option>
                    @foreach ($cardboards as $cardboard)
                    <option value="{{ $cardboard->id}}">
                      {{ $cardboard->nome }}
                    </option>
                    @endforeach
                </select>
            @error('cardboard_id')
            <div class="alert alert-danger info-error">{{ $message }}</div>
            @enderror
          </div>
         
          <div class="col-12 col-md-3 mb-3">
            <label for="size_id" class="form-label">Misura*</label>
            <select class="form-select rounded-0"  name="size_id"  id="size_id" aria-label="Default select example" required>
                <option value="{{$cardboardForRental->size_id}}" selected>{{$cardboardForRental->size_id}}</option>
                @foreach ($sizes as $size)
                <option value="{{ $size->id}}">
                  {{ $size->name }}
                </option>
                @endforeach
            </select>
            @error('size_id')
            <div class="alert alert-danger info-error">{{ $message }}</div>
            @enderror
          </div>
           <div class="col-12 col-md-2 mb-3">
            <label for="pricePass" class="form-label">pricePass</label>
            <input type="number" step="0.01" class="form-control rounded-0" max="30" name="pricePass" value="{{$cardboardForRental->pricePass}}" id="pricePass" required>
            @error('pricePass')
            <div class="alert alert-danger info-error">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-12 col-md-2 mb-3">
            <label for="priceFondo" class="form-label">priceFondo</label>
            <input type="number" step="0.01" class="form-control rounded-0" max="30" name="priceFondo" value="{{$cardboardForRental->priceFondo}}" id="priceFondo" required>
            @error('priceFondo')
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

