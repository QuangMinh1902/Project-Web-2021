@extends('trame.modele')
@section('title', 'Vos Plannings')

@section('contents')
    <h1> Vos Plannings</h1>
    <a href="{{ route('ajout.seance') }}">Créer une séance</a>
    @forelse ($plannings as $p )
        @if ($loop->first)
            <table>
                <tr>
                    <th>ID</th>
                    <th>L'INTITULÉ DU COURS</th>
                    <th>RESPONSABLE</th>
                    <th>DATE_DEBUT</th>
                    <th>DATE_FIN</th>
                    <th colspan="2">ACTIONS</th>
                </tr>
        @endif
        <tr>
            <td style="font-weight: bold">{{ $p->cours_id }}</td>
            <td>{{ $p->cours_name }}</td>
            <td>{{ $p->user_prenom }} {{ $p->user_nom }}</td>
            <td>{{ $p->start }}</td>
            <td>{{ $p->end }}</td>
            <td><a href="{{ route('modifier.seance', ['id' => $p->id]) }}">Modifier</a></td>
            <td>Supprimer</td>
        </tr>
        @if ($loop->last)
            </table>
        @endif
    @empty
        <p style="text-align: center; color:red;font-weight: bold;font-size: 20px">
            Aucun Planning.
        </p>
    @endforelse
@endsection
