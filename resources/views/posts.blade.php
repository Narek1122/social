@extends('app.master')


@section('content')

<form class="" action="{{route('store-posts')}}" method="post">
@csrf
<textarea name="data" rows="20" cols="20"></textarea>
<input type="submit" value="Save" class="btn btn-info">
</form>

@endsection
