@extends('trame.modele')

@section('title', ' Modification de la formation')

@section('contents')
    <h2>Modifier la formation</h2>
    <form method="post" action="{{ route('formation.update', ['id' => $formation->id]) }}">
        @method('put')
        <p>
            <label for="formation">Nom de la formation :</label>
            <input type="text" name="formation" value="{{ $formation->intitule }}">
            <span class="error">
                @error('formation')
                    {{ $message }}
                @enderror
            </span>
        </p>
        <p>
            <button type="submit">Envoyer</button>
        </p>
        @csrf
    </form>

@endsection
