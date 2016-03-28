@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" id="panelHeader">Application: {{ $application->title }}</div>


                    <!-- If its past the end date of applications -->
                    @if($application->closing_date < (\Carbon\Carbon::now()))
                      {!! Form::open() !!}
                      {!! csrf_field() !!}

                      <div class="form-group">
                              <input type="submit" name="approve" value="Approve Applicant">
                      </div>
                      <div class="form-group">
                              <input type="submit" name="deny" value="Deny Applicant">
                      </div>
                    @else
                    <b>Applications Still Open!</b>
                    @endif

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
