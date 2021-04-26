@extends('trame.modele')
@section('title', 'Vos Plannings')

@section('contents')
<h1> Vos Plannings</h1>
<a href="{{ route('week') }}">Voir par la semaine </a>
    <a href="{{ route('plannings.integral') }}">
        <button type="button" title="Refresh page"> Refresh</button>
    </a>
    <form class="form-wrapper cf" action="{{ route('plannings.integral') }}" method="GET" role="search">
        <input type="text" name="term" placeholder="Rechercher un cours" id="term" required>
        <button type="submit">Rechercher</button>
    </form>
    @forelse ($plannings as $p )
        @if ($loop->first)
            <table>
                <tr>
                    <th>ID</th>
                    <th>L'INTITULÉ DU COURS</th>
                    <th>RESPONSABLE</th>
                    <th>DATE_DEBUT</th>
                    <th>DATE_FIN</th>
                </tr>
        @endif
        <tr>
            <td style="font-weight: bold">{{ $p->cours_id }}</td>
            <td>{{ $p->cours_name }}</td>
            <td>{{ $p->user_prenom }} {{ $p->user_nom }}</td>
            <td>{{ $p->start }}</td>
            <td>{{ $p->end }}</td>
        </tr>
        @if ($loop->last)
            </table>
        @endif
    @empty
        <p style="text-align: center; color:red;font-weight: bold;font-size: 20px">
            Vous n'avez pas encore inscrit dans aucun cours ou il n'y pas encore des plannings pour vos cours.
        </p>
    @endforelse
@endsection
