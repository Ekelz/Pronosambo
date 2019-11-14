<!--Layout structure html de notre site-->
<!doctype html>
<?php require("head.php"); ?>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./src/css/combattants_liste.css">
	<!-- <link rel="stylesheet" href="../src/css/bulma.min.css"> -->
	<!-- <link rel="stylesheet" href="../src/css/login.css"> -->
	<link rel="stylesheet" href="./src/bin/bootstrap-4.3.1-dist/css/bootstrap.css">
	<link rel="stylesheet" href="./src/css/etienne.css">
	<script defer src="./src/bin/bootstrap-4.3.1-dist/js/bootstrap.js"></script>
	<script defer src="./src/js/all.js"></script>
</head>

<body>
	<?php echo $head; ?>
	<div id="content">
		<section class="container">
			<?php echo $content; ?>
		</section>
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>