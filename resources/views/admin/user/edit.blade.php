@extends('admin.adminTemplate')

@section('title')
Modification d'un utilisateur
@endsection

@section('content')

<h2>Modification d'un utilisateur</h2>
<hr>

@include('layouts.errors')

{!! Form::model($user, ['url' => 'backoffice/users/'.$user->id, 'method' => 'PUT'])  !!}

<div class="form-group">
{!! Form::label('role_id', 'Rôle') !!}
{!! Form::select('role_id', $roles, null,['class' => 'form-control']) !!}
</div>

<div class="form-group">
{!! Form::label('name', 'Nom') !!}
{!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
{!! Form::label('email', 'E-mail') !!}
{!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
{!! Form::label('password', 'Mot de passe') !!}
{!! Form::password('password', ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Modifier l\'utilisateur', ['class' => 'btn btn-success']) !!}

{!! Form::close() !!}

@endsection

