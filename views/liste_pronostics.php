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
    require "./model/requetes/id_base.php";
    require "./model/requetes/get_pronostics.php";

    // Affichage du tableau de résultats
    $i = 0;
    while ($row = $q->fetch()) :
        ?>
        <div id="rowprono<?php echo $row["id_match"]; ?>" class="row prono-container-row rounded">
            <div class="col container-combat-name"><?php echo $row["c1surname"], ' ', $row["c1name"]; ?></div>
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
            <div class="col container-combat-name"><?php echo $row["c2surname"], ' ', $row["c2name"]; ?></div>
        </div>
    <?php
    $i++;
    endwhile;

    
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