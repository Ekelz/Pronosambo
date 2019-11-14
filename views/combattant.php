<?php
$title="Pronosambo - Combattant";
ob_start();

$host = 'localhost'; // Ou Adresse IP du server 11.22.33.44. Inutile de préciser le port 3306 si non changé.
    $dbname = 'pronosambo';
    $username = 'root';
    $password = '';
    $sqlRequestFighter = "SELECT * FROM combattants where id_combattant = 1;";
    $sqlRequestCompetition = "SELECT p.resultat resultat, c.nom nom, c.annee annee, c.pays pays FROM palmares p
    INNER JOIN competitions c ON p.id_competition = c.id_competition
    WHERE p.id_combattant = 1
    ORDER BY c.annee DESC;";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    } catch (PDOException $pe) {
        echo '<br>Arrêt du script.';
        die("<br>Erreur de connexion sur $dbname chez $host :" . $pe->getMessage());
    }
    $qFigther = $conn->query($sqlRequestFighter);
    $qFigther->setFetchMode(PDO::FETCH_ASSOC);

    $qCompetition = $conn->query($sqlRequestCompetition);
    $qCompetition->setFetchMode(PDO::FETCH_ASSOC);
    $conn = null;
?>

<div class="container item-body sambo-container">
    <?php
        while ($value = $qFigther->fetch()) :
    ?>
    <div class="row prono-container container-title">
		<div class="col">
        <?php echo strtoupper(htmlspecialchars($value['prenom'])), " ", strtoupper(htmlspecialchars($value['nom'])) ?>
		</div>
	</div>
    
    <img class="img_combattant" src="./src/img/<?php echo htmlspecialchars($value['image_lien'])?>">

    
    <div class="container-fighter row container-header container-title sambo-background rounded-top">
        <div class="col">
            PALMARES
        </div>
    </div>
    <div class="container-fighter row container-header sambo-background rounded-bottom">
        <div class="col">Année</div>
        <div class="col">Compétition</div>
        <div class="col">Pays</div>
        <div class="col">Rang</div>
    </div>

    <?php
        while ($row = $qCompetition->fetch()) :
    ?>
        <div class="row prono-container-row rounded container-fighter ">
            <div class="col container-combat-name"><?php echo htmlspecialchars($row['annee']) ?></div>
            <div class="col container-combat-name"><?php echo htmlspecialchars($row['nom']) ?></div>
            <div class="col container-combat-name"><?php echo htmlspecialchars($row['pays']) ?></div>
            <div class="col container-combat-name"><?php echo htmlspecialchars($row['resultat']) ?></div>
        </div>
    
    <?php
        endwhile
    ?>

    <div class="block_joueur rounded">
        <div class="champ_joueur">Âge : <?php echo htmlspecialchars($value['age']) ?> ans</div>
        <div class="champ_joueur">Poids : <?php echo htmlspecialchars($value['poids']) ?> kg</div>
        <div class="champ_joueur">Taille : <?php echo htmlspecialchars($value['taille']) ?> cm</div>
        <div class="champ_joueur">Pays : <?php echo htmlspecialchars($value['pays']) ?></div>
        <div class="champ_joueur">Classement : <?php echo htmlspecialchars($value['classement']) ?></div>
    </div>
    <?php
        endwhile
    ?>
</div>
<?php
    $content=ob_get_clean();
    require("layout.php");
?>