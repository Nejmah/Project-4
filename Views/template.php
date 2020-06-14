<!doctype html>
<html lang="fr">
  	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?= $metaTitle ?></title>
        <link rel="icon" type="image/png" href="/Project-4/assets/img/favicon.png">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="stylesheet" href="/Project-4/assets/css/style.css">
        <link rel="stylesheet" href="/Project-4/assets/css/fonts.css">
  	</head>
	

	<body class="<?= $bodyClasses ?>">
		<div class="container">
			<header>
				<nav class="navbar navbar-expand-lg navbar-light">
					<a class="navbar-brand" href="/Project-4"><img class="moutain-img" src="/Project-4/assets/img/mountain.png" alt="mountain"></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarNav">
						<ul class="navbar-nav">
							<li class="nav-item active">
								<a class="nav-link" href="/Project-4">ACCUEIL</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="/Project-4/about">A PROPOS</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="/Project-4/chapters">CHAPITRES</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="/Project-4/login">ADMINISTRATION</a>
							</li>
						</ul>
					</div>
				</nav>
			</header>

			<?= $content ?>
		</div>

		
		<footer>
			<p>Copyright © Jean Forteroche 2020</p>
			<!-- <p>Droits d'auteurs réservés.</p> -->
		</footer>
		
        <!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  		<script>
		    tinymce.init({
			    selector: 'textarea',
				height: 450,
  				menubar: false,
			});
		</script>
		<script src="assets/js/modal.js"></script>
	</body>
</html>