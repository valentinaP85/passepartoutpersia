<?php

namespace App\Http\Controllers;

use App\Models\Frame;
use Illuminate\Http\Request;
use App\Http\Requests\FrameRequest;
use Illuminate\Support\Facades\Storage;

class FrameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cornici');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frames.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FrameRequest $request)
    {
        
        $imgProfilo = $request->file('imgProfilo');
        if( $imgProfilo == null){
            $frame= Frame::create([
                'profilo'=> $request->input('profilo'),
                'misuraFronte'=> $request->input('misuraFronte'),
                'profondita'=> $request->input('profondita'),
                'essenze' => $request->input('essenze'),
                'descrizione'=> $request->input('descrizione'),
                'status' => $request->input('status')
            ]);                
        }else{     
            $frame= Frame::create([
                'profilo'=> $request->input('profilo'),
                'misuraFronte'=> $request->input('misuraFronte'),
                'profondita'=> $request->input('profondita'),
                'essenze' => $request->input('essenze'),
                'descrizione'=> $request->input('descrizione'),
                'status' => $request->input('status')
            ]);
            // $frame->img = $request->file('img')->store("public/frame/$frame->id"); 
            $frame->imgProfilo = $request->file('imgProfilo')->store("public/frame/$frame->id/profilo"); 
            $frame->save();
        }
        return redirect(route('users.revisorDashboard'))->with('message', "La nuova cornice è stata inserita correttamente."); 
    }

    public function status(Frame $frame){
        $frame->status  = !$frame->status;
        $frame->save();
        return redirect()->back();   
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Frame  $frame
     * @return \Illuminate\Http\Response
     */
    public function show(Frame $frame)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Frame  $frame
     * @return \Illuminate\Http\Response
     */
    public function edit(Frame $frame)
    {
        return view('frames.edit', compact('frame'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Frame  $frame
     * @return \Illuminate\Http\Response
     */
    public function update(FrameRequest $request, Frame $frame)
    {
        $frame->update($request->all());
        
        // $img = $request->file('img');
        $imgProfilo = $request->file('imgProfilo');
        
        // if($img !=null){
        //     Storage::delete($frame->img);
        //     $frame->img = $request->file('img')->store("public/frame/$frame->id"); 
        //     $frame->save();                    
        // }
        if($imgProfilo !=null){
            Storage::delete($frame->imgProfilo);
            $frame->imgProfilo = $request->file('imgProfilo')->store("public/frame/$frame->id/profilo"); 
            $frame->save();                    
        }
        return redirect(route('cornici'))->with('message', "La cornice $frame->profilo è stato modificato correttamente.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Frame  $frame
     * @return \Illuminate\Http\Response
     */
    public function destroy(Frame $frame)
    {
        if($frame->imgProfilo !=null){
            Storage::deleteDirectory("public/frame/$frame->id"); 
        }
        
        $frame->delete();
        return redirect()->back()->with('message', "La cornice $frame->profilo è stata cancellata con successo.");
    }
}
