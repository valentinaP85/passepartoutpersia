<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\FrameDetail;
use Illuminate\Http\Request;
use App\Models\CardboardDetail;
use App\Http\Requests\RichiestaAcquistoRequest;

class QuoteController extends Controller
{
    public function richiestaPreventivo (Request $request) 
    // preventivoRequest da definire
    {
        $quote= Quote::create([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'provincia'=> $request->input('provincia'),
            'cap' => $request->input('cap'),
            'email'=> $request->input('email'),
            'telefono'=> $request->input('telefono'),
            'message' => $request->input('message')
        ]);
        $numberPass= $request->input('numberPass'); 
        for ($i=1; $i <=intval($numberPass) ; $i++) { 
            $cardboardDetails= CardboardDetail::create([
                'quote_id'=> count(Quote::all()),
                'cardboard_id'=> $request->input('cardboard_id'.$i),
                'nCardboard'=> $request->input('nCardboard'.$i),
                'cardboardColor'=> $request->input('cardboardColor'.$i),
                'misuraE'=> $request->input('misuraE'.$i),
                'misuraI' => $request->input('misuraI'.$i),
                'fondo' => $request->input('fondo'.$i),
            ]);
            $cardboardDetails->save();
        }  
        $numberCorn= $request->input('numberCorn'); 
        for ($i=1; $i <=intval($numberCorn) ; $i++) { 
            $frameDetails= FrameDetail::create([
                'quote_id'=> count(Quote::all()),
                'frame_id'=> $request->input('frame_id'.$i),
                'nFrame'=> $request->input('nFrame'.$i),
                'color_id'=> $request->input('color_id'.$i),
                'glass_id'=> $request->input('glass_id'.$i),
                'frameSize' => $request->input('frameSize'.$i),
                'vertF' => $request->input('vertF'.$i),
                'orizzF' => $request->input('orizzF'.$i),
            ]);
            $frameDetails->save();
        } 
        $quote->save();
        return redirect()->back()->with('message', "La tua richiesta è stata inoltrata. Riceverai il preventivo per mail.");  
    }
    
    public function richiesteAcquisti()
    {
        return view('richieste.acquisti');
    }
    
    public function AcquistoShow( Quote $quote)
    {
        return view('richieste.AcquistoShow', compact('quote'));
        
    }    
}
