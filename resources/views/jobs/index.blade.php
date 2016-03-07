@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <h1>Job Listings</h1>
  </div>

  @foreach($jobs as $job)
    <h2>{{ $job->title }}</h2>
    <p>{{ $job->description }}</p>
    <p>{{ $job->salary }}</p>
  @endforeach
</div>
@endsection
