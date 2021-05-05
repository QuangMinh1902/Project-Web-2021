@extends('trame.modele')

@section('title', 'Page User')

@section('contents')
    <form method="post" action="{{ route('update.profile', ['id' => Auth::user()->id]) }}">
        @csrf
        <label for="Nom">Nom :</label>
        <input type="text" name="nom" placeholder="Votre nom" value="{{ Auth::user()->nom }}">
        <span class="error">
            @error('nom')
                {{ $message }}
            @enderror
        </span>
        <label for="Prenom"> Prénom :</label>
        <input type="text" name="prenom" placeholder="Votre prénom" value="{{ Auth::user()->prenom }}">
        <span class="error">
            @error('prenom')
                {{ $message }}
            @enderror
        </span>
        <input type="submit" name="signup_submit" value="Save">
    </form>
@endsection
