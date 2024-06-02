@extends('layouts.auth')
@section('content')
<div class="profile-user__box">
    <div class="profile__blocks">
        <div class="profile__block-first">
            <div style="width: 230px; height: 230px;">
                <img src="{{ asset('avatars/' . ($user->avatar ?? 'default-avatar.png')) }}" 
                    alt="User Avatar" 
                    style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
            </div>
           
        </div>
        <div class="profile__block-second">
            <div class="profile__nickname">
                <h1 class="autor__posts-profile">{{$user->name}}</h1> 
                @if(auth()->check() && auth()->user()->id === $user->id)
                    <p class="edit__info-autor"><a href="{{ route('user.edit', auth()->user()->id) }}">Update info</a></p>
                @endif
            </div>
            <div class="profile__stats">
                <div class="profile__status-info">
                    <p>Posts:</p>
                    <p class="status-info">{{ $postCount }}</p>
                </div>
                <div class="profile__status-info">
                    <p>Tags:</p>
                    <p class="status-info">{{ $tagCount }}</p>
                </div>
            </div>
            <div class="profile__about-user">
                <p class="about-user">{{$user->realnamename}}</p> 
                <p class="about-user">{!! nl2br(e($user->aboutuser)) !!}</p> 
            </div>
            
        </div>
    </div>    
</div>

<form class="autor__post-search-form" method="GET" action="{{ route('profile.search', $user->id) }}">
    @csrf
    <li>
        <input class="autor__post-search-input" type="text" name="search" placeholder="Search...">
    </li>
</form>
@if(auth()->check() && auth()->user()->id === $user->id)
    <p class="upload__image-autor"><a href="{{ route('create_image') }}">Upload News</a></p>
@endif
<div class="prifile__post-row" style="display:flex;flex-wrap:wrap;margin:20px; justify-content: center;">
    @foreach ($images as $image)
        <div class= "post__block" style="width: 200px;margin:10px">
            <div class="post__block-content">
                <a href="{{ route('show_image', $image->id) }}">
                @if (strpos($image->name, '.mp4') !== false || strpos($image->name, '.avi') !== false || strpos($image->name, '.mov') !== false|| strpos($image->name, '.wmv') !== false || strpos($image->name, '.mkv') !== false)
                <video controlsList="nodownload">
                    <source src="{{ url('images/'.$image->name) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                @else
                    <img src="{{ url('images/'.$image->name) }}" >
                @endif
                </a>
                <h3><a href="{{ route('show_image', $image->id) }}">  {{ Str::limit($image->description, 40) }}</a></h3>
                <p><a href="{{ route('show_image', $image->id) }}"> {{ Str::limit($image->textnews, 50) }}</a></p>
            </div>
            <div class="manipulation__section">
                @if(auth()->id() == $image->user->id)
                <a class="edit__button" href="{{route('image.edit', $image->id)}}">Edit</a>
                <a class="delete__button"href="{{route('image.destroy.confirm', $image->id)}}">Delete</a>
                @if(session()->has('confirm'))
                    <p style="color: aliceblue; display: flex; gap: 10px; align-items: center;">
                        Are you sure? <a class="delete__button" href="{{route('image.destroy', $image->id)}}">Yes</a>
                    </p>
                @endif
                @endif
            </div>
        </div>
    @endforeach
</div>
<div class="pagination__block">
    {{ $images->links() }}       
</div>
@endsection