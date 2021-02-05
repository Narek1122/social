@extends('app.master')

@section('content')

@include('messages')

<form class="" action="/registr" method="post">
  @csrf
  <div class="">
    <label for="">name</label>
    <input type="text" name="name" value="">
  </div>
  <div class="">
    <label for="">email</label>
    <input type="text" name="email" value="">
  </div>
  <label for="">age</label>
  <input type="text" name="age" value="">
  <label for="">password</label>
  <input type="text" name="password" value="">
  <input type="submit" name="" value="Submit">
</form>
@endsection
