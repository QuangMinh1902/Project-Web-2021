@extends('trame.modele')

@section('title', 'Créer une formation')

@section('contents')
    <ul>
        <li><a class="active" href="{{ route('liste.formations') }}">Back</a></li>
        <li style="float:right"> <a href="{{ route('logout') }}">Déconnection</a>
        </li>
    </ul>
    <h2>Créer un cours</h2>
    <form method="post" action="{{ route('store.formation') }}">
        @csrf
        <p>
            <label for="intitule">Intitulé :</label>
            <input type="text" name="intitule" value="{{ old('intitule') }}">
            <span class="error">@error('intitule')
                    {{ $message }}
                @enderror
            </span>
        </p>
        <p>
            <button type="submit">Envoyer</button>
        </p>
    </form>
@endsection
