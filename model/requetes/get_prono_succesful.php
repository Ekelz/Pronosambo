<?php
$sqlRequest = "
SELECT p.id_pronostique pronoId, p.mise mise, p.vote vote, m.cote_c1 cote1, m.cote_c2 cote2, m.cote_nulle coteN 
FROM pronostiques p
INNER JOIN matchs m ON m.id_match = p.id_match
WHERE p.id_utilisateur = '$userId'
AND p.id_match = $matchId
AND p.vote = $btnId;
";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
} catch (PDOException $pe) {
    die("<div>Erreur de connection à la base de données :" . $pe->getMessage() . "</div>");
}

$qPronoSuc = $conn->query($sqlRequest);
if($qPronoSuc != false){
    $qPronoSuc->setFetchMode(PDO::FETCH_ASSOC);
}
$conn = null;