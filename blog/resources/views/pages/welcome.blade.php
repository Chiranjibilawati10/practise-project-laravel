@extends('main')
@section('title', '| Welcome')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="styles.css"
@endsection

@section('content')
    <div class="row">
        <div class="jumbotron">
            <h1 class="display-4">Hello, world!</h1>
            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            @foreach($posts as $post)
                <div class="post">
                    <h3>{{$post->title}}</h3>
                    <p>{{substr($post->body,0,30)}}</p>
                    <a href="{{url('blog/'.$post->slug) }}">Read more</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')
    <script>
    </script>
@endsection