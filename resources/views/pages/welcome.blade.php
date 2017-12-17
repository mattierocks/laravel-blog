@extends('main')

@section('title', '| Home')

@section('content')
    <div class="row">
      <div class="col-md-12">
        <div class="jumbotron">
          <h1 class="display-3">Mattie Fuller</h1>
          <p class="lead">Welcome to my ministry and music website!</p>
          <hr class="my-4">
          <p>Follow the links for more information.</p>
          <p class="lead">
          <a class="btn btn-primary btn-lg" href="#" role="button">Start Here</a>
          </p>
        </div><!-- end jumbotron -->
      </div><!-- end col-md-12 -->
    </div><!-- end row -->

    <div class="row">
      <div class="col-md-8">

        @foreach($posts as $post)

          <div class="post">
            <h3>{{ $post->title }}</h3>
            <p>{{ substr($post->body, 0, 300) }}{{ strlen($post->body) > 300 ? "..." : "" }}</p>
            <a href="#" class="btn btn-primary">Read More</a>       
            </div><!-- end post -->

            <hr>

          @endforeach

      </div><!-- end col-md-8 -->
                 
      <div class="col-md-3 col-md-offset-1">
        <h2>Sidebar</h2> 
      </div><!-- end sidebar col-md-3 -->

    </div><!-- end main row -->
@endsection

