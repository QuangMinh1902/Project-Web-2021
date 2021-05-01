@extends('trame.modele')

@section('title', 'Liste des enseignants')

@section('contents')
    <a href="{{ route('logout') }}">Déconnection</a>
    <h1>Liste des enseignants</h1>
    @forelse ($users as $user )
        @if ($loop->first)
            <table>
                <tr>
                    <th>ID</th>
                    <th>NOM</th>
                    <th>PRENOM</th>
                    <th>COURS PARTICIPÉ</th>
                    <th>ASSOCIER À UN COURS</th>
                </tr>
        @endif
        <tr>
            <td style="font-weight: bold">{{ $user->id }}</td>
            <td>{{ $user->nom }}</td>
            <td>{{ $user->prenom }}</td>
            <td><a href='{{ route('detail.cours', ['id' => $user->id]) }}'>Détail</a></td>
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
