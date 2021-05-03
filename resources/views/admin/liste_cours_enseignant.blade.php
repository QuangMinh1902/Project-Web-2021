@extends('trame.modele')
@section('title', 'Détail des cours')

@section('contents')
    <h1>Les cours participé</h1>

    @forelse ($cours as $c )
        @if ($loop->first)
            <table>
                <tr>
                    <th>COURS</th>
                    <th>FORMATION</th>
                    <th>RESPONSABLE</th>
                </tr>
        @endif
        <tr>
            <td>{{ $c->cours }}</td>
            <td>{{ $c->formation }}</td>
            <td>{{ $c->nom }} {{ $c->prenom }}</td>
        </tr>
        @if ($loop->last)
            </table>
        @endif
    @empty
        <p style="text-align: center; color:red;font-weight: bold;font-size: 20px">
            Cet enseignant ne participe à aucun cours
        </p>
    @endforelse
@endsection
