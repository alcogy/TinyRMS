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
  <x-header user-name="{{ $user->name }}" />
  <main>
    <div class="form-wrap">
      <h2>Request Form</h2>
      <div class="main-card">
        <form action="{{ $req ? "/update" : "/create"}}" method="POST" class="editor">
          @csrf
          @if ($req != null)
            <input type="hidden" name="id" value="{{ $req->id }}">
          @endif
          <div>
            <label>Title</label>
            <input type="text" placeholder="Enter title." name="title" value="{{ $req ? $req->title : '' }}">
          </div>
          <div>
            <label>Body</label>
            <textarea name="body" placeholder="Enter body">{{ $req ? $req->body : '' }}</textarea>
          </div>
          <div>
            <label>Approver</label>
            <select name="approver_id">
              @foreach($users as $u)
              @if($u->id != $user->id)
              <option value="{{ $u->id }}" {{ $req ? $req->approver_id == $u->id ? 'selected' : '' : '' }}>
                {{ $u->name }}
              </option>
              @endif
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