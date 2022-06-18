<?php

namespace App\Http\Controllers;

use App\Models\FrequentlyAskedQuestion;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    //
    public function getAll()
    {
        $faqs = FrequentlyAskedQuestion::all();
        return view('faqs')->with('faqs', $faqs);
    }
 
    public function get($id)
    {
        $faq = FrequentlyAskedQuestion::find($id);
        return view('faq')->with('faq', $faq);
    }
 
    public function update(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);
        $question = $request['question'];
        $answer = $request['answer'];
        $faq = FrequentlyAskedQuestion::firstOrNew(['id' => $request['id']]);
        $faq->question = $question;
        $faq->answer = $answer;
        $faq->save();

 
        return redirect('/faqs');
    }
 
    public function delete($id)
    {
        $faq = FrequentlyAskedQuestion::find($id);
        $faq->delete();
 
        return redirect('/faqs');   
    }
}
