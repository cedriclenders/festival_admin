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

    public function updateDescription(Request $request)
    {
        $description = $request['description'];
        $festival = Festival::findOrFail(1);
        $festival->description = $description;
        $festival->save();

        return redirect('/');
    }
}
