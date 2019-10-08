<!--Layout structure html de notre site-->
<!doctype html>
<?php require("head.php"); ?>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title><?php echo $title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./src/css/bulma.min.css">
        <link rel="stylesheet" href="./src/css/login.css">
        <script defer src="./src/js/all.js"></script>
    </head>
    <body>
		<?php echo $head; ?>
		<div id="content">
			<section class="container" >
				<?php echo $content; ?>
			</section>
		</div>
    </body>
</html>