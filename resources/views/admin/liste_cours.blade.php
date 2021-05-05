@extends('trame.modele')
@section('title', 'Liste des cours')

@section('contents')
    <ul>
        <li><a class="active" href="{{ route('admin.home') }}">Back</a></li>
        <li><a href="{{ route('create.cours') }}"> Créer un cours</a></li>
        <li><a href="{{ route('enseignant.cours') }}"> Liste des cours par enseignant</a></li>
        <li style="float:right"> <a href="{{ route('logout') }}">Déconnection</a></li>
    </ul>
    <h1>Liste des cours</h1>
    <form class="form-wrapper cf" action="{{ route('liste.cours') }}" method="GET" role="search">
        <input type="text" name="term" placeholder="Rechercher un cours" id="term" required>
        <button type="submit">Rechercher</button>
        <a class="bouncy" style="background-color:#DC143C;margin-left: 120px;margin-top: 5px"
            href="{{ route('liste.cours') }}">
            Recharger les cours
        </a>
    </form>
    @forelse ($cours as $c )

        @if ($loop->first)
            <div style="text-align: center">
                {{ $cours->links() }}
            </div>
            <br>
            <table>
                <tr>
                    <th>ID</th>
                    <th>COURS</th>
                    <th>RESPONSABLE</th>
                    <th>FORMATION</th>
                    <th colspan="2">ACTIONS</th>
                    <th>ASSOCIER À UN ENSEIGNANT</th>
                </tr>
        @endif
        <tr>
            <td style="font-weight: bold">{{ $c->cours_id }}</td>
            <td>{{ $c->cours_name }}</td>
            <td>{{ $c->user_nom }} {{ $c->user_prenom }}</td>
            @if (empty($c->formation))
                <td style="color: #8b008b; font-weight: bold">La formation a été supprimée</td>
            @else
                <td>{{ $c->formation }}</td>
            @endif
            <td><a class="bouncy" style="background-color:#DAA520"
                    href="{{ route('modifier.cours', ['id' => $c->cours_id]) }}"> Modifier</a></td>
            <td>
                <form action="{{ route('suppression.cours', ['id' => $c->cours_id]) }}" method="post"
                    onsubmit="return confirm('Are you sure ? ')">
                    @method('delete')
                    @csrf
                    <button>
                        Supprimer
                    </button>
                </form>
            </td>
            <td>
                <form action="{{ route('associer.cours', ['id' => $c->cours_id]) }}">
                    <select name="user_id">
                        <option value="">--Veuillez choisir un enseignant--</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->nom }} {{ $user->prenom }} -
                                ID: {{ $user->id }}</option>
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
        <p style="text-align: center; color:red;font-weight: bold;font-size: 20px">
            Il n'y a aucun cours
        </p>
        <p style="text-align: center; color:red;font-weight: bold;font-size: 20px">
            Appuyer "Créer un cours" pour ajouter un nouveau cours
        </p>
    @endforelse
@endsection
