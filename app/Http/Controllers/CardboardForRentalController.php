<?php

namespace App\Http\Controllers;

use App\Models\CardboardForRental;
use Illuminate\Http\Request;

class CardboardForRentalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cardboardForRentals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cardboardForRental= CardboardForRental::create([
            'pricePass'=> $request->input('pricePass'),
            'priceFondo'=> $request->input('priceFondo'),
            'cardboard_id'=> $request->input('cardboard_id'),
            'size_id' => $request->input('size_id')
        ]);
        $cardboardForRental->save();
        return redirect(route('users.revisorDashboard'))->with('message', "nuovi prezzi inseriti"); 
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CardboardForRental  $cardboardForRental
     * @return \Illuminate\Http\Response
     */
    public function show(CardboardForRental $cardboardForRental)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CardboardForRental  $cardboardForRental
     * @return \Illuminate\Http\Response
     */
    public function edit(CardboardForRental $cardboardForRental)
    {
        return view('cardboardForRentals.edit', compact('cardboardForRental'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CardboardForRental  $cardboardForRental
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CardboardForRental $cardboardForRental)
    {
        $cardboardForRental->update($request->all());
        return redirect(route('users.revisorDashboard'))->with('message', " modifica completata.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CardboardForRental  $cardboardForRental
     * @return \Illuminate\Http\Response
     */
    public function destroy(CardboardForRental $cardboardForRental)
    {
        $cardboardForRental->delete();
        return redirect()->back()->with('message', "cancellato con successo.");
    }
}
