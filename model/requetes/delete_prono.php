<?php
$sqlRequest = "
DELETE FROM pronostiques 
WHERE id_pronostique = $successPronoId;
";

// Insertion dans la BDD
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
} catch (PDOException $pe) {
    die("<div>Erreur de connection à la base de données :" . $pe->getMessage() . "</div>");
}
$qPronoDeleted = $conn->query($sqlRequest);
$conn = null;
