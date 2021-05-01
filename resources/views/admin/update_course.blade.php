@extends('trame.modele')

@section('title', ' Modification du cours')

@section('contents')
    <h2>Modifier le cours</h2>
    <form method="post" action="{{ route('cours.update', ['id' => $cours->id]) }}">
        @method('put')
        <p>
            <label for="cours">Nom du Cours :</label>
            <input type="text" name="cours" value="{{ $cours->intitule }}">
            <span class="error">
                @error('cours')
                    {{ $message }}
                @enderror
            </span>
        </p>
        <p>
            Responsable actuel :
            <span style="color: red">
                {{ \App\Models\User::where('users.id', $cours->user_id)->pluck('nom')->first() }}
                {{ \App\Models\User::where('users.id', $cours->user_id)->pluck('prenom')->first() }}
            </span>
            <br><br>
            <label for="user">Le nouveau responsable :</label>
            <select name="user">
                <option value="">--Veuillez choisir un/une responsable--</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->nom }} {{ $user->prenom }} - Id: {{$user->id}}</option>
                @endforeach
            </select>
            <span class="error">
                @error('user')
                    {{ $message }}
                @enderror
            </span>
        </p>
        <p>
            Formation actuelle :
            <span style="color: red">
                {{ \App\Models\Formation::where(['formations.id' => $cours->formation_id])->pluck('intitule')->first() }}
            </span>
            <br><br>
            <label for="formation">La nouvelle formation :</label>
            <select name="formation">
                <option value="">--Veuillez choisir une nouvelle formation--</option>
                @foreach ($formations as $formation)
                    <option value="{{ $formation->id }}">{{ $formation->intitule }}</option>
                @endforeach
            </select>
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
