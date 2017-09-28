@extends('validator.validatorTemplate')

@section('title')
Espace validateur
@endsection

@section('content')
<div class="row">
    <div class="col-sm-2">
        <div class="well well-sm">
            <span class="glyphicon glyphicon-user info-box-icon"></span>
            <p class="info-box-num">20</p>
            <p class="info-box-text">nouveaux utilisateurs</p>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="well well-sm">
            <span class="glyphicon glyphicon-th-list info-box-icon"></span>
            <p class="info-box-num">40</p>
            <p class="info-box-text">articles créés</p>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="well well-sm">
            <span class="glyphicon glyphicon-stats info-box-icon"></span>
            <p class="info-box-num">320</p>
            <p class="info-box-text">nouveaux résultats</p>
        </div>
    </div>
</div>
<div class="well analytic-box">
    <h2>Liste des utilisateurs <span class="glyphicon glyphicon-user"></span></h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Login</th>
                <th>E-mail</th>
                <th>Rôle</th>
                <th>Date d'inscription</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Marc</td>
                <td>Marc@hotmail.com</td>
                <td>Athlète</td>
                <td>6/12/2016</td>
                <td><a href="#">éditer</a></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Marc</td>
                <td>Marc@hotmail.com</td>
                <td>Athlète</td>
                <td>6/12/2016</td>
                <td><a href="#">éditer</a></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Marc</td>
                <td>Marc@hotmail.com</td>
                <td>Athlète</td>
                <td>6/12/2016</td>
                <td><a href="#">éditer</a></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Marc</td>
                <td>Marc@hotmail.com</td>
                <td>Athlète</td>
                <td>6/12/2016</td>
                <td><a href="#">éditer</a></td>
            </tr>
            <tr>
                <td>5</td>
                <td>Marc</td>
                <td>Marc@hotmail.com</td>
                <td>Athlète</td>
                <td>6/12/2016</td>
                <td><a href="#">éditer</a></td>
            </tr>
            <tr>
                <td>6</td>
                <td>Marc</td>
                <td>Marc@hotmail.com</td>
                <td>Athlète</td>
                <td>6/12/2016</td>
                <td><a href="#">éditer</a></td>
            </tr>
        </tbody>
    </table>
</div>
<div class="well analytic-box">
    <h2>Liste des articles</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Titre de l'article</th>
                <th>Auteur</th>
                <th>Date de création</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td><a href="#">Titre de l'article</a></td>
                <td>Marc</td>
                <td>1/2/2017</td>
                <td><a href="#">éditer</a></td>
            </tr>
            <tr>
                <td>2</td>
                <td><a href="#">Titre de l'article</a></td>
                <td>Marc</td>
                <td>1/2/2017</td>
                <td><a href="#">éditer</a></td>
            </tr>
            <tr>
                <td>3</td>
                <td><a href="#">Titre de l'article</a></td>
                <td>Marc</td>
                <td>1/2/2017</td>
                <td><a href="#">éditer</a></td>
            </tr>
            <tr>
                <td>4</td>
                <td><a href="#">Titre de l'article</a></td>
                <td>Marc</td>
                <td>1/2/2017</td>
                <td><a href="#">éditer</a></td>
            </tr>
            <tr>
                <td>5</td>
                <td><a href="#">Titre de l'article</a></td>
                <td>Marc</td>
                <td>1/2/2017</td>
                <td><a href="#">éditer</a></td>
            </tr>
            <tr>
                <td>6</td>
                <td><a href="#">Titre de l'article</a></td>
                <td>Marc</td>
                <td>1/2/2017</td>
                <td><a href="#">éditer</a></td>
            </tr>
        </tbody>
    </table>
</div>
<div class="well">
    <h4>Dashboard</h4>
    <p>Some text..</p>
</div>
<div class="row">
    <div class="col-sm-3">
        <div class="well">
            <h4>Users</h4>
            <p>1 Million</p> 
        </div>
    </div>
    <div class="col-sm-3">
        <div class="well">
            <h4>Pages</h4>
            <p>100 Million</p> 
        </div>
    </div>
    <div class="col-sm-3">
        <div class="well">
            <h4>Sessions</h4>
            <p>10 Million</p> 
        </div>
    </div>
    <div class="col-sm-3">
        <div class="well">
            <h4>Bounce</h4>
            <p>30%</p> 
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="well">
            <p>Text</p> 
            <p>Text</p> 
            <p>Text</p> 
        </div>
    </div>
    <div class="col-sm-4">
        <div class="well">
            <p>Text</p> 
            <p>Text</p> 
            <p>Text</p> 
        </div>
    </div>
    <div class="col-sm-4">
        <div class="well">
            <p>Text</p> 
            <p>Text</p> 
            <p>Text</p> 
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-8">
        <div class="well">
            <p>Text</p> 
        </div>
    </div>
    <div class="col-sm-4">
        <div class="well">
            <p>Text</p> 
        </div>
    </div>
</div>
@endsection