@extends('trame.modele')

@section('title', 'Liste des enseignants')

@section('contents')
    <ul>
        <li><a class="active" href="{{ route('liste.cours') }}">Back</a></li>
        <li style="float:right"> <a href="{{ route('logout') }}">Déconnection</a></li>
    </ul>
    <h1>Liste des enseignants</h1>
    @forelse ($enseignants as $enseignant )
        @if ($loop->first)
            <table>
                <tr>
                    <th>ID</th>
                    <th>ENSEIGNANT</th>
                    <th>COURS PARTICIPÉ</th>
                </tr>
        @endif
        <tr>
            <td style="font-weight: bold">{{ $enseignant->id }}</td>
            <td>{{ $enseignant->nom }} {{ $enseignant->prenom }}</td>
            <td><a href='{{ route('cours.detail', ['id' => $enseignant->id]) }}'>Détail</a></td>
        </tr>
        @if ($loop->last)
            </table>
        @endif
    @empty
        <p style="text-align: center; color:red;font-weight: bold;font-size: 20px">
            Il n'y a aucun enseignant
        </p>
    @endforelse
@endsection
