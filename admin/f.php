<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no">

		<title>Dutaf | Fournisseurs</title>

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
		<div class="row my-5 d-flex justify-content-around" style="position: relative; top: 27px; margin: 0 auto;">
			<div class="col-6">
				<a class="btn btn-outline-primary btn-lg btn-block" href="form_new_f.php" role="button">Ajouter</a>
			</div>
			<div class="col-6">
				<a class="btn btn-outline-secondary btn-lg btn-block" href="gestion.html" role="button">Retour</a>
			</div>
		</div>
		<div class="row d-flex justify-content-around">
			<div class="col-lg-10 col-md-10 col-sm-12">
				<table class="table table-striped text-center">
					<thead>
						<tr>
							<th scope="col">Nom</th>
							<th scope="col">Téléphone</th>
							<th scope="col">Ville</th>
							<th scope="col">Modifier</th>
							<th scope="col">Supprimer</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							require '../inc/db_ac.php';
							$getItems = $db->query('SELECT f_id, f_nom, f_tel, f_ville FROM dutaf_fournisseurs');
							while ($data = $getItems->fetch()) {
								?>
									<tr>
										<th scope="row"><?=$data['f_nom']?></th>
										<td><?=$data['f_tel']?></td>
										<td><?=$data['f_ville']?></td>
										<td><a href="form_modif_f.php?numf=<?=$data['f_id']?>"><i class="far fa-edit"></i></a></td>
										<td><a href="valide_sup_f.php?numf=<?=$data['f_id']?>"><i class="far fa-trash-alt"></i></a></td>
									</tr>
								<?php
							}
						?>
					</tbody>
				</table>
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