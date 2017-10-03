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
            @foreach($articles as $article)
            <tr>
                <td>{{ $article->id }}</td>
                <td><a href="{{ route('articles.show', $article->id)  }}">{{ $article->title }}</a></td>
                <td>{{ $article->user->name }}</td>
                <td>{{ $article->created_at->toFormattedDateString() }}</td>
                <td class="action">
                    <a href="{{ route('articles.edit', $article->id)  }}"><i class="glyphicon glyphicon-pencil action" data-toggle="tooltip" data-placement="top" title="Editer"></i></a>
                    {!! Form::open(['method' => 'DELETE', 'url' => 'validator/articles/'.$article->id])  !!}
                    <!--<a href="#"><i class="glyphicon glyphicon-trash delete" data-toggle="tooltip" data-placement="bottom" title="Supprimer"></i></a>-->
                    {!! Form::submit('Refuser', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close()  !!}
                </td>
            </tr>
            @endforeach
        </tbody>
        
    </table>
    {{ $articles->links() }}
</div>
@endsection
