@extends('layouts/auth')
@section('content')
       
    <div class="user__edit-block">
        <div class="user__container">
            <div class="center-user__block">
                <h2 class="who__edit-user">Edit  <span>{{$user->name}}</span> Information</h2>

                <form method="POST" action="{{ route('user.update', ['id' => $user->id]) }}" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')
                    <div class="user__section-first">
                        <div>
                        @if (file_exists(public_path('avatars/' . $user->avatar)) && $user->avatar)
                            <div style="width: 230px; height: 230px;">
                                <img src="{{ asset('avatars/' . $user->avatar) }}" alt="User Avatar" class="img-thumbnail" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
                            </div>
                        @else
                            <div style="width: 230px; height: 230px;">
                                <img src="{{ asset('avatars/default-avatar.png') }}" alt="Default Avatar" class="img-thumbnail" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
                            </div>
                        @endif

                            <div class="user-avatar__change">
                                <label for="avatar" class="lable__avatar"><span>{{$user->name}}</span></label>
                                <div class="avatar__upload-block">
                                <input id="avatar" type="file" class="avatar__input @error('avatar') is-invalid @enderror" name="avatar">
                                    @error('avatar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="user__section-second">

                            <div class="inut-info__user-block">
                                <label for="name" class="user__desc-input">Name</label>
                                <div class="">
                                    <input id="name" type="text" class="user__input @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="inut-info__user-block">
                                <label for="realnamename" class="user__desc-input">Real Name</label>
                                <div class="col-md-6">
                                    <input id="realnamename" type="text" class="user__input @error('realnamename') is-invalid @enderror" name="realnamename" value="{{ old('realnamename', $user->realnamename) }}" autocomplete="realnamename">
                                    @error('realnamename')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="inut-info__user-block">
                                <label for="aboutuser" class="user__desc-input">About User</label>
                                <div class="">
                                    <textarea id="aboutuser" class="user__input @error('aboutuser') is-invalid @enderror" name="aboutuser" autocomplete="aboutuser">{{ old('aboutuser', $user->aboutuser) }}</textarea>
                                    @error('aboutuser')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>
                       
                        </div>
                        
                    </div>
                    <div class="button-edit__user">
                        <button type="submit" class="confirm-edit__user">Save</button>
                    </div>
                
                       
                 
                </form>
               
            </div>
            
        </div>
    </div>

@endsection
