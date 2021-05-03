@extends('trame.modele')

@section('title', 'Liste des enseignants')

@section('contents')
    <a href="{{ route('logout') }}">Déconnection</a>
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
    @endforelse
@endsection
