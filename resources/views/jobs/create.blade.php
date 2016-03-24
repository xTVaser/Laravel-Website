@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" id="panelHeader">Create a Job</div>

                <div class="panel-body">

                          {!! Form::open() !!}
                          {!! csrf_field() !!}
                          <div class="form-group">
                            {!! Form::label('title') !!}
                            {!! Form::text('title', null, ['class' => 'form-control']) !!}
                          </div>
                          <div class="form-group">
                            {!! Form::label('description') !!}
                            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                          </div>

                          <div class="form-group">
                            {!! Form::label('qualifications') !!}
                            {!! Form::textarea('qualifications', null, ['class' => 'form-control']) !!}
                          </div>

                          <div class="form-group">
                            {!! Form::label('salary') !!}
                            {!! Form::number('salary', null, ['class' => 'form-control']) !!}
                          </div>

                          <div class="form-group">
                            {!! Form::label('start_date') !!}
                            {!! Form::date('start_date', null, ['class' => 'form-control']) !!}
                          </div>

                          <div class="form-group">
                            {!! Form::label('closing_date') !!}
                            {!! Form::date('closing_date', null, ['class' => 'form-control']) !!}
                          </div>

                          <div class="form-group">
                            {!! Form::label('job_type') !!}
                            {!! Form::text('job_type', null, ['class' => 'form-control']) !!}
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
