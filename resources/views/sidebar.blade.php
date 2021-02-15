<ul>
  <li><a href="/">home</a></li>

  @if(!Auth::check())
  <li><a href="{{route('signup')}}">Sign Up</a></li>
  <li><a href="{{route('login')}}">Login</a></li>


@endif



</ul>
