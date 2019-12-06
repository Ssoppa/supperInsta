@extends('layouts.app')

@section('content')
<div class="container" style="padding: 0 95px 0 95px;">
    <div class="row">
        <div class="col-3 p-5">
            <img class="rounded-circle w-100" src="{{ $user->profile->profileImage() }}" alt="">
        </div>
        
        <div class="col-9 p-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-3">
                    <h3 class="text-dark">{{ $user->username }}</h3>
                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                </div>
                
                @can('update', $user->profile)
                    <a href="/p/create">Add new Post</a>
                @endcan
                
            </div>

            @can('update', $user->profile)
                <a href="/profile/{{ $user->id }}/edit">Edit profile</a>
            @endcan
            
            <div class="d-flex">
                <div class="pr-5"><strong>{{ $postsCount}}</strong> publicações</div>
                <div class="pr-5"><strong>{{ $followersCount}}</strong> seguidores</div>
                <div class="pr-5">A seguir <strong>{{ $followingCount }}</strong></div>
            </div>
            <div class="pt-3"><strong>{{ $user->profile->title}}</strong></div>
            <div>
            {{ $user->profile->description}}
            </div>
            <div><a href="#">{{ $user->profile->url }}</a></div>
        </div>
    </div>

    <div class="row pt-5">
        @foreach ($user->posts as $post)
            <div class="col-4 pb-4">
                <a href="/p/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" class="w-100">
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
