<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
  <title>TinyRMS</title>
</head>
<body>
  <x-header user-name="{{ $user->name }}" />
  <main>
    <div class="content-wrap">
      <div class="list-head">
        <h2>Request List</h2>
        <a href="/edit">Add Request</a>
      </div>
      <div class="main-card">
        <table class="request-table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Title</th>
              <th>Requested Date</th>
              <th>Applicant</th>
              <th>Approver</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($requests as $req)
            <tr>
              <td>{{ $req->id }}</td>
              <td><a href="/request/{{  $req->id }}">{{ $req->title }}</a></td>
              <td>{{ $req->created_at->format('Y/m/d H:i') }}</td>
              <td>{{ $req->applicant->name }}</td>
              <td>{{ $req->approver->name }}</td>
              <td>
                @if ($req->is_completed == 1)
                <span class="status approved">Approved</span>
                @endif
                @unless ($req->is_completed == 1)
                <span class="status appliying">Applying</span>  
                @endunless
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </main>
</body>
</html>