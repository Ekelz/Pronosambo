<?php
ob_start();
?>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark sambo-background">
        <img class=navbar-brand style="width:50px;" src="./src/img/logopronosambo.png">
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
                    <a class="nav-link" href="#">Résultats </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Combattants </a>
                </li>
                <li class="nav-item padding-left-header">
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
<?php
$head = ob_get_clean();
?>