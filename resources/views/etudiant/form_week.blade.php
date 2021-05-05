@extends('trame.modele')

@section('title', 'Plannings par la semaine ')

@section('contents')
    <ul>
        <li><a class="active" href="{{ route('plannings.integral') }}">Back</a></li>
        <li style="float:right"> <a href="{{ route('logout') }}">Déconnection</a>
        </li>
    </ul>
    <h2>Choisir une semaine et une année </h2>
    <form action="{{ route('affiche.semaine') }}" method="GET">
        @csrf
        <label for="week">Week Number:</label>
        <input type="number" name="week" value="{{ old('week') }}">
        <span class="error">
            @error('week')
                {{ $message }}
            @enderror
        </span>
        <label for="year">Year:</label>
        <input type="number" name="year" value="{{ old('year') }}">
        <span class="error">
            @error('year')
                {{ $message }}
            @enderror
        </span>
        <input type="submit" value="envoyer">
    </form>

    @if (!empty($plannings))
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
                Il n'y a pas de planning pour cette semaine.
            </p>
        @endforelse
    @endif
@endsection
