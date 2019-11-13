<!DOCTYPE html>

<!-- Ce document est un exemple d'accès à la DB pour afficher des données-->

<head>
    <meta charset="UTF-8">
	<link rel="stylesheet" href="../src/bin/bootstrap-4.3.1-dist/css/bootstrap.css">
</head>

<body>
    <h1>Je vais requeter la base</h1>
    <?php
    $host = 'localhost'; // Ou Adresse IP du server 11.22.33.44. Inutile de préciser le port 3306 si non changé.
    $dbname = 'pronosambo';
    $username = 'root';
    $password = '';
    $sqlRequest = "SELECT * FROM combattants;";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        echo "<br>Connexion OK sur $dbname chez $host.";
    } catch (PDOException $pe) {
        echo '<br>Arrêt du script.';
        die("<br>Erreur de connexion sur $dbname chez $host :" . $pe->getMessage());
    }

    echo "<br>Nous allons procéder à la requête";
    $q = $conn->query($sqlRequest);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $conn = null;
    ?>
    <br>
    <table class="table table-bordered">
        <tbody>
            <?php
            while ($row = $q->fetch()) :
                ?>
                <tr>
                <td><?php echo htmlspecialchars($row['nom']); ?></td>
                <td><?php echo htmlspecialchars($row['prenom']); ?></td>
                <td><?php echo htmlspecialchars($row['age']); ?></td>
                <td><?php echo htmlspecialchars($row['taille']); ?></td>
                </tr>
            <?php
            endwhile
            ?>
        </tbody>
    </table>
</body>