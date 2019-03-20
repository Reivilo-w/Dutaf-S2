<?php
	if (!isset($_POST['numart'])) {
		header('Location: gest_art.php');
	}

	$id = $_POST['numart'];

	require '../inc/db_ac.php';

	$getItem = $db->prepare('SELECT * FROM dutaf_articles WHERE art_id = :id');
	$getItem->bindParam('id', $id);
	$getItem->execute();

	$dataArticle = $getItem->fetch();

	$getItem->closeCursor();

?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no">

		<title>Dutaf | Modifier un Article</title>

		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
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
					// POST VALUES
					$art_id = $_POST['numart'];
					$art_design = $_POST['design'];
					$art_desc = $_POST['descript'];
					$art_prix = $_POST['prix'];
					$art_quantity = $_POST['qte'];
					$_f_id = $_POST['four'];

					// DB ACCESS
					$updateArticle = $db->prepare('UPDATE dutaf_articles SET art_design = :art_design, art_desc = :art_desc, art_prix = :art_prix, art_quantity = :art_quantity, _f_id = :_f_id WHERE art_id = :art_id');

					$updateArticle->bindParam('art_design', $art_design);
					$updateArticle->bindParam('art_desc', $art_desc);
					$updateArticle->bindParam('art_prix', $art_prix);
					$updateArticle->bindParam('art_quantity', $art_quantity);
					$updateArticle->bindParam('_f_id', $_f_id);
					$updateArticle->bindParam('art_id', $art_id);

					if ($updateArticle->execute()) {
						?>
							<div class="card">
								<h5 class="card-header">Validé !</h5>
								<div class="card-body">
									<h5 class="card-title">L'article a été modifié</h5>
									<p class="card-text">Vous pouvez dès à présent retourner à la section <a href="gest_art.php">article</a>.</p>
									<a href="gest_art.php" class="btn btn-success">Retour</a>
								</div>
							</div>
						<?php
					} else {
						?>
							<div class="card">
								<h5 class="card-header">Aie...</h5>
								<div class="card-body">
									<h5 class="card-title">L'article n'a pas pu être modifié</h5>
									<p class="card-text">Vous pouvez rééssayer ou bien contacter le webmaster.</p>
									<a href="gest_art.php" class="btn btn-danger">Retour</a>
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