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

    <?php
    // Requetage
    require "./model/requetes/id_base.php";
    require "./model/requetes/get_finished_games.php";
    $i = 0;

    // Affichage du tableau des résultats
    // Score = -1 : victoire totale (KO).
    while ($row = $q->fetch()) :
        ?>
        <div id="<?php echo $row['id_match']; ?>" class="row prono-container-row rounded">
            <div class="col-1"><?php echo $row['date_match'] ?></div>
            <div class="col container-combat-name <?php
                                                        if ($row['score_c1'] == "-1") {
                                                            echo "victoire-totale";
                                                        } elseif ($row['score_c2'] != "-1" && $row['score_c2'] - $row['score_c1'] <= 12 && $row['score_c1'] - $row['score_c2'] <= 12) {
                                                            echo  "score-nul";
                                                        }
                                                        ?>"><?php echo $row['c1surname'], ' ', $row['c1name']; ?></div>
            <div class="col <?php
                                if ($row['score_c1'] == '-1' || $row['score_c2'] == "-1") {
                                    echo "victoire-totale";
                                } elseif ($row['score_c2'] - $row['score_c1'] >= 12) {
                                    echo  "victoire-score";
                                } elseif ($row['score_c1'] - $row['score_c2'] >= 12) {
                                    echo "victoire-score";
                                } else {
                                    echo "score-nul";
                                }
                                ?>">
                <?php
                    if ($row['score_c1'] == '-1' || $row['score_c2'] == "-1") {
                        echo "Victoire par KO";
                    } elseif ($row['score_c2'] - $row['score_c1'] >= 12) {
                        echo  $row['score_c1'], '-', $row['score_c2'];
                    } elseif ($row['score_c1'] - $row['score_c2'] >= 12) {
                        echo  $row['score_c1'], '-', $row['score_c2'];
                    } else {
                        echo  $row['score_c1'], '-', $row['score_c2'];
                    }
                    ?>
            </div>
            <div class="col container-combat-name <?php
                                                        if ($row['score_c2'] == "-1") {
                                                            echo "victoire-totale";
                                                        } elseif ($row['score_c1'] != "-1" && $row['score_c2'] - $row['score_c1'] <= 12 && $row['score_c1'] - $row['score_c2'] <= 12) {
                                                            echo  "score-nul";
                                                        }
                                                        ?>">
                <?php echo $row['c2surname'], ' ', $row['c2name']; ?>
            </div>
            <div class="col-3">
                <button class="btn btn-outline-danger btn-block" <?php
                                                                        // Si l'user a parié et réussi son pari, on affiche le bouton; sinon disabled
                                                                        require "./model/requetes/get_achieved_pronostics.php";
                                                                        ?>>
                    <img src="./src/img/sacdor.png" class="gold-logo-resize">
                    Empocher mes gains
                </button>
            </div>
        </div>
    <?php
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