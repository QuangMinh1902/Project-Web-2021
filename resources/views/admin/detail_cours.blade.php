@extends('trame.modele')
@section('title', 'Détail des cours')

@section('contents')
    <ul>
        <li><a class="active" href="{{ route('liste.enseignants') }}">Back</a></li>
        <li style="float:right"> <a href="{{ route('logout') }}">Déconnexion</a>
        </li>
    </ul>
    <h1>Les cours participé</h1>
    <h2 style="text-align: center">
        Nom de l'enseignant : {{ $user->nom }} {{ $user->prenom }}
    </h2>
    @if (!empty($intitule))
        <h2 style="text-align: center">
            responsable du cours : {{ $intitule }}
        </h2>
    @endif

    @forelse ($cours as $c )
        @if ($loop->first)
            <table>
                <tr>
                    <th>COURS</th>
                    <th>RESPONSABLE</th>
                    <th>FORMATION</th>
                </tr>
        @endif
        <tr>
            <td>{{ $c->intitule }}</td>
            <td>{{ $c->nom }} {{ $c->prenom }}</td>
            <td>{{ $c->formation }}</td>
        </tr>
        @if ($loop->last)
            </table>
        @endif
    @empty
        <p style="text-align: center; color:red;font-weight: bold;font-size: 20px">
            Cet enseignant n'est pas encore associé à aucun cours
        </p>
    @endforelse
@endsection
