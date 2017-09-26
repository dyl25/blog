<section class="jumbotron grey text-center well-pad">
    <h1>Votre blog personnel</h1>
    <p>Nous vous proposons le meilleur du contenu.</p>
    <!--<form class="form-inline">-->
    {!! Form::open(['action' => 'ArticleController@search', 'method' => 'get' ,'class' => 'form-inline']) !!}
        <div class="input-group">
            {!! Form::searchField('article', null, ['class' => 'form-control']) !!}
            <!--<input type="search" class="form-control" placeholder="Titre de l'article" required="">-->
            <div class="input-group-btn">
                {!! Form::submit('Rechercher', ['class' => 'btn btn-default']) !!}
                <!--<button type="submit" class="btn btn-default">Rechercher</button>-->
            </div>
        </div>
    {!! Form::close() !!}
    <!--</form>-->
</section>