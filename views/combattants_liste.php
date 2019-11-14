<?php
$title="Pronosambo - Liste de combattants";
ob_start();

$host = 'localhost'; // Ou Adresse IP du server 11.22.33.44. Inutile de préciser le port 3306 si non changé.
    $dbname = 'pronosambo';
    $username = 'root';
    $password = '';
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
?>
	<div class="container item-body sambo-container">
		<div class="row prono-container container-title">
			<div class="col">
				COMBATTANTS
			</div>
		</div>
		
		<?php
        while ($value = $q->fetch()) :
    	?>
		<form method="post" action="./home.php">
			<div class="card border-0 info_combattants_liste sambo-background" style="width: 18rem;">
				<input type="hidden" name="btnFighter">
				<input class="img_combattants_liste" type="image" src="./src/img/<?php echo htmlspecialchars($value['image_lien'])?>" alt="submit" name="btnFighter"/>
				<div class="card-body img_combattants_liste">
					<input class="btn_nom_joueur sambo-background" type="submit" name="btnFighter" 
					value="<?php echo htmlspecialchars($value['prenom']), " ", htmlspecialchars($value['nom'])?>"/>
				</div>
			</div>
		</form>	

		<?php
			endwhile
		?>
	</div>	

<?php
    $content=ob_get_clean();
    require("layout.php");
?>