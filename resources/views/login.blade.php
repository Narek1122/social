@extends('app.master')

@section('content')

    @include('messages')
    <form class="" action="{{route('post-login')}}" method="post">
        <div class="">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <input type="text" name="email" value="">
          <input type="text" name="password" value="">
          <input type="submit" name="" value="login">
        </div>
    </form>


  </body>
</html>

@endsection
