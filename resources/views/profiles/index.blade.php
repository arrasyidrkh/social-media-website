@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="/storage/{{ $user->avatar }}" class="rounded-circle" width="150px">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $user->name }}</h1>
                <a href="/post/create">Add New Post</a>
            </div>
                <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
            <div class="d-flex">
                <div class="pr-5"><b>{{ $user->posts->count() }}</b> posts</div>
            </div>
            <div class="pt-2 font-weight-bold">{{ $user->title }}</div>
            <div class="">
                {{ $user->description }}
            </div>
            <div><a href="#">{{ $user->url }}</div>
        </div>
    </div>

    <div class="row pt-5">
        @foreach($user->posts as $post)
          <div class="col-4 pb-4">
              <a href="/p/{{ $post->id }}">
                  <img src="/storage/{{ $post->image }}" class="w-100">
              </a>
          </div>
        @endforeach
    </div>
</div>
@endsection
