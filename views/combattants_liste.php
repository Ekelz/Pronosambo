<?php
$title="Pronosambo - Liste de combattants";
ob_start();
?>

		<h1 class="titre_combattant">Combattants</h1>
		
		<form method="post" action="./home.php">
			<div class="card border-0 info_combattants_liste sambo-background" style="width: 18rem;">
				<input type="hidden" name="btnFighter">
				<input class="img_combattants_liste" type="image" src="./src/img/fedor.jpg" alt="submit" name="btnFighter"/>
				<div class="card-body img_combattants_liste">
					<input class="btn_nom_joueur sambo-background" type="submit" name="btnFighter" value="Fedor"/>
				</div>
			</div>
		</form>	

		<form method="post" action="./home.php">
			<div class="card border-0 info_combattants_liste sambo-background" style="width: 18rem;">
				<input type="hidden" name="btnFighter">
				<input class="img_combattants_liste" type="image" src="./src/img/Stanislav.jpg" name="btnFighter"/>
				<div class="card-body img_combattants_liste">
					<input class="btn_nom_joueur sambo-background" type="submit" name="btnFighter" value="Stanislav"/>	
				</div>	
			</div>
		</form>	
		

<?php
    $content=ob_get_clean();
    require("layout.php");
?>