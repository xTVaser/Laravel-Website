@extends('layouts.app')


@section('content')
<div class="container">
  <div class="row">
    <h1>Job Listings</h1>
  </div>

  @foreach($jobs as $job)
  <!-- Do not Display Jobs that are not available currently -->
    @if($job->closing_date > (\Carbon\Carbon::now()))
    <h4>{{ $job->title }}</h4>
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
    @endif
  @endforeach
</div>
@endsection
