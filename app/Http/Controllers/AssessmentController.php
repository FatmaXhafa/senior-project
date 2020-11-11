<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;

class AssessmentController extends Controller
{
    public function show(Exam $exam, $slug) {
        $exam->load('questions.answers');
        return view('assessment.show', compact('exam'));
    }

    public function store(Exam $exam) {
        //dd(request()->all());
        $data = request()->validate([
            'responses.*.answer_id'=>'required', //nested validation
            'responses.*.question_id'=>'required',
            'assessment.name'=>'required',
            'assessment.email'=>'required|email',
        ]);
        
        $assessment = $exam->assessments()->create($data['assessment']);
        $assessment->responses()->createMany($data['responses']);

        return 'Thank you!';
    }
}
