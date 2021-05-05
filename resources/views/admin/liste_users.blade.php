@extends('trame.modele')

@section('title', 'Page Admin')

@section('contents')
    <ul>
        <li><a class="active" href="{{ route('admin.home') }}">Home</a></li>
        <li><a href="{{ route('liste.enseignants') }}">Liste des enseignants</a></li>
        <li><a href="{{ route('liste.cours') }}">Gestion des cours</a></li>
        <li><a href="{{ route('liste.formations') }}">Gestion des formations</a></li>
        <li style="float:right"> <a href="{{ route('logout') }}">Déconnection</a>
        </li>
    </ul>
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
                <td>NULL</td>
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
        <p style="text-align: center; color:red;font-weight: bold;font-size: 20px">
            Il n'y a aucune demande à vérifier
        </p>
    @endforelse
@endsection
