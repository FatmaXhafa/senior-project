@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create New Exam') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status')}}
                        </div>
                    @endif

                    <a href="/exams/create" class="btn btn-dark">Create New Exam</a>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header">My Exams</div>

                <div class="card-body">
                   <ul class="list-group">
                        @foreach($exams as $exam)
                            <li class="list-group-item">
                                <a href="{{ $exam->path() }}"> {{ $exam->title }}</a>

                                <div class="mt-2">
                                    <small class="font-weight-bold">Send URL to students</small>
                                    <p>
                                        <a href="{{ $exam->publicPath()}}">
                                        {{ $exam->publicPath()}}
                                        </a>
                                    </p>
                                </div>
                            </li>
                        <div class="card-footer">
                            <form action="/exams/{{ $exam->id }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete Exam</button>
                            </form>
                        </div> 
                        @endforeach
                   </ul>                  
                </div>
              
            </div> 
        </div>
    </div>
</div>
@endsection
