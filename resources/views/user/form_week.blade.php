@extends('trame.modele')

@section('title', 'Contrôle de la semaine ')

@section('contents')
    <h2>Contrôle de la date </h2>

    <form action=    method="post">
        @csrf
        <label for="Week">Week:</label>
        <input type="week" name="week" value="{{ old('week') }}">
        <input type="submit" value="envoyer">
    </form>

@endsection
