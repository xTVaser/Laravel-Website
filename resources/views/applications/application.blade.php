@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" id="panelHeader">Application: {{ $application->title }}</div>

                <div class="panel-body">
                    Show profile of the user, whatever

                    <!-- If its past the end date of applications -->


                    {!! Form::open() !!}
                    {!! csrf_field() !!}

                    <div class="form-group">
                            <input type="submit" name="approve" value="Approve Applicant">
                    </div>
                    <div class="form-group">
                            <input type="submit" name="deny" value="Deny Applicant">
                    </div>

                    <div class="form-group">
                            <input type="submit" name="dl_resume" value="Download Resume">
                    </div>
                    <div class="form-group">
                            <input type="submit" name="dl_coverletter" value="Download Cover Letter">
                    </div>


                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
