<?php
ob_start();
?>
        
    <img class="img_combattant" src="./src/img/fedor.jpg"></div>
    <div class="block_joueur rounded">
        <div class="champ_joueur">Nom :</div>
        <div class="champ_joueur">Prénom :</div>
        <div class="champ_joueur">Âge :</div>
        <div class="champ_joueur">Taille :</div>
        <div class="champ_joueur">Pays :</div>
        <div class="champ_joueur">Classement :</div>
    </div>

    
    <div class="row container-header container-title sambo-background rounded-top">
        <div class="col">
            PALMARES
        </div>
    </div>
    <div class="row container-header sambo-background rounded-bottom">
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
<?php
    $content=ob_get_clean();
    require("layout.php");
?>