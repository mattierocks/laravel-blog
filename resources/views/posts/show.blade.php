@extends('main')

@section('title', '| View Post')

@section('content')
<div class="row">
    <div class="col-sm-8">
        <h1>{{ $post->title }}</h1>

        <p class="lead">{!! $post->body !!}</p>

        <hr>

        <div class="tags">
            @foreach ($post->tags as $tag)
                <span class="badge badge-secondary">{{ $tag->name }}</span>
            @endforeach
        </div><!-- End Tags -->

        <div id-"backend-comments">
            <h3>Comments <small>{{ $post->comments()->count() }} total</small></h3>

            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Comment</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($post->comments as $comment)
                    <tr>
                        <td>{{ $comment->name }}</td>
                        <td>{{ $comment->email }}</td>
                        <td>{{ $comment->comment }}</td>
                        <td>
                            <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-primary"><span class="fa fa-pencil"></span></a>
                            <a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-xs btn-danger"><span class="fa fa-trash"></span></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div><!-- end col-md-8 -->

    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <dl class="dl-horizontal">
                    <dt>URL:</dt>
                    <dd><a href="{{ url('blog/'.$post->slug) }}">{{ url('blog/'.$post->slug) }}</a></dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Category:</dt>
                    <dd>{{ $post->category->name }}</dd>
                </dl>

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
                    {!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
                    </div><!-- end col-sm-6 -->
                    <div class="col-sm-6">
                    {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}

                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

                    {!! Form::close() !!}
                    </div><!-- end col-sm-6 -->
                    <div class="col-sm-12">
                    {!! Html::linkRoute('posts.index', 'Back to posts', [], ['class' => 'btn btn-outline-secondary btn-block btn-h1-spacing']) !!}
                    </div>
                </div><!-- end row -->
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div><!-- end col-md-4 sidebar -->
</div><!-- end row -->
@endsection