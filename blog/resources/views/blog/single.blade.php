@extends('main')

@section('title',"| $post->title")

@section('content')
    <div class="row">
        <div class="cold-md-8 col-md-offset-2">
            <h1>{{ $post->title }}</h1>
            <p>{!! $post->body !!}</p>
            <hr>
            <p>Posted In: {{ $post->category->name}}</p>
        </div>
         <hr />
        
        
         <div class="card-body">
            <h5>Display Comments</h5>
        
            @include('posts.partials._reply', ['comments' => $post->comments, 'post_id' => $post->id])

            <hr />
        </div>
        <div class="card-body">
            <h5>Leave a comment</h5>
            <form method="post" action="{{ route('comment.add') }}">
                @csrf
                <div class="form-group">
                    <input type="text" name="comment" class="form-control" required/>
                    <input type="hidden" name="post_id" value="{{ $post->id }}" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" value="Add Comment" />
                </div>
            </form>
        </div>

        
    </div>
@endsection