<!--
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Texte utilisé si le visiteur utilise le bouton d\'annulation';
    exit;
} else {
    echo "<p>Bonjour, {$_SERVER['PHP_AUTH_USER']}.</p>";
    echo "<p>Votre mot de passe est {$_SERVER['PHP_AUTH_PW']}.</p>";
}
 -->

<?php
session_start();

// connexion à la base de données
$db_username = 'root';
$db_password = '';
$db_name     = 'pronosambo';
$db_host     = 'localhost';
$db = mysqli_connect($db_host, $db_username, $db_password, $db_name)
    or die('could not connect to database');
if (isset($_POST['btnLog'])) {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
        // pour éliminer toute attaque de type injection SQL et XSS
        $username = mysqli_real_escape_string($db, htmlspecialchars($_POST['username']));
        $password = mysqli_real_escape_string($db, htmlspecialchars($_POST['password']));

        if ($username !== "" && $password !== "") {
            $requete = "SELECT count(*) FROM utilisateurs where 
              login = '" . $username . "' and password = '" . $password . "' ";
            $exec_requete = mysqli_query($db, $requete);
            $reponse      = mysqli_fetch_array($exec_requete);
            $count = $reponse['count(*)'];
            if ($count != 0) // nom d'utilisateur et mot de passe correctes
            {
                $requete = "SELECT DISTINCT solde FROM utilisateurs where 
                login = '" . $username . "' and password = '" . $password . "' ";
                $exec_requete = mysqli_query($db, $requete);
                $reponse      = mysqli_fetch_array($exec_requete);

                $_SESSION['username'] = $username;
                $_SESSION['gain'] = $reponse[0];

                header('Location: ../../home.php');
            } else {
                header('Location: ../../home.php?erreur=1'); // utilisateur ou mot de passe incorrect
            }
        } else {
            header('Location: ../../home.php?erreur=2'); // utilisateur ou mot de passe vide
        }
    } else {
        header('Location: ../../home.php');
    }
} elseif (isset($_POST['btnSgn'])) {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
        // pour éliminer toute attaque de type injection SQL et XSS
        $username = mysqli_real_escape_string($db, htmlspecialchars($_POST['username']));
        $password = mysqli_real_escape_string($db, htmlspecialchars($_POST['password']));
        $requete = "INSERT INTO utilisateurs(`e_mail`, `solde`, `login`, `password`) VALUES (\"$username\", 10, \"$username\", \"$password\");";
        if ($db->query($requete) === TRUE) {
            echo "New record created successfully";
            header('Location: ../../home.php');
        } else {
            echo "Error: " . $requete . "<br>" . $db->error;
        }
    }
}
mysqli_close($db); // fermer la connexion
?>