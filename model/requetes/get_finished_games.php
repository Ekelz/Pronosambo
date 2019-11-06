<?php
$sqlRequest = "
SELECT score_c1, score_c2, id_match, c1.nom c1name, c1.prenom c1surname, c2.nom c2name, c2.prenom c2surname, date_match
FROM `matchs` 
INNER JOIN combattants c1 ON matchs.id_combattant_1 = c1.id_combattant
INNER JOIN combattants c2 ON matchs.id_combattant_2 = c2.id_combattant
WHERE (est_termine = TRUE)
ORDER BY date_match DESC;
";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
} catch (PDOException $pe) {
    die("<div>Erreur de connection à la base de données :" . $pe->getMessage() . "</div>");
}
$q = $conn->query($sqlRequest);
$q->setFetchMode(PDO::FETCH_ASSOC);
$conn = null;
