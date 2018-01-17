@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="card card-container">
      <center>
        <h5>
          <em>Task At Hand</em> <br>
        </h5>
        Register
      </center>
      <br><br>

      <form class="form-signin" role="form" method="POST" action="{{ url('/register') }}">
        {{ csrf_field() }}

        <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
         <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ old('name') }}" autofocus>
         @if ($errors->has('name'))
             <span class="help-block">
                 <strong>{{ $errors->first('name') }}</strong>
             </span>
         @endif
       </div>

         <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
          <input type="email" name="email" id="email" class="form-control" placeholder="Email address" value="{{ old('email') }}" autofocus>
          @if ($errors->has('name'))
              <span class="help-block">
                  <strong>{{ $errors->first('name') }}</strong>
              </span>
          @endif
        </div>

        <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
          <input type="password" name="password" id="password" class="form-control" placeholder="Password">
          @if ($errors->has('password'))
              <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
              </span>
          @endif
       </div>

       <div class="{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
         <input type="password" name="password_confirmation" id="password-confirm" class="form-control" placeholder="Confirm Password">
         @if ($errors->has('password_confirmation'))
             <span class="help-block">
                 <strong>{{ $errors->first('password_confirmation') }}</strong>
             </span>
         @endif
      </div>

        <button  type="submit" class="btn btn-lg btn-primary btn-block btn-signin"><i class="fa fa-btn fa-user"></i>Sign Up</button>
      </form><!-- /form -->
    <p>  Already Have an Account?
      <a href="{{ url('/login') }}" class="forgot-password">Log In</a>
    </p>
    </div><!-- /card-container -->
  </div><!-- /container -->

@endsection
