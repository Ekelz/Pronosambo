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
    <!--
    <div id="rowprono0" class="row prono-container-row rounded">
        <div class="col container-combat-name">Jean-Michel</div>
        <div class="col">
            <button class="btn btn-outline-success btn-block">
                1.52
            </button>
        </div>
        <div class="col">
            <button class="btn btn-outline-secondary btn-block">
                5.21
            </button>
        </div>
        <div class="col">
            <button class="btn btn-outline-danger btn-block">
                3.19
            </button>
        </div>
        <div class="col container-combat-name">Patrick-Hervé</div>
    </div>
    -->

    <!-- PHP : Génération automatique de pronostics -->
    <?php
    $line1 = array('C1' => "Jean-Michel", 'V1' => "1.52", 'N' => "5.21", 'V2' => "3.19", 'C2' => "Patrick-Hervé");
    $line2 = array('C1' => "Paul-Henri", 'V1' => "1.14", 'N' => "9.5", 'V2' => "14", 'C2' => "André-Jean");
    $line3 = array('C1' => "André-Jean", 'V1' => "11", 'N' => "9.19", 'V2' => "1.21", 'C2' => "Patrick-Hervé");
    $line4 = array('C1' => "Jacques-Pierre", 'V1' => "2.27", 'N' => "4.5", 'V2' => "2", 'C2' => "Ernest-Paulin");
    $line5 = array('C1' => "Etienne", 'V1' => "1.01", 'N' => "25", 'V2' => "100", 'C2' => "Quentin");
    $line6 = array('C1' => "Quentin", 'V1' => "2.2", 'N' => "3.6", 'V2' => "2.15", 'C2' => "Gabrielle");
    $line7 = array('C1' => "Gabrielle", 'V1' => "1.9", 'N' => "5", 'V2' => "2.8", 'C2' => "Etienne");
    $line8 = array('C1' => "Jean-Patrick", 'V1' => "2.44", 'N' => "3.6", 'V2' => "1.95", 'C2' => "Albert-José");
    $line9 = array('C1' => "Thierry-Paul", 'V1' => "8", 'N' => "7.5", 'V2' => "1.14", 'C2' => "Etienne");
    $line10 = array('C1' => "Gabrielle", 'V1' => "1.52", 'N' => "4.9", 'V2' => "4.67", 'C2' => "Patrick-Hervé");
    $line11 = array('C1' => "Quentin", 'V1' => "1", 'N' => "100", 'V2' => "8547", 'C2' => "Ernest-Paulin");
    $pronostics = array(1 => $line1, $line2, $line3, $line4, $line5, $line6, $line7, $line8, $line9, $line10, $line11);
    $i = 0;
    foreach ($pronostics as $prono) {
        echo '<div id="rowprono', $i, '" class="row prono-container-row rounded"><div class="col container-combat-name">', $prono['C1'];
        if ($prono['V1'] >= $prono['V2']) {
            echo '</div> <div class="col"><button class="btn btn-outline-danger btn-block">', $prono['V1'];
            echo '</button></div> <div class="col"><button class="btn btn-outline-secondary btn-block">', $prono['N'];
            echo '</button></div><div class="col"><button class="btn btn-outline-success btn-block">', $prono['V2'];
        } else {
            echo '</div> <div class="col"><button class="btn btn-outline-success btn-block">', $prono['V1'];
            echo '</button></div> <div class="col"><button class="btn btn-outline-secondary btn-block">', $prono['N'];
            echo '</button></div><div class="col"><button class="btn btn-outline-danger btn-block">', $prono['V2'];
        }
        echo '</button></div><div class="col container-combat-name">', $prono['C2'], '</div></div>';
        $i++;
    }
    ?>
</div>

<?php
$content = ob_get_clean();
require("layout.php");
?>