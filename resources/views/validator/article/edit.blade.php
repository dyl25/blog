@extends('validator.validatorTemplate')

@section('title')
Edition de l'article
@endsection

@section('content')
<a href="{{ route("toValidate") }}"><span class="glyphicon glyphicon-menu-left"></span>Retour à la gestion des articles</a>

@include('layouts.errors')

<h2>{{ $articleData->title }}</h2>
<p>Auteur : <a href="{{ route('users.show', $articleData->user->id) }}">{{ $articleData->user->name }}</a> - date de création : {{ $articleData->created_at }}</p>
<hr>
@if($articleData->image)
<p>
    <img src="{{ asset('storage/'.$articleData->image) }}">
</p>
@endif
<p>
    {{ $articleData->content }}
</p>
@if(!$articleValidated)
    {!! Form::open(['method' => 'POST', 'url' => '/validation/update/'.$articleData->id.'/edit'])  !!}
        {!! Form::label('justification', 'Justification du refus') !!}
        {!! Form::textarea('justification', null, ['class' => 'form-control']) !!}
    {!! Form::submit('Refuser l\'article', ['class' => 'btn btn-danger']) !!}
    {!! Form::close()  !!}
@endif
@endsection

