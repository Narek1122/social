@extends('app.master')

@section('content')

@include('sidebar');

<h1>Profile</h1>


<h2>{{$user->name}}</h2>
<h3>{{$user->email}}</h3>

<div class="row">
  <div class="col-md-12">
    <form class="" action="{{route('logout')}}" method="post">
      @csrf
      <input type="submit" class="btn btn-primary" value="Logout">
    </form>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <a href="{{route('post-create')}}" class="btn btn-info">New Post</a>
  </div>
</div>


@foreach($posts as $post)
<div class="row">
  <div class="col-md-12">
    <h2>{{$post->data}}</h2>
    <small>{{$post->created_at}}
    </small>
    <small>{{$post->user->name}}</small>

  </div>
</div>
@endforeach

@endsection
