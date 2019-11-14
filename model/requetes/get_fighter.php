<?php
    $combattant_info = explode ( " " , $combattant);;

    $sqlRequestFighter = "SELECT * FROM combattants where prenom = \"$combattant_info[0]\" AND nom = \"$combattant_info[1]\";";

    $sqlRequestCompetition = "SELECT p.resultat resultat, c.nom nom, c.annee annee, c.pays pays FROM palmares p 
    INNER JOIN competitions c ON p.id_competition = c.id_competition 
    INNER JOIN combattants cb ON p.id_combattant = cb.id_combattant 
    WHERE cb.prenom = \"$combattant_info[0]\" 
    AND cb.nom = \"$combattant_info[1]\"
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