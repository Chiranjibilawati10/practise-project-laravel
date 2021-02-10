@extends('main')

@section('title', '| Edit Blog Post')
@section('stylesheets')
<!DOCTYPE HTML>

    {!! Html::style('css/select2.min.css') !!}
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
@section('content')
    <div class="row">
    {!! Form::model($post, ['route' => ['posts.update', $post->id],'method' => 'PUT']) !!}
        <div class="col-md-12">
            {{ Form::label('title','Title: ')}}
            {{ Form::text('title', null, ["class"=> "form-control"]) }}

            {{ Form::label('slug','Slug: ')}}
            {{ Form::text('slug', null, ["class"=> "form-control"]) }}

            {{ Form::label('category_id','Slug: ')}}
            {{ Form::select('category_id', $categories, null, ['class'=>'form-control']) }}

            {{ Form::label('tags', 'Tags:') }}
            {{ Form::select('tags[]', $tags, null, ['class'=>'form-control select2-multi', 'multiple'=>'multiple']) }}

            {{ Form::label('body','Body: ',['class'=>'form-spacing-top'])}}
            {{ Form::textarea('body',null, ["class"=> "form-control"]) }}
            
        </div>
        
        <div class="col-md-12">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created At: </dt>
                        <dl>{{ date('M,j,Y, h:ia', strtotime($post->created_at)) }}</d>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Last updated: </dt>
                        <dl>{{ date('M,j,Y, h:ia', strtotime($post->updated_at)) }}</dl>
                </dl>
                <hr>

                <div class="row">
                    <div class="col-sm-6">
                      {!! Html::linkRoute('posts.show','Cancel',array($post->id),array('class'=>'btn btn-danger ')) !!}
                    </div>

                    <div class="col-sm-6">
                        {{ Form::submit('Save Changes',['class'=>'btn btn-success']) }}
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
    </div>
@endsection

@section('scripts')
    {{!! Html::script('js/select2.min.js') !!}}
    <script type="text/javascript">
        $('.select2-multi').select2();

    </script>   
@endsection