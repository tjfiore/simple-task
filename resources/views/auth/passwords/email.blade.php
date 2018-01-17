@extends('layouts.app')

<!-- Main Content -->
@section('content')

<div class="container">
  <div class="card card-container">
    <center>
      <h5><em> Task At Hand</em></h5>
      Reset Password
    </center>

    <br><br>
    @if (session('status'))
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
            {{ session('status') }}
        </div>
    @endif

    <form class="form-signin" role="form" method="POST" action="{{ url('/password/email') }}">
      {{ csrf_field() }}

       <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
        <input type="email" name="email" id="email" class="form-control" placeholder="E-Mail address" value="{{ old('email')}}" autofocus>

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
      </div>


      <button  type="submit" class="btn btn-lg btn-primary btn-block btn-signin"><i class="fa fa-btn fa-envelope"></i> Send Password Reset Link</button>
    </form><!-- /form -->

    <a href="{{ url('/login') }}" class="btn btn-lg btn-primary btn-block btn-signin" style="padding-top:5px;"><i class="fa fa-btn fa-arrow-left" aria-hidden="true"></i>Back</a>
  </div><!-- /card-container -->
</div><!-- /container -->




@endsection
