@extends('trame.register_form')

@section('title', 'Création du compte')

@section('contents')
    <form method="post" action="{{ route('store.student') }}">
        @csrf
        <div id="login-box">
            <div class="left">
                <h1>Sign up</h1>
                <input type="text" name="nom" placeholder="Votre nom" value="{{ old('nom') }}">
                <span class="error">
                    @error('nom')
                        {{ $message }}
                    @enderror
                </span>
                <input type="text" name="prenom" placeholder="Votre prénom" value="{{ old('prenom') }}">
                <span class="error">
                    @error('prenom')
                        {{ $message }}
                    @enderror
                </span>
                <input type="text" name="login" placeholder="Votre login" value="{{ old('login') }}">
                <span class="error">
                    @error('login')
                        {{ $message }}
                    @enderror
                </span>
                <input type="password" name="mdp" placeholder="Votre mot de passe" value="{{ old('mdp') }}">
                <span class="error">
                    @error('mdp')
                        {{ $message }}
                    @enderror
                </span>
                <input type="password" name="mdp_confirmation" placeholder="Saisir à nouveau votre mdp"
                    value="{{ old('mdp_confirmation') }}">
                <span class="error">
                    @error('mdp_confirmation')
                        {{ $message }}
                    @enderror
                </span>
                <select name="formation_id">
                    <option value="">--Veuillez choisir une formation--</option>
                    @foreach ($formations as $formation)
                        <option value="{{ $formation->id }}">{{ $formation->intitule }}</option>
                    @endforeach
                </select>
                <span class="error">
                    @error('formation_id')
                        {{ $message }}
                    @enderror
                </span>
                <input type="submit" name="signup_submit" value="Register">
            </div>

        </div>
    </form>
@endsection
