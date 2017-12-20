@extends('main')

@section('title', '| Reset My Password')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="card">
                <div class="card-header">Reset Password</div>

                <div class="card-body">
                    
                    {!! Form::open(['url' => 'password/email', 'method' => "POST"]) !!}

                    {{ Form::label('email', 'Email Address:') }}
                    {{ Form::email('email', null, ['class' => 'form-control']) }}

                    {{ Form::submit('Reset Password', ['class' => 'btn btn-primary']) }}

                    {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>

@endsection