<?php
$title = "Pronosambo";
ob_start();
?>

<div class="container prono-container sambo-container item-body">
    <div class="row container-title">
        <div class="col">
            COMBATS À VENIR
        </div>
    </div>
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
    $host = 'localhost';
    $dbname = 'pronosambo';
    $username = 'root';
    $password = '';
    $sqlRequest = "
        SELECT cote_c1, cote_c2, cote_nulle, id_match, c1.nom c1name, c1.prenom c1surname, c2.nom c2name, c2.prenom c2surname
        FROM `matchs` 
        INNER JOIN combattants c1 ON matchs.id_combattant_1 = c1.id_combattant
        INNER JOIN combattants c2 ON matchs.id_combattant_2 = c2.id_combattant
        WHERE (est_termine = FALSE)
    ";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    } catch (PDOException $pe) {
        die("<div>Erreur de connection à la base de données :" . $pe->getMessage() . "</div>");
    }
    $q = $conn->query($sqlRequest);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $conn = null;

    // Affichage du tableau de résultats
    while ($row = $q->fetch()) :
        ?>
        <div id="rowprono<?php echo $row["id_match"]; ?>" class="row prono-container-row rounded">
            <div class="col container-combat-name"><?php echo $row["c1name"], ' ', $row["c1surname"]; ?></div>
            <div class="col">
                <button class="btn btn-sm <?php if ($row['cote_c1'] <= $row['cote_c2']) {
                                            echo 'btn-outline-success';
                                        } else {
                                            echo 'btn-outline-danger';
                                        } ?> btn-block">
                    <?php echo $row['cote_c1']; ?>
                </button>
            </div>
            <div class="col">
                <button class="btn btn-sm btn-outline-secondary btn-block">
                    <?php echo $row['cote_nulle']; ?>
                </button>
            </div>
            <div class="col">
                <button class="btn btn-sm <?php if ($row['cote_c2'] <= $row['cote_c1']) {
                                            echo 'btn-outline-success';
                                        } else {
                                            echo 'btn-outline-danger';
                                        } ?> btn-block">
                    <?php echo $row['cote_c2']; ?>
                </button>
            </div>
            <div class="col container-combat-name"><?php echo $row["c2name"], ' ', $row["c2surname"]; ?></div>
        </div>
    <?php
    endwhile
    ?>
</div>

<?php
$content = ob_get_clean();
require("layout.php");
?>