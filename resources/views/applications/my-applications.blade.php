@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading" id="panelHeader">My Applications</div>
          <div class="panel-body">

                  <!-- Diplay the current applications -->
                  @forelse($applications as $app)
                  <h4>{{ $app->title }}</a></h4>
                  <p style="text-indent: 2em;">
                    Current Status: {{$app-> status}}
                  </p>
                  <p style="text-indent: 2em;">
                    <i>Applied on {{$app->app_created_at}}</i>
                  </p>
                    @empty
                    <p>No Applications to display</p>
                   @endforelse
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
