<!DOCTYPE html>
<html>
    <head>
        <title>@yield('titre')</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {{ Html::style('css/bootstrap.min.css') }}
        {{ Html::style('css/style.css') }}
        {{ Html::script('https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js') }}
        {{ Html::script('js/bootstrap.min.js') }}
        {{ Html::script('js/myapp.js') }}
        {{ Html::script('https://use.fontawesome.com/8c7af56c09.js') }}
    </head>
    <body id="mainPage" data-spy="scroll" data-target=".navbar" data-offset="60">
        <header>
            <nav class="navbar navbar-inverse navbar-fixed-top" id="mainNavbar">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">
                            <img style ="height: 100%;" src="http://placehold.it/150x50&text=Logo" alt="">
                        </a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <div class="navbar-right">
                            <ul class="nav navbar-nav">
                                <li>
                                    <a href="#">Accueil</a>
                                </li>
                                <li>
                                    <a href="#mainContact">Contact</a>
                                </li>
                                <li>
                                    <a href="{{ action('ArticleController@all') }}">Articles</a>
                                </li>
                                <li>
                                    <a href="backoffice.html">Mon espace</a>
                                </li>
                                <!-- Authentication Links -->
                                @if (Auth::guest())
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                                @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ route('backoffice') }}">Backoffice</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                                @endif
                            </ul>
                            <form class="navbar-form navbar-left">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Articles, compétitions, résultats, ...">
                                    <div class="input-group-btn">
                                        <button class="btn btn-default" type="submit">
                                            <i class="glyphicon glyphicon-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <main>
            @yield('contenu'); 
        </main>
        <footer class="container-fluid text-center grey well-pad">
            <p>Createur de lecture passionnante :)</p>
            <p class="reseau"><a data-toggle="tooltip" data-placement="left" title="Aime notre page ;)" href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Retweet nous :D"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
                <a href="#" data-toggle="tooltip" data-placement="right" title="un plus? :o"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></p>
        </footer>
    </body>
</html>