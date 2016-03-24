@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Apply</div>

                <div class="panel-body">

                        {!! Form::open() !!}
                        {!! csrf_field() !!}
                        <div class="form-group">
                          {!! Form::file('resume', null, ['class' => 'btn btn-primary form-control']) !!}
                        </div>

                        <div class="form-group">
                          <!-- this is going to be a hidden field that takes in the job object.
                          when the application is submitted this is sent with it so that the system knows what job the person is applying for.
                          write da khode will :D -->
                        </div>

                        <div class="form-group">
                          {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
                        </div>



                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
