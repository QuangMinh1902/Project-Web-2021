@extends('trame.modele')
@section('title', 'Détail des cours')

@section('contents')
    <ul>
        <li><a class="active" href="{{ route('enseignant.cours') }}">Back</a></li>
        <li style="float:right"> <a href="{{ route('logout') }}">Déconnexion</a>
        </li>
    </ul>
    <h1>Les cours participé</h1>

    @forelse ($cours as $c )
        @if ($loop->first)
            <table>
                <tr>
                    <th>COURS</th>
                    <th>FORMATION</th>
                </tr>
        @endif
        <tr>
            <td>{{ $c->cours }}</td>
            <td>{{ $c->formation }}</td>
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
