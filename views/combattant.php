<?php
$title="Pronosambo - Combattant";
ob_start();
?>
    <div class="container item-body sambo-container">
    <h1 class="titre_combattant">FEDOR EMELIANENKO</h1>
    <img class="img_combattant" src="./src/img/fedor.jpg"></div>
    <div class="block_joueur rounded">
        <div class="champ_joueur">Âge :</div>
        <div class="champ_joueur">Taille :</div>
        <div class="champ_joueur">Pays :</div>
        <div class="champ_joueur">Classement :</div>
    </div>

    
    <div class="container-fighter row container-header container-title sambo-background rounded-top">
        <div class="col">
            PALMARES
        </div>
    </div>
    <div class="container-fighter row container-header sambo-background rounded-bottom">
        <div class="col">Année</div>
        <div class="col">Compétition</div>
        <div class="col">Rang</div>
    </div>

    <div class="container prono-container">
        <div id="rowprono1" class="row prono-container-row rounded">
            <div class="col container-combat-name">2019</div>
            <div class="col container-combat-name">JO</div>
            <div class="col container-combat-name">1</div>
        </div>
    </div>
</div>
<?php
    $content=ob_get_clean();
    require("layout.php");
?>