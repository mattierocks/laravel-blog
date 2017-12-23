@extends('main')

@section('title', '| $tag->name Tag')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>{{ $tag->name }} Tag <small>{{ $tag->posts()->count() }} Posts</small></h1>
        </div>
        <div class="col-md-4">
            <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary btn-tag-edit float-right">Edit</a>
            <a href="{{ route('tags.index') }}" class="btn btn-secondary btn-tag-back float-right">Back</a>    
        </div>  
    </div>

    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Tags</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($tag->posts as $post)
                <tr>
                    <th>{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>@foreach ($post->tags as $tag)
                            <span class="badge badge-secondary">{{ $tag->name }}</span>
                        @endforeach
                    </td>
                    <td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-light btn-xs">View</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection