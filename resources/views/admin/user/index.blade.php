@extends('admin.adminTemplate')

@section('title')
Gestion des utilisateurs
@endsection

@section('content')

<div class="well analytic-box">
    <h2>Liste des utilisateurs</h2><a href="{{ route('users.create') }}" class="btn btn-success">Ajouter un utilistaeur</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Login</th>
                <th>E-mail</th>
                <th>Rôle</th>
                <th>Date d'inscription</th>
                <th>Dernière modification</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td><a href="{{ route('users.show', $user->id)  }}">{{ $user->name }}</a></td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role->name }}</td>
                <td>{{ $user->created_at->toFormattedDateString() }}</td>
                <td>{{ $user->updated_at->toFormattedDateString() }}</td>
                <td class="action">
                    <a href="{{ route('users.edit', $user->id)  }}"><i class="glyphicon glyphicon-pencil action" data-toggle="tooltip" data-placement="top" title="Editer"></i></a>
                    {!! Form::open(['method' => 'DELETE', 'url' => 'backoffice/users/'.$user->id])  !!}
                    <!--<a href="#"><i class="glyphicon glyphicon-trash delete" data-toggle="tooltip" data-placement="bottom" title="Supprimer"></i></a>-->
                    {!! Form::submit('Supprimer', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close()  !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
</div>
@endsection
