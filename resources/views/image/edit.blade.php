@extends('layouts/layout')
@section('content')
<div class="form__edit">
    @if($errors->any())
        <ul>
        @foreach($errors->all() as $error)
            <li style="color: red">{{$error}}</li>
        @endforeach
        </ul>
    @endif
    <div class="block-edit__with-image">
    @if (strpos($image->name, '.mp4') !== false || strpos($image->name, '.avi') !== false || strpos($image->name, '.mov') !== false|| strpos($image->name, '.wmv') !== false || strpos($image->name, '.mkv') !== false)
        <video controls>
            <source src="{{ url('images/'.$image->name) }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    @else
        <img src="{{ url('images/'.$image->name) }}">
    @endif
    </div>
    <form method="POST" action="{{ route('image.update', $image->id) }}" enctype="multipart/form-data">
    @csrf
        <div class="form__inputs-edit" >
            <input type="file" name="new_image" id="new_image">
            <input type="hidden" name="image_id" value="{{ $image->id }}"> 

            <div class="section__input-edit">
                <label for="description">Image description</label>
                <textarea type="text" name="description">{{$image->description}}</textarea>
            </div>
            <div class="section__input-edit">
                <label for="textnews">Text News</label>
                <textarea type="text" name="textnews">{{$image->textnews}}</textarea>
            </div>
            <div class="section__input-edit">
                <label for="tags">Tags</label>
                <textarea type="text" name="tags" >@foreach($image->tags as $tag){{$tag->name}} @endforeach</textarea>
            </div>
            <button type="submit" class="button__upload">Upload</button>
        </div>
        
        
    </form>

   
</div>
@endsection