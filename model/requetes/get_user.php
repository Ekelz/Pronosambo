<?php
$userId = $_SESSION['username'];
$sqlRequest = "
SELECT * FROM utilisateurs u 
WHERE u.login = '$userId';
";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
} catch (PDOException $pe) {
    die("<div>Erreur de connection à la base de données :" . $pe->getMessage() . "</div>");
}
$qUser = $conn->query($sqlRequest);
$qUser->setFetchMode(PDO::FETCH_ASSOC);
$conn = null;