@extends('trame.modele')

@section('title', 'Liste des enseignants')

@section('contents')
    <ul>
        <li><a class="active" href="{{ route('admin.home') }}">Back</a></li>
        <li style="float:right"> <a href="{{ route('logout') }}">Déconnection</a>
        </li>
    </ul>
    <h1>Liste des enseignants</h1>
    @forelse ($users as $user )
        @if ($loop->first)
            <table>
                <tr>
                    <th>ID</th>
                    <th>NOM</th>
                    <th>LES COURS PARTICIPÉS</th>
                    <th>ASSOCIER À UN COURS</th>
                </tr>
        @endif
        <tr>
            <td style="font-weight: bold">{{ $user->id }}</td>
            <td>{{ $user->nom }} {{ $user->prenom }}</td>
            <td><a href='{{ route('voir.detail', ['id' => $user->id]) }}'>Détail</a></td>
            <td>
                <form action="{{ route('admin.associate', ['id' => $user->id]) }}">
                    <select name="cours_id">
                        <option value="">--Veuillez choisir un cours--</option>
                        @foreach ($cours as $c)
                            <option value="{{ $c->id }}">{{ $c->intitule }}</option>
                        @endforeach
                    </select>
                    <button type="submit"> Save</button>
                </form>
            </td>
        </tr>
        @if ($loop->last)
            </table>
        @endif
    @empty
    @endforelse
@endsection
