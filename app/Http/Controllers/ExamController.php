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
            'description'=>'required',
        ]);

        // $data['user_id'] = auth()->user()->id;

        // $exam = \App\Models\Exam::create($data);
        $exam = auth()->user()->exams()->create($data);
        return redirect('/exams/'.$exam->id);
    }

    public function show(\App\Models\Exam $exam) {

        return view('exam.show', compact('exam'));
    }
}

