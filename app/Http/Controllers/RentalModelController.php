<?php

namespace App\Http\Controllers;

use App\Models\RentalModel;
use Illuminate\Http\Request;
use App\Http\Requests\ModelRequest;

class RentalModelController extends Controller
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
        return view('rentalModels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModelRequest $request)
    {
        $rentalModel= RentalModel::create([
            'name'=> $request->input('name'),
            'frame_id'=> $request->input('frame_id'),    
            'color_id' => $request->input('color_id'),
            'glass_id' => $request->input('glass_id'),
            'photo_id' => $request->input('photo_id'),
            'status' => $request->input('status'),
        ]);
        $rentalModel->save();
    
    return redirect(route('users.revisorDashboard'))->with('message', "é stato creato un nuovo modello per il noleggio"); 
    }


    public function status(RentalModel $rentalModel){
        $rentalModel->status  = !$rentalModel->status;
        $rentalModel->save();
        return redirect()->back();   
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RentalModel  $rentalModel
     * @return \Illuminate\Http\Response
     */
    public function show(RentalModel $rentalModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RentalModel  $rentalModel
     * @return \Illuminate\Http\Response
     */
    public function edit(RentalModel $rentalModel)
    {
        return view('rentalModels.edit', compact('rentalModel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RentalModel  $rentalModel
     * @return \Illuminate\Http\Response
     */
    public function update(ModelRequest $request, RentalModel $rentalModel)
    {
        $rentalModel->update($request->all());
        
        return redirect(route('users.revisorDashboard'))->with('message', "Hai modificato il modello a noleggio");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RentalModel  $rentalModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(RentalModel $rentalModel)
    {
        $rentalModel->delete();
        return redirect()->back()->with('message', "Il modello è stato cancellato con successo.");
    }
}
