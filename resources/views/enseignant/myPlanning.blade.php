@extends('trame.modele')
@section('title', 'Vos Plannings')

@section('contents')
    <ul>
        <li><a class="active" href="{{ route('user.home') }}">Back</a></li>
        <li> <a href="{{ route('ajout.seance') }}">Créer une séance</a></li>
        <li style="float:right"> <a href="{{ route('logout') }}">Déconnection</a>
        </li>
    </ul>
    <h1> Vos Plannings</h1>
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
            <td><a class="bouncy" style="background-color:#FF8C00" href="{{ route('modifier.seance', ['id' => $p->id]) }}">Modifier</a></td>
            <td>
                <form action="{{ route('suppression.seance', ['id' => $p->id]) }}" method="post"
                    onsubmit="return confirm('Are you sure ? ')">
                    @method('delete')
                    @csrf
                    <button>
                        Supprimer
                    </button>
                </form>
            </td>
        </tr>
        @if ($loop->last)
            </table>
        @endif
    @empty
        <p style="text-align: center; color:red;font-weight: bold;font-size: 20px">
            Aucun Planning
        </p>
        <p style="text-align: center; color:red;font-weight: bold;font-size: 20px">
            Appuyer "Créer une séance" pour ajouter une nouvelle séance
        </p>
    @endforelse
@endsection
