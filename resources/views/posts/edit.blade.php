@extends('main')

@section('title', '| Edit Blog Post')

@section('content')

    <div class="row">
        <div class="col-sm-8">
            {!! Form::model($post, ['route' => ['posts.update', $post->id, 'method' => 'PUT']]) !!}
            <div class="col-auto">
                {{ Form::label('title', 'Title:') }}
                {{ Form::text('title', null, ['class' => 'form-control']) }}

                {{ Form::label('slug', 'URL:', ['class' => 'form-spacing-top']) }}
                {{ Form::text('slug', null, ['class' => 'form-control']) }}

                {{ Form::label('category_id', 'Category:', ['class' => 'form-spacing-top']) }}
                {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}

                {{ Form::label('body', 'Body:', ['class' => 'form-spacing-top']) }}
                {{ Form::textarea('body', null, ['class' => 'form-control']) }}
            </div><!-- end col-sm-8 -->
        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <dl class="dl-horizontal">
                        <dt>Created At:</dt>
                        <dd>{{ date('F j, Y  g:iA', strtotime($post->created_at)) }}</dd>
                    </dl>

                    <dl class="dl-horizontal">
                        <dt>Last Updated:</dt>
                        <dd>{{ date('F j, Y  g:iA', strtotime($post->updated_at)) }}</dd>
                    </dl>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                        {!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-warning btn-block')) !!}
                        </div><!-- end col-sm-6 -->
                        <div class="col-sm-6">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
                        </div><!-- end col-sm-6 -->
                    </div><!-- end row -->
                </div><!-- end card-body -->
            </div><!-- end card --> 
        </div><!-- end col-md-4 sidebar -->
        {!! Form::close() !!}
    </div><!-- end row -->
    

@endsection