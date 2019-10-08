<?php
$title = "Pronosambo";
ob_start();
?>

<div class="container prono-container">
    <div class="row container-header container-title sambo-background rounded-top">
        <div class="col">
            LISTE DES COMBATS A VENIR
        </div>
    </div>
    <div class="row container-header sambo-background rounded-bottom">
        <div class="col">Combattant 1</div>
        <div class="col">Victoire 1</div>
        <div class="col">Nul</div>
        <div class="col">Victoire 2</div>
        <div class="col">Combattant 2</div>
    </div>
</div>
<div class="container prono-container">
    <div id="rowprono1" class="row prono-container-row rounded">
        <div class="col container-combat-name">Jean-Michel</div>
        <div class="col">
            <button class="btn btn-outline-success btn-block">1.52</button></div>
        <div class="col">
            <button class="btn btn-outline-secondary btn-block">5.19</button></div>
        <div class="col">
            <button class="btn btn-outline-danger btn-block">3.21</button></div>
        <div class="col container-combat-name">Patrick-Hervé</div>
    </div>
    <div id="rowprono2" class="row prono-container-row rounded">
        <div class="col container-combat-name">Paul-Henri</div>
        <div class="col">
            <button class="btn btn-outline-success btn-block">1.14</button></div>
        <div class="col">
            <button class="btn btn-outline-secondary btn-block">9.5</button></div>
        <div class="col">
            <button class="btn btn-outline-danger btn-block">14</button></div>
        <div class="col container-combat-name">André-Jean</div>
    </div>
    <div id="rowprono3" class="row prono-container-row rounded">
        <div class="col container-combat-name">André-Jean</div>
        <div class="col">
            <button class="btn btn-outline-danger btn-block">11</button></div>
        <div class="col">
            <button class="btn btn-outline-secondary btn-block">9.19</button></div>
        <div class="col">
            <button class="btn btn-outline-success btn-block">1.21</button></div>
        <div class="col container-combat-name">Patrick-Hervé</div>
    </div>
    <div id="rowprono4" class="row prono-container-row rounded">
        <div class="col container-combat-name">Jacques-Pierre</div>
        <div class="col">
            <button class="btn btn-outline-danger btn-block">2.27</button></div>
        <div class="col">
            <button class="btn btn-outline-secondary btn-block">4.5</button></div>
        <div class="col">
            <button class="btn btn-outline-success btn-block">2</button></div>
        <div class="col container-combat-name">Ernest-Paulin</div>
    </div>
    
    <!-- PHP : Test de génération automatique de pronostics -->
    <?php
    $line1 = array('C1' => "Etienne",'V1' => "1.01",'N' => "25",'V2' => "100",'C2' => "Quentin");
    $line2 = array('C1' => "Quentin",'V1' => "2.2",'N' => "3.6",'V2' => "2.15",'C2' => "Gabrielle");
    $line3 = array('C1' => "Gabrielle",'V1' => "1.9",'N' => "5",'V2' => "2.8",'C2' => "Etienne");
    $pronostics = array(1 => $line1, $line2, $line3);
    ?>
    <!-- A terminer -->
    
</div>

<?php
$content = ob_get_clean();
require("layout.php");
?>