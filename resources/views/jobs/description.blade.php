@extends('layouts.app')


@section('content')
<div class="container">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
            <div class="panel-heading" id="panelHeader">{{ $job->title }}</div>
            <div class="panel-body">

                    <!--This page needs to have the full information for the job. -->

                    <h2>{{ $job->title }}</h2>
                    <p>{{ $job->description }}</p>
                    <h3>Qualifications</h3>
                    <p>{{ $job->qualifications }}</p>
                    <h3>Salary</h3>
                    <p>{{ $job->salary }}</p>

                    <!-- If applicant -->
                    @if(Auth::user()->flag == 0)
                    <btn class="btn btn-primary"><a href="{{ url('/apply/')}}/{{ $job->id }}">Apply</a></btn>
                    @endif
                    <!-- Elseif member/chair -->
                    @if(Auth::user()->flag >= 2)
                    <btn class="btn btn-warning"><a href="{{ url('/jobs/edit/')}}/{{ $job->id }}">Edit Job</a></btn>
                    <!-- Links to Applications -->
                    <h3>Current Applications</h3>

                    <?php $var = 1; ?>
                    @forelse($applications as $app)
                    <a href="{{ url('/applications/')}}/{{ $app->app_id }}">Application #{{ $var++ }}</a><br>
                    @empty
                    <p>No Applications</p>
                    @endforelse
                    @endif

            </div>
          </div>
        </div>
</div>
@endsection
