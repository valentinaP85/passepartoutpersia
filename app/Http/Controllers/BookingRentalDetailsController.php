<?php

namespace App\Http\Controllers;

use App\Models\BookingRentalDetail;
use Illuminate\Http\Request;

class BookingRentalDetailController extends Controller
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
    // public function store(Request $request)
    // {
    //      $BookingRentalDetails= BookingRentalDetail::create([
    //         'bookingRental_id'=> $request->input('bookingRental_id'),
    //         'qta'=> $request->input('qta'),
    //         'rental_id'=> $request->input('rental_id'),
    //         'montaggio'=> $request->input('montaggio'),
    //         'smontaggio' => $request->input('smontaggio'),
    //         'passepartout' => $request->input('passepartout'),
    //         'colorPass'=> $request->input('colorPass'),
    //         'fondo' => $request->input('fondo'),
    //         'vert' => $request->input('vert'),
    //         'orizz' => $request->input('orizz')
    //     ]);
    //     $BookingRentalDetails->save();
    //     //return redirect(route('prenotazione-noleggio'));
    // }
    
    
    
    
    /**
    * Display the specified resource.
    *
    * @param  \App\Models\BookingRentalDetail  $BookingRentalDetail
    * @return \Illuminate\Http\Response
    */
    public function show(BookingRentalDetail $BookingRentalDetail)
    {
        //
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\BookingRentalDetail  $BookingRentalDetail
    * @return \Illuminate\Http\Response
    */
    public function edit(BookingRentalDetail $BookingRentalDetail)
    {
        //
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\BookingRentalDetail  $BookingRentalDetail
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, BookingRentalDetail $BookingRentalDetail)
    {
        //
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\BookingRentalDetail  $BookingRentalDetail
    * @return \Illuminate\Http\Response
    */
    public function destroy(BookingRentalDetail $BookingRentalDetail)
    {
        $BookingRentalDetail->delete();
        return redirect()->back();
    }
}
