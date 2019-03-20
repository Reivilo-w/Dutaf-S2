<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no">

		<title>Dutaf | Ajouter un Article</title>

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
		<div class="row my-5 d-flex justify-content-between" style="position: relative; top: 27px; margin: 0 auto;">
			<div class="col-12">
				<a class="btn btn-outline-secondary btn-lg btn-block" href="gest_art.php" role="button">Retour</a>
			</div>
		</div>
		<div class="row">
			<form class="col-12" action="valide_new_art.php" method="post">
				<div class="form-row">
					<div class="form-group col-md-4">
						<label for="inputRef">Référence</label>
						<input type="text" class="form-control" id="inputRef" placeholder="Référence" name="design">
					</div>
					<div class="form-group col-md-8">
						<label for="inputDesc">Description</label>
						<input type="text" class="form-control" id="inputDesc" placeholder="Description" name="descript">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-3">
						<label for="inputPrice">Prix</label>
						<input type="number" class="form-control" id="inputPrice" placeholder="Prix" name="prix">
					</div>
					<div class="form-group col-md-3">
						<label for="inputQty">Quantité</label>
						<input type="number" class="form-control" id="inputQty" placeholder="Quantité" name="qte">
					</div>
					<div class="form-group col-md-6">
						<label for="inputState">Fournisseur</label>
						<select id="inputState" class="form-control" name="four">
							<?php
								require '../inc/db_ac.php';
								$getItems = $db->query('SELECT * FROM dutaf_fournisseurs');
								while ($data = $getItems->fetch()) {
									?>
										<option value="<?=$data['f_id']?>"><?=$data['f_nom']?></option>
									<?php
								}
							?>
						</select>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-4">
						<button type="submit" class="btn btn-primary btn-block">Ajouter</button>
					</div>
					<div class="form-group col-md-2">
						<button type="submit" class="btn btn-outline-secondary btn-block" id="clearB">Vider les Champs</button>
					</div>
				</div>
				
				
			</form>
		</div>
	</div>
	<!--END-- | Content | -->

	<!--START-- | Script Sources | -->
		<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#clearB').click(function(){
					$('input').val('');
				});
			});
		</script>
	<!--END-- | Script Sources | -->
	</body>
</html>