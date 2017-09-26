@extends('template')

@section('titre')
Tous les articles du blog
@endsection

@section('contenu')
@include('search')
<section class="container text-center well-pad">
    <h2>Tous les articles</h2>
    <h3>{{ $articles->total() }} résultats</h3>
    <hr>
    <div class="row">
        @foreach($articles as $article)
        <div>
            <article class="thumbnail">
                @if($article->image)
                <img src="{{ asset('storage/'.$article->image) }}">
                @endif
                <div class="caption">
                    <h3>{{ $article->title }}</h3>
                    <p>{{ $article->content }}</p>
                    <hr>
                    <p>par: {{ $article->user->name }}, le {{ $article->created_at->toFormattedDateString() }}</p>
                </div>
            </article>
        </div>
        @endforeach
        {{ $articles->appends(Request::except('page'))->links() }}
    </div>
</section>
@endsection
