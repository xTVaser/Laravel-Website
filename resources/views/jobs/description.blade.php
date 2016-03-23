@extends('layouts.app')


@section('content')
<div class="container">
        <div class="col-md-8 col-md-offset-1">
          <div class="panel panel-default">
            <div class="panel-heading" id="panelHeader">Job Name</div>
            <div class="panel-body">

                    This page needs to have the full information for the job.<br>

                    {{ $job->title }}


                    Button for applying for only applicants.<br>

                    Button for editing for only members/chairs<br>

                    Links to Applications<br>

                    <a href="{{ url('/application/APPLICATION ID HERE')}}">Application #1</a>
            </div>
          </div>
        </div>
        <div class="col-md-3">
                <div class="panel panel-default">
                  <div class="panel-heading" id="panelHeader">Job Name</div>
                  <div class="panel-body">
                        <btn class="btn btn-primary">Submit Application</btn>

                        <a href="{{ url('/jobs/edit/')}}/{{ $job->id}}" class="btn btn-warning">Edit Job</a>
                  </div>
                </div>
        </div>
</div>
@endsection
