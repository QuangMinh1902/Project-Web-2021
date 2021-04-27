@extends('trame.modele')

@section('title', 'Home')

@section('contents')
    <a href="{{ route('user.profile') }}">Profile</a>
    <a href="{{ route('change_password') }}">Changer le mot de passe</a>
    <a href="{{ route('logout') }}">Déconnection</a>
    @if (Auth::user()->type == 'etudiant')
        <a href="{{ route('list.course') }}">Votre formation</a>
        <a href="{{ route('liste.inscription') }}">Vos inscriptions</a>
        <a href="{{ route('plannings.integral') }}">Plannings</a>
    @elseif (Auth::user()->type == "enseignant")
        <a href="{{ route('responsable.cours') }}">Vos cours </a>
        <a href="{{route('enseignant.plannings')}}">Plannings</a>
        <a href="{{route('gestion.planning')}}">Gestion du planning</a>
    @endif
    <p style="color: yellowgreen; font-size: 25px;text-align: center">
        Salut <strong>{{ Auth::user()->prenom }}</strong>
        - Votre ID est : {{ Auth::id() }}
    </p>
@endsection
