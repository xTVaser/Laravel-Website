@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <h1>Job Listings</h1>
  </div>

<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading" id="panelHeader">Jobs</div>
        <div class="panel-body">
          <!-- if jobs exist do this -->
          @foreach($jobs as $job)
            <h2>{{ $job->title }}</h2>
            <p>{{ $job->description }}</p>
            <p>{{ $job->salary }}</p>
          @endforeach
          <!-- else do this:
            <h2>No Jobs available! Check back soon!</h2>
          -->
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
