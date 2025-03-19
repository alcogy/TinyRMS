<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
  <title>TinyRMS Sign in</title>
</head>
<body>
  <div class="signin-wrap">
    <div class="signin-form">
      <form action="/signin" method="POST">
        @csrf
        <h2 class="signin-title">Sign in</h2>
        <div class="email-wrap">
          <label>email</label>
          <input type="text" name="email" placeholder="Enter your email">
        </div>
        <div class="submit-wrap">
          <input type="submit" name="Sign in" class="button">
        </div>
      </form>
    </div>
  </div>
</body>
</html>