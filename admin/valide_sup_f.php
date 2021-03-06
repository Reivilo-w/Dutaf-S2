<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no">

		<title>Dutaf | Supprimer un fournisseur</title>

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
					<li class="nav-item">
						<a class="nav-link" href="gest_art.php">Articles</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="f.php">Fournisseurs</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="gestion.html">Privé</a>
					</li>
			</div>
		</nav>
	<!--END-- | Navigation | -->

	<!--START-- | Content |-->
	<div class="container">
		<div class="row my-5" style="position: relative; top: 27px; margin: 0 auto;">
			<div class="col-12">
				<?php 
					if (!isset($_GET)) {
						header('Location: f.php');
					}
					// POST VALUES
					$numf = $_GET['numf'];

					// DB ACCESS
					require '../inc/db_ac.php';
					$insertArticle = $db->prepare('DELETE FROM dutaf_fournisseurs WHERE f_id = :id');

					$insertArticle->bindParam('id', $numf);

					if ($insertArticle->execute()) {
						?>
							<div class="card">
								<h5 class="card-header">Validé !</h5>
								<div class="card-body">
									<h5 class="card-title">Le fournisseur a été supprimé</h5>
									<p class="card-text">Vous pouvez dès à présent retourner à la section <a href="f.php">Fournisseurs</a>.</p>
									<a href="f.php" class="btn btn-success">Retour</a>
								</div>
							</div>
						<?php
					} else {
						?>
							<div class="card">
								<h5 class="card-header">Aie...</h5>
								<div class="card-body">
									<h5 class="card-title">Le fournisseur n'a pas pu être supprimé</h5>
									<p class="card-text">Vous pouvez rééssayer ou bien contacter le webmaster.</p>
									<a href="f.php" class="btn btn-danger">Retour</a>
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