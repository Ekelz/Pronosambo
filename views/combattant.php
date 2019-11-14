<?php
$title="Pronosambo - Combattant";
ob_start();
?>

<div class="row container item-body sambo-container">
    <?php

        $combattant = $_POST["btnFighter"];
        require "./model/requetes/id_base.php";
        require "./model/requetes/get_fighter.php";

        while ($value = $qFigther->fetch()) :
    ?>
    <div class="col col-sm-12 container-title">
        <div class="row ">
            <div class="col prono-container">
                <?php echo strtoupper(htmlspecialchars($value['prenom'])), " ", strtoupper(htmlspecialchars($value['nom'])) ?>
            </div>
        </div>
    </div>
    
	<div class="col col-sm-3">
        <div class="row">
            <img class="img_combattant" src="./src/img/<?php echo htmlspecialchars($value['image_lien'])?>">
        </div>

        <div class="row">
            <div class="block_joueur rounded">
                <div class="champ_joueur">Âge : <?php echo htmlspecialchars($value['age']) ?> ans</div>
                <div class="champ_joueur">Poids : <?php echo htmlspecialchars($value['poids']) ?> kg</div>
                <div class="champ_joueur">Taille : <?php echo htmlspecialchars($value['taille']) ?> cm</div>
                <div class="champ_joueur">Pays : <?php echo htmlspecialchars($value['pays']) ?></div>
                <div class="champ_joueur">Classement : <?php echo htmlspecialchars($value['classement']) ?></div>
            </div>
        </div>
    </div>
    
    <div class="col col-sm-9">
            <div class="container-fighter row container-header container-title sambo-background rounded-top">
                <div class="col">
                    PALMARES
                </div>
            </div>
        
            <div class="container-fighter row container-header sambo-background rounded-bottom">
                <div class="col">Année</div>
                <div class="col">Compétition</div>
                <div class="col">Pays</div>
                <div class="col">Rang</div>
            </div>

            <?php
                while ($row = $qCompetition->fetch()) :
            ?>
                <div class="row prono-container-row rounded container-fighter ">
                    <div class="col container-combat-name"><?php echo htmlspecialchars($row['annee']) ?></div>
                    <div class="col container-combat-name"><?php echo htmlspecialchars($row['nom']) ?></div>
                    <div class="col container-combat-name"><?php echo htmlspecialchars($row['pays']) ?></div>
                    <div class="col container-combat-name"><?php echo htmlspecialchars($row['resultat']) ?></div>
                </div>
            
            <?php
                endwhile
            ?>
        </div>
    </div>

    <?php
        endwhile
    ?>
</div>
<?php
    $content=ob_get_clean();
    require("layout.php");
?>