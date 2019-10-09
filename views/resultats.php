<?php
$title = "Pronosambo";
ob_start();
?>

<div class="container prono-container item-body">
    <div class="row container-header container-title sambo-background rounded-top">
        <div class="col">
            DERNIERS RESULTATS
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
<div class="container prono-container item-body">
    <!-- <div id="rowresult1" class="row prono-container-row rounded">
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

    <!-- PHP : Génération automatique de résultats -->
    <?php
    $line1 = array('Date' => "20/09/2019", 'C1' => "Jean-Michel", 'S1' => "45", 'S2' => "18", 'C2' => "Patrick-Hervé");
    $line2 = array('Date' => "19/09/2019", 'C1' => "Paul-Henri", 'S1' => "", 'S2' => "Victoire Totale", 'C2' => "Quentin");
    $line3 = array('Date' => "14/09/2019", 'C1' => "Lalala", 'S1' => "12", 'S2' => "9", 'C2' => "Patrick-Hervé");
    $results = array($line1, $line2, $line3);
    $i = 0;
    foreach ($results as $result) {
        echo '<div id="rowresult', $i, '" class="row prono-container-row rounded"><div class="col-1">', $result['Date'];
        if ($result['S1'] == 'Victoire Totale') {
            echo '</div><div class="col container-combat-name victoire-totale">', $result['C1'];
            echo '</div><div class="col victoire-totale">', $result['S1'];
            echo '</div><div class="col container-combat-name">', $result['C2'];
        } elseif ($result['S2'] == "Victoire Totale") {
            echo '</div><div class="col container-combat-name">', $result['C1'];
            echo '</div><div class="col victoire-totale">', $result['S2'];
            echo '</div><div class="col container-combat-name victoire-totale">', $result['C2'];
        } elseif ($result['S2'] - $result['S1'] >= 12) {
            echo '</div><div class="col container-combat-name">', $result['C1'];
            echo '</div><div class="col victoire-score">', $result['S1'], '-', $result['S2'];
            echo '</div><div class="col container-combat-name victoire-totale">', $result['C2'];
        } elseif ($result['S1'] - $result['S2'] >= 12) {
            echo '</div><div class="col container-combat-name victoire-totale">', $result['C1'];
            echo '</div><div class="col victoire-score">', $result['S1'], '-', $result['S2'];
            echo '</div><div class="col container-combat-name">', $result['C2'];
        } else {
            echo '</div><div class="col container-combat-name score-nul">', $result['C1'];
            echo '</div><div class="col score-nul">', $result['S1'], '-', $result['S2'];
            echo '</div><div class="col container-combat-name score-nul">', $result['C2'];
        }
        echo '</div><div class="col-3"><button class="btn btn-outline-danger btn-block"><img src="./src/img/sacdor.png" class="gold-logo-resize">Empocher mes gains</button></div></div>';
        $i++;
    }
    ?>

</div>

<?php
$content = ob_get_clean();
require("layout.php");
?>