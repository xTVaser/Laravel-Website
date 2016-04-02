@extends('layouts.app')
@section('content')

<div class="container">
  @if (count($errors) > 0)
    <div class="row alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" id="panelHeader">Create an Account</div>

                <div class="panel-body">

                        {!! Form::open() !!}
                        {!! csrf_field() !!}
                        <div class="form-group">
                          {!! Form::label('title') !!}
                          {!! Form::text('title', $job->title, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                          {!! Form::label('description') !!}
                          {!! Form::textarea('description', $job->description, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                          {!! Form::label('qualifications') !!}
                          {!! Form::textarea('qualifications', $job->qualifications, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                          {!! Form::label('salary') !!}
                          {!! Form::number('salary', $job->salary, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                          {!! Form::label('start_date') !!}
                          {!! Form::date('start_date', $job->start_date, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                          {!! Form::label('closing_date') !!}
                          {!! Form::date('closing_date', $job->closing_date, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                          {!! Form::label('job_type') !!}
                          {!! Form::text('job_type', $job->job_type, ['class' => 'form-control']) !!}
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
