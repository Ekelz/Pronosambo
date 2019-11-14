<?php
$title="Pronosambo";
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
                    <form method="post" action="./home.php">
                        <button class="btn btn-light my-2 my-sm-0 sambo-background" type="submit" name="btnFighter" value="Fedor Emelianenko">Accéder à son profil</button>
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