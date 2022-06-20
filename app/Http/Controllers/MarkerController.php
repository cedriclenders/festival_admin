<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marker;
use Auth;

class MarkerController extends Controller
{
    //
    public function getAll()
    {
        $markers = Marker::all()->where('is_admin', true);
        return view('markers')->with('markers', $markers);
    }

    public function getAllJson()
    {
        $markers = Marker::all()->where('is_admin', true);
        return json_encode($markers);
    }

    public function add(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'icon' => 'required',
            'lat' => 'nullable|numeric|min:-90|max:90',
            'long' => 'nullable|numeric|min:-180|max:180',
        ]);
       $marker = new Marker;
       $marker->name = $request['name'];
       $marker->user_id = Auth::user()->id;
       $marker->emoji_path = $request['icon'];
       $marker->long = $request['long'];
       $marker->lat = $request['lat'];
       $marker->is_admin = 1;
       $marker->save();

       return redirect('/markers');
    }

    public function delete($id)
    {
        $marker = Marker::find($id);
        
        $marker->delete();
 
        return redirect('/markers');   
    }
}
