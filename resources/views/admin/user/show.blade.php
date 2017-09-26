@extends('admin.adminTemplate')

@section('title')
Informations sur l'utilisateur
@endsection

@section('content')
<a href="{{ route("users.index") }}"><span class="glyphicon glyphicon-menu-left"></span>Retour à la gestion des utilisateurs</a>
<h2>{{ $user->name }}</h2>
<hr>
<table class="table table-striped">
    <tbody>
        <tr>
            <td>Rôle: </td>
            <td>{{ $user->role->name }}</td>
        </tr>
        <tr>
            <td>E-mail: </td>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <td>Mot de passe: </td>
            <td>{{ $user->password }} <a href="{{ route('users.editPassword', $user->id) }}" class="btn btn-success">Changer le mot de passe</a></td>
        </tr>
        <tr>
            <td>Inscription: </td>
            <td>{{ $user->created_at }}</td>
        </tr>
        <tr>
            <td>Mise à jour: </td>
            <td>{{ $user->updated_at }}</td>
        </tr>
    </tbody>
</table>
@endsection

