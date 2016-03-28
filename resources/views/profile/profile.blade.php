@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" id="panelHeader">{{ $profile->first_name }} {{ $profile->middle_name }} {{ $profile->last_name }}</div>

                <div class="panel-body">
                  <!-- Email -->
                  <p style="text-indent: 1em;">
                    <b>Email: </b>
                  </p>
                  <p style="text-indent: 2em;">
                    {{ $profile->contact_email }}
                  </p>
                  <!-- Description -->
                  <p style="text-indent: 1em;">
                    <b>Description:</b>
                  </p>
                  <p style="text-indent: 2em;">
                    <i>{{ $profile->description }}</i>
                  </p>
                  <!-- Job title -->
                  <p style="text-indent: 1em;">
                    <b>Title:</b>
                  </p>
                  <p style="text-indent: 2em;">
                      <i>{{ $profile->job_title}}</i>
                  </p>
                  <!-- Comapny -->
                  <p style="text-indent: 1em;">
                    <b>Company: </b>
                  </p>
                  <p style="text-indent: 2em;">
                      <i>{{ $profile->company}}</i>
                  </p>
                  <!-- Despartment -->
                  <p style="text-indent: 1em;">
                    <b>Department:</b>
                  </p>
                  <p style="text-indent: 2em;">
                      <i>{{ $profile->department}}</i>
                  </p>

                  <!-- Grouped  DOB and Geneder in a single category -->
                  <p style="text-indent: 1em;">
                    <b>General Information: </b>
                  </p>
                  <p style="text-indent: 2em;">
                    <i> Date of Birth: {{ $profile->birthdate }}</i>
                  </p>
                  <p style="text-indent: 2em;">
                    <i> Gender: {{ $profile->gender }}</i>
                  </p>





                    <button class="btn btn-primary"><a href="linkedinpagehere">My LinkedIn Page</a></button>
                    <button class="btn btn-primary"><a href="{{ url('/editprofile') }}">Edit</a></button>
                <div class="col-md-10 col-md-offset-1">
        </div>
      </div>
    </div>
</div>
@endsection
