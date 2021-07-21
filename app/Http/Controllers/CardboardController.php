<?php

namespace App\Http\Controllers;

use App\Models\Cardboard;
use Illuminate\Http\Request;

class CardboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('passepartout');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cardboard  $cardboard
     * @return \Illuminate\Http\Response
     */
    public function show(Cardboard $cardboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cardboard  $cardboard
     * @return \Illuminate\Http\Response
     */
    public function edit(Cardboard $cardboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cardboard  $cardboard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cardboard $cardboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cardboard  $cardboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cardboard $cardboard)
    {
        //
    }
}
