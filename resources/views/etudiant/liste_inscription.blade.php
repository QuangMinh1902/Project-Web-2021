@extends('trame.modele')
@section('title', 'Vos inscriptions')

@section('contents')
    <h1> Liste des cours inscrits</h1>

    @forelse ($cours as $c )
        @if ($loop->first)
            <table>
                <tr>
                    <th>ID</th>
                    <th>L'INTITULÉ DU COURS</th>
                    <th>RESPONSABLE</th>
                </tr>
        @endif
        <tr>
            <td style="font-weight: bold">{{ $c->cours_id }}</td>
            <td>{{ $c->cours_name }}</td>
            <td>{{ $c->user_prenom }} {{ $c->user_nom }}</td>
        </tr>
        @if ($loop->last)
            </table>
        @endif
    @empty
        <p style="text-align: center; color:red;font-weight: bold;font-size: 20px">
            Vous n'avez pas encore inscrit dans aucun cours.
        </p>
    @endforelse
@endsection
