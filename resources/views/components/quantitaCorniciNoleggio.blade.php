@props(['size' ])

<div class="px-3 px-md-5 pt-2 mx-0  my-2 border border-3 border-danger shadow-gray">

<h3 > <strong>QUANTITA' POSSIBILI* </strong></h3>
<div class="table-responsive px-2">


<table  class="table text-center px-2" >
    <thead>
        
      <tr class="align-items-top">
          
          <td scope="col" ></td>
        @foreach ($rentals as $rental) 
        <td scope="col" id="{{$rental->rentalModel_id}}" >{{$rental->rentalModel_id}}</td>
        @endforeach
    </tr>   
    
    </thead>
    <tbody>
    
        <tr  >
            <td scope="row" id="30x40">30x40</td>
            @foreach ($rental_models as $rentalModel)
            
                @if ($rental->size_id == $size)
                <td>{{$rental->qta}}</td> 
                @else
                    
               
                <td>/</td> 
               @endif
               
            @endforeach
            
            
           
             
        </tr>
            <tr >
                <td scope="row">40x50</td>
                <td>10</td>
                <td>30</td>
                <td>35</td>
               
            </tr>
            <tr  >
                <td scope="row">40x60</td>
                <td>/</td>
                <td>60</td>
                <td>/</td>
                
            </tr>
            <tr >
                <td scope="row">50x60</td>
                <td>80</td>
                <td>/</td>
                <td>50</td>
                
            </tr>
            <tr  >
                <td scope="row">50x70</td>
                <td>/</td>
                <td>10</td>
                <td>25</td>
                
            </tr>
            <tr  >
                <td scope="row">60x60</td>
                <td>5</td>
                <td>/</td>
                <td>/</td>
                
            </tr>
            
       </tbody> 


   {{-- <tbody>
    
    <tr  >
        <td scope="row">30x40</td>
        <td>/</td>
        <td>40</td>
        <td class="px-5"> 80 </td>
        <td>/</td>
        <td>/</td>  </tr>
        <tr >
            <td scope="row">40x50</td>
            <td>10</td>
            <td>30</td>
            <td>35</td>
            <td>40</td>
            <td>60</td>
        </tr>
        <tr  >
            <td scope="row">40x60</td>
            <td>/</td>
            <td>60</td>
            <td>/</td>
            <td>/</td>
            <td>/</td>
        </tr>
        <tr >
            <td scope="row">50x60</td>
            <td>80</td>
            <td>/</td>
            <td>50</td>
            <td>/</td>
            <td>/</td>
        </tr>
        <tr  >
            <td scope="row">50x70</td>
            <td>/</td>
            <td>10</td>
            <td>25</td>
            <td>70</td>
            <td>50</td>
        </tr>
        <tr  >
            <td scope="row">60x60</td>
            <td>5</td>
            <td>/</td>
            <td>/</td>
            <td>/</td>
            <td>/</td>
        </tr>
        
   </tbody>    --}}
    </table>

</div>
    <div >
        <p>
            *le quantità variano in base al periodo e alle altre prenotazioni.
        </p>
    </div>
</div>

</div>
