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
     //   dd($exam);               
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

                //dd($corrAnswer, $answer);
                // if it is correct
                if ($corrAnswer == $answer) { 	// $answer is the one that the user types, the request	 	
                    $score = $score + 1;                  
                } 
                //if it is incorrect	
                else {			
                    $score = $score + 0.5;
                }   
        }    
        dd($score);   
        return 'Thank you!'; //later it can return a view which shows a report: score etc
    }
}
