@extends('main')

@section('title', '| View Post')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $post->title }}</h1> 
            <p class="lead">{!! $post->body !!}</p>
        </div>

        <div class="col-md-8">
            @foreach($post->tags as $tag)
                <span class="badge badge-secondary">{{ $tag->name }}</span>
            @endforeach
        </div>
        <img src="{{asset('images/'.$post->image)}}" alt="no image" height="400" width="800" />

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
        
        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <label>  URL: </label>
                    <a href="{{route('blog.single',$post->slug)}}">{{route('blog.single',$post->slug)}}</a>  
                </dl>
                <dl class="dl-horizontal">
                    <label>Created At: </label>
                    <dd>{{ date('M,j,Y, h:ia', strtotime($post->created_at)) }}</dd>
                </dl>

                <dl class="dl-horizontal">
                    <label>Last updated: </label>
                    <dd>{{ date('M,j,Y, h:ia', strtotime($post->updated_at)) }}</dd>
                </dl>
                <hr>

                <div class="row">
                    <div class="col-sm-6">
                      {!! Html::linkRoute('posts.edit','Edit',array($post->id),array('class'=>'btn btn-primary btn-block')) !!}
                    </div>

                    <div class="col-sm-6">
                        {!! Form::open(['route'=>['posts.destroy',$post->id],'method' => 'DELETE']) !!}
                        {!! Form::submit('Delete', ['class'=> 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {{ Html::linkRoute('posts.index','<< See all posts',[],['class' => 'btn btn-primary btn-h1-spacing']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection