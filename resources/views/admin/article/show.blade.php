@extends('admin.adminTemplate')

@section('title')
Informations sur l'article
@endsection

@section('content')
<a href="{{ route("articles.index") }}"><span class="glyphicon glyphicon-menu-left"></span>Retour à la gestion des articles</a>
<h2>{{ $article->title }}</h2>
<hr>
@if($article->image)
<p>
    <img src="{{ asset('storage/'.$article->image) }}">
</p>
@endif
<p>
    {{ $article->content }}
</p>
@endsection

