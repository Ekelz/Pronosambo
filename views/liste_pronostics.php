<?php
$title = "Pronosambo";
ob_start();

// Ids de connexion à la base
$host = 'localhost';
$dbname = 'pronosambo';
$username = 'root';
$password = '';

// Affichage Warnings
function displayWarning($type, $message)
{
    // TODO
}
?>

<div class="container prono-container sambo-container item-body">
    <div class="row container-title">
        <div class="col">
            COMBATS À VENIR
        </div>
    </div>

    <?php
    // Soumission pronostics : Si l'utilisateur n'a pas les droits ou l'argent pour faire un pari : erreur.
    //                         Si pari bien posté : message de succès.
    //                         Si refresh page après le post : igonrer le post.
    // Test de rafraichissement de la page
    $pageIsRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
    if (isset($_POST['prono-btn-1']) || isset($_POST['prono-btn-2']) || isset($_POST['prono-btn-n'])) {
        if (!$pageIsRefreshed) {
            if (isset($_SESSION['username'])) {
                // Récupération du solde de l'user
                require "./model/requetes/get_user.php";
                $userInfos = $qUser->fetch();
                if ($userInfos["solde"] >= 10) {
                    // Définition des paramètres utilisés dans la requête
                    $userId = $userInfos['id_utilisateur'];
                    $matchId = $_POST['matchId'];
                    if (isset($_POST['prono-btn-1'])) {
                        $btnId = 1;
                    } elseif (isset($_POST['prono-btn-2'])) {
                        $btnId = 2;
                    } else {
                        $btnId = 0;
                    }

                    // Vérification de l'absence de pari similaire
                    require "./model/requetes/get_prono.php";
                    if ($qProno->rowCount() == 0 || $qProno == false) {
                        // Création du pari 
                        require "./model/requetes/insert_prono.php";
                        if ($qPronoInserted != false) {
                            // Affichage succès dans l'enregistrement du pari
                            echo '<div class="row"><div class="col alert alert-success">';
                            echo "Votre pari a été enregistré avec succès !";
                            echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button></div></div>';
                        } else {
                            // Affichage echec dans l'enregistrement du pari
                            echo '<div class="row"><div class="col alert alert-danger">';
                            echo "Une erreur a empêché d'enregistrer votre pari. Merci de réessayer ultérieurement.";
                            echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button></div></div>';
                        }
                    } else {
                        // Affichage warning pari deja fait
                        echo '<div class="row"><div class="col alert alert-warning">';
                        echo "Vous avez déjà parié sur ce résultat.";
                        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div></div>';
                    }
                } else {
                    // Affichage warning pas assez de solde
                    echo '<div class="row"><div class="col alert alert-warning">';
                    echo "Vous n'avez pas assez d'argent pour faire ce pari.";
                    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div></div>';
                }
            } else {
                // Affichage warning pas connecté
                echo '<div class="row"><div class="col alert alert-warning">';
                echo "Vous n'êtes pas authentifié ! Le pari a été ignoré.";
                echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div></div>';
            }
        }
    }
    ?>

    <div class="row container-header sambo-background rounded">
        <div class="col">Combattant 1</div>
        <div class="col">Victoire 1</div>
        <div class="col">Nul</div>
        <div class="col">Victoire 2</div>
        <div class="col">Combattant 2</div>
    </div>
</div>
<div class="container prono-container item-body">
    <?php
    // Requetage 
    require "./model/requetes/get_pronostics.php";

    // Affichage du tableau de résultats
    $i = 0;
    while ($row = $q->fetch()) :
        ?>
        <div id="rowprono<?php echo $row["id_match"]; ?>">
            <form class="row prono-container-row rounded" method="post" action="./home.php">
                <div class="col container-combat-name"><?php echo $row["c1surname"], ' ', $row["c1name"]; ?></div>
                <div class="col">
                    <input type="submit" class="btn btn-sm <?php if ($row['cote_c1'] <= $row['cote_c2']) {
                                                                    echo 'btn-outline-success';
                                                                } else {
                                                                    echo 'btn-outline-danger';
                                                                } ?> btn-block" name="prono-btn-1" value="<?php echo $row['cote_c1']; ?>">
                </div>
                <div class="col">
                    <input type="submit" class="btn btn-sm btn-outline-secondary btn-block" name="prono-btn-n" value="<?php echo $row['cote_nulle']; ?>">
                </div>
                <div class="col">
                    <input type="submit" class="btn btn-sm <?php if ($row['cote_c2'] <= $row['cote_c1']) {
                                                                    echo 'btn-outline-success';
                                                                } else {
                                                                    echo 'btn-outline-danger';
                                                                } ?> btn-block" name="prono-btn-2" value="<?php echo $row['cote_c2']; ?>">
                </div>
                <div class="col container-combat-name"><?php echo $row["c2surname"], ' ', $row["c2name"]; ?></div>
                <input type="hidden" name="matchId" value="<?php echo $row["id_match"]; ?>">
            </form>
        </div>
    <?php
        $i++;
    endwhile;

    // Si pas de données dans la DB, on affiche un container vide
    if ($i == 0) {
        echo "<div class='row prono-container-row rounded'><div class=col-12>
        Il n'y a pas de combats en attente actuellement.
        </div></div>";
    }
    ?>
</div>

<?php
$content = ob_get_clean();
require("layout.php");
?>