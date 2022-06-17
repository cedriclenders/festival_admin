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
        $validated = $request->validate([
            'name' => 'required',
            'start' => 'required',
            'end' => 'required|date|after_or_equal:start',
            'lat' => 'nullable|numeric|min:-90|max:90',
            'long' => 'nullable|numeric|min:-180|max:180',
        ]);

        $festival = Festival::findOrFail(1);
        $festival->description = $request['description'];
        $festival->name = $request['name'];
        $festival->long = $request['long'];
        $festival->lat = $request['lat'];
        $festival->start_date = $request['start'];
        $festival->end_date = $request['end'];
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
