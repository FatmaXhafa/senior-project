<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Question;

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
        
        return redirect('/exams/'.$exam->id);
    }

    public function destroy(Exam $exam, Question $question) {
        
        $question->answers()->delete();
        $question->delete();

        return redirect($exam->path());
    }
}
