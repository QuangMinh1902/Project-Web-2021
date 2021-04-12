@extends('trame.modele')
@section('title', 'Liste des cours')

@section('contents')
    <a href="{{route('create.cours')}}"> Créer un cours</a>
    <h1>Liste des cours</h1>
    @forelse ($cours as $c )
        @if ($loop->first)
            <table>
                <tr>
                    <th>ID</th>
                    <th>L'INTITULÉ</th>
                    <th>RESPONSABLE</th>
                </tr>
        @endif
        <tr>
            <td style="font-weight: bold">{{ $c->id }}</td>
            <td>{{ $c->intitule }}</td>
            <td>{{ $c->nom }} {{ $c->prenom }}</td>
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
