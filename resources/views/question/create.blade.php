@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create New Question') }}</div>

                <div class="card-body">
                    <form action="/exams/{{ $exam->id}}/questions" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="question">Question</label>
                            <input name = "question[question]" type="text" class="form-control" 
                                   value="{{ old('question.question') }}"
                                   id="question" aria-describedby="question" placeholder="Enter question">
                            <small id="questionHelp" class="form-text text-muted">Enter a question/prompt.</small>

                            @error('question.question')
                            <small class="text-danger">{{ $message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <fieldset>
                                <legend>Choices</legend>
                                <div>                                   
                                    <div class="form-group">
                                        <label for="answer1">Choice 1 - The correct one, used for validation</label>
                                        <input name = "answers[][answer]" type="text" class="form-control" 
                                               value="{{ old('answers.0.answer') }}"
                                               id="answer1" aria-describedby="answer1" placeholder="Enter answer choice 1.">
                                        <small id="answer1Help" class="form-text text-muted">This should be the correct answer choice.</small>

                                        @error('answers.0.answer')
                                        <small class="text-danger">{{ $message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div>                                   
                                    <div class="form-group">
                                        <label for="answer2 ">Choice 2</label>
                                        <input name = "answers[][answer]" type="text" class="form-control" 
                                               value="{{ old('answers.1.answer') }}"
                                               id="answer2" aria-describedby="answer2" placeholder="Enter answer choice 2.">
                                        <small id="answer2Help" class="form-text text-muted">Enter choice 2.</small>

                                        @error('answers.1.answer')
                                        <small class="text-danger">{{ $message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div>                                   
                                    <div class="form-group">
                                        <label for="answer3">Choice 3</label>
                                        <input name = "answers[][answer]" type="text" class="form-control" 
                                               value="{{ old('answers.2.answer') }}"
                                               id="answer3" aria-describedby="answer3" placeholder="Enter answer choice 3.">
                                        <small id="answer3Help" class="form-text text-muted">Enter choice 3.</small>

                                        @error('answers.2.answer')
                                        <small class="text-danger">{{ $message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div>                                   
                                    <div class="form-group">
                                        <label for="answer4">Choice 4</label>
                                        <input name = "answers[][answer]" type="text" class="form-control" 
                                               value="{{ old('answers.3.answer') }}"
                                               id="answer4" aria-describedby="answer4" placeholder="Enter answer choice 4.">
                                        <small id="answer4Help" class="form-text text-muted">Enter choice 4.</small>

                                        @error('answers.3.answer')
                                        <small class="text-danger">{{ $message}}</small>
                                        @enderror
                                    </div>
                                </div> 

                                <!-- <div>                                   
                                    <div class="form-group">
                                        <label for="hint">Hint</label>
                                        <input name = "answers[][answer]" type="text" class="form-control" 
                                               value="{{ old('answers.3.answer') }}"
                                               id="answer4" aria-describedby="answer4" placeholder=" ">
                                        <small id="hintHelp" class="form-text text-muted">Enter the hint which will help the students answer this question.</small>

                                        @error('question.hint')
                                        <small class="text-danger">{{ $message}}</small>
                                        @enderror
                                    </div>
                                </div>  -->

                            </fieldset>
                        </div>
                        <button type="submit" class="btn btn-primary">Add New Question</button>
                    </form>   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
