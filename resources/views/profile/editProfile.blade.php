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
                                {!! Form::label('firstName') !!}
                                {!! Form::text('firstName', null, ['class' => 'form-control', 'placeholder' => 'John']) !!}
                        </div>

                        <div class="form-group">
                                {!! Form::label('middleName') !!}
                                {!! Form::text('middleName', null, ['class' => 'form-control', 'placeholder' => 'M.']) !!}
                        </div>

                        <div class="form-group">
                                {!! Form::label('lastName') !!}
                                {!! Form::text('lastName', null, ['class' => 'form-control', 'placeholder' => 'Smith']) !!}
                        </div>

                        <div class="form-group">
                                {!! Form::label('contactEmail') !!}
                                {!! Form::email('contactEmail', null, ['class' => 'form-control', 'placeholder' => 'jsmith@algomau.ca']) !!}
                        </div>

                        <div class="form-group">
                                <div class="input-group">
                                        {!! Form::label('linkedin') !!}
                                        {!! Form::text('linkedin', null, ['class' => 'form-control', 'placeholder' => 'jsmith']) !!}
                                        <span class="input-group-addon"><i class="fa fa-linkedin"></i></span>
                                </div>
                        </div>

                        <div class="form-group">
                                {!! Form::label('description') !!}
                                {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'jsmith@algomau.ca']) !!}
                        </div>

                        <div class="form-group">
                                {!! Form::label('contactEmail') !!}
                                {!! Form::text('contactEmail', null, ['class' => 'form-control', 'placeholder' => 'jsmith@algomau.ca']) !!}
                        </div>

                        <div class="form-group">
                                {!! Form::label('jobTitle') !!}
                                {!! Form::text('jobTitle', null, ['class' => 'form-control', 'placeholder' => 'Associate Professor']) !!}
                        </div>

                        <div class="form-group">
                                {!! Form::label('company') !!}
                                {!! Form::text('company', null, ['class' => 'form-control', 'placeholder' => 'Algoma University']) !!}
                        </div>

                        <div class="form-group">
                                {!! Form::label('department') !!}
                                {!! Form::text('department', null, ['class' => 'form-control', 'placeholder' => 'Computer Science']) !!}
                        </div>

                        <div class="form-group">
                                {!! Form::label('birthdate') !!}
                                {!! Form::date('birthdate', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                                {!! Form::label('department') !!}
                                {!! Form::text('department', null, ['class' => 'form-control', 'placeholder' => 'jsmith@algomau.ca']) !!}
                        </div>

                        <div class="form-group">
                                {!! Form::label('Gender') !!}
                                {!! Form::radio('gender', 'male', ['class' => 'form-control']) !!}
                                {!! Form::radio('gender', 'female', ['class' => 'form-control']) !!}
                                {!! Form::radio('gender', 'other', ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                                {!! Form::label('Gender') !!}
                                {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
                        </div>

                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
