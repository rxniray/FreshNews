@extends('layouts/layout')
@section('content')
<div class="form__show">
    <div class="show__block">
<div class="block__with-image">
@if (strpos($image->name, '.mp4') !== false || strpos($image->name, '.avi') !== false || strpos($image->name, '.mov') !== false|| strpos($image->name, '.wmv') !== false || strpos($image->name, '.mkv') !== false)
        <video controls>
            <source src="{{ url('images/'.$image->name) }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    @else
        <img src="{{ url('images/'.$image->name) }}">
    @endif
</div>
<br>
<div>
    @if(auth()->id() == $image->user->id)
    <div class="manipulation__section">
        <a class="edit__button" href="{{route('image.edit', $image->id)}}">Edit</a>
        <a class="delete__button"href="{{route('image.destroy.confirm', $image->id)}}">Delete</a>
        @if(session()->has('confirm'))
            <p style="color: aliceblue; display: flex; gap: 10px; align-items: center;">
                Are you sure? <a class="delete__button" href="{{route('image.destroy', $image->id)}}">Yes</a>
            </p>
        @endif
    </div>
    @endif
    <p class="description__text">{{$image->description}}</p>
    <p class="tags__news">
        Tags: 
        @foreach ($image->tags as $tag)
            <a href="{{ route('tag', $tag->name) }}">{{$tag->name}} </a>
        @endforeach
    </p>
    <p class="main__news-text">{!! nl2br($image->textnews) !!}</p>
    <p class="autor__publication">
        Uploader:  <!-- Вивід аватара користувача -->
        <a href="{{route('profile', $image->user->id)}}" style="width: 40px; height: 40px;">
            
                <img src="{{ asset('avatars/' . (file_exists(public_path('avatars/' . $image->user->avatar)) ? $image->user->avatar : 'default-avatar.png')) }}" 
                    alt="User Avatar" 
                    style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
            
        </a>
        <span>></span>
        <a href="{{route('profile', $image->user->id)}}">{{ $image->user->name }}</a>
    </p>
     
    <p class="date__news">Date: {{ $image->created_at}}</p>
</div>
    </div>
</div>


@endsection