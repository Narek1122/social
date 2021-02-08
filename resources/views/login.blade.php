@extends('app.master')

@section('content')
<<<<<<< HEAD
=======

>>>>>>> 20ad98b7bf5364ecce58f294dc541a80291e4234
    @include('messages')
    <form class="" action="{{route('post-login')}}" method="post">
        <div class="">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <input type="text" name="email" value="">
          <input type="text" name="password" value="">
          <input type="submit" name="" value="login">
        </div>
    </form>
<<<<<<< HEAD
=======
  </body>
</html>
>>>>>>> 20ad98b7bf5364ecce58f294dc541a80291e4234
@endsection
