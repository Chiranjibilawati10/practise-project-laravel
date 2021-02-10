@extends('main')
@section('title', '| Contact')

@section('content')
    <div class="row">
        <div class="col-md-12">
          <h1>Contact</h1>
            <form action="{{url('contact')}}" method="POST">
              {{ csrf_field() }}
                <div class="form-group">
                  <label name="email">Email</label>
                  <input id="email" class="form-control" name="email">
                </div>

                <div class="form-group">
                  <label name="subject">Subject</label>
                  <input id="subject" name="subject" class="form-control">
                </div>
                <div class="form-group ">
                  <label name="bodyMessage">Message</label>
                  <textarea name="bodyMessage" class="form-control" cols="5" rows="10"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>
@endsection