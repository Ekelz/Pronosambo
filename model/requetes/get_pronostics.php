<?php
$sqlRequest = "
SELECT cote_c1, cote_c2, cote_nulle, id_match, c1.nom c1name, c1.prenom c1surname, c2.nom c2name, c2.prenom c2surname
FROM `matchs` 
INNER JOIN combattants c1 ON matchs.id_combattant_1 = c1.id_combattant
INNER JOIN combattants c2 ON matchs.id_combattant_2 = c2.id_combattant
WHERE (est_termine = FALSE)
";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
} catch (PDOException $pe) {
    die("<div>Erreur de connection à la base de données :" . $pe->getMessage() . "</div>");
}
$q = $conn->query($sqlRequest);
$q->setFetchMode(PDO::FETCH_ASSOC);
$conn = null;
