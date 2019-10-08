<?php
ob_start();
?>
<nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
            <li><a href="./home.php">Accueil</a></li>
            <li><a href="#">Sources</a></li>
        </ul>
        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <a class="button is-primary">
                        <strong>Inscription</strong>
                    </a>
                    <form method="post" action="./home.php">
                        <input class="button is-light" type="submit" name="btnLogin" value="Connexion">
                    </form>
                </div>
            </div>
        </div>
    </nav>
<?php
$head=ob_get_clean();
?>