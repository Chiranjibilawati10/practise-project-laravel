@extends('main')

@section('title', '| Create New Post')

@section('stylesheets')
<!DOCTYPE HTML>
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector:'textarea',
            plugins: 'link code',
            menubar: false
        });
    </script>
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1>Create New Post</h1>
        {!! Form::open(array('route' => 'posts.store', 'data-parsley-validate' => '','file'=>true)) !!}
            {{ Form::label('title', 'Title:')}}
            {{ Form::text('title', null, array('class' => 'form-control','required' => '','maxlength'=> '255')) }}

            {{ Form::label('slug', 'Slug:')}}
            {{ Form::text('slug',null, array('class'=>'form-control','required'=>'','minlength'=>'5','maxlength'=>'255'))}}

            {{ Form::label('category_id','Category:') }}
                <select name="category_id" id="" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            
            {{ Form::label('tags','Tag:') }}
            <select id="tags" class="form-control select2-multi " name="tags[]" multiple="multiple">
                @foreach ($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                @endforeach
            </select>

            {{-- {{ Form::label('featured_image','Upload featured Image:') }}
            {{ Form::file('feaured_image') }} --}}

            {{ Form::label('body', 'Post Body:') }}
            {{ Form::textarea('body', null, array('class' => 'form-control','required' => '')) }}

            {{ Form::submit('Create New Post',  array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top:20px;')) }}

        {!! Form::close() !!}
    </div>
</div>
@endsection

@section('scripts')
    {{!! Html::script('js/parsley.min.js') !!}}
    {{!! Html::script('js/select2.min.js') !!}}
    <script type="text/javascript">
        $('.select2-multi').select2();
    </script>
@endsection