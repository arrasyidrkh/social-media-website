@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{ $posts->image }}" class="w-100">
        </div>
        <div class="col-4">
            <div>
                <h3>{{ $posts->user->name }}</h3>

                <p>{{ $posts->caption }}</p>
            </div>
            <div class="komentar">
                @foreach($comments as $c)
                <div class="user-comment pb-2 pr-2">
                    <b>{{ $c->user->email }}</b>&nbsp;&nbsp;<span class=""> {{ $c->comment }} </span>
                </div>
                @endforeach
            </div>
            <form action="/home" method="post">
              @csrf
              <input type="hidden" name="post_id" value="{{ $posts->id }}">
              <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
              <div class="form-inline pt-2">
                  <input id="comment"
                  type="text"
                  class="form-control @error('comment') is-invalid @enderror"
                  name="comment"
                  value="Add Comment.." required
                  autocomplete="comment" autofocus>

                  @error('comment')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror

                  <button class="btn btn-primary">Post</button>
              </div>
            </form>
        </div>
    </div>
</div>
@endsection
