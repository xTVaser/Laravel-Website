@extends('layouts.app')


@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading" id="panelHeader">Job Listings</div>
        <div class="panel-body">
                @foreach($jobs as $job)
                <!-- Do not Display Jobs that are not available currently; expired jobs can be seen by elevated users -->
                  @if($job->closing_date > (\Carbon\Carbon::now()) || Auth::user()->flag >=2)
                  <h4><a href="{{ url('/jobs/description/')}}/{{ $job->id }}">{{ $job->title }}</a></h4>
                  <p style="text-indent: 1em;">
                    <b>Job Description:</b>
                  </p>
                  <p style="text-indent: 2em;">
                    {{ $job->description }}
                  </p>
                  <p style="text-indent: 1em;">
                    <b>Salary:</b> ${{ $job->salary }}
                  </p>
                  <p style="text-indent: 1em;">
                    <i>Applications open from {{ $job->start_date }} to {{ $job->closing_date}}</i>
                  </p>
                <p>
                    <hr>
                </p>
                  @endif
                @endforeach
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
