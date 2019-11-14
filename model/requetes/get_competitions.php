<?php

    $sqlRequest = "SELECT * FROM `competitions` ORDER BY annee DESC";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    } catch (PDOException $pe) {
        die("<div>Erreur de connection à la base de données :" . $pe->getMessage() . "</div>");
    }
    $q = $conn->query($sqlRequest);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $conn = null;
