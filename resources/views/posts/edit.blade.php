@extends('main')

@section('title', '| Edit Blog Post')

@section('stylesheets')

    {!! Html::style('css/select2.min.css') !!}
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'link code image'
        });
    </script>

@endsection

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

                {{ Form::label('tags', 'Tags:', ['class' => 'form-spacing-top']) }}
                {{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}

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

@section('scripts')

    {!! Html::script('js/select2.min.js') !!}

    <script type="text/javascript">
        $('.select2-multi').select2();
        $('.select2-multi').select2().val({!! json_encode($post->tags()->allRelatedIds()) !!}).trigger('change');
    </script>

@endsection