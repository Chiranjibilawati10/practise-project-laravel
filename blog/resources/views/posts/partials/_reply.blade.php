
    @foreach($comments as $comment)
    <div class="display-comment">
        <div class="card-body">
                <strong>{{ $comment->user->name }}</strong> 
                <p>{{ $comment->comment }} 
                    @if (Auth::user()->id == ($comment->user_id))
                    
                        <a href="{{route('comments.edit',$comment)}}" class="btn btn-sm btn-success">Edit</a>

                        {{ Form::open(['route'=>['comments.destroy',$comment->id],'method'=>'DELETE']) }}
                            {{ Form::submit('Delete',['class'=>'btn btn-sm btn-danger']) }}
                        {{ Form::close()  }}

                        <!-- Modal -->

                    @endif
                        <div class="card-body">
                            <a href="" id="reply"></a>
                            <form method="post" action="{{ route('reply.add') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="comment" class="form-control" required />
                                    <input type="hidden" name="post_id" value="{{ $post_id }}" />
                                    <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" value="Reply" />
                                </div>
                            </form>
                            @include('posts.partials._reply', ['comments' => $comment->replies])

                        </div>
                    </div>
                </div>
    @endforeach 
@push('scripts')
   
@endpush 
