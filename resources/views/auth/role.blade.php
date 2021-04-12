@extends('trame.modele')
@section('title', 'Choisir votre rôle')

@section('contents')
<a href="{{route("isStudent")}}" > Vous êtes étudiant</a>
<a  href="{{route("isTeacher")}}"> Vous êtes enseignant</a>
@endsection
