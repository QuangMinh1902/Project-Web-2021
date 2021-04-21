@extends('trame.modele')
@section('title', 'Votre Formation')

@section('contents')
    <h1>Les cours dans votre formation </h1>
        <form action="{{ route('list.course') }}" method="GET" role="search">
            <input type="text" name="term" placeholder="Search Cours" id="term">
            <a href="{{ route('list.course') }}" class=" mt-1">
                <button type="button" title="Refresh page"></button>
            </a>
        </form>
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
                <td>{{ $c->prenom }} {{ $c->prenom }} </td>
                @if (\App\Models\CoursUser::query()->where(['cours_id' => $c->cours_id, 'user_id' => Auth::id()])->count() < 1)
                    <td><a href="{{ route('inscription', ['id' => $c->cours_id]) }}">S'inscrire </a></td>
                    <td style="text-align: center; color:red;font-weight: bold;font-size: 15px">PAS INSCRIT</td>
                @else
                    <td style="text-align: center; color:red;font-weight: bold;font-size: 15px">DÉJÀ INSCRIT</td>
                    <td><a href="{{ route('désinscription', ['id' => $c->cours_id]) }}">Désinscrire </a></td>
                @endif
            </tr>
            @if ($loop->last)
                </table>
            @endif
        @empty
            <p style="text-align: center; color:red;font-weight: bold;font-size: 20px">
                Votre formation n'a pas ce cours.
            </p>
        @endforelse
    @endsection
