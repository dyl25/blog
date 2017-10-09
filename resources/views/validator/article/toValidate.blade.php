@extends('validator.validatorTemplate')

@section('title')
Articles à valider
@endsection

@section('content')

<div class="well analytic-box">
    <h2>Liste des articles</h2>
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
                    <a href="{{ route('validation.edit', $articleData->id) }}" class="btn btn-danger">Refuser</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        
    </table>
</div>
@endsection
