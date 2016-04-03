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
                                {!! Form::textarea('description', $profile->description, ['class' => 'form-control', 'placeholder' => 'jsmith@algomau.ca']) !!}
                        </div>

                        <div class="form-group">
                                {!! Form::label('Job Title') !!}
                                {!! Form::text('job_title', $profile->job_title, ['class' => 'form-control', 'placeholder' => 'Associate Professor']) !!}
                        </div>

                        <div class="form-group">
                                {!! Form::label('Company') !!}
                                {!! Form::text('company', $profile->company, ['class' => 'form-control', 'placeholder' => 'Algoma University']) !!}
                        </div>

                        <div class="form-group">
                                {!! Form::label('Department') !!}
                                {!! Form::text('department', $profile->department, ['class' => 'form-control', 'placeholder' => 'Computer Science']) !!}
                        </div>

                        <div class="form-group">
                                {!! Form::label('Birthday') !!}
                                {!! Form::date('birthdate', $profile->birthdate, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">

                                {!! Form::label('gender', 'Gender') !!}

                                <div class="form-inline">
                                        <div class="radio">
                                          @if($profile->gender == 'Male')
                                            {{ Form::radio('gender', 'Male', true) }}
                                            {{ Form::label('Male') }}
                                          @else
                                            {{ Form::radio('gender', 'Male', false) }}
                                            {{ Form::label('Male') }}
                                          @endif
                                        </div>
                                        <div class="radio">
                                          @if($profile->gender == 'Female')
                                            {{ Form::radio('gender', 'Female', true) }}
                                            {{ Form::label('Female') }}
                                          @else
                                            {{ Form::radio('gender', 'Female', false) }}
                                            {{ Form::label('Female') }}
                                          @endif
                                        </div>
                                        <div class="radio">
                                          @if($profile->gender == 'Other')
                                            {{ Form::radio('gender', 'Other', true) }}
                                            {{ Form::label('Other') }}
                                          @else
                                            {{ Form::radio('gender', 'Other', false) }}
                                            {{ Form::label('Other') }}
                                          @endif
                                        </div>
                                </div>
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
