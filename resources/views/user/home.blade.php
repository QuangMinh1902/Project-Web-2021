@extends('trame.modele')

@section('title', 'Home')

@section('contents')
    <ul>
        <li><a class="active" href="{{ route('user.home') }}">Home</a></li>
        <li><a href="{{ route('user.profile') }}">Profile</a></li>
        <li><a href="{{ route('change_password') }}">Changer le mot de passe</a></li>
        <li style="float:right"> <a href="{{ route('logout') }}">Déconnection</a>
        </li>
        @if (Auth::user()->type == 'etudiant')
            <li><a href="{{ route('list.course') }}">Votre formation</a> </li>
            <li><a href="{{ route('liste.inscription') }}">Vos inscriptions</a></li>
            <li> <a href="{{ route('plannings.integral') }}">Plannings</a></li>
        @elseif (Auth::user()->type == "enseignant")
            <li><a href="{{ route('responsable.cours') }}">Vos cours </a></li>
            <li><a href="{{ route('enseignant.plannings') }}">Plannings</a></li>
            <li><a href="{{ route('gestion.planning') }}">Gestion du planning</a> </li>
        @endif
    </ul>
    <p style="color: yellowgreen; font-size: 25px;text-align: center">
        Salut <strong>{{ Auth::user()->prenom }}</strong>
        - Votre ID est : {{ Auth::id() }}
        @if (Auth::user()->type == null)
            <br>
            <p style="color: red; text-align: center;font-weight: bold;font-size: 20px">
                Veuillez attendre l'approbation de l'administrateur
            </p>
            <p style="color: red; text-align: center;font-weight: bold;font-size: 20px">
                Vous ne verrez le lien pour accéder aux fonctions qu'une fois accepté par l'administrateur
            </p>
        @else
            - Votre rôle : {{ Auth::user()->type }}
        @endif
    </p>
@endsection
