@extends('trame.modele')
@section('title', 'Ajouter une séance')

@section('contents')
    <h2>Créer une séance de cours</h2>
    <form method="post" action="{{ route('store.seance') }}">
        @csrf
        <p>
            <label for="cours">Cours :</label>
            <select name="cours_id">
                <option value="">--Choisissez un cours--</option>
                @foreach ($cours as $c)
                    <option value="{{ $c->id }}">{{ $c->intitule }}</option>
                @endforeach
            </select>
            <span class="error">
                @error('cours_id')
                    {{ $message }}
                @enderror
            </span>
        </p>
        <p>
            <label for="date_debut">Date_debut :</label>
            <input type="datetime" name="start" value="{{ old('start') }}">
            <span class="error">
                @error('start')
                    {{ $message }}
                @enderror
            </span>
        </p>
        <p>
            <label for="date_fin">Date_fin :</label>
            <input type="datetime" name="end" value="{{ old('end') }}">
            <span class="error">
                @error('end')
                    {{ $message }}
                @enderror
            </span>
        </p>
        <p>
            <button type="submit">Envoyer</button>
        </p>
    </form>
@endsection
