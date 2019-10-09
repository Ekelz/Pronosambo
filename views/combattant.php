<?php
ob_start();
?>

        <h1 class="titre_combattant">Fedor</h1>
        
        <img class="img_combattant" src="../src/img/fedor.jpg"></div>
        <div class="info_joueur">Nom :</div>
        <div class="info_joueur">Prénom :</div>

<?php
    $content=ob_get_clean();
    require("layout.php");
?>