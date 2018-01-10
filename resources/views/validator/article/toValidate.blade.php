@extends('validator.validatorTemplate')

@section('title')
Articles à valider
@endsection

@section('content')

<div class="well analytic-box">
    <h2>Liste des articles</h2>
    <div class="alert alert-info" role="alert">Liste des articles ayant encore besoin d'une validation</div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Titre de l'article</th>
                <th>Auteur</th>
                <th>Date de création</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $articleData)
            <tr>
                <td>{{ $articleData->id }}</td>
                <td><a href="{{ route('articles.show', $articleData->id)  }}">{{ $articleData->title }}</a></td>
                <td>{{ $articleData->user->name }}</td>
                <td>{{ $articleData->created_at->toFormattedDateString() }}</td>
                <td class="action">
                    {!! Form::open(['method' => 'POST', 'url' => '/validation/store/'.$articleData->id])  !!}
                    {!! Form::hidden('status', 1) !!}
                    {!! Form::submit('Accepter', ['class' => 'btn btn-success']) !!}
                    {!! Form::close()  !!}
                    <a href="{{ route('validation.create', $articleData->id) }}" class="btn btn-danger">Refuser</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        
    </table>
</div>
@endsection
