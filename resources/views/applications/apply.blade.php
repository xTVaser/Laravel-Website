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
                          {!! Form::hidden('job_id', $job->id) !!}
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
