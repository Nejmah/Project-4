<!doctype html>
<html lang="fr">
  	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?= $metaTitle ?></title>
        <link rel="icon" type="image/png" href="<?= env("URL_PREFIX") ?>/assets/img/favicon.png">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="stylesheet" href="<?= env("URL_PREFIX") ?>/assets/css/style.css">
		<link rel="stylesheet" href="<?= env("URL_PREFIX") ?>/assets/css/responsive.css">
        <link rel="stylesheet" href="<?= env("URL_PREFIX") ?>/assets/css/fonts.css">
  	</head>
	

	<body>
		<div class="container">
			<header>
				<?php include('partials/navigation.php'); ?>
			</header>

			<?= $content ?>

			<footer>
				<p>Copyright © Jean Forteroche 2020</p>
			</footer>
		</div>

		
        <!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
		<script src="<?= env("URL_PREFIX") ?>/assets/js/modal.js"></script>
		<script src="<?= env("URL_PREFIX") ?>/assets/js/script.js"></script>
	</body>
</html>