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

                  <h4><a href="{{ url('/applications/')}}/{{$app->app_id}}"> {{ $app->first_name }} {{ $app->middle_name }} {{ $app->last_name }}</a></h4>
                  <p style="text-indent: 2em;">
                    Position: {{$app-> title}}
                  </p>
                  <p style="text-indent: 2em;">
                    Applied on {{$app->app_created_at}}
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
