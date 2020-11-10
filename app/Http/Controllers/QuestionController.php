<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;

class QuestionController extends Controller
{
    public function create(Exam $exam) {
        return view('question.create', compact('exam'));
    }

    public function store(Exam $exam) {

        $data = request()->validate([
            'question.question' => 'required',
            'answers.*.answer' => 'required', 

        ]);
        
        $question = $exam->questions()->create($data['question']);
        $question->answers()->createMany($data['answers']);
        
        return redirect('/exam/'.$exam->id);
    }
}
