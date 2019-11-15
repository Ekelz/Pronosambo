<?php
$title="Pronosambo - Liste de combattants";
ob_start();
?>
	<div class="container item-body sambo-container">
		<?php
            // Requetage 
			require "./model/requetes/id_base.php";
			if(isset($_POST['btnSearch'])){
				$combattant = $_POST["SearchResult"];
				require "./model/requetes/get_fighters_by_search.php";
			} else {
				require "./model/requetes/get_combattants_liste.php";
			}
    	?>

		<div class="row prono-container container-title">
			<div class="col">
				COMBATTANTS
			</div>
		</div>
		
		<?php
		if($q != null){
			while ($value = $q->fetch()) :	
        	
    	?>
		<form method="post" action="./home.php">
			<div class="card border-0 info_combattants_liste sambo-background" style="width: 18rem;">
				<input type="hidden" name="btnFighter" value="<?php echo htmlspecialchars($value['prenom']), " ", htmlspecialchars($value['nom'])?>"/>
				<input class="img_combattants_liste" type="image" src="./src/img/<?php echo $value['image_lien']?>" alt="submit"/>
				<div class="card-body img_combattants_liste">
					<input class="btn_nom_joueur sambo-background" type="submit" name="btnFighter"
					value="<?php echo htmlspecialchars($value['prenom']), " ", htmlspecialchars($value['nom'])?>"/>
				</div>
			</div>
		</form>
		<?php
			endwhile;
		}
		?>
	</div>	

<?php
    $content=ob_get_clean();
    require("layout.php");
?>