@extends('validator.validatorTemplate')

@section('title')
Edition de l'article
@endsection

@section('content')
<a href="{{ route("toValidate") }}"><span class="glyphicon glyphicon-menu-left"></span>Retour à la gestion des articles</a>

@include('layouts.errors')

@include('validator.article.show1')

    {!! Form::model($validation, ['method' => 'PATCH', 'url' => '/validation/update/'.$validation->article_id])  !!}
        {!! Form::label('justification', 'Justification du refus') !!}
        {!! Form::textarea('justification', null, ['class' => 'form-control']) !!}
        {!! Form::hidden('status', 0) !!}
    {!! Form::submit('Refuser l\'article', ['class' => 'btn btn-danger']) !!}
    {!! Form::close()  !!}
@endsection

