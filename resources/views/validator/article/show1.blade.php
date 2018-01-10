<h2>{{ $validation->article->title }}</h2>
<p>Auteur : <a href="{{ route('users.show', $validation->article->user->id) }}">{{ $validation->article->user->name }}</a> - date de création : {{ $validation->article->created_at }}</p>
<hr>
@if($validation->article->image)
<p>
    <img src="{{ asset('storage/'.$validation->article->image) }}">
</p>
@endif
<p>
    {{ $validation->article->content }}
</p>
