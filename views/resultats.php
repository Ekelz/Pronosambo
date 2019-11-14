<?php
$title = "Pronosambo";
ob_start();
?>

<div class="container prono-container sambo-container item-body">
    <div class="row container-title">
        <div class="col">
            DERNIERS RÉSULTATS
        </div>
    </div>
    <div class="row container-header sambo-background rounded-bottom">
        <div class="col-1">Date</div>
        <div class="col">Combattant 1</div>
        <div class="col">Score</div>
        <div class="col">Combattant 2</div>
        <div class="col-3"></div>
    </div>
</div>
<div class="container prono-container sambo-container item-body">
    <!-- <div id="rowrow1" class="row prono-container-row rounded">
        <div class="col-1">25/09/2019</div>
        <div class="col container-combat-name">Jean-Michel</div>
        <div class="col victoire-totale">Victoire Totale</div>
        <div class="col container-combat-name victoire-totale">Patrick-Hervé</div>
        <div class="col-3">
            <button class="btn btn-outline-danger btn-block">
                <img src="./src/img/sacdor.png" class="gold-logo-resize">
                Empocher mes gains
            </button>
        </div>
    </div> -->

    <?php
    // Requetage
    require "./model/requetes/id_base.php";
    require "./model/requetes/get_finished_games.php";
    $i = 0;

    // Affichage du tableau des résultats
    // Score = -1 : victoire totale.
    while ($row = $q->fetch()) :
        echo '<div id="rowrow', $row['id_match'], '" class="row prono-container-row rounded"><div class="col-1">', $row['date_match'];
        if ($row['score_c1'] == '-1') {
            echo '</div><div class="col container-combat-name victoire-totale">', $row['c1surname'], ' ', $row['c1name'];
            echo '</div><div class="col victoire-totale">Victoire Totale';
            echo '</div><div class="col container-combat-name">', $row['c2surname'], ' ', $row['c2name'];
        } elseif ($row['score_c2'] == "-1") {
            echo '</div><div class="col container-combat-name">', $row['c1surname'], ' ', $row['c1name'];
            echo '</div><div class="col victoire-totale">Victoire Totale';
            echo '</div><div class="col container-combat-name victoire-totale">', $row['c2surname'], ' ', $row['c2name'];
        } elseif ($row['score_c2'] - $row['score_c1'] >= 12) {
            echo '</div><div class="col container-combat-name">', $row['c1surname'], ' ', $row['c1name'];
            echo '</div><div class="col victoire-score">', $row['score_c1'], '-', $row['score_c2'];
            echo '</div><div class="col container-combat-name victoire-totale">', $row['c2surname'], ' ', $row['c2name'];
        } elseif ($row['score_c1'] - $row['score_c2'] >= 12) {
            echo '</div><div class="col container-combat-name victoire-totale">', $row['c1surname'], ' ', $row['c1name'];
            echo '</div><div class="col victoire-score">', $row['score_c1'], '-', $row['score_c2'];
            echo '</div><div class="col container-combat-name">', $row['c2surname'], ' ', $row['c2name'];
        } else {
            echo '</div><div class="col container-combat-name score-nul">', $row['c1surname'], ' ', $row['c1name'];
            echo '</div><div class="col score-nul">', $row['score_c1'], '-', $row['score_c2'], ' (nul)';
            echo '</div><div class="col container-combat-name score-nul">', $row['c2surname'], ' ', $row['c2name'];
        }
        echo '</div><div class="col-3"><button class="btn btn-sm btn-outline-danger btn-block"><img src="./src/img/sacdor.png" class="gold-logo-resize">Empocher mes gains</button></div></div>';
        $i++;
    endwhile;
    if ($i == 0) {
        echo "<div class='row prono-container-row rounded'><div class=col-12>
        Il n'y a pas de combats terminés actuellement.
        </div></div>";
    }
    ?>

</div>

<?php
$content = ob_get_clean();
require("layout.php");
?>