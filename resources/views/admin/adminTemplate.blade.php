<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {{ Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css') }}
        {{ Html::style('css/style.css') }}
        {{ Html::script('https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js') }}
        {{ Html::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js') }}
        {{ Html::script('js/myapp.js') }}
    </head>
    <body>
        <div class="container-fluid">
            <div class="row content">
                <div class="col-md-2 sidenav">
                    <nav>
                        <div class="navbar navbar-inverse visible-xs">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainSidebar">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <span class="visible-xs navbar-brand">Logo</span>
                            </div>
                        </div>
                        <div class="navbar-collapse collapse" id="mainSidebar">
                            <div class="profile-data text-center">
                                <img src="assets/images/defaultProfilePic.png" class="img-responsive img-circle profile-picture center-block" alt="profil">
                                <p class="profile-descr">NAME</p>
                                <p class="profile-descr">ROLE</p>
                            </div>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="{{ route('home') }}" class="text-center"><span class="glyphicon glyphicon-home"></span> Accueil</a></li>
                                <li class="active"><a href="{{ route('backoffice') }}"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
                                <li data-toggle="collapse" data-target="#usersGestion"><p><span class="glyphicon glyphicon-user"></span> Users <span class="glyphicon glyphicon-chevron-right"></span></p>
                                    <ul id="usersGestion" class="collapse manage-command">
                                        <li><a href="{{ route('users.create') }}">Ajouter</a></li>
                                        <li><a href="{{ route('users.index') }}">Gérer</a></li>
                                        <li><a href="#">Demande d'adhésion <span class="badge badge-error">2</span></a></li>
                                    </ul>
                                </li>
                                <li data-toggle="collapse" data-target="#articleGestion"><p><span class="glyphicon glyphicon-th-list"></span> Articles <span class="glyphicon glyphicon-chevron-right"></span></p>
                                    <ul id="articleGestion" class="collapse manage-command">
                                        <li><a href="{{ route('articles.create') }}">Ajouter</a></li>
                                        <li><a href="{{ route('articles.index') }}">Gérer</a></li>
                                    </ul>
                                </li>
                                <li><p><span class="glyphicon glyphicon-calendar"></span> Evénements</p></li>
                                <li><a href="#">Résultats</a></li>
                                <li><a href="#">Entraînements</a></li>
                                <li><a href="#">Reviews <span class="badge">1,118</span></a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <br>

                <div class="col-sm-10 col-sm-offset-2">
                    @include('admin.notification')
                    @yield('content')
                </div>
            </div>
        </div>
    </body>
</html>