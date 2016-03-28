@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" id="panelHeader">Application: {{ $application->title }}</div>



                                    <p>Name: {{ $profile->first_name }}</p>
                    <!-- If its past the end date of applications -->
                    {!! Form::open() !!}
                    {!! csrf_field() !!}

                    @if($application->closing_date < (\Carbon\Carbon::now()))
                    <div class="form-group">
                            <input type="submit" name="approve" value="Approve Applicant">
                    </div>
                    <div class="form-group">
                            <input type="submit" name="deny" value="Deny Applicant">
                    </div>
                    @else
                    <b>Applications Still Open!</b>
                    @endif

                    <div class="form-group">
                            <input type="submit" name="dl_resume" value="Download Resume">
                    </div>
                    <div class="form-group">
                            <input type="submit" name="dl_coverletter" value="Download Cover Letter">
                    </div>


                    <div class="form-group">
                            <input type="submit" name="post_comment" value="Post Comment">
                    </div>

                    <div class="form-group">
                            {!! Form::label('Post a Comment') !!}
                            {!! Form::textarea('commentText', null, ['class' => 'form-control', 'placeholder' => 'This guy sucks']) !!}


                    </div>

                    {!! Form::close() !!}


                    @forelse($comments as $comment)

                    <p style="text-indent: 1em;">
                      <b>Comment {{ $comment->body }}</b>
                    </p>

                    @empty
                    <p>No Comments</p>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
