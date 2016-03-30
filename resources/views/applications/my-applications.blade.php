@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading" id="panelHeader">My Applications</div>
          <div class="panel-body">

                  @forelse($applications as $app)

                    <p>{{ $profile->first_name }} {{ $app->status }}</p>

                    @empty
                    <p>Go Apply for something</p>
                   @endforelse
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
