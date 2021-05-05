@extends('trame.modele')
@section('title', 'Responsable')

@section('contents')
    <ul>
        <li><a class="active" href="{{ route('user.home') }}">Back</a></li>
        <li style="float:right"> <a href="{{ route('logout') }}">Déconnection</a>
        </li>
    </ul>
    <h1>Les cours dont vous êtes responsable </h1>

    @forelse ($cours as $c )
        @if ($loop->first)
            <table>
                <tr>
                    <th>ID</th>
                    <th>L'INTITULÉ DU COURS</th>
                    <th>FORMATION</th>
                </tr>
        @endif
        <tr>
            <td style="font-weight: bold">{{ $c->cours_id }}</td>
            <td>{{ $c->cours_name }}</td>
            <td>{{ $c->formation_name }}</td>
        </tr>
        @if ($loop->last)
            </table>
        @endif
    @empty
        <p style="text-align: center; color:red;font-weight: bold;font-size: 20px">
            Vous n'êtes pas responsable du aucun cours
        </p>
    @endforelse
@endsection
