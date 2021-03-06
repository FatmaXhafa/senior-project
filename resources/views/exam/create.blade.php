@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create New Exam') }}</div>

                <div class="card-body">
                    <form action="/exams" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input name = "title" type="text" class="form-control" id="title" aria-describedby="title" placeholder="Enter title">
                            <small id="titleHelp" class="form-text text-muted">Enter the name of the class/subject.</small>

                            @error('title')
                            <small class="text-danger">{{ $message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" placeholder="Enter a Description"></textarea>
                            <small id="descriptionHelp" class="form-text text-muted">What is this exam about?</small>

                            @error('description')
                                <small class="text-danger">{{ $message}}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Create Exam</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
