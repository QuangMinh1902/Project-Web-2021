@extends('trame.modele')
@section('title', 'Choisir votre rôle')

@section('contents')
    <h2 style="text-align: center">Veuillez choisir votre rôle</h2>
    <a class="bouncy" style="background-color:#dc143c;margin-top: 50px;margin-left: 580px"
        href="{{ route('isStudent') }}">
        Vous êtes étudiant
    </a>
    <a class="bouncy" style="background-color:#ff7f50;margin-top: 30px;margin-left: 570px"
        href="{{ route('isTeacher') }}">
        Vous êtes enseignant
    </a>
@endsection
