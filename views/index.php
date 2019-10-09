<?php
$title="Pronosambo";
ob_start();
?>
<section class="section">
    <div class="container item-body">
        <div class="row">
            <div class="card combattant-home-card">
                <div class="card-header sambo-background">
                    BONJOUR JE SUIS UNE CARTE
                    LOL
                </div>
                <div class="card-body">
                    <p>
                        Et moi je suis le body de la carte. Je contiens de nombreux éléments afin de renforcer votre impression de contenir quelque chose d'intéressant, ce qu n'est bien sûr pas le cas.
                    </p>
                    <form>
                        <button class="btn btn-light my-2 my-sm-0 sambo-background" type="submit">Accéder à quelque chose</button>
                        <button class="btn btn-light my-2 my-sm-0 sambo-background" type="submit">BOUTON</button>
                        <button class="btn btn-light my-2 my-sm-0 sambo-background" type="submit">TONBOU</button>
                    </form>
                </div>
            </div>
            <div class="card combattant-home-card">
                <div class="card-header sambo-background">
                    ET MOI JE SUIS UNE AUTRE CARTE
                </div>
                <div class="card-body">
                    <form>
                        <button class="btn btn-light my-2 my-sm-0 sambo-background" type="submit">Accéder à quelque chose</button>
                    </form>
                </div>
            </div>
            <div class="card combattant-home-card">
                <div class="card-header sambo-background">
                    ET MOI UNE 3EME CARTE ! CONSIDEREZ MOI !!
                </div>
                <div class="card-body">
                    <form>
                        <button class="btn btn-light my-2 my-sm-0 sambo-background" type="submit">Accéder à quelque chose</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    </div>

<?php
    $content=ob_get_clean();
    require("layout.php");
?>