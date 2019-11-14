<?php 
$sqlRequest = "
UPDATE utilisateurs
SET solde = solde + $gain
WHERE id_utilisateur = $userId;";

// Insertion dans la BDD
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
} catch (PDOException $pe) {
    die("<div>Erreur de connection à la base de données :" . $pe->getMessage() . "</div>");
}
$qSoldeUpdated = $conn->query($sqlRequest);
$conn = null;