<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use App\Http\Requests\PhotoRequest;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('gallery');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('photos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhotoRequest $request)
    {
        $img = $request->file('img');
        if($img == null){
        $photo= Photo::create([
                'frame_id'=> $request->input('frame_id'),
                'color_id' => $request->input('color_id')
                
            ]);
        }else{
        $photo= Photo::create([
            'frame_id'=> $request->input('frame_id'),
            'color_id' => $request->input('color_id')
            
        ]);
            $photo->img = $request->file('img')->store("public/photo/$photo->id"); 
            $photo->save();
    }
        return redirect(route('users.revisorDashboard'))->with('message', "La nuova photo è stata inserita correttamente.");
     }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        return view('photos.edit', compact('photo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(PhotoRequest $request, Photo $photo)
    {
        $photo->update($request->all());
        
        $img = $request->file('img');
        if($img !=null){
      Storage::delete($photo->img);
            $photo->img = $request->file('img')->store("public/photo/$photo->id"); 
            $photo->save();                    
        }
        return redirect(route('gallery'))->with('message', "La foto è stato modificato correttamente.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        //
    }
}
