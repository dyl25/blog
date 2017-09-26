@extends('admin.adminTemplate')

@section('title')
Modification d'un article
@endsection

@section('content')

<h2>Modification d'un article</h2>
<hr>

@include('layouts.errors')

{!! Form::model($article, ['route' => ['articles.update', $article->id], 'method' => 'PUT','files' => true])  !!}

<div class="form-group">
{!! Form::label('category_id', 'Catégorie') !!}
{!! Form::select('category_id', $categories, null,['class' => 'form-control']) !!}
</div>

<div class="form-group">
{!! Form::label('title', 'Titre de l\'article') !!}
{!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
{!! Form::label('content', 'Contenu de l\'article') !!}
{!! Form::textarea('content', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
{!! Form::label('image', 'Image de l\'article') !!}
{!! Form::file('image', null) !!}
</div>

{!! Form::submit('Modifier l\'article', ['class' => 'btn btn-success']) !!}

{!! Form::close() !!}

@endsection

