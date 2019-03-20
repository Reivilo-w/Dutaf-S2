<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no">

		<title>Dutaf | Ajouter un Article</title>

		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	</head>
	<body>
	<!--START-- | Navigation |-->
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
			<a class="navbar-brand" href="#">Dutaf</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="../index.html">Accueil</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../catalogue.php">Catalogue</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../form_budget.html">Petit Budget</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="gest_art.php">Articles</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="f.php">Fournisseurs</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="gestion.php">Privé</a>
					</li>
			</div>
		</nav>
	<!--END-- | Navigation | -->

	<!--START-- | Content |-->
	<div class="container">
		<div class="row my-5" style="position: relative; top: 27px; margin: 0 auto;">
			<div class="col-12">
				<?php 
					if (!isset($_POST)) {
						header('Location: form_new_art.php');
					}
					// POST VALUES
					$art_design = $_POST['design'];
					$art_desc = $_POST['descript'];
					$art_prix = $_POST['prix'];
					$art_quantity = $_POST['qte'];
					$_f_id = $_POST['four'];

					// DB ACCESS
					require '../inc/db_ac.php';
					$insertArticle = $db->prepare('INSERT INTO dutaf_articles (art_design, art_desc, art_prix, art_quantity, _f_id) VALUES(:art_design, :art_desc, :art_prix, :art_quantity, :_f_id)');

					$insertArticle->bindParam('art_design', $art_design);
					$insertArticle->bindParam('art_desc', $art_desc);
					$insertArticle->bindParam('art_prix', $art_prix);
					$insertArticle->bindParam('art_quantity', $art_quantity);
					$insertArticle->bindParam('_f_id', $_f_id);

					if ($insertArticle->execute()) {
						?>
							<div class="card">
								<h5 class="card-header"><?=$art_desc?></h5>
								<div class="card-body">
									<h5 class="card-title">L'article a été ajouté</h5>
									<p class="card-text">Vous pouvez dès à présent le retrouver dans la section <a href="../catalogue.php">catalogue</a> ou dans le <a href="gest_art.php">système de gestion des article</a>.</p>
									<a href="form_new_art.php" class="btn btn-primary">Recommencer</a>
									<a href="gest_art.php" class="btn btn-secondary">Retour</a>
								</div>
							</div>
						<?php
					} else {
						?>
							<div class="card">
								<h5 class="card-header">Aie...</h5>
								<div class="card-body">
									<h5 class="card-title">L'article n'a pas pu être ajouté</h5>
									<p class="card-text">Vous pouvez rééssayer ou bien contacter le webmaster.</p>
									<a href="form_new_art.php" class="btn btn-primary">Recommencer</a>
									<a href="gest_art.php" class="btn btn-secondary">Retour</a>
								</div>
							</div>
						<?php
					}
					
				?>

			</div>
		</div>
	</div>
	<!--END-- | Content | -->

	<!--START-- | Script Sources | -->
		<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<!--END-- | Script Sources | -->
	</body>
</html>