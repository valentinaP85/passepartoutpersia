<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Rental;
use Illuminate\Http\Request;
use App\Models\BookingRental;
use App\Models\BookingRentalDetail;
use App\Http\Requests\RentalRequest;
use Illuminate\Support\Facades\Date;
use App\Http\Requests\RichiestaNoleggioRequest;

class RentalController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('noleggio');
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('rentals.create');
    }
    public function viewBooking()
    {
        return view('prenotazione-noleggio');
    }
    public function richiesteP()
    {
        return view('richieste.richiesteP');
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(RentalRequest $request)
    {
        
        $rental= Rental::create([
            
            'rentalModel_id' => $request->input('rentalModel_id'),
            'size_id' => $request->input('size_id'),
            'valueFrame' => $request->input('valueFrame'),
            'rentalPrice'=> $request->input('rentalPrice'),
            'qta'=> $request->input('qta'),
            'status' => $request->input('status'),
        ]);
        $rental->save();
        
        return redirect(route('users.revisorDashboard'))->with('message', "La nuova cornice a noleggio è stata inserita correttamente."); 
    }
    
    public function bookingRental (RichiestaNoleggioRequest $request)
    {
        $data= strtotime("now");
        $final = date("Y-m-d", strtotime("+1 month", $data));
        
        
        if($request->input('dal')<$request->input('al') && $request->input('dal')>=$final){
            $bookingRental= BookingRental::create([
                'name' => $request->input('name'),
                'surname' => $request->input('surname'),
                'provincia'=> $request->input('provincia'),
                'cap' => $request->input('cap'),
                'email'=> $request->input('email'),
                'telefono'=> $request->input('telefono'),
                'trasporto' => $request->input('trasporto'),
                'message' => $request->input('message'),
                'dal' => $request->input('dal'),
                'al'=> $request->input('al')
            ]);
            
            $numberBox= $request->input('numberBox'); 
            for ($i=1; $i <=intval($numberBox) ; $i++) { 
                $bookingRentalDetails= BookingRentalDetail::create([
                    'bookingRental_id'=> count(BookingRental::all()),
                    'qta'=> $request->input('qta'.$i),
                    'rental_id'=> $request->input('rental_id'.$i),
                    'montaggio'=> $request->input('montaggio'.$i),
                    'smontaggio' => $request->input('smontaggio'.$i),
                    'passepartout' => $request->input('passepartout'.$i),
                    'colorPass'=> $request->input('colorPass'.$i),
                    'fondo' => $request->input('fondo'.$i),
                    'vert' => $request->input('vert'.$i),
                    'orizz' => $request->input('orizz'.$i)
                ]);
                $bookingRentalDetails->save();
            }  
            $bookingRental->save();
            
            return redirect(route('noleggio'))->with('message', "la tua richiesta è stata inoltrata.");  
        }
        else{
            return redirect()->back()->with('message', "controlla le date inserite e ricorda che è possibile prenotare solo con almeno un mese di anticipo!");  
        }
        
    }
    
    
    public function status(Rental $rental){
        $rental->status  = !$rental->status;
        $rental->save();
        return redirect()->back();   
        
    }
    
    /**
    * Display the specified resource.
    *
    * @param  \App\Models\BookingRental  $bookingRental
    * @return \Illuminate\Http\Response
    */
    public function noleggiShow( BookingRental $bookingRental)
    {
        return view('richieste.noleggiShow', compact('bookingRental'));
        
    }
    
    
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Rental  $rental
    * @return \Illuminate\Http\Response
    */
    public function edit(Rental $rental)
    {
        return view('rentals.edit', compact('rental'));
    }
    
    public function editP(BookingRental $bookingRental)
    {
        
        return view('bookingRentals.edit', compact('bookingRental'));
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Rental  $rental
    * @return \Illuminate\Http\Response
    */
    public function update(RentalRequest $request, Rental $rental)
    {
        $rental->update($request->all());
        
        return redirect(route('noleggio'))->with('message', "La cornice a noleggio è stato modificato correttamente.");
    }
    
    //funzione per incrementare il numero di cornici a noleggio di un determinato modello, senza modificare gli altri valori.
    public function increment(Request $request, Rental $rental)
    {
        $rental->qta += $request->qta;
        $rental->save();
        
        return redirect(route('users.revisorDashboard'))->with('message', "Hai modificato il numero di cornici disponibili");
    }
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Rental  $rental
    * @return \Illuminate\Http\Response
    */
    public function destroy(Rental $rental)
    {
        $rental->delete();
        return redirect()->back()->with('message', "La cornice è stata cancellata con successo.");
    }
}
