<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stage;

class StageController extends Controller
{
    //

   public function getAll()
   {
       $stages = Stage::all();
       return view('stages')->with('stages', $stages);
   }

   public function get($id)
   {
       $stage = Stage::find($id);
       return view('stage')->with('stage', $stage);
   }

   public function update(Request $request)
   {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'lat' => 'nullable|numeric|min:-90|max:90',
            'long' => 'nullable|numeric|min:-180|max:180',
        ]);

       $stage = Stage::firstOrNew(['id' => $request['id']]);
       $stage->description = $request['description'];
       $stage->name = $request['name'];
       $stage->long = $request['long'];
       $stage->lat = $request['lat'];
       $stage->save();

       return redirect('/stages');
   }

   public function delete($id)
   {
       $stage = Stage::find($id);
       
       $stage->delete();

       return redirect('/stages');   
   }
}
