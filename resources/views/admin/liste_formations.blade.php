@extends('trame.modele')
@section('title', 'Liste des formations')

@section('contents')
    <a href="{{ route('create.formation') }}"> Créer une formation</a>
    <h1>Liste des formations</h1>
    @forelse ($formations as $formation )
        @if ($loop->first)
            <table>
                <tr>
                    <th>ID</th>
                    <th>FORMATION</th>
                    <th colspan="2">ACTIONS</th>
                </tr>
        @endif
        <tr>
            <td style="font-weight: bold">{{ $formation->id }}</td>
            <td>{{ $formation->intitule }}</td>
            <td>MODIFIER</td>
            <td>SUPPRIMER</td>
        </tr>
        @if ($loop->last)
            </table>
        @endif
    @empty
        <p style="text-align: center; color:red;font-weight: bold;font-size: 20px">
            Il n'y a aucune formations
        </p>
    @endforelse
    {{ $formations->links() }}
@endsection
