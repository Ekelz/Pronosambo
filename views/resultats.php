<?php
$title = "Pronosambo";
ob_start();

require "./model/requetes/id_base.php";
require "./views/displayWarning_function.php";
if (isset($_SESSION['username'])) {
    // Récupération de l'user
    require "./model/requetes/get_user.php";
    $userInfos = $qUser->fetch();
}
?>

<div class="container prono-container sambo-container item-body">
    <div class="row container-title">
        <div class="col">
            DERNIERS RÉSULTATS
        </div>
    </div>
    <?php
    /*
    Soumission recup gains : on calcule le gain de l'utilisateur, on l'ajoute à son solde, on delete le prono. 
    */
    // Test de rafraichissement de la page
    $pageIsRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';

    if (isset($_POST["btnRecupGain"]) && !$pageIsRefreshed) {
        // Récupération du pronostic vainqueur
        $userId = $userInfos['id_utilisateur'];
        $matchId = $_POST['matchId'];
        $btnId = $_POST['btnWinnerId'];
        require "./model/requetes/get_prono_succesful.php";
        if (!($qPronoSuc == false || $qPronoSuc->rowCount() == 0)) {
            // Si il est bien récupéré on calcule le gain d'argent
            $successProno = $qPronoSuc->fetch();
            switch ($successProno['vote']) {
                case 0:
                    $coef = $successProno['coteN'];
                    break;
                case 1:
                    $coef = $successProno['cote1'];
                    break;
                case 2:
                    $coef = $successProno['cote2'];
                    break;
            }

            // On met à jour le solde utilisateur en ajoutant le nouveau gain 
            $gain = $coef * $successProno['mise'];
            require "./model/requetes/update_solde_user.php";
            if ($qSoldeUpdated != false) {
                // On supprime le pari vainqueur pour éviter le doublage des gains
                $successPronoId = $successProno['pronoId'];
                require "./model/requetes/delete_prono.php";
                if ($qPronoDeleted != false) {
                    // Si tout s'est bien passé, on affiche la bonne nouvelle à l'utilisateur
                    displayWarning('success', "Bien joué ! Votre compte vient d'être crédité de " . $gain . ' €.');
                } else {
                    displayWarning('danger', 'Erreur base de données : Suppression du pari impossible.');
                }
            } else {
                displayWarning('danger', 'Une erreur est survenue. Impossible de récupérer les gains pour le moment.');
            }
        } else {
            displayWarning('danger', 'Une erreur est survenue. Impossible de récupérer les gains pour le moment.');
        }
    }
    ?>
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
                <form method="post" action="./home.php">
                    <input type="hidden" name="matchId" value="<?php echo $row["id_match"]; ?>">
                    <button type="submit" class="btn btn-outline-danger btn-block" <?php
                                                                                        // Si l'user a parié et réussi son pari, on affiche le bouton; sinon disabled
                                                                                        if ($row['score_c1'] == '-1' || $row['score_c1'] - $row['score_c2'] >= 12) {
                                                                                            $btnId = 1;
                                                                                        } elseif ($row['score_c2'] == "-1" || $row['score_c2'] - $row['score_c1'] >= 12) {
                                                                                            $btnId = 2;
                                                                                        } else {
                                                                                            $btnId = 0;
                                                                                        }
                                                                                        if (isset($userInfos)) {
                                                                                            $userId = $userInfos['id_utilisateur'];
                                                                                            $matchId = $row['id_match'];
                                                                                            require "./model/requetes/get_prono.php";
                                                                                            if ($qProno == false || $qProno->rowCount() == 0) {
                                                                                                echo "disabled='disabled'";
                                                                                            }
                                                                                        } else {
                                                                                            echo "disabled='disabled'";
                                                                                        }
                                                                                        ?> name="btnRecupGain">
                        <img src="./src/img/sacdor.png" class="gold-logo-resize">
                        Empocher mes gains
                    </button>
                    <input type="hidden" name="btnWinnerId" value="<?php echo $btnId; ?>">
                </form>
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