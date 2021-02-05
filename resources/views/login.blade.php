<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    @include('messages')
    <form class="" action="/login" method="post">
        <div class="">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <input type="text" name="email" value="">
          <input type="text" name="password" value="">
          <input type="submit" name="" value="">
        </div>
    </form>
  </body>
</html>
