@extends('layouts.app')


@section('content')
<div class="container">
  <div class="row">
  </div>

<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading" id="panelHeader">All Applications</div>
        <div class="panel-body">
                @foreach($applications as $application)

                  <h4><a href="{{ url('/application/APPLCATION ID HERE')}}">JOB TITLE</a></h4>
                  <p style="text-indent: 1em;">
                    <b>Job Description:</b>
                  </p>
                  <p style="text-indent: 2em;">
                  </p>
                  <p style="text-indent: 1em;">
                  </p>
                  <p style="text-indent: 1em;">
                  </p>
                @endforeach
        </div>
      </div>
    </div>
  </div>

</div>

@endsection
