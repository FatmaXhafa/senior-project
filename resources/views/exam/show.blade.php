@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $exam->title }}</div>

                <div class="card-body">
                    <a class='btn btn-dark' href="/exams/{{ $exam->id}}/questions/create">Add New Question</a>
                    @if ($exam->questions->count() > 0)
                        <a class='btn btn-dark' href="/assessments/{{ $exam->id}}-{{ Str::slug( $exam->title) }}">Take Exam</a>
                    @endif
                </div>
            </div>

            @foreach($exam->questions as $question)
            <div class="card mt-4">
                <div class="card-header">{{ $question->question }}</div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach($question->answers as $answer)
                            <li class="list-group-item d-flex justify-content-between">
                            <div>{{ $answer->answer}}</div>
                            @if ($question->responses->count())
                            <div> {{ intval(($answer->responses->count())*100/($question->responses->count())) }}%</div>
                            @endif
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="card-footer">
                    <form action="/exams/{{$exam->id}}/questions/{{ $question->id }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete Question</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
