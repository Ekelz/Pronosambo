<?php
$title="Pronosambo - Liste de combattants";
ob_start();
?>

		<h1 class="titre_combattant">Combattants</h1>
		
		<div class="info_combattants_liste">
			<a href="./views/combattant.php">
				<img class="img_combattants_liste" src="./src/img/fedor.jpg" width="200px">
				<div>Fedor</div>
			</a>
		</div>
		<form method="post" action="./home.php">
			<div class="info_combattants_liste">
				<input type="image" src="./src/img/Stanislav.jpg" name="submit" width="200px"/>
				<div>Stanislav</div>
			</div>
		</form>


	

<?php
    $content=ob_get_clean();
    require("layout.php");
?>