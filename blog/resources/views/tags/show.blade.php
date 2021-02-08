@extends('main')

@section('title', "| $tag->name")

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $tag->name }} Tag
                <small>   {{ $tag->posts()->count()}} Posts </small>
            </h1> 
        </div>

        <div class="col-md-2 col-md-2">
           <a href="{{ route('tags.edit',$tag->id) }}" style="margin-top:20px;"class="btn btn-sm btn-success" >Edit</a>
        </div>

        <div class="col-md-2 col-md-2">
            {{ Form::open(['route'=>['tags.destroy',$tag->id],'method'=>'DELETE']) }}
                {{ Form::submit('Delete',['class'=>'btn btn-sm btn-danger','style'=>'margin-top:20px;']) }}
            {{ Form::close()  }}
         </div>
         
    </div>
    <div class="row">
        <div class="col-md-12">
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
                    @foreach($tag->posts as $post)
                        <tr>
                            <th>{{$post->id}}</th>
                            <th>{{$post->title}}</th>
                            <td>
                                @foreach($post->tags as $tag)
                                    <span>{{ $tag->name}}</span>
                                @endforeach
                            </td>
                            <td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-primary">View</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection