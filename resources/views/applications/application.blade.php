@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" id="panelHeader">Application: {{ $application->title }}</div>
                        <div class="panel-body">



                    <a href="{{ url('/profile/')}}/{{ $profile->user_id }}">{{ $profile->first_name }} {{ $profile->middle_name }} {{ $profile->last_name }} </a>
                    <p><i>Originally applied on: {{ $application->app_created_at}} </i> </p>
                    <p><i>Application last updated on: {{ $application->app_updated_at}} </i> </p>


                    <!-- If its past the end date of applications -->
                    {!! Form::open() !!}
                    {!! csrf_field() !!}

                    @if( $application->status == 'Pending' )
                        <h2 style="color: #c4800c">Application Pending</h2>
                        @else
                        <h2 style="color: #427d22">Application Approved</h2>
                        @endif

                    @if($application->closing_date < (\Carbon\Carbon::now()))
                      <div class="form-group">
                              <input type="submit" name="approve" value="Approve Applicant" class="btn btn-success" >
                              <input type="submit" name="deny" value="Deny Applicant" class="btn btn-danger" >
                      </div>
                    @else
                    <b>Applications Still Open!</b><br><br>
                    @endif


                    <div class="form-group">
                          <input type="submit" name="dl_resume" value="Download Resume" class="btn btn-primary">
                          <input type="submit" name="dl_coverletter" value="Download Cover Letter" class="btn btn-primary">
                    </div>


                    <div class="form-group">
                            {!! Form::textarea('commentText', null, ['class' => 'form-control', 'placeholder' => 'Comment...']) !!}
                    </div>
                    <div class="form-group">
                            <input type="submit" name="post_comment" value="Post Comment" class="btn btn-info">
                    </div>


                    {!! Form::close() !!}

                    @forelse($comments as $comment)

                    <p style="text-indent: 1em;">
                      {{ $comment->body }}
                      {!! Form::open() !!}
                      {!! csrf_field() !!}
                      <div id="comment{{ $comment->id }}">
                      {!! Form::hidden('comment_id', $comment->id) !!}
                      {{-- Only if the comment matches the user id, aka it's their comment --}}
                      @if( $comment->author_id != $currentUser )
                      <input id="replyButton{{ $comment->id }}" type="button" value="Reply" class="btn btn-info" onclick="clickReply({{ $comment->id }});" />
                      @else
                      <input id="editButton{{ $comment-> id }}" type="button" value="Edit" class="btn btn-warning" onclick="clickEdit({{ $comment->id }}, '{{ $comment->body }}');" />
                      @endif
                        </div>
                      {!! Form::close() !!}
                    </p>


                    @empty
                    <p>No Comments</p>
                    @endforelse
            </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
