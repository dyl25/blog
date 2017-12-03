@extends('validator.validatorTemplate')

@section('title')
Articles validés
@endsection

@section('content')

<div class="well analytic-box">
    <h2>Articles validés par vous</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Titre de l'article</th>
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
                <td><a href="{{ route('articles.show', $validation->article->id)  }}">{{ $validation->article->title }}</a></td>
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
                    @if($validation->status) 
                    {!! Form::open(['method' => 'PUT', 'url' => 'validation/changeStatus/'.$validation->id])  !!}
                    {!! Form::hidden('status', 1) !!}
                    {!! Form::submit('Accepter', ['class' => 'btn btn-success']) !!}
                    {!! Form::close()  !!}
                    @else
                    {!! Form::open(['method' => 'PUT', 'url' => 'validation/changeStatus/'.$validation->id])  !!}
                    {!! Form::hidden('status', 0) !!}
                    {!! Form::submit('Refuser', ['class' => 'btn btn-error']) !!}
                    {!! Form::close()  !!}
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
        
    </table>
</div>
@endsection
