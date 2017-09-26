@extends('admin.adminTemplate')

@section('title')
Modification du mot de passe d'un utilisateur
@endsection

@section('content')

<h2>Modification du mot de passe d'un utilisateur</h2>
<hr>

@include('layouts.errors')

{!! Form::open(['url' => 'backoffice/users/updatePassword/'.$id, 'method' => 'PUT'])  !!}

<div class="form-group">
{!! Form::label('password', 'Mot de passe') !!}
{!! Form::password('password', ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Modifier l\'utilisateur', ['class' => 'btn btn-success']) !!}

{!! Form::close() !!}

@endsection

