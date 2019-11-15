<?php
$sqlRequest = "
SELECT * FROM pronostiques p 
WHERE p.id_utilisateur = '$userId'
AND p.id_match = $matchId
AND p.vote = $btnId;
";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
} catch (PDOException $pe) {
    die("<div>Erreur de connection à la base de données :" . $pe->getMessage() . "</div>");
}

$qProno = $conn->query($sqlRequest);
if($qProno != false){
    $qProno->setFetchMode(PDO::FETCH_ASSOC);
}
$conn = null;