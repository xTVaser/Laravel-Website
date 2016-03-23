@extends('layouts.app')


@section('content')
<div class="container">
  <div class="row">
    <h1>Job Name</h1>
  </div>

        This page needs to have the full information for the job.<br>

        {{ $job->title }}


        Button for applying for only applicants.<br>

        Button for editing for only members/chairs
<br>



        Links to Applications<br>

        <a href="{{ url('/application/APPLICATION ID HERE')}}">Application #1</a>





</div>
@endsection
