<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    //
    public function getAll()
    {
        $genres = Genre::all();
        return view('genres', ['genres' => $genres]);
    }

    public function add(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        $genre = new Genre;

        $genre->name = $request['name'];
        $genre->save();
        return redirect('/genres');
    }
}
