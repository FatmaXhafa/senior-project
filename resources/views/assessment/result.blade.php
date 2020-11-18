@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @isset($result)
                <h1><strong>{{ $result->name }}</strong></h1>
                <h3>Course: {{$exam->title }}</h3>

                    @if ($result->score >= 1)
                    <div class="alert alert-success d-inline-block" role="alert">
                        <span>Score: {{ $result->score }}</span>
                    </div>
                    @else
                    <div class="alert alert-danger d-inline-block" role="alert">
                        <span>Score: {{ $result->score }}</span>
                    </div>
                    @endif
                @endisset
            </div>
        </div>
    </div>
@endsection
