@extends('layouts/auth')
@section('content')
<div class="regist__container">
<h1 style="text-align: center">Login</h1>
    
    @if ($errors->any())
        <div style="text-align: center">
            @foreach ($errors->all() as $error)
                <p style="color:red;">{{$error}}</p>
            @endforeach
        </div>
    @elseif(session()->has('message'))
        <div style="text-align: center">
            <p style="color:red;">{{session()->get('message')}}</p>
        </div>
    @endif

    <div style="display: flex; justify-content: center;">
        <form method="POST" action="{{ route('auth.login.post') }}">
            @csrf
            <div style="display: flex">
                <div style="">
                    <label for="name" >Name:</label>
                    <input type="text" name="name" style="margin: 5px 0 20px 0;">
                    <label for="password">Password:</label>
                    <input type="password" name="password" style="margin: 5px 0 20px 0;">
                </div>
            </div>
            <div style=" display: flex; flex-direction: row; justify-content: end;">
                <button style="cursor:pointer; width: 200px" type="submit">Login</button>
            </div>
        </form>
    </div>
</div>
    
@endsection