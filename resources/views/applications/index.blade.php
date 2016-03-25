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

                <!-- This page uses a joined table, jobs and applications joined on their ids
                        Use this query in workbench to see the result:
                                SELECT * FROM applications LEFT JOIN jobs ON applications.job_id=jobs.id; -->
                @forelse($appInfo as $app)

                  <h4><a href="{{ url('/application/APPLCATION ID HERE')}}"> {{ $app->title }}</a></h4>
                  <p style="text-indent: 1em;">
                    <b>Job Description:</b>
                  </p>
                  <p style="text-indent: 2em;">
                  </p>
                  <p style="text-indent: 1em;">
                  </p>
                  <p style="text-indent: 1em;">
                  </p>
                  @empty
                  <p>No users</p>
                  @endforelse
        </div>
      </div>
    </div>
  </div>

</div>

@endsection
