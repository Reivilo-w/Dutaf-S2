<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no">

		<title>Dutaf | Gestion</title>

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
					<li class="nav-item">
						<a class="nav-link" href="f.php">Fournisseurs</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="gestion.php">Privé</a>
					</li>
			</div>
		</nav>
	<!--END-- | Navigation | -->

	<!--START-- | Content |-->
	<div class="container">
		<div class="row my-5" style="position: relative; top: 27px; margin: 0 auto;">
			<div class="col-12">
				<a class="btn btn-outline-secondary btn-lg btn-block" href="../index.html" role="button">Retour</a>
			</div>
		</div>
        <?php
            require '../inc/db_ac.php';
            $articles = $db->query('SELECT * FROM dutaf_articles');
            $fournisseurs = $db->query('SELECT COUNT(*) FROM dutaf_fournisseurs');

            $dataArticles = $articles->fetch();
            $nbF = $fournisseurs->fetch()[0];

            $fournisseurs->closeCursor();

            $sommeQte = 0;
            $sommeArt = 0;
            $sommePrix = 0;

            while ($dataArticles = $articles->fetch()) {
            	$sommeQte += $dataArticles['art_quantity'];
            	$sommePrix += $dataArticles['art_quantity'] * $dataArticles['art_prix'];
            	$sommeArt += 1;
            }
        ?>
        <div class="row my-3 d-flex justify-content-between">
            <div class="col-md-6 col-12">
                <div class="alert alert-dark" role="alert">
                    <h4 class="alert-heading">Articles</h4>
                    <p><?=$sommeArt?> Articles Différents</p>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="alert alert-primary" role="alert">
                    <h4 class="alert-heading">Fournisseurs</h4>
                    <p><?=$nbF?> Fournisseurs</p>
                </div>
            </div>
        </div>
        <div class="row my-3 d-flex justify-content-between">
            <div class="col-md-6 col-12">
                <div class="alert alert-info" role="alert">
                    <h4 class="alert-heading">Quantité d'Articles</h4>
                    <p><?=$sommeQte?> Articles disponibles à la Vente</p>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="alert alert-secondary" role="alert">
                    <h4 class="alert-heading">Revenu Potentiel</h4>
                    <p><?=$sommePrix?> €</p>
                </div>
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