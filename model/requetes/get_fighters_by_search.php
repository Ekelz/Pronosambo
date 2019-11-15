<?php
    $combattant_info = explode ( " " , $combattant);;



    if (count($combattant_info) == 1) {
        $sqlRequestFighter = "SELECT * FROM combattants 
        where prenom = \"$combattant_info[0]\" OR nom = \"$combattant_info[0]\";";
    } else if (count($combattant_info) == 2) {
        $sqlRequestFighter = "SELECT * FROM combattants 
        where (prenom = \"$combattant_info[0]\" OR prenom = \"$combattant_info[1]\")
            OR (nom = \"$combattant_info[0]\" OR nom = \"$combattant_info[1]\");";
    }

    if (count($combattant_info) == 1 || count($combattant_info) == 2) {
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    } catch (PDOException $pe) {
        echo '<br>Arrêt du script.';
        die("<br>Erreur de connexion sur $dbname chez $host :" . $pe->getMessage());
    }
    
    $q = $conn->query($sqlRequestFighter);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $conn = null;
    } else{
        $q = null;
    }
?>