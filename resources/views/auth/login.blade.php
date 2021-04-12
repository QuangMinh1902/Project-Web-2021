@extends('trame.login_css')

@section('title', 'Page Login')

@section('contents')
    <div class="login">
        <div class="login-header">
            <h1>Sign in</h1>
            <form action="{{ route('login') }}" method="post">
                @csrf
        </div>
        <div class="login-form">
            <h3>Login:</h3>
            <input type="text" placeholder="Saisir votre login" name="login" value="{{ old('login') }}"><br>
            <span class="error">@error('login')
                    {{ $message }}
                @enderror
            </span>
            <h3>Password:</h3>
            <input type="password" placeholder="Saisir votre mot de passe" name="mdp" value="{{old('mdp')}}">
            <span class="error">@error('mdp')
                    {{ $message }}
                @enderror
            </span>
            <br>
            <br>
            <input type="submit" value="Login">
            <br>
            <br>
            <a class="sign-up" href="{{ route('role') }}">Create an account</a>
            </form>
        </div>
    </div>

@endsection
