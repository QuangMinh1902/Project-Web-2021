@extends('trame.modele')
@section('title', 'Liste des cours')

@section('contents')
    <a href="{{ route('create.cours') }}"> Créer un cours</a>
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
                    <th colspan="2">ACTIONS</th>
                </tr>
        @endif
        <tr>
            <td>{{ $c->intitule }}</td>
            <td>{{ $c->nom }} {{ $c->prenom }}</td>
            <td><a href="{{ route('modifier.cours', ['id' => $c->id]) }}"> Modifier</a></td>
            <td>Supprimer</td>
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
