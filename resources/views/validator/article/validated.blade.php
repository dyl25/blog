@extends('validator.validatorTemplate')

@section('title')
Articles validés
@endsection

@section('content')

<div class="well analytic-box">
    <h2>Articles validés par vous</h2>
    <div class="alert alert-info" role="alert">
        <p>Ici sont présenté les articles que vous avez validé. Vous pouvez toujours revenir sur votre décision et changer le statut d'une de vos validations.</p>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Titre de l'article</th>
                <th>Id de l'article</th>
                <th>Auteur</th>
                <th>Status</th>
                <th>Date de création</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($validatedByUser as $validation)
            <tr>
                <td>{{ $validation->id }}</td>
                <td><a href="{{ route('articles.show', $validation->article_id)  }}">{{ $validation->article->title }}</a></td>
                <td>{{ $validation->article->id }}</td>
                <td>{{ $validation->article->user->name }}</td>
                <td>
                    @if($validation->status) 
                    Valide
                    @else
                    Refusé
                    @endif
                </td>
                <td>{{ $validation->article->created_at->toFormattedDateString() }}</td>
                <td class="action">
                    @if(!$validation->status) 
                    {!! Form::open(['method' => 'PATCH', 'url' => '/validation/update/'.$validation->article_id])  !!}
                    {!! Form::hidden('status', 1) !!}
                    {!! Form::submit('Accepter', ['class' => 'btn btn-success']) !!}
                    {!! Form::close()  !!}
                    @else
                    <a href="{{ route('validation.edit', $validation->id) }}" class="btn btn-danger">Refuser</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
        
    </table>
</div>
@endsection
