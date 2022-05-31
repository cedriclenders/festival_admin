<?php

namespace App\Http\Controllers;

use App\Models\Performer;
use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Performance;

class UploadImageController extends Controller
{
    //

 
    public function saveFestivalImage(Request $request)
    {
         
        $validatedData = $request->validate([
         'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
 
        $name = $request->file('image')->getClientOriginalName();
 
        $path = $request->file('image')->store('public/images');
 
        $save = new Photo;
        
        $save->name = $name;
        $save->path = str_replace("public/","",$path);
        $save->festival_id = 1;
        $save->save();
 
        return redirect('/')->with('status', 'Image Has been uploaded');
 
    }

    public function savePerformerImage(Request $request, Performance $performance)
    {
        $validatedData = $request->validate([
         'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
 
        $name = $request->file('image')->getClientOriginalName();
 
        $path = $request->file('image')->store('public/images');
 
        $save = new Photo;
        
        $save->name = $name;
        $save->path = str_replace("public/","",$path);
        $save->performer_id = $performance->performer->id;
        $save->save();
 
        return redirect('/performance/'.$performance->id)->with('error', 'Image Has been uploaded');
 
    }

    
}
