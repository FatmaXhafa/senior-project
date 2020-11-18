<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function __construct() {

        $this->middleware('auth');
    }

    public function create() {

        return view('exam.create'); 
    }

    public function store() {

        $data = request()->validate([
            'title'=>'required',
            'description'=>'required|min:30',
        ]);

        // $data['user_id'] = auth()->user()->id;
        // $exam = \App\Models\Exam::create($data);
        
        $exam = auth()->user()->exams()->create($data);
        return redirect('/exams/'.$exam->id);
    }

    public function show(\App\Models\Exam $exam) {

        $exam->load('questions.answers.responses');
        return view('exam.show', compact('exam'));
    }

    public function destroy(\App\Models\Exam $exam, \App\Models\Question $question, \App\Models\Answer $answer) {
        
        $exam->questions()->delete();
        $exam->delete();
        
        return redirect('/home');
    }
}