<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no">

		<title>Dutaf | Ajouter un Fournisseur</title>

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
					if (!isset($_POST)) {
						header('Location: form_new_f.php');
					}
					// POST VALUES
					$nom = $_POST['nom'];
					$tel = $_POST['tel'];
					$ville = $_POST['ville'];

					// DB ACCESS
					require '../inc/db_ac.php';
					$insertF = $db->prepare('INSERT INTO dutaf_fournisseurs (f_nom, f_tel, f_ville) VALUES(:f_nom, :f_tel, :f_ville)');

					$insertF->bindParam('f_nom', $nom);
					$insertF->bindParam('f_tel', $tel);
					$insertF->bindParam('f_ville', $ville);

					if ($insertF->execute()) {
						?>
							<div class="card">
								<h5 class="card-header"><?=$nom?></h5>
								<div class="card-body">
									<h5 class="card-title">Le fournisseur a été ajouté</h5>
									<p class="card-text">Vous pouvez dès à présent le retrouver dans le <a href="f.php">système de gestion des fournisseurs</a>.</p>
									<a href="form_new_f.php" class="btn btn-primary">Recommencer</a>
									<a href="f.php" class="btn btn-secondary">Retour</a>
								</div>
							</div>
						<?php
					} else {
						?>
							<div class="card">
								<h5 class="card-header">Aie...</h5>
								<div class="card-body">
									<h5 class="card-title">Le fournisseur n'a pas pu être ajouté</h5>
									<p class="card-text">Vous pouvez rééssayer ou bien contacter le webmaster.</p>
									<a href="form_new_f.php" class="btn btn-primary">Recommencer</a>
									<a href="f.php" class="btn btn-secondary">Retour</a>
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