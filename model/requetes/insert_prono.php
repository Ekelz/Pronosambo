<?php
// TODO : VERIFICATION DE L'ABSENCE DE PARI SIMILAIRE => a faire dans liste_pronostics ?

// Creation de la requête
$sqlRequest = "
INSERT INTO pronostiques (id_utilisateur, id_match, mise, vote)
VALUES (
    $userId,
    $matchId,
    10,
    $btnId);
";

// Insertion dans la BDD
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
} catch (PDOException $pe) {
    die("<div>Erreur de connection à la base de données :" . $pe->getMessage() . "</div>");
}
$qPronoInserted = $conn->query($sqlRequest);
$conn = null;
