<div class="header clearfix">
  <nav >
    <ul class="nav nav-pills float-right" style="margin-top: 10px;">
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#center" aria-expanded="false" aria-controls="collapseExample">
          <i class="fa fa-btn fa-plus" aria-hidden="true"></i>  New Task
       </a>
      </li>
      <li>
        <a class="nav-link" href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a>
      </li>
    </ul>
  </nav>

  <nav >
    <ul class="nav nav-pills float-left" style="margin-top:15px;">
    @if(!Auth::guest())
    <li class="nav-item"><h4> Hi, {{ Auth::user()->name }} </h4></li>
    @else
      <li>Hi, Guest</li>
    @endif
  </ul>
  </nav>

  <h3>Welcome To Task At Hand</h3>

</div>

<style media="screen">
  .header{
    background-color: #222;
    height: 130px;
    padding: 20px;
    color: white;
  }
  nav{  display: inline-block; }


  .fa-btn {    margin-right: 6px;     }

</style>
