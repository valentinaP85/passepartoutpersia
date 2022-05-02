<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use Illuminate\Http\Request;

class QuotationController extends Controller
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
        $quotation= Quotation::create([
                
            'bookingRental_id' => $request->input('bookingRental_id'),
            'prezzoTrasporti' => $request->input('prezzoTrasporti'),
            'approvato' => $request->input('approvato'),
            'totale'=> $request->input('totale'),
            'informazioni'=> $request->input('informazioni'),
            'nomeSocieta'=> $request->input('nomeSocieta'),
            'viaCivico' => $request->input('viaCivico'),
            'codiceUnivoco'=> $request->input('codiceUnivoco'),
            'pec' => $request->input('pec'),
        ]);
        $quotation->save();
    
    return redirect(route('users.revisorDashboard'))->with('message', "La nuova cornice a noleggio è stata inserita correttamente."); 

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function show(Quotation $quotation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function edit(Quotation $quotation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quotation $quotation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quotation $quotation)
    {
        //
    }
}
