<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="icon" href="/public/img/favicon.ico" />
    <link rel="stylesheet" href="/public/bootstrap/dist/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="/public/bootstrap/dist/css/bootstrap-grid.css" type="text/css">
    <link rel="stylesheet" href="/public/bootstrap/dist/css/bootstrap-reboot.css" type="text/css">
    <link rel="stylesheet" href="/public/md.css">
    <!--
        <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
    -->
    <link rel="stylesheet" href="/public/app.css" type="text/css">
    <title>SEN FORAGE</title>
</head>
<body style="width: 100%">
<div id="loader" style="position: fixed;top: 0;left: 0;width: 100%;height: 100%;background: transparent;margin:auto;z-index: 99999999999999">
    <div style="height: 50px;margin: 25% auto;width: 50px">
        <img src="/public/img/loader.gif" style="width: 100%;height: 100%"/>
    </div>
</div>
<nav class="navbar navbar-expand-lg  navbar-dark bg-primary" style=" background: rgb(110, 170, 238) !important;position: sticky;top: 0;left: 0">
    <a class="navbar-brand" href="#">SEN FORAGE</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Accueil <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/village">Village</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/client">Client</a>
            </li>
           {* <li class="nav-item active">
                <a class="nav-link" href="/abonnement">Abonnement</a>
            </li>*}
            <li class="nav-item active">
                <a class="nav-link" href="/compteur">Compteur</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/facture">Facture</a>
            </li>
        </ul>
        <span class="navbar-text">
     Sen forage S.A
    </span>
    </div>
</nav>
<div class="container">
    <h2 id="title" class="h2 text-center label label-primary" style="background:rgb(110, 170, 238);color:white;border: solid white 2px;border-radius: 50%;height: 60px ;padding-top:10px;text-align: center;width: 50%;margin: 5px  auto">SEN FORAGE</h2>

    <div id="alert" >

    </div>
</div>


<div class="container">
    {block name=body}

    {/block}
</div>


<!-- show aplication -->
<div class="modal fade" id="tecnologi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="background: rgba(0,0,0,0.8)">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <h4 class="modal-title text-center" style="font-size: 40px"> JQUERY AND NODE JS</h4>
            <div class="modal-body">
                <h4 class="modal-title text-center"> SINGLE PAGE APPLICATION</h4>
            </div>

        </div>
    </div>
</div>


<script src="/public/jquery/dist/jquery.js"></script>
<script src="/public/nprogress.js"></script>
<script src="/public/poper.js"></script>
<script src="/public/bootstrap/dist/js/bootstrap.js"></script>
<script src="/public/bootstrap/dist/js/bootstrap.bundle.js"></script>
<!--
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
-->
<script src="/public/md.js"></script>
    <script src="/public/js/app.js"></script>
    {block name="js"}

    {/block}


</body>
</html>

