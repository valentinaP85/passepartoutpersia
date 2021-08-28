<?php

namespace App\Http\Controllers;

use App\Models\OtherRental;
use Illuminate\Http\Request;

class OtherRentalController extends Controller
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
        //
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
         $otherRental= OtherRental::create([
            'bookingRental_id'=> $request->input('bookingRental_id'),
            'qta'=> $request->input('qta'),
            'rental_id'=> $request->input('rental_id'),
            'montaggio'=> $request->input('montaggio'),
            'smontaggio' => $request->input('smontaggio'),
            'passepartout' => $request->input('passepartout'),
            'colorPass'=> $request->input('colorPass'),
            'fondo' => $request->input('fondo'),
            'vert' => $request->input('vert'),
            'orizz' => $request->input('orizz')
        ]);
        $otherRental->save();
        // return with('message', "aggiunta richiesta");  
    }
    
    
    
    
    /**
    * Display the specified resource.
    *
    * @param  \App\Models\OtherRental  $otherRental
    * @return \Illuminate\Http\Response
    */
    public function show(OtherRental $otherRental)
    {
        //
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\OtherRental  $otherRental
    * @return \Illuminate\Http\Response
    */
    public function edit(OtherRental $otherRental)
    {
        //
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\OtherRental  $otherRental
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, OtherRental $otherRental)
    {
        //
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\OtherRental  $otherRental
    * @return \Illuminate\Http\Response
    */
    public function destroy(OtherRental $otherRental)
    {
        $otherRental->delete();
        return redirect()->back();
    }
}
