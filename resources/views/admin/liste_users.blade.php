@extends('trame.modele')

@section('title', 'Page Admin')

@section('contents')
    <a href="{{ route('logout') }}">Déconnection</a>
    <a href="{{ route('liste.enseignants') }}">liste des enseignants</a>
    <a href="{{ route('liste.cours') }}">gestion des cours</a>
    <a href="{{ route('liste.formations') }}">gestion des formations</a>
    <h1>Liste des demandes</h1>
    @forelse ($users as $user )
        @if ($loop->first)
            <table>
                <tr>
                    <th>ID</th>
                    <th>NOM</th>
                    <th>FORMATION</th>
                    <th>RÔLE</th>
                    <th colspan="2">ACTIONS</th>
                </tr>
        @endif
        <tr>
            <td style="font-weight: bold">{{ $user->id }}</td>
            <td>{{ $user->nom }} {{ $user->prenom }}</td>
            @if ($user->formation_id == null)
                <td>RIEN</td>
                <td>ENSEIGNANT</td>
            @else
                <td>{{ $user->formation }}</td>
                <td>ÉTUDIANT</td>
            @endif
            <td><a href="{{ route('admin.accept', ['id' => $user->id]) }}"> ACCEPTER</a></td>
            <td><a href="{{ route('admin.refuse', ['id' => $user->id]) }}"> REFUSER</a></td>
        </tr>
        @if ($loop->last)
            </table>
        @endif
    @empty
    @endforelse
@endsection
