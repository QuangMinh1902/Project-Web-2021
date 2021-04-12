@extends('trame.modele')
@section('title', 'Détail des cours')

@section('contents')
    <h1>Les cours participé</h1>

    @forelse ($cours as $c )
        @if ($loop->first)
            <h2 style="text-align: center">
                Nom de l'enseignant : {{ $user->nom }} {{ $user->prenom }}
            </h2>
            @if (!empty($intitule))
                <h2 style="text-align: center">
                    responsable du cours : {{ $intitule }}
                </h2>
            @endif
            <table>
                <tr>
                    <th>L'INTITULÉ</th>
                    <th>RESPONSABLE</th>
                </tr>
        @endif
        <tr>
            <td>{{ $c->intitule }}</td>
            <td>{{ $c->nom }} {{ $c->prenom }}</td>
        </tr>
        @if ($loop->last)
            </table>
        @endif
    @empty
        <p style="text-align: center; color:red;font-weight: bold;font-size: 20px">
            Cet enseignant n'a pas encore participé à aucun cours
        </p>
    @endforelse
@endsection
