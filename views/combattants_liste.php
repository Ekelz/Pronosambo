<?php
ob_start();
?>

		<h1 class="titre_combattant">Combattants</h1>
		
		<div class="info_combattants_liste">
			<a href="../views/combattant.php">
				<img class="img_combattants_liste" src="../src/img/fedor.jpg">
				<div>Fedor</div>
			</a>
		</div>
		<div class="info_combattants_liste">
			<a href="../views/combattant.php">
				<img class="img_combattants_liste" src="../src/img/Stanislav.jpg">
				<div>Stanislav</div>
			</a>
		</div>
	

<?php
    $content=ob_get_clean();
    require("layout.php");
?>