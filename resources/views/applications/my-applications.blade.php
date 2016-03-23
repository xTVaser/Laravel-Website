@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <h1>My Applications</h1>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading" id="panelHeader">Jobs</div>
          <div class="panel-body">
            <!-- if applications exist do this
            <h2>{{ $applications->}}
                 else do this:
              <h2>No Jobs available! Check back soon!</h2>
            -->
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
