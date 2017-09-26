@extends('template')

@section('titre')
Blog, le site qui vous proposes le meilleur du contenu
@endsection

@include('search')
@section('contenu')
<section class="container-fluid text-center well-pad">
    <h2>Derniers articles</h2>
    <hr>
    <div class="row">
        @foreach($articles as $article)
        <div class="col-sm-4">
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
        <!--<article class="col-sm-4">
            <div class="thumbnail front-thumb">
                {{ Html::image('images/endurance.jpg', 'image d\'illustration', ['class' => 'img-responsive']) }}
                <div class="caption">
                    <h3>Titre de l'article</h3>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit ame</p>
                </div>
            </div>
        </article>
        <article class="col-sm-4">
            <h3>Titre de l'article</h3>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit ame</p>
        </article>
        <article class="col-sm-4">
            <h3>Titre de l'article</h3>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit ame</p>
        </article>
    </div>
    <div class="row">
        <article class="col-sm-4">
            <h3>Titre de l'article</h3>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit ame</p>
        </article>
        <article class="col-sm-4">
            <h3>Titre de l'article</h3>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit ame</p>
        </article>
        <article class="col-sm-4">
            <h3>Titre de l'article</h3>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit ame</p>
        </article>-->
    </div>
</section>
<section class="container-fluid well-pad light-grey" id="mainContact">
    <h2 class="text-center">CONTACT</h2>
    <div class="row">
        <div class="col-sm-5">
            <p>Contact us and we'll get back to you within 24 hours.</p>
            <p><span class="glyphicon glyphicon-map-marker"></span> Chicago, US</p>
            <p><span class="glyphicon glyphicon-phone"></span> +00 1515151515</p>
            <p><span class="glyphicon glyphicon-envelope"></span> myemail@something.com</p>
        </div>
        <div class="col-sm-7">
            <form>
                <fieldset>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                        </div>
                    </div>
                    <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <button class="btn btn-default pull-right" type="submit">Envoyer</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</section>
@endsection
