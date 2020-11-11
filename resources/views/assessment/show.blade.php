@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        <h1> {{ $exam->title}}</h1>
            <form action="/assessments/{{ $exam->id}} - {{ Str::slug($exam->title) }}" method="post">
                @csrf
                @foreach($exam->questions as $key => $question)
                    <div class="card mt-4">
                        <div class="card-header"><strong>{{ $key + 1 }}</strong> {{ $question->question }}</div>
                        
                        <div class="card-body">

                            @error('responses.' . $key . '.answer_id')
                                <small class="text-danger">{{ $message}}</small>
                            @enderror

                            <ul class="list-group">
                                @foreach($question->answers as $answer)
                                <label for="answer{{ $answer->id }}">
                                    <li class="list-group-item">
                                            <input type="radio" name="responses[{{ $key }}][answer_id]" id="answer{{ $answer->id}}"
                                            {{ (old('responses.' . $key . '.answer_id') == $answer->id) ? 'checked' : '' }}
                                            class="mr-2" value= "{{ $answer->id }}">
                                            {{ $answer->answer}}

                                            <input type="hidden" name="responses[{{ $key }}][question_id]" value="{{ $question->id}}">
                                        </li>
                                </label>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach

                <div class="card mt-4">
                    <div class="card-header">Your Information</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Student's Name</label>
                            <input name = "assessment[name]" type="text" class="form-control" id="name" aria-describedby="name" placeholder="Enter your name.">
                            <small id="nameHelp" class="form-text text-muted">Enter your full name.</small>
                        
                            @error('name')
                            <small class="text-danger">{{ $message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Student's Email</label>
                            <input name = "assessment[email]" type="email" class="form-control" id="email" aria-describedby="email" placeholder="Enter your email.">
                            <small id="emailHelp" class="form-text text-muted">Enter your AUBG email.</small>

                            @error('email')
                            <small class="text-danger">{{ $message}}</small>
                            @enderror
                        </div>   

                        <div>
                            <button class="btn btn-dark" type="submit">Submit Exam</button> 
                        </div>
                    </div>
                </div>          
            </form>
        </div> 
    </div>
</div>
@endsection
