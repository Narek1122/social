@extends('app.master')

@section('title')
login page
@endsection

@section('content')
<h1>Hello Word</h1>
@include ('sidebar')
<ul>
  @foreach($users as $user)
  <li>{{$user['name']}} : {{$user['age']}}</li>
  @endforeach
</ul>

@endsection

@section('script')
<script src="/js/jscr.js">

</script>

@endsection

@section('style')
<link rel="stylesheet" href="/style/style.css">

@endsection
