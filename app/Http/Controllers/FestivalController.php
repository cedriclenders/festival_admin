<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Festival;

class FestivalController extends Controller
{
    //
    public function getFestival()
    {
        $festival = Festival::find(1)->first();
        return view('home', compact('festival'));
    }
}
