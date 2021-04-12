@extends('trame.modele')
@section('title', 'Votre Formation')

@section('contents')
    <h1> {{ \App\Models\Formation::where(['id' => Auth::user()->formation_id])->first()->intitule }}</h1>

    @forelse ($cours as $c )
        @if ($loop->first)
            <table>
                <tr>
                    <th>ID</th>
                    <th>L'INTITULÉ DU COURS</th>
                    <th>RESPONSABLE</th>
                    <th colspan="2">ACTIONS</th>
                </tr>
        @endif
        <tr>
            <td style="font-weight: bold">{{ $c->cours_id }}</td>
            <td>{{ $c->cours_name }}</td>
            <td>{{ $c->user_prenom }} {{ $c->user_nom }}</td>
            @if (DB::table('cours_users')->where(['cours_id' => $c->cours_id, 'user_id' => Auth::id()])->count() < 1)
                <td><a href="{{ route('inscription', ['id' => $c->cours_id]) }}">s'inscrire</a></td>
                <td style="color: red;font-weight: bold">PAS D'INSCRIPTION</td>
            @else
                <td style="color: red;font-weight: bold">DÉJÀ INSCRIT</td>
                <td><a href="{{ route('désinscription', ['id' => $c->cours_id]) }}">désinscrire</a></td>
            @endif

        </tr>
        @if ($loop->last)
            </table>
        @endif
    @empty
        <p style="text-align: center; color:red;font-weight: bold;font-size: 20px">
            Cette formation n'as pas encore aucun cours.
        </p>
    @endforelse
@endsection
