<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Performance;

class PerformanceController extends Controller
{
    //

    public function getLikes()
    {
        $likes = Performance::find(1)->likes;
        foreach ($likes as $like)
        {
            echo($like->user_id);
        }
    }

    public function getPerformances()
    {
        $performances = Performance::all();
        
        foreach( $performances as $performance)
        {
            var_dump($performance->performer->name);
        }

    }
    
}
