<?php
ob_start();
?>
<header>
    <!-- Navbar-expand-lg signifie que l'on est sur la navbar lorsque la page web est grande-->
    <nav class="navbar navbar-expand-lg navbar-dark sambo-background">
        <img class="navbar-brand head-logo-resize" src="./src/img/logopronosambo.png">
        <form method="post" action="./home.php">
            <input class="sambo-background no-borders navbar-brand" type="submit" name="" value="PRONOSAMBO">
        </form>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                <li class="nav-item">
                    <form method="post" action="./home.php">
                        <input class="mr-sm-2 sambo-background no-borders" type="submit" name="" value="Accueil">
                    </form>
                </li>
                <li class="nav-item">
                    <form method="post" action="./home.php">
                        <input class="mr-sm-2 sambo-background no-borders" type="submit" name="btnPronos" value="Futures rencontres">
                    </form>
                <li class="nav-item">
                    <form method="post" action="./home.php">
                        <input class="mr-sm-2 sambo-background no-borders" type="submit" name="btnResults" value="Résultats">
                    </form>
                <li class="nav-item">
                    <form method="post" action="./home.php">
                        <input class="mr-sm-2 sambo-background no-borders" type="submit" name="btnFightersList" value="Combattants">
                    </form>
                </li>
                <li class="nav-item">
                    <form method="post" action="./home.php">
                        <input class="mr-sm-2 sambo-background no-borders" type="submit" name="btnCompet" value="Compétitions">
                    </form>
                <li class="nav-item">
                <li class="nav-item padding-left">
                    <form class="form-inline my-2 my-lg-0" method="post" action="./home.php">
                        <input class="form-control mr-sm-2 sambo-navbar-input sambo-background" name="SearchResult" type="search" placeholder="Rechercher un combattant..." aria-label="Search">
                        <input class="btn btn-outline-light my-2 my-sm-0" type="submit" name="btnSearch" value="Recherche"/>
                    </form>
                </li>
            </ul>
            <ul class="navbar-nav mr-auto">
                <?php
                if ((isset($_SESSION['username']) && (isset($_SESSION['gain'])))) {
                    if ($_SESSION['username'] !== "") {
                        $user = $_SESSION['username'];
                        $gain = $_SESSION['gain'];
                        // afficher un message
                        ?>
                        <li class="nav-item">
                    </li>
                        <li class="nav-item">
                            <?php
                                    echo "
                                    <form method=\"post\">
                                        <input class=\"mr-sm-2 sambo-background no-borders\" type=\"submit\" value=\"$user  $gain €\">
                                    </form>";
                                    ?>
                        </li>

                        <li class="nav-item">
                            <form method="post" action="./home.php">
                                <input class="mr-sm-2 sambo-background no-borders" type="submit" name="btnDC" value="Déconnexion">
                            </form>
                        </li>
                    <?php
                        }
                    } else {
                        ?>
                    <li class="nav-item">
                        <form method="post" action="./home.php">
                            <input class="mr-sm-2 sambo-background no-borders" type="submit" name="btnSub" value="S'inscrire">
                        </form>
                    </li>
                    <li class="nav-item">
                        <form method="post" action="./home.php">
                            <input class="mr-sm-2 sambo-background no-borders" type="submit" name="btnLogin" value="Connexion">
                        </form>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </nav>
</header>
<?php
$head = ob_get_clean();
?>