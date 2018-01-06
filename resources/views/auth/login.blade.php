@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="card card-container">
      <center><h4>Task At Hand</h4></center>
      <br><br>
      <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="profile pic" /> -->
      <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png"alt="profile pic" />
      <p id="profile-name" class="profile-name-card"></p>

      <form class="form-signin" role="form" method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}

         <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
          <input type="email" name="email" id="email" class="form-control" placeholder="Email address" value="{{ old('email')}}" autofocus>
          @if ($errors->has('email'))
              <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
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


        <div class="checkbox">
          <label>
            <input type="checkbox" name="remember"> Remember me
          </label>
        </div>

        <button  type="submit" class="btn btn-lg btn-primary btn-block btn-signin"><i class="fa fa-btn fa-sign-in"></i>Log In</button>
      </form><!-- /form -->

      <a href="{{ url('/register') }}" class="btn btn-lg btn-primary btn-block btn-signin" style="padding-top:5px;"><i class="fa fa-btn fa-user"></i>Sign Up</a>

      <a href="{{ url('/password/reset') }}" class="forgot-password">Forgot the password?</a>
    </div><!-- /card-container -->
  </div><!-- /container -->

@endsection
