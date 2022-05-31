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
       $description = $request['description'];
       $name = $request['name'];
       $stage = Stage::firstOrNew(['id' => $request['id']]);
       $stage->description = $description;
       $stage->name = $name;
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
