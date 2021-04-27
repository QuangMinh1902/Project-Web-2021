@extends('trame.modele')

@section('title', ' Mise à jour de la séance de cours')

@section('contents')
    <h2>Modifier la séance de cours</h2>
    <form method="post" action="{{ route('seance.update', ['id' => $planning->id]) }}">
        @method('put')
        <p>
            Cours actuel : {{ \App\Models\Cours::where(['cours.id' => $planning->cours_id])->pluck('intitule')->first() }}
            <br><br>
            <label for="Cours">Le nouveau cours :</label>
            <select name="cours_id">
                <option value="">--Veuillez choisir un nouveau cours--</option>
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
            <input type="datetime" name="start" value="{{ $planning->date_debut }}">
            <span class="error">@error('start')
                    {{ $message }}
                @enderror
            </span>
        </p>

        <p>
            <label for="date_fin">Date_fin :</label>
            <input type="datetime" name="end" value="{{ $planning->date_fin }}">
            <span class="error">@error('end')
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
