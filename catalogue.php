<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no">

		<title>Dutaf | Catalogue</title>

		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
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
						<a class="nav-link" href="index.html">Accueil</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="catalogue.php">Catalogue</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="form_budget.html">Petit Budget</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="admin/gestion.php">Privé</a>
					</li>
			</div>
		</nav>
	<!--END-- | Navigation | -->

	<!--START-- | Content |-->
	<div class="container">
		<div class="row my-5" style="position: relative; top: 27px; margin: 0 auto;">
			<div class="col-12">
				<a class="btn btn-outline-secondary btn-lg btn-block" href="index.html" role="button">Retour</a>
			</div>			
		</div>
		<div class="row">
			<div class="col-12">
				<table class="table table-striped align-self-center">
					<thead>
						<tr>
							<th scope="col">Référence</th>
							<th scope="col">Nom</th>
							<th scope="col">Prix</th>
							<th scope="col">Fournisseur</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							require 'inc/db_ac.php';
							$getItems = $db->query('SELECT art_design, art_desc, art_prix, f_nom FROM dutaf_articles INNER JOIN dutaf_fournisseurs ON dutaf_articles._f_id=dutaf_fournisseurs.f_id ORDER BY art_design ASC');
							while ($data = $getItems->fetch()) {
								?>
									<tr>
										<th scope="row"><?=$data['art_design']?></th>
										<td><?=$data['art_desc']?></td>
										<td><?=$data['art_prix']?></td>
										<td><?=$data['f_nom']?></td>
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
		<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<!--END-- | Script Sources | -->
	</body>
</html>