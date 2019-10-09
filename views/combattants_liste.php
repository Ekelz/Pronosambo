<?php
ob_start();
?>

		<h1 class="titre_combattant">Combattants</h1>
		
		<div class="card info_combattants_liste" style="width: 18rem;">
  			<img src="../src/img/fedor.jpg" class="card-img-top">
  			<div class="card-body">
    			<h5 class="card-title">Fedor</h5>
  			</div>
		</div>

		<form method="post" action="combattant.php">
		<a>
		<div class="card info_combattants_liste" style="width: 18rem;">
			<img src="../src/img/Stanislav.jpg" class="card-img-top">
			<div class="card-body">
				<form method="post" action="./home.php">
					<h5 class="card-title">STANISLAV</h5>	
            	</form>
  			</div>	
		</div>
		</a>
		</form>	

<?php
    $content=ob_get_clean();
    require("layout.php");
?>