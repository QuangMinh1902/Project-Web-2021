@extends('trame.modele')
@section('title', 'Liste des cours')

@section('contents')
    <a href="{{ route('create.cours') }}"> Créer un cours</a>
    <a href="{{ route('enseignant.cours') }}"> Liste des cours par enseignant</a>
    <h1>Liste des cours</h1>
    <a href="{{ route('liste.cours') }}">
        <button type="button" title="Refresh page"> Refresh</button>
    </a>
    <form class="form-wrapper cf" action="{{ route('liste.cours') }}" method="GET" role="search">
        <input type="text" name="term" placeholder="Rechercher un cours" id="term" required>
        <button type="submit">Rechercher</button>
    </form>
    @forelse ($cours as $c )
        @if ($loop->first)
            <table>
                <tr>
                    <th>L'INTITULÉ</th>
                    <th>RESPONSABLE</th>
                    <th>FORMATION</th>
                    <th colspan="2">ACTIONS</th>
                    <th>ASSOCIER À UN ENSEIGNANT</th>
                </tr>
        @endif
        <tr>
            <td>{{ $c->cours_name }}</td>
            <td>{{ $c->user_nom }} {{ $c->user_prenom }}</td>
            <td>{{ $c->formation }}</td>
            <td><a href="{{ route('modifier.cours', ['id' => $c->cours_id]) }}"> Modifier</a></td>
            <td>
                <form action="{{ route('suppression.cours', ['id' => $c->cours_id]) }}" method="post"
                    onsubmit="return confirm('Are you sure ? ')">
                    @method('delete')
                    @csrf
                    <button>
                        Supprimer
                    </button>
                </form>
            </td>
            <td>
                <form action="{{ route('associer.cours', ['id' => $c->cours_id]) }}">
                    <select name="user_id">
                        <option value="">--Veuillez choisir un enseignant--</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->nom }} {{ $user->prenom }} -
                                ID: {{ $user->id }}</option>
                        @endforeach
                    </select>
                    <button type="submit"> Save</button>
                </form>
            </td>
        </tr>
        @if ($loop->last)
            </table>
        @endif
    @empty
        <p style="text-align: center; color:red;font-weight: bold;font-size: 20px">
            Il n'y a aucun cours
        </p>
    @endforelse
    {{ $cours->links() }}
@endsection
