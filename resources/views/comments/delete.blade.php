@extends('main')

@section('title', '| DELETE COMMENT?')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offest-2">
            <h1>Are You Sure You Want To Delete This Comment?</h1>
            <p>
                <strong>Name:</strong> {{ $comment->name }}<br>
                <strong>Email:</strong> {{ $comment->email }}<br>
                <strong>Comment:</strong> {{ $comment->comment }}
            </p>

            {{ Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE']) }}

                {{ Form::submit('YES, delete this comment', ['class' => 'btn btn-lg btn-block btn-danger btn-h1-spacing']) }}

            {{ Form::close() }}
        </div>
    </div>

@endsection