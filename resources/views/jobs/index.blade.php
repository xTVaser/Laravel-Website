@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <h1>Job Listings</h1>
  </div>

  @foreach($jobs as $job)
    <p>{{ $job->title }}<p><br>
  @endforeach
</div>
@endsection
