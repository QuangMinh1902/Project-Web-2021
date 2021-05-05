@extends('trame.modele')
@section('title', 'Liste des formations')

@section('contents')
    <ul>
        <li><a class="active" href="{{ route('admin.home') }}">Back</a></li>
        <li><a href="{{ route('create.formation') }}"> Créer une formation</a></li>
        <li style="float:right"> <a href="{{ route('logout') }}">Déconnection</a>
        </li>
    </ul>
    <h1>Liste des formations</h1>
    @forelse ($formations as $formation )
        @if ($loop->first)

        <br>
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
            <td><a class="bouncy" style="background-color:#20B2AA" href="{{ route('modifier.formation', ['id' => $formation->id]) }}">MODIFIER</a></td>
            <td>
                <form action="{{ route('suppression.formation', ['id' => $formation->id]) }}" method="post"
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
            Il n'y a aucune formation
        </p>
    @endforelse
@endsection
