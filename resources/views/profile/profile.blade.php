@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
<<<<<<< HEAD
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" id="panelHeader">{{ $profile->first_name }}</div>

                <div class="panel-body">



                    <button class="btn btn-primary"><a href="linkedinpagehere">My LinkedIn Page</a></button>
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" id="panelHeader">Profile: {{ $profile->first_name }}</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
=======
      <div class="col-sm-2">
        <div class="panel panel-default">
          <div class="panel-heading" id="panelHeader">Profile: {{ $profile->first_name }}</div>
          <div class="panel-body">
            <button class="btn btn-primary"><a href="linkedinpagehere">My LinkedIn Page</a></button>
          </div>
>>>>>>> html
        </div>
      </div>
    </div>
</div>
@endsection
