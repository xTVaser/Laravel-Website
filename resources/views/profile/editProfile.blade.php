@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" id="panelHeader">Edit Profile</div>

                <div class="panel-body">

                        {!! Form::open() !!}
                        {!! csrf_field() !!}

                        <div class="form-group">
                                {!! Form::label('First Name') !!}
                                {!! Form::text('first_name', $profile->first_name, ['class' => 'form-control', 'placeholder' => 'John']) !!}
                        </div>

                        <div class="form-group">
                                {!! Form::label('Middle Name') !!}
                                {!! Form::text('middle_name', null, ['class' => 'form-control', 'placeholder' => 'M.']) !!}
                        </div>

                        <div class="form-group">
                                {!! Form::label('Last Name') !!}
                                {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Smith']) !!}
                        </div>

                        <div class="form-group">
                                {!! Form::label('Contact Email') !!}
                                {!! Form::email('contact_email', null, ['class' => 'form-control', 'placeholder' => 'jsmith@algomau.ca']) !!}
                        </div>

                        <div class="form-group">
                                <div class="input-group">
                                        {!! Form::label('LinkedIn') !!}

                                        <div class="input-group">
                                                {!! Form::text('linkedin_link', null, ['class' => 'form-control', 'placeholder' => 'jsmith']) !!}
                                                <span class="input-group-addon"><i class="fa fa-linkedin"></i></span>
                                        </div>
                                </div>
                        </div>

                        <div class="form-group">
                                {!! Form::label('Description') !!}
                                {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'jsmith@algomau.ca']) !!}
                        </div>

                        <div class="form-group">
                                {!! Form::label('Job Title') !!}
                                {!! Form::text('job_title', null, ['class' => 'form-control', 'placeholder' => 'Associate Professor']) !!}
                        </div>

                        <div class="form-group">
                                {!! Form::label('Company') !!}
                                {!! Form::text('company', null, ['class' => 'form-control', 'placeholder' => 'Algoma University']) !!}
                        </div>

                        <div class="form-group">
                                {!! Form::label('Department') !!}
                                {!! Form::text('department', null, ['class' => 'form-control', 'placeholder' => 'Computer Science']) !!}
                        </div>

                        <div class="form-group">
                                {!! Form::label('Birthday') !!}
                                {!! Form::date('birthdate', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                                {!! Form::label('Male') !!}
                                {!! Form::radio('gender', 'Male', ['class' => 'form-control']) !!}

                                {!! Form::label('Female') !!}
                                {!! Form::radio('gender', 'Female', ['class' => 'form-control']) !!}

                                {!! Form::label('Other') !!}
                                {!! Form::radio('gender', 'Other', ['class' => 'form-control']) !!}
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
