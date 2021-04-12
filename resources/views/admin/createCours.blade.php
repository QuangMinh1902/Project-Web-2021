@extends('trame.modele')

@section('title', 'Créer un nouveau cours')

@section('contents')
    <h2>Créer un cours</h2>
    <form method="post" action="{{ route('store.cours') }}">
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
            <label for="userID">Le/La responsable :</label>
            <select name="userID">
                <option value="">--Veuillez choisir un/une enseignant(e)--</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->nom }} {{$user->prenom}} - ID: {{$user->id}} </option>
                @endforeach
            </select>
            <span class="error">
                @error('userID')
                    {{ $message }}
                @enderror
            </span>
        </p>
        <p>
            <button type="submit">Envoyer</button>
        </p>
    </form>
@endsection
