<?php
$title = "Pronosambo";
ob_start();
?>
<section class="section">
    <div class="container item-body">
        <div class="row">
            <div class="card combattant-home-card">
                <div class="card-header sambo-background">
                    COMBATTANT DU MOIS
                </div>
                <div class="card-body">
                    <p>
                        FEDOR EMELIANENKO
                    </p>
                    <p>
                        Déjà élu pour la 10eme fois cette année !
                    </p>
                    <form method="post" action="./home.php">
                        <button class="btn btn-light my-2 my-sm-0 sambo-background" type="submit" name="btnFighter" value="Fedor Emelianenko">Accéder à son profil</button>
                    </form>
                </div>
            </div>
            <div class="card combattant-home-card">
                <div class="card-header sambo-background">
                    DERNIERES ACTUALITES
                </div>
                <div class="card-body">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus faucibus, nibh ac volutpat fringilla, magna magna posuere nisi, et luctus urna arcu et arcu. Sed vehicula id dolor quis lobortis. Vestibulum non urna sit amet nibh venenatis ornare. Nunc tempus diam ut neque commodo, sit amet porta ante hendrerit. Proin sodales libero in lacus pharetra blandit.
                    </p>
                    <form>
                        <button class="btn btn-light my-2 my-sm-0 sambo-background" type="submit">Accéder à quelque chose</button>
                    </form>
                </div>
            </div>
            <div class="card combattant-home-card">
                <div class="card-header sambo-background">
                    DECOUVREZ L'UNIVERS DU SAMBO ! INSCRIVEZ VOUS
                </div>
                <div class="card-body">
                    <form>
                        <!--TODO : lien vers l'inscription-->
                        <button class="btn btn-light my-2 my-sm-0 sambo-background" type="submit">Accéder à quelque chose</button>
                    </form>
                </div>
            </div>
        </div>
</section>
</div>

<?php
$content = ob_get_clean();
require("layout.php");
?>