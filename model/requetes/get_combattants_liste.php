<?php
    $sqlRequest = "SELECT * FROM combattants;";

        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        } catch (PDOException $pe) {
            echo '<br>Arrêt du script.';
            die("<br>Erreur de connexion sur $dbname chez $host :" . $pe->getMessage());
        }
        $q = $conn->query($sqlRequest);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $conn = null;