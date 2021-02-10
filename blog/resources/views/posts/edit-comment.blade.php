@extends('main')

@section('title', "| Edit Comment")
    
@section('content')
<div class="card text-center">
    <div class="card-header">
       Comment
    </div>
        @foreach($updateComment as $cmt)
            <form method="post" action="{{ route('comments.update',$cmt->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <input type="text" name="comment" class="form-control" value="{{$cmt->comment}}" required/>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm">Update</button>
                </div>
            </form>
        @endforeach
    <div class="card-body">
    </div>
  </div>
@endsection