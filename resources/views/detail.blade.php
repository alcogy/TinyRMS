<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
  <title>Request detail</title>
</head>
<body>
  <x-header user-name="{{ $user->name }}" />
  <main>
    <div class="detail-wrap">
      <div class="main-card">
        <div class="content-wrap">
          <h2 class="title">{{ $request->title }}</h2>
          <p class="request-info">{{ $request->applicant->name }} | {{ $request->created_at->format('Y/m/d H:i') }}</p>
          
          <div class="body">
            {!! nl2br(e($request->body)) !!}
          </div>
          
          <div class="sub-content">
            <p class="label">Approver</p>
            <p class="body">{{ $request->approver->name }}</p>
          </div>

          <div class="sub-content">
            <p class="label">Status</p>
            <p class="body">
              @if ($request->is_completed == 1)
              <span class="status approved">Approved</span>
              @endif
              @unless ($request->is_completed == 1)
              <span class="status appliying">Applying</span>  
              @endunless
            </p>
          </div>
        </div>
      </div>
      @if ($request->approver_id == $user->id && !$request->is_completed) 
      <div class="sub-buttons">
        <form action="/approval" method="POST" class="approval-padding">
          @csrf
          <input type="hidden" value="{{$request->id}}" name="id">
          <input type="submit" class="button" value="Approval">
        </form>
      </div>
      @endif

      @if ($request->applicant_id == $user->id) 
      <div class="sub-buttons">
        <a href="/edit/{{ $request->id }}" class="button">Edit</a>
        <form action="/delete" method="POST" class="approval-padding" onsubmit="return confirm('Are you sure?');">
          @csrf
          <input type="hidden" value="{{$request->id}}" name="id">
          <input type="submit" class="button" value="Delete">
        </form>
      </div>
      @endif
    </div>
  </main>
</body>
</html>