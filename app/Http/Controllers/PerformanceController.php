<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Performance;
use App\Models\Performer;
use App\Models\Timeslot;
use App\Models\Like;
use App\Rules\Url;

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

    public function getAll()
    {
        $performances = Performance::all();
        
        return view('performance-list', ['performances' => $performances]);

    }

    public function get($id)
    {
        $performance = Performance::find($id);
        return view('performance')->with('performance', $performance);
    }
    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'genre_id' => 'required',
            'startTime' => 'required|date_format:Y-m-d\TH:i',
            'endTime' => 'required|date_format:Y-m-d\TH:i',
            'youtube_link' =>  ['nullable', new Url],
        ]);

        $performance = Performance::firstOrNew(['id' => $request['id']]);

        // Performaner aanmaken of updaten

        $performer = Performer::firstOrNew(['id' => $request['performer_id']]);
        $performer->name = $request['name'];
        $performer->description = $request['description'];
        $performer->genre_id = $request['genre_id'];
        $performer->youtube_link = $request['youtube_link'];
        $performer->save();

        $timeSlot = Timeslot::firstOrNew(['id' => $request['timeslot_id']]);
        $timeSlot->start_datetime = $request['startTime'];
        $timeSlot->end_datetime = $request['endTime'];
        $timeSlot->save();

        $performance->performer_id = $performer->id;
        $performance->stage_id = $request['stage_id'];
        $performance->timeslot_id = $timeSlot->id;
        $performance->save();

        return redirect('/performance/'. $performance->id);
    }

    public function delete($id)
    {
        $performance = Performance::findOrFail($id);
        $likes = $performance->likes;

        foreach($likes as $like)
        {
            Like::findOrFail($like->id)->delete();
        }
        
        $performance->delete();

        return redirect('/performances/'); 
    }
}
