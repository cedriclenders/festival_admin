<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Festival;

class FestivalController extends Controller
{
    //
    public function getAll()
    {
        $festivals = Festival::all();
        return view('festivals', ['festivals' => $festivals]);
    }

    public function updateInfo(Request $request)
    {
        $description = $request['description'];
        $name = $request['name'];
        $long = $request['long'];
        $lat = $request['lat'];
        $festival = Festival::findOrFail(1);
        $festival->description = $description;
        $festival->name = $name;
        $festival->long = $long;
        $festival->lat = $lat;
        $festival->save();

        return redirect('/');
    }

    public function uploadImage(request $request)
    {
        $this->validate($request, [
            'input_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        if ($request->hasFile('input_img')) {
            $image = $request->file('input_img');
            dd($image);
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $this->save();
    
            return redirect('/')->with('success','Image Upload successfully');
        }
    }
}
