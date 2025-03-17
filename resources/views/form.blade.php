<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
  <title>Request form</title>
</head>
<body>
  <x-header />
  <main>
    <div class="form-wrap">
      <h2>Request Form</h2>
      <div class="main-card">
        <form action="/create" method="POST" class="editor">
          @csrf
          <div>
            <label>Title</label>
            <input type="text" placeholder="Enter title." name="title" value="">
          </div>
          <div>
            <label>Body</label>
            <textarea name="body" placeholder="Enter body"></textarea>
          </div>
          <div>
            <label>Approver</label>
            <select name="approver_id">
              @foreach($users as $user)
              <option value="{{ $user->id }}">{{ $user->name }}</option>
              @endforeach
            </select>
          </div>
          <div>
            <input type="submit" type="submit">
          </div>
        </form>
      </div>
    </div>
  </main>
</body>
</html>