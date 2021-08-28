<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Rental;
use Illuminate\Http\Request;
use App\Models\BookingRental;
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
    public function richiesteNoleggi()
    {
        return view('richieste.noleggi');
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
                'nameSurname' => $request->input('nameSurname'),
                'cap' => $request->input('cap'),
                'email'=> $request->input('email'),
                'telefono'=> $request->input('telefono'),
                'trasporto' => $request->input('trasporto'),
                'message' => $request->input('message'),
                'dal' => $request->input('dal'),
                'al'=> $request->input('al'),

                'qta'=> $request->input('qta'),
                'rental_id'=> $request->input('rental_id'),
                'montaggio'=> $request->input('montaggio'),
                'smontaggio' => $request->input('smontaggio'),
                'passepartout' => $request->input('passepartout'),
                'colorPass'=> $request->input('colorPass'),
                'fondo' => $request->input('fondo'),
                'vert' => $request->input('vert'),
                'orizz' => $request->input('orizz'),
                
            ]);

            // $nameSurname =$request->input('nameSurname');
            // $cap = $request->input('cap');
            // foreach ($request->all() as $key => $value) {
            //     if()
            // }

            $bookingRental->save();
        
        // return redirect(route('noleggio'))->with('message', "la tua richiesta è stata inoltrata.");  
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
