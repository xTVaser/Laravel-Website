@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Create New Job</h1><hr/>

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
@endsection
