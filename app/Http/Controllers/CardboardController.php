<?php

namespace App\Http\Controllers;

use App\Models\Cardboard;
use Illuminate\Http\Request;
use App\Http\Requests\CardboardRequest;
use Illuminate\Support\Facades\Storage;

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
        return view('cardboards.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CardboardRequest $request)
    {
        $img = $request->file('img');
        
        if($img == null){
            $cardboard= Cardboard::create([
                'nome'=> $request->input('nome'),
                'caratteristiche'=> $request->input('caratteristiche'),
                'spessore'=> $request->input('spessore'),
                'misuraFoglio'=> $request->input('misuraFoglio'),
                'colori' => $request->input('colori'),
                'superficie'=> $request->input('superficie'),
                'status' => $request->input('status')
            ]);                
        }else{     
            $cardboard= Cardboard::create([
                'nome'=> $request->input('nome'),
                'caratteristiche'=> $request->input('caratteristiche'),
                'spessore'=> $request->input('spessore'),
                'misuraFoglio'=> $request->input('misuraFoglio'),
                'colori' => $request->input('colori'),
                'superficie'=> $request->input('superficie'),
                'status' => $request->input('status')
            ]);
            $cardboard->img = $request->file('img')->store("public/cardboard/$cardboard->id"); 
            $cardboard->save();
        }
        return redirect(route('users.revisorDashboard'))->with('message', "Il nuovo passepartout è stato inserito correttamente."); 
    }

    public function status(Cardboard $cardboard){
        $cardboard->status  = !$cardboard->status;
        $cardboard->save();
        return redirect()->back();   
        
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
        return view('cardboards.edit', compact('cardboard'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cardboard  $cardboard
     * @return \Illuminate\Http\Response
     */
    public function update(CardboardRequest $request, Cardboard $cardboard)
    {
        $cardboard->update($request->all());
        
        $img = $request->file('img');
        
        
        if($img !=null){
            Storage::delete($cardboard->img);
            $cardboard->img = $request->file('img')->store("public/cardboard/$cardboard->id"); 
            $cardboard->save();                    
        }
        
        return redirect(route('passepartout'))->with('message', "Il passepartout $cardboard->nome è stato modificato correttamente.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cardboard  $cardboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cardboard $cardboard)
    {
        if($cardboard->img !=null){
            Storage::deleteDirectory("public/cardboard/$cardboard->id");  
        }
        
        $cardboard->delete();
        return redirect()->back()->with('message', "Il passepartout $cardboard->nome è stato cancellato con successo.");
    }
}
