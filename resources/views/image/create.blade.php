@extends('layouts/layout')
@section('content')
<div class="form__create">

<form method="POST" action="{{ route('store_image') }}" enctype="multipart/form-data">
    @csrf
       
        <br>
        @if($errors->any())
        <ul>
        @foreach($errors->all() as $error)
            <li style="color: red">{{$error}}</li>
        @endforeach
        </ul>
    @endif
        <div class="form__inputs-edit" >
            <label for="image">Select image
                <input type="file" name="image">
            </label>
            <div class="section__input">
                <label for="description">Image description</label>
                <textarea type="text" name="description"></textarea>
            </div>
            <div class="section__input">
                <label for="textnews">Text News</label>
                <textarea type="text" name="textnews"></textarea>
            </div>
            <div class="section__input">
                <label for="tags">Tags</label>
                <textarea type="text" name="tags" ></textarea>
            </div>
        </div>
        <br>
        <button  class="button__create" type="submit">Upload</button>

    </form>
</div>
    

    
@endsection