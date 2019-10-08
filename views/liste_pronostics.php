<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../src/bin/bootstrap-4.3.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../src/css/prono.css">
    <script defer src="../src/js/all.js"></script>
    <script defer src="../src/bin/bootstrap-4.3.1-dist/js/bootstrap.js"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark sambo-background">
            <img class=navbar-brand style="width:50px;" src="../src/img/logopronosambo.png">
            <a class="navbar-brand" href="#">PRONOSAMBO</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Accueil <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Futures rencontres </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Mes paris </a>
                    </li>
                    <li class="nav-item padding-left">
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2 sambo-navbar-input sambo-background" type="search" placeholder="Rechercher un combattant..." aria-label="Search">
                            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Recherche</button>
                        </form>
                    </li>
                </ul>
                <form>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">S'inscrire</a>
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Se connecter</button>
                        </li>
                    </ul>
                </form>
            </div>
        </nav>
    </header>
    <div class="container prono-container">
        <div class="row container-header container-title sambo-background rounded-top">
            <div class="col">
                LISTE DES COMBATS A VENIR
            </div>
        </div>
        <div class="row container-header sambo-background rounded-bottom">
            <div class="col">Combattant 1</div>
            <div class="col">Victoire 1</div>
            <div class="col">Nul</div>
            <div class="col">Victoire 2</div>
            <div class="col">Combattant 2</div>
        </div>
    </div>

    <div class="container prono-container">
        <div id="rowprono1" class="row prono-container-row rounded">
            <div class="col container-combat-name">Jean-Michel</div>
            <div class="col">
                <button class="btn btn-outline-success btn-block">1.52</button></div>
            <div class="col">
                <button class="btn btn-outline-secondary btn-block">5.19</button></div>
            <div class="col">
                <button class="btn btn-outline-danger btn-block">3.21</button></div>
            <div class="col container-combat-name">Patrick-Hervé</div>
        </div>
        <div id="rowprono2" class="row prono-container-row rounded">
            <div class="col container-combat-name">Paul-Henri</div>
            <div class="col">
                <button class="btn btn-outline-success btn-block">1.14</button></div>
            <div class="col">
                <button class="btn btn-outline-secondary btn-block">9.5</button></div>
            <div class="col">
                <button class="btn btn-outline-danger btn-block">14</button></div>
            <div class="col container-combat-name">André-Jean</div>
        </div>
        <div id="rowprono3" class="row prono-container-row rounded">
            <div class="col container-combat-name">André-Jean</div>
            <div class="col">
                <button class="btn btn-outline-danger btn-block">11</button></div>
            <div class="col">
                <button class="btn btn-outline-secondary btn-block">9.19</button></div>
            <div class="col">
                <button class="btn btn-outline-success btn-block">1.21</button></div>
            <div class="col container-combat-name">Patrick-Hervé</div>
        </div>
        <div id="rowprono4" class="row prono-container-row rounded">
            <div class="col container-combat-name">Jacques-Pierre</div>
            <div class="col">
                <button class="btn btn-outline-danger btn-block">2.27</button></div>
            <div class="col">
                <button class="btn btn-outline-secondary btn-block">4.5</button></div>
            <div class="col">
                <button class="btn btn-outline-success btn-block">2</button></div>
            <div class="col container-combat-name">Ernest-Paulin</div>
        </div>
    </div>
</body>

</html>