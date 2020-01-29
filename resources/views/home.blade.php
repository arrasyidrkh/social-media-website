@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
          @foreach($posts as $p)
            <div class="card">

                <div class="card-header">
                    <img src="/storage/{{$p->user->avatar}}" alt="profilepicture" class="rounded-circle" width="5%" height="40%">&ensp;
                    {{$p->user->name}}
                </div>

                <div class="card-body p-0">
                    <img src="/storage/{{$p->image}}" class="w-100">
                </div>

                <div class="card-footer">
                    <div class="form-inline d-flex">
                        <i class="fa fa-heart-o fa-2x pb-2 pr-2"></i>
                        <i class="fa fa-comment-o fa-2x pb-3 pl-2"></i>
                    </div>
                    <div class="d-flex">
                        <div class="pr-5"><b>10</b> likes</div>
                    </div>
                    <b>{{$p->user->email}}</b>
                    <br>
                    {{$p->caption}}

                    @foreach($comment as $c)
                      @if($c->post_id == $p->id)
                        <div class="user-comment pb-2 pr-2">
                            <b>{{ $c->user->email }}</b>&nbsp;&nbsp;<span class=""> {{ $c->comment }} </span>
                        </div>
                      @endif
                    @endforeach

                    <form action="/home" method="post">
                      @csrf
                      <input type="hidden" name="post_id" value="{{ $p->id }}">
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
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                </div>
            </div>
            <br><br>
          @endforeach
        </div>
    </div>
</div>
@endsection
