@extends('app.master')



@section('content')
@include('messages')
<form class="" action="{{route('user.update')}}" method="post" enctype="multipart/form-data">
  <div class="form-group">
    @csrf
    <label for="name">Name:</label>
    <input type="text" class="form-control" name="name" placeholder="Name" value="{{$user->name}}">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" name="password" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="file">Image:</label>
    <input type="file" class="form-control" name="image" >
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
