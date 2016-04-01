@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Apply</div>

                <div class="panel-body">

                        {!! Form::open(array('files' => true)) !!}
                        {!! csrf_field() !!}

                        <div class="form-group">
                                {!! Form::label('First Name') !!}
                                {!! Form::text('first_name', $profile->first_name, ['class' => 'form-control', 'placeholder' => 'John']) !!}
                        </div>

                        <div class="form-group">
                                {!! Form::label('Middle Name') !!}
                                {!! Form::text('middle_name', $profile->middle_name, ['class' => 'form-control', 'placeholder' => 'M.']) !!}
                        </div>

                        <div class="form-group">
                                {!! Form::label('Last Name') !!}
                                {!! Form::text('last_name', $profile->last_name, ['class' => 'form-control', 'placeholder' => 'Smith']) !!}
                        </div>

                        <div class="form-group">
                                {!! Form::label('Contact Email') !!}
                                {!! Form::email('contact_email', $profile->contact_email, ['class' => 'form-control', 'placeholder' => 'jsmith@algomau.ca']) !!}
                        </div>

                        <div class="form-group">
                          {!! Form::label('Resume') !!}
                          {!! Form::file('resume', null, ['class' => 'btn btn-primary form-control']) !!}
                        </div>

                        <div class="form-group">
                          {!! Form::label('Cover Letter') !!}
                          {!! Form::file('coverletter', null, ['class' => 'btn btn-primary form-control']) !!}
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
