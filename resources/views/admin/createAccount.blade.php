@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" id="panelHeader">Create an Account</div>

                <div class="panel-body">

                  {!! Form::open() !!}
                  {!! csrf_field() !!}

                  <div class="form-group">
                    {!! Form::label('Email') !!}
                    {!! Form::email('email', null, ['class' => 'form-control']) !!}

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                  </div>


                  <!-- 0 = default user, 1 = faculty, 2 = committee member, 3 = committee chair -->
                  <div class="form-group">
                    {!! Form::label('Account Type:') !!}
                    {!! Form::label('Faculty') !!}
                    {!! Form::radio('flag', 1, ['class' => 'form-control']) !!}

                    {!! Form::label('Committee Member') !!}
                    {!! Form::radio('flag', 2, ['class' => 'form-control']) !!}
                  </div>

                  <div class="form-group">
                    {!! Form::label('Submit') !!}
                    {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
                  </div>

                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
