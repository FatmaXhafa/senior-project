<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Answer;
use Illuminate\Support\Arr;

//Arr::random($array, 4);
class AssessmentController extends Controller
{
    public function show(Exam $exam, $slug) {
        $exam->load('questions.answers'); //loading the relationship, returns a model                
        return view('assessment.show', compact('exam'));
    }

    public function store(Exam $exam) {
        
        $data = request()->validate([
            'responses.*.answer_id'=>'required', //nested validation
            'responses.*.question_id'=>'required',
            'assessment.name'=>'required',
            'assessment.email'=>'required|email',
        ]);
        
        $assessment = $exam->assessments()->create($data['assessment']);
        $assessment->responses()->createMany($data['responses']);        
        
        
        $score = 0;
        foreach ($exam->questions as $key => $question) {
            $corrAnswer = $question->answers()->first()->answer;
            $answer = Answer::find(request('responses')[0]['answer_id'])->answer;
            $score = $corrAnswer == $answer ? $score + 1 : $score - 0.5;
        }

        $result = $exam->assessments()->create([
            'name' => $data['assessment']['name'],
            'email' => $data['assessment']['email'],
            'score' => $score,
            'exam_id' => $exam->id
        ]);
        
        return view('assessment.result')->with('result', $result)->with('exam', $exam);
    }
}
